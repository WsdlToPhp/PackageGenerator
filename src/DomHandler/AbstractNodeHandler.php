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
        $this->node = $node;
        $this->index = $index;
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
     * @return \DOMNodeList
     */
    public function getChildNodes()
    {
        return $this->getNode()->childNodes;
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
     * @return AttributeHandler[]
     */
    public function getAttributes()
    {
        return $this->getHandlers($this->getNode()->attributes);
    }
    /**
     * @return boolean
     */
    public function hasChildren()
    {
        return $this->getNode()->hasChildNodes();
    }
    /**
     * @return ElementHandler[]|NodeHandler[]
     */
    public function getChildren()
    {
        return $this->getHandlers($this->getNode()->childNodes);
    }
    /**
     * @param \Traversable $nodes
     * @return NodeHandler[]|ElementHandler[]|AttributeHandler[]|NameSpaceHandler[]
     */
    private function getHandlers(\Traversable $nodes)
    {
        $handlers = array();
        foreach ($nodes as $index => $node) {
            $handlers[] = $this->getDomDocumentHandler()->getHandler($node, $index);
        }
        return $handlers;
    }
    /**
     * @return mixed
     */
    public function getNodeValue()
    {
        $nodeValue = trim($this->getNode()->nodeValue);
        $nodeValue = str_replace(array(
            "\r",
            "\n",
            "\t",
        ), array(
            '',
            '',
            ' ',
        ), $nodeValue);
        $nodeValue = preg_replace('[\s+]', ' ', $nodeValue);
        return $nodeValue;
    }
    /**
     * Alias for AbstractNodeHandler::getNodeValue()
     * @return mixed
     */
    public function getValue()
    {
        return $this->getNodeValue();
    }
    /**
     * @return null|string
     */
    public function getValueNamespace()
    {
        return null;
    }
}
