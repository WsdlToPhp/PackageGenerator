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
     * @return AttributeHandler|string|int|null
     */
    public function getAttributeElement($returnValue = true)
    {
        return $this->getAttributeMixedValue(self::ATTRIBUTE_ELEMENT, $returnValue);
    }
    /**
     * @param bool $returnValue
     * @return AttributeHandler|string|int|null
     */
    public function getAttributeType($returnValue = true)
    {
        return $this->getAttributeMixedValue(self::ATTRIBUTE_TYPE, $returnValue);
    }
    /**
     * @param string $attributeName
     * @param bool $returnValue
     * @return AttributeHandler|string|int|null
     */
    protected function getAttributeMixedValue($attributeName, $returnValue = true)
    {
        $value = $this->getAttribute($attributeName);
        if ($returnValue) {
            $value = $value instanceof AttributeHandler ? $value->getValue() : null;
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
            $element = $this->getMatchingElement();
            if ($element instanceof TagElement && $element->hasAttribute(self::ATTRIBUTE_TYPE)) {
                $type = $element->getAttribute(self::ATTRIBUTE_TYPE)->getValue();
            } else {
                $type = $this->getAttributeElement();
            }
        }
        return $type;
    }
    /**
     * @return TagElement|null
     */
    public function getMatchingElement()
    {
        $element = null;
        $elementName = $this->getAttributeElement();
        if (!empty($elementName)) {
            $element = $this->getDomDocumentHandler()->getElementByNameAndAttributes(WsdlDocument::TAG_ELEMENT, [
                'name' => $elementName,
            ], true);
        }
        return $element;
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
