<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Model\AbstractModel;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\WsdlHandler\Tag\AbstractTag;
use WsdlToPhp\WsdlHandler\Tag\TagExtension as Extension;
use WsdlToPhp\WsdlHandler\Wsdl as WsdlDocument;

final class TagExtension extends AbstractTagParser
{
    public function parseExtension(Extension $extension): void
    {
        $base = $extension->getAttribute('base')->getValue();
        $parent = $extension->getSuitableParent();
        if (!empty($base) && $parent instanceof AbstractTag && $this->getModel($parent) instanceof AbstractModel && $parent->getAttributeName() !== $base) {
            $this->getModel($parent)->setInheritance($base);
        }
    }

    protected function parseWsdl(Wsdl $wsdl): void
    {
        foreach ($this->getTags() as $tag) {
            $this->parseExtension($tag);
        }
    }

    protected function parsingTag(): string
    {
        return WsdlDocument::TAG_EXTENSION;
    }
}
