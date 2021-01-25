<?php

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PackageGenerator\Model\AbstractModel;
use WsdlToPhp\PackageGenerator\Model\StructAttribute as StructAttributeModel;
use WsdlToPhp\PackageGenerator\Model\Struct as StructModel;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Property as PropertyContainer;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Constant as ConstantContainer;
use WsdlToPhp\PackageGenerator\Container\Model\StructAttribute as StructAttributeContainer;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotation;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotationBlock;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;
use WsdlToPhp\PhpGenerator\Element\PhpProperty;
use WsdlToPhp\PhpGenerator\Element\PhpConstant;
use WsdlToPhp\PackageGenerator\File\Validation\Rules;
use WsdlToPhp\PackageGenerator\File\Element\PhpFunctionParameter;

class Struct extends AbstractModelFile
{
    /**
     * @see \WsdlToPhp\PackageGenerator\File\AbstractModelFile::getClassConstants()
     */
    protected function getClassConstants(ConstantContainer $constants)
    {
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\File\AbstractModelFile::getConstantAnnotationBlock()
     */
    protected function getConstantAnnotationBlock(PhpConstant $constant)
    {
    }
    /**
     * @return StructAttributeContainer
     */
    protected function getModelAttributes()
    {
        return $this->getModel()->getProperAttributes(true);
    }
    /**
     * @param PropertyContainer $properties
     */
    protected function getClassProperties(PropertyContainer $properties)
    {
        foreach ($this->getModelAttributes() as $attribute) {
            $properties->add(new PhpProperty($attribute->getCleanName(), PhpProperty::NO_VALUE));
        }
    }
    /**
     * @return PhpAnnotationBlock $property
     */
    protected function getPropertyAnnotationBlock(PhpProperty $property)
    {
        $annotationBlock = new PhpAnnotationBlock();
        $annotationBlock->addChild(sprintf('The %s', $property->getName()));
        $attribute = $this->getModel()->getAttribute($property->getName());
        if (!$attribute instanceof StructAttributeModel) {
            $attribute = $this->getModel()->getAttributeByCleanName($property->getName());
        }
        if ($attribute instanceof StructAttributeModel) {
            $this->defineModelAnnotationsFromWsdl($annotationBlock, $attribute);
            $annotationBlock->addChild(new PhpAnnotation(self::ANNOTATION_VAR, $this->getStructAttributeTypeSetAnnotation($attribute, true)));
        }
        return $annotationBlock;
    }
    protected function fillClassMethods()
    {
        $this
            ->addStructMethodConstruct()
            ->addStructMethodsSetAndGet();
    }
    /**
     * @return Struct
     */
    protected function addStructMethodConstruct()
    {
        if (0 < count($parameters = $this->getStructMethodParametersValues())) {
            $method = new PhpMethod(self::METHOD_CONSTRUCT, $parameters);
            $this->addStructMethodConstructBody($method);
            $this->methods->add($method);
        }
        return $this;
    }
    /**
     * @param PhpMethod $method
     * @return Struct
     */
    protected function addStructMethodConstructBody(PhpMethod $method)
    {
        $count = $this->getModelAttributes()->count();
        foreach ($this->getModelAttributes() as $index => $attribute) {
            if ($index === 0) {
                $method->addChild('$this');
            }
            $this->addStructMethodConstructBodyForAttribute($method, $attribute, $count - 1 === $index);
        }
        return $this;
    }
    /**
     * @param PhpMethod $method
     * @param StructAttributeModel $attribute
     * @param bool $isLast
     * @return Struct
     */
    protected function addStructMethodConstructBodyForAttribute(PhpMethod $method, StructAttributeModel $attribute, $isLast)
    {
        $uniqueString = $attribute->getUniqueString($attribute->getCleanName(), 'method');
        $method->addChild($method->getIndentedString(sprintf('->%s($%s)%s', $attribute->getSetterName(), lcfirst($uniqueString), $isLast ? ';' : ''), 1));
        return $this;
    }
    /**
     * @return PhpFunctionParameter[]
     */
    protected function getStructMethodParametersValues()
    {
        $parametersValues = [];
        foreach ($this->getModelAttributes() as $attribute) {
            $parametersValues[] = $this->getStructMethodParameter($attribute);
        }
        return $parametersValues;
    }
    /**
     * @param StructAttributeModel $attribute
     * @return PhpFunctionParameter
     */
    protected function getStructMethodParameter(StructAttributeModel $attribute)
    {
        try {
            return new PhpFunctionParameter(
                lcfirst($attribute->getUniqueString($attribute->getCleanName(), 'method')),
                $attribute->getDefaultValue(),
                $this->getStructMethodParameterType($attribute),
                $attribute
            );
        } catch (\InvalidArgumentException $exception) {
            throw new \InvalidArgumentException(sprintf('Unable to create function parameter for struct "%s" with type "%s" for attribute "%s"', $this->getModel()->getName(), var_export($this->getStructMethodParameterType($attribute), true), $attribute->getName()), __LINE__, $exception);
        }
    }
    /**
     * @param StructAttributeModel $attribute
     * @param bool $returnArrayType
     * @return string|null
     */
    protected function getStructMethodParameterType(StructAttributeModel $attribute, $returnArrayType = true)
    {
        return self::getValidType($this->getStructAttributeTypeHint($attribute, $returnArrayType), $this->getGenerator()->getOptionXsdTypesPath(), null);
    }
    /**
     * @return Struct
     */
    protected function addStructMethodsSetAndGet()
    {
        foreach ($this->getModelAttributes() as $attribute) {
            $this
                ->addStructMethodGet($attribute)
                ->addStructMethodSet($attribute)
                ->addStructMethodAddTo($attribute);
        }
        return $this;
    }
    /**
     * @param StructAttributeModel $attribute
     * @return Struct
     */
    protected function addStructMethodAddTo(StructAttributeModel $attribute)
    {
        if ($attribute->isArray()) {
            $method = new PhpMethod(sprintf('addTo%s', ucfirst($attribute->getCleanName())), [
                new PhpFunctionParameter('item', PhpFunctionParameter::NO_VALUE, $this->getStructMethodParameterType($attribute, false), $attribute),
            ]);
            $this->addStructMethodAddToBody($method, $attribute);
            $this->methods->add($method);
        }
        return $this;
    }
    /**
     * @param PhpMethod $method
     * @param StructAttributeModel $attribute
     * @return Struct
     */
    protected function addStructMethodAddToBody(PhpMethod $method, StructAttributeModel $attribute)
    {
        if ($this->getGenerator()->getOptionValidation()) {
            $this->applyRules($method, $attribute, 'item', true);
        }

        if ($attribute->nameIsClean()) {
            $assignment = sprintf('$this->%s[] = $item;', $attribute->getCleanName());
        } else {
            $assignment = sprintf('$this->%s[] = $this->{\'%s\'}[] = $item;', $attribute->getCleanName(), addslashes($attribute->getName()), $attribute->getCleanName());
        }
        $method
            ->addChild($assignment)
            ->addChild('return $this;');
        return $this;
    }
    /**
     * @param StructAttributeModel $attribute
     * @return Struct
     */
    protected function addStructMethodSet(StructAttributeModel $attribute)
    {
        $method = new PhpMethod($attribute->getSetterName(), [
            $this->getStructMethodParameter($attribute),
        ]);
        $this->addStructMethodSetBody($method, $attribute);
        $this->methods->add($method);
        return $this;
    }
    /**
     * @param PhpMethod $method
     * @param StructAttributeModel $attribute
     * @return Struct
     */
    protected function addStructMethodSetBody(PhpMethod $method, StructAttributeModel $attribute)
    {
        $parameters = $method->getParameters();
        $parameter = array_shift($parameters);
        $parameterName = is_string($parameter) ? $parameter : $parameter->getName();
        if ($this->getGenerator()->getOptionValidation()) {
            $this->applyRules($method, $attribute, $parameterName);
        }
        return $this
            ->addStructMethodSetBodyAssignment($method, $attribute, $parameterName)
            ->addStructMethodSetBodyReturn($method);
    }
    /**
     * @param PhpMethod $method
     * @param StructAttributeModel $attribute
     * @param string $parameterName
     * @return Struct
     */
    protected function addStructMethodSetBodyAssignment(PhpMethod $method, StructAttributeModel $attribute, $parameterName)
    {
        if ($attribute->getRemovableFromRequest() || $attribute->isAChoice()) {
            $method
                ->addChild(sprintf('if (is_null($%1$s) || (is_array($%1$s) && empty($%1$s))) {', $parameterName))
                ->addChild($method->getIndentedString(sprintf('unset($this->%1$s%2$s);', $attribute->getCleanName(), $attribute->nameIsClean() ? '' : sprintf(', $this->{\'%s\'}', addslashes($attribute->getName()))), 1))
                ->addChild('} else {')
                ->addChild($method->getIndentedString($this->getStructMethodSetBodyAssignment($attribute, $parameterName), 1))
                ->addChild('}');
        } else {
            $method->addChild($this->getStructMethodSetBodyAssignment($attribute, $parameterName));
        }
        return $this;
    }
    /**
     * @param PhpMethod $method
     * @return Struct
     */
    protected function addStructMethodSetBodyReturn(PhpMethod $method)
    {
        $method->addChild('return $this;');
        return $this;
    }
    /**
     * @param StructAttributeModel $attribute
     * @param string $parameterName
     * @return string
     */
    protected function getStructMethodSetBodyAssignment(StructAttributeModel $attribute, $parameterName)
    {
        $prefix = '$';
        if ($this->isAttributeAList($attribute)) {
            $prefix = '';
            $parameterName = sprintf('is_array($%1$s) ? implode(\' \', $%1$s) : null', $parameterName);
        } elseif ($attribute->isXml()) {
            $prefix = '';
            $parameterName = sprintf('($%1$s instanceof \DOMDocument) && $%1$s->hasChildNodes() ? $%1$s->saveXML($%1$s->childNodes->item(0)) : $%1$s', $parameterName);
        }
        if ($attribute->nameIsClean()) {
            $assignment = sprintf('$this->%s = %s%s;', $attribute->getName(), $prefix, $parameterName);
        } else {
            $assignment = sprintf('$this->%s = $this->{\'%s\'} = %s%s;', $attribute->getCleanName(), addslashes($attribute->getName()), $prefix, $parameterName);
        }
        return $assignment;
    }
    /**
     * @param PhpMethod $method
     * @param StructAttributeModel $attribute
     * @param string $thisAccess
     * @return Struct
     */
    protected function addStructMethodGetBody(PhpMethod $method, StructAttributeModel $attribute, $thisAccess)
    {
        return $this->addStructMethodGetBodyReturn($method, $attribute, $thisAccess);
    }
    /**
     * @param PhpMethod $method
     * @param StructAttributeModel $attribute
     * @param string $thisAccess
     * @return Struct
     */
    protected function addStructMethodGetBodyReturn(PhpMethod $method, StructAttributeModel $attribute, $thisAccess)
    {
        $return = sprintf('return $this->%s;', $thisAccess);
        if ($attribute->isXml()) {
            $method
                ->addChild('$domDocument = null;')
                ->addChild(sprintf('if (!empty($this->%1$s) && !$asString) {', $thisAccess))
                ->addChild($method->getIndentedString('$domDocument = new \DOMDocument(\'1.0\', \'UTF-8\');', 1))
                ->addChild($method->getIndentedString(sprintf('$domDocument->loadXML($this->%s);', $thisAccess), 1))
                ->addChild('}');
            if ($attribute->getRemovableFromRequest() || $attribute->isAChoice()) {
                $return = sprintf('return $asString ? (isset($this->%1$s) ? $this->%1$s : null) : $domDocument;', $thisAccess);
            } else {
                $return = sprintf('return $asString ? $this->%1$s : $domDocument;', $thisAccess);
            }
        } elseif ($attribute->getRemovableFromRequest() || $attribute->isAChoice()) {
            $return = sprintf('return isset($this->%1$s) ? $this->%1$s : null;', $thisAccess);
        }
        $method->addChild($return);
        return $this;
    }
    /**
     * @param StructAttributeModel $attribute
     * @return Struct
     */
    protected function addStructMethodGet(StructAttributeModel $attribute)
    {
        $method = new PhpMethod($attribute->getGetterName(), $this->getStructMethodGetParameters($attribute));
        if ($attribute->nameIsClean()) {
            $thisAccess = sprintf('%s', $attribute->getName());
        } else {
            $thisAccess = sprintf('{\'%s\'}', addslashes($attribute->getName()));
        }
        $this->addStructMethodGetBody($method, $attribute, $thisAccess);
        $this->methods->add($method);
        return $this;
    }
    /**
     * @param StructAttributeModel $attribute
     * @return PhpFunctionParameter[]
     */
    protected function getStructMethodGetParameters(StructAttributeModel $attribute)
    {
        $parameters = [];
        if ($attribute->isXml()) {
            $parameters[] = new PhpFunctionParameter('asString', true, null, $attribute);
        }
        return $parameters;
    }
    /**
     * @return PhpAnnotationBlock|null
     */
    protected function getMethodAnnotationBlock(PhpMethod $method)
    {
        return $this->getStructMethodAnnotationBlock($method);
    }
    /**
     * @param PhpMethod $method
     * @return PhpAnnotationBlock|null
     */
    protected function getStructMethodAnnotationBlock(PhpMethod $method)
    {
        $annotationBlock = null;
        switch ($method->getName()) {
            case self::METHOD_CONSTRUCT:
                $annotationBlock = $this->getStructMethodConstructAnnotationBlock();
                break;
            case 0 === mb_strpos($method->getName(), 'get'):
            case 0 === mb_strpos($method->getName(), 'set'):
                $annotationBlock = $this->getStructMethodsSetAndGetAnnotationBlock($method);
                break;
            case 0 === mb_strpos($method->getName(), 'addTo'):
                $annotationBlock = $this->getStructMethodsAddToAnnotationBlock($method);
                break;
            case false !== mb_strpos($method->getName(), 'ForUnionConstraintsFrom'):
                $annotationBlock = $this->getStructMethodsValidateUnionAnnotationBlock($method);
                break;
            case false !== mb_strpos($method->getName(), 'ForArrayConstraintsFrom'):
                $annotationBlock = $this->getStructMethodsValidateArrayAnnotationBlock($method);
                break;
            case false !== mb_strpos($method->getName(), 'ForChoiceConstraintsFrom'):
                $annotationBlock = $this->getStructMethodsValidateChoiceAnnotationBlock($method);
                break;
            case false !== mb_strpos($method->getName(), 'MaxLengthConstraintFrom'):
                $annotationBlock = $this->getStructMethodsValidateLengthAnnotationBlock($method, 'max');
                break;
            case false !== mb_strpos($method->getName(), 'MinLengthConstraintFrom'):
                $annotationBlock = $this->getStructMethodsValidateLengthAnnotationBlock($method, 'min');
                break;
            case false !== mb_strpos($method->getName(), 'LengthConstraintFrom'):
                $annotationBlock = $this->getStructMethodsValidateLengthAnnotationBlock($method);
                break;
        }
        return $annotationBlock;
    }
    /**
     * @return PhpAnnotationBlock
     */
    protected function getStructMethodConstructAnnotationBlock()
    {
        $annotationBlock = new PhpAnnotationBlock([
            sprintf('Constructor method for %s', $this->getModel()->getName()),
        ]);
        $this->addStructPropertiesToAnnotationBlock($annotationBlock);
        return $annotationBlock;
    }
    /**
     * @param PhpMethod $method
     * @return PhpAnnotationBlock
     */
    protected function getStructMethodsSetAndGetAnnotationBlock(PhpMethod $method)
    {
        $parameters = $method->getParameters();
        $setOrGet = mb_strtolower(mb_substr($method->getName(), 0, 3));
        $parameter = array_shift($parameters);
        /**
         * Only set parameter must be based on a potential PhpFunctionParameter
         */
        if ($parameter instanceof PhpFunctionParameter && $setOrGet === 'set') {
            $parameterName = ucfirst($parameter->getName());
        } else {
            $parameterName = mb_substr($method->getName(), 3);
        }
        /**
         * Since properties can be duplicated with different case, we assume that _\d+ is replaceable by an empty string as methods are "duplicated" with this suffix
         */
        $parameterName = preg_replace('/(_\d+)/', '', $parameterName);
        $attribute = $this->getModel()->getAttribute($parameterName);
        if (!$attribute instanceof StructAttributeModel) {
            $attribute = $this->getModel()->getAttributeByCleanName($parameterName);
        }
        if (!$attribute instanceof StructAttributeModel) {
            $parameterName = lcfirst($parameterName);
            $attribute = $this->getModel()->getAttribute($parameterName);
            if (!$attribute instanceof StructAttributeModel) {
                $attribute = $this->getModel()->getAttributeByCleanName($parameterName);
            }
        }
        $setValueAnnotation = '%s %s value';
        $annotationBlock = new PhpAnnotationBlock();
        if ($attribute instanceof StructAttributeModel) {
            $annotationBlock->addChild(sprintf($setValueAnnotation, ucfirst($setOrGet), $parameterName));
            $this->addStructMethodsSetAndGetAnnotationBlockFromStructAttribute($setOrGet, $annotationBlock, $attribute);
        } elseif (empty($attribute)) {
            $annotationBlock->addChild(sprintf($setValueAnnotation, ucfirst($setOrGet), lcfirst($parameterName)));
            $this->addStructMethodsSetAndGetAnnotationBlockFromScalar($setOrGet, $annotationBlock, $parameterName);
        }
        return $annotationBlock;
    }
    /**
     * @param string $setOrGet
     * @param PhpAnnotationBlock $annotationBlock
     * @param StructAttributeModel $attribute
     * @return Struct
     */
    protected function addStructMethodsSetAndGetAnnotationBlockFromStructAttribute($setOrGet, PhpAnnotationBlock $annotationBlock, StructAttributeModel $attribute)
    {
        switch ($setOrGet) {
            case 'set':
                if ($attribute->getRemovableFromRequest()) {
                    $annotationBlock->addChild('This property is removable from request (nillable=true+minOccurs=0), therefore if the value assigned to this property is null, it is removed from this object');
                }
                if ($attribute->isAChoice()) {
                    $annotationBlock->addChild('This property belongs to a choice that allows only one property to exist. It is therefore removable from the request, consequently if the value assigned to this property is null, the property is removed from this object');
                }
                if ($attribute->isXml()) {
                    $annotationBlock
                        ->addChild(new PhpAnnotation(self::ANNOTATION_USES, '\DOMDocument::hasChildNodes()'))
                        ->addChild(new PhpAnnotation(self::ANNOTATION_USES, '\DOMDocument::saveXML()'))
                        ->addChild(new PhpAnnotation(self::ANNOTATION_USES, '\DOMNode::item()'));
                }
                if ($this->getGenerator()->getOptionValidation()) {
                    if ($attribute->isAChoice()) {
                        $annotationBlock->addChild(new PhpAnnotation(self::ANNOTATION_THROWS, '\InvalidArgumentException'));
                    }
                    if (($model = $this->getRestrictionFromStructAttribute($attribute)) instanceof StructModel) {
                        $annotationBlock
                            ->addChild(new PhpAnnotation(self::ANNOTATION_USES, sprintf('%s::%s()', $model->getPackagedName(true), StructEnum::METHOD_VALUE_IS_VALID)))
                            ->addChild(new PhpAnnotation(self::ANNOTATION_USES, sprintf('%s::%s()', $model->getPackagedName(true), StructEnum::METHOD_GET_VALID_VALUES)))
                            ->addChild(new PhpAnnotation(self::ANNOTATION_THROWS, '\InvalidArgumentException'));
                    } elseif ($attribute->isArray()) {
                        $annotationBlock->addChild(new PhpAnnotation(self::ANNOTATION_THROWS, '\InvalidArgumentException'));
                    }
                }
                $this->addStructMethodsSetAnnotationBlock($annotationBlock, $this->getStructAttributeTypeSetAnnotation($attribute), lcfirst($attribute->getCleanName()));
                break;
            case 'get':
                if ($attribute->getRemovableFromRequest()) {
                    $annotationBlock->addChild('An additional test has been added (isset) before returning the property value as this property may have been unset before, due to the fact that this property is removable from the request (nillable=true+minOccurs=0)');
                }
                $this
                    ->addStructMethodsGetAnnotationBlockFromXmlAttribute($annotationBlock, $attribute)
                    ->addStructMethodsGetAnnotationBlock($annotationBlock, $this->getStructAttributeTypeGetAnnotation($attribute));
                break;
        }
        return $this;
    }
    /**
     * @param string $setOrGet
     * @param PhpAnnotationBlock $annotationBlock
     * @param string $attributeName
     * @return Struct
     */
    protected function addStructMethodsSetAndGetAnnotationBlockFromScalar($setOrGet, PhpAnnotationBlock $annotationBlock, $attributeName)
    {
        switch ($setOrGet) {
            case 'set':
                $this->addStructMethodsSetAnnotationBlock($annotationBlock, lcfirst($attributeName), lcfirst($attributeName));
                break;
            case 'get':
                $this->addStructMethodsGetAnnotationBlock($annotationBlock, lcfirst($attributeName));
                break;
        }
        return $this;
    }
    /**
     * @param PhpAnnotationBlock $annotationBlock
     * @param string $type
     * @param string $name
     * @return Struct
     */
    protected function addStructMethodsSetAnnotationBlock(PhpAnnotationBlock $annotationBlock, $type, $name)
    {
        $annotationBlock->addChild(new PhpAnnotation(self::ANNOTATION_PARAM, sprintf('%s $%s', $type, $name)))->addChild(new PhpAnnotation(self::ANNOTATION_RETURN, $this->getModel()->getPackagedName(true)));
        return $this;
    }
    /**
     * @param PhpAnnotationBlock $annotationBlock
     * @param string $attributeType
     * @return Struct
     */
    protected function addStructMethodsGetAnnotationBlock(PhpAnnotationBlock $annotationBlock, $attributeType)
    {
        $annotationBlock->addChild(new PhpAnnotation(self::ANNOTATION_RETURN, $attributeType));
        return $this;
    }
    /**
     * @param PhpAnnotationBlock $annotationBlock
     * @param StructAttributeModel $attribute
     * @return Struct
     */
    protected function addStructMethodsGetAnnotationBlockFromXmlAttribute(PhpAnnotationBlock $annotationBlock, StructAttributeModel $attribute)
    {
        if ($attribute->isXml()) {
            $annotationBlock
                ->addChild(new PhpAnnotation(self::ANNOTATION_USES, '\DOMDocument::loadXML()'))
                ->addChild(new PhpAnnotation(self::ANNOTATION_PARAM, 'bool $asString true: returns XML string, false: returns \DOMDocument'));
        }
        return $this;
    }
    /**
     * @param PhpAnnotationBlock $annotationBlock
     * @return Struct
     */
    protected function addStructPropertiesToAnnotationBlock(PhpAnnotationBlock $annotationBlock)
    {
        return $this->addStructPropertiesToAnnotationBlockUses($annotationBlock)->addStructPropertiesToAnnotationBlockParams($annotationBlock);
    }
    /**
     * @param PhpAnnotationBlock $annotationBlock
     * @return Struct
     */
    protected function addStructPropertiesToAnnotationBlockUses(PhpAnnotationBlock $annotationBlock)
    {
        foreach ($this->getModelAttributes() as $attribute) {
            $annotationBlock->addChild(new PhpAnnotation(self::ANNOTATION_USES, sprintf('%s::%s()', $this->getModel()->getPackagedName(), $attribute->getSetterName())));
        }
        return $this;
    }
    /**
     * @param PhpAnnotationBlock $annotationBlock
     * @return Struct
     */
    protected function addStructPropertiesToAnnotationBlockParams(PhpAnnotationBlock $annotationBlock)
    {
        foreach ($this->getModelAttributes() as $attribute) {
            $annotationBlock->addChild(new PhpAnnotation(self::ANNOTATION_PARAM, sprintf('%s $%s', $this->getStructAttributeTypeSetAnnotation($attribute), lcfirst($attribute->getCleanName()))));
        }
        return $this;
    }
    /**
     * @param PhpMethod $method
     * @return PhpAnnotationBlock
     */
    protected function getStructMethodsAddToAnnotationBlock(PhpMethod $method)
    {
        $methodParameters = $method->getParameters();
        $firstParameter = array_shift($methodParameters);
        $attribute = $this->getModel()->getAttribute($firstParameter->getModel()->getName());
        $annotationBlock = new PhpAnnotationBlock();
        if ($attribute instanceof StructAttributeModel) {
            $model = $this->getRestrictionFromStructAttribute($attribute);
            $annotationBlock->addChild(sprintf('Add item to %s value', $attribute->getCleanName()));
            if ($model instanceof StructModel) {
                $annotationBlock
                    ->addChild(new PhpAnnotation(self::ANNOTATION_USES, sprintf('%s::%s()', $model->getPackagedName(true), StructEnum::METHOD_VALUE_IS_VALID)))
                    ->addChild(new PhpAnnotation(self::ANNOTATION_USES, sprintf('%s::%s()', $model->getPackagedName(true), StructEnum::METHOD_GET_VALID_VALUES)));
            }
            $annotationBlock
                ->addChild(new PhpAnnotation(self::ANNOTATION_THROWS, '\InvalidArgumentException'))
                ->addChild(new PhpAnnotation(self::ANNOTATION_PARAM, sprintf('%s $item', $this->getStructAttributeTypeSetAnnotation($attribute, false))))
                ->addChild(new PhpAnnotation(self::ANNOTATION_RETURN, $this->getModel()->getPackagedName(true)));
        }
        return $annotationBlock;
    }
    /**
     * @param PhpMethod $method
     * @return PhpAnnotationBlock
     */
    protected function getStructMethodsValidateArrayAnnotationBlock(PhpMethod $method)
    {
        $methodName = lcfirst(mb_substr($method->getName(), mb_strpos($method->getName(), 'ForArrayConstraintsFrom') + mb_strlen('ForArrayConstraintsFrom')));
        return new PhpAnnotationBlock([
            new PhpAnnotation(PhpAnnotation::NO_NAME, sprintf('This method is responsible for validating the values passed to the %s method', $methodName), self::ANNOTATION_LONG_LENGTH),
            new PhpAnnotation(PhpAnnotation::NO_NAME, sprintf('This method is willingly generated in order to preserve the one-line inline validation within the %s method', $methodName), self::ANNOTATION_LONG_LENGTH),
            new PhpAnnotation(self::ANNOTATION_PARAM, 'array $values'),
            new PhpAnnotation(self::ANNOTATION_RETURN, 'string A non-empty message if the values does not match the validation rules'),
        ]);
    }
    /**
     * @param PhpMethod $method
     * @return PhpAnnotationBlock
     */
    protected function getStructMethodsValidateUnionAnnotationBlock(PhpMethod $method)
    {
        $methodName = lcfirst(mb_substr($method->getName(), mb_strpos($method->getName(), 'ForUnionConstraintsFrom') + mb_strlen('ForUnionConstraintsFrom')));
        return new PhpAnnotationBlock([
            new PhpAnnotation(PhpAnnotation::NO_NAME, sprintf('This method is responsible for validating the value passed to the %s method', $methodName), self::ANNOTATION_LONG_LENGTH),
            new PhpAnnotation(PhpAnnotation::NO_NAME, sprintf('This method is willingly generated in order to preserve the one-line inline validation within the %s method', $methodName), self::ANNOTATION_LONG_LENGTH),
            new PhpAnnotation(PhpAnnotation::NO_NAME, sprintf('This is a set of validation rules based on the union types associated to the property being set by the %s method', $methodName), self::ANNOTATION_LONG_LENGTH),
            new PhpAnnotation(self::ANNOTATION_PARAM, 'mixed $value'),
            new PhpAnnotation(self::ANNOTATION_RETURN, 'string A non-empty message if the values does not match the validation rules'),
        ]);
    }
    /**
     * @param PhpMethod $method
     * @return PhpAnnotationBlock
     */
    protected function getStructMethodsValidateChoiceAnnotationBlock(PhpMethod $method)
    {
        $methodName = lcfirst(mb_substr($method->getName(), mb_strpos($method->getName(), 'ForChoiceConstraintsFrom') + mb_strlen('ForChoiceConstraintsFrom')));
        return new PhpAnnotationBlock([
            new PhpAnnotation(PhpAnnotation::NO_NAME, sprintf('This method is responsible for validating the value passed to the %s method', $methodName), self::ANNOTATION_LONG_LENGTH),
            new PhpAnnotation(PhpAnnotation::NO_NAME, sprintf('This method is willingly generated in order to preserve the one-line inline validation within the %s method', $methodName), self::ANNOTATION_LONG_LENGTH),
            new PhpAnnotation(PhpAnnotation::NO_NAME, 'This has to validate that the property which is being set is the only one among the given choices', self::ANNOTATION_LONG_LENGTH),
            new PhpAnnotation(self::ANNOTATION_PARAM, 'mixed $value'),
            new PhpAnnotation(self::ANNOTATION_RETURN, 'string A non-empty message if the values does not match the validation rules'),
        ]);
    }
    /**
     * @param PhpMethod $method
     * @param string $type
     * @return PhpAnnotationBlock
     */
    protected function getStructMethodsValidateLengthAnnotationBlock(PhpMethod $method, $type = '')
    {
        $replace = sprintf('%sLengthConstraintFrom', ucfirst($type));
        $methodName = lcfirst(mb_substr($method->getName(), mb_strpos($method->getName(), $replace) + mb_strlen($replace)));
        return new PhpAnnotationBlock([
            new PhpAnnotation(PhpAnnotation::NO_NAME, sprintf('This method is responsible for validating the value passed to the %s method', $methodName), self::ANNOTATION_LONG_LENGTH),
            new PhpAnnotation(PhpAnnotation::NO_NAME, sprintf('This method is willingly generated in order to preserve the one-line inline validation within the %s method', $methodName), self::ANNOTATION_LONG_LENGTH),
            new PhpAnnotation(PhpAnnotation::NO_NAME, 'This has to validate that the items contained by the array match the length constraint', self::ANNOTATION_LONG_LENGTH),
            new PhpAnnotation(self::ANNOTATION_PARAM, 'mixed $values'),
            new PhpAnnotation(self::ANNOTATION_RETURN, 'string A non-empty message if the values does not match the validation rules'),
        ]);
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\File\AbstractModelFile::getModel()
     * @return StructModel
     */
    public function getModel()
    {
        return parent::getModel();
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\File\AbstractModelFile::setModel()
     * @throws \InvalidArgumentException
     * @param AbstractModel $model
     * @return StructArray
     */
    public function setModel(AbstractModel $model)
    {
        if (!$model instanceof StructModel) {
            throw new \InvalidArgumentException('Model must be an instance of a Struct', __LINE__);
        }
        return parent::setModel($model);
    }
    /**
     * @param PhpMethod $method
     * @param StructAttributeModel $attribute
     * @param $parameterName
     * @param bool $itemType
     */
    protected function applyRules(PhpMethod $method, StructAttributeModel $attribute, $parameterName, $itemType = false)
    {
        if ($this->getGenerator()->getOptionValidation()) {
            $rules = new Rules($this, $method, $attribute, $this->methods);
            $rules->applyRules($parameterName, $itemType);
        }
    }
}
