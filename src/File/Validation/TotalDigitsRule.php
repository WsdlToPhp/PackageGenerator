<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

/**
 * Class TotalDigitsRule
 * @link https://www.w3.org/TR/xmlschema-2/#rf-totalDigits
 * Validation Rule: totalDigits Valid
 * A value in a ·value space· is facet-valid with respect to ·totalDigits· if:
 *  - 1 that value is expressible as i × 10^-n where i and n are integers such that |i| < 10^{value} and 0 <= n <= {value}.
 */
class TotalDigitsRule extends AbstractRule
{

    /**
     * @return string
     */
    public function name()
    {
        return 'totalDigits';
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    public function testConditions($parameterName, $value, $itemType = false)
    {
        return sprintf(($itemType ? '' : '!is_null($%1$s) && ') . 'mb_strlen(preg_replace(\'/(\D)/\', \'\', $%1$s)) > %2$d', $parameterName, $value);
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    public function exceptionMessageOnTestFailure($parameterName, $value, $itemType = false)
    {
        return sprintf('sprintf(\'Invalid value %%s, the value must use at most %1$d digits, "%%d" given\', var_export($%2$s, true), mb_strlen(preg_replace(\'/(\D)/\', \'\', $%2$s)))', $value, $parameterName);
    }
}
