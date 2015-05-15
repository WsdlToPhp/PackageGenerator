<?php

namespace WsdlToPhp\PackageGenerator\DomHandler;

abstract class AbstractDomDocumentHandler
{
    /**
     * @var \DOMDocument
     */
    protected $domDocument;
    /**
     * @var ElementHandler
     */
    protected $rootElement;
    /**
     * @param \DOMDocument $domDocument
     */
    public function __construct(\DOMDocument $domDocument)
    {
        $this->domDocument = $domDocument;
        $this->initRootElement();
    }
    /**
     * Find valid root node (not a comment, at least a DOMElement node)
     * @throws \InvalidArgumentException
     */
    protected function initRootElement()
    {
        if ($this->domDocument->hasChildNodes()) {
            foreach ($this->domDocument->childNodes as $node) {
                if ($node instanceof \DOMElement) {
                    $this->rootElement = $this->getElementHandler($node, $this);
                    break;
                }
            }
        } else {
            throw new \InvalidArgumentException('Document seems to be invalid');
        }
    }
    /**
     * Return the matching node handler based on current \DomNode type
     * @param \DOMNode|\DOMNameSpaceNode $node
     * @param int $index
     * @return NodeHandler|ElementHandler
     */
    public function getHandler($node, $index = -1)
    {
        if ($node instanceof \DOMNode) {
            switch ($node->nodeType) {
                case XML_ELEMENT_NODE:
                    return $this->getElementHandler($node, $this, $index);
                case XML_ATTRIBUTE_NODE:
                    return $this->getAttributeHandler($node, $this, $index);
                default:
                    return $this->getNodeHandler($node, $this, $index);
            }
        } elseif ($node instanceof \DOMNameSpaceNode) {
            return new NameSpaceHandler($node, $this, $index);
        }
    }
    /**
     * @param \DOMNode $node
     * @param AbstractDomDocumentHandler $domDocument
     * @param int $index
     * @return NodeHandler
     */
    abstract protected function getNodeHandler(\DOMNode $node, AbstractDomDocumentHandler $domDocument, $index = -1);
    /**
     * @param \DOMElement $element
     * @param AbstractDomDocumentHandler $domDocument
     * @param int $index
     * @return ElementHandler
     */
    abstract protected function getElementHandler(\DOMElement $element, AbstractDomDocumentHandler $domDocument, $index = -1);
    /**
     * @param \DOMAttr $attribute
     * @param AbstractDomDocumentHandler $domDocument
     * @param int $index
     * @return AttributeHandler
     */
    abstract protected function getAttributeHandler(\DOMAttr $attribute, AbstractDomDocumentHandler $domDocument, $index = -1);
    /**
     * @param string $name
     * @return NodeHandler
     */
    public function getNodeByName($name)
    {
        return $this->domDocument->getElementsByTagName($name)->length > 0 ? $this->getNodeHandler($this->domDocument->getElementsByTagName($name)->item(0), $this) : null;
    }
    /**
     * @param string $name
     * @return ElementHandler
     */
    public function getElementByName($name)
    {
        $node = $this->getNodeByName($name);
        if ($node instanceof AbstractNodeHandler && $node->getNode() instanceof \DOMElement) {
            return $this->getElementHandler($node->getNode(), $this);
        }
        return null;
    }
    /**
     * @param string $name
     * @return array[NodeHandler]
     */
    public function getNodesByName($name)
    {
        $nodes = array();
        if ($this->domDocument->getElementsByTagName($name)->length > 0) {
            foreach ($this->domDocument->getElementsByTagName($name) as $index=>$node) {
                $nodes[] = $this->getNodeHandler($node, $this, $index);
            }
        }
        return $nodes;
    }
    /**
     * @param string $name
     * @return array[ElementHandler]
     */
    public function getElementsByName($name)
    {
        $nodes    = $this->getNodesByName($name);
        $elements = array();
        if (!empty($nodes)) {
            $index = 0;
            foreach ($nodes as $node) {
                if ($node->getNode() instanceof \DOMElement) {
                    $elements[] = $this->getElementHandler($node->getNode(), $this, $index);
                    $index++;
                }
            }
        }
        return $elements;
    }
    /**
     * @param string $name
     * @param array $attributes
     * @return array[\WsdlToPhp\PackageGenerator\DomHandler\ElementHandler]
     */
    public function getElementsByNameAndAttributes($name, array $attributes)
    {
        $matchingElements = $this->getElementsByName($name);
        if (!empty($attributes) && !empty($matchingElements)) {
            $xpath = new \DOMXPath($this->domDocument);
            $xQuery = sprintf("//*[local-name() = '%s']", $name);
            foreach ($attributes as $attributeName=>$attributeValue) {
                $xQuery .= sprintf("[@%s='%s']", $attributeName, $attributeValue);
            }
            $nodes = $xpath->query($xQuery);
            if (!empty($nodes)) {
                $matchingElements = array();
                $index = 0;
                foreach ($nodes as $node) {
                    if ($node instanceof \DOMElement) {
                        $matchingElements[] = $this->getElementHandler($node, $this, $index);
                        $index++;
                    }
                }
            }
        }
        return $matchingElements;
    }
    /**
     * @param string $name
     * @param array $attributes
     * @return null|\WsdlToPhp\PackageGenerator\DomHandler\ElementHandler
     */
    public function getElementByNameAndAttributes($name, array $attributes)
    {
        $elements = $this->getElementsByNameAndAttributes($name, $attributes);
        return empty($elements) ? null : array_shift($elements);
    }
}
