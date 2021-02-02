<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File\Validation;

/**
 * @see https://www.w3.org/TR/xmlschema-2/#rf-totalDigits
 * Validation Rule: totalDigits Valid
 * A value in a ·value space· is facet-valid with respect to ·totalDigits· if:
 *  - 1 that value is expressible as i × 10^-n where i and n are integers such that |i| < 10^{value} and 0 <= n <= {value}.
 */
final class TotalDigitsRule extends AbstractRule
{
    public function name(): string
    {
        return 'totalDigits';
    }

    public function testConditions(string $parameterName, $value, bool $itemType = false): string
    {
        return sprintf(($itemType ? '' : '!is_null($%1$s) && ').'mb_strlen(preg_replace(\'/(\D)/\', \'\', (string) $%1$s)) > %2$d', $parameterName, $value);
    }

    public function exceptionMessageOnTestFailure(string $parameterName, $value, bool $itemType = false): string
    {
        return sprintf('sprintf(\'Invalid value %%s, the value must use at most %1$d digits, "%%d" given\', var_export($%2$s, true), mb_strlen(preg_replace(\'/(\D)/\', \'\', (string) $%2$s)))', $value, $parameterName);
    }
}
