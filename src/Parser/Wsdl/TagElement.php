<?php

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl as WsdlDocument;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\AbstractTag as Tag;
use WsdlToPhp\PackageGenerator\Model\StructAttribute;
use WsdlToPhp\PackageGenerator\Model\AbstractModel;

class TagElement extends AbstractAttributesParser
{
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parsingTag()
     */
    protected function parsingTag()
    {
        return WsdlDocument::TAG_ELEMENT;
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractTagParser::parseTagAttributes()
     * @uses AbstractTagParser::parseTagAttributes()
     * @uses StructAttribute::setContainsElements()
     * @uses AbstractElementHandler::canOccurSeveralTimes()
     * @param Tag $tag
     * @param AbstractModel|null $model
     * @param StructAttribute|null $structAttribute
     */
    protected function parseTagAttributes(Tag $tag, AbstractModel $model = null, StructAttribute $structAttribute = null)
    {
        parent::parseTagAttributes($tag, $model, $structAttribute);
        if ($structAttribute instanceof StructAttribute) {
            $structAttribute->setContainsElements($tag->canOccurSeveralTimes())->setRemovableFromRequest($tag->isRemovable());
        }
    }
}
