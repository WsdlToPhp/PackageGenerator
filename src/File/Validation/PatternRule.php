<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

/**
 * Class PatternRule
 * @link https://www.w3.org/TR/xmlschema-2/#rf-pattern
 * Validation Rule: pattern valid
 * A literal in a ·lexical space· is facet-valid with respect to ·pattern· if:
 *  - 1 the literal is among the set of character sequences denoted by the ·regular expression· specified in {value}.
 */
class PatternRule extends AbstractRule
{

    /**
     * @return string
     */
    public function name()
    {
        return 'pattern';
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    public function testConditions($parameterName, $value, $itemType = false)
    {
        return sprintf(($itemType ? '' : '!is_null($%1$s) && ') . '!preg_match(\'/%2$s/\', $%1$s)', $parameterName, self::valueToRegularExpression($value));
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    public function exceptionMessageOnTestFailure($parameterName, $value, $itemType = false)
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
