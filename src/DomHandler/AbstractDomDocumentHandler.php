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
            throw new \InvalidArgumentException('Document seems to be invalid', __LINE__);
        }
    }
    /**
     * Return the matching node handler based on current \DomNode type
     * @param \DOMNode|\DOMNameSpaceNode $node
     * @param int $index
     * @return NodeHandler|ElementHandler|AttributeHandler|NameSpaceHandler
     */
    public function getHandler($node, $index = -1)
    {
        if ($node instanceof \DOMElement) {
            return $this->getElementHandler($node, $this, $index);
        } elseif ($node instanceof \DOMAttr) {
            return $this->getAttributeHandler($node, $this, $index);
        } elseif ($node instanceof \DOMNameSpaceNode) {
            return new NameSpaceHandler($node, $this, $index);
        }
        return $this->getNodeHandler($node, $this, $index);
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
     * @param string $checkInstance
     * @return NodeHandler[]
     */
    public function getNodesByName($name, $checkInstance = null)
    {
        $nodes = array();
        if ($this->domDocument->getElementsByTagName($name)->length > 0) {
            foreach ($this->domDocument->getElementsByTagName($name) as $node) {
                if ($checkInstance === null || $node instanceof $checkInstance) {
                    $nodes[] = $this->getHandler($node, count($nodes));
                }
            }
        }
        return $nodes;
    }
    /**
     * @param string $name
     * @return ElementHandler[]
     */
    public function getElementsByName($name)
    {
        return $this->getNodesByName($name, 'DOMElement');
    }
    /**
     * @param string $name
     * @param array $attributes
     * @param \DOMNode $node
     * @return ElementHandler[]
     */
    public function getElementsByNameAndAttributes($name, array $attributes, \DOMNode $node = null)
    {
        $matchingElements = $this->getElementsByName($name);
        if ((!empty($attributes) || $node instanceof \DOMNode) && !empty($matchingElements)) {
            $nodes = $this->searchTagsByXpath($name, $attributes, $node);
            if (!empty($nodes)) {
                $matchingElements = $this->getElementsHandlers($nodes);
            }
        }
        return $matchingElements;
    }
    /**
     * @param \DOMNodeList $nodeList
     * @return ElementHandler[]
     */
    public function getElementsHandlers(\DOMNodeList $nodeList)
    {
        $nodes = array();
        if (!empty($nodeList)) {
            $index = 0;
            foreach ($nodeList as $node) {
                if ($node instanceof \DOMElement) {
                    $nodes[] = $this->getElementHandler($node, $this, $index);
                    $index++;
                }
            }
        }
        return $nodes;
    }
    /**
     * @param string $name
     * @param array $attributes
     * @param \DOMNode $node
     * @return \DOMNodeList
     */
    public function searchTagsByXpath($name, array $attributes, \DOMNode $node = null)
    {
        $xpath = new \DOMXPath($this->domDocument);
        $xQuery = sprintf("%s//*[local-name() = '%s']", $node instanceof \DOMNode ? '.' : '', $name);
        foreach ($attributes as $attributeName => $attributeValue) {
            $xQuery .= sprintf("[@%s='%s']", $attributeName, $attributeValue);
        }
        return $xpath->query($xQuery, $node);
    }
    /**
     * @param string $name
     * @param array $attributes
     * @return null|ElementHandler
     */
    public function getElementByNameAndAttributes($name, array $attributes)
    {
        $elements = $this->getElementsByNameAndAttributes($name, $attributes);
        return empty($elements) ? null : array_shift($elements);
    }
}
