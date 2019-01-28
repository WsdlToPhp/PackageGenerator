<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

class BooleanRule extends AbstractRule
{

    /**
     * @return string
     */
    public function name()
    {
        return 'boolean';
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    public function testConditions($parameterName, $value, $itemType = false)
    {
        return sprintf(($itemType ? '' : '!is_null($%1$s) && ') . '!is_bool($%1$s)', $parameterName);
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    public function exceptionMessageOnTestFailure($parameterName, $value, $itemType = false)
    {
        return sprintf('sprintf(\'Invalid value %%s, please provide a bool, %%s given\', var_export($%1$s, true), gettype($%1$s))', $parameterName);
    }
}
