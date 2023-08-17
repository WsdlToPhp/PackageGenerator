<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PackageGenerator\Container\PhpElement\Constant as ConstantContainer;
use WsdlToPhp\PackageGenerator\Model\AbstractModel;
use WsdlToPhp\PackageGenerator\Model\Struct as StructModel;
use WsdlToPhp\PackageGenerator\Model\StructValue as StructValueModel;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotation;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotationBlock;
use WsdlToPhp\PhpGenerator\Element\PhpConstant;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;

final class StructEnum extends Struct
{
    public const METHOD_VALUE_IS_VALID = 'valueIsValid';
    public const METHOD_GET_VALID_VALUES = 'getValidValues';

    public function setModel(AbstractModel $model): self
    {
        if ($model instanceof StructModel && !$model->isRestriction()) {
            throw new \InvalidArgumentException('Model must be a restriction containing values', __LINE__);
        }

        return parent::setModel($model);
    }

    protected function addClassElement(): AbstractModelFile
    {
        return AbstractModelFile::addClassElement();
    }

    protected function fillClassConstants(ConstantContainer $constants): void
    {
        /** @var StructModel $model */
        $model = $this->getModel();
        foreach ($model->getValues() as $value) {
            $constants->add(new PhpConstant($value->getCleanName(), $value->getValue()));
        }
    }

    protected function defineUseStatements(): self
    {
        return AbstractModelFile::defineUseStatements();
    }

    protected function getConstantAnnotationBlock(PhpConstant $constant): ?PhpAnnotationBlock
    {
        $block = new PhpAnnotationBlock([
            sprintf('Constant for value \'%s\'', $constant->getValue()),
        ]);

        /** @var StructModel $model */
        $model = $this->getModel();
        if (($value = $model->getValue($constant->getValue())) instanceof StructValueModel) {
            $this->defineModelAnnotationsFromWsdl($block, $value);
        }
        $block->addChild(new PhpAnnotation(self::ANNOTATION_RETURN, sprintf('string \'%s\'', $constant->getValue())));

        return $block;
    }

    protected function fillClassMethods(): void
    {
        $this->methods->add($this->getEnumMethodGetValidValues());
    }

    protected function getMethodAnnotationBlock(PhpMethod $method): ?PhpAnnotationBlock
    {
        $block = null;

        switch ($method->getName()) {
            case self::METHOD_GET_VALID_VALUES:
                $block = $this->getEnumGetValidValuesAnnotationBlock();

                break;
        }

        return $block;
    }

    protected function getEnumMethodGetValidValues(): PhpMethod
    {
        $method = new PhpMethod(self::METHOD_GET_VALID_VALUES, [], self::TYPE_ARRAY, PhpMethod::ACCESS_PUBLIC, false, true);
        $validValues = $this->getEnumMethodValues();
        $method->addChild('return [');
        foreach ($validValues as $validValue) {
            $method->addChild(sprintf('%s,', $method->getIndentedString($validValue, 1)));
        }
        $method->addChild('];');

        return $method;
    }

    protected function getEnumMethodValues(): array
    {
        $values = [];

        /** @var StructModel $model */
        $model = $this->getModel();
        foreach ($model->getValues() as $value) {
            $values[] = sprintf('self::%s', $value->getCleanName());
        }

        return $values;
    }

    protected function getEnumGetValidValuesAnnotationBlock(): PhpAnnotationBlock
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
}
