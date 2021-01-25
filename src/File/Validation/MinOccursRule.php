<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

/**
 * Class MinOccursRule
 * @link https://www.w3.org/TR/2004/REC-xmlschema-1-20041028/structures.html#p-min_occurs
 * This class is intended to show that this cas has not been forgotten. It simply isn't used as the minimum occurrences count can't be checked.
 * Checking the minimum occurrences count would be meaningful just before the request which is done currently.
 */
class MinOccursRule extends AbstractMinMaxRule
{
    /**
     * @return string
     */
    public function name()
    {
        return 'minOccurs';
    }

    /**
     * @return string
     */
    public function symbol()
    {
        return '';
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    final public function testConditions($parameterName, $value, $itemType = false)
    {
        return '';
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    final public function exceptionMessageOnTestFailure($parameterName, $value, $itemType = false)
    {
        return '';
    }
}
