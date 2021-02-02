<?php

declare(strict_types=1);

namespace Api\StructType;

use WsdlToPhp\PackageBase\AbstractStructBase;

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
    public $itemType = null;
    /**
     * The id
     * Meta information extracted from the WSDL
     * - documentation: ID for an object
     * - base: xsd:string
     * @var string
     */
    public $id = null;
    /**
     * The displayName
     * @var string
     */
    public $displayName = null;
    /**
     * The any
     * @var DOMDocument
     */
    public $any = null;
    /**
     * Constructor method for Item
     * @uses ApiItem::setItemType()
     * @uses ApiItem::setId()
     * @uses ApiItem::setDisplayName()
     * @uses ApiItem::setAny()
     * @param string $itemType
     * @param string $id
     * @param string $displayName
     * @param DOMDocument $any
     */
    public function __construct(string $itemType = null, string $id = null, string $displayName = null, DOMDocument $any = null)
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
    public function getItemType(): ?string
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
    public function setItemType(string $itemType = null): self
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
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * Set id value
     * @param string $id
     * @return \Api\StructType\ApiItem
     */
    public function setId(string $id = null): self
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
    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }
    /**
     * Set displayName value
     * @param string $displayName
     * @return \Api\StructType\ApiItem
     */
    public function setDisplayName(string $displayName = null): self
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
     * @param bool $asString true: returns XML string, false: returns \DOMDocument
     * @return DOMDocument|null
     */
    public function getAny($asString = true): ?DOMDocument
    {
        $domDocument = null;
        if (!empty($this->any) && !$asString) {
            $domDocument = new \DOMDocument('1.0', 'UTF-8');
            $domDocument->loadXML($this->any);
        }
        return $asString ? $this->any : $domDocument;
    }
    /**
     * Set any value
     * @uses \DOMDocument::hasChildNodes()
     * @uses \DOMDocument::saveXML()
     * @uses \DOMNode::item()
     * @param DOMDocument $any
     * @return \Api\StructType\ApiItem
     */
    public function setAny(DOMDocument $any = null): self
    {
        $this->any = ($any instanceof \DOMDocument) && $any->hasChildNodes() ? $any->saveXML($any->childNodes->item(0)) : $any;
        return $this;
    }
}
