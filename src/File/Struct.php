<?php

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PackageGenerator\Model\AbstractModel;
use WsdlToPhp\PackageGenerator\Model\StructAttribute as StructAttributeModel;
use WsdlToPhp\PackageGenerator\Model\Struct as StructModel;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Method as MethodContainer;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Property as PropertyContainer;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Constant as ConstantContainer;
use WsdlToPhp\PackageGenerator\Container\Model\StructAttribute as StructAttributeContainer;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotation;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotationBlock;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;
use WsdlToPhp\PhpGenerator\Element\PhpProperty;
use WsdlToPhp\PhpGenerator\Element\PhpConstant;
use WsdlToPhp\PhpGenerator\Element\PhpFunctionParameter;

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
     * @param bool $includeInheritanceAttributes include the attributes of parent class, default parent attributes are not included. If true, then the array is an associative array containing and index "attribute" for the StructAttribute object and an index "model" for the Struct object.
     * @param bool $requiredFirst places the required attributes first, then the not required in order to have the _contrust method with the required attribute at first
     * @return StructAttributeContainer
     */
    protected function getModelAttributes($includeInheritanceAttributes = false, $requiredFirst = true)
    {
        return $this->getModel()->getAttributes($includeInheritanceAttributes, $requiredFirst);
    }
    /**
     * @param PropertyContainer
     */
    protected function getClassProperties(PropertyContainer $properties)
    {
        if ($this->getModel()->getAttributes()->count() > 0) {
            foreach ($this->getModelAttributes() as $attribute) {
                $properties->add(new PhpProperty($attribute->getCleanName(), PhpProperty::NO_VALUE));
            }
        }
    }
    /**
     * @return PhpAnnotationBlock
     */
    protected function getPropertyAnnotationBlock(PhpProperty $property)
    {
        $annotationBlock = new PhpAnnotationBlock();
        $annotationBlock->addChild(sprintf('The %s', $property->getName()));
        if (($attribute = $this->getModel()->getAttribute($property->getName())) instanceof StructAttributeModel) {
            $this->defineModelAnnotationsFromWsdl($annotationBlock, $attribute);
            if (($model = $this->getModelFromStructAttribute($attribute)) instanceof StructModel && $model->getName() !== $attribute->getName()) {
                $this->defineModelAnnotationsFromWsdl($annotationBlock, $model);
            }
            $annotationBlock->addChild(new PhpAnnotation(self::ANNOTATION_VAR, $this->getStructAttributeTypeSetAnnotation($attribute, true)));
        }
        return $annotationBlock;
    }
    /**
     * @param MethodContainer
     */
    protected function getClassMethods(MethodContainer $methods)
    {
        $this
            ->addStructMethodConstruct($methods)
            ->addStructMethodsSetAndGet($methods)
            ->addStructMethodSetState($methods);
    }
    /**
     * @param MethodContainer $methods
     * @return Struct
     */
    protected function addStructMethodConstruct(MethodContainer $methods)
    {
        $method = new PhpMethod(self::METHOD_CONSTRUCT, $this->getStructMethodParametersValues());
        $this->addStructMethodConstructBody($method);
        $methods->add($method);
        return $this;
    }
    /**
     * @param PhpMethod $method
     * @return Struct
     */
    protected function addStructMethodConstructBody(PhpMethod $method)
    {
        $count = $this->getModelAttributes()->count();
        foreach ($this->getModelAttributes() as $index=>$attribute) {
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
        $method->addChild($method->getIndentedString(sprintf('->%s($%s)%s', $attribute->getSetterName(), lcfirst($attribute->getCleanName()), $isLast ? ';' : ''), 1));
        return $this;
    }
    /**
     * @return PhpFunctionParameter[]
     */
    protected function getStructMethodParametersValues()
    {
        $parametersValues = array();
        foreach ($this->getModelAttributes() as $attribute) {
            $parametersValues[] = $this->getStructMethodParameter($attribute, true);
        }
        return $parametersValues;
    }
    /**
     * @param StructAttributeModel $attribute
     * @param bool $lowCaseFirstLetter
     * @param mixed $defaultValue
     * @return PhpFunctionParameter
     */
    protected function getStructMethodParameter(StructAttributeModel $attribute, $lowCaseFirstLetter = false, $defaultValue = null)
    {
        try {
            return new PhpFunctionParameter($lowCaseFirstLetter ? lcfirst($attribute->getCleanName()) : $attribute->getCleanName(), isset($defaultValue) ? $defaultValue : $attribute->getDefaultValue(), $this->getStructMethodParameterType($attribute));
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
        return self::getValidType($this->getStructAttributeTypeHint($attribute, $returnArrayType), null);
    }
    /**
     * @param MethodContainer $methods
     * @return Struct
     */
    protected function addStructMethodsSetAndGet(MethodContainer $methods)
    {
        foreach ($this->getModelAttributes() as $attribute) {
            $this
                ->addStructMethodGet($methods, $attribute)
                ->addStructMethodSet($methods, $attribute)
                ->addStructMethodAddTo($methods, $attribute);
        }
        return $this;
    }
    /**
     * @param MethodContainer $methods
     * @param StructAttributeModel $attribute
     * @return Struct
     */
    protected function addStructMethodAddTo(MethodContainer $methods, StructAttributeModel $attribute)
    {
        if ($attribute->isArray()) {
            $method = new PhpMethod(sprintf('addTo%s', ucfirst($attribute->getCleanName())), array(
                new PhpFunctionParameter('item', PhpFunctionParameter::NO_VALUE, $this->getStructMethodParameterType($attribute, false)),
            ));
            $this->addStructMethodAddToBody($method, $attribute);
            $methods->add($method);
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
        $this->addStructMethodSetBodyForRestriction($method, $attribute, 'item');
        $method
            ->addChild(sprintf('$this->%s[] = $item;', $attribute->getCleanName()))
            ->addChild('return $this;');
        return $this;
    }
    /**
     * @param MethodContainer $methods
     * @param StructAttributeModel $attribute
     * @return Struct
     */
    protected function addStructMethodSet(MethodContainer $methods, StructAttributeModel $attribute)
    {
        $method = new PhpMethod($attribute->getSetterName(), array(
            $this->getStructMethodParameter($attribute, true, null),
        ));
        $this->addStructMethodSetBody($method, $attribute);
        $methods->add($method);
        return $this;
    }
    /**
     * @param PhpMethod $method
     * @param StructAttributeModel $attribute
     * @return Struct
     */
    protected function addStructMethodSetBody(PhpMethod $method, StructAttributeModel $attribute)
    {
        return $this
            ->addStructMethodSetBodyForRestriction($method, $attribute)
            ->addStructMethodSetBodyForArray($method, $attribute)
            ->addStructMethodSetBodyAssignment($method, $attribute)
            ->addStructMethodSetBodyReturn($method);
    }
    /**
     * @param PhpMethod $method
     * @param StructAttributeModel $attribute
     * @return Struct
     */
    protected function addStructMethodSetBodyAssignment(PhpMethod $method, StructAttributeModel $attribute)
    {
        $method->addChild($this->getStructMethodSetBodyAssignment($attribute));
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
     * @param PhpMethod $method
     * @param StructAttributeModel $attribute
     * @param string $parameterName
     * @return Struct
     */
    protected function addStructMethodSetBodyForRestriction(PhpMethod $method, StructAttributeModel $attribute, $parameterName = null)
    {
        if (($model = $this->getModelFromStructAttribute($attribute)) instanceof StructModel && $model->getIsRestriction() && !$attribute->isArray()) {
            $parameterName = empty($parameterName) ? lcfirst($attribute->getCleanName()) : $parameterName;
            $method
                ->addChild(sprintf('if (!%s::%s($%s)) {', $model->getPackagedName(true), StructEnum::METHOD_VALUE_IS_VALID, $parameterName))
                    ->addChild($method->getIndentedString(sprintf('throw new \InvalidArgumentException(sprintf(\'Value "%%s" is invalid, please use one of: %%s\', $%s, implode(\', \', %s::%s())), __LINE__);', $parameterName, $model->getPackagedName(true), StructEnum::METHOD_GET_VALID_VALUES), 1))
                ->addChild('}');
        }
        return $this;
    }
    /**
     * @param PhpMethod $method
     * @param StructAttributeModel $attribute
     * @return Struct
     */
    protected function addStructMethodSetBodyForArray(PhpMethod $method, StructAttributeModel $attribute)
    {
        if ($attribute->isArray()) {
            $model = $this->getModelFromStructAttribute($attribute);
            $parameterName = lcfirst($attribute->getCleanName());
            if ($model instanceof StructModel && $model->getIsRestriction()) {
                $method
                    ->addChild('$invalidValues = array();')
                    ->addChild(sprintf('array_walk($%s, function($item) {', $parameterName))
                        ->addChild($method->getIndentedString(sprintf('if (!%s::%s($item)) {', $model->getPackagedName(true), StructEnum::METHOD_VALUE_IS_VALID), 1))
                            ->addChild($method->getIndentedString('$invalidValues[] = var_export($item);', 2))
                        ->addChild($method->getIndentedString('}', 1))
                    ->addChild('});')
                    ->addChild('if (!empty($invalidValues)) {')
                        ->addChild($method->getIndentedString(sprintf('throw new \InvalidArgumentException(sprintf(\'Value(s) "%%s" is/are invalid, please use one of: %%s\', implode(\', \', $invalidValues), implode(\', \', %s::%s())), __LINE__);', $model->getPackagedName(true), StructEnum::METHOD_GET_VALID_VALUES), 1))
                    ->addChild('}');
            } else {
                $method
                    ->addChild(sprintf('array_walk($%s, function($item) {', $parameterName))
                        ->addChild($method->getIndentedString(sprintf('if (!%s) {', $this->getStructMethodSetBodyForArrayItemSanityCheck($attribute)), 1))
                            ->addChild($method->getIndentedString(sprintf('throw new \InvalidArgumentException(sprintf(\'The %s property can only contain items of %s, "%%s" given\', is_object($item) ? get_class($item) : gettype($item)), __LINE__);', $attribute->getCleanName(), $this->getStructAttributeType($attribute, true)), 2))
                        ->addChild($method->getIndentedString('}', 1))
                    ->addChild('});');
            }
        }
        return $this;
    }
    /**
     * The second case which used PHP native functions is volontary limited by the native functions provided by PHP,
     * and the possible types defined in xsd_types.yml
     * @param StructAttributeModel $attribute
     */
    protected function getStructMethodSetBodyForArrayItemSanityCheck(StructAttributeModel $attribute)
    {
        $model = $this->getModelFromStructAttribute($attribute);
        $sanityCheck = 'false';
        if ($model instanceof StructModel) {
            $sanityCheck = sprintf('$item instanceof %s', $this->getStructAttributeType($attribute, true));
        } else {
            switch (self::getPhpType($attribute->getType())) {
                case 'int';
                    $sanityCheck = 'is_int($item)';
                    break;
                case 'bool';
                    $sanityCheck = 'is_bool($item)';
                    break;
                case 'float';
                    $sanityCheck = 'is_float($item)';
                    break;
                case 'string';
                    $sanityCheck = 'is_string($item)';
                    break;
            }
        }
        return $sanityCheck;
    }
    /**
     * @param StructAttributeModel $attribute
     * @return string
     */
    protected function getStructMethodSetBodyAssignment(StructAttributeModel $attribute)
    {
        if ($attribute->nameIsClean()) {
            $assignment = sprintf('$this->%s = $%s;', $attribute->getName(), lcfirst($attribute->getCleanName()));
        } else {
            $assignment = sprintf('$this->%s = $this->{\'%s\'} = $%s;', $attribute->getCleanName(), addslashes($attribute->getName()), lcfirst($attribute->getCleanName()));
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
        return $this
            ->addStructMethodGetBodyForXml($method, $attribute, $thisAccess)
            ->addStructMethodGetBodyReturn($method, $attribute, $thisAccess);
    }
    /**
     * @param PhpMethod $method
     * @param StructAttributeModel $attribute
     * @param string $thisAccess
     * @return Struct
     */
    protected function addStructMethodGetBodyForXml(PhpMethod $method, StructAttributeModel $attribute, $thisAccess)
    {
        if ($attribute->isXml()) {
            $method
                ->addChild(sprintf('if (!empty($this->%1$s) && !($this->%1$s instanceof \DOMDocument)) {', $thisAccess))
                    ->addChild($method->getIndentedString('$dom = new \DOMDocument(\'1.0\', \'UTF-8\');', 1))
                    ->addChild($method->getIndentedString('$dom->formatOutput = true;', 1))
                    ->addChild($method->getIndentedString(sprintf('if ($dom->loadXML($this->%s)) {', $thisAccess), 1))
                    ->addChild($method->getIndentedString(sprintf('$this->%s($dom);', $attribute->getSetterName()), 2))
                    ->addChild($method->getIndentedString('}', 1))
                    ->addChild($method->getIndentedString('unset($dom);', 1))
                ->addChild('}');
        }
        return $this;
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
            $return = sprintf('return ($asString && ($this->%1$s instanceof \DOMDocument) && $this->%1$s->hasChildNodes()) ? $this->%1$s->saveXML($this->%1$s->childNodes->item(0)) : $this->%1$s;', $thisAccess);
        }
        $method->addChild($return);
        return $this;
    }
    /**
     * @param MethodContainer $methods
     * @param StructAttributeModel $attribute
     * @return Struct
     */
    protected function addStructMethodGet(MethodContainer $methods, StructAttributeModel $attribute)
    {
        $method = new PhpMethod($attribute->getGetterName(), $this->getStructMethodGetParameters($attribute));
        if ($attribute->nameIsClean()) {
            $thisAccess = sprintf('%s', $attribute->getName());
        } else {
            $thisAccess = sprintf('{\'%s\'}', addslashes($attribute->getName()));
        }
        $this->addStructMethodGetBody($method, $attribute, $thisAccess);
        $methods->add($method);
        return $this;
    }
    /**
     * @param StructAttributeModel $attribute
     * @return PhpFunctionParameter[]
     */
    protected function getStructMethodGetParameters(StructAttributeModel $attribute)
    {
        $parameters = array();
        if ($attribute->isXml()) {
            $parameters[] = new PhpFunctionParameter('asString', true);
        }
        return $parameters;
    }
    /**
     * @param MethodContainer $methods
     * @return Struct
     */
    protected function addStructMethodSetState(MethodContainer $methods)
    {
        $method = new PhpMethod(self::METHOD_SET_STATE, array(
            new PhpFunctionParameter('array', PhpFunctionParameter::NO_VALUE, 'array'),
        ), PhpMethod::ACCESS_PUBLIC, false, true);
        $method->addChild(sprintf('return parent::__set_state($array);'));
        $methods->add($method);
        return $this;
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
            case self::METHOD_SET_STATE:
                $annotationBlock = $this->getStructMethodSetStateAnnotationBlock();
                break;
            case strpos($method->getName(), 'get') === 0:
            case strpos($method->getName(), 'set') === 0:
                $annotationBlock = $this->getStructMethodsSetAndGetAnnotationBlock($method);
                break;
            case strpos($method->getName(), 'addTo') === 0:
                $annotationBlock = $this->getStructMethodsAddToAnnotationBlock($method);
                break;
        }
        return $annotationBlock;
    }
    /**
     * @return PhpAnnotationBlock
     */
    protected function getStructMethodConstructAnnotationBlock()
    {
        $annotationBlock = new PhpAnnotationBlock(array(
            sprintf('Constructor method for %s', $this->getModel()->getName()),
        ));
        $this->addStructPropertiesToAnnotationBlock($annotationBlock);
        return $annotationBlock;
    }
    /**
     * @return PhpAnnotationBlock
     */
    protected function getStructMethodSetStateAnnotationBlock()
    {
        return new PhpAnnotationBlock(array(
            'Method called when an object has been exported with var_export() functions',
            'It allows to return an object instantiated with the values',
            new PhpAnnotation(self::ANNOTATION_SEE, sprintf('%s::__set_state()', $this->getModel()->getExtends(true))),
            new PhpAnnotation(self::ANNOTATION_USES, sprintf('%s::__set_state()', $this->getModel()->getExtends(true))),
            new PhpAnnotation(self::ANNOTATION_PARAM, 'array $array the exported values'),
            new PhpAnnotation(self::ANNOTATION_RETURN, $this->getModel()->getPackagedName(true)),
        ));
    }
    /**
     * @param PhpMethod $method
     * @return PhpAnnotationBlock
     */
    protected function getStructMethodsSetAndGetAnnotationBlock(PhpMethod $method)
    {
        $parameters = $method->getParameters();
        $setOrGet = strtolower(substr($method->getName(), 0, 3));
        $parameter = array_shift($parameters);
        /**
         * Only set parameter must be based on a potential PhpFunctionParameter
         */
        if ($parameter instanceof PhpFunctionParameter && $setOrGet === 'set') {
            $parameterName = ucfirst($parameter->getName());
        } else {
            $parameterName = substr($method->getName(), 3);
        }
        $attribute = $this->getModel()->getAttribute($parameterName);
        if (!$attribute instanceof StructAttributeModel) {
            $parameterName = lcfirst($parameterName);
            $attribute = $this->getModel()->getAttribute($parameterName);
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
                if (($model = $this->getModelFromStructAttribute($attribute)) instanceof StructModel && $model->getIsRestriction() && !$this->getModel()->isArray()) {
                    $annotationBlock
                        ->addChild(new PhpAnnotation(self::ANNOTATION_USES, sprintf('%s::%s()', $model->getPackagedName(true), StructEnum::METHOD_VALUE_IS_VALID)))
                        ->addChild(new PhpAnnotation(self::ANNOTATION_USES, sprintf('%s::%s()', $model->getPackagedName(true), StructEnum::METHOD_GET_VALID_VALUES)))
                        ->addChild(new PhpAnnotation(self::ANNOTATION_THROWS, '\InvalidArgumentException'));
                } elseif ($attribute->isArray()) {
                    $annotationBlock->addChild(new PhpAnnotation(self::ANNOTATION_THROWS, '\InvalidArgumentException'));
                }
                $this->addStructMethodsSetAnnotationBlock($annotationBlock, $this->getStructAttributeTypeSetAnnotation($attribute), lcfirst($attribute->getCleanName()));
                break;
            case 'get':
                $this->addStructMethodsGetAnnotationBlockFromXmlAttribute($annotationBlock, $attribute);
                $this->addStructMethodsGetAnnotationBlock($annotationBlock, $this->getStructAttributeTypeGetAnnotation($attribute));
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
        $annotationBlock
            ->addChild(new PhpAnnotation(self::ANNOTATION_PARAM, sprintf('%s $%s', $type, $name)))
            ->addChild(new PhpAnnotation(self::ANNOTATION_RETURN, $this->getModel()->getPackagedName(true)));
        return $this;
    }
    /**
     * @param PhpAnnotationBlock $annotationBlock
     * @param string $attribute
     * @return Struct
     */
    protected function addStructMethodsGetAnnotationBlock(PhpAnnotationBlock $annotationBlock, $attribute)
    {
        $annotationBlock->addChild(new PhpAnnotation(self::ANNOTATION_RETURN, $attribute));
        return $this;
    }
    /**
     * @param PhpAnnotationBlock $annotationBlock
     * @param StructAttributeModel $attribute
     */
    protected function addStructMethodsGetAnnotationBlockFromXmlAttribute(PhpAnnotationBlock $annotationBlock, StructAttributeModel $attribute)
    {
        if ($attribute->isXml()) {
            $annotationBlock
                ->addChild(new PhpAnnotation(self::ANNOTATION_USES, '\DOMDocument::loadXML()'))
                ->addChild(new PhpAnnotation(self::ANNOTATION_USES, '\DOMDocument::hasChildNodes()'))
                ->addChild(new PhpAnnotation(self::ANNOTATION_USES, '\DOMDocument::saveXML()'))
                ->addChild(new PhpAnnotation(self::ANNOTATION_USES, '\DOMNode::item()'))
                ->addChild(new PhpAnnotation(self::ANNOTATION_USES, sprintf('%s::%s()', $this->getModel()->getPackagedName(true), $attribute->getSetterName())))
                ->addChild(new PhpAnnotation(self::ANNOTATION_PARAM, 'bool $asString true: returns XML string, false: returns \DOMDocument'));
        }
    }
    /**
     * @param PhpAnnotationBlock $annotationBlock
     * @return Struct
     */
    protected function addStructPropertiesToAnnotationBlock(PhpAnnotationBlock $annotationBlock)
    {
        return $this
            ->addStructPropertiesToAnnotationBlockUses($annotationBlock)
            ->addStructPropertiesToAnnotationBlockParams($annotationBlock);
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
     * @return Struct
     */
    protected function getStructMethodsAddToAnnotationBlock(PhpMethod $method)
    {
        $attributeName = str_replace('addTo', '', $method->getName());
        $attribute = $this->getModel()->getAttribute($attributeName);
        $annotationBlock = new PhpAnnotationBlock();
        if ($attribute instanceof StructAttributeModel) {
            $annotationBlock
                ->addChild(sprintf('Add item to %s value', $attribute->getCleanName()))
                ->addChild(new PhpAnnotation(self::ANNOTATION_PARAM, sprintf('%s $item', $this->getStructAttributeTypeSetAnnotation($attribute, false))))
                ->addChild(new PhpAnnotation(self::ANNOTATION_RETURN, $this->getModel()->getPackagedName(true)));
        }
        return $annotationBlock;
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
     * @throws \InvalidaArgumentException
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
}
