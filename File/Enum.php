<?php

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PackageGenerator\Model\Struct as StructModel;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Constant as ConstantContainer;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Method as MethodContainer;
use WsdlToPhp\PhpGenerator\Element\PhpConstant;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotation;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotationBlock;

class Enum extends Struct
{
    /**
     * @return bool
     */
    public function isModelAnAnumeration()
    {
        return $this->isModelAStruct() && $this->getModel()->getIsRestriction() === true;
    }
    /**
     * @param ConstantContainer
     */
    protected function getClassConstants(ConstantContainer $constants)
    {
        foreach ($this->getModel()->getValues() as $value) {
            $constants->add(new PhpConstant($value->getCleanName(), $value->getValue()));
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
     * @param MethodContainer
     */
    protected function getClassMethods(MethodContainer $methods)
    {
        $methods->add($this->getEnumMethodValueIsValid());
    }
    /**
     * @return PhpAnnotationBlock|null
     */
    protected function getMethodAnnotationBlock(PhpMethod $method)
    {
        return $this->getEnumValueIsValidAnnotationBlock();
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
