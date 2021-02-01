<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\WsdlHandler\Wsdl as WsdlDocument;
use WsdlToPhp\WsdlHandler\Tag\AbstractTag as Tag;
use WsdlToPhp\PackageGenerator\Model\StructAttribute;
use WsdlToPhp\PackageGenerator\Model\AbstractModel;

class TagElement extends AbstractAttributesParser
{
    protected function parsingTag(): string
    {
        return WsdlDocument::TAG_ELEMENT;
    }

    protected function parseTagAttributes(Tag $tag, AbstractModel $model = null, StructAttribute $structAttribute = null): void
    {
        parent::parseTagAttributes($tag, $model, $structAttribute);

        if ($structAttribute instanceof StructAttribute) {
            $structAttribute
                ->setContainsElements($tag->canOccurSeveralTimes())
                ->setRemovableFromRequest($tag->isRemovable());
        }
    }
}
