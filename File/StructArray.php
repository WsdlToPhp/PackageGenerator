<?php

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PackageGenerator\Model\AbstractModel;
use WsdlToPhp\PackageGenerator\Model\Struct as StructModel;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotation;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotationBlock;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Method as MethodContainer;

class StructArray extends Struct
{
    /**
     * @var string
     */
    const METHOD_GET_ATTRIBUTE_NAME = 'getAttributeName';
    /**
     * @var string
     */
    const METHOD_CURRENT = 'current';
    /**
     * @var string
     */
    const METHOD_ITEM = 'item';
    /**
     * @var string
     */
    const METHOD_FIRST = 'first';
    /**
     * @var string
     */
    const METHOD_LAST = 'last';
    /**
     * @var string
     */
    const METHOD_OFFSET_GET = 'offsetGet';
    /**
     * @var string
     */
    const METHOD_ADD = 'add';
    /**
     * @see \WsdlToPhp\PackageGenerator\File\Struct::addStructMethodsSetAndGet()
     */
    public function addStructMethodsSetAndGet(MethodContainer $methods)
    {
        parent::addStructMethodsSetAndGet($methods);
        $this
            ->addArrayMethodCurrent($methods)
            ->addArrayMethodItem($methods)
            ->addArrayMethodFirst($methods)
            ->addArrayMethodLast($methods)
            ->addArrayMethodOffsetGet($methods)
            ->addArrayMethodAdd($methods)
            ->addArrayMethodGetAttributeName($methods);
        return $this;
    }
    /**
     * @param MethodContainer $methods
     * @return StructArray
     */
    protected function addArrayMethodCurrent(MethodContainer $methods)
    {
        $method = new PhpMethod(self::METHOD_CURRENT);
        $method->addChild($this->getArrayMethodBody(self::METHOD_CURRENT));
        $methods->add($method);
        return $this;
    }
    /**
     * @param MethodContainer $methods
     * @return StructArray
     */
    protected function addArrayMethodItem(MethodContainer $methods)
    {
        $method = new PhpMethod(self::METHOD_ITEM, array(
            'index',
        ));
        $method->addChild($this->getArrayMethodBody(self::METHOD_ITEM, '$index'));
        $methods->add($method);
        return $this;
    }
    /**
     * @param MethodContainer $methods
     * @return StructArray
     */
    protected function addArrayMethodFirst(MethodContainer $methods)
    {
        $method = new PhpMethod(self::METHOD_FIRST);
        $method->addChild($this->getArrayMethodBody(self::METHOD_FIRST));
        $methods->add($method);
        return $this;
    }
    /**
     * @param MethodContainer $methods
     * @return StructArray
     */
    protected function addArrayMethodLast(MethodContainer $methods)
    {
        $method = new PhpMethod(self::METHOD_LAST);
        $method->addChild($this->getArrayMethodBody(self::METHOD_LAST));
        $methods->add($method);
        return $this;
    }
    /**
     * @param MethodContainer $methods
     * @return StructArray
     */
    protected function addArrayMethodOffsetGet(MethodContainer $methods)
    {
        $method = new PhpMethod(self::METHOD_OFFSET_GET, array(
            'offset',
        ));
        $method->addChild($this->getArrayMethodBody(self::METHOD_OFFSET_GET, '$offset'));
        $methods->add($method);
        return $this;
    }
    /**
     * @param MethodContainer $methods
     * @return StructArray
     */
    protected function addArrayMethodGetAttributeName(MethodContainer $methods)
    {
        if ($this->getModel()->getAttributes()->count() === 1) {
            $method = new PhpMethod(self::METHOD_GET_ATTRIBUTE_NAME);
            $method->addChild(sprintf('return \'%s\';', $this->getModel()->getAttributes()->offsetGet(0)->getName()));
            $methods->add($method);
        }
        return $this;
    }
    protected function addArrayMethodAdd(MethodContainer $methods)
    {
        if (($model = $this->getModelFromStructAttribute()) instanceof StructModel && $model->getIsRestriction()) {
            $method = new PhpMethod(self::METHOD_ADD, array(
                'item',
            ));
            $method->addChild(sprintf('return %s::valueIsValid($item) ? parent::add($item) : false;', $model->getPackagedName()));
            $methods->add($method);
        }
        return $this;
    }
    /**
     * @return PhpAnnotationBlock|null
     */
    protected function getArrayMethodGetAttributeNameAnnotationBlock()
    {
        $annotationBlock = null;
        if ($this->getModel()->getAttributes()->count() === 1) {
            $annotationBlock = new PhpAnnotationBlock(array(
                'Returns the attribute name',
                new PhpAnnotation(self::ANNOTATION_SEE, sprintf('%s::%s()', AbstractModel::getGenericWsdlClassName(), self::METHOD_GET_ATTRIBUTE_NAME)),
                new PhpAnnotation(self::ANNOTATION_RETURN, sprintf('string %s', $this->getModel()->getAttributes()->offsetGet(0)->getName())),
            ));
        }
        return $annotationBlock;
    }
    /**
     * @return PhpAnnotationBlock|null
     */
    protected function getArrayMethodCurrentAnnotationBlock()
    {
        return $this->getArrayMethodGenericAnnotationBlock(self::METHOD_CURRENT, 'Returns the current element');
    }
    /**
     * @return PhpAnnotationBlock|null
     */
    protected function getArrayMethodFirstAnnotationBlock()
    {
        return $this->getArrayMethodGenericAnnotationBlock(self::METHOD_FIRST, 'Returns the first element');
    }
    /**
     * @return PhpAnnotationBlock|null
     */
    protected function getArrayMethodLastAnnotationBlock()
    {
        return $this->getArrayMethodGenericAnnotationBlock(self::METHOD_LAST, 'Returns the last element');
    }
    /**
     * @return PhpAnnotationBlock|null
     */
    protected function getArrayMethodItemAnnotationBlock()
    {
        return $this->getArrayMethodGenericAnnotationBlock(self::METHOD_ITEM, 'Returns the indexed element', 'int $index');
    }
    /**
     * @return PhpAnnotationBlock|null
     */
    protected function getArrayMethodOffsetGetAnnotationBlock()
    {
        return $this->getArrayMethodGenericAnnotationBlock(self::METHOD_OFFSET_GET, 'Returns the element at the offset', 'int $offset');
    }
    /**
     * @return PhpAnnotationBlock
     */
    protected function getArrayMethodAddAnnotationBlock()
    {
        return new PhpAnnotationBlock(array(
            'Add element to array',
            new PhpAnnotation(self::ANNOTATION_SEE, sprintf('%s::add()', AbstractModel::getGenericWsdlClassName())),
            new PhpAnnotation(self::ANNOTATION_USES, sprintf('%s::valueIsValid()', $this->getModelFromStructAttribute()->getPackagedName())),
            new PhpAnnotation(self::ANNOTATION_PARAM, sprintf('%s $item', $this->getModelFromStructAttribute()->getPackagedName())),
            new PhpAnnotation(self::ANNOTATION_RETURN, $this->getModelFromStructAttribute()->getPackagedName()),
        ));
    }
    /**
     * @param string $name
     * @param string $description
     * @param string $return
     * @param string $param
     * @return PhpAnnotationBlock|null
     */
    protected function getArrayMethodGenericAnnotationBlock($name, $description, $param = null)
    {
        $annotationBlock = null;
        if ($this->getModel()->getAttributes()->count() === 1) {
            $annotationBlock = new PhpAnnotationBlock(array(
                $description,
                new PhpAnnotation(self::ANNOTATION_SEE, sprintf('%s::%s()', AbstractModel::getGenericWsdlClassName(), $name)),
            ));
            if (!empty($param)) {
                $annotationBlock->addChild(new PhpAnnotation(self::ANNOTATION_PARAM, $param));
            }
            $annotationBlock->addChild(new PhpAnnotation(self::ANNOTATION_RETURN, $this->getStructAttributeType()));
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
    /**
     * @param string $method
     * @param string $var
     * @return string
     */
    protected function getArrayMethodBody($method, $var = '')
    {
        return sprintf('return parent::%s(%s);', $method, $var);
    }
}
