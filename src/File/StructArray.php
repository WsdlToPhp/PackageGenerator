<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PackageGenerator\File\Element\PhpFunctionParameter;
use WsdlToPhp\PackageGenerator\File\Validation\Rules;
use WsdlToPhp\PackageGenerator\Model\AbstractModel;
use WsdlToPhp\PackageGenerator\Model\Struct as StructModel;
use WsdlToPhp\PackageGenerator\Model\StructAttribute as StructAttributeModel;
use WsdlToPhp\PhpGenerator\Element\AssignedValueElementInterface;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotation;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotationBlock;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;

final class StructArray extends Struct
{
    public const METHOD_GET_ATTRIBUTE_NAME = 'getAttributeName';
    public const METHOD_CURRENT = 'current';
    public const METHOD_ITEM = 'item';
    public const METHOD_FIRST = 'first';
    public const METHOD_LAST = 'last';
    public const METHOD_OFFSET_GET = 'offsetGet';
    public const METHOD_ADD = 'add';

    public function addStructMethodsSetAndGet(): self
    {
        parent::addStructMethodsSetAndGet();
        $this
            ->addArrayMethodCurrent()
            ->addArrayMethodItem()
            ->addArrayMethodFirst()
            ->addArrayMethodLast()
            ->addArrayMethodOffsetGet()
            ->addArrayMethodAdd()
            ->addArrayMethodGetAttributeName()
        ;

        return $this;
    }

    public function setModel(AbstractModel $model): self
    {
        if ($model instanceof StructModel && !$model->isArray()) {
            throw new \InvalidArgumentException('The model is not a valid array struct (name must contain Array and the model must contain only one property', __LINE__);
        }

        return parent::setModel($model);
    }

    protected function addClassElement(): AbstractModelFile
    {
        return AbstractModelFile::addClassElement();
    }

    /**
     * Disable this feature within StructArray class.
     */
    protected function addStructMethodAddTo(StructAttributeModel $attribute): Struct
    {
        return $this;
    }

    protected function addArrayMethodCurrent(): self
    {
        return $this->addArrayMethodGenericMethod(self::METHOD_CURRENT, $this->getArrayMethodBody(self::METHOD_CURRENT), [], '?'.$this->getStructAttributeTypeAsPhpType($this->getStructAttribute(), false));
    }

    protected function addArrayMethodItem(): self
    {
        return $this->addArrayMethodGenericMethod(self::METHOD_ITEM, $this->getArrayMethodBody(self::METHOD_ITEM, '$index'), [
            'index',
        ], '?'.$this->getStructAttributeTypeAsPhpType($this->getStructAttribute(), false));
    }

    protected function addArrayMethodFirst(): self
    {
        return $this->addArrayMethodGenericMethod(self::METHOD_FIRST, $this->getArrayMethodBody(self::METHOD_FIRST), [], '?'.$this->getStructAttributeTypeAsPhpType($this->getStructAttribute(), false));
    }

    protected function addArrayMethodLast(): self
    {
        return $this->addArrayMethodGenericMethod(self::METHOD_LAST, $this->getArrayMethodBody(self::METHOD_LAST), [], '?'.$this->getStructAttributeTypeAsPhpType($this->getStructAttribute(), false));
    }

    protected function addArrayMethodOffsetGet(): self
    {
        return $this->addArrayMethodGenericMethod(self::METHOD_OFFSET_GET, $this->getArrayMethodBody(self::METHOD_OFFSET_GET, '$offset'), [
            'offset',
        ], '?'.$this->getStructAttributeTypeAsPhpType($this->getStructAttribute(), false));
    }

    protected function addArrayMethodGetAttributeName(): self
    {
        /** @var StructModel $model */
        $model = $this->getModel();

        return $this->addArrayMethodGenericMethod(
            self::METHOD_GET_ATTRIBUTE_NAME,
            sprintf(
                'return \'%s\';',
                $model
                    ->getAttributes()
                    ->offsetGet(0)
                    ->getName()
            ),
            [],
            self::TYPE_STRING
        );
    }

    protected function addArrayMethodAdd(): self
    {
        if ($this->getModelFromStructAttribute() instanceof StructModel) {
            $method = new PhpMethod(self::METHOD_ADD, [
                new PhpFunctionParameter(
                    'item',
                    AssignedValueElementInterface::NO_VALUE,
                    null,
                    $this->getStructAttribute()
                ),
            ], self::TYPE_SELF);

            if ($this->getGenerator()->getOptionValidation()) {
                $rules = new Rules($this, $method, $this->getStructAttribute(), $this->methods);
                $rules->applyRules('item', true);
            }

            $method->addChild('return parent::add($item);');
            $this->methods->add($method);
        }

        return $this;
    }

