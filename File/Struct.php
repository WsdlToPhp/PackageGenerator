<?php

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PackageGenerator\Model\StructAttributeModel as StructAttributeModel;
use WsdlToPhp\PackageGenerator\Model\Struct as StructModel;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Method;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Property;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Constant;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotation;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotationBlock;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;
use WsdlToPhp\PhpGenerator\Element\PhpProperty;
use WsdlToPhp\PhpGenerator\Element\PhpConstant;

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
        return $this->isModelAStruct() && stripos($this->getModel()->getName(), 'array') !== false;
    }
    /**
     * @return bool
     */
    public function isModelAnAnumeration()
    {
        return $this->isModelAStruct() && $this->getModel()->getIsRestriction() === true;
    }
    /**
     * @param Constant
     */
    protected function getClassConstants(Constant $constants)
    {
        if ($this->isModelAnAnumeration()) {
            foreach ($this->getModel()->getValues() as $value) {
                $constants->add(new PhpConstant($value->getCleanName(), $value->getValue()));
            }
        }
    }
    /**
     * @return PhpAnnotationBlock|null
     */
    protected function getConstantAnnotationBlock(PhpConstant $constant)
    {
        return new PhpAnnotationBlock(array(
            sprintf('Constant for value \'%s\'', $constant->getValue()),
            new PhpAnnotation(self::ANNOTATION_RETURN, sprintf('string \'%s\'', $constant->getValue())),
        ));
    }
    /**
     * @param Property
     */
    protected function getClassProperties(Property $properties)
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
        $this->defineModelAnnotationsFromWsdl($annotationBlock);
        if (($attribute = $this->getModel()->getAttribute($property->getName())) instanceof StructAttributeModel) {
            $annotationBlock->addChild(new PhpAnnotation(self::ANNOTATION_VAR, $attribute->getVarType()));
        }
        return $annotationBlock;
    }
    /**
     * @return Method
     */
    protected function getClassMethods(Method $methods)
    {
        if ($this->isModelAnAnumeration()) {
            $methods->add($this->getEnumMethodValueIsValid());
        } elseif ($this->isModelAStruct()) {
        }
    }
    /**
     * @return PhpMethod
     */
    protected function getEnumMethodValueIsValid()
    {
        $method = new PhpMethod('valueIsValid', array(
            'value',
        ), PhpMethod::ACCESS_PUBLIC, false, true);
        $method->addChild(sprintf('return in_array($value, array(%s));', implode(', ', $this->getEnumMethodInArrayValues())));
        return $method;
    }
    /**
     * @return string[]
     */
    protected function getEnumMethodInArrayValues()
    {
        $values = array();
        foreach ($this->getModel()->getValues() as $value) {
            $values[] = sprintf('%s::%s', $this->getModel()->getPackagedName(), $value->getCleanName());
        }
        return $values;
    }
    /**
     * @return PhpAnnotationBlock|null
     */
    protected function getMethodAnnotationBlock(PhpMethod $method)
    {
        if ($this->isModelAnAnumeration()) {
            return $this->getEnumValueIsValidAnnotationBlock();
        } elseif ($this->isModelAStruct()) {
        }
    }
    /**
     * @return PhpAnnotationBlock
     */
    protected function getEnumValueIsValidAnnotationBlock()
    {
        $annotationBlock = new PhpAnnotationBlock(array(
            'Return true if value is allowed',
        ));
        foreach ($this->getEnumMethodInArrayValues() as $value) {
            $annotationBlock->addChild(new PhpAnnotation(self::ANNOTATION_USES, $value));
        }
        $annotationBlock
            ->addChild(new PhpAnnotation(self::ANNOTATION_PARAM, 'mixed $value value'))
            ->addChild(new PhpAnnotation(self::ANNOTATION_RETURN, 'bool true|false'));
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
}
