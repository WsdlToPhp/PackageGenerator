<?php

namespace Api\EnumType;

/**
 * This class stands for AdultOption EnumType
 * @package Api
 * @subpackage Enumerations
 * @release 1.1.0
 */
class ApiAdultOption
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
     * @uses self::VALUE_OFF
     * @uses self::VALUE_MODERATE
     * @uses self::VALUE_STRICT
     * @param mixed $value value
     * @return bool true|false
     */
    public static function valueIsValid($value)
    {
        return in_array($value, array(self::VALUE_OFF, self::VALUE_MODERATE, self::VALUE_STRICT), true);
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
