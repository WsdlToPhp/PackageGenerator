<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for Item StructType
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
#[\AllowDynamicProperties]
class ApiItem extends AbstractStructBase
{
    /**
     * The itemType
     * @var string|null
     */
    protected ?string $itemType = null;
    /**
     * The id
     * Meta information extracted from the WSDL
     * - documentation: ID for an object
     * - base: xsd:string
     * @var string|null
     */
    protected ?string $id = null;
    /**
     * The displayName
     * @var string|null
     */
    protected ?string $displayName = null;
    /**
     * The any
     * @var \DOMDocument|string|null
     */
    protected $any = null;
    /**
     * Constructor method for Item
     * @uses ApiItem::setItemType()
     * @uses ApiItem::setId()
     * @uses ApiItem::setDisplayName()
     * @uses ApiItem::setAny()
     * @param string $itemType
     * @param string $id
     * @param string $displayName
     * @param \DOMDocument|string|null $any
     */
    public function __construct(?string $itemType = null, ?string $id = null, ?string $displayName = null, $any = null)
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
     * @uses \EnumType\ApiItemType::valueIsValid()
     * @uses \EnumType\ApiItemType::getValidValues()
     * @throws InvalidArgumentException
     * @param string $itemType
     * @return \StructType\ApiItem
     */
    public function setItemType(?string $itemType = null): self
    {
        // validation for constraint: enumeration
        if (!\EnumType\ApiItemType::valueIsValid($itemType)) {
            throw new InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \EnumType\ApiItemType', is_array($itemType) ? implode(', ', $itemType) : var_export($itemType, true), implode(', ', \EnumType\ApiItemType::getValidValues())), __LINE__);
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
     * @return \StructType\ApiItem
     */
    public function setId(?string $id = null): self
    {
        // validation for constraint: string
        if (!is_null($id) && !is_string($id)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($id, true), gettype($id)), __LINE__);
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
     * @return \StructType\ApiItem
     */
    public function setDisplayName(?string $displayName = null): self
    {
        // validation for constraint: string
        if (!is_null($displayName) && !is_string($displayName)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($displayName, true), gettype($displayName)), __LINE__);
        }
        $this->displayName = $displayName;
        
        return $this;
    }
    /**
     * Get any value
     * @uses \DOMDocument::loadXML()
     * @param bool $asDomDocument true: returns \DOMDocument, false: returns XML string
     * @return \DOMDocument|string|null
     */
    public function getAny(bool $asDomDocument = false)
    {
        $domDocument = null;
        if (!empty($this->any) && $asDomDocument) {
            $domDocument = new \DOMDocument('1.0', 'UTF-8');
            $domDocument->loadXML($this->any);
        }
        return $asDomDocument ? $domDocument : $this->any;
    }
    /**
     * Set any value
     * @uses \DOMDocument::hasChildNodes()
     * @uses \DOMDocument::saveXML()
     * @uses \DOMNode::item()
     * @param \DOMDocument|string|null $any
     * @return \StructType\ApiItem
     */
    public function setAny($any = null): self
    {
        // validation for constraint: xml
        if (!is_null($any) && !$any instanceof \DOMDocument && (!is_string($any) || (is_string($any) && (empty($any) || (($anyDoc = new \DOMDocument()) && false === $anyDoc->loadXML($any)))))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a valid XML string', var_export($any, true)), __LINE__);
        }
        $this->any = ($any instanceof \DOMDocument) ? $any->saveXML($any->hasChildNodes() ? $any->childNodes->item(0) : null) : $any;
        
        return $this;
    }
}
