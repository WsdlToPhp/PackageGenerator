<?php

namespace Api\EnumType;

use \WsdlToPhp\PackageBase\AbstractStructEnumBase;

/**
 * This class stands for AdultOption EnumType
 * @package Api
 * @subpackage Enumerations
 * @release 1.1.0
 */
class ApiAdultOption extends AbstractStructEnumBase
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
     * Return allowed values
     * @uses self::VALUE_OFF
     * @uses self::VALUE_MODERATE
     * @uses self::VALUE_STRICT
     * @return string[]
     */
    public static function getValidValues()
    {
        return array(
            self::VALUE_OFF,
            self::VALUE_MODERATE,
            self::VALUE_STRICT,
        );
    }
}
