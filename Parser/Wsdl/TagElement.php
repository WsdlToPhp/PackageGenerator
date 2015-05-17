<?php

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl as WsdlDocument;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\AbstractTag;

class TagElement extends AbstractAttributesParser
{
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parsingTag()
     */
    protected function parsingTag()
    {
        return WsdlDocument::TAG_ELEMENT;
    }
    /**
     * @param AbstractTag $tag
     */
    public function parseTag(AbstractTag $tag)
    {
        parent::parseTag($tag);
        $complexType = new TagComplexType($this->getGenerator());
        $complexType->parseTagAttributes($tag);
    }
}
