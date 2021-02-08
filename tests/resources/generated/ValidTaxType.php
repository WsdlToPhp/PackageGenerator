<?php

declare(strict_types=1);

namespace Api\StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for TaxType StructType
 * Meta information extracted from the WSDL
 * - documentation: Provides details of the tax. | Applicable tax element. This element allows for both percentages and flat amounts. If one field is used, the other should be zero since logically, taxes should be calculated in only one of the two ways.
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
class ApiTaxType extends AbstractStructBase
{
    /**
     * The TaxDescription
     * Meta information extracted from the WSDL
     * - documentation: Text description of the taxes in a given language.
     * - maxOccurs: 5
     * - minOccurs: 0
     * @var \Api\StructType\ApiParagraphType[]
     */
    protected array $TaxDescription = [];
    /**
     * The Type
     * Meta information extracted from the WSDL
     * - documentation: Used to indicate if the amount is inclusive or exclusive of other charges, such as taxes, or is cumulative (amounts have been added to each other).
     * - type: whlsoap:AmountDeterminationType
     * - use: optional
     * @var string|null
     */
    protected ?string $Type = null;
    /**
     * The Code
     * Meta information extracted from the WSDL
     * - documentation: Code identifying the fee (e.g.,agency fee, municipality fee). Refer to OpenTravel Code List Fee Tax Type (FTT). | Used for codes in the OpenTravel Code tables. Possible values of this pattern are 1, 101, 101.EQP, or 101.EQP.X.
     * - base: xs:string
     * - pattern: [0-9A-Z]{1,3}(\.[A-Z]{3}(\.X){0,1}){0,1} | 0AA.BBBX |
     * - type: whlsoap:OTA_CodeType
     * - use: optional
     * @var string|null
     */
    protected ?string $Code = null;
    /**
     * The Percent
     * Meta information extracted from the WSDL
     * - documentation: Fee percentage; if zero, assume use of the Amount attribute (Amount or Percent must be a zero value). | Used for percentage values.
     * - base: xs:decimal
     * - maxInclusive: 100.00
     * - minInclusive: 0.00
     * - type: whlsoap:Percentage
     * - use: optional
     * @var float|null
     */
    protected ?float $Percent = null;
    /**
     * The Amount
     * Meta information extracted from the WSDL
     * - documentation: A monetary amount. | Specifies an amount, max 3 decimals.
     * - base: xs:decimal
     * - fractionDigits: 3
     * - type: whlsoap:Money
     * - use: optional
     * @var float|null
     */
    protected ?float $Amount = null;
    /**
     * The CurrencyCode
     * Meta information extracted from the WSDL
     * - documentation: The code specifying a monetary unit. Use ISO 4217, three alpha code. | Used for an Alpha String, length exactly 3.
     * - base: xs:string
     * - pattern: [a-zA-Z]{3}
     * - type: whlsoap:AlphaLength3
     * - use: optional
     * @var string|null
     */
    protected ?string $CurrencyCode = null;
    /**
     * The DecimalPlaces
     * Meta information extracted from the WSDL
     * - documentation: Indicates the number of decimal places for a particular currency. This is equivalent to the ISO 4217 standard "minor unit". Typically used when the amount provided includes the minor unit of currency without a decimal point (e.g.,
     * USD 8500 needs DecimalPlaces="2" to represent $85).
     * - type: xs:nonNegativeInteger
     * - use: optional
     * @var int|null
     */
    protected ?int $DecimalPlaces = null;
    /**
     * Constructor method for TaxType
     * @uses ApiTaxType::setTaxDescription()
     * @uses ApiTaxType::setType()
     * @uses ApiTaxType::setCode()
     * @uses ApiTaxType::setPercent()
     * @uses ApiTaxType::setAmount()
     * @uses ApiTaxType::setCurrencyCode()
     * @uses ApiTaxType::setDecimalPlaces()
     * @param \Api\StructType\ApiParagraphType[] $taxDescription
     * @param string $type
     * @param string $code
     * @param float $percent
     * @param float $amount
     * @param string $currencyCode
     * @param int $decimalPlaces
     */
    public function __construct(array $taxDescription = [], ?string $type = null, ?string $code = null, ?float $percent = null, ?float $amount = null, ?string $currencyCode = null, ?int $decimalPlaces = null)
    {
        $this
            ->setTaxDescription($taxDescription)
            ->setType($type)
            ->setCode($code)
            ->setPercent($percent)
            ->setAmount($amount)
            ->setCurrencyCode($currencyCode)
            ->setDecimalPlaces($decimalPlaces);
    }
    /**
     * Get TaxDescription value
     * @return \Api\StructType\ApiParagraphType[]
     */
    public function getTaxDescription(): array
    {
        return $this->TaxDescription;
    }
    /**
     * This method is responsible for validating the values passed to the setTaxDescription method
     * This method is willingly generated in order to preserve the one-line inline validation within the setTaxDescription method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateTaxDescriptionForArrayConstraintsFromSetTaxDescription(array $values = []): string
    {
        $message = '';
        $invalidValues = [];
        foreach ($values as $taxTypeTaxDescriptionItem) {
            // validation for constraint: itemType
            if (!$taxTypeTaxDescriptionItem instanceof \Api\StructType\ApiParagraphType) {
                $invalidValues[] = is_object($taxTypeTaxDescriptionItem) ? get_class($taxTypeTaxDescriptionItem) : sprintf('%s(%s)', gettype($taxTypeTaxDescriptionItem), var_export($taxTypeTaxDescriptionItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The TaxDescription property can only contain items of type \Api\StructType\ApiParagraphType, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set TaxDescription value
     * @throws InvalidArgumentException
     * @param \Api\StructType\ApiParagraphType[] $taxDescription
     * @return \Api\StructType\ApiTaxType
     */
    public function setTaxDescription(array $taxDescription = []): self
    {
        // validation for constraint: array
        if ('' !== ($taxDescriptionArrayErrorMessage = self::validateTaxDescriptionForArrayConstraintsFromSetTaxDescription($taxDescription))) {
            throw new InvalidArgumentException($taxDescriptionArrayErrorMessage, __LINE__);
        }
        // validation for constraint: maxOccurs(5)
        if (is_array($taxDescription) && count($taxDescription) > 5) {
            throw new InvalidArgumentException(sprintf('Invalid count of %s, the number of elements contained by the property must be less than or equal to 5', count($taxDescription)), __LINE__);
        }
        $this->TaxDescription = $taxDescription;
        
        return $this;
    }
    /**
     * Add item to TaxDescription value
     * @throws InvalidArgumentException
     * @param \Api\StructType\ApiParagraphType $item
     * @return \Api\StructType\ApiTaxType
     */
    public function addToTaxDescription(\Api\StructType\ApiParagraphType $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \Api\StructType\ApiParagraphType) {
            throw new InvalidArgumentException(sprintf('The TaxDescription property can only contain items of type \Api\StructType\ApiParagraphType, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        // validation for constraint: maxOccurs(5)
        if (is_array($this->TaxDescription) && count($this->TaxDescription) >= 5) {
            throw new InvalidArgumentException(sprintf('You can\'t add anymore element to this property that already contains %s elements, the number of elements contained by the property must be less than or equal to 5', count($this->TaxDescription)), __LINE__);
        }
        $this->TaxDescription[] = $item;
        
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
     * @uses \Api\EnumType\ApiAmountDeterminationType::valueIsValid()
     * @uses \Api\EnumType\ApiAmountDeterminationType::getValidValues()
     * @throws InvalidArgumentException
     * @param string $type
     * @return \Api\StructType\ApiTaxType
     */
    public function setType(?string $type = null): self
    {
        // validation for constraint: enumeration
        if (!\Api\EnumType\ApiAmountDeterminationType::valueIsValid($type)) {
            throw new InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \Api\EnumType\ApiAmountDeterminationType', is_array($type) ? implode(', ', $type) : var_export($type, true), implode(', ', \Api\EnumType\ApiAmountDeterminationType::getValidValues())), __LINE__);
        }
        $this->Type = $type;
        
        return $this;
    }
    /**
     * Get Code value
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->Code;
    }
    /**
     * Set Code value
     * @param string $code
     * @return \Api\StructType\ApiTaxType
     */
    public function setCode(?string $code = null): self
    {
        // validation for constraint: string
        if (!is_null($code) && !is_string($code)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($code, true), gettype($code)), __LINE__);
        }
        // validation for constraint: pattern([0-9A-Z]{1,3}(\.[A-Z]{3}(\.X){0,1}){0,1}, 0AA.BBBX, )
        if (!is_null($code) && !preg_match('/[0-9A-Z]{1,3}(\\.[A-Z]{3}(\\.X){0,1}){0,1}|0AA.BBBX|^$/', $code)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a literal that is among the set of character sequences denoted by the regular expression /[0-9A-Z]{1,3}(\\.[A-Z]{3}(\\.X){0,1}){0,1}|0AA.BBBX|^$/', var_export($code, true)), __LINE__);
        }
        $this->Code = $code;
        
        return $this;
    }
    /**
     * Get Percent value
     * @return float|null
     */
    public function getPercent(): ?float
    {
        return $this->Percent;
    }
    /**
     * Set Percent value
     * @param float $percent
     * @return \Api\StructType\ApiTaxType
     */
    public function setPercent(?float $percent = null): self
    {
        // validation for constraint: float
        if (!is_null($percent) && !(is_float($percent) || is_numeric($percent))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a float value, %s given', var_export($percent, true), gettype($percent)), __LINE__);
        }
        // validation for constraint: maxInclusive(100.00)
        if (!is_null($percent) && $percent > 100.00) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, the value must be numerically less than or equal to 100.00', var_export($percent, true)), __LINE__);
        }
        // validation for constraint: minInclusive(0.00)
        if (!is_null($percent) && $percent < 0.00) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, the value must be numerically greater than or equal to 0.00', var_export($percent, true)), __LINE__);
        }
        $this->Percent = $percent;
        
