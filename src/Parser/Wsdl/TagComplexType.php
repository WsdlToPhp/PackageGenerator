<?php

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl as WsdlDocument;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagComplexType as ComplexType;
use WsdlToPhp\PackageGenerator\Model\Wsdl;

class TagComplexType extends AbstractTagParser
{
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parseWsdl()
     * @param Wsdl $wsdl
     */
    protected function parseWsdl(Wsdl $wsdl)
    {
        foreach ($this->getTags() as $tag) {
            if ($tag instanceof ComplexType) {
                $this->parseComplexType($tag);
            }
        }
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parsingTag()
     */
    protected function parsingTag()
    {
        return WsdlDocument::TAG_COMPLEX_TYPE;
    }
    /**
     * @param ComplexType $complexType
     */
    public function parseComplexType(ComplexType $complexType)
    {
        $this->parseTagAttributes($complexType);
    }
}
