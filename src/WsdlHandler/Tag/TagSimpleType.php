<?php

namespace WsdlToPhp\PackageGenerator\WsdlHandler\Tag;

use WsdlToPhp\PackageGenerator\WsdlHandler\AbstractDocument;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagRestriction as Restriction;

class TagSimpleType extends Tag
{
    /**
     * @return bool
     */
    public function hasRestrictionChild()
    {
        return $this->getFirstRestrictionChild() instanceof Restriction;
    }
    /**
     * @return Restriction|null
     */
    public function getFirstRestrictionChild()
    {
        return $this->getChildByNameAndAttributes(AbstractDocument::TAG_RESTRICTION, []);
    }
}
