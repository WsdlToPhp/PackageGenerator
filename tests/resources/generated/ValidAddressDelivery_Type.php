<?php

namespace Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for AddressDelivery_Type StructType
 * Meta informations extracted from the WSDL
 * - documentation: The delivery address of the customer. This is a verified address on Location Register.
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
class ApiAddressDelivery_Type extends AbstractStructBase
{
    /**
     * The Street1
     * Meta informations extracted from the WSDL
     * - base: string
     * - documentation: First line on delivery address
     * @var string
     */
    public $Street1;
    /**
     * The Street2
     * Meta informations extracted from the WSDL
     * - base: string
     * - documentation: Second line on delivery address
     * @var string
     */
    public $Street2;
    /**
     * The Street3
     * Meta informations extracted from the WSDL
     * - base: string
     * - documentation: Third line on delivery address
     * @var string
     */
    public $Street3;
    /**
     * The City
     * Meta informations extracted from the WSDL
     * - base: string
     * - documentation: The delivery city
     * @var string
     */
    public $City;
    /**
     * The PostalCode
     * Meta informations extracted from the WSDL
     * - base: string
     * - length: 4
     * - documentation: Postal code for the city
     * @var string
     */
    public $PostalCode;
    /**
     * Constructor method for AddressDelivery_Type
     * @uses ApiAddressDelivery_Type::setStreet1()
     * @uses ApiAddressDelivery_Type::setStreet2()
     * @uses ApiAddressDelivery_Type::setStreet3()
     * @uses ApiAddressDelivery_Type::setCity()
     * @uses ApiAddressDelivery_Type::setPostalCode()
     * @param string $street1
     * @param string $street2
     * @param string $street3
     * @param string $city
     * @param string $postalCode
     */
    public function __construct($street1 = null, $street2 = null, $street3 = null, $city = null, $postalCode = null)
    {
        $this
            ->setStreet1($street1)
            ->setStreet2($street2)
            ->setStreet3($street3)
            ->setCity($city)
            ->setPostalCode($postalCode);
    }
    /**
     * Get Street1 value
     * @return string|null
     */
    public function getStreet1()
    {
        return $this->Street1;
    }
    /**
     * Set Street1 value
     * @param string $street1
     * @return \Api\StructType\ApiAddressDelivery_Type
     */
    public function setStreet1($street1 = null)
    {
        // validation for constraint: string
        if (!is_null($street1) && !is_string($street1)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($street1)), __LINE__);
        }
        $this->Street1 = $street1;
        return $this;
    }
    /**
     * Get Street2 value
     * @return string|null
     */
    public function getStreet2()
    {
        return $this->Street2;
    }
    /**
     * Set Street2 value
     * @param string $street2
     * @return \Api\StructType\ApiAddressDelivery_Type
     */
    public function setStreet2($street2 = null)
    {
        // validation for constraint: string
        if (!is_null($street2) && !is_string($street2)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($street2)), __LINE__);
        }
        $this->Street2 = $street2;
        return $this;
    }
    /**
     * Get Street3 value
     * @return string|null
     */
    public function getStreet3()
    {
        return $this->Street3;
    }
    /**
     * Set Street3 value
     * @param string $street3
     * @return \Api\StructType\ApiAddressDelivery_Type
     */
    public function setStreet3($street3 = null)
    {
        // validation for constraint: string
        if (!is_null($street3) && !is_string($street3)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($street3)), __LINE__);
        }
        $this->Street3 = $street3;
        return $this;
    }
    /**
     * Get City value
     * @return string|null
     */
    public function getCity()
    {
        return $this->City;
    }
    /**
     * Set City value
     * @param string $city
     * @return \Api\StructType\ApiAddressDelivery_Type
     */
    public function setCity($city = null)
    {
        // validation for constraint: string
        if (!is_null($city) && !is_string($city)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($city)), __LINE__);
        }
        $this->City = $city;
        return $this;
    }
    /**
     * Get PostalCode value
     * @return string|null
     */
    public function getPostalCode()
    {
        return $this->PostalCode;
    }
    /**
     * Set PostalCode value
     * @param string $postalCode
     * @return \Api\StructType\ApiAddressDelivery_Type
     */
    public function setPostalCode($postalCode = null)
    {
        // validation for constraint: length
        if ((is_scalar($postalCode) && strlen($postalCode) !== 4) || (is_array($postalCode) && count($postalCode) !== 4)) {
            throw new \InvalidArgumentException('Invalid length, please provide an array with 4 element(s) or a scalar of 4 character(s)', __LINE__);
        }
        // validation for constraint: string
        if (!is_null($postalCode) && !is_string($postalCode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($postalCode)), __LINE__);
        }
        $this->PostalCode = $postalCode;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Api\StructType\ApiAddressDelivery_Type
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
