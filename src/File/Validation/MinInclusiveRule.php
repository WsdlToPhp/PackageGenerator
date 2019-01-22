<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

class MinInclusiveRule extends AbstractRule
{
    /**
     * @return string
     */
    public function name()
    {
        return 'minInclusive';
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    public function testConditions($parameterName, $value, $itemType = false)
    {
        return sprintf('$%s < %d', $parameterName, $value);
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    public function exceptionMessageOnTestFailure($parameterName, $value, $itemType = false)
    {
        return sprintf('sprintf(\'Invalid value, the value must be superior or equal to %d, %%s given\', $%s)', $value, $parameterName);
    }
}
