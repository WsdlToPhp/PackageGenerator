<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File\Validation;

final class ArrayRule extends AbstractSetOfValuesRule
{
    public const NAME = 'array';

    public function name(): string
    {
        return self::NAME;
    }

    protected function mustApplyRuleOnAttribute(): bool
    {
        return $this->getAttribute()->isArray();
    }
}
