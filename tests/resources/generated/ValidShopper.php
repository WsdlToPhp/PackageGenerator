<?php

namespace Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for shopper StructType
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
class ApiShopper extends AbstractStructBase
{
    /**
     * The name
     * Meta information extracted from the WSDL
     * - documentation: Shopper's full name.
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var \Api\StructType\ApiName
     */
    public $name;
    /**
     * The email
     * Meta information extracted from the WSDL
     * - documentation: Shopper's e-mail address. | Email address.
     * - base: ddp:string100
     * - maxLength: 100
     * - maxOccurs: 1
     * - minLength: 1
     * - minOccurs: 1
     * - pattern: [_a-zA-Z0-9\-\+\.]+@[a-zA-Z0-9\-]+(\.[a-zA-Z0-9\-]+)*(\.[a-zA-Z]+)
     * @var string
     */
    public $email;
    /**
     * The language
     * Meta information extracted from the WSDL
     * - documentation: Shopper's preferred language.
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var \Api\StructType\ApiLanguage
     */
    public $language;
    /**
     * The gender
     * Meta information extracted from the WSDL
     * - documentation: Shopper's gender.
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var string
     */
    public $gender;
    /**
     * The id
     * Meta information extracted from the WSDL
     * - base: normalizedString
     * - maxLength: 35
     * - minLength: 1
     * - use: required
     * @var string
     */
    public $id;
    /**
     * The dateOfBirth
     * Meta information extracted from the WSDL
     * - documentation: Shopper's date of birth. | A date formatted as yyyy-MM-dd, for example February 25th, 2014 would become "2012-02-25".
     * - base: normalizedString
     * - maxLength: 10
     * - maxOccurs: 1
     * - minLength: 10
     * - minOccurs: 0
     * @var string
     */
    public $dateOfBirth;
    /**
     * The phoneNumber
     * Meta information extracted from the WSDL
     * - documentation: Shopper's phone number. | Phone number, international numbers start with a +.
     * - base: ddp:string50
     * - maxLength: 50
     * - maxOccurs: 1
     * - minLength: 1
     * - minOccurs: 0
     * @var string
     */
    public $phoneNumber;
    /**
     * The mobilePhoneNumber
     * Meta information extracted from the WSDL
     * - documentation: Shopper's mobile phone number. | Phone number, international numbers start with a +.
     * - base: ddp:string50
     * - maxLength: 50
     * - maxOccurs: 1
     * - minLength: 1
     * - minOccurs: 0
     * @var string
     */
    public $mobilePhoneNumber;
    /**
     * The ipAddress
     * Meta information extracted from the WSDL
     * - documentation: Ip address of the shopper. Will be used in the future for riskchecks. Can be ipv4 or ipv6.
     * - base: normalizedString
     * - maxLength: 35
     * - maxOccurs: 1
     * - minLength: 1
     * - minOccurs: 0
     * @var string
     */
    public $ipAddress;
    /**
     * Constructor method for shopper
     * @uses ApiShopper::setName()
     * @uses ApiShopper::setEmail()
     * @uses ApiShopper::setLanguage()
     * @uses ApiShopper::setGender()
     * @uses ApiShopper::setId()
     * @uses ApiShopper::setDateOfBirth()
     * @uses ApiShopper::setPhoneNumber()
     * @uses ApiShopper::setMobilePhoneNumber()
     * @uses ApiShopper::setIpAddress()
     * @param \Api\StructType\ApiName $name
     * @param string $email
     * @param \Api\StructType\ApiLanguage $language
     * @param string $gender
     * @param string $id
     * @param string $dateOfBirth
     * @param string $phoneNumber
     * @param string $mobilePhoneNumber
     * @param string $ipAddress
     */
    public function __construct(\Api\StructType\ApiName $name = null, $email = null, \Api\StructType\ApiLanguage $language = null, $gender = null, $id = null, $dateOfBirth = null, $phoneNumber = null, $mobilePhoneNumber = null, $ipAddress = null)
    {
        $this
            ->setName($name)
            ->setEmail($email)
            ->setLanguage($language)
            ->setGender($gender)
            ->setId($id)
            ->setDateOfBirth($dateOfBirth)
            ->setPhoneNumber($phoneNumber)
            ->setMobilePhoneNumber($mobilePhoneNumber)
            ->setIpAddress($ipAddress);
    }
    /**
     * Get name value
     * @return \Api\StructType\ApiName
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Set name value
     * @param \Api\StructType\ApiName $name
     * @return \Api\StructType\ApiShopper
     */
    public function setName(\Api\StructType\ApiName $name = null)
    {
        $this->name = $name;
        return $this;
    }
    /**
     * Get email value
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * Set email value
     * @param string $email
     * @return \Api\StructType\ApiShopper
     */
    public function setEmail($email = null)
    {
        // validation for constraint: string
        if (!is_null($email) && !is_string($email)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($email, true), gettype($email)), __LINE__);
        }
        // validation for constraint: maxLength(100)
        if (!is_null($email) && mb_strlen($email) > 100) {
            throw new \InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal must be less than or equal to 100', mb_strlen($email)), __LINE__);
        }
        // validation for constraint: minLength(1)
        if (!is_null($email) && mb_strlen($email) < 1) {
            throw new \InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal must be greater than or equal to 1', mb_strlen($email)), __LINE__);
        }
        // validation for constraint: pattern([_a-zA-Z0-9\-\+\.]+@[a-zA-Z0-9\-]+(\.[a-zA-Z0-9\-]+)*(\.[a-zA-Z]+))
        if (!is_null($email) && !preg_match('/[_a-zA-Z0-9\\-\\+\\.]+@[a-zA-Z0-9\\-]+(\\.[a-zA-Z0-9\\-]+)*(\\.[a-zA-Z]+)/', $email)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a literal that is among the set of character sequences denoted by the regular expression [_a-zA-Z0-9\-\+\.]+@[a-zA-Z0-9\-]+(\.[a-zA-Z0-9\-]+)*(\.[a-zA-Z]+)', var_export($email, true)), __LINE__);
        }
        $this->email = $email;
        return $this;
    }
    /**
     * Get language value
     * @return \Api\StructType\ApiLanguage
     */
    public function getLanguage()
    {
        return $this->language;
    }
    /**
     * Set language value
     * @param \Api\StructType\ApiLanguage $language
     * @return \Api\StructType\ApiShopper
     */
    public function setLanguage(\Api\StructType\ApiLanguage $language = null)
    {
        $this->language = $language;
        return $this;
    }
    /**
     * Get gender value
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }
    /**
     * Set gender value
     * @uses \Api\EnumType\ApiGender::valueIsValid()
     * @uses \Api\EnumType\ApiGender::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $gender
     * @return \Api\StructType\ApiShopper
     */
    public function setGender($gender = null)
    {
        // validation for constraint: enumeration
        if (!\Api\EnumType\ApiGender::valueIsValid($gender)) {
            throw new \InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \Api\EnumType\ApiGender', is_array($gender) ? implode(', ', $gender) : var_export($gender, true), implode(', ', \Api\EnumType\ApiGender::getValidValues())), __LINE__);
        }
        $this->gender = $gender;
        return $this;
    }
    /**
     * Get id value
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set id value
     * @param string $id
     * @return \Api\StructType\ApiShopper
     */
    public function setId($id = null)
    {
        // validation for constraint: string
        if (!is_null($id) && !is_string($id)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($id, true), gettype($id)), __LINE__);
        }
        // validation for constraint: maxLength(35)
        if (!is_null($id) && mb_strlen($id) > 35) {
            throw new \InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal must be less than or equal to 35', mb_strlen($id)), __LINE__);
        }
        // validation for constraint: minLength(1)
        if (!is_null($id) && mb_strlen($id) < 1) {
            throw new \InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal must be greater than or equal to 1', mb_strlen($id)), __LINE__);
        }
        $this->id = $id;
        return $this;
    }
    /**
     * Get dateOfBirth value
     * @return string|null
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }
    /**
     * Set dateOfBirth value
     * @param string $dateOfBirth
     * @return \Api\StructType\ApiShopper
     */
    public function setDateOfBirth($dateOfBirth = null)
    {
        // validation for constraint: string
        if (!is_null($dateOfBirth) && !is_string($dateOfBirth)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($dateOfBirth, true), gettype($dateOfBirth)), __LINE__);
        }
        // validation for constraint: maxLength(10)
        if (!is_null($dateOfBirth) && mb_strlen($dateOfBirth) > 10) {
            throw new \InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal must be less than or equal to 10', mb_strlen($dateOfBirth)), __LINE__);
        }
        // validation for constraint: minLength(10)
        if (!is_null($dateOfBirth) && mb_strlen($dateOfBirth) < 10) {
            throw new \InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal must be greater than or equal to 10', mb_strlen($dateOfBirth)), __LINE__);
        }
        $this->dateOfBirth = $dateOfBirth;
        return $this;
    }
    /**
     * Get phoneNumber value
     * @return string|null
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
    /**
     * Set phoneNumber value
     * @param string $phoneNumber
     * @return \Api\StructType\ApiShopper
     */
    public function setPhoneNumber($phoneNumber = null)
    {
        // validation for constraint: string
        if (!is_null($phoneNumber) && !is_string($phoneNumber)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($phoneNumber, true), gettype($phoneNumber)), __LINE__);
        }
        // validation for constraint: maxLength(50)
        if (!is_null($phoneNumber) && mb_strlen($phoneNumber) > 50) {
            throw new \InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal must be less than or equal to 50', mb_strlen($phoneNumber)), __LINE__);
        }
        // validation for constraint: minLength(1)
        if (!is_null($phoneNumber) && mb_strlen($phoneNumber) < 1) {
            throw new \InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal must be greater than or equal to 1', mb_strlen($phoneNumber)), __LINE__);
        }
        $this->phoneNumber = $phoneNumber;
        return $this;
    }
    /**
     * Get mobilePhoneNumber value
     * @return string|null
     */
    public function getMobilePhoneNumber()
    {
        return $this->mobilePhoneNumber;
    }
    /**
     * Set mobilePhoneNumber value
     * @param string $mobilePhoneNumber
     * @return \Api\StructType\ApiShopper
     */
    public function setMobilePhoneNumber($mobilePhoneNumber = null)
    {
        // validation for constraint: string
        if (!is_null($mobilePhoneNumber) && !is_string($mobilePhoneNumber)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($mobilePhoneNumber, true), gettype($mobilePhoneNumber)), __LINE__);
        }
        // validation for constraint: maxLength(50)
        if (!is_null($mobilePhoneNumber) && mb_strlen($mobilePhoneNumber) > 50) {
            throw new \InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal must be less than or equal to 50', mb_strlen($mobilePhoneNumber)), __LINE__);
        }
        // validation for constraint: minLength(1)
        if (!is_null($mobilePhoneNumber) && mb_strlen($mobilePhoneNumber) < 1) {
            throw new \InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal must be greater than or equal to 1', mb_strlen($mobilePhoneNumber)), __LINE__);
        }
        $this->mobilePhoneNumber = $mobilePhoneNumber;
        return $this;
    }
    /**
     * Get ipAddress value
     * @return string|null
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }
    /**
     * Set ipAddress value
     * @param string $ipAddress
     * @return \Api\StructType\ApiShopper
     */
    public function setIpAddress($ipAddress = null)
    {
        // validation for constraint: string
        if (!is_null($ipAddress) && !is_string($ipAddress)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($ipAddress, true), gettype($ipAddress)), __LINE__);
        }
        // validation for constraint: maxLength(35)
        if (!is_null($ipAddress) && mb_strlen($ipAddress) > 35) {
            throw new \InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal must be less than or equal to 35', mb_strlen($ipAddress)), __LINE__);
        }
        // validation for constraint: minLength(1)
        if (!is_null($ipAddress) && mb_strlen($ipAddress) < 1) {
            throw new \InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal must be greater than or equal to 1', mb_strlen($ipAddress)), __LINE__);
        }
        $this->ipAddress = $ipAddress;
        return $this;
    }
}
