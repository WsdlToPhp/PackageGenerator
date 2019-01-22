<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

class IntRule extends AbstractRule
{
    /**
     * @return string
     */
    public function name()
    {
        return 'int';
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    public function testConditions($parameterName, $value, $itemType = false)
    {
        return sprintf('!is_null($%1$s) && !is_numeric($%1$s)', $parameterName, $value);
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    public function exceptionMessageOnTestFailure($parameterName, $value, $itemType = false)
    {
        return sprintf('sprintf(\'Invalid value, please provide a numeric value, %%s given\', gettype($%s))', $parameterName);
    }
}
