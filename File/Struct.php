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
     * @return null
     */
    protected function getConstantAnnotationBlock(PhpConstant $constant)
    {
        return null;
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
                $properties->add(new PhpProperty($attribute->getName(), PhpProperty::NO_VALUE));
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
            $annotationBlock->addChild(new PhpAnnotation(self::ANNOTATION_VAR, $this->getStructAttributeType($attribute)));
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
        $method = new PhpMethod(self::METHOD_CONSTRUCT, $this->getStructMethodParametersValues(true));
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
        if ($this->getGenerator()->getOptionGenerateWsdlClassFile()) {
            $this->addStructMethodConstructBodyUsingWsdlClass($method);
        } else {
            foreach ($this->getModelAttributes() as $attribute) {
                $this->addStructMethodConstructBodyNotUsingWsdlClass($method, $attribute);
            }
        }
        return $this;
    }
    /**
     * @param PhpMethod $method
     * @return Struct
     */
    protected function addStructMethodConstructBodyUsingWsdlClass(PhpMethod $method)
    {
        $method->addChild(sprintf('%s::__construct(array(%s), false);', $this->getStructMethodConstructParentName(), $this->getStructMethodConstructParentParameters()));
        return $this;
    }
    /**
     * @return string
     */
    protected function getStructMethodConstructParentName()
    {
        $parentName = 'parent';
        $inheritanceModel = $this->getGenerator()->getStruct($this->getModel()->getInheritance());
        if ($inheritanceModel instanceof StructModel && $inheritanceModel->getIsStruct()) {
            $parentName = AbstractModel::getGenericWsdlClassName();
        }
        return $parentName;
    }
    /**
     * @return string
     */
    protected function getStructMethodConstructParentParameters()
    {
        $parentParameters = array();
        foreach ($this->getModelAttributes() as $attribute) {
            $parentPrameter = $this->getStructMethodConstructParentParameter($attribute);
            if (!empty($parentPrameter)) {
                $parentParameters[] = $this->getStructMethodConstructParentParameter($attribute);
            }
        }
        return implode(', ', $parentParameters);
    }
    /**
     * @param StructAttributeModel $attribute
     * @return string
     */
    protected function getStructMethodConstructParentParameter(StructAttributeModel $attribute)
    {
        return sprintf('\'%s\'=>$%s', $attribute->getUniqueName(), lcfirst($attribute->getCleanName()));
    }
    /**
     * @param PhpMethod $method
     * @param StructAttributeModel $attribute
     * @return Struct
     */
    protected function addStructMethodConstructBodyNotUsingWsdlClass(PhpMethod $method, StructAttributeModel $attribute)
    {
        $method->addChild(sprintf('$this->%s($%s);', $attribute->getSetterName(), lcfirst($attribute->getCleanName())));
        return $this;
    }
    /**
     * @param bool $lowCaseFirstLetter
     * @return PhpFunctionParameter[]
     */
    protected function getStructMethodParametersValues($lowCaseFirstLetter = false)
    {
        $parametersValues = array();
        foreach ($this->getModelAttributes() as $attribute) {
            $parametersValues[] = $this->getStructMethodParameter($attribute, $lowCaseFirstLetter);
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
        return new PhpFunctionParameter($lowCaseFirstLetter ? lcfirst($attribute->getName()) : $attribute->getName(), $attribute->isRequired() ? PhpFunctionParameter::NO_VALUE : (empty($defaultValue) ? $attribute->getDefaultValue() : $defaultValue), $this->getStructMethodParameterType($attribute));
    }
    /**
     * @param StructAttributeModel $attribute
     * @return string|null
     */
    protected function getStructMethodParameterType(StructAttributeModel $attribute)
    {
        $type = null;
        $model = $this->getModelFromStructAttribute($attribute);
        if ($model instanceof StructModel && !$model->getIsRestriction()) {
            $type = $this->getStructAttributeType($attribute);
        }
        return $type;
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
                ->addStructMethodSet($methods, $attribute);
        }
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
            $this->getStructMethodParameter($attribute, true, PhpFunctionParameter::NO_VALUE),
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
        $method->addChild('return $this;');;
        return $this;
    }
    /**
     * @param PhpMethod $method
     * @param StructAttributeModel $attribute
     * @return Struct
     */
    protected function addStructMethodSetBodyForRestriction(PhpMethod $method, StructAttributeModel $attribute)
    {
        if (($model = $this->getModelFromStructAttribute($attribute)) instanceof StructModel && $model->getIsRestriction()) {
            $method
                ->addChild(sprintf('if(!%s::valueIsValid($%s)) {', $model->getPackagedName(), lcfirst($attribute->getCleanName())))
                ->addChild($method->getIndentedString('return false;', 1))
                ->addChild('}');
        }
        return $this;
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
     * @param MethodContainer $methods
     * @param StructAttributeModel $attribute
     * @return Struct
     */
    protected function addStructMethodGet(MethodContainer $methods, StructAttributeModel $attribute)
    {
        $method = new PhpMethod($attribute->getGetterName());
        if ($attribute->nameIsClean()) {
            $thisAccess = sprintf('%s', $attribute->getName());
        } else {
            $thisAccess = sprintf('{\'%s\'}', addslashes($attribute->getName()));
        }
        $method->addChild(sprintf('return $this->%s;', $thisAccess));
        $methods->add($method);
        return $this;
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
        if ($this->getGenerator()->getOptionGenerateWsdlClassFile()) {
            $annotationBlock->addChild(new PhpAnnotation(self::ANNOTATION_SEE, 'parent::__construct()'));
        }
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
            new PhpAnnotation(self::ANNOTATION_SEE, sprintf('%s::__set_state()', AbstractModel::getGenericWsdlClassName())),
            new PhpAnnotation(self::ANNOTATION_USES, sprintf('%s::__set_state()', AbstractModel::getGenericWsdlClassName())),
            new PhpAnnotation(self::ANNOTATION_PARAM, 'array $array the exported values'),
            new PhpAnnotation(self::ANNOTATION_RETURN, $this->getModel()->getPackagedName()),
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
        if ($parameter instanceof PhpFunctionParameter) {
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
                    $annotationBlock->addChild(new PhpAnnotation(self::ANNOTATION_USES, sprintf('%s::valueIsValid()', $model->getPackagedName())));
                }
                $this->addStructMethodsSetAnnotationBlock($annotationBlock, $this->getStructAttributeType($attribute), lcfirst($attribute->getCleanName()));
                break;
            case 'get':
                $this->addStructMethodsGetAnnotationBlock($annotationBlock, $this->getStructAttributeType($attribute, true));
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
            ->addChild(new PhpAnnotation(self::ANNOTATION_RETURN, $this->getModel()->getPackagedName()));
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
        if (!$this->getGenerator()->getOptionGenerateWsdlClassFile()) {
            foreach ($this->getModelAttributes() as $attribute) {
                $annotationBlock->addChild(new PhpAnnotation(self::ANNOTATION_USES, sprintf('%s::%s()', $this->getModel()->getPackagedName(), $attribute->getSetterName())));
            }
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
            $annotationBlock->addChild(new PhpAnnotation(self::ANNOTATION_PARAM, sprintf('%s $%s', $this->getStructAttributeType($attribute), lcfirst($attribute->getCleanName()))));
        }
        return $this;
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\File\AbstractModelFile::getModel()
     * @return StructModel
     */
    public function getModel()
    {
        return parent::getModel();
    }
}
