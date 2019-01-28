<?php


namespace WsdlToPhp\PackageGenerator\File\Validation;

/**
 * Class AbstractBoundRule
 * Gathers [min|max][In|Ex]Clusive rules
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
        if (is_numeric($value)) {
            $test = '$%1$s %3$s %2$d';
        } else {
            $test = '($time = (string) time()) && \DateTime::createFromFormat(\'U\', $time)->add(new \DateInterval(preg_replace(\'/(.*)(\.[0-9]*S)/\', \'$1S\', $%1$s))) %3$s \DateTime::createFromFormat(\'U\', $time)->add(new \DateInterval(preg_replace(\'/(.*)(\.[0-9]*S)/\', \'$1S\', \'%2$s\')))';
        }
        return sprintf(($itemType ? '' : '!is_null($%1$s) && ') . $test, $parameterName, $value, static::symbol());
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    final public function exceptionMessageOnTestFailure($parameterName, $value, $itemType = false)
    {
        return sprintf('sprintf(\'Invalid value %%s, the value must be %s %s %s\', var_export($%4$s, true))', is_numeric($value) ? 'numerically' : 'chronologically', static::comparisonString(), $value, $parameterName);
    }
}
