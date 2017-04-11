<?php

namespace WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag;

use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl as WsdlDocument;

class TagAttribute extends Tag
{
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
