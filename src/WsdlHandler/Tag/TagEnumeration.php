<?php

namespace WsdlToPhp\PackageGenerator\WsdlHandler\Tag;

use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl as WsdlDocument;

class TagEnumeration extends Tag
{
    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->getValueAttributeValue(true);
    }

    /**
     * @return TagRestriction|null
     */
    public function getRestrictionParent()
    {
        return $this->getStrictParent(WsdlDocument::TAG_RESTRICTION);
    }

    /**
     * @return string
     */
    public function getRestrictionParentType()
    {
        /** @var TagRestriction|null $restrictionParent */
        $restrictionParent = $this->getRestrictionParent();
        return $restrictionParent ? $restrictionParent->getAttributeBase() : '';
    }
}
