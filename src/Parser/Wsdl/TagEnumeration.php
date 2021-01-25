<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Model\StructValue;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\WsdlHandler\Tag\AbstractTag as Tag;
use WsdlToPhp\WsdlHandler\Tag\TagEnumeration as Enumeration;
use WsdlToPhp\WsdlHandler\Wsdl as WsdlDocument;

final class TagEnumeration extends AbstractTagParser
{
    public function addStructValue(Tag $tag, Enumeration $enumeration): void
    {
        // issue #177: first time, the enumeration struct is unknown,
        // it'll be created when addValue is called on the existing struct which is not an enum
        $struct = $this->getModel($tag, $enumeration->getRestrictionParentType());
        $struct = $struct ? $struct : $this->getModel($tag);
        if (!$struct instanceof Struct) {
            return;
        }

        // issue #177: the aim of redefining the $struct variable is to keep the reference to the right struct
        $struct = $struct->addValue($enumeration->getValue());
        if (($value = $struct->getValue($enumeration->getValue())) instanceof StructValue) {
            $this->parseTagAttributes($enumeration, $value);
        }
    }

    protected function parseWsdl(Wsdl $wsdl): void
    {
        foreach ($this->getTags() as $tag) {
            $this->parseEnumeration($tag);
        }
    }

    protected function parsingTag(): string
    {
        return WsdlDocument::TAG_ENUMERATION;
    }

    protected function parseEnumeration(Enumeration $enumeration): void
    {
        $parent = $enumeration->getSuitableParent();

        if (!$parent instanceof Tag) {
            return;
        }

        $this->addStructValue($parent, $enumeration);
    }
}
