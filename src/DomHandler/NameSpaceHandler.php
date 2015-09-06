<?php

namespace WsdlToPhp\PackageGenerator\DomHandler;

class NameSpaceHandler extends AttributeHandler
{
    /**
     * @var \DOMNameSpaceNode
     */
    private $nodeNameSpace;
    /**
     * @param \DOMNameSpaceNode $nameSpaceNode
     * @param AbstractDomDocumentHandler $domDocumentHandler
     * @param int $index
     */
    public function __construct(\DOMNameSpaceNode $nameSpaceNode, AbstractDomDocumentHandler $domDocumentHandler, $index = -1)
    {
        parent::__construct(new \DOMAttr($nameSpaceNode->nodeName, $nameSpaceNode->nodeValue), $domDocumentHandler, $index);
        $this->nodeNameSpace = $nameSpaceNode;
    }
    /**
     * value is always with [http|https]:// so we need to keep the full value
     * @param bool $withNamespace
     * @param bool $withinItsType
     * @param string $asType
     * @return mixed
     */
    public function getValue($withNamespace = false, $withinItsType = true, $asType = null)
    {
        return parent::getValue(true, $withNamespace, $asType);
    }
    /**
     * @return null|string
     */
    public function getValueNamespace()
    {
        return null;
    }
}
