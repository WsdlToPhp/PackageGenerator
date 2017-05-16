<?php

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl as WsdlDocument;
use WsdlToPhp\DomHandler\AttributeHandler;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\AbstractTag as Tag;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagRestriction as Restriction;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\Model\Struct;

class TagRestriction extends AbstractTagParser
{
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parseWsdl()
     * @param Wsdl $wsdl
     */
    protected function parseWsdl(Wsdl $wsdl)
    {
        foreach ($this->getTags() as $tag) {
            if ($tag instanceof Restriction && $tag->isEnumeration() === false) {
                $this->parseRestriction($tag);
            }
        }
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parsingTag()
     */
    protected function parsingTag()
    {
        return WsdlDocument::TAG_RESTRICTION;
    }
    /**
     * @param Restriction $restriction
     */
    public function parseRestriction(Restriction $restriction)
    {
        $parent = $restriction->getSuitableParent();
        if ($parent instanceof Tag) {
            $model = $this->getModel($parent);
            if ($model instanceof Struct) {
                $this->getGenerator()->getStructs()->addVirtualStruct($parent->getAttributeName());
                $this->parseRestrictionAttributes($parent, $model, $restriction)->parseRestrictionChildren($parent, $restriction);
            }
        }
    }
    /**
     * @param Tag $parent
     * @param Struct $struct
     * @param Restriction $restriction
     * @return TagRestriction
     */
    private function parseRestrictionAttributes(Tag $parent, Struct $struct, Restriction $restriction)
    {
        if ($restriction->hasAttributes()) {
            foreach ($restriction->getAttributes() as $attribute) {
                $this->parseRestrictionAttribute($parent, $struct, $attribute);
            }
        }
        return $this;
    }
    /**
     * @param Tag $parent
     * @param Struct $struct
     * @param AttributeHandler $attribute
     * @return TagRestriction
     */
    private function parseRestrictionAttribute(Tag $parent, Struct $struct, AttributeHandler $attribute)
    {
        if ($attribute->getName() === 'base' && $attribute->getValue() !== $parent->getAttributeName()) {
            $struct->setInheritance($attribute->getValue());
        } else {
            $struct->addMeta($attribute->getName(), $attribute->getValue(true));
        }
        return $this;
    }
    /**
     * @param Tag $parent
     * @param Restriction $restriction
     * @return TagRestriction
     */
    private function parseRestrictionChildren(Tag $parent, Restriction $restriction)
    {
        foreach ($restriction->getElementChildren() as $child) {
            if ($child instanceof Tag) {
                $this->parseRestrictionChild($parent, $child);
            }
        }
        return $this;
    }
    /**
     * @param Tag $tag
     * @param Tag $child
     * @return TagRestriction
     */
    private function parseRestrictionChild(Tag $tag, Tag $child)
    {
        if ($child->hasAttributeValue() && ($model = $this->getModel($tag)) instanceof Struct) {
            $model->addMeta($child->getName(), $child->getValueAttributeValue(true));
        } else {
            foreach ($child->getAttributes() as $attribute) {
                $this->parseRestrictionChildAttribute($tag, $child, $attribute);
            }
        }
        return $this;
    }
    /**
     * @param Tag $tag
     * @param Tag $child
     * @param AttributeHandler $attribute
     * @return TagRestriction
     */
    private function parseRestrictionChildAttribute(Tag $tag, Tag $child, AttributeHandler $attribute)
    {
        if (strtolower($attribute->getName()) === 'arraytype' && ($model = $this->getModel($tag)) instanceof Struct) {
            $model->setInheritance($attribute->getValue());
        }
        return $this;
    }
}
