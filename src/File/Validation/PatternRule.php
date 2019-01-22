<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

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
        return sprintf('is_scalar($%1$s) && !preg_match(\'/%2$s/\', $%1$s)', $parameterName, addcslashes($value, '\'\\/'));
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    public function exceptionMessageOnTestFailure($parameterName, $value, $itemType = false)
    {
        return sprintf('sprintf(\'Invalid value, please provide a scalar value that matches "%s", %%s given\', var_export($%s, true))', str_replace("'", "\'", $value), $parameterName);
    }
}
