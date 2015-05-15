<?php

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl as WsdlDocument;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\TagDocumentation as Documentation;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\AbstractTag;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\Model\Schema;
use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Model\StructValue;
use WsdlToPhp\PackageGenerator\Model\AbstractModel;

class TagDocumentation extends AbstractTagParser
{
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::getTags()
     * @return array[\WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\TagDocumentation]
     */
    public function getTags()
    {
        return parent::getTags();
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parseWsdl()
     */
    protected function parseWsdl(Wsdl $wsdl)
    {
        foreach ($this->getTags() as $tag) {
            $this->parseDocumentation($tag);
        }
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parseSchema()
     */
    protected function parseSchema(Wsdl $wsdl, Schema $schema)
    {
        $this->parseWsdl($wsdl);
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parsingTag()
     */
    protected function parsingTag()
    {
        return WsdlDocument::TAG_DOCUMENTATION;
    }
    /**
     * @param Documentation $documentation
     */
    public function parseDocumentation(Documentation $documentation)
    {
        $content      = $documentation->getContent();
        $parent       = $documentation->getSuitableParent();
        $parentParent = $parent instanceof AbstractTag ? $parent->getSuitableParent() : null;

        if (!empty($content) && $parent instanceof AbstractTag) {
            /**
             * Is it an element ? part of a struct
             * Finds parent node of this documentation node
             */
            if ($parent->hasAttribute('type') && $parentParent instanceof AbstractTag) {
                if ($this->getModel($parentParent) instanceof Struct && $this->getModel($parentParent)->getAttribute($parent->getAttributeName())) {
                    $this->getModel($parentParent)->getAttribute($parent->getAttributeName())->setDocumentation($content);
                }
            } elseif($parent->getName() === WsdlDocument::TAG_ENUMERATION) {
                if ($parentParent instanceof AbstractTag && $this->getModel($parentParent) instanceof Struct && $this->getModel($parentParent)->getValue($parent->getAttributeName()) instanceof StructValue) {
                    $this->getModel($parentParent)->getValue($parent->getAttributeName())->setDocumentation($content);
                }
            } elseif ($this->getModel($parent) instanceof AbstractModel) {
                $this->getModel($parent)->setDocumentation($content);
            }
        }
    }
}
