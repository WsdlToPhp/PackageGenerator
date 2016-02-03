<?php

namespace WsdlToPhp\PackageGenerator\DomHandler;

abstract class AbstractElementHandler extends AbstractNodeHandler
{
    /**
     * @param \DOMElement $element
     * @param AbstractDomDocumentHandler $domDocument
     * @param int $index
     */
    public function __construct(\DOMElement $element, AbstractDomDocumentHandler $domDocument, $index = -1)
    {
        parent::__construct($element, $domDocument, $index);
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\DomHandler\AbstractNodeHandler::getNode()
     * @return \DOMElement
     */
    public function getNode()
    {
        return parent::getNode();
    }
    /**
     * Alias to getNode()
     * @return \DOMElement
     */
    public function getElement()
    {
        return $this->getNode();
    }
    /**
     * @param string $name
     * @return boolean
     */
    public function hasAttribute($name)
    {
        return $this->getElement()->hasAttribute($name);
    }
    /**
     * @param string $name
     * @return AttributeHandler|null
     */
    public function getAttribute($name)
    {
        return $this->hasAttribute($name) ? $this->getDomDocumentHandler()->getHandler($this->getNode()->getAttributeNode($name)) : null;
    }
    /**
     * @param string $name
     * @return mixed
     */
    public function getAttributeValue($name, $withNamespace = false, $withinItsType = true, $asType = AbstractAttributeHandler::DEFAULT_VALUE_TYPE)
    {
        $value = null;
        $attribute = $this->getAttribute($name);
        if ($attribute instanceof AbstractAttributeHandler) {
            $value = $attribute->getValue($withNamespace, $withinItsType, $asType);
        }
        return $value;
    }
    /**
     * @param string $name
     * @return NodeHandler[]|ElementHandler[]
     */
    public function getChildrenByName($name)
    {
        $children = array();
        if ($this->hasChildren()) {
            foreach ($this->getElement()->getElementsByTagName($name) as $index=>$node) {
                $children[] = $this->getDomDocumentHandler()->getHandler($node, $index);
            }
        }
        return $children;
    }
    /**
     * @return ElementHandler[]
     */
    public function getElementChildren()
    {
        $children = array();
        if ($this->hasChildren()) {
            $children = $this->getDomDocumentHandler()->getElementsHandlers($this->getChildNodes());
        }
        return $children;
    }
    /**
     * @param string $name
     * @param array $attributes
     * @return ElementHandler[]
     */
    public function getChildrenByNameAndAttributes($name, array $attributes)
    {
        return $this->getDomDocumentHandler()->getElementsByNameAndAttributes($name, $attributes, $this->getNode());
    }
    /**
     * @param string $name
     * @param array $attributes
     * @return ElementHandler|null
     */
    public function getChildByNameAndAttributes($name, array $attributes)
    {
        $children = $this->getChildrenByNameAndAttributes($name, $attributes);
        return empty($children) ? null : array_shift($children);
    }
    /**
     * Info at {@link https://www.w3.org/TR/xmlschema-0/#OccurrenceConstraints}
     * @return mixed
     */
    public function getMaxOccurs()
    {
        $maxOccurs = $this->getAttributeValue(AbstractAttributeHandler::ATTRIBUTE_MAX_OCCURS);
        if ($maxOccurs === AbstractAttributeHandler::VALUE_UNBOUNDED) {
            return $maxOccurs;
        }
        if (!is_numeric($maxOccurs)) {
            return AbstractAttributeHandler::DEFAULT_OCCURENCE_VALUE;
        }
        return (int) $maxOccurs;
    }
    /**
     * Info at {@link https://www.w3.org/TR/xmlschema-0/#OccurrenceConstraints}
     * @return int
     */
    public function getMinOccurs()
    {
        $minOccurs = $this->getAttributeValue(AbstractAttributeHandler::ATTRIBUTE_MIN_OCCURS);
        if (!is_numeric($minOccurs)) {
            return AbstractAttributeHandler::DEFAULT_OCCURENCE_VALUE;
        }
        return (int) $minOccurs;
    }
    /**
     * Info at {@link https://www.w3.org/TR/xmlschema-0/#OccurrenceConstraints}
     * @return bool
     */
    public function canOccurSeveralTimes()
    {
        return ($this->getMinOccurs() > 1) || ($this->getMaxOccurs() > 1) || ($this->getMaxOccurs() === AbstractAttributeHandler::VALUE_UNBOUNDED);
    }
    /**
     * Info at {@link https://www.w3.org/TR/xmlschema-0/#OccurrenceConstraints}
     * @return bool
     */
    public function canOccurOnlyOnce()
    {
        return ($this->getMinOccurs() === 1) || ($this->getMaxOccurs()  === 1);
    }
    /**
     * Info at {@link https://www.w3.org/TR/xmlschema-0/#OccurrenceConstraints}
     * @return bool
     */
    public function isOptional()
    {
        return $this->getMinOccurs() === 0;
    }
    /**
     * Info at {@link https://www.w3.org/TR/xmlschema-0/#OccurrenceConstraints}
     * @return bool
     */
    public function isRequired()
    {
        return $this->getMinOccurs() >= 1;
    }
}
