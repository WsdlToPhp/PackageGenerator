<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Model\StructAttribute;
use WsdlToPhp\WsdlHandler\Tag\AbstractTag as Tag;
use WsdlToPhp\WsdlHandler\Tag\TagAttributeGroup;
use WsdlToPhp\WsdlHandler\Wsdl as WsdlDocument;

final class TagAttribute extends AbstractAttributesParser
{
    public function parseTag(Tag $tag): void
    {
        parent::parseTag($tag);

        $parent = $tag->getSuitableParent();

        // Is it part of an attributeGroup?
        if (!$tag->hasAttribute('type') || !$parent instanceof TagAttributeGroup) {
            return;
        }

        foreach ($parent->getReferencingElements() as $element) {
            if (($model = $this->getModel($element)) instanceof Struct && ($attribute = $model->getAttribute($tag->getAttributeName())) instanceof StructAttribute) {
                $this->parseTagAttributes($tag, $attribute);
            }
        }
    }

    protected function parsingTag(): string
    {
        return WsdlDocument::TAG_ATTRIBUTE;
    }
}
