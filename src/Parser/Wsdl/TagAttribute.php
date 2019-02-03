<?php

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Model\StructAttribute;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\AbstractTag as Tag;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagAttributeGroup;
use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl as WsdlDocument;

class TagAttribute extends AbstractAttributesParser
{
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parsingTag()
     */
    protected function parsingTag()
    {
        return WsdlDocument::TAG_ATTRIBUTE;
    }

    /**
     * @param Tag $tag
     */
    public function parseTag(Tag $tag)
    {
        parent::parseTag($tag);

        $parent = $tag->getSuitableParent();
        /**
         * Is it part of an attributeGroup
         */
        if ($tag->hasAttribute('type') && $parent instanceof TagAttributeGroup) {
            foreach ($parent->getReferencingElements() as $element) {
                if (($model = $this->getModel($element)) instanceof Struct && ($attribute = $model->getAttribute($tag->getAttributeName())) instanceof StructAttribute) {
                    $this->parseTagAttributes($tag, $attribute);
                }
            }
        }
    }
}
