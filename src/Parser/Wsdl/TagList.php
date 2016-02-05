<?php

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl as WsdlDocument;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\TagList as ListTag;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\AbstractTag;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Model\StructAttribute;

class TagList extends AbstractTagParser
{
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parseWsdl()
     */
    protected function parseWsdl(Wsdl $wsdl)
    {
        foreach ($this->getTags() as $tag) {
            if ($tag instanceof ListTag) {
                $this->parseList($tag);
            }
        }
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
        $parent = $tag->getSuitableParent();
        if ($parent instanceof AbstractTag) {
            $parentParent = $parent->getSuitableParent();
            $model = $this->getModel($parent);
            if ($model === null && $parentParent instanceof AbstractTag) {
                $model = $this->getModel($parentParent);
            }
            $itemType = $tag->getAttributeItemType();
            $itemType = empty($itemType) ? 'string' : $itemType;
            $struct = $this->getStructByName($itemType);
            if ($model instanceof Struct) {
                $type = $struct instanceof Struct ? $struct->getName() : $itemType;
                if ($parentParent instanceof AbstractTag && ($attribute = $model->getAttribute($parent->getAttributeName())) instanceof StructAttribute) {
                    $attribute
                        ->setContainsElements(true)
                        ->setType($type);
                } else {
                    $model->setInheritance(sprintf('%s[]', $type));
                }
            }
        }
    }
}
