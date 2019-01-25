<?php

namespace Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for Result StructType
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
class ApiResult extends AbstractStructBase
{
    /**
     * The Success
     * Meta informations extracted from the WSDL
     * - base: xsd:boolean
     * - choiceMaxOccurs: 1
     * - choiceMinOccurs: 1
     * - choiceNames: Success | Errors
     * - default: false
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var bool
     */
    public $Success;
    /**
     * The Errors
     * Meta informations extracted from the WSDL
     * - choiceMaxOccurs: 1
     * - choiceMinOccurs: 1
     * - choiceNames: Success | Errors
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Api\StructType\ApiErrors
     */
    public $Errors;
    /**
     * The Warnings
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Api\StructType\ApiWarnings
     */
    public $Warnings;
    /**
     * Constructor method for Result
     * @uses ApiResult::setSuccess()
     * @uses ApiResult::setErrors()
     * @uses ApiResult::setWarnings()
     * @param bool $success
     * @param \Api\StructType\ApiErrors $errors
     * @param \Api\StructType\ApiWarnings $warnings
     */
    public function __construct($success = false, \Api\StructType\ApiErrors $errors = null, \Api\StructType\ApiWarnings $warnings = null)
    {
        $this
            ->setSuccess($success)
            ->setErrors($errors)
            ->setWarnings($warnings);
    }
    /**
     * Get Success value
     * @return bool|null
     */
    public function getSuccess()
    {
        return $this->Success;
    }
    /**
     * Set Success value
     * This property belongs to a choice that allows only one property to exist
     * @throws \InvalidArgumentException
     * @param bool $success
     * @return \Api\StructType\ApiResult
     */
    public function setSuccess($success = false)
    {
        // validation(s) for constraint: choice
        if (isset($this->Errors)) {
            throw new \InvalidArgumentException('The property Success can\'t be set as the property Errors is already set. Only one property must be set among these properties: Success, Errors.', __LINE__);
        }
        // validation for constraint: boolean
        if (!is_null($success) && !is_bool($success)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a bool, %s given', var_export($success, true), gettype($success)), __LINE__);
        }
        $this->Success = $success;
        return $this;
    }
    /**
     * Get Errors value
     * @return \Api\StructType\ApiErrors|null
     */
    public function getErrors()
    {
        return $this->Errors;
    }
    /**
     * Set Errors value
     * This property belongs to a choice that allows only one property to exist
     * @throws \InvalidArgumentException
     * @param \Api\StructType\ApiErrors $errors
     * @return \Api\StructType\ApiResult
     */
    public function setErrors(\Api\StructType\ApiErrors $errors = null)
    {
        // validation(s) for constraint: choice
        if (isset($this->Success)) {
            throw new \InvalidArgumentException('The property Errors can\'t be set as the property Success is already set. Only one property must be set among these properties: Success, Errors.', __LINE__);
        }
        $this->Errors = $errors;
        return $this;
    }
    /**
     * Get Warnings value
     * @return \Api\StructType\ApiWarnings|null
     */
    public function getWarnings()
    {
        return $this->Warnings;
    }
    /**
     * Set Warnings value
     * @param \Api\StructType\ApiWarnings $warnings
     * @return \Api\StructType\ApiResult
     */
    public function setWarnings(\Api\StructType\ApiWarnings $warnings = null)
    {
        $this->Warnings = $warnings;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Api\StructType\ApiResult
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
