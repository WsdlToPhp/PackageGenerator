<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File\Validation;

/**
 * Gathers [min|max|]Length rules.
 */
abstract class AbstractLengthRule extends AbstractMinMaxRule
{
    final public function testConditions(string $parameterName, $value, bool $itemType = false): string
    {
        if ($itemType || !$this->getAttribute()->isArray()) {
            $test = sprintf(
                ($itemType ? '' : '!is_null($%1$s) && ').'mb_strlen((string) $%1$s) %3$s %2$d',
                $parameterName,
                $value,
                $this->symbol()
            );
        } else {
            $this->addArrayValidationMethod($parameterName, $value);
            $test = sprintf(
                '\'\' !== (%s = self::%s($%s))',
                $this->getArrayErrorMessageVariableName($parameterName),
                $this->getValidationMethodName($parameterName),
                $parameterName
            );
        }

        return $test;
    }

    final public function exceptionMessageOnTestFailure(string $parameterName, $value, bool $itemType = false): string
    {
        if ($itemType || !$this->getAttribute()->isArray()) {
            $message = sprintf(
                'sprintf(\'Invalid length of %%s, the number of characters/octets contained by the literal must be %s %s\', mb_strlen((string) $%s))',
                $this->comparisonString(),
                is_array($value) ? implode(',', array_unique($value)) : $value,
                $parameterName
            );
        } else {
            $message = $this->getArrayErrorMessageVariableName($parameterName);
        }

        return $message;
    }

    final protected function getArrayExceptionMessageOnTestFailure($value): string
    {
        return sprintf(
            'Invalid length for value(s) %%s, the number of characters/octets contained by the literal must be %s %s',
            $this->comparisonString(),
            $value
        );
    }
}
