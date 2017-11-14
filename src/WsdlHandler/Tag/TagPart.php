<?php

namespace WsdlToPhp\PackageGenerator\WsdlHandler\Tag;

use WsdlToPhp\DomHandler\AttributeHandler;
use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl as WsdlDocument;

class TagPart extends Tag
{
    /**
     * @var string
     */
    const ATTRIBUTE_ELEMENT = 'element';
    /**
     * @var string
     */
    const ATTRIBUTE_TYPE = 'type';
    /**
     * @param bool $returnValue
     * @return AttributeHandler|mixed
     */
    public function getAttributeElement($returnValue = true)
    {
        return $this->getAttributeMixedValue(self::ATTRIBUTE_ELEMENT, $returnValue);
    }
    /**
     * @param bool $returnValue
     * @return AttributeHandler|mixed
     */
    public function getAttributeType($returnValue = true)
    {
        return $this->getAttributeMixedValue(self::ATTRIBUTE_TYPE, $returnValue);
    }
    /**
     * @param string $attributeName
     * @param bool $returnValue
     * @return AttributeHandler|mixed
     */
    protected function getAttributeMixedValue($attributeName, $returnValue = true)
    {
        $value = $this->getAttribute($attributeName);
        if ($returnValue === true && $value instanceof AttributeHandler) {
            $value = $value->getValue();
        }
        return $value;
    }
    /**
     * @return string
     */
    public function getFinalType()
    {
        $type = $this->getAttributeType();
        if (empty($type)) {
            $elementName = $this->getAttributeElement();
            if (!empty($elementName)) {
                $element = $this->getDomDocumentHandler()->getElementByNameAndAttributes(WsdlDocument::TAG_ELEMENT, [
                    'name' => $elementName,
                ], true);
                if ($element instanceof TagElement && $element->hasAttribute(self::ATTRIBUTE_TYPE)) {
                    $type = $element->getAttribute(self::ATTRIBUTE_TYPE)->getValue();
                } else {
                    $type = $elementName;
                }
            }
        }
        return $type;
    }
    /**
     * @return string
     */
    public function getFinalName()
    {
        $name = $this->getAttributeType();
        if (empty($name)) {
            $name = $this->getAttributeElement();
        }
        return $name;
    }
    /**
     * @return null|string
     */
    public function getFinalNamespace()
    {
        $attribute = $this->getAttributeType(false);
        if (empty($attribute)) {
            $attribute = $this->getAttributeElement(false);
            if (empty($attribute)) {
                return null;
            }
        }
        return $attribute->getValueNamespace();
    }
}
