<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

class MinExclusiveRule extends AbstractRule
{
    /**
     * @return string
     */
    public function name()
    {
        return 'minExclusive';
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    public function testConditions($parameterName, $value, $itemType = false)
    {
        return sprintf('$%s <= %d', $parameterName, $value);
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    public function exceptionMessageOnTestFailure($parameterName, $value, $itemType = false)
    {
        return sprintf('sprintf(\'Invalid value, the value must be strictly superior to %d, %%s given\', $%s)', $value, $parameterName);
    }
}
