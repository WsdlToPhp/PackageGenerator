<?php

namespace WsdlToPhp\PackageGenerator\DomHandler;

abstract class AbstractElementHandler extends AbstractNodeHandler
{
    /**
     * @param \DOMElement $element
     * @param AbstractDomDocumentHandler $domDocument
     * @param int $index
     */
    public function __construct(\DOMElement $element, AbstractDomDocumentHandler $domDocument, $index = -1)
    {
        parent::__construct($element, $domDocument, $index);
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\DomHandler\AbstractNodeHandler::getNode()
     * @return \DOMElement
     */
    public function getNode()
    {
        return parent::getNode();
    }
    /**
     * Alias to getNode()
     * @return \DOMElement
     */
    public function getElement()
    {
        return $this->getNode();
    }
    /**
     * @param string $name
     * @return boolean
     */
    public function hasAttribute($name)
    {
        return $this->getElement()->hasAttribute($name);
    }
    /**
     * @param string $name
     * @return null|AttributeHandler
     */
    public function getAttribute($name)
    {
        return $this->hasAttribute($name) ? $this->getDomDocumentHandler()->getHandler($this->getNode()->getAttributeNode($name)) : null;
    }
    /**
     * @param string $name
     * @return NodeHandler[]|ElementHandler[]
     */
    public function getChildrenByName($name)
    {
        $children = array();
        if ($this->hasChildren()) {
            foreach ($this->getElement()->getElementsByTagName($name) as $index=>$node) {
                $children[] = $this->getDomDocumentHandler()->getHandler($node, $index);
            }
        }
        return $children;
    }
    /**
     * @return ElementHandler[]
     */
    public function getElementChildren()
    {
        $children = array();
        if ($this->hasChildren()) {
            $index = 0;
            foreach ($this->getChildren() as $child) {
                if ($child->getNode()->nodeType === XML_ELEMENT_NODE) {
                    $children[] = $this->getDomDocumentHandler()->getHandler($child->getNode(), $index);
                    $index++;
                }
            }
        }
        return $children;
    }
    /**
     * @param string $name
     * @param array $attributes
     * @return ElementHandler[]
     */
    public function getChildrenByNameAndAttributes($name, array $attributes)
    {
        $matchingChildren = $children = $this->getChildrenByName($name);
        if (!empty($attributes) && !empty($children)) {
            $matchingChildren = array();
            foreach ($children as $child) {
                if ($child->hasAttributes()) {
                    $elementMatches = true;
                    foreach ($attributes as $attributeName=>$attributeValue) {
                        $elementMatches &= $child->hasAttribute($attributeName) ? $child->getAttribute($attributeName)->getValue() === $attributeValue : false;
                    }
                    if ((bool)$elementMatches === true) {
                        $matchingChildren[] = $child;
                    }
                }
            }
        }
        return $matchingChildren;
    }
    /**
     * @param string $name
     * @param array $attributes
     * @return null|\WsdlToPhp\PackageGenerator\DomHandler\ElementHandler
     */
    public function getChildByNameAndAttributes($name, array $attributes)
    {
        $children = $this->getChildrenByNameAndAttributes($name, $attributes);
        return empty($children) ? null : array_shift($children);
    }
}
