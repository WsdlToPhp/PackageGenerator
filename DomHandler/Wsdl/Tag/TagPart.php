<?php

namespace WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag;

use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl as WsdlDocument;

class TagPart extends AbstractTag
{
    const
        ATTRIBUTE_ELEMENT = 'element',
        ATTRIBUTE_TYPE    = 'type';
    /**
     * @param bool $returnValue
     * @return null|string|\WsdlToPhp\PackageGenerator\DomHandler\AttributeHandler
     */
    public function getAttributeElement($returnValue = true)
    {
        if ($this->hasAttribute(self::ATTRIBUTE_ELEMENT) === true) {
            if ($returnValue === true) {
                return $this->getAttribute(self::ATTRIBUTE_ELEMENT)->getValue();
            } else {
                return $this->getAttribute(self::ATTRIBUTE_ELEMENT);
            }
        }
        return $returnValue === true ? '' : null;
    }
    /**
     * @param bool $returnValue
     * @return string|\WsdlToPhp\PackageGenerator\DomHandler\AttributeHandler
     */
    public function getAttributeType($returnValue = true)
    {
        if ($this->hasAttribute(self::ATTRIBUTE_TYPE) === true) {
            if ($returnValue === true) {
                return $this->getAttribute(self::ATTRIBUTE_TYPE)->getValue();
            } else {
                return $this->getAttribute(self::ATTRIBUTE_TYPE);
            }
        }
        return $returnValue === true ? '' : null;
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
                $element = $this->getDomDocumentHandler()->getElementByNameAndAttributes(WsdlDocument::TAG_ELEMENT, array(
                    'name' => $elementName,
                ), true);
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
                return $attribute;
            }
        }
        return $attribute->getValueNamespace();
    }
}
