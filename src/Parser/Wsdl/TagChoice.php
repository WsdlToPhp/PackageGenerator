<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Model\StructAttribute;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\WsdlHandler\Tag\AbstractTag;
use WsdlToPhp\WsdlHandler\Tag\TagChoice as Choice;
use WsdlToPhp\WsdlHandler\Wsdl as WsdlDocument;

final class TagChoice extends AbstractTagParser
{
    /**
     * @see https://www.w3schools.com/xml/el_choice.asp
     * @see https://www.w3.org/TR/xmlschema11-1/#element-choice
     */
    public function parseChoice(Choice $choice): void
    {
        $parent = $choice->getSuitableParent();
        $children = $choice->getChildrenElements();
        if ($parent && count($children) && ($struct = $this->getModel($parent)) instanceof Struct) {
            $unionNames = [];
            foreach ($children as $child) {
                $unionNames[] = $child->getAttributeName() ? $child->getAttributeName() : $child->getAttributeRef();
            }
            foreach ($children as $child) {
                $this->parseChoiceChild($choice, $unionNames, $child, $struct);
            }
            unset($unionNames);
        }
    }

    protected function parseWsdl(Wsdl $wsdl): void
    {
        foreach ($this->getTags() as $tag) {
            $this->parseChoice($tag);
        }
    }

    protected function parsingTag(): string
    {
        return WsdlDocument::TAG_CHOICE;
    }

    protected function parseChoiceChild(Choice $choice, array $choiceNames, AbstractTag $child, Struct $struct): void
    {
        $attributeName = $child->getAttributeName();
        if (empty($attributeName) && ($attributeRef = $child->getAttributeRef())) {
            $attributeName = $attributeRef;
        }

        if (($structAttribute = $struct->getAttribute($attributeName)) instanceof StructAttribute) {
            $structAttribute
                ->setContainsElements($choice->canOccurSeveralTimes())
                ->addMeta('choice', $choiceNames)
                ->addMeta('choiceMaxOccurs', $choice->getMaxOccurs())
                ->addMeta('choiceMinOccurs', $choice->getMinOccurs())
            ;
        }
    }
}
