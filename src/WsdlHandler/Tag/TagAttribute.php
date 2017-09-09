<?php

namespace WsdlToPhp\PackageGenerator\WsdlHandler\Tag;

use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl as WsdlDocument;

class TagAttribute extends Tag
{
    /**
     * @see \WsdlToPhp\PackageGenerator\WsdlHandler\Tag\AbstractTag::getSuitableParentTags()
     */
    public function getSuitableParentTags(array $additionalTags = [])
    {
        return parent::getSuitableParentTags(array_merge($additionalTags, [
            WsdlDocument::TAG_ATTRIBUTE_GROUP,
        ]));
    }
}
