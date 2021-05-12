<?php

namespace WsdlToPhp\PackageGenerator\WsdlHandler\Tag;

use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl as WsdlDocument;
use WsdlToPhp\PackageGenerator\WsdlHandler\Schema as SchemaDocument;
use WsdlToPhp\DomHandler\AbstractAttributeHandler as Attribute;
use WsdlToPhp\DomHandler\ElementHandler;
use WsdlToPhp\DomHandler\AbstractNodeHandler;

abstract class AbstractTag extends ElementHandler
{
    /**
     * @var int
     */
    const MAX_DEEP = 5;
    /**
     * This method aims to get the parent element that matches a valid Wsdl element (aka struct)
     * @param bool $checkName whether to validate the attribute named "name" or not
     * @param array $additionalTags
     * @param int $maxDeep
     * @param bool $strict used by overridden methods to avoid infinite loop
     * @return null|\WsdlToPhp\DomHandler\AbstractNodeHandler|\WsdlToPhp\DomHandler\AbstractElementHandler|\WsdlToPhp\DomHandler\AbstractAttributeHandler|\WsdlToPhp\PackageGenerator\WsdlHandler\Tag\AbstractTag
     */
    public function getSuitableParent($checkName = true, array $additionalTags = [], $maxDeep = self::MAX_DEEP, $strict = false)
    {
        $parentNode = null;
        if ($this->getParent() instanceof AbstractNodeHandler) {
            $parentTags = $strict ? $additionalTags : $this->getSuitableParentTags($additionalTags);
            $parentNode = $this->getParent()->getNode();
            while ($maxDeep-- > 0 && ($parentNode instanceof \DOMElement) && !empty($parentNode->nodeName) && (!preg_match('/' . implode('|', $parentTags) . '/i', $parentNode->nodeName) || ($checkName && preg_match('/' . implode('|', $parentTags) . '/i', $parentNode->nodeName) && (!$parentNode->hasAttribute('name') || $parentNode->getAttribute('name') === '')))) {
                $parentNode = $parentNode->parentNode;
            }
            if ($parentNode instanceof \DOMElement) {
                $parentNode = $this->getDomDocumentHandler()->getHandler($parentNode);
            } else {
                $parentNode = null;
            }
        }
        return $parentNode;
    }
    /**
     * Suitable tags as parent
     * @param array $additionalTags
     * @return string[]
     */
    protected function getSuitableParentTags(array $additionalTags = [])
    {
        return array_merge([
            WsdlDocument::TAG_ELEMENT,
            WsdlDocument::TAG_ATTRIBUTE,
            WsdlDocument::TAG_SIMPLE_TYPE,
            WsdlDocument::TAG_COMPLEX_TYPE,
        ], $additionalTags);
    }
    /**
     * @param string $name
     * @param bool $checkName
     * @return AbstractTag|null
     */
    protected function getStrictParent($name, $checkName = false)
    {
        $parent = $this->getSuitableParent($checkName, [
            $name,
        ], self::MAX_DEEP, true);
        if ($parent instanceof AbstractNodeHandler && $parent->getName() === $name) {
            return $parent;
        }
        return null;
    }
    /**
     * @return bool
     */
    public function hasAttributeName()
    {
        return $this->hasAttribute(Attribute::ATTRIBUTE_NAME);
    }
    /**
     * @return bool
     */
    public function hasAttributeRef()
    {
        return $this->hasAttribute(Attribute::ATTRIBUTE_REF);
    }
    /**
     * @return string
     */
    public function getAttributeName()
    {
        return $this->getAttribute(Attribute::ATTRIBUTE_NAME) instanceof Attribute ? $this->getAttribute(Attribute::ATTRIBUTE_NAME)->getValue() : '';
    }
    /**
     * @return string
     */
    public function getAttributeRef()
    {
        return $this->getAttribute(Attribute::ATTRIBUTE_REF) instanceof Attribute ? $this->getAttribute(Attribute::ATTRIBUTE_REF)->getValue() : '';
    }
    /**
     * @return string
     */
    public function getAttributeTargetNamespace()
    {
        return $this->getAttribute('targetNamespace') instanceof Attribute ? $this->getAttribute('targetNamespace')->getValue(true) : '';
    }
    /**
     * @return boolean
     */
    public function hasAttributeValue()
    {
        return $this->hasAttribute(Attribute::ATTRIBUTE_VALUE);
    }
    /**
     * @param bool $withNamespace
     * @param bool $withinItsType
     * @param string $asType
     * @return mixed
     */
    public function getValueAttributeValue($withNamespace = false, $withinItsType = true, $asType = null)
    {
        return $this->getAttribute(Attribute::ATTRIBUTE_VALUE) instanceof Attribute ? $this->getAttribute(Attribute::ATTRIBUTE_VALUE)->getValue($withNamespace, $withinItsType, $asType) : '';
    }
    /**
     * @return WsdlDocument|SchemaDocument
     */
    public function getDomDocumentHandler()
    {
        return $this->domDocumentHandler;
    }
    /**
     * @see \WsdlToPhp\DomHandler\AbstractElementHandler::getChildrenByName()
     * @param string $name
     * @return AbstractTag[]
     */
    public function getChildrenByName($name)
    {
        return parent::getChildrenByName($name);
    }

    /**
     * @return TagSchema|null
     */
    public function getParentSchema()
    {
        return $this->getStrictParent(WsdlDocument::TAG_SCHEMA);
    }
}
