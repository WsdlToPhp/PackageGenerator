<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File\Validation;

/**
 * @link https://www.w3.org/TR/xmlschema-2/#list-datatypes
 */
final class ListRule extends AbstractSetOfValuesRule
{
    public function name(): string
    {
        return 'list';
    }

    protected function mustApplyRuleOnAttribute(): bool
    {
        return $this->getAttribute()->isList();
    }
}
