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
     * Meta informations extracted from the WSDL
     * - documentation: Shopper's full name.
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var \Api\StructType\ApiName
     */
    public $name;
    /**
     * The email
     * Meta informations extracted from the WSDL
     * - documentation: Shopper's e-mail address. | Email address.
     * - maxOccurs: 1
     * - minOccurs: 1
     * - base: ddp:string100 | normalizedString
     * - pattern: [_a-zA-Z0-9\-\+\.]+@[a-zA-Z0-9\-]+(\.[a-zA-Z0-9\-]+)*(\.[a-zA-Z]+)
     * - maxLength: 100
     * - minLength: 1
     * @var string
     */
    public $email;
    /**
     * The language
     * Meta informations extracted from the WSDL
     * - documentation: Shopper's preferred language.
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var \Api\StructType\ApiLanguage
     */
    public $language;
    /**
     * The gender
     * Meta informations extracted from the WSDL
     * - documentation: Shopper's gender.
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var string
     */
    public $gender;
    /**
     * The id
     * Meta informations extracted from the WSDL
     * - use: required
     * - base: normalizedString
     * - maxLength: 35
     * - minLength: 1
     * @var string
     */
    public $id;
    /**
     * The dateOfBirth
     * Meta informations extracted from the WSDL
     * - documentation: Shopper's date of birth. | A date formatted as yyyy-MM-dd, for example February 25th, 2014 would become "2012-02-25".
     * - maxOccurs: 1
     * - minOccurs: 0
     * - base: normalizedString
     * - maxLength: 10
     * - minLength: 10
     * @var string
     */
    public $dateOfBirth;
    /**
     * The phoneNumber
     * Meta informations extracted from the WSDL
     * - documentation: Shopper's phone number. | Phone number, international numbers start with a +.
     * - maxOccurs: 1
     * - minOccurs: 0
     * - base: ddp:string50 | normalizedString
     * - maxLength: 50
     * - minLength: 1
     * @var string
     */
    public $phoneNumber;
    /**
     * The mobilePhoneNumber
     * Meta informations extracted from the WSDL
     * - documentation: Shopper's mobile phone number. | Phone number, international numbers start with a +.
     * - maxOccurs: 1
     * - minOccurs: 0
     * - base: ddp:string50 | normalizedString
     * - maxLength: 50
     * - minLength: 1
     * @var string
     */
    public $mobilePhoneNumber;
    /**
     * The ipAddress
     * Meta informations extracted from the WSDL
     * - documentation: Ip address of the shopper. Will be used in the future for riskchecks. Can be ipv4 or ipv6.
     * - maxOccurs: 1
     * - minOccurs: 0
     * - base: normalizedString
     * - maxLength: 35
     * - minLength: 1
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
        // validation for constraint: pattern
        if (!is_null($email) && !preg_match('/[_a-zA-Z0-9\\-\\+\\.]+@[a-zA-Z0-9\\-]+(\\.[a-zA-Z0-9\\-]+)*(\\.[a-zA-Z]+)/', $email)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a literal that is among the set of character sequences denoted by the regular expression [_a-zA-Z0-9\-\+\.]+@[a-zA-Z0-9\-]+(\.[a-zA-Z0-9\-]+)*(\.[a-zA-Z]+)', var_export($email, true)), __LINE__);
        }
        // validation for constraint: maxLength
        if ((is_scalar($email) && strlen($email) > 100) || (is_array($email) && count($email) > 100)) {
            throw new \InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal or the number of elements contained by the list must be less than or equal to 100', var_export($email, true), is_scalar($email) ? strlen($email) : count($email)), __LINE__);
        }
        // validation for constraint: minLength
        if ((is_scalar($email) && strlen($email) < 1) || (is_array($email) && count($email) < 1)) {
            throw new \InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal or the number of elements contained by the list must be greater than or equal to 1', var_export($email, true), is_scalar($email) ? strlen($email) : count($email)), __LINE__);
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
        // validation for constraint: maxLength
        if ((is_scalar($id) && strlen($id) > 35) || (is_array($id) && count($id) > 35)) {
            throw new \InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal or the number of elements contained by the list must be less than or equal to 35', var_export($id, true), is_scalar($id) ? strlen($id) : count($id)), __LINE__);
        }
        // validation for constraint: minLength
        if ((is_scalar($id) && strlen($id) < 1) || (is_array($id) && count($id) < 1)) {
            throw new \InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal or the number of elements contained by the list must be greater than or equal to 1', var_export($id, true), is_scalar($id) ? strlen($id) : count($id)), __LINE__);
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
        // validation for constraint: maxLength
        if ((is_scalar($dateOfBirth) && strlen($dateOfBirth) > 10) || (is_array($dateOfBirth) && count($dateOfBirth) > 10)) {
            throw new \InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal or the number of elements contained by the list must be less than or equal to 10', var_export($dateOfBirth, true), is_scalar($dateOfBirth) ? strlen($dateOfBirth) : count($dateOfBirth)), __LINE__);
        }
        // validation for constraint: minLength
        if ((is_scalar($dateOfBirth) && strlen($dateOfBirth) < 10) || (is_array($dateOfBirth) && count($dateOfBirth) < 10)) {
            throw new \InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal or the number of elements contained by the list must be greater than or equal to 10', var_export($dateOfBirth, true), is_scalar($dateOfBirth) ? strlen($dateOfBirth) : count($dateOfBirth)), __LINE__);
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
        // validation for constraint: maxLength
        if ((is_scalar($phoneNumber) && strlen($phoneNumber) > 50) || (is_array($phoneNumber) && count($phoneNumber) > 50)) {
            throw new \InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal or the number of elements contained by the list must be less than or equal to 50', var_export($phoneNumber, true), is_scalar($phoneNumber) ? strlen($phoneNumber) : count($phoneNumber)), __LINE__);
        }
        // validation for constraint: minLength
        if ((is_scalar($phoneNumber) && strlen($phoneNumber) < 1) || (is_array($phoneNumber) && count($phoneNumber) < 1)) {
            throw new \InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal or the number of elements contained by the list must be greater than or equal to 1', var_export($phoneNumber, true), is_scalar($phoneNumber) ? strlen($phoneNumber) : count($phoneNumber)), __LINE__);
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
        // validation for constraint: maxLength
        if ((is_scalar($mobilePhoneNumber) && strlen($mobilePhoneNumber) > 50) || (is_array($mobilePhoneNumber) && count($mobilePhoneNumber) > 50)) {
            throw new \InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal or the number of elements contained by the list must be less than or equal to 50', var_export($mobilePhoneNumber, true), is_scalar($mobilePhoneNumber) ? strlen($mobilePhoneNumber) : count($mobilePhoneNumber)), __LINE__);
        }
        // validation for constraint: minLength
        if ((is_scalar($mobilePhoneNumber) && strlen($mobilePhoneNumber) < 1) || (is_array($mobilePhoneNumber) && count($mobilePhoneNumber) < 1)) {
            throw new \InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal or the number of elements contained by the list must be greater than or equal to 1', var_export($mobilePhoneNumber, true), is_scalar($mobilePhoneNumber) ? strlen($mobilePhoneNumber) : count($mobilePhoneNumber)), __LINE__);
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
        // validation for constraint: maxLength
        if ((is_scalar($ipAddress) && strlen($ipAddress) > 35) || (is_array($ipAddress) && count($ipAddress) > 35)) {
            throw new \InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal or the number of elements contained by the list must be less than or equal to 35', var_export($ipAddress, true), is_scalar($ipAddress) ? strlen($ipAddress) : count($ipAddress)), __LINE__);
        }
        // validation for constraint: minLength
        if ((is_scalar($ipAddress) && strlen($ipAddress) < 1) || (is_array($ipAddress) && count($ipAddress) < 1)) {
            throw new \InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal or the number of elements contained by the list must be greater than or equal to 1', var_export($ipAddress, true), is_scalar($ipAddress) ? strlen($ipAddress) : count($ipAddress)), __LINE__);
        }
        $this->ipAddress = $ipAddress;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Api\StructType\ApiShopper
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
