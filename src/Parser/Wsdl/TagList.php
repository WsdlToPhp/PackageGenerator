<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Model\StructAttribute;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\WsdlHandler\Tag\AbstractTag;
use WsdlToPhp\WsdlHandler\Tag\TagList as ListTag;
use WsdlToPhp\WsdlHandler\Wsdl as WsdlDocument;

final class TagList extends AbstractTagParser
{
    public function parseList(ListTag $tag): void
    {
        $parent = $tag->getSuitableParent();
        if (!$parent instanceof AbstractTag) {
            return;
        }

        $parentParent = $parent->getSuitableParent();
        $model = $this->getModel($parent);
        if (is_null($model) && $parentParent instanceof AbstractTag) {
            $model = $this->getModel($parentParent);
        }

        if (!$model instanceof Struct) {
            return;
        }

        $itemType = $tag->getItemType();
        $struct = $this->getStructByName($itemType);

        $type = $struct instanceof Struct ? $struct->getName() : $itemType;
        if ($parentParent instanceof AbstractTag && ($attribute = $model->getAttribute($parent->getAttributeName())) instanceof StructAttribute) {
            $attribute
                ->setContainsElements(true)
                ->setType($type)
                ->setInheritance($type)
            ;
        } else {
            $model
                ->setList($type)
                ->setInheritance(sprintf('%s[]', $type))
            ;
        }
    }

    protected function parseWsdl(Wsdl $wsdl): void
    {
        foreach ($this->getTags() as $tag) {
            $this->parseList($tag);
        }
    }

    protected function parsingTag(): string
    {
        return WsdlDocument::TAG_LIST;
    }
}
