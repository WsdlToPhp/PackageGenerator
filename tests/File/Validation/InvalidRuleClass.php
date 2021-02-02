<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

use WsdlToPhp\PackageGenerator\File\Validation\AbstractMinMaxRule;

final class InvalidRuleClass extends AbstractMinMaxRule
{
    public function name(): string
    {
        return 'invalid';
    }

    public function symbol(): string
    {
        return '<>';
    }

    public function testConditions(string $parameterName, $value, bool $itemType = false): string
    {
        return 'true';
    }

    public function exceptionMessageOnTestFailure(string $parameterName, $value, bool $itemType = false): string
    {
        return '';
    }
}
