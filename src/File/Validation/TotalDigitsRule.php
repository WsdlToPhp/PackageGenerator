<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

class TotalDigitsRule extends AbstractRule
{
    /**
     * @return string
     */
    public function name()
    {
        return 'totalDigits';
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    public function testConditions($parameterName, $value, $itemType = false)
    {
        return sprintf('is_float($%1$s) && strlen(str_replace(array(\' \', \'.\', \',\', \'-\', \'+\'), \'\', $%1$s)) !== %2$d', $parameterName, $value);
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    public function exceptionMessageOnTestFailure($parameterName, $value, $itemType = false)
    {
        return sprintf('sprintf(\'Invalid value, the value must at most contain %1$d digits, "%%d" given\', strlen(substr($%2$s, strpos($%2$s, \'.\'))))', $value, $parameterName);
    }
}
