<?php

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\DomHandler\AttributeHandler;
use WsdlToPhp\PackageGenerator\DomHandler\AbstractAttributeHandler;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\AbstractTag;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\Model\Schema;
use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Model\StructAttribute;

abstract class AbstractAttributesParser extends AbstractTagParser
{
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parseWsdl()
     */
    protected function parseWsdl(Wsdl $wsdl)
    {
        foreach ($this->getTags() as $tag) {
            if ($tag instanceof AbstractTag) {
                $this->parseTag($tag);
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
     * @param AbstractTag $tag
     */
    public function parseTag(AbstractTag $tag)
    {
        $parent = $tag->getSuitableParent();
        if ($parent instanceof AbstractTag && $tag->hasAttributeName() && ($model = $this->getModel($parent)) instanceof Struct && ($modelAttribute = $model->getAttribute($tag->getAttributeName())) instanceof StructAttribute) {
            $this->parseTagAttributes($tag, $model, $modelAttribute);
        }
    }
    /**
     * @param AbstractTag $tag
     * @param Struct $struct
     * @param StructAttribute $attribute
     */
    protected function parseTagAttributes(AbstractTag $tag, Struct $struct, StructAttribute $attribute)
    {
        foreach ($tag->getAttributes() as $tagAttribute) {
            switch ($tagAttribute->getName()) {
                case AbstractAttributeHandler::ATTRIBUTE_NAME:
                    /**
                     * Avoid this attribute to be added as meta
                     */
                    break;
                case AbstractAttributeHandler::ATTRIBUTE_TYPE:
                    $this->parseTagAttributeType($tagAttribute, $attribute);
                    break;
                case AbstractAttributeHandler::ATTRIBUTE_ABSTRACT:
                    $struct->setIsAbstract($tagAttribute->getValue(false, true, 'bool'));
                    break;
                default:
                    $attribute->addMeta($tagAttribute->getName(), $tagAttribute->getValue(true));
                    break;
            }
        }
    }
    /**
     * @param AttributeHandler $tagAttribute
     * @param StructAttribute $attribute
     */
    protected function parseTagAttributeType(AttributeHandler $tagAttribute, StructAttribute $attribute)
    {
        $type = $tagAttribute->getValue();
        if ($type !== null) {
            $typeModel          = $this->generator->getStruct($type);
            $modelAttributeType = $attribute->getType();
            if ($typeModel instanceof Struct && (empty($modelAttributeType) || strtolower($modelAttributeType) === 'unknown')) {
                if ($typeModel->getIsRestriction()) {
                    $attribute->setType($typeModel->getName());
                } elseif (!$typeModel->getIsStruct() && $typeModel->getInheritance()) {
                    $attribute->setType($typeModel->getInheritance());
                }
            }
        }
    }
}
