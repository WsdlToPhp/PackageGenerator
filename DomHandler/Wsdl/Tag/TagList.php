<?php

namespace WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag;

class TagList extends AbstractTag
{
    const
        ATTRIBUTE_ITEM_TYPE = 'itemType';
    /**
     * @return string
     */
    public function getAttributeItemType()
    {
        return $this->hasAttribute(self::ATTRIBUTE_ITEM_TYPE) === true ? $this->getAttribute(self::ATTRIBUTE_ITEM_TYPE)->getValue() : '';
    }
}
