<?php

namespace Api\EnumType;

/**
 * This class stands for HouseStageEnum EnumType
 * @package Api
 * @subpackage Enumerations
 * @release 1.1.0
 */
class ApiHouseStageEnum
{
    /**
     * Constant for value '1'
     * Meta informations extracted from the WSDL
     * - description: Эксплуатируемый
     * - label: exploited
     * @return string '1'
     */
    const VALUE_1 = '1';
    /**
     * Constant for value '2'
     * Meta informations extracted from the WSDL
     * - description: Выведенный из эксплуатации
     * - label: decommissioned
     * @return string '2'
     */
    const VALUE_2 = '2';
    /**
     * Constant for value '3'
     * Meta informations extracted from the WSDL
     * - description: Снесенный
     * - label: drifting
     * @return string '3'
     */
    const VALUE_3 = '3';
    /**
     * Return true if value is allowed
     * @uses self::VALUE_1
     * @uses self::VALUE_2
     * @uses self::VALUE_3
     * @param mixed $value value
     * @return bool true|false
     */
    public static function valueIsValid($value)
    {
        return in_array($value, array(self::VALUE_1, self::VALUE_2, self::VALUE_3), true);
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
