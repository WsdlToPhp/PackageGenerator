<?php

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl as WsdlDocument;
use WsdlToPhp\DomHandler\AttributeHandler;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\AbstractTag as Tag;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagRestriction as Restriction;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\Model\AbstractModel;
use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Model\StructAttribute;

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
        if ($parent) {
            $parentParent = $parent->getSuitableParent();
            if ($parentParent) {
                $parentModel = $this->getModel($parentParent);
                if ($parentModel instanceof Struct) {
                    $parentAttribute = $parentModel->getAttribute($parent->getAttributeName());
                    if ($parentAttribute instanceof StructAttribute) {
                        $this
                            ->parseRestrictionAttributes($parentAttribute, $restriction)
                            ->parseRestrictionChildren($parentAttribute, $restriction);
                    }
                }
            } else {
                // if restriction is contained by an union tag, don't create the virtual struct as "union"s
                // are wrongly parsed by SoapClient::__getTypes and this creates a duplicated element then
                $model = $this->getModel($parent, $restriction->getAttributeBase());
                if (!$restriction->hasUnionParent() && !$model) {
                    $this->getGenerator()->getStructs()->addVirtualStruct($parent->getAttributeName(), $restriction->getAttributeBase());
                    $model = $this->getModel($parent, $restriction->getAttributeBase());
                }
                if ($model instanceof Struct) {
                    $this
                        ->parseRestrictionAttributes($model, $restriction)
                        ->parseRestrictionChildren($model, $restriction);
                }
            }
        }
    }
    /**
     * @param AbstractModel $model
     * @param Restriction $restriction
     * @return TagRestriction
     */
    protected function parseRestrictionAttributes(AbstractModel $model, Restriction $restriction)
    {
        if ($restriction->hasAttributes()) {
            // ensure inheritance of model is well defined, SoapClient parser is based on SoapClient::__getTypes which can be false in some case
            $model->setInheritance($restriction->getAttributeBase());
            foreach ($restriction->getAttributes() as $attribute) {
                $model->addMeta($attribute->getName(), $attribute->getValue(true));
            }
        }
        return $this;
    }
    /**
     * @param AbstractModel $model
     * @param Restriction $restriction
     * @return TagRestriction
     */
    protected function parseRestrictionChildren(AbstractModel $model, Restriction $restriction)
    {
        foreach ($restriction->getElementChildren() as $child) {
            if ($child instanceof Tag) {
                $this->parseRestrictionChild($model, $child);
            }
        }
        return $this;
    }
    /**
     * @param AbstractModel $model
     * @param Tag $child
     * @return TagRestriction
     */
    protected function parseRestrictionChild(AbstractModel $model, Tag $child)
    {
        if ($child->hasAttributeValue()) {
            $model->addMeta($child->getName(), $child->getValueAttributeValue(true));
        } else {
            foreach ($child->getAttributes() as $attribute) {
                $this->parseRestrictionChildAttribute($model, $attribute);
            }
        }
        return $this;
    }
    /**
     * @param AbstractModel $model
     * @param AttributeHandler $attribute
     * @return TagRestriction
     */
    protected function parseRestrictionChildAttribute(AbstractModel $model, AttributeHandler $attribute)
    {
        if (mb_strtolower($attribute->getName()) === 'arraytype') {
            $model->setInheritance($attribute->getValue());
        }
        $model->addMeta($attribute->getName(), $attribute->getValue(true));
        return $this;
    }
}
