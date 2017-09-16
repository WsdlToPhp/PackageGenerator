<?php

namespace WsdlToPhp\PackageGenerator\WsdlHandler\Tag;

use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl as WsdlDocument;

class TagDocumentation extends Tag
{
    /**
     * @return string
     */
    public function getContent()
    {
        return $this->getNodeValue();
    }
    /**
     * Finds parent node of this documentation node without taking care of the name attribute for enumeration.
     * This case is managed first because enumerations are contained by elements and
     * the method could climb to its parent without stopping on the enumeration tag.
     * Indeed, depending on the node, it may contain or not the attribute named "name" so we have to split each case.
     * @see \WsdlToPhp\PackageGenerator\WsdlHandler\Tag\AbstractTag::getSuitableParent()
     */
    public function getSuitableParent($checkName = true, array $additionalTags = [], $maxDeep = self::MAX_DEEP, $strict = false)
    {
        if ($strict === false) {
            $enumerationTag = $this->getStrictParent(WsdlDocument::TAG_ENUMERATION);
            if ($enumerationTag instanceof TagEnumeration) {
                return $enumerationTag;
            }
        }
        return parent::getSuitableParent($checkName, $additionalTags, $maxDeep, $strict);
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\WsdlHandler\Tag\AbstractTag::getSuitableParentTags()
     */
    public function getSuitableParentTags(array $additionalTags = [])
    {
        return parent::getSuitableParentTags(array_merge($additionalTags, [
            WsdlDocument::TAG_OPERATION,
            WsdlDocument::TAG_ATTRIBUTE_GROUP,
        ]));
    }
}
