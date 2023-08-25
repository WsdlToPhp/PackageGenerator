<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for offer StructType
 * Meta information extracted from the WSDL
 * - nillable: true
 * - type: tns:offer
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
#[\AllowDynamicProperties]
class ApiOffer extends ApiOrder
{
    /**
     * The offerClassMember
     * Meta information extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string|null
     */
    protected ?string $offerClassMember = null;
    /**
     * The offer
     * Meta information extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \StructType\ApiOffer|null
     */
    protected ?\StructType\ApiOffer $offer = null;
    /**
     * Constructor method for offer
     * @uses ApiOffer::setOfferClassMember()
     * @uses ApiOffer::setOffer()
     * @param string $offerClassMember
     * @param \StructType\ApiOffer $offer
     */
    public function __construct(?string $offerClassMember = null, ?\StructType\ApiOffer $offer = null)
    {
        $this
            ->setOfferClassMember($offerClassMember)
            ->setOffer($offer);
    }
    /**
     * Get offerClassMember value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getOfferClassMember(): ?string
    {
        return $this->offerClassMember ?? null;
    }
    /**
     * Set offerClassMember value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $offerClassMember
     * @return \StructType\ApiOffer
     */
    public function setOfferClassMember(?string $offerClassMember = null): self
    {
        // validation for constraint: string
        if (!is_null($offerClassMember) && !is_string($offerClassMember)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($offerClassMember, true), gettype($offerClassMember)), __LINE__);
        }
        if (is_null($offerClassMember) || (is_array($offerClassMember) && empty($offerClassMember))) {
            unset($this->offerClassMember);
        } else {
            $this->offerClassMember = $offerClassMember;
        }
        
        return $this;
    }
    /**
     * Get offer value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \StructType\ApiOffer|null
     */
    public function getOffer(): ?\StructType\ApiOffer
    {
        return $this->offer ?? null;
    }
    /**
     * Set offer value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \StructType\ApiOffer $offer
     * @return \StructType\ApiOffer
     */
    public function setOffer(?\StructType\ApiOffer $offer = null): self
    {
        if (is_null($offer) || (is_array($offer) && empty($offer))) {
            unset($this->offer);
        } else {
            $this->offer = $offer;
        }
        
        return $this;
    }
}
