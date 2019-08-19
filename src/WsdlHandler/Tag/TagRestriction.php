<?php

namespace WsdlToPhp\PackageGenerator\WsdlHandler\Tag;

use WsdlToPhp\PackageGenerator\WsdlHandler\AbstractDocument;
use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl as WsdlDocument;

class TagRestriction extends Tag
{

    /**
     * @var string
     */
    const ATTRIBUTE_BASE = 'base';

    /**
     * @return boolean
     */
    public function isEnumeration()
    {
        return count($this->getEnumerations()) > 0;
    }

    /**
     * @return TagEnumeration[]
     */
    public function getEnumerations()
    {
        return $this->getChildrenByName(WsdlDocument::TAG_ENUMERATION);
    }

    /**
     * @return string
     */
    public function getAttributeBase()
    {
        return $this->hasAttributeBase() ? $this->getAttribute(self::ATTRIBUTE_BASE)->getValue() : '';
    }

    /**
     * @return bool
     */
    public function hasAttributeBase()
    {
        return $this->hasAttribute(self::ATTRIBUTE_BASE);
    }

    /**
     * Checks whether this element is contained by an union parent or not
     * @return bool
     */
    public function hasUnionParent()
    {
        return $this->getSuitableParent(false, [
            AbstractDocument::TAG_UNION,
        ], self::MAX_DEEP, true) instanceof TagUnion;
    }
}
