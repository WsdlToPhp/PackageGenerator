<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

class MaxLengthRule extends AbstractRule
{
    /**
     * @return string
     */
    public function name()
    {
        return 'maxLength';
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    public function testConditions($parameterName, $value, $itemType = false)
    {
        return sprintf('(is_scalar($%1$s) && strlen($%1$s) > %2$d) || (is_array($%1$s) && count($%1$s) > %2$d)', $parameterName, $value);
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    public function exceptionMessageOnTestFailure($parameterName, $value, $itemType = false)
    {
        return sprintf('sprintf(\'Invalid length for %%s, please provide an array with %1$d element(s) or a scalar of %1$d character(s) at most\', var_export($%2$s, true), is_scalar($%2$s) ? strlen($%2$s) : count($%2$s))', $value, $parameterName);
    }
}
