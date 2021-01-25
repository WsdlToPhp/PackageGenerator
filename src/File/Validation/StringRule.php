<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File\Validation;

final class StringRule extends AbstractRule
{
    public function name(): string
    {
        return 'string';
    }

    public function testConditions(string $parameterName, $value, bool $itemType = false): string
    {
        return sprintf(($itemType ? '' : '!is_null($%1$s) && ').'!is_string($%1$s)', $parameterName);
    }

    public function exceptionMessageOnTestFailure(string $parameterName, $value, bool $itemType = false): string
    {
        return sprintf('sprintf(\'Invalid value %%s, please provide a string, %%s given\', var_export($%1$s, true), gettype($%1$s))', $parameterName);
    }
}
