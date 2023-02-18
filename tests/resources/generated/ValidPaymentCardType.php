<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for PaymentCardType StructType
 * Meta information extracted from the WSDL
 * - documentation: Date the card becomes valid for use (optional) and the date the card expires (required) in ISO 8601 prescribed format. | Allows for control of the sharing of payment card data between parties. | Identification about a specific credit
 * card.
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
class ApiPaymentCardType extends AbstractStructBase
{
    /**
     * The CardHolderName
     * Meta information extracted from the WSDL
     * - documentation: Name of the card holder. | Used for Character Strings, length 1 to 64.
     * - base: xs:string
     * - maxLength: 64
     * - minLength: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $CardHolderName = null;
    /**
     * The CardIssuerName
     * Meta information extracted from the WSDL
     * - minOccurs: 0
     * @var \StructType\ApiCardIssuerName|null
     */
    protected ?\StructType\ApiCardIssuerName $CardIssuerName = null;
    /**
     * The Address
     * Meta information extracted from the WSDL
     * - documentation: Card holder's address used for additional authorization checks.
     * - minOccurs: 0
     * @var \StructType\ApiAddressType|null
     */
    protected ?\StructType\ApiAddressType $Address = null;
    /**
     * The Telephone
     * Meta information extracted from the WSDL
     * - maxOccurs: 5
     * - minOccurs: 0
     * @var \StructType\ApiTelephone[]
     */
    protected ?array $Telephone = null;
    /**
     * The Email
     * Meta information extracted from the WSDL
     * - documentation: Card holder's email address(es) used for additional authorization checks.
     * - maxOccurs: 3
     * - minOccurs: 0
     * @var \StructType\ApiEmailType[]
     */
    protected ?array $Email = null;
    /**
     * The CardType
     * Meta information extracted from the WSDL
     * - documentation: Indicates the type of magnetic striped card. Refer to OpenTravel Code List Card Type (CDT). | Used for codes in the OpenTravel Code tables. Possible values of this pattern are 1, 101, 101.EQP, or 101.EQP.X.
     * - base: xs:string
     * - pattern: [0-9A-Z]{1,3}(\.[A-Z]{3}(\.X){0,1}){0,1} | 0AA.BBBX |
     * - use: optional
     * @var string|null
     */
    protected ?string $CardType = null;
    /**
     * The CardCode
     * Meta information extracted from the WSDL
     * - documentation: The 2 character code of the credit card issuer.
     * - use: optional
     * @var string|null
     */
    protected ?string $CardCode = null;
    /**
     * The CardName
     * Meta information extracted from the WSDL
     * - documentation: The name of card.
     * - use: optional
     * @var string|null
     */
    protected ?string $CardName = null;
    /**
     * The CardNumber
     * Meta information extracted from the WSDL
     * - documentation: Credit card number embossed on the card. | Used for Numeric Strings, length 1 to 19.
     * - base: xs:string
     * - pattern: [0-9]{1,19}
     * - use: optional
     * @var string|null
     */
    protected ?string $CardNumber = null;
    /**
     * The SeriesCode
     * Meta information extracted from the WSDL
     * - documentation: Verification digits printed on the card following the embossed number. This may also accommodate the customer identification/batch number (CID), card verification value (CVV2 ), card validation code number (CVC2) on credit card. |
     * Used for Numeric Strings, length 1 to 8.
     * - base: xs:string
     * - pattern: [0-9]{1,8}
     * - use: optional
     * @var string|null
     */
    protected ?string $SeriesCode = null;
    /**
     * The MaskedCardNumber
     * Meta information extracted from the WSDL
     * - documentation: May be used to send a concealed credit card number (e.g., xxxxxxxxxxxx9922). | Used forAlpha-Numeric Strings, length 1 to 19.
     * - base: xs:string
     * - pattern: [0-9a-zA-Z]{1,19}
     * - use: optional
     * @var string|null
     */
    protected ?string $MaskedCardNumber = null;
    /**
     * The CardHolderRPH
     * Meta information extracted from the WSDL
     * - documentation: Provides a reference pointer that links the payment card to the payment card holder. | The Reference Place Holder (RPH) is an index code used to identify an instance in a collection of like items (e.g. used to assign individual
     * passengers or clients to particular itinerary items).
     * - base: xs:string
     * - pattern: [0-9]{1,8}
     * - use: optional
     * @var string|null
     */
    protected ?string $CardHolderRPH = null;
    /**
     * The CountryOfIssue
     * Meta information extracted from the WSDL
     * - documentation: Code for the country where the credit card was issued. | Specifies a 2 character country code as defined in ISO3166.
     * - base: xs:string
     * - pattern: [a-zA-Z]{2}
     * - use: optional
     * @var string|null
     */
    protected ?string $CountryOfIssue = null;
    /**
     * The Remark
     * Meta information extracted from the WSDL
     * - documentation: A remark associated with this payment card. | Used for Character Strings, length 1 to 128.
     * - base: xs:string
     * - maxLength: 128
     * - minLength: 1
     * - use: optional
     * @var string|null
     */
    protected ?string $Remark = null;
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
     * The EffectiveDate
     * Meta information extracted from the WSDL
     * - documentation: Indicates the starting date. | Month and year information.
     * - base: xs:string
     * - pattern: (0[1-9]|1[0-2])[0-9][0-9]
     * - type: whlsoap:MMYYDate
     * - use: optional
     * @var string|null
     */
    protected ?string $EffectiveDate = null;
    /**
     * The ExpireDate
     * Meta information extracted from the WSDL
     * - documentation: Indicates the ending date. | Month and year information.
     * - base: xs:string
     * - pattern: (0[1-9]|1[0-2])[0-9][0-9]
     * - type: whlsoap:MMYYDate
     * - use: optional
     * @var string|null
     */
    protected ?string $ExpireDate = null;
    /**
     * Constructor method for PaymentCardType
     * @uses ApiPaymentCardType::setCardHolderName()
     * @uses ApiPaymentCardType::setCardIssuerName()
     * @uses ApiPaymentCardType::setAddress()
     * @uses ApiPaymentCardType::setTelephone()
     * @uses ApiPaymentCardType::setEmail()
     * @uses ApiPaymentCardType::setCardType()
     * @uses ApiPaymentCardType::setCardCode()
     * @uses ApiPaymentCardType::setCardName()
     * @uses ApiPaymentCardType::setCardNumber()
     * @uses ApiPaymentCardType::setSeriesCode()
     * @uses ApiPaymentCardType::setMaskedCardNumber()
     * @uses ApiPaymentCardType::setCardHolderRPH()
     * @uses ApiPaymentCardType::setCountryOfIssue()
     * @uses ApiPaymentCardType::setRemark()
     * @uses ApiPaymentCardType::setShareSynchInd()
     * @uses ApiPaymentCardType::setShareMarketInd()
     * @uses ApiPaymentCardType::setEffectiveDate()
     * @uses ApiPaymentCardType::setExpireDate()
     * @param string $cardHolderName
     * @param \StructType\ApiCardIssuerName $cardIssuerName
     * @param \StructType\ApiAddressType $address
     * @param \StructType\ApiTelephone[] $telephone
     * @param \StructType\ApiEmailType[] $email
     * @param string $cardType
     * @param string $cardCode
     * @param string $cardName
     * @param string $cardNumber
     * @param string $seriesCode
     * @param string $maskedCardNumber
     * @param string $cardHolderRPH
     * @param string $countryOfIssue
     * @param string $remark
     * @param string $shareSynchInd
     * @param string $shareMarketInd
     * @param string $effectiveDate
     * @param string $expireDate
     */
    public function __construct(?string $cardHolderName = null, ?\StructType\ApiCardIssuerName $cardIssuerName = null, ?\StructType\ApiAddressType $address = null, ?array $telephone = null, ?array $email = null, ?string $cardType = null, ?string $cardCode = null, ?string $cardName = null, ?string $cardNumber = null, ?string $seriesCode = null, ?string $maskedCardNumber = null, ?string $cardHolderRPH = null, ?string $countryOfIssue = null, ?string $remark = null, ?string $shareSynchInd = null, ?string $shareMarketInd = null, ?string $effectiveDate = null, ?string $expireDate = null)
    {
        $this
            ->setCardHolderName($cardHolderName)
            ->setCardIssuerName($cardIssuerName)
            ->setAddress($address)
            ->setTelephone($telephone)
            ->setEmail($email)
            ->setCardType($cardType)
            ->setCardCode($cardCode)
            ->setCardName($cardName)
            ->setCardNumber($cardNumber)
            ->setSeriesCode($seriesCode)
            ->setMaskedCardNumber($maskedCardNumber)
            ->setCardHolderRPH($cardHolderRPH)
            ->setCountryOfIssue($countryOfIssue)
            ->setRemark($remark)
            ->setShareSynchInd($shareSynchInd)
            ->setShareMarketInd($shareMarketInd)
            ->setEffectiveDate($effectiveDate)
            ->setExpireDate($expireDate);
    }
    /**
     * Get CardHolderName value
     * @return string|null
     */
    public function getCardHolderName(): ?string
    {
        return $this->CardHolderName;
    }
    /**
     * Set CardHolderName value
     * @param string $cardHolderName
     * @return \StructType\ApiPaymentCardType
     */
    public function setCardHolderName(?string $cardHolderName = null): self
    {
        // validation for constraint: string
        if (!is_null($cardHolderName) && !is_string($cardHolderName)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($cardHolderName, true), gettype($cardHolderName)), __LINE__);
        }
        // validation for constraint: maxLength(64)
        if (!is_null($cardHolderName) && mb_strlen((string) $cardHolderName) > 64) {
            throw new InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal must be less than or equal to 64', mb_strlen((string) $cardHolderName)), __LINE__);
        }
        // validation for constraint: minLength(1)
        if (!is_null($cardHolderName) && mb_strlen((string) $cardHolderName) < 1) {
            throw new InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal must be greater than or equal to 1', mb_strlen((string) $cardHolderName)), __LINE__);
        }
        $this->CardHolderName = $cardHolderName;
        
        return $this;
    }
    /**
     * Get CardIssuerName value
     * @return \StructType\ApiCardIssuerName|null
     */
    public function getCardIssuerName(): ?\StructType\ApiCardIssuerName
    {
        return $this->CardIssuerName;
    }
    /**
     * Set CardIssuerName value
     * @param \StructType\ApiCardIssuerName $cardIssuerName
     * @return \StructType\ApiPaymentCardType
     */
    public function setCardIssuerName(?\StructType\ApiCardIssuerName $cardIssuerName = null): self
    {
        $this->CardIssuerName = $cardIssuerName;
        
        return $this;
    }
    /**
     * Get Address value
     * @return \StructType\ApiAddressType|null
     */
    public function getAddress(): ?\StructType\ApiAddressType
    {
        return $this->Address;
    }
    /**
     * Set Address value
     * @param \StructType\ApiAddressType $address
     * @return \StructType\ApiPaymentCardType
     */
    public function setAddress(?\StructType\ApiAddressType $address = null): self
    {
        $this->Address = $address;
        
        return $this;
    }
    /**
     * Get Telephone value
     * @return \StructType\ApiTelephone[]
     */
    public function getTelephone(): ?array
    {
        return $this->Telephone;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setTelephone method
     * This method is willingly generated in order to preserve the one-line inline validation within the setTelephone method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateTelephoneForArrayConstraintFromSetTelephone(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $paymentCardTypeTelephoneItem) {
            // validation for constraint: itemType
            if (!$paymentCardTypeTelephoneItem instanceof \StructType\ApiTelephone) {
                $invalidValues[] = is_object($paymentCardTypeTelephoneItem) ? get_class($paymentCardTypeTelephoneItem) : sprintf('%s(%s)', gettype($paymentCardTypeTelephoneItem), var_export($paymentCardTypeTelephoneItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The Telephone property can only contain items of type \StructType\ApiTelephone, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set Telephone value
     * @throws InvalidArgumentException
     * @param \StructType\ApiTelephone[] $telephone
     * @return \StructType\ApiPaymentCardType
     */
    public function setTelephone(?array $telephone = null): self
    {
        // validation for constraint: array
        if ('' !== ($telephoneArrayErrorMessage = self::validateTelephoneForArrayConstraintFromSetTelephone($telephone))) {
            throw new InvalidArgumentException($telephoneArrayErrorMessage, __LINE__);
        }
        // validation for constraint: maxOccurs(5)
        if (is_array($telephone) && count($telephone) > 5) {
            throw new InvalidArgumentException(sprintf('Invalid count of %s, the number of elements contained by the property must be less than or equal to 5', count($telephone)), __LINE__);
        }
        $this->Telephone = $telephone;
        
        return $this;
    }
    /**
     * Add item to Telephone value
     * @throws InvalidArgumentException
     * @param \StructType\ApiTelephone $item
     * @return \StructType\ApiPaymentCardType
     */
    public function addToTelephone(\StructType\ApiTelephone $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ApiTelephone) {
            throw new InvalidArgumentException(sprintf('The Telephone property can only contain items of type \StructType\ApiTelephone, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        // validation for constraint: maxOccurs(5)
        if (is_array($this->Telephone) && count($this->Telephone) >= 5) {
            throw new InvalidArgumentException(sprintf('You can\'t add anymore element to this property that already contains %s elements, the number of elements contained by the property must be less than or equal to 5', count($this->Telephone)), __LINE__);
        }
        $this->Telephone[] = $item;
        
        return $this;
    }
    /**
     * Get Email value
     * @return \StructType\ApiEmailType[]
     */
    public function getEmail(): ?array
    {
        return $this->Email;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setEmail method
     * This method is willingly generated in order to preserve the one-line inline validation within the setEmail method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateEmailForArrayConstraintFromSetEmail(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $paymentCardTypeEmailItem) {
            // validation for constraint: itemType
            if (!$paymentCardTypeEmailItem instanceof \StructType\ApiEmailType) {
                $invalidValues[] = is_object($paymentCardTypeEmailItem) ? get_class($paymentCardTypeEmailItem) : sprintf('%s(%s)', gettype($paymentCardTypeEmailItem), var_export($paymentCardTypeEmailItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The Email property can only contain items of type \StructType\ApiEmailType, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set Email value
     * @throws InvalidArgumentException
     * @param \StructType\ApiEmailType[] $email
     * @return \StructType\ApiPaymentCardType
     */
    public function setEmail(?array $email = null): self
    {
        // validation for constraint: array
        if ('' !== ($emailArrayErrorMessage = self::validateEmailForArrayConstraintFromSetEmail($email))) {
            throw new InvalidArgumentException($emailArrayErrorMessage, __LINE__);
        }
        // validation for constraint: maxOccurs(3)
        if (is_array($email) && count($email) > 3) {
            throw new InvalidArgumentException(sprintf('Invalid count of %s, the number of elements contained by the property must be less than or equal to 3', count($email)), __LINE__);
        }
        $this->Email = $email;
        
        return $this;
    }
    /**
     * Add item to Email value
     * @throws InvalidArgumentException
     * @param \StructType\ApiEmailType $item
     * @return \StructType\ApiPaymentCardType
     */
    public function addToEmail(\StructType\ApiEmailType $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ApiEmailType) {
            throw new InvalidArgumentException(sprintf('The Email property can only contain items of type \StructType\ApiEmailType, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        // validation for constraint: maxOccurs(3)
        if (is_array($this->Email) && count($this->Email) >= 3) {
            throw new InvalidArgumentException(sprintf('You can\'t add anymore element to this property that already contains %s elements, the number of elements contained by the property must be less than or equal to 3', count($this->Email)), __LINE__);
        }
        $this->Email[] = $item;
        
        return $this;
    }
    /**
     * Get CardType value
     * @return string|null
     */
    public function getCardType(): ?string
    {
        return $this->CardType;
    }
    /**
     * Set CardType value
     * @param string $cardType
     * @return \StructType\ApiPaymentCardType
     */
    public function setCardType(?string $cardType = null): self
    {
        // validation for constraint: string
        if (!is_null($cardType) && !is_string($cardType)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($cardType, true), gettype($cardType)), __LINE__);
        }
        // validation for constraint: pattern([0-9A-Z]{1,3}(\.[A-Z]{3}(\.X){0,1}){0,1}, 0AA.BBBX, )
        if (!is_null($cardType) && !preg_match('/[0-9A-Z]{1,3}(\\.[A-Z]{3}(\\.X){0,1}){0,1}|0AA.BBBX|^$/', $cardType)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a literal that is among the set of character sequences denoted by the regular expression /[0-9A-Z]{1,3}(\\.[A-Z]{3}(\\.X){0,1}){0,1}|0AA.BBBX|^$/', var_export($cardType, true)), __LINE__);
        }
        $this->CardType = $cardType;
        
        return $this;
    }
    /**
     * Get CardCode value
     * @return string|null
     */
    public function getCardCode(): ?string
    {
        return $this->CardCode;
    }
    /**
     * Set CardCode value
     * @uses \EnumType\ApiPaymentCardCodeType::valueIsValid()
     * @uses \EnumType\ApiPaymentCardCodeType::getValidValues()
     * @throws InvalidArgumentException
     * @param string $cardCode
     * @return \StructType\ApiPaymentCardType
     */
    public function setCardCode(?string $cardCode = null): self
    {
        // validation for constraint: enumeration
        if (!\EnumType\ApiPaymentCardCodeType::valueIsValid($cardCode)) {
            throw new InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \EnumType\ApiPaymentCardCodeType', is_array($cardCode) ? implode(', ', $cardCode) : var_export($cardCode, true), implode(', ', \EnumType\ApiPaymentCardCodeType::getValidValues())), __LINE__);
        }
        $this->CardCode = $cardCode;
        
        return $this;
    }
    /**
     * Get CardName value
     * @return string|null
     */
    public function getCardName(): ?string
    {
        return $this->CardName;
    }
    /**
     * Set CardName value
     * @param string $cardName
     * @return \StructType\ApiPaymentCardType
     */
    public function setCardName(?string $cardName = null): self
    {
        // validation for constraint: string
        if (!is_null($cardName) && !is_string($cardName)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($cardName, true), gettype($cardName)), __LINE__);
        }
        $this->CardName = $cardName;
        
        return $this;
    }
    /**
     * Get CardNumber value
     * @return string|null
     */
    public function getCardNumber(): ?string
    {
        return $this->CardNumber;
    }
    /**
     * Set CardNumber value
     * @param string $cardNumber
     * @return \StructType\ApiPaymentCardType
     */
    public function setCardNumber(?string $cardNumber = null): self
    {
        // validation for constraint: string
        if (!is_null($cardNumber) && !is_string($cardNumber)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($cardNumber, true), gettype($cardNumber)), __LINE__);
        }
        // validation for constraint: pattern([0-9]{1,19})
        if (!is_null($cardNumber) && !preg_match('/[0-9]{1,19}/', $cardNumber)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a literal that is among the set of character sequences denoted by the regular expression /[0-9]{1,19}/', var_export($cardNumber, true)), __LINE__);
        }
        $this->CardNumber = $cardNumber;
        
        return $this;
    }
    /**
     * Get SeriesCode value
     * @return string|null
     */
    public function getSeriesCode(): ?string
    {
        return $this->SeriesCode;
    }
    /**
     * Set SeriesCode value
     * @param string $seriesCode
     * @return \StructType\ApiPaymentCardType
     */
    public function setSeriesCode(?string $seriesCode = null): self
    {
        // validation for constraint: string
        if (!is_null($seriesCode) && !is_string($seriesCode)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($seriesCode, true), gettype($seriesCode)), __LINE__);
        }
        // validation for constraint: pattern([0-9]{1,8})
        if (!is_null($seriesCode) && !preg_match('/[0-9]{1,8}/', $seriesCode)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a literal that is among the set of character sequences denoted by the regular expression /[0-9]{1,8}/', var_export($seriesCode, true)), __LINE__);
        }
        $this->SeriesCode = $seriesCode;
        
        return $this;
    }
    /**
     * Get MaskedCardNumber value
     * @return string|null
     */
    public function getMaskedCardNumber(): ?string
    {
        return $this->MaskedCardNumber;
    }
    /**
     * Set MaskedCardNumber value
     * @param string $maskedCardNumber
     * @return \StructType\ApiPaymentCardType
     */
    public function setMaskedCardNumber(?string $maskedCardNumber = null): self
    {
        // validation for constraint: string
        if (!is_null($maskedCardNumber) && !is_string($maskedCardNumber)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($maskedCardNumber, true), gettype($maskedCardNumber)), __LINE__);
        }
        // validation for constraint: pattern([0-9a-zA-Z]{1,19})
        if (!is_null($maskedCardNumber) && !preg_match('/[0-9a-zA-Z]{1,19}/', $maskedCardNumber)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a literal that is among the set of character sequences denoted by the regular expression /[0-9a-zA-Z]{1,19}/', var_export($maskedCardNumber, true)), __LINE__);
        }
        $this->MaskedCardNumber = $maskedCardNumber;
        
        return $this;
    }
    /**
     * Get CardHolderRPH value
     * @return string|null
     */
    public function getCardHolderRPH(): ?string
    {
        return $this->CardHolderRPH;
    }
    /**
     * Set CardHolderRPH value
     * @param string $cardHolderRPH
     * @return \StructType\ApiPaymentCardType
     */
    public function setCardHolderRPH(?string $cardHolderRPH = null): self
    {
        // validation for constraint: string
        if (!is_null($cardHolderRPH) && !is_string($cardHolderRPH)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($cardHolderRPH, true), gettype($cardHolderRPH)), __LINE__);
        }
        // validation for constraint: pattern([0-9]{1,8})
        if (!is_null($cardHolderRPH) && !preg_match('/[0-9]{1,8}/', $cardHolderRPH)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a literal that is among the set of character sequences denoted by the regular expression /[0-9]{1,8}/', var_export($cardHolderRPH, true)), __LINE__);
        }
        $this->CardHolderRPH = $cardHolderRPH;
        
        return $this;
    }
    /**
     * Get CountryOfIssue value
     * @return string|null
     */
    public function getCountryOfIssue(): ?string
    {
        return $this->CountryOfIssue;
    }
    /**
     * Set CountryOfIssue value
     * @param string $countryOfIssue
     * @return \StructType\ApiPaymentCardType
     */
    public function setCountryOfIssue(?string $countryOfIssue = null): self
    {
        // validation for constraint: string
        if (!is_null($countryOfIssue) && !is_string($countryOfIssue)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($countryOfIssue, true), gettype($countryOfIssue)), __LINE__);
        }
        // validation for constraint: pattern([a-zA-Z]{2})
        if (!is_null($countryOfIssue) && !preg_match('/[a-zA-Z]{2}/', $countryOfIssue)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a literal that is among the set of character sequences denoted by the regular expression /[a-zA-Z]{2}/', var_export($countryOfIssue, true)), __LINE__);
        }
        $this->CountryOfIssue = $countryOfIssue;
        
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
     * @return \StructType\ApiPaymentCardType
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
     * @return \StructType\ApiPaymentCardType
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
     * @return \StructType\ApiPaymentCardType
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
    /**
     * Get EffectiveDate value
     * @return string|null
     */
    public function getEffectiveDate(): ?string
    {
        return $this->EffectiveDate;
    }
    /**
     * Set EffectiveDate value
     * @param string $effectiveDate
     * @return \StructType\ApiPaymentCardType
     */
    public function setEffectiveDate(?string $effectiveDate = null): self
    {
        // validation for constraint: string
        if (!is_null($effectiveDate) && !is_string($effectiveDate)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($effectiveDate, true), gettype($effectiveDate)), __LINE__);
        }
        // validation for constraint: pattern((0[1-9]|1[0-2])[0-9][0-9])
        if (!is_null($effectiveDate) && !preg_match('/(0[1-9]|1[0-2])[0-9][0-9]/', $effectiveDate)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a literal that is among the set of character sequences denoted by the regular expression /(0[1-9]|1[0-2])[0-9][0-9]/', var_export($effectiveDate, true)), __LINE__);
        }
        $this->EffectiveDate = $effectiveDate;
        
        return $this;
    }
    /**
     * Get ExpireDate value
     * @return string|null
     */
    public function getExpireDate(): ?string
    {
        return $this->ExpireDate;
    }
    /**
     * Set ExpireDate value
     * @param string $expireDate
     * @return \StructType\ApiPaymentCardType
     */
    public function setExpireDate(?string $expireDate = null): self
    {
        // validation for constraint: string
        if (!is_null($expireDate) && !is_string($expireDate)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($expireDate, true), gettype($expireDate)), __LINE__);
        }
        // validation for constraint: pattern((0[1-9]|1[0-2])[0-9][0-9])
        if (!is_null($expireDate) && !preg_match('/(0[1-9]|1[0-2])[0-9][0-9]/', $expireDate)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a literal that is among the set of character sequences denoted by the regular expression /(0[1-9]|1[0-2])[0-9][0-9]/', var_export($expireDate, true)), __LINE__);
        }
        $this->ExpireDate = $expireDate;
        
        return $this;
    }
}
