<?php

namespace WsdlToPhp\PackageGenerator\DomHandler;

abstract class AbstractNodeHandler
{
    /**
     * @var \DOMNode
     */
    protected $node;
    /**
     * @var int
     */
    protected $index;
    /**
     * @var AbstractDomDocumentHandler
     */
    protected $domDocumentHandler;
    /**
     * @param \DOMNode $node
     */
    public function __construct(\DOMNode $node, AbstractDomDocumentHandler $domDocumentHandler, $index = 0)
    {
        $this->node               = $node;
        $this->index              = $index;
        $this->domDocumentHandler = $domDocumentHandler;
    }
    /**
     * @return \DOMNode
     */
    public function getNode()
    {
        return $this->node;
    }
    /**
     * @return AbstractNodeHandler
     */
    public function getParent()
    {
        if ($this->getNode()->parentNode instanceof \DOMNode) {
            return $this->getDomDocumentHandler()->getHandler($this->getNode()->parentNode);
        }
        return null;
    }
    /**
     * @return int
     */
    public function getIndex()
    {
        return $this->index;
    }
    /**
     * @return AbstractDomDocumentHandler
     */
    public function getDomDocumentHandler()
    {
        return $this->domDocumentHandler;
    }
    /**
     * name without namespace
     * @return string
     */
    public function getName()
    {
        $name = $this->getNode()->nodeName;
        if (strpos($name, ':') !== false) {
            $name = implode('', array_slice(explode(':', $name), -1, 1));
        }
        return $name;
    }
    /**
     * namespace
     * @return string|null
     */
    public function getNamespace()
    {
        $name = $this->getNode()->nodeName;
        if (strpos($name, ':') !== false) {
            return implode('', array_slice(explode(':', $name), 0, -1));
        }
        return null;
    }
    /**
     * @return boolean
     */
    public function hasAttributes()
    {
        return $this->getNode()->hasAttributes();
    }
    /**
     * @return array[\WsdlToPhp\PackageGenerator\DomHandler\AttributeHandler]
     */
    public function getAttributes()
    {
        $attributes = array();
        if ($this->hasAttributes()) {
            foreach ($this->getNode()->attributes as $index=>$attribute) {
                $attributes[] = $this->getDomDocumentHandler()->getHandler($attribute, $index);
            }
        }
        return $attributes;
    }
    /**
     * @return boolean
     */
    public function hasChildren()
    {
        return $this->getNode()->hasChildNodes();
    }
    /**
     * @return NULL|array[AbstractElementHandler]|array[AbstractNodeHandler]
     */
    public function getChildren()
    {
        $children = array();
        if ($this->hasChildren()) {
            foreach ($this->getNode()->childNodes as $index=>$node) {
                $children[] = $this->getDomDocumentHandler()->getHandler($node, $index);
            }
        }
        return $children;
    }
    /**
     * @return string
     */
    public function getNodeValue()
    {
        $nodeValue = trim($this->getNode()->nodeValue);
        $nodeValue = str_replace(array("\r", "\n", "\t"), array('', '', ' '), $nodeValue);
        $nodeValue = preg_replace('[\s+]', ' ', $nodeValue);
        return $nodeValue;
    }
}
