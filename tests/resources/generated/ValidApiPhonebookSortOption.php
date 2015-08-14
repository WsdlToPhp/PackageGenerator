<?php

namespace Std\Opt\EnumType;

/**
 * This class stands for PhonebookSortOption EnumType
 * @package Api
 * @subpackage Enumerations
 * @release 1.1.0
 */
class ApiPhonebookSortOption
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
     * Return true if value is allowed
     * @uses self::VALUE_DEFAULT
     * @uses self::VALUE_RELEVANCE
     * @uses self::VALUE_DISTANCE
     * @param mixed $value value
     * @return bool true|false
     */
    public static function valueIsValid($value)
    {
        return in_array($value, array(self::VALUE_DEFAULT, self::VALUE_RELEVANCE, self::VALUE_DISTANCE), true);
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
