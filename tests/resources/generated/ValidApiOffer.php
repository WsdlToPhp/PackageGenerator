<?php

namespace Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for offer StructType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:offer
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
class ApiOffer extends ApiOrder
{
    /**
     * The offerClassMember
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $offerClassMember;
    /**
     * The offer
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \Api\StructType\ApiOffer
     */
    public $offer;
    /**
     * Constructor method for offer
     * @uses ApiOffer::setOfferClassMember()
     * @uses ApiOffer::setOffer()
     * @param string $offerClassMember
     * @param \Api\StructType\ApiOffer $offer
     */
    public function __construct($offerClassMember = null, \Api\StructType\ApiOffer $offer = null)
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
    public function getOfferClassMember()
    {
        return isset($this->offerClassMember) ? $this->offerClassMember : null;
    }
    /**
     * Set offerClassMember value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $offerClassMember
     * @return \Api\StructType\ApiOffer
     */
    public function setOfferClassMember($offerClassMember = null)
    {
        // validation for constraint: string
        if (!is_null($offerClassMember) && !is_string($offerClassMember)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($offerClassMember)), __LINE__);
        }
        if (is_null($offerClassMember)) {
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
     * @return \Api\StructType\ApiOffer|null
     */
    public function getOffer()
    {
        return isset($this->offer) ? $this->offer : null;
    }
    /**
     * Set offer value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \Api\StructType\ApiOffer $offer
     * @return \Api\StructType\ApiOffer
     */
    public function setOffer(\Api\StructType\ApiOffer $offer = null)
    {
        if (is_null($offer)) {
            unset($this->offer);
        } else {
            $this->offer = $offer;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Api\StructType\ApiOffer
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
