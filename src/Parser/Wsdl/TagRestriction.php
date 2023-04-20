<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\DomHandler\AbstractAttributeHandler;
use WsdlToPhp\DomHandler\AttributeHandler;
use WsdlToPhp\PackageGenerator\Model\AbstractModel;
use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Model\StructAttribute;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\WsdlHandler\AbstractDocument;
use WsdlToPhp\WsdlHandler\Tag\AbstractTag;
use WsdlToPhp\WsdlHandler\Tag\AbstractTag as Tag;
use WsdlToPhp\WsdlHandler\Tag\TagRestriction as Restriction;

final class TagRestriction extends AbstractTagParser
{
    public function parseRestriction(Restriction $restriction): void
    {
        /** @var AbstractTag $parent */
        $parent = $restriction->getSuitableParent();
        if (!$parent) {
            return;
        }

        /** @var AbstractTag $parentParent */
        $parentParent = $parent->getSuitableParent();
        if ($parentParent) {
            $parentModel = $this->getModel($parentParent);
            if (!$parentModel instanceof Struct) {
                return;
            }

            $parentAttribute = $parentModel->getAttribute($parent->getAttributeName());
            if (!$parentAttribute instanceof StructAttribute) {
                return;
            }

            $this
                ->parseRestrictionAttributes($parentAttribute, $restriction)
                ->parseRestrictionChildren($parentAttribute, $restriction)
            ;
        } else {
            // If restriction has a base attribute, it's not necessarily, and probably surely,
            // not declared as inheriting from the base attribute value.
            // This is why it's first searched without type in order to complete its information,
            // otherwise we look for the model already inheriting from the base attribute value.
            $model = $this->getModel($parent, $restriction->getAttributeBase()) ?? $this->getModel($parent);

            // If restriction is contained by a union tag, don't create the virtual struct as "union"s
            // are wrongly parsed by SoapClient::__getTypes and this creates a duplicated element then
            if (!$model && !$restriction->hasUnionParent()) {
                $this->getGenerator()->getStructs()->addVirtualStruct($parent->getAttributeName(), $restriction->getAttributeBase());
                $model = $this->getModel($parent, $restriction->getAttributeBase());
            }

            if ($model instanceof Struct) {
                $this
                    ->parseRestrictionAttributes($model, $restriction)
                    ->parseRestrictionChildren($model, $restriction)
                ;
            }
        }
    }

    protected function parseWsdl(Wsdl $wsdl): void
    {
        /** @var Restriction $tag */
        foreach ($this->getTags() as $tag) {
            if ($tag->isEnumeration()) {
                continue;
            }

            $this->parseRestriction($tag);
        }
    }

    protected function parsingTag(): string
    {
        return AbstractDocument::TAG_RESTRICTION;
    }

    protected function parseRestrictionAttributes(AbstractModel $model, Restriction $restriction): self
    {
        if (!$restriction->hasAttributes()) {
            return $this;
        }

        // ensure inheritance of model is well-defined, SoapClient parser is based on SoapClient::__getTypes which can be false in some case
        $model->setInheritance($restriction->getAttributeBase());

        /** @var AbstractAttributeHandler $attribute */
        foreach ($restriction->getAttributes() as $attribute) {
            $model->addMeta($attribute->getName(), $attribute->getValue(true));
        }

        return $this;
    }

    protected function parseRestrictionChildren(AbstractModel $model, Restriction $restriction): self
    {
        foreach ($restriction->getElementChildren() as $child) {
            if (!$child instanceof Tag) {
                continue;
            }

            $this->parseRestrictionChild($model, $child);
        }

        return $this;
    }

    protected function parseRestrictionChild(AbstractModel $model, Tag $child): self
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

    protected function parseRestrictionChildAttribute(AbstractModel $model, AttributeHandler $attribute): self
    {
        if ('arraytype' === mb_strtolower($attribute->getName())) {
            $model->setInheritance($attribute->getValue());
        }

        $model->addMeta($attribute->getName(), $attribute->getValue(true));

        return $this;
    }
}