        return $this;
    }
    /**
     * Get Amount value
     * @return float|null
     */
    public function getAmount(): ?float
    {
        return $this->Amount;
    }
    /**
     * Set Amount value
     * @param float $amount
     * @return \Api\StructType\ApiTaxType
     */
    public function setAmount(?float $amount = null): self
    {
        // validation for constraint: float
        if (!is_null($amount) && !(is_float($amount) || is_numeric($amount))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a float value, %s given', var_export($amount, true), gettype($amount)), __LINE__);
        }
        // validation for constraint: fractionDigits(3)
        if (!is_null($amount) && mb_strlen(mb_substr((string) $amount, false !== mb_strpos((string) $amount, '.') ? mb_strpos((string) $amount, '.') + 1 : mb_strlen((string) $amount))) > 3) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, the value must at most contain 3 fraction digits, %d given', var_export($amount, true), mb_strlen(mb_substr((string) $amount, mb_strpos((string) $amount, '.') + 1))), __LINE__);
        }
        $this->Amount = $amount;
        
        return $this;
    }
    /**
     * Get CurrencyCode value
     * @return string|null
     */
    public function getCurrencyCode(): ?string
    {
        return $this->CurrencyCode;
    }
    /**
     * Set CurrencyCode value
     * @param string $currencyCode
     * @return \Api\StructType\ApiTaxType
     */
    public function setCurrencyCode(?string $currencyCode = null): self
    {
        // validation for constraint: string
        if (!is_null($currencyCode) && !is_string($currencyCode)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($currencyCode, true), gettype($currencyCode)), __LINE__);
        }
        // validation for constraint: pattern([a-zA-Z]{3})
        if (!is_null($currencyCode) && !preg_match('/[a-zA-Z]{3}/', $currencyCode)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a literal that is among the set of character sequences denoted by the regular expression /[a-zA-Z]{3}/', var_export($currencyCode, true)), __LINE__);
        }
        $this->CurrencyCode = $currencyCode;
        
        return $this;
    }
    /**
     * Get DecimalPlaces value
     * @return int|null
     */
    public function getDecimalPlaces(): ?int
    {
        return $this->DecimalPlaces;
    }
    /**
     * Set DecimalPlaces value
     * @param int $decimalPlaces
     * @return \Api\StructType\ApiTaxType
     */
    public function setDecimalPlaces(?int $decimalPlaces = null): self
    {
        // validation for constraint: int
        if (!is_null($decimalPlaces) && !(is_int($decimalPlaces) || ctype_digit($decimalPlaces))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide an integer value, %s given', var_export($decimalPlaces, true), gettype($decimalPlaces)), __LINE__);
        }
        $this->DecimalPlaces = $decimalPlaces;
        
        return $this;
    }
}
