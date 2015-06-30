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
     * @return bool
     */
    public function isModelAStruct()
    {
        return $this->getModel()->getIsStruct() === true;
    }
    /**
     * @return bool
     */
    public function isModelAnArray()
    {
        return $this->isModelAStruct() && $this->getModel()->isArray();
    }
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
        return null;
    }
    /**
     *
     * @return StructAttributeContainer
     */
    protected function getModelAttributes()
    {
        return $this->getModel()->getAttributes(false, true);
    }
    /**
     * @param PropertyContainer
     */
    protected function getClassProperties(PropertyContainer $properties)
    {
        if ($this->isModelAStruct() && $this->getModel()->getAttributes()->count() > 0) {
            foreach ($this->getModel()->getAttributes() as $attribute) {
                $properties->add(new PhpProperty($attribute->getName(), PhpProperty::NO_VALUE));
            }
        }
    }
    /**
     * @return PhpAnnotationBlock|null
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
        if ($this->isModelAStruct()) {
            $this
                ->addStructMethodConstruct($methods)
                ->addStructMethodsSetAndGet($methods)
                ->addStructMethodSetState($methods);
        }
    }
    /**
     * @param MethodContainer $methods
     * @return Struct
     */
    protected function addStructMethodConstruct(MethodContainer $methods)
    {
        $method = new PhpMethod(self::METHOD_CONSTRUCT, $this->getStructMethodConstructParametersValues(true));
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
        $model = $this->getGenerator()->getStruct($attribute->getType());
        if ($model instanceof StructModel && $model->getPackagedName() != $this->getModel()->getPackagedName() && $model->isArray()) {
            $parentPrameter = sprintf('\'%1$s\'=>($%2$s instanceof %3$s) ? $%2$s : new %3$s(%2$s)', $attribute->getUniqueName(), lcfirst($attribute->getCleanName()), $struct->getPackagedName());
        } else {
            $parentPrameter = sprintf('\'%s\'=>$%s', $attribute->getUniqueName(), lcfirst($attribute->getCleanName()));
        }
        return $parentPrameter;
    }
    /**
     * @param string $name
     * @param string $value
     * @return string
     */
    protected function getStructMethodConstructParentParameterName($name, $value)
    {
        return sprintf('\'%s\'=>$%s', $name, lcfirst($value));
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
    protected function getStructMethodConstructParametersValues($lowCaseFirstLetter = false)
    {
        $parametersValues = array();
        foreach ($this->getModelAttributes() as $attribute) {
            $parametersValues[] = $this->getStructMethodConstructParameter($attribute, $lowCaseFirstLetter);
        }
        return $parametersValues;
    }
    /**
     * @param StructAttributeModel $attribute
     * @param bool $lowCaseFirstLetter
     * @return PhpFunctionParameter
     */
    protected function getStructMethodConstructParameter(StructAttributeModel $attribute, $lowCaseFirstLetter = false)
    {
        return new PhpFunctionParameter($lowCaseFirstLetter ? lcfirst($attribute->getName()) : $attribute->getName(), $attribute->isRequired() ? PhpFunctionParameter::NO_VALUE : $attribute->getDefaultValue());
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
            lcfirst($attribute->getCleanName()),
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
        $method
            ->addChild($this->getStructMethodSetBodyAssignment($attribute))
            ->addChild('return $this;');
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
        $annotationBlock = null;
        if ($this->isModelAStruct()) {
            $annotationBlock = $this->getStructMethodAnnotationBlock($method);
        }
        return $annotationBlock;
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
                $annotationBlock = $this->getStructMethodsSeAndGetAnnotationBlock($method);
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
            new PhpAnnotation(self::ANNOTATION_SEE, 'parent::__construct()'),
        ));
        $this->addStructPropertiesToAnnotationBlock($annotationBlock);
        $annotationBlock->addChild(new PhpAnnotation(self::ANNOTATION_RETURN, $this->getModel()->getPackagedName()));
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
    protected function getStructMethodsSeAndGetAnnotationBlock(PhpMethod $method)
    {
        $setOrGet = strtolower(substr($method->getName(), 0, 3));
        $attributeName = substr($method->getName(), 3);
        $annotationBlock = new PhpAnnotationBlock(array(
            sprintf('%s %s value', ucfirst($setOrGet), ucfirst($attributeName)),
        ));
        $attribute = $this->getModel()->getAttribute($attributeName);
        if ($attribute instanceof StructAttributeModel) {
            switch ($setOrGet) {
                case 'set':
                    if ($attribute instanceof StructAttributeModel) {
                        $annotationBlock->addChild(new PhpAnnotation(self::ANNOTATION_PARAM, sprintf('%s $%s', $this->getStructAttributeType($attribute), lcfirst($attribute->getCleanName()))));
                    }
                    $annotationBlock->addChild(new PhpAnnotation(self::ANNOTATION_RETURN, $this->getModel()->getPackagedName()));
                    break;
                case 'get':
                    if ($attribute instanceof StructAttributeModel) {
                        $annotationBlock->addChild(new PhpAnnotation(self::ANNOTATION_RETURN, $this->getStructAttributeType($attribute, true)));
                    }
                    break;
            }
        }
        return $annotationBlock;
    }
    /**
     * @param PhpAnnotationBlock $annotationBlock
     * @return Struct
     */
    protected function addStructPropertiesToAnnotationBlock(PhpAnnotationBlock $annotationBlock)
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
