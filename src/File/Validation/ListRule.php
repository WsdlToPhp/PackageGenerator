<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File\Validation;

/**
 * @see https://www.w3.org/TR/xmlschema-2/#list-datatypes
 */
final class ListRule extends AbstractSetOfValuesRule
{
    public function name(): string
    {
        return 'list';
    }

    public static function getParameterPassedValue(string $parameterName): string
    {
        return sprintf('is_string($%1$s) ? explode(\' \', $%1$s) : $%1$s', $parameterName);
    }

    protected function mustApplyRuleOnAttribute(): bool
    {
        return $this->getAttribute()->isList();
    }
}
