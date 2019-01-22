<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

class StringRule extends AbstractRule
{
    /**
     * @return string
     */
    public function name()
    {
        return 'string';
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    public function testConditions($parameterName, $value, $itemType = false)
    {
        return sprintf('!is_null($%1$s) && !is_string($%1$s)', $parameterName);
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    public function exceptionMessageOnTestFailure($parameterName, $value, $itemType = false)
    {
        return sprintf('sprintf(\'Invalid value, please provide a string, %%s given\', gettype($%s))', $parameterName);
    }
}
