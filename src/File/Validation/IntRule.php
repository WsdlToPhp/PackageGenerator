<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File\Validation;

final class IntRule extends AbstractRule
{
    public function name(): string
    {
        return 'int';
    }

    public function testConditions(string $parameterName, $value, bool $itemType = false): string
    {
        return sprintf(($itemType ? '' : '!is_null($%1$s) && ').'!(is_int($%1$s) || ctype_digit($%1$s))', $parameterName);
    }

    public function exceptionMessageOnTestFailure(string $parameterName, $value, bool $itemType = false): string
    {
        return sprintf('sprintf(\'Invalid value %%s, please provide an integer value, %%s given\', var_export($%1$s, true), gettype($%1$s))', $parameterName);
    }
}
