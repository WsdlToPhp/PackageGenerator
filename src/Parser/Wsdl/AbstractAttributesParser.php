<?php

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\AbstractTag as Tag;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Model\StructAttribute;

abstract class AbstractAttributesParser extends AbstractTagParser
{
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parseWsdl()
     * @param Wsdl $wsdl
     */
    protected function parseWsdl(Wsdl $wsdl)
    {
        foreach ($this->getTags() as $tag) {
            if ($tag instanceof Tag) {
                $this->parseTag($tag);
            }
        }
    }
    /**
     * @param Tag $tag
     */
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
