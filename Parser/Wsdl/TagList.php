<?php

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl as WsdlDocument;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\TagList as ListTag;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\Model\Schema;

class TagList extends AbstractTagParser
{

    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::getTags()
     * @return array[\WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\TagList]
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
            $this->parseList($tag);
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
        return WsdlDocument::TAG_LIST;
    }
    /**
     * @param ListTag $tag
     */
    public function parseList(ListTag $tag)
    {
        $parent       = $tag->getSuitableParent();
        $parentParent = $parent !== null ? $parent->getSuitableParent() : null;
        $model        = $this->getModel($parent);
        if ($model === null && $parentParent !== null) {
            $model = $this->getModel($parentParent);
        }
        $itemType     = $tag->getAttributeItemType();
        $struct       = $this->getStructByName($itemType);
        if ($parent !== null && $model !== null) {
            $type = sprintf('array[%s]', $struct !== null ? $struct->getName() : $itemType);
            if ($parentParent !== null && ($attribute = $model->getAttribute($parent->getAttributeName())) !== null) {
                $model->getAttribute($parent->getAttributeName())->setInheritance($type);
            } else {
                $model->setInheritance($type);
            }
        }
    }
}
