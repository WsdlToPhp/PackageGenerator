<?php

namespace WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag;

use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl as WsdlDocument;

class TagDocumentation extends AbstractTag
{
    /**
     * @return string
     */
    public function getContent()
    {
        return $this->getNodeValue();
    }
    /**
     * Finds parent node of this documentation node without taking care of the name attribute for enumeration and definitions
     * This case is managed first because enumerations are contained by elements and the method could climb to its parent without stopping on the enumeration tag
     * Indeed, depending on the node, it may contain or not the attribute named "name" so we have to split each case
     * Go from the deepest possible node to the highest possible node
     * Each case must be treated on the same level, this is why we test the suitableParent for each case
     * @see \WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\AbstractTag::getSuitableParent()
     */
    public function getSuitableParent($checkName = true, array $additionalTags = array(), $maxDeep = self::MAX_DEEP, $strict = false)
    {
        if ($strict === false) {
            $enumerationTag = $this->getStrictParent(WsdlDocument::TAG_ENUMERATION);
            if ($enumerationTag instanceof TagEnumeration) {
                return $enumerationTag;
            }
        }
        return parent::getSuitableParent($checkName, $additionalTags, $maxDeep);
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\AbstractTag::getSuitableParentTags()
     */
    public function getSuitableParentTags(array $additionalTags = array())
    {
        return parent::getSuitableParentTags(array_merge($additionalTags, array(
            WsdlDocument::TAG_OPERATION,
        )));
    }
}
