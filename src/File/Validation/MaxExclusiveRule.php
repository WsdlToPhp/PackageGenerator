<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

class MaxExclusiveRule extends AbstractRule
{
    /**
     * @return string
     */
    public function name()
    {
        return 'maxExclusive';
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    public function testConditions($parameterName, $value, $itemType = false)
    {
        return sprintf(($itemType ? '' : '!is_null($%1$s) && ') . '$%s >= %d', $parameterName, $value);
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    public function exceptionMessageOnTestFailure($parameterName, $value, $itemType = false)
    {
        return sprintf('sprintf(\'Invalid value %%s, the value must be striclty inferior to %d, %%s given\', var_export($%2$s, true), $%2$s)', $value, $parameterName);
    }
}
