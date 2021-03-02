<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\WsdlHandler\Tag\TagComplexType as ComplexType;
use WsdlToPhp\WsdlHandler\Wsdl as WsdlDocument;

final class TagComplexType extends AbstractTagParser
{
    public function parseComplexType(ComplexType $complexType): void
    {
        $this->parseTagAttributes($complexType);
    }

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
}
