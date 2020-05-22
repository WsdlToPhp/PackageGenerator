<?php

namespace Api\EnumType;

use \WsdlToPhp\PackageBase\AbstractStructEnumBase;

/**
 * This class stands for HouseStageEnum EnumType
 * @package Api
 * @subpackage Enumerations
 * @release 1.1.0
 */
class ApiHouseStageEnum extends AbstractStructEnumBase
{
    /**
     * Constant for value '1'
     * Meta information extracted from the WSDL
     * - description: Эксплуатируемый
     * - label: exploited
     * @return string '1'
     */
    const VALUE_1 = '1';
    /**
     * Constant for value '2'
     * Meta information extracted from the WSDL
     * - description: Выведенный из эксплуатации
     * - label: decommissioned
     * @return string '2'
     */
    const VALUE_2 = '2';
    /**
     * Constant for value '3'
     * Meta information extracted from the WSDL
     * - description: Снесенный
     * - label: drifting
     * @return string '3'
     */
    const VALUE_3 = '3';
    /**
     * Return allowed values
     * @uses self::VALUE_1
     * @uses self::VALUE_2
     * @uses self::VALUE_3
     * @return string[]
     */
    public static function getValidValues()
    {
        return array(
            self::VALUE_1,
            self::VALUE_2,
            self::VALUE_3,
        );
    }
}
