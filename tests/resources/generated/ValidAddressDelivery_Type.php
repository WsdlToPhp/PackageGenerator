<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for AddressDelivery_Type StructType
 * Meta information extracted from the WSDL
 * - documentation: The delivery address of the customer. This is a verified address on Location Register.
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
#[\AllowDynamicProperties]
class ApiAddressDelivery_Type extends AbstractStructBase
{
    /**
     * The Street1
     * Meta information extracted from the WSDL
     * - documentation: First line on delivery address
     * - base: string
     * @var string|null
     */
    protected ?string $Street1 = null;
    /**
     * The Street2
     * Meta information extracted from the WSDL
     * - documentation: Second line on delivery address
     * - base: string
     * @var string|null
     */
    protected ?string $Street2 = null;
    /**
     * The Street3
     * Meta information extracted from the WSDL
     * - documentation: Third line on delivery address
     * - base: string
     * @var string|null
     */
    protected ?string $Street3 = null;
    /**
     * The City
     * Meta information extracted from the WSDL
     * - documentation: The delivery city
     * - base: string
     * @var string|null
     */
    protected ?string $City = null;
    /**
     * The PostalCode
     * Meta information extracted from the WSDL
     * - documentation: Postal code for the city
     * - base: string
     * - length: 4
     * @var string|null
     */
    protected ?string $PostalCode = null;
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
    public function __construct(?string $street1 = null, ?string $street2 = null, ?string $street3 = null, ?string $city = null, ?string $postalCode = null)
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
    public function getStreet1(): ?string
    {
        return $this->Street1;
    }
    /**
     * Set Street1 value
     * @param string $street1
     * @return \StructType\ApiAddressDelivery_Type
     */
    public function setStreet1(?string $street1 = null): self
    {
        // validation for constraint: string
        if (!is_null($street1) && !is_string($street1)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($street1, true), gettype($street1)), __LINE__);
        }
        $this->Street1 = $street1;
        
        return $this;
    }
    /**
     * Get Street2 value
     * @return string|null
     */
    public function getStreet2(): ?string
    {
        return $this->Street2;
    }
    /**
     * Set Street2 value
     * @param string $street2
     * @return \StructType\ApiAddressDelivery_Type
     */
    public function setStreet2(?string $street2 = null): self
    {
        // validation for constraint: string
        if (!is_null($street2) && !is_string($street2)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($street2, true), gettype($street2)), __LINE__);
        }
        $this->Street2 = $street2;
        
        return $this;
    }
    /**
     * Get Street3 value
     * @return string|null
     */
    public function getStreet3(): ?string
    {
        return $this->Street3;
    }
    /**
     * Set Street3 value
     * @param string $street3
     * @return \StructType\ApiAddressDelivery_Type
     */
    public function setStreet3(?string $street3 = null): self
    {
        // validation for constraint: string
        if (!is_null($street3) && !is_string($street3)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($street3, true), gettype($street3)), __LINE__);
        }
        $this->Street3 = $street3;
        
        return $this;
    }
    /**
     * Get City value
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->City;
    }
    /**
     * Set City value
     * @param string $city
     * @return \StructType\ApiAddressDelivery_Type
     */
    public function setCity(?string $city = null): self
    {
        // validation for constraint: string
        if (!is_null($city) && !is_string($city)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($city, true), gettype($city)), __LINE__);
        }
        $this->City = $city;
        
        return $this;
    }
    /**
     * Get PostalCode value
     * @return string|null
     */
    public function getPostalCode(): ?string
    {
        return $this->PostalCode;
    }
    /**
     * Set PostalCode value
     * @param string $postalCode
     * @return \StructType\ApiAddressDelivery_Type
     */
    public function setPostalCode(?string $postalCode = null): self
    {
        // validation for constraint: string
        if (!is_null($postalCode) && !is_string($postalCode)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($postalCode, true), gettype($postalCode)), __LINE__);
        }
        // validation for constraint: length(4)
        if (!is_null($postalCode) && mb_strlen((string) $postalCode) !== 4) {
            throw new InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal must be equal to 4', mb_strlen((string) $postalCode)), __LINE__);
        }
        $this->PostalCode = $postalCode;
        
        return $this;
    }
}
