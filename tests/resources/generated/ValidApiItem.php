<?php

namespace Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for Item StructType
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
class ApiItem extends AbstractStructBase
{
    /**
     * The itemType
     * @var string
     */
    public $itemType;
    /**
     * The id
     * Meta informations extracted from the WSDL
     * - base: xsd:string
     * - documentation: ID for an object
     * @var string
     */
    public $id;
    /**
     * The displayName
     * @var string
     */
    public $displayName;
    /**
     * The any
     * @var \DOMDocument
     */
    public $any;
    /**
     * Constructor method for Item
     * @uses ApiItem::setItemType()
     * @uses ApiItem::setId()
     * @uses ApiItem::setDisplayName()
     * @uses ApiItem::setAny()
     * @param string $itemType
     * @param string $id
     * @param string $displayName
     * @param \DOMDocument $any
     */
    public function __construct($itemType = null, $id = null, $displayName = null, \DOMDocument $any = null)
    {
        $this
            ->setItemType($itemType)
            ->setId($id)
            ->setDisplayName($displayName)
            ->setAny($any);
    }
    /**
     * Get itemType value
     * @return string|null
     */
    public function getItemType()
    {
        return $this->itemType;
    }
    /**
     * Set itemType value
     * @uses \Api\EnumType\ApiItemType::valueIsValid()
     * @uses \Api\EnumType\ApiItemType::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $itemType
     * @return \Api\StructType\ApiItem
     */
    public function setItemType($itemType = null)
    {
        // validation for constraint: enumeration
        if (!\Api\EnumType\ApiItemType::valueIsValid($itemType)) {
            throw new \InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \Api\EnumType\ApiItemType', is_array($itemType) ? implode(', ', $itemType) : var_export($itemType, true), implode(', ', \Api\EnumType\ApiItemType::getValidValues())), __LINE__);
        }
        $this->itemType = $itemType;
        return $this;
    }
    /**
     * Get id value
     * @return string|null
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set id value
     * @param string $id
     * @return \Api\StructType\ApiItem
     */
    public function setId($id = null)
    {
        // validation for constraint: string
        if (!is_null($id) && !is_string($id)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($id, true), gettype($id)), __LINE__);
        }
        $this->id = $id;
        return $this;
    }
    /**
     * Get displayName value
     * @return string|null
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }
    /**
     * Set displayName value
     * @param string $displayName
     * @return \Api\StructType\ApiItem
     */
    public function setDisplayName($displayName = null)
    {
        // validation for constraint: string
        if (!is_null($displayName) && !is_string($displayName)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($displayName, true), gettype($displayName)), __LINE__);
        }
        $this->displayName = $displayName;
        return $this;
    }
    /**
     * Get any value
     * @uses \DOMDocument::loadXML()
     * @uses \DOMDocument::hasChildNodes()
     * @uses \DOMDocument::saveXML()
     * @uses \DOMNode::item()
     * @uses \Api\StructType\ApiItem::setAny()
     * @param bool $asString true: returns XML string, false: returns \DOMDocument
     * @return \DOMDocument|null
     */
    public function getAny($asString = true)
    {
        if (!empty($this->any) && !($this->any instanceof \DOMDocument)) {
            $dom = new \DOMDocument('1.0', 'UTF-8');
            $dom->formatOutput = true;
            if ($dom->loadXML($this->any)) {
                $this->setAny($dom);
            }
            unset($dom);
        }
        return ($asString && ($this->any instanceof \DOMDocument) && $this->any->hasChildNodes()) ? $this->any->saveXML($this->any->childNodes->item(0)) : $this->any;
    }
    /**
     * Set any value
     * @param \DOMDocument $any
     * @return \Api\StructType\ApiItem
     */
    public function setAny(\DOMDocument $any = null)
    {
        $this->any = $any;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Api\StructType\ApiItem
     */
    public static function __set_state(array $array)
    {
        return parent::__set_state($array);
    }
    /**
     * Method returning the class name
     * @return string __CLASS__
     */
    public function __toString()
    {
        return __CLASS__;
    }
}
