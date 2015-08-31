<?php

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PackageGenerator\Model\AbstractModel;
use WsdlToPhp\PackageGenerator\Model\Struct as StructModel;
use WsdlToPhp\PackageGenerator\Model\StructValue as StructValueModel;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Constant as ConstantContainer;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Method as MethodContainer;
use WsdlToPhp\PhpGenerator\Element\PhpConstant;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotation;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotationBlock;

class StructEnum extends Struct
{
    /**
     * @var string
     */
    const METHOD_VALUE_IS_VALID = 'valueIsValid';
    /**
     * @var string
     */
    const METHOD_GET_VALID_VALUES = 'getValidValues';
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
     * @return PhpAnnotationBlock
     */
    protected function getConstantAnnotationBlock(PhpConstant $constant)
    {
        $block = new PhpAnnotationBlock(array(
            sprintf('Constant for value \'%s\'', $constant->getValue()),
        ));
        if (($value = $this->getModel()->getValue($constant->getValue())) instanceof StructValueModel) {
            $this->defineModelAnnotationsFromWsdl($block, $value);
        }
        $block->addChild(new PhpAnnotation(self::ANNOTATION_RETURN, sprintf('string \'%s\'', $constant->getValue())));
        return $block;
    }
    /**
     * @param MethodContainer
     */
    protected function getClassMethods(MethodContainer $methods)
    {
        $methods
            ->add($this->getEnumMethodValueIsValid())
            ->add($this->getEnumMethodGetValidValues());
    }
    /**
     * @return PhpAnnotationBlock|null
     */
    protected function getMethodAnnotationBlock(PhpMethod $method)
    {
        switch ($method->getName()) {
            case self::METHOD_GET_VALID_VALUES:
                return $this->getEnumGetValidValuesAnnotationBlock();
            case self::METHOD_VALUE_IS_VALID:
                return $this->getEnumValueIsValidAnnotationBlock();
        }
    }
    /**
     * @return PhpMethod
     */
    protected function getEnumMethodValueIsValid()
    {
        $method = new PhpMethod(self::METHOD_VALUE_IS_VALID, array(
            'value',
        ), PhpMethod::ACCESS_PUBLIC, false, true);
        $method->addChild(sprintf('return in_array($value, self::%s(), true);', self::METHOD_GET_VALID_VALUES));
        return $method;
    }
    /**
     * @return PhpMethod
     */
    protected function getEnumMethodGetValidValues()
    {
        $method = new PhpMethod(self::METHOD_GET_VALID_VALUES, array(), PhpMethod::ACCESS_PUBLIC, false, true);
        $validValues = $this->getEnumMethodValues();
        $method->addChild('return array(');
        foreach ($validValues as $validValue) {
            $method->addChild(sprintf('%s,', $method->getIndentedString($validValue, 1)));
        }
        $method->addChild(');');
        return $method;
    }
    /**
     * @return string[]
     */
    protected function getEnumMethodValues()
    {
        $values = array();
        foreach ($this->getModel()->getValues() as $value) {
            $values[] = sprintf('self::%s', $value->getCleanName());
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
        $annotationBlock
            ->addChild(new PhpAnnotation(self::ANNOTATION_USES, sprintf('self::%s()', self::METHOD_GET_VALID_VALUES)))
            ->addChild(new PhpAnnotation(self::ANNOTATION_PARAM, 'mixed $value value'))
            ->addChild(new PhpAnnotation(self::ANNOTATION_RETURN, 'bool true|false'));
        return $annotationBlock;
    }
    /**
     * @return PhpAnnotationBlock
     */
    protected function getEnumGetValidValuesAnnotationBlock()
    {
        $annotationBlock = new PhpAnnotationBlock(array(
            'Return allowed values',
        ));
        foreach ($this->getEnumMethodValues() as $value) {
            $annotationBlock->addChild(new PhpAnnotation(self::ANNOTATION_USES, $value));
        }
        $annotationBlock->addChild(new PhpAnnotation(self::ANNOTATION_RETURN, 'string[]'));
        return $annotationBlock;
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\File\AbstractModelFile::setModel()
     * @throws \InvalidaArgumentException
     * @param AbstractModel $model
     * @return StructArray
     */
    public function setModel(AbstractModel $model)
    {
        if ($model instanceof StructModel && !$model->getIsRestriction()) {
            throw new \InvalidArgumentException('Model must be a restriction containing values', __LINE__);
        }
        return parent::setModel($model);
    }
}