    protected function addArrayMethodGenericMethod(string $name, string $body, array $methodParameters = [], ?string $returnType = null): self
    {
        $method = new PhpMethod($name, $methodParameters, $returnType);
        $method->addChild($body);
        $this->methods->add($method);

        return $this;
    }

    protected function getArrayMethodGetAttributeNameAnnotationBlock(): PhpAnnotationBlock
    {
        /** @var StructModel $model */
        $model = $this->getModel();

        return new PhpAnnotationBlock([
            'Returns the attribute name',
            new PhpAnnotation(self::ANNOTATION_SEE, sprintf('%s::%s()', $model->getExtends(true), self::METHOD_GET_ATTRIBUTE_NAME)),
            new PhpAnnotation(self::ANNOTATION_RETURN, sprintf('string %s', $model->getAttributes()->offsetGet(0)->getName())),
        ]);
    }

    protected function getArrayMethodCurrentAnnotationBlock(): PhpAnnotationBlock
    {
        return $this->getArrayMethodGenericAnnotationBlock(self::METHOD_CURRENT, 'Returns the current element');
    }

    protected function getArrayMethodFirstAnnotationBlock(): PhpAnnotationBlock
    {
        return $this->getArrayMethodGenericAnnotationBlock(self::METHOD_FIRST, 'Returns the first element');
    }

    protected function getArrayMethodLastAnnotationBlock(): PhpAnnotationBlock
    {
        return $this->getArrayMethodGenericAnnotationBlock(self::METHOD_LAST, 'Returns the last element');
    }

    protected function getArrayMethodItemAnnotationBlock(): PhpAnnotationBlock
    {
        return $this->getArrayMethodGenericAnnotationBlock(self::METHOD_ITEM, 'Returns the indexed element', 'int $index');
    }

    protected function getArrayMethodOffsetGetAnnotationBlock(): PhpAnnotationBlock
    {
        return $this->getArrayMethodGenericAnnotationBlock(self::METHOD_OFFSET_GET, 'Returns the element at the offset', 'int $offset');
    }

    protected function getArrayMethodAddAnnotationBlock(): PhpAnnotationBlock
    {
        return new PhpAnnotationBlock([
            'Add element to array',
            new PhpAnnotation(self::ANNOTATION_SEE, sprintf('%s::add()', $this->getModel()->getExtends(true))),
            new PhpAnnotation(self::ANNOTATION_THROWS, \InvalidArgumentException::class),
            new PhpAnnotation(self::ANNOTATION_PARAM, sprintf('%s $item', $this->getStructAttributeType(null, true, false))),
            new PhpAnnotation(self::ANNOTATION_RETURN, sprintf('%s', $this->getModel()->getPackagedName(true))),
        ]);
    }

    protected function getArrayMethodGenericAnnotationBlock(string $name, string $description, $param = null): PhpAnnotationBlock
    {
        $annotationBlock = new PhpAnnotationBlock([
            $description,
            new PhpAnnotation(self::ANNOTATION_SEE, sprintf('%s::%s()', $this->getModel()->getExtends(true), $name)),
        ]);

        if (!empty($param)) {
            $annotationBlock->addChild(new PhpAnnotation(self::ANNOTATION_PARAM, $param));
        }
        $annotationBlock->addChild(new PhpAnnotation(self::ANNOTATION_RETURN, $this->getStructAttributeTypeGetAnnotation($this->getStructAttribute(), false, true)));

        return $annotationBlock;
    }

    protected function getStructMethodAnnotationBlock(PhpMethod $method): ?PhpAnnotationBlock
    {
        switch ($method->getName()) {
            case self::METHOD_GET_ATTRIBUTE_NAME:
                $annotationBlock = $this->getArrayMethodGetAttributeNameAnnotationBlock();

                break;

            case self::METHOD_CURRENT:
                $annotationBlock = $this->getArrayMethodCurrentAnnotationBlock();

                break;

            case self::METHOD_FIRST:
                $annotationBlock = $this->getArrayMethodFirstAnnotationBlock();

                break;

            case self::METHOD_ITEM:
                $annotationBlock = $this->getArrayMethodItemAnnotationBlock();

                break;

            case self::METHOD_LAST:
                $annotationBlock = $this->getArrayMethodLastAnnotationBlock();

                break;

            case self::METHOD_OFFSET_GET:
                $annotationBlock = $this->getArrayMethodOffsetGetAnnotationBlock();

                break;

            case self::METHOD_ADD:
                $annotationBlock = $this->getArrayMethodAddAnnotationBlock();

                break;

            default:
                $annotationBlock = parent::getStructMethodAnnotationBlock($method);

                break;
        }

        return $annotationBlock;
    }

    protected function getArrayMethodBody(string $method, $var = ''): string
    {
        return sprintf('return parent::%s(%s);', $method, $var);
    }
}
