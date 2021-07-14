<?php

namespace WsdlToPhp\PackageGenerator\WsdlHandler\Tag;

use WsdlToPhp\PackageGenerator\WsdlHandler\AbstractDocument;

class TagChoice extends Tag
{
    /**
     * @return AbstractTag[]
     */
    public function getChildrenElements()
    {
        $children = [];
        foreach (self::getChildrenElementsTags() as $tagName) {
            $children = array_merge($children, $this->getFilteredChildrenByName($tagName));
        }
        return $children;
    }

    /**
     * @param $tagName
     * @return AbstractTag[]
     */
    protected function getFilteredChildrenByName($tagName)
    {
        return array_filter($this->getChildrenByName($tagName), [
            $this,
            'filterFoundChildren',
        ]);
    }

    /**
     * This must ensure the current element, based on its tagName is not contained by another element than the choice.
     * If it is contained by another element, then it is child/property of its parent element and does not belong to the choice elements
     * @param AbstractTag $child
     * @return bool
     */
    protected function filterFoundChildren(AbstractTag $child)
    {
        $forbiddenParentTags = self::getForbiddenParentTags();
        $valid = true;
        while ($child && $child->getParent() && !$this->getNode()->isSameNode($child->getParent()->getNode())) {
            $valid &= !in_array($child->getParent()->getName(), $forbiddenParentTags);
            $child = $child->getParent();
        }
        return (bool) $valid;
    }

    /**
     * @see https://www.w3.org/TR/xmlschema11-1/#element-choice
     * @return string[]
     */
    public static function getChildrenElementsTags()
    {
        return [
            AbstractDocument::TAG_ELEMENT,
            AbstractDocument::TAG_GROUP,
            AbstractDocument::TAG_CHOICE,
            AbstractDocument::TAG_ANY,
        ];
    }

    /**
     * @return string[]
     */
    public static function getForbiddenParentTags()
    {
        return [
            AbstractDocument::TAG_COMPLEX_TYPE,
            AbstractDocument::TAG_SEQUENCE,
        ];
    }
}
