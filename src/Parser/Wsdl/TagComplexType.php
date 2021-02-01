<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\WsdlHandler\Wsdl as WsdlDocument;
use WsdlToPhp\WsdlHandler\Tag\TagComplexType as ComplexType;

class TagComplexType extends AbstractTagParser
{
    protected function parseWsdl(Wsdl $wsdl): void
    {
        foreach ($this->getTags() as $tag) {
            $this->parseComplexType($tag);
        }
    }

    protected function parsingTag(): string
    {
        return WsdlDocument::TAG_COMPLEX_TYPE;
    }

    public function parseComplexType(ComplexType $complexType): void
    {
        $this->parseTagAttributes($complexType);
    }
}
