<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File\Validation;

/**
 * @see https://www.w3.org/TR/xmlschema-2/#rf-fractionDigits
 * Validation Rule: fractionDigits Valid
 * A value in a ·value space· is facet-valid with respect to ·fractionDigits· if:
 * - 1 that value is expressible as i × 10^-n where i and n are integers and 0 <= n <= {value}.
 */
final class FractionDigitsRule extends AbstractRule
{
    public function name(): string
    {
        return 'fractionDigits';
    }

    public function testConditions(string $parameterName, $value, bool $itemType = false): string
    {
        return sprintf(($itemType ? '' : '!is_null($%1$s) && ').'mb_strlen(mb_substr((string) $%1$s, false !== mb_strpos((string) $%1$s, \'.\') ? mb_strpos((string) $%1$s, \'.\') + 1 : mb_strlen((string) $%1$s))) > %2$d', $parameterName, $value);
    }

    public function exceptionMessageOnTestFailure(string $parameterName, $value, bool $itemType = false): string
    {
        return sprintf('sprintf(\'Invalid value %%s, the value must at most contain %1$d fraction digits, %%d given\', var_export($%2$s, true), mb_strlen(mb_substr((string) $%2$s, mb_strpos((string) $%2$s, \'.\') + 1)))', $value, $parameterName);
    }
}
