<?php

namespace Api\EnumType;

/**
 * This class stands for WebSearchOption EnumType
 * @package Api
 * @subpackage Enumerations
 * @release 1.1.0
 */
class ApiWebSearchOption
{
    /**
     * Constant for value 'DisableHostCollapsing'
     * @return string 'DisableHostCollapsing'
     */
    const ENUM_VALUE_0 = 'DisableHostCollapsing';
    /**
     * Constant for value 'DisableQueryAlterations'
     * @return string 'DisableQueryAlterations'
     */
    const ENUM_VALUE_1 = 'DisableQueryAlterations';
    /**
     * Return true if value is allowed
     * @uses self::ENUM_VALUE_0
     * @uses self::ENUM_VALUE_1
     * @param mixed $value value
     * @return bool true|false
     */
    public static function valueIsValid($value)
    {
        return in_array($value, array(self::ENUM_VALUE_0, self::ENUM_VALUE_1), true);
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
