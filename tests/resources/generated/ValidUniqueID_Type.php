<?php

namespace Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for UniqueID_Type StructType
 * Meta information extracted from the WSDL
 * - documentation: An identifier used to uniquely reference an object in a system (e.g. an airline reservation reference, customer profile reference, booking confirmation number, or a reference to a previous availability quote).
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
class ApiUniqueID_Type extends AbstractStructBase
{
    /**
     * The Type
     * Meta information extracted from the WSDL
     * - documentation: A reference to the type of object defined by the UniqueID element. Refer to OpenTravel Code List Unique ID Type (UIT). | Used for codes in the OpenTravel Code tables. Possible values of this pattern are 1, 101, 101.EQP, or 101.EQP.X.
     * - base: xs:string
     * - pattern: [0-9A-Z]{1,3}(\.[A-Z]{3}(\.X){0,1}){0,1}
     * - type: whlsoap:OTA_CodeType
     * - use: required
     * @var string
     */
    public $Type;
    /**
     * The ID
     * Meta information extracted from the WSDL
     * - documentation: A unique identifying value assigned by the creating system. The ID attribute may be used to reference a primary-key value within a database or in a particular implementation. | Used for Character Strings, length 1 to 32.
     * - base: xs:string
     * - maxLength: 32
     * - minLength: 1
     * - type: whlsoap:StringLength1to32
     * - use: required
     * @var string
     */
    public $ID;
    /**
     * The CompanyName
     * Meta information extracted from the WSDL
     * - documentation: Identifies the company that is associated with the UniqueID.
     * - minOccurs: 0
     * @var \Api\StructType\ApiCompanyNameType
     */
    public $CompanyName;
    /**
     * The URL
     * Meta information extracted from the WSDL
     * - documentation: URL that identifies the location associated with the record identified by the UniqueID.
     * - type: xs:anyURI
     * - use: optional
     * @var string
     */
    public $URL;
    /**
     * The ID_Context
     * Meta information extracted from the WSDL
     * - documentation: Used to identify the source of the identifier (e.g., IATA, ABTA). | Used for Character Strings, length 1 to 32.
     * - base: xs:string
     * - maxLength: 32
     * - minLength: 1
     * - type: whlsoap:StringLength1to32
     * - use: optional
     * @var string
     */
    public $ID_Context;
    /**
     * Constructor method for UniqueID_Type
     * @uses ApiUniqueID_Type::setType()
     * @uses ApiUniqueID_Type::setID()
     * @uses ApiUniqueID_Type::setCompanyName()
     * @uses ApiUniqueID_Type::setURL()
     * @uses ApiUniqueID_Type::setID_Context()
     * @param string $type
     * @param string $iD
     * @param \Api\StructType\ApiCompanyNameType $companyName
     * @param string $uRL
     * @param string $iD_Context
     */
    public function __construct($type = null, $iD = null, \Api\StructType\ApiCompanyNameType $companyName = null, $uRL = null, $iD_Context = null)
    {
        $this
            ->setType($type)
            ->setID($iD)
            ->setCompanyName($companyName)
            ->setURL($uRL)
            ->setID_Context($iD_Context);
    }
    /**
     * Get Type value
     * @return string
     */
    public function getType()
    {
        return $this->Type;
    }
    /**
     * Set Type value
     * @param string $type
     * @return \Api\StructType\ApiUniqueID_Type
     */
    public function setType($type = null)
    {
        // validation for constraint: string
        if (!is_null($type) && !is_string($type)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($type, true), gettype($type)), __LINE__);
        }
        // validation for constraint: pattern([0-9A-Z]{1,3}(\.[A-Z]{3}(\.X){0,1}){0,1})
        if (!is_null($type) && !preg_match('/[0-9A-Z]{1,3}(\\.[A-Z]{3}(\\.X){0,1}){0,1}/', $type)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a literal that is among the set of character sequences denoted by the regular expression [0-9A-Z]{1,3}(\.[A-Z]{3}(\.X){0,1}){0,1}', var_export($type, true)), __LINE__);
        }
        $this->Type = $type;
        return $this;
    }
    /**
     * Get ID value
     * @return string
     */
    public function getID()
    {
        return $this->ID;
    }
    /**
     * Set ID value
     * @param string $iD
     * @return \Api\StructType\ApiUniqueID_Type
     */
    public function setID($iD = null)
    {
        // validation for constraint: string
        if (!is_null($iD) && !is_string($iD)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($iD, true), gettype($iD)), __LINE__);
        }
        // validation for constraint: maxLength(32)
        if (!is_null($iD) && mb_strlen($iD) > 32) {
            throw new \InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal must be less than or equal to 32', mb_strlen($iD)), __LINE__);
        }
        // validation for constraint: minLength(1)
        if (!is_null($iD) && mb_strlen($iD) < 1) {
            throw new \InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal must be greater than or equal to 1', mb_strlen($iD)), __LINE__);
        }
        $this->ID = $iD;
        return $this;
    }
    /**
     * Get CompanyName value
     * @return \Api\StructType\ApiCompanyNameType|null
     */
    public function getCompanyName()
    {
        return $this->CompanyName;
    }
    /**
     * Set CompanyName value
     * @param \Api\StructType\ApiCompanyNameType $companyName
     * @return \Api\StructType\ApiUniqueID_Type
     */
    public function setCompanyName(\Api\StructType\ApiCompanyNameType $companyName = null)
    {
        $this->CompanyName = $companyName;
        return $this;
    }
    /**
     * Get URL value
     * @return string|null
     */
    public function getURL()
    {
        return $this->URL;
    }
    /**
     * Set URL value
     * @param string $uRL
     * @return \Api\StructType\ApiUniqueID_Type
     */
    public function setURL($uRL = null)
    {
        // validation for constraint: string
        if (!is_null($uRL) && !is_string($uRL)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($uRL, true), gettype($uRL)), __LINE__);
        }
        $this->URL = $uRL;
        return $this;
    }
    /**
     * Get ID_Context value
     * @return string|null
     */
    public function getID_Context()
    {
        return $this->ID_Context;
    }
    /**
     * Set ID_Context value
     * @param string $iD_Context
     * @return \Api\StructType\ApiUniqueID_Type
     */
    public function setID_Context($iD_Context = null)
    {
        // validation for constraint: string
        if (!is_null($iD_Context) && !is_string($iD_Context)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($iD_Context, true), gettype($iD_Context)), __LINE__);
        }
        // validation for constraint: maxLength(32)
        if (!is_null($iD_Context) && mb_strlen($iD_Context) > 32) {
            throw new \InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal must be less than or equal to 32', mb_strlen($iD_Context)), __LINE__);
        }
        // validation for constraint: minLength(1)
        if (!is_null($iD_Context) && mb_strlen($iD_Context) < 1) {
            throw new \InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal must be greater than or equal to 1', mb_strlen($iD_Context)), __LINE__);
        }
        $this->ID_Context = $iD_Context;
        return $this;
    }
}
