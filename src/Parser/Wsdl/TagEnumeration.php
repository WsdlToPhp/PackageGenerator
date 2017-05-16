<?php

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl as WsdlDocument;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\AbstractTag as Tag;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagEnumeration as Enumeration;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Model\StructValue;

class TagEnumeration extends AbstractTagParser
{
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parseWsdl()
     * @param Wsdl $wsdl
     */
    protected function parseWsdl(Wsdl $wsdl)
    {
        foreach ($this->getTags() as $tag) {
            if ($tag instanceof Enumeration) {
                $this->parseEnumeration($tag);
            }
        }
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parsingTag()
     */
    protected function parsingTag()
    {
        return WsdlDocument::TAG_ENUMERATION;
    }
    /**
     * @param Enumeration $enumeration
     */
    protected function parseEnumeration(Enumeration $enumeration)
    {
        $parent = $enumeration->getSuitableParent();
        if ($parent instanceof Tag) {
            $this->addStructValue($parent, $enumeration);
        }
    }
    /**
     * @param Tag $tag
     * @param Enumeration $enumeration
     */
    public function addStructValue(Tag $tag, Enumeration $enumeration)
    {
        $struct = $this->getModel($tag);
        if ($struct instanceof Struct) {
            $struct->addValue($enumeration->getValue());
            if (($value = $struct->getValue($enumeration->getValue())) instanceof StructValue) {
                $this->parseTagAttributes($enumeration, $value);
            }
        }
    }
}
