<?php

namespace Std\Opt\EnumType;

use \WsdlToPhp\PackageBase\AbstractStructEnumBase;

/**
 * This class stands for PhonebookSortOption EnumType
 * @package Api
 * @subpackage Enumerations
 * @release 1.1.0
 */
class ApiPhonebookSortOption extends AbstractStructEnumBase
{
    /**
     * Constant for value 'Default'
     * @return string 'Default'
     */
    const VALUE_DEFAULT = 'Default';
    /**
     * Constant for value 'Relevance'
     * @return string 'Relevance'
     */
    const VALUE_RELEVANCE = 'Relevance';
    /**
     * Constant for value 'Distance'
     * @return string 'Distance'
     */
    const VALUE_DISTANCE = 'Distance';
    /**
     * Return allowed values
     * @uses self::VALUE_DEFAULT
     * @uses self::VALUE_RELEVANCE
     * @uses self::VALUE_DISTANCE
     * @return string[]
     */
    public static function getValidValues()
    {
        return array(
            self::VALUE_DEFAULT,
            self::VALUE_RELEVANCE,
            self::VALUE_DISTANCE,
        );
    }
}
