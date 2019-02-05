<?php

namespace WsdlToPhp\PackageGenerator\WsdlHandler\Tag;

use WsdlToPhp\PackageGenerator\WsdlHandler\AbstractDocument;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagRestriction as Restriction;

class Tag extends AbstractTag
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

    /**
     * Checks if the given tag is the same direct parent of this current tag
     * @param AbstractTag $tag
     * @return bool
     */
    public function isTheParent(AbstractTag $tag)
    {
        /** @var AbstractTag|null $parent */
        $parent = $this->getSuitableParent();
        return $parent ? $parent->getNode()->isSameNode($tag->getNode()) : false;
    }
}
