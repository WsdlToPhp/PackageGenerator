<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File\Validation;

/**
 * @see https://www.w3.org/TR/xmlschema-2/#rf-pattern
 * Validation Rule: pattern valid
 * A literal in a ·lexical space· is facet-valid with respect to ·pattern· if:
 *  - 1 the literal is among the set of character sequences denoted by the ·regular expression· specified in {value}.
 */
final class PatternRule extends AbstractRule
{
    public const NAME = 'pattern';

    public function name(): string
    {
        return self::NAME;
    }

    public function testConditions(string $parameterName, $value, bool $itemType = false): string
    {
        if ($itemType || !$this->getAttribute()->isArray()) {
            $valueToMatch = self::valueToRegularExpression($value);
            if (empty($valueToMatch)) {
                return '';
            }

            $test = sprintf(
                ($itemType ? '' : '!is_null($%1$s) && ').'!preg_match(\'/%2$s/\', (string) $%1$s)',
                $parameterName,
                self::valueToRegularExpression($value)
            );
        } else {
            $this->addArrayValidationMethod($parameterName, $value);
            $test = sprintf(
                '\'\' !== (%s = self::%s($%s))',
                $this->getArrayErrorMessageVariableName($parameterName),
                $this->getValidationMethodName($parameterName),
                $parameterName
            );
        }

        return $test;
    }

    public function exceptionMessageOnTestFailure(string $parameterName, $value, bool $itemType = false): string
    {
        if ($itemType || !$this->getAttribute()->isArray()) {
            $message = sprintf(
                'sprintf(\'Invalid value %%s, please provide a literal that is among the set of character sequences denoted by the regular expression /%s/\', var_export($%s, true))',
                self::valueToRegularExpression($value),
                $parameterName
            );
        } else {
            $message = $this->getArrayErrorMessageVariableName($parameterName);
        }

        return $message;
    }

    public static function valueToRegularExpression($value): string
    {
        return implode(
            '|',
            array_map(
                static fn ($value) => addcslashes($value, '\'\\/'),
                array_map(
                    static fn ($value) => empty($value) ? '^$' : $value,
                    array_map(
                        'trim',
                        array_filter(
                            is_array($value) ? $value : [$value],
                            static fn ($value) => !in_array($value, ['true', 'false', true, false], true)
                        )
                    )
                )
            )
        );
    }

    protected function getArrayExceptionMessageOnTestFailure($value): string
    {
        return sprintf(
            'Invalid value(s) %%s, please provide literals that are among the set of character sequences denoted by the regular expression /%s/\'',
            stripcslashes(self::valueToRegularExpression($value)),
        );
    }
}
