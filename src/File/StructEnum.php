<?php

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PackageGenerator\Model\AbstractModel;
use WsdlToPhp\PackageGenerator\Model\Struct as StructModel;
use WsdlToPhp\PackageGenerator\Model\StructValue as StructValueModel;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Constant as ConstantContainer;
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
     * @param ConstantContainer $constants
     */
    protected function getClassConstants(ConstantContainer $constants)
    {
        foreach ($this->getModel()->getValues() as $value) {
            $constants->add(new PhpConstant($value->getCleanName(), $value->getValue()));
        }
    }
    /**
     * @param PhpConstant $constant
     * @return PhpAnnotationBlock
     */
    protected function getConstantAnnotationBlock(PhpConstant $constant)
    {
        $block = new PhpAnnotationBlock([
            sprintf('Constant for value \'%s\'', $constant->getValue()),
        ]);
        if (($value = $this->getModel()->getValue($constant->getValue())) instanceof StructValueModel) {
            $this->defineModelAnnotationsFromWsdl($block, $value);
        }
        $block->addChild(new PhpAnnotation(self::ANNOTATION_RETURN, sprintf('string \'%s\'', $constant->getValue())));
        return $block;
    }
    protected function fillClassMethods()
    {
        $this->methods->add($this->getEnumMethodGetValidValues());
    }
    /**
     * @param PhpMethod $method
     * @return PhpAnnotationBlock|null
     */
    protected function getMethodAnnotationBlock(PhpMethod $method)
    {
        $block = null;
        switch ($method->getName()) {
            case self::METHOD_GET_VALID_VALUES:
                $block = $this->getEnumGetValidValuesAnnotationBlock();
                break;
        }
        return $block;
    }
    /**
     * @return PhpMethod
     */
    protected function getEnumMethodGetValidValues()
    {
        $method = new PhpMethod(self::METHOD_GET_VALID_VALUES, [], PhpMethod::ACCESS_PUBLIC, false, true);
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
        $values = [];
        foreach ($this->getModel()->getValues() as $value) {
            $values[] = sprintf('self::%s', $value->getCleanName());
        }
        return $values;
    }
    /**
     * @return PhpAnnotationBlock
     */
    protected function getEnumGetValidValuesAnnotationBlock()
    {
        $annotationBlock = new PhpAnnotationBlock([
            'Return allowed values',
        ]);
        foreach ($this->getEnumMethodValues() as $value) {
            $annotationBlock->addChild(new PhpAnnotation(self::ANNOTATION_USES, $value));
        }
        $annotationBlock->addChild(new PhpAnnotation(self::ANNOTATION_RETURN, 'string[]'));
        return $annotationBlock;
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\File\AbstractModelFile::setModel()
     * @throws \InvalidArgumentException
     * @param AbstractModel $model
     * @return StructArray
     */
    public function setModel(AbstractModel $model)
    {
        if ($model instanceof StructModel && !$model->isRestriction()) {
            throw new \InvalidArgumentException('Model must be a restriction containing values', __LINE__);
        }
        return parent::setModel($model);
    }
}
