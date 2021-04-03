<?php

declare(strict_types=1);

namespace EnumType;

use WsdlToPhp\PackageBase\AbstractStructEnumBase;

/**
 * This class stands for WebSearchOption EnumType
 * @package Api
 * @subpackage Enumerations
 * @release 1.1.0
 */
class ApiWebSearchOption extends AbstractStructEnumBase
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
     * Return allowed values
     * @uses self::ENUM_VALUE_0
     * @uses self::ENUM_VALUE_1
     * @return string[]
     */
    public static function getValidValues(): array
    {
        return [
            self::ENUM_VALUE_0,
            self::ENUM_VALUE_1,
        ];
    }
}
