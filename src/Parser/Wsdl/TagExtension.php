<?php

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl as WsdlDocument;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagExtension as Extension;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\AbstractTag;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\Model\AbstractModel;

class TagExtension extends AbstractTagParser
{
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parseWsdl()
     * @param Wsdl $wsdl
     */
    protected function parseWsdl(Wsdl $wsdl)
    {
        foreach ($this->getTags() as $tag) {
            if ($tag instanceof Extension) {
                $this->parseExtension($tag);
            }
        }
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parsingTag()
     */
    protected function parsingTag()
    {
        return WsdlDocument::TAG_EXTENSION;
    }
    /**
     * @param Extension $extension
     */
    public function parseExtension(Extension $extension)
    {
        $base = $extension->getAttribute('base')->getValue();
        $parent = $extension->getSuitableParent();
        if (!empty($base) && $parent instanceof AbstractTag && $this->getModel($parent) instanceof AbstractModel && $parent->getAttributeName() !== $base) {
            $this->getModel($parent)->setInheritance($base);
        }
    }
}
