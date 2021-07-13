<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File\Validation;

/**
 * @see https://www.w3.org/TR/2004/REC-xmlschema-1-20041028/structures.html#p-min_occurs
 * This class is intended to show that this cas has not been forgotten. It simply isn't used as the minimum occurrences count can't be checked.
 * Checking the minimum occurrences count would be meaningful just before the request is sent which is not done currently.
 */
class MinOccursRule extends AbstractMinMaxRule
{
    public function name(): string
    {
        return 'minOccurs';
    }

    public function symbol(): string
    {
        return '';
    }

    final public function testConditions(string $parameterName, $value, bool $itemType = false): string
    {
        return '';
    }

    final public function exceptionMessageOnTestFailure(string $parameterName, $value, bool $itemType = false): string
    {
        return '';
    }
}
