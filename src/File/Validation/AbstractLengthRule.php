<?php


namespace WsdlToPhp\PackageGenerator\File\Validation;

/**
 * Class AbstractLengthRule
 * Gathers [min|max|]Length rules
 * @package WsdlToPhp\PackageGenerator\File\Validation
 */
abstract class AbstractLengthRule extends AbstractMinMaxRule
{

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    final public function testConditions($parameterName, $value, $itemType = false)
    {
        return sprintf('(is_scalar($%1$s) && strlen($%1$s) %3$s %2$d) || (is_array($%1$s) && count($%1$s) %3$s %2$d)', $parameterName, $value, $this->symbol());
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    final public function exceptionMessageOnTestFailure($parameterName, $value, $itemType = false)
    {
        return sprintf('sprintf(\'Invalid length of %%s, the number of characters/octets contained by the literal or the number of elements contained by the list must be %s %s\', var_export($%3$s, true), is_scalar($%3$s) ? strlen($%3$s) : count($%3$s))', $this->comparisonString(), $value, $parameterName);
    }
}
