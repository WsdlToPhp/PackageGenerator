<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Model\StructAttribute;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\WsdlHandler\Tag\AbstractTag as Tag;

abstract class AbstractAttributesParser extends AbstractTagParser
{
    public function parseTag(Tag $tag): void
    {
        $parent = $tag->getSuitableParent();

        if ($parent instanceof Tag) {
            $model = $this->getModel($parent);
            if ($model instanceof Struct) {
                if ($tag->hasAttributeName() && ($modelAttribute = $model->getAttribute($tag->getAttributeName())) instanceof StructAttribute) {
                    $this->parseTagAttributes($tag, $model, $modelAttribute);

                    return;
                }

                if ($tag->hasAttributeRef() && ($modelAttribute = $model->getAttribute($tag->getAttributeRef())) instanceof StructAttribute) {
                    $this->parseTagAttributes($tag, $model, $modelAttribute);

                    return;
                }

                $this->parseTagAttributes($tag, $model);
            }
        }

        $this->parseTagAttributes($tag);
    }

    protected function parseWsdl(Wsdl $wsdl): void
    {
        foreach ($this->getTags() as $tag) {
            $this->parseTag($tag);
        }
    }
}
