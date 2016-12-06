<?php

namespace WsdlToPhp\PackageGenerator\DomHandler;

use WsdlToPhp\PackageGenerator\DomHandler\AbstractDomDocumentHandler;

class DomDocumentHandler extends AbstractDomDocumentHandler
{
    /**
     * @param \DOMNode $node
     * @param \WsdlToPhp\PackageGenerator\DomHandler\AbstractDomDocumentHandler $domDocument
     * @param int $index
     * @return NodeHandler
     * @see \WsdlToPhp\PackageGenerator\DomHandler\AbstractDomDocumentHandler::getNodeHandler()
     */
    protected function getNodeHandler(\DOMNode $node, AbstractDomDocumentHandler $domDocument, $index = -1)
    {
        return new NodeHandler($node, $domDocument, $index);
    }

    /**
     * @param \DOMElement $element
     * @param \WsdlToPhp\PackageGenerator\DomHandler\AbstractDomDocumentHandler $domDocument
     * @param int $index
     * @return ElementHandler
     * @see \WsdlToPhp\PackageGenerator\DomHandler\AbstractDomDocumentHandler::getNodeHandler()
     */
    protected function getElementHandler(\DOMElement $element, AbstractDomDocumentHandler $domDocument, $index = -1)
    {
        return new ElementHandler($element, $domDocument, $index);
    }

    /**
     * @param \DOMAttr $attribute
     * @param \WsdlToPhp\PackageGenerator\DomHandler\AbstractDomDocumentHandler $domDocument
     * @param int $index
     * @return AttributeHandler
     * @see \WsdlToPhp\PackageGenerator\DomHandler\AbstractDomDocumentHandler::getAttributeHandler()
     */
    protected function getAttributeHandler(\DOMAttr $attribute, AbstractDomDocumentHandler $domDocument, $index = -1)
    {
        return new AttributeHandler($attribute, $domDocument, $index);
    }
    /**
     * @return ElementHandler
     */
    public function getRootElement()
    {
        return $this->rootElement;
    }
}
