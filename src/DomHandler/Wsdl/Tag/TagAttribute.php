<?php

namespace WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag;

use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl as WsdlDocument;

class TagAttribute extends AbstractTag
{
    /**
     * @see \WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\AbstractTag::getSuitableParent()
     */
    public function getSuitableParent($checkName = true, array $additionalTags = array(), $maxDeep = self::MAX_DEEP, $strict = false)
    {
        /**
         * Reset current tag as using getStrictParent method set currentTag to enumeration
         * as soon as currentTag has been set, if a valid DOMElement is found
         * then without taking care of the actual DOMElement tag name,
         * a TagEnumeration is always returned.
         * Moreover, we reset current tag only if we're not in the case of the call
         * for the current $this->getStrictParent(WsdlDocument::TAG_ENUMERATION); call.
         * @todo If it's possible, find a cleaner way to solve this 'issue'
         */
        if ($strict === false) {
            $this->getDomDocumentHandler()->setCurrentTag('');
        }
        return parent::getSuitableParent($checkName, $additionalTags, $maxDeep, $strict);
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\AbstractTag::getSuitableParentTags()
     */
    public function getSuitableParentTags(array $additionalTags = array())
    {
        return parent::getSuitableParentTags(array_merge($additionalTags, array(
            WsdlDocument::TAG_ATTRIBUTE_GROUP,
        )));
    }
}
