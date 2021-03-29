<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for AddressType StructType
 * Meta information extracted from the WSDL
 * - documentation: Allows for control of the sharing of address information between parties. | Specifies if the associated data is formatted or not. When true, then it is formatted; when false, then not formatted. | Provides address information.
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
class ApiAddressType extends AbstractStructBase
{
    /**
     * The StreetNmbr
     * Meta information extracted from the WSDL
     * - minOccurs: 0
     * @var \StructType\ApiStreetNmbr|null
     */
    protected ?\StructType\ApiStreetNmbr $StreetNmbr = null;
    /**
     * The AddressLine
     * Meta information extracted from the WSDL
     * - documentation: When the address is unformatted (FormattedInd="false") these lines will contain free form address details. When the address is formatted and street number and street name must be sent independently, the street number will be sent
     * using StreetNmbr, and the street name will be sent in the first AddressLine occurrence. | Used for Character Strings, length 1 to 255.
     * - base: xs:string
     * - maxLength: 255
     * - maxOccurs: 5
     * - minLength: 1
     * - minOccurs: 0
     * @var string[]
     */
    protected array $AddressLine = [];
    /**
     * The CityName
     * Meta information extracted from the WSDL
     * - documentation: City (e.g., Dublin), town, or postal station (i.e., a postal service territory, often used in a military address). | Used for Character Strings, length 1 to 64.
     * - base: xs:string
     * - maxLength: 64
     * - minLength: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $CityName = null;
    /**
     * The PostalCode
     * Meta information extracted from the WSDL
     * - documentation: Post Office Code number. | Used for Character Strings, length 1 to 16.
     * - base: xs:string
     * - maxLength: 16
     * - minLength: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $PostalCode = null;
    /**
     * The County
     * Meta information extracted from the WSDL
     * - documentation: County or Region Name (e.g., Fairfax). | Used for Character Strings, length 1 to 32.
     * - base: xs:string
     * - maxLength: 32
     * - minLength: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $County = null;
    /**
     * The StateProv
     * Meta information extracted from the WSDL
     * - documentation: State or Province name (e.g., Texas).
     * - minOccurs: 0
     * @var \StructType\ApiStateProvType|null
     */
    protected ?\StructType\ApiStateProvType $StateProv = null;
    /**
     * The CountryName
     * Meta information extracted from the WSDL
     * - documentation: Country name (e.g., Ireland).
     * - minOccurs: 0
     * @var \StructType\ApiCountryNameType|null
     */
    protected ?\StructType\ApiCountryNameType $CountryName = null;
    /**
     * The Type
     * Meta information extracted from the WSDL
     * - documentation: Defines the type of address (e.g. home, business, other). Refer to OpenTravel Code List Communication Location Type (CLT). | Used for codes in the OpenTravel Code tables. Possible values of this pattern are 1, 101, 101.EQP, or
     * 101.EQP.X.
     * - base: xs:string
     * - pattern: [0-9A-Z]{1,3}(\.[A-Z]{3}(\.X){0,1}){0,1} | 0AA.BBBX |
     * - use: optional
     * @var string|null
     */
    protected ?string $Type = null;
    /**
     * The Remark
     * Meta information extracted from the WSDL
     * - documentation: A remark associated with this address. | Used for Character Strings, length 1 to 128.
     * - base: xs:string
     * - maxLength: 128
     * - minLength: 1
     * - use: optional
     * @var string|null
     */
    protected ?string $Remark = null;
    /**
     * The FormattedInd
     * Meta information extracted from the WSDL
     * - documentation: Specifies if the associated data is formatted or not. When true, then it is formatted; when false, then not formatted.
     * - type: xs:boolean
     * - use: optional
     * @var bool|null
     */
    protected ?bool $FormattedInd = null;
    /**
     * The ShareSynchInd
     * @var string|null
     */
    protected ?string $ShareSynchInd = null;
    /**
     * The ShareMarketInd
     * @var string|null
     */
    protected ?string $ShareMarketInd = null;
    /**
     * Constructor method for AddressType
     * @uses ApiAddressType::setStreetNmbr()
     * @uses ApiAddressType::setAddressLine()
     * @uses ApiAddressType::setCityName()
     * @uses ApiAddressType::setPostalCode()
     * @uses ApiAddressType::setCounty()
     * @uses ApiAddressType::setStateProv()
     * @uses ApiAddressType::setCountryName()
     * @uses ApiAddressType::setType()
     * @uses ApiAddressType::setRemark()
     * @uses ApiAddressType::setFormattedInd()
     * @uses ApiAddressType::setShareSynchInd()
     * @uses ApiAddressType::setShareMarketInd()
     * @param \StructType\ApiStreetNmbr $streetNmbr
     * @param string[] $addressLine
     * @param string $cityName
     * @param string $postalCode
     * @param string $county
     * @param \StructType\ApiStateProvType $stateProv
     * @param \StructType\ApiCountryNameType $countryName
     * @param string $type
     * @param string $remark
     * @param bool $formattedInd
     * @param string $shareSynchInd
     * @param string $shareMarketInd
     */
    public function __construct(?\StructType\ApiStreetNmbr $streetNmbr = null, array $addressLine = [], ?string $cityName = null, ?string $postalCode = null, ?string $county = null, ?\StructType\ApiStateProvType $stateProv = null, ?\StructType\ApiCountryNameType $countryName = null, ?string $type = null, ?string $remark = null, ?bool $formattedInd = null, ?string $shareSynchInd = null, ?string $shareMarketInd = null)
    {
        $this
            ->setStreetNmbr($streetNmbr)
            ->setAddressLine($addressLine)
            ->setCityName($cityName)
            ->setPostalCode($postalCode)
            ->setCounty($county)
            ->setStateProv($stateProv)
            ->setCountryName($countryName)
            ->setType($type)
            ->setRemark($remark)
            ->setFormattedInd($formattedInd)
            ->setShareSynchInd($shareSynchInd)
            ->setShareMarketInd($shareMarketInd);
    }
    /**
     * Get StreetNmbr value
     * @return \StructType\ApiStreetNmbr|null
     */
    public function getStreetNmbr(): ?\StructType\ApiStreetNmbr
    {
        return $this->StreetNmbr;
    }
    /**
     * Set StreetNmbr value
     * @param \StructType\ApiStreetNmbr $streetNmbr
     * @return \StructType\ApiAddressType
     */
    public function setStreetNmbr(?\StructType\ApiStreetNmbr $streetNmbr = null): self
    {
        $this->StreetNmbr = $streetNmbr;
        
        return $this;
    }
    /**
     * Get AddressLine value
     * @return string[]
     */
    public function getAddressLine(): array
    {
        return $this->AddressLine;
    }
    /**
     * This method is responsible for validating the values passed to the setAddressLine method
     * This method is willingly generated in order to preserve the one-line inline validation within the setAddressLine method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateAddressLineForArrayConstraintsFromSetAddressLine(array $values = []): string
    {
        $message = '';
        $invalidValues = [];
        foreach ($values as $addressTypeAddressLineItem) {
            // validation for constraint: itemType
            if (!is_string($addressTypeAddressLineItem)) {
                $invalidValues[] = is_object($addressTypeAddressLineItem) ? get_class($addressTypeAddressLineItem) : sprintf('%s(%s)', gettype($addressTypeAddressLineItem), var_export($addressTypeAddressLineItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The AddressLine property can only contain items of type string, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * This method is responsible for validating the value passed to the setAddressLine method
     * This method is willingly generated in order to preserve the one-line inline validation within the setAddressLine method
     * This has to validate that the items contained by the array match the length constraint
     * @param mixed $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateAddressLineForMaxLengthConstraintFromSetAddressLine($values): string
    {
        $message = '';
        $invalidValues = [];
        foreach ($values as $addressTypeAddressLineItem) {
            // validation for constraint: maxLength(255)
            if (mb_strlen((string) $addressTypeAddressLineItem) > 255) {
                $invalidValues[] = var_export($addressTypeAddressLineItem, true);
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('Invalid length for value(s) %s, the number of characters/octets contained by the literal must be less than or equal to 255', implode(', ', $invalidValues));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * This method is responsible for validating the value passed to the setAddressLine method
     * This method is willingly generated in order to preserve the one-line inline validation within the setAddressLine method
     * This has to validate that the items contained by the array match the length constraint
     * @param mixed $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateAddressLineForMinLengthConstraintFromSetAddressLine($values): string
    {
        $message = '';
        $invalidValues = [];
        foreach ($values as $addressTypeAddressLineItem) {
            // validation for constraint: minLength(1)
            if (mb_strlen((string) $addressTypeAddressLineItem) < 1) {
                $invalidValues[] = var_export($addressTypeAddressLineItem, true);
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('Invalid length for value(s) %s, the number of characters/octets contained by the literal must be greater than or equal to 1', implode(', ', $invalidValues));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set AddressLine value
     * @throws InvalidArgumentException
     * @param string[] $addressLine
     * @return \StructType\ApiAddressType
     */
    public function setAddressLine(array $addressLine = []): self
    {
        // validation for constraint: array
        if ('' !== ($addressLineArrayErrorMessage = self::validateAddressLineForArrayConstraintsFromSetAddressLine($addressLine))) {
            throw new InvalidArgumentException($addressLineArrayErrorMessage, __LINE__);
        }
        // validation for constraint: maxLength(255)
        if ('' !== ($addressLineMaxLengthErrorMessage = self::validateAddressLineForMaxLengthConstraintFromSetAddressLine($addressLine))) {
            throw new InvalidArgumentException($addressLineMaxLengthErrorMessage, __LINE__);
        }
        // validation for constraint: maxOccurs(5)
        if (is_array($addressLine) && count($addressLine) > 5) {
            throw new InvalidArgumentException(sprintf('Invalid count of %s, the number of elements contained by the property must be less than or equal to 5', count($addressLine)), __LINE__);
        }
        // validation for constraint: minLength(1)
        if ('' !== ($addressLineMinLengthErrorMessage = self::validateAddressLineForMinLengthConstraintFromSetAddressLine($addressLine))) {
            throw new InvalidArgumentException($addressLineMinLengthErrorMessage, __LINE__);
        }
        $this->AddressLine = $addressLine;
        
        return $this;
    }
    /**
     * Add item to AddressLine value
     * @throws InvalidArgumentException
     * @param string $item
     * @return \StructType\ApiAddressType
     */
    public function addToAddressLine(string $item): self
    {
        // validation for constraint: itemType
        if (!is_string($item)) {
            throw new InvalidArgumentException(sprintf('The AddressLine property can only contain items of type string, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        // validation for constraint: maxLength(255)
        if (mb_strlen((string) $item) > 255) {
            throw new InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal must be less than or equal to 255', mb_strlen((string) $item)), __LINE__);
        }
        // validation for constraint: maxOccurs(5)
        if (is_array($this->AddressLine) && count($this->AddressLine) >= 5) {
            throw new InvalidArgumentException(sprintf('You can\'t add anymore element to this property that already contains %s elements, the number of elements contained by the property must be less than or equal to 5', count($this->AddressLine)), __LINE__);
        }
        // validation for constraint: minLength(1)
        if (mb_strlen((string) $item) < 1) {
            throw new InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal must be greater than or equal to 1', mb_strlen((string) $item)), __LINE__);
        }
        $this->AddressLine[] = $item;
        
        return $this;
    }
    /**
     * Get CityName value
     * @return string|null
     */
    public function getCityName(): ?string
    {
        return $this->CityName;
    }
    /**
     * Set CityName value
     * @param string $cityName
     * @return \StructType\ApiAddressType
     */
    public function setCityName(?string $cityName = null): self
    {
        // validation for constraint: string
        if (!is_null($cityName) && !is_string($cityName)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($cityName, true), gettype($cityName)), __LINE__);
        }
        // validation for constraint: maxLength(64)
        if (!is_null($cityName) && mb_strlen((string) $cityName) > 64) {
            throw new InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal must be less than or equal to 64', mb_strlen((string) $cityName)), __LINE__);
        }
        // validation for constraint: minLength(1)
        if (!is_null($cityName) && mb_strlen((string) $cityName) < 1) {
            throw new InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal must be greater than or equal to 1', mb_strlen((string) $cityName)), __LINE__);
        }
        $this->CityName = $cityName;
        
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
     * @return \StructType\ApiAddressType
     */
    public function setPostalCode(?string $postalCode = null): self
    {
        // validation for constraint: string
        if (!is_null($postalCode) && !is_string($postalCode)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($postalCode, true), gettype($postalCode)), __LINE__);
        }
        // validation for constraint: maxLength(16)
        if (!is_null($postalCode) && mb_strlen((string) $postalCode) > 16) {
            throw new InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal must be less than or equal to 16', mb_strlen((string) $postalCode)), __LINE__);
        }
        // validation for constraint: minLength(1)
        if (!is_null($postalCode) && mb_strlen((string) $postalCode) < 1) {
            throw new InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal must be greater than or equal to 1', mb_strlen((string) $postalCode)), __LINE__);
        }
        $this->PostalCode = $postalCode;
        
        return $this;
    }
    /**
     * Get County value
     * @return string|null
     */
    public function getCounty(): ?string
    {
        return $this->County;
    }
    /**
     * Set County value
     * @param string $county
     * @return \StructType\ApiAddressType
     */
    public function setCounty(?string $county = null): self
    {
        // validation for constraint: string
        if (!is_null($county) && !is_string($county)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($county, true), gettype($county)), __LINE__);
        }
        // validation for constraint: maxLength(32)
        if (!is_null($county) && mb_strlen((string) $county) > 32) {
            throw new InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal must be less than or equal to 32', mb_strlen((string) $county)), __LINE__);
        }
        // validation for constraint: minLength(1)
        if (!is_null($county) && mb_strlen((string) $county) < 1) {
            throw new InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal must be greater than or equal to 1', mb_strlen((string) $county)), __LINE__);
        }
        $this->County = $county;
        
        return $this;
    }
    /**
     * Get StateProv value
     * @return \StructType\ApiStateProvType|null
     */
    public function getStateProv(): ?\StructType\ApiStateProvType
    {
        return $this->StateProv;
    }
    /**
     * Set StateProv value
     * @param \StructType\ApiStateProvType $stateProv
     * @return \StructType\ApiAddressType
     */
    public function setStateProv(?\StructType\ApiStateProvType $stateProv = null): self
    {
        $this->StateProv = $stateProv;
        
        return $this;
    }
    /**
     * Get CountryName value
     * @return \StructType\ApiCountryNameType|null
     */
    public function getCountryName(): ?\StructType\ApiCountryNameType
    {
        return $this->CountryName;
    }
    /**
     * Set CountryName value
     * @param \StructType\ApiCountryNameType $countryName
     * @return \StructType\ApiAddressType
     */
    public function setCountryName(?\StructType\ApiCountryNameType $countryName = null): self
    {
        $this->CountryName = $countryName;
        
        return $this;
    }
    /**
     * Get Type value
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->Type;
    }
    /**
     * Set Type value
     * @param string $type
     * @return \StructType\ApiAddressType
     */
    public function setType(?string $type = null): self
    {
        // validation for constraint: string
        if (!is_null($type) && !is_string($type)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($type, true), gettype($type)), __LINE__);
        }
        // validation for constraint: pattern([0-9A-Z]{1,3}(\.[A-Z]{3}(\.X){0,1}){0,1}, 0AA.BBBX, )
        if (!is_null($type) && !preg_match('/[0-9A-Z]{1,3}(\\.[A-Z]{3}(\\.X){0,1}){0,1}|0AA.BBBX|^$/', $type)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a literal that is among the set of character sequences denoted by the regular expression /[0-9A-Z]{1,3}(\\.[A-Z]{3}(\\.X){0,1}){0,1}|0AA.BBBX|^$/', var_export($type, true)), __LINE__);
        }
        $this->Type = $type;
        
        return $this;
    }
    /**
     * Get Remark value
     * @return string|null
     */
    public function getRemark(): ?string
    {
        return $this->Remark;
    }
    /**
     * Set Remark value
     * @param string $remark
     * @return \StructType\ApiAddressType
     */
    public function setRemark(?string $remark = null): self
    {
        // validation for constraint: string
        if (!is_null($remark) && !is_string($remark)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($remark, true), gettype($remark)), __LINE__);
        }
        // validation for constraint: maxLength(128)
        if (!is_null($remark) && mb_strlen((string) $remark) > 128) {
            throw new InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal must be less than or equal to 128', mb_strlen((string) $remark)), __LINE__);
        }
        // validation for constraint: minLength(1)
        if (!is_null($remark) && mb_strlen((string) $remark) < 1) {
            throw new InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal must be greater than or equal to 1', mb_strlen((string) $remark)), __LINE__);
        }
        $this->Remark = $remark;
        
        return $this;
    }
    /**
     * Get FormattedInd value
     * @return bool|null
     */
    public function getFormattedInd(): ?bool
    {
        return $this->FormattedInd;
    }
    /**
     * Set FormattedInd value
     * @param bool $formattedInd
     * @return \StructType\ApiAddressType
     */
    public function setFormattedInd(?bool $formattedInd = null): self
    {
        // validation for constraint: boolean
        if (!is_null($formattedInd) && !is_bool($formattedInd)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a bool, %s given', var_export($formattedInd, true), gettype($formattedInd)), __LINE__);
        }
        $this->FormattedInd = $formattedInd;
        
        return $this;
    }
    /**
     * Get ShareSynchInd value
     * @return string|null
     */
    public function getShareSynchInd(): ?string
    {
        return $this->ShareSynchInd;
    }
    /**
     * Set ShareSynchInd value
     * @param string $shareSynchInd
     * @return \StructType\ApiAddressType
     */
    public function setShareSynchInd(?string $shareSynchInd = null): self
    {
        // validation for constraint: string
        if (!is_null($shareSynchInd) && !is_string($shareSynchInd)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($shareSynchInd, true), gettype($shareSynchInd)), __LINE__);
        }
        $this->ShareSynchInd = $shareSynchInd;
        
        return $this;
    }
    /**
     * Get ShareMarketInd value
     * @return string|null
     */
    public function getShareMarketInd(): ?string
    {
        return $this->ShareMarketInd;
    }
    /**
     * Set ShareMarketInd value
     * @param string $shareMarketInd
     * @return \StructType\ApiAddressType
     */
    public function setShareMarketInd(?string $shareMarketInd = null): self
    {
        // validation for constraint: string
        if (!is_null($shareMarketInd) && !is_string($shareMarketInd)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($shareMarketInd, true), gettype($shareMarketInd)), __LINE__);
        }
        $this->ShareMarketInd = $shareMarketInd;
        
        return $this;
    }
}
