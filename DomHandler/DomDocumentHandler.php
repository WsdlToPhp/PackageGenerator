<?php

namespace WsdlToPhp\PackageGenerator\DomHandler;

use WsdlToPhp\PackageGenerator\DomHandler\AbstractDomDocumentHandler;

class DomDocumentHandler extends AbstractDomDocumentHandler
{
    /**
     * @see \WsdlToPhp\PackageGenerator\DomHandler\AbstractDomDocumentHandler::getNodeHandler()
     * @return NodeHandler
     */
    protected function getNodeHandler(\DOMNode $node, AbstractDomDocumentHandler $domDocument, $index = -1)
    {
        return new NodeHandler($node, $domDocument, $index);
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\DomHandler\AbstractDomDocumentHandler::getElementHandler()
     * @return ElementHandler
     */
    protected function getElementHandler(\DOMElement $element, AbstractDomDocumentHandler $domDocument, $index = -1)
    {
        return new ElementHandler($element, $domDocument, $index);
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\DomHandler\AbstractDomDocumentHandler::getAttributeHandler()
     * @return AttributeHandler
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
