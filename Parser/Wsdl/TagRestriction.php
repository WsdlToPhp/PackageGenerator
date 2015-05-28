<?php

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl as WsdlDocument;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\AbstractTag as Tag;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\TagRestriction as Restriction;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\Model\Schema;

class TagRestriction extends AbstractTagParser
{
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::getTags()
     * @return array[\WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\TagRestriction]
     */
    public function getTags()
    {
        return parent::getTags();
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parseWsdl()
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
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parseSchema()
     */
    protected function parseSchema(Wsdl $wsdl, Schema $schema)
    {
        $this->parseWsdl($wsdl);
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parsingTag()
     */
    protected function parsingTag()
    {
        return WsdlDocument::TAG_RESTRICTION;
    }
    /**
     * @param Tag $tag
     * @param Restriction $restriction
     */
    public function parseRestriction(Restriction $restriction)
    {
        $parent = $restriction->getSuitableParent();
        $model  = $this->getModel($parent);
        if ($parent !== null && $model !== null) {
            $this->getGenerator()->getStructs()->addVirtualStruct($parent->getAttributeName());

            if ($restriction->hasAttributes()) {
                foreach ($restriction->getAttributes() as $attribute) {
                    if ($attribute->getName() === 'base' && $attribute->getValue() !== $parent->getAttributeName()) {
                        $this->getModel($parent)->setInheritance($attribute->getValue());
                    } else {
                        $this->getModel($parent)->addMeta($attribute->getName(), $attribute->getValue(true));
                    }
                }
            }

            foreach ($restriction->getElementChildren() as $child) {
                if ($child instanceof Tag) {
                    $this->parseRestrictionChild($parent, $child);
                }
            }
        }
    }
    /**
     * @param Tag $tag
     * @param Tag $child
     */
    private function parseRestrictionChild(Tag $tag, Tag $child)
    {
        if ($child->hasAttributeValue() && $this->getModel($tag) !== null) {
            $this->getModel($tag)->addMeta($child->getName(), $child->getAttributeValue(true));
        }
    }
}
