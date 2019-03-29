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
        // issue #177: first time, the enumeration struct is unknown,
        // it'll be created when addValue is called on the existing struct which is not an enum
        $struct = $this->getModel($tag, $enumeration->getRestrictionParentType());
        $struct = $struct ? $struct : $this->getModel($tag);
        if ($struct instanceof Struct) {
            // issue #177: the aim of redefining the $struct variable is to keep the reference to the right struct
            $struct = $struct->addValue($enumeration->getValue());
            if (($value = $struct->getValue($enumeration->getValue())) instanceof StructValue) {
                $this->parseTagAttributes($enumeration, $value);
            }
        }
    }
}
