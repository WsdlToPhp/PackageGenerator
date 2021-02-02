<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File\Validation;

use WsdlToPhp\PackageGenerator\File\StructEnum;
use WsdlToPhp\PackageGenerator\Model\Struct;

/**
 * @see https://www.w3.org/TR/xmlschema-2/#rf-enumeration
 * Validation Rule: enumeration valid
 * A value in a ·value space· is facet-valid with respect to ·enumeration· if the value is one of the values specified in {value}
 */
final class EnumerationRule extends AbstractRule
{
    protected ?Struct $model = null;

    public function name(): string
    {
        return 'enumeration';
    }

    public function testConditions(string $parameterName, $value, bool $itemType = false): string
    {
        $test = '';
        if ($this->getRestrictionModel()) {
            $test = sprintf('!%s::%s($%s)', $this->getRestrictionModel()->getPackagedName(true), StructEnum::METHOD_VALUE_IS_VALID, $parameterName);
        }

        return $test;
    }

    public function exceptionMessageOnTestFailure(string $parameterName, $value, bool $itemType = false): string
    {
        $exceptionMessage = '';
        if ($restrictionModel = $this->getRestrictionModel()) {
            $exceptionMessage = sprintf('sprintf(\'Invalid value(s) %%s, please use one of: %%s from enumeration class %2$s\', is_array($%1$s) ? implode(\', \', $%1$s) : var_export($%1$s, true), implode(\', \', %2$s::%3$s()))', $parameterName, $restrictionModel->getPackagedName(true), StructEnum::METHOD_GET_VALID_VALUES);
        }

        return $exceptionMessage;
    }

    protected function getRestrictionModel(): ?Struct
    {
        if (!$this->model) {
            $this->model = $this->getFile()->getRestrictionFromStructAttribute($this->getAttribute());
        }

        return $this->model;
    }
}
