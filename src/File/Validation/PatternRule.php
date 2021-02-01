<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File\Validation;

/**
 * @link https://www.w3.org/TR/xmlschema-2/#rf-pattern
 * Validation Rule: pattern valid
 * A literal in a ·lexical space· is facet-valid with respect to ·pattern· if:
 *  - 1 the literal is among the set of character sequences denoted by the ·regular expression· specified in {value}.
 */
final class PatternRule extends AbstractRule
{
    public function name(): string
    {
        return 'pattern';
    }

    public function testConditions(string $parameterName, $value, bool $itemType = false): string
    {
        return sprintf(($itemType ? '' : '!is_null($%1$s) && ') . '!preg_match(\'/%2$s/\', $%1$s)', $parameterName, self::valueToRegularExpression($value));
    }

    public function exceptionMessageOnTestFailure(string $parameterName, $value, bool $itemType = false): string
    {
        return sprintf('sprintf(\'Invalid value %%s, please provide a literal that is among the set of character sequences denoted by the regular expression /%s/\', var_export($%s, true))', self::valueToRegularExpression($value), $parameterName);
    }

    public static function valueToRegularExpression($value)
    {
        return implode('|', array_map(function ($value) {
            return addcslashes($value, '\'\\/');
        }, array_map(function ($value) {
            return empty($value) ? '^$' : $value;
        }, array_map('trim', is_array($value) ? $value : [$value]))));
    }
}
