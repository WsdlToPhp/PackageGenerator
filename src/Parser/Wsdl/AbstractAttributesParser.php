<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\WsdlHandler\Tag\AbstractTag as Tag;
use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Model\StructAttribute;

abstract class AbstractAttributesParser extends AbstractTagParser
{
    protected function parseWsdl(Wsdl $wsdl): void
    {
        foreach ($this->getTags() as $tag) {
            $this->parseTag($tag);
        }
    }

    public function parseTag(Tag $tag)
    {
        $parent = $tag->getSuitableParent();
        if ($parent instanceof Tag) {
            $model = $this->getModel($parent);
            if ($model instanceof Struct) {
                if ($tag->hasAttributeName() && ($modelAttribute = $model->getAttribute($tag->getAttributeName())) instanceof StructAttribute) {
                    return $this->parseTagAttributes($tag, $model, $modelAttribute);
                } elseif ($tag->hasAttributeRef() && ($modelAttribute = $model->getAttribute($tag->getAttributeRef())) instanceof StructAttribute) {
                    return $this->parseTagAttributes($tag, $model, $modelAttribute);
                }
                $this->parseTagAttributes($tag, $model);
            }
        }

        $this->parseTagAttributes($tag);
    }
}
