<?php

namespace WsdlToPhp\PackageGenerator\WsdlHandler\Tag;

use WsdlToPhp\PackageGenerator\WsdlHandler\AbstractDocument;

class TagList extends Tag
{
    const ATTRIBUTE_ITEM_TYPE = 'itemType';

    /**
     * @return string
     */
    public function getAttributeItemType()
    {
        return $this->hasAttribute(self::ATTRIBUTE_ITEM_TYPE) ? $this->getAttribute(self::ATTRIBUTE_ITEM_TYPE)->getValue() : '';
    }

    /**
     * @return string
     */
    public function getItemType()
    {
        $itemType = $this->getAttributeItemType();
        // this means this is its simpleType's restriction child element that defines its type
        if (empty($itemType)) {
            $child = $this->getChildByNameAndAttributes(AbstractDocument::TAG_RESTRICTION, []);
            if ($child instanceof TagRestriction && $child->hasAttributeBase()) {
                $itemType = $child->getAttributeBase();
            }
        }
        return $itemType;
    }
}
