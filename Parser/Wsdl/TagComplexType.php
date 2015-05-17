<?php

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\DomHandler\AbstractAttributeHandler;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl as WsdlDocument;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\TagComplexType as ComplexType;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\AbstractTag;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\Model\Schema;
use WsdlToPhp\PackageGenerator\Model\Struct;

class TagComplexType extends AbstractTagParser
{
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parseWsdl()
     */
    protected function parseWsdl(Wsdl $wsdl)
    {
        foreach ($this->getTags() as $tag) {
            $this->parseComplexType($tag);
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
        return WsdlDocument::TAG_COMPLEX_TYPE;
    }
    /**
     * @param ComplexType $complexType
     */
    public function parseComplexType(ComplexType $complexType)
    {
        return $this->parseTagAttributes($complexType);
    }
    /**
     * Generic method to be used by TagElement
     * @param AbstractTag $tag
     */
    public function parseTagAttributes(AbstractTag $tag)
    {
        $model = $this->getModel($tag);
        if ($model instanceof Struct && $tag->hasAttributes()) {
            foreach ($tag->getAttributes() as $attribute) {
                switch ($attribute->getName()) {
                    case AbstractAttributeHandler::ATTRIBUTE_NAME:
                        /**
                         * Avoid this attribute to be added as meta
                         */
                        break;
                    case AbstractAttributeHandler::ATTRIBUTE_ABSTRACT:
                        $model->setIsAbstract($attribute->getValue(false, true, 'bool'));
                        break;
                    default:
                        $model->addMeta($attribute->getName(), $attribute->getValue(true));
                        break;
                }
            }
        }
    }
}
