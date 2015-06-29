<?php
/**
 * File for class ApiEnumAdultOption
 * @package Api
 * @subpackage Enumerations
 * @release 1.1.0
 */
/**
 * This class stands for ApiEnumAdultOption originally named AdultOption
 * @package Api
 * @subpackage Enumerations
 * @release 1.1.0
 */
class ApiEnumAdultOption extends ApiWsdlClass
{
    /**
     * Constant for value 'Off'
     * @return string 'Off'
     */
    const VALUE_OFF = 'Off';
    /**
     * Constant for value 'Moderate'
     * @return string 'Moderate'
     */
    const VALUE_MODERATE = 'Moderate';
    /**
     * Constant for value 'Strict'
     * @return string 'Strict'
     */
    const VALUE_STRICT = 'Strict';
    /**
     * Return true if value is allowed
     * @uses ApiEnumAdultOption::VALUE_OFF
     * @uses ApiEnumAdultOption::VALUE_MODERATE
     * @uses ApiEnumAdultOption::VALUE_STRICT
     * @param mixed $value value
     * @return bool true|false
     */
    public static function valueIsValid($value)
    {
        return in_array($value, array(ApiEnumAdultOption::VALUE_OFF, ApiEnumAdultOption::VALUE_MODERATE, ApiEnumAdultOption::VALUE_STRICT));
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
