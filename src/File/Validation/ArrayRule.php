<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File\Validation;

final class ArrayRule extends AbstractSetOfValuesRule
{
    public function name(): string
    {
        return 'array';
    }

    protected function mustApplyRuleOnAttribute(): bool
    {
        return $this->getAttribute()->isArray();
    }
}
