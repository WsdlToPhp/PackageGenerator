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
     * @return AttributeHandler|null
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
            $children = $this->getDomDocumentHandler()->getElementsHandlers($this->getChildNodes());
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
        return $this->getDomDocumentHandler()->getElementsByNameAndAttributes($name, $attributes, $this->getNode());
    }
    /**
     * @param string $name
     * @param array $attributes
     * @return ElementHandler|null
     */
    public function getChildByNameAndAttributes($name, array $attributes)
    {
        $children = $this->getChildrenByNameAndAttributes($name, $attributes);
        return empty($children) ? null : array_shift($children);
    }
}
