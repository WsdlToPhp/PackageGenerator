<?php

namespace Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for PaymentCardType StructType
 * Meta informations extracted from the WSDL
 * - documentation: Identification about a specific credit card. | Allows for control of the sharing of payment card data between parties. | Date the card becomes valid for use (optional) and the date the card expires (required) in ISO 8601 prescribed
 * format.
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
class ApiPaymentCardType extends AbstractStructBase
{
    /**
     * The CardHolderName
     * Meta informations extracted from the WSDL
     * - documentation: Name of the card holder. | Used for Character Strings, length 1 to 64.
     * - minOccurs: 0
     * - base: xs:string
     * - maxLength: 64
     * - minLength: 1
     * @var string
     */
    public $CardHolderName;
    /**
     * The CardIssuerName
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var \Api\StructType\ApiCardIssuerName
     */
    public $CardIssuerName;
    /**
     * The Address
     * Meta informations extracted from the WSDL
     * - documentation: Card holder's address used for additional authorization checks.
     * - minOccurs: 0
     * @var \Api\StructType\ApiAddressType
     */
    public $Address;
    /**
     * The Telephone
     * Meta informations extracted from the WSDL
     * - maxOccurs: 5
     * - minOccurs: 0
     * @var \Api\StructType\ApiTelephone[]
     */
    public $Telephone;
    /**
     * The Email
     * Meta informations extracted from the WSDL
     * - documentation: Card holder's email address(es) used for additional authorization checks.
     * - maxOccurs: 3
     * - minOccurs: 0
     * @var \Api\StructType\ApiEmailType[]
     */
    public $Email;
    /**
     * The CardType
     * Meta informations extracted from the WSDL
     * - documentation: Indicates the type of magnetic striped card. Refer to OpenTravel Code List Card Type (CDT). | Used for codes in the OpenTravel Code tables. Possible values of this pattern are 1, 101, 101.EQP, or 101.EQP.X.
     * - use: optional
     * - base: xs:string
     * - pattern: [0-9A-Z]{1,3}(\.[A-Z]{3}(\.X){0,1}){0,1}
     * @var string
     */
    public $CardType;
    /**
     * The CardCode
     * Meta informations extracted from the WSDL
     * - documentation: The 2 character code of the credit card issuer.
     * - use: optional
     * @var string
     */
    public $CardCode;
    /**
     * The CardName
     * Meta informations extracted from the WSDL
     * - documentation: The name of card.
     * - use: optional
     * @var string
     */
    public $CardName;
    /**
     * The CardNumber
     * Meta informations extracted from the WSDL
     * - documentation: Credit card number embossed on the card. | Used for Numeric Strings, length 1 to 19.
     * - use: optional
     * - base: xs:string
     * - pattern: [0-9]{1,19}
     * @var string
     */
    public $CardNumber;
    /**
     * The SeriesCode
     * Meta informations extracted from the WSDL
     * - documentation: Verification digits printed on the card following the embossed number. This may also accommodate the customer identification/batch number (CID), card verification value (CVV2 ), card validation code number (CVC2) on credit card. |
     * Used for Numeric Strings, length 1 to 8.
     * - use: optional
     * - base: xs:string
     * - pattern: [0-9]{1,8}
     * @var string
     */
    public $SeriesCode;
    /**
     * The MaskedCardNumber
     * Meta informations extracted from the WSDL
     * - documentation: May be used to send a concealed credit card number (e.g., xxxxxxxxxxxx9922). | Used forAlpha-Numeric Strings, length 1 to 19.
     * - use: optional
     * - base: xs:string
     * - pattern: [0-9a-zA-Z]{1,19}
     * @var string
     */
    public $MaskedCardNumber;
    /**
     * The CardHolderRPH
     * Meta informations extracted from the WSDL
     * - documentation: Provides a reference pointer that links the payment card to the payment card holder. | The Reference Place Holder (RPH) is an index code used to identify an instance in a collection of like items (e.g. used to assign individual
     * passengers or clients to particular itinerary items).
     * - use: optional
     * - base: xs:string
     * - pattern: [0-9]{1,8}
     * @var string
     */
    public $CardHolderRPH;
    /**
     * The CountryOfIssue
     * Meta informations extracted from the WSDL
     * - documentation: Code for the country where the credit card was issued. | Specifies a 2 character country code as defined in ISO3166.
     * - use: optional
     * - base: xs:string
     * - pattern: [a-zA-Z]{2}
     * @var string
     */
    public $CountryOfIssue;
    /**
     * The Remark
     * Meta informations extracted from the WSDL
     * - documentation: A remark associated with this payment card. | Used for Character Strings, length 1 to 128.
     * - use: optional
     * - base: xs:string
     * - maxLength: 128
     * - minLength: 1
     * @var string
     */
    public $Remark;
    /**
     * The ShareSynchInd
     * @var string
     */
    public $ShareSynchInd;
    /**
     * The ShareMarketInd
     * @var string
     */
    public $ShareMarketInd;
    /**
     * The EffectiveDate
     * Meta informations extracted from the WSDL
     * - documentation: Indicates the starting date. | Month and year information.
     * - type: whlsoap:MMYYDate
     * - use: optional
     * - base: xs:string
     * - pattern: (0[1-9]|1[0-2])[0-9][0-9]
     * @var string
     */
    public $EffectiveDate;
    /**
     * The ExpireDate
     * Meta informations extracted from the WSDL
     * - documentation: Indicates the ending date. | Month and year information.
     * - type: whlsoap:MMYYDate
     * - use: optional
     * - base: xs:string
     * - pattern: (0[1-9]|1[0-2])[0-9][0-9]
     * @var string
     */
    public $ExpireDate;
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
     * @param \Api\StructType\ApiCardIssuerName $cardIssuerName
     * @param \Api\StructType\ApiAddressType $address
     * @param \Api\StructType\ApiTelephone[] $telephone
     * @param \Api\StructType\ApiEmailType[] $email
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
    public function __construct($cardHolderName = null, \Api\StructType\ApiCardIssuerName $cardIssuerName = null, \Api\StructType\ApiAddressType $address = null, array $telephone = array(), array $email = array(), $cardType = null, $cardCode = null, $cardName = null, $cardNumber = null, $seriesCode = null, $maskedCardNumber = null, $cardHolderRPH = null, $countryOfIssue = null, $remark = null, $shareSynchInd = null, $shareMarketInd = null, $effectiveDate = null, $expireDate = null)
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
    public function getCardHolderName()
    {
        return $this->CardHolderName;
    }
    /**
     * Set CardHolderName value
     * @param string $cardHolderName
     * @return \Api\StructType\ApiPaymentCardType
     */
    public function setCardHolderName($cardHolderName = null)
    {
        // validation for constraint: string
        if (!is_null($cardHolderName) && !is_string($cardHolderName)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($cardHolderName, true), gettype($cardHolderName)), __LINE__);
        }
        // validation for constraint: maxLength
        if ((is_scalar($cardHolderName) && strlen($cardHolderName) > 64) || (is_array($cardHolderName) && count($cardHolderName) > 64)) {
            throw new \InvalidArgumentException(sprintf('Invalid length for %s, please provide an array with 64 element(s) or a scalar of 64 character(s) at most', var_export($cardHolderName, true), is_scalar($cardHolderName) ? strlen($cardHolderName) : count($cardHolderName)), __LINE__);
        }
        // validation for constraint: minLength
        if ((is_scalar($cardHolderName) && strlen($cardHolderName) < 1) || (is_array($cardHolderName) && count($cardHolderName) < 1)) {
            throw new \InvalidArgumentException(sprintf('Invalid length for %s, please provide an array with 1 element(s) or a scalar of 1 character(s) at least', var_export($cardHolderName, true), is_scalar($cardHolderName) ? strlen($cardHolderName) : count($cardHolderName)), __LINE__);
        }
        $this->CardHolderName = $cardHolderName;
        return $this;
    }
    /**
     * Get CardIssuerName value
     * @return \Api\StructType\ApiCardIssuerName|null
     */
    public function getCardIssuerName()
    {
        return $this->CardIssuerName;
    }
    /**
     * Set CardIssuerName value
     * @param \Api\StructType\ApiCardIssuerName $cardIssuerName
     * @return \Api\StructType\ApiPaymentCardType
     */
    public function setCardIssuerName(\Api\StructType\ApiCardIssuerName $cardIssuerName = null)
    {
        $this->CardIssuerName = $cardIssuerName;
        return $this;
    }
    /**
     * Get Address value
     * @return \Api\StructType\ApiAddressType|null
     */
    public function getAddress()
    {
        return $this->Address;
    }
    /**
     * Set Address value
     * @param \Api\StructType\ApiAddressType $address
     * @return \Api\StructType\ApiPaymentCardType
     */
    public function setAddress(\Api\StructType\ApiAddressType $address = null)
    {
        $this->Address = $address;
        return $this;
    }
    /**
     * Get Telephone value
     * @return \Api\StructType\ApiTelephone[]|null
     */
    public function getTelephone()
    {
        return $this->Telephone;
    }
    /**
     * This method is responsible for validating the values passed to the setTelephone method
     * This method is willingly generated in order to preserve the one-line inline validation within the setTelephone method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateTelephoneForArrayContraintsFromSetTelephone(array $values = array())
    {
        $message = '';
        $invalidValues = [];
        foreach ($values as $paymentCardTypeTelephoneItem) {
            // validation for constraint: itemType
            if (!$paymentCardTypeTelephoneItem instanceof \Api\StructType\ApiTelephone) {
                $invalidValues[] = is_object($paymentCardTypeTelephoneItem) ? get_class($paymentCardTypeTelephoneItem) : var_export($paymentCardTypeTelephoneItem, true);
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The Telephone property can only contain items of \Api\StructType\ApiTelephone, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        return $message;
    }
    /**
     * Set Telephone value
     * @throws \InvalidArgumentException
     * @param \Api\StructType\ApiTelephone[] $telephone
     * @return \Api\StructType\ApiPaymentCardType
     */
    public function setTelephone(array $telephone = array())
    {
        // validation for constraint: array
        if ('' !== ($telephoneArrayErrorMessage = self::validateTelephoneForArrayContraintsFromSetTelephone($telephone))) {
            throw new \InvalidArgumentException($telephoneArrayErrorMessage, __LINE__);
        }
        $this->Telephone = $telephone;
        return $this;
    }
    /**
     * Add item to Telephone value
     * @throws \InvalidArgumentException
     * @param \Api\StructType\ApiTelephone $item
     * @return \Api\StructType\ApiPaymentCardType
     */
    public function addToTelephone(\Api\StructType\ApiTelephone $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \Api\StructType\ApiTelephone) {
            throw new \InvalidArgumentException(sprintf('The Telephone property can only contain items of \Api\StructType\ApiTelephone, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->Telephone[] = $item;
        return $this;
    }
    /**
     * Get Email value
     * @return \Api\StructType\ApiEmailType[]|null
     */
    public function getEmail()
    {
        return $this->Email;
    }
    /**
     * This method is responsible for validating the values passed to the setEmail method
     * This method is willingly generated in order to preserve the one-line inline validation within the setEmail method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateEmailForArrayContraintsFromSetEmail(array $values = array())
    {
        $message = '';
        $invalidValues = [];
        foreach ($values as $paymentCardTypeEmailItem) {
            // validation for constraint: itemType
            if (!$paymentCardTypeEmailItem instanceof \Api\StructType\ApiEmailType) {
                $invalidValues[] = is_object($paymentCardTypeEmailItem) ? get_class($paymentCardTypeEmailItem) : var_export($paymentCardTypeEmailItem, true);
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The Email property can only contain items of \Api\StructType\ApiEmailType, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        return $message;
    }
    /**
     * Set Email value
     * @throws \InvalidArgumentException
     * @param \Api\StructType\ApiEmailType[] $email
     * @return \Api\StructType\ApiPaymentCardType
     */
    public function setEmail(array $email = array())
    {
        // validation for constraint: array
        if ('' !== ($emailArrayErrorMessage = self::validateEmailForArrayContraintsFromSetEmail($email))) {
            throw new \InvalidArgumentException($emailArrayErrorMessage, __LINE__);
        }
        $this->Email = $email;
        return $this;
    }
    /**
     * Add item to Email value
     * @throws \InvalidArgumentException
     * @param \Api\StructType\ApiEmailType $item
     * @return \Api\StructType\ApiPaymentCardType
     */
    public function addToEmail(\Api\StructType\ApiEmailType $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \Api\StructType\ApiEmailType) {
            throw new \InvalidArgumentException(sprintf('The Email property can only contain items of \Api\StructType\ApiEmailType, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->Email[] = $item;
        return $this;
    }
    /**
     * Get CardType value
     * @return string|null
     */
    public function getCardType()
    {
        return $this->CardType;
    }
    /**
     * Set CardType value
     * @param string $cardType
     * @return \Api\StructType\ApiPaymentCardType
     */
    public function setCardType($cardType = null)
    {
        // validation for constraint: string
        if (!is_null($cardType) && !is_string($cardType)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($cardType, true), gettype($cardType)), __LINE__);
        }
        // validation for constraint: pattern
        if (is_scalar($cardType) && !preg_match('/[0-9A-Z]{1,3}(\\.[A-Z]{3}(\\.X){0,1}){0,1}/', $cardType)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a scalar value that matches "[0-9A-Z]{1,3}(\.[A-Z]{3}(\.X){0,1}){0,1}"', var_export($cardType, true)), __LINE__);
        }
        $this->CardType = $cardType;
        return $this;
    }
    /**
     * Get CardCode value
     * @return string|null
     */
    public function getCardCode()
    {
        return $this->CardCode;
    }
    /**
     * Set CardCode value
     * @uses \Api\EnumType\ApiPaymentCardCodeType::valueIsValid()
     * @uses \Api\EnumType\ApiPaymentCardCodeType::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $cardCode
     * @return \Api\StructType\ApiPaymentCardType
     */
    public function setCardCode($cardCode = null)
    {
        // validation for constraint: enumeration
        if (!\Api\EnumType\ApiPaymentCardCodeType::valueIsValid($cardCode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \Api\EnumType\ApiPaymentCardCodeType', is_array($cardCode) ? implode(', ', $cardCode) : var_export($cardCode, true), implode(', ', \Api\EnumType\ApiPaymentCardCodeType::getValidValues())), __LINE__);
        }
        $this->CardCode = $cardCode;
        return $this;
    }
    /**
     * Get CardName value
     * @return string|null
     */
    public function getCardName()
    {
        return $this->CardName;
    }
    /**
     * Set CardName value
     * @param string $cardName
     * @return \Api\StructType\ApiPaymentCardType
     */
    public function setCardName($cardName = null)
    {
        // validation for constraint: string
        if (!is_null($cardName) && !is_string($cardName)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($cardName, true), gettype($cardName)), __LINE__);
        }
        $this->CardName = $cardName;
        return $this;
    }
    /**
     * Get CardNumber value
     * @return string|null
     */
    public function getCardNumber()
    {
        return $this->CardNumber;
    }
    /**
     * Set CardNumber value
     * @param string $cardNumber
     * @return \Api\StructType\ApiPaymentCardType
     */
    public function setCardNumber($cardNumber = null)
    {
        // validation for constraint: string
        if (!is_null($cardNumber) && !is_string($cardNumber)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($cardNumber, true), gettype($cardNumber)), __LINE__);
        }
        // validation for constraint: pattern
        if (is_scalar($cardNumber) && !preg_match('/[0-9]{1,19}/', $cardNumber)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a scalar value that matches "[0-9]{1,19}"', var_export($cardNumber, true)), __LINE__);
        }
        $this->CardNumber = $cardNumber;
        return $this;
    }
    /**
     * Get SeriesCode value
     * @return string|null
     */
    public function getSeriesCode()
    {
        return $this->SeriesCode;
    }
    /**
     * Set SeriesCode value
     * @param string $seriesCode
     * @return \Api\StructType\ApiPaymentCardType
     */
    public function setSeriesCode($seriesCode = null)
    {
        // validation for constraint: string
        if (!is_null($seriesCode) && !is_string($seriesCode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($seriesCode, true), gettype($seriesCode)), __LINE__);
        }
        // validation for constraint: pattern
        if (is_scalar($seriesCode) && !preg_match('/[0-9]{1,8}/', $seriesCode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a scalar value that matches "[0-9]{1,8}"', var_export($seriesCode, true)), __LINE__);
        }
        $this->SeriesCode = $seriesCode;
        return $this;
    }
    /**
     * Get MaskedCardNumber value
     * @return string|null
     */
    public function getMaskedCardNumber()
    {
        return $this->MaskedCardNumber;
    }
    /**
     * Set MaskedCardNumber value
     * @param string $maskedCardNumber
     * @return \Api\StructType\ApiPaymentCardType
     */
    public function setMaskedCardNumber($maskedCardNumber = null)
    {
        // validation for constraint: string
        if (!is_null($maskedCardNumber) && !is_string($maskedCardNumber)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($maskedCardNumber, true), gettype($maskedCardNumber)), __LINE__);
        }
        // validation for constraint: pattern
        if (is_scalar($maskedCardNumber) && !preg_match('/[0-9a-zA-Z]{1,19}/', $maskedCardNumber)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a scalar value that matches "[0-9a-zA-Z]{1,19}"', var_export($maskedCardNumber, true)), __LINE__);
        }
        $this->MaskedCardNumber = $maskedCardNumber;
        return $this;
    }
    /**
     * Get CardHolderRPH value
     * @return string|null
     */
    public function getCardHolderRPH()
    {
        return $this->CardHolderRPH;
    }
    /**
     * Set CardHolderRPH value
     * @param string $cardHolderRPH
     * @return \Api\StructType\ApiPaymentCardType
     */
    public function setCardHolderRPH($cardHolderRPH = null)
    {
        // validation for constraint: string
        if (!is_null($cardHolderRPH) && !is_string($cardHolderRPH)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($cardHolderRPH, true), gettype($cardHolderRPH)), __LINE__);
        }
        // validation for constraint: pattern
        if (is_scalar($cardHolderRPH) && !preg_match('/[0-9]{1,8}/', $cardHolderRPH)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a scalar value that matches "[0-9]{1,8}"', var_export($cardHolderRPH, true)), __LINE__);
        }
        $this->CardHolderRPH = $cardHolderRPH;
        return $this;
    }
    /**
     * Get CountryOfIssue value
     * @return string|null
     */
    public function getCountryOfIssue()
    {
        return $this->CountryOfIssue;
    }
    /**
     * Set CountryOfIssue value
     * @param string $countryOfIssue
     * @return \Api\StructType\ApiPaymentCardType
     */
    public function setCountryOfIssue($countryOfIssue = null)
    {
        // validation for constraint: string
        if (!is_null($countryOfIssue) && !is_string($countryOfIssue)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($countryOfIssue, true), gettype($countryOfIssue)), __LINE__);
        }
        // validation for constraint: pattern
        if (is_scalar($countryOfIssue) && !preg_match('/[a-zA-Z]{2}/', $countryOfIssue)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a scalar value that matches "[a-zA-Z]{2}"', var_export($countryOfIssue, true)), __LINE__);
        }
        $this->CountryOfIssue = $countryOfIssue;
        return $this;
    }
    /**
     * Get Remark value
     * @return string|null
     */
    public function getRemark()
    {
        return $this->Remark;
    }
    /**
     * Set Remark value
     * @param string $remark
     * @return \Api\StructType\ApiPaymentCardType
     */
    public function setRemark($remark = null)
    {
        // validation for constraint: string
        if (!is_null($remark) && !is_string($remark)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($remark, true), gettype($remark)), __LINE__);
        }
        // validation for constraint: maxLength
        if ((is_scalar($remark) && strlen($remark) > 128) || (is_array($remark) && count($remark) > 128)) {
            throw new \InvalidArgumentException(sprintf('Invalid length for %s, please provide an array with 128 element(s) or a scalar of 128 character(s) at most', var_export($remark, true), is_scalar($remark) ? strlen($remark) : count($remark)), __LINE__);
        }
        // validation for constraint: minLength
        if ((is_scalar($remark) && strlen($remark) < 1) || (is_array($remark) && count($remark) < 1)) {
            throw new \InvalidArgumentException(sprintf('Invalid length for %s, please provide an array with 1 element(s) or a scalar of 1 character(s) at least', var_export($remark, true), is_scalar($remark) ? strlen($remark) : count($remark)), __LINE__);
        }
        $this->Remark = $remark;
        return $this;
    }
    /**
     * Get ShareSynchInd value
     * @return string|null
     */
    public function getShareSynchInd()
    {
        return $this->ShareSynchInd;
    }
    /**
     * Set ShareSynchInd value
     * @param string $shareSynchInd
     * @return \Api\StructType\ApiPaymentCardType
     */
    public function setShareSynchInd($shareSynchInd = null)
    {
        // validation for constraint: string
        if (!is_null($shareSynchInd) && !is_string($shareSynchInd)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($shareSynchInd, true), gettype($shareSynchInd)), __LINE__);
        }
        $this->ShareSynchInd = $shareSynchInd;
        return $this;
    }
    /**
     * Get ShareMarketInd value
     * @return string|null
     */
    public function getShareMarketInd()
    {
        return $this->ShareMarketInd;
    }
    /**
     * Set ShareMarketInd value
     * @param string $shareMarketInd
     * @return \Api\StructType\ApiPaymentCardType
     */
    public function setShareMarketInd($shareMarketInd = null)
    {
        // validation for constraint: string
        if (!is_null($shareMarketInd) && !is_string($shareMarketInd)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($shareMarketInd, true), gettype($shareMarketInd)), __LINE__);
        }
        $this->ShareMarketInd = $shareMarketInd;
        return $this;
    }
    /**
     * Get EffectiveDate value
     * @return string|null
     */
    public function getEffectiveDate()
    {
        return $this->EffectiveDate;
    }
    /**
     * Set EffectiveDate value
     * @param string $effectiveDate
     * @return \Api\StructType\ApiPaymentCardType
     */
    public function setEffectiveDate($effectiveDate = null)
    {
        // validation for constraint: string
        if (!is_null($effectiveDate) && !is_string($effectiveDate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($effectiveDate, true), gettype($effectiveDate)), __LINE__);
        }
        // validation for constraint: pattern
        if (is_scalar($effectiveDate) && !preg_match('/(0[1-9]|1[0-2])[0-9][0-9]/', $effectiveDate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a scalar value that matches "(0[1-9]|1[0-2])[0-9][0-9]"', var_export($effectiveDate, true)), __LINE__);
        }
        $this->EffectiveDate = $effectiveDate;
        return $this;
    }
    /**
     * Get ExpireDate value
     * @return string|null
     */
    public function getExpireDate()
    {
        return $this->ExpireDate;
    }
    /**
     * Set ExpireDate value
     * @param string $expireDate
     * @return \Api\StructType\ApiPaymentCardType
     */
    public function setExpireDate($expireDate = null)
    {
        // validation for constraint: string
        if (!is_null($expireDate) && !is_string($expireDate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($expireDate, true), gettype($expireDate)), __LINE__);
        }
        // validation for constraint: pattern
        if (is_scalar($expireDate) && !preg_match('/(0[1-9]|1[0-2])[0-9][0-9]/', $expireDate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a scalar value that matches "(0[1-9]|1[0-2])[0-9][0-9]"', var_export($expireDate, true)), __LINE__);
        }
        $this->ExpireDate = $expireDate;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Api\StructType\ApiPaymentCardType
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
