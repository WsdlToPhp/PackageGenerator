<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

/**
 * Class AbstractBoundRule
 * Gathers [min|max][In|Ex]clusive rules
 * @package WsdlToPhp\PackageGenerator\File\Validation
 */
abstract class AbstractBoundRule extends AbstractMinMaxRule
{

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    final public function testConditions($parameterName, $value, $itemType = false)
    {
        $method = '';
        $checkValueDomain = '';
        if (is_numeric($value)) {
            $test = '$%1$s %3$s %2$s';
        } else {
            if (false === mb_strpos($value, '-')) {
                $method = 'add';
            } else {
                $method = 'sub';
                $value = mb_substr($value, 1);
            }
            switch ($this->symbol()) {
                case self::SYMBOL_MAX_EXCLUSIVE:
                case self::SYMBOL_MAX_INCLUSIVE:
                    $checkValueDomain = '===';
                    break;
                default:
                    $checkValueDomain = '!==';
                    break;
            }
            $test = 'false %5$s mb_strpos($%1$s, \'-\') && ($time = (string) time()) && \DateTime::createFromFormat(\'U\', $time)->%4$s(new \DateInterval(preg_replace(\'/(.*)(\.[0-9]*S)/\', \'$1S\', str_replace(\'-\', \'\', $%1$s)))) %3$s \DateTime::createFromFormat(\'U\', $time)->%4$s(new \DateInterval(preg_replace(\'/(.*)(\.[0-9]*S)/\', \'$1S\', \'%2$s\')))';
        }
        return sprintf(($itemType ? '' : '!is_null($%1$s) && ') . $test, $parameterName, $value, $this->symbol(), $method, $checkValueDomain);
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    final public function exceptionMessageOnTestFailure($parameterName, $value, $itemType = false)
    {
        return sprintf('sprintf(\'Invalid value %%s, the value must be %s %s %s\', var_export($%4$s, true))', is_numeric($value) ? 'numerically' : 'chronologically', $this->comparisonString(), is_array($value) ? implode(',', array_unique($value)) : $value, $parameterName);
    }
}
