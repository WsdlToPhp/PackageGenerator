<?php

namespace WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag;

use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl as WsdlDocument;
use WsdlToPhp\PackageGenerator\DomHandler\AbstractAttributeHandler as Attribute;
use WsdlToPhp\PackageGenerator\DomHandler\ElementHandler;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\AbstractDocument;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Schema;
use WsdlToPhp\PackageGenerator\DomHandler\AbstractNodeHandler;

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
     * @return null|\WsdlToPhp\PackageGenerator\DomHandler\AbstractNodeHandler|\WsdlToPhp\PackageGenerator\DomHandler\AbstractElementHandler|\WsdlToPhp\PackageGenerator\DomHandler\AbstractAttributeHandler|\WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\AbstractTag
     */
    public function getSuitableParent($checkName = true, array $additionalTags = array(), $maxDeep = self::MAX_DEEP, $strict = false)
    {
        $parentNode = null;
        if ($this->getParent() instanceof AbstractNodeHandler) {
            $parentTags = $this->getSuitableParentTags($additionalTags);
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
     * @return string[]
     */
    protected function getSuitableParentTags(array $additionalTags = array())
    {
        return array_merge(array(
            WsdlDocument::TAG_ELEMENT,
            WsdlDocument::TAG_ATTRIBUTE,
            WsdlDocument::TAG_SIMPLE_TYPE,
            WsdlDocument::TAG_COMPLEX_TYPE,
        ), $additionalTags);
    }
    /**
     * @param string $name
     * @param bool $checkName
     * @return null|\WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\AbstractTag
     */
    protected function getStrictParent($name, $checkName = false)
    {
        $this->getDomDocumentHandler()->setCurrentTag($name);
        $parent = $this->getSuitableParent($checkName, array(
            $name,
        ), self::MAX_DEEP, true);
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
     * @return null|string
     */
    public function getAttributeName()
    {
        return $this->getAttribute(Attribute::ATTRIBUTE_NAME) instanceof Attribute ? $this->getAttribute(Attribute::ATTRIBUTE_NAME)->getValue() : '';
    }
    /**
     * @return boolean
     */
    public function hasAttributeValue()
    {
        return $this->hasAttribute(Attribute::ATTRIBUTE_VALUE);
    }
    /**
     * @return mixed
     */
    public function getAttributeValue($withNamespace = false, $withinItsType = true, $asType = null)
    {
        return $this->getAttribute(Attribute::ATTRIBUTE_VALUE) instanceof Attribute ? $this->getAttribute(Attribute::ATTRIBUTE_VALUE)->getValue($withNamespace, $withinItsType, $asType) : '';
    }
    /**
     * @return AbstractDocument|Wsdl|Schema
     */
    public function getDomDocumentHandler()
    {
        return $this->domDocumentHandler;
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\DomHandler\AbstractElementHandler::getChildrenByName()
     * @return AbstractTag[]
     */
    public function getChildrenByName($name)
    {
        $this->getDomDocumentHandler()->setCurrentTag($name);
        return parent::getChildrenByName($name);
    }
}
