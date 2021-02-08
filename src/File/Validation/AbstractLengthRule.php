<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File\Validation;

use WsdlToPhp\PackageGenerator\File\AbstractModelFile;
use WsdlToPhp\PhpGenerator\Element\PhpFunctionParameter;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;

/**
 * Gathers [min|max|]Length rules.
 */
abstract class AbstractLengthRule extends AbstractMinMaxRule
{
    final public function testConditions(string $parameterName, $value, bool $itemType = false): string
    {
        if ($itemType || !$this->getAttribute()->isArray()) {
            $test = sprintf(($itemType ? '' : '!is_null($%1$s) && ').'mb_strlen((string) $%1$s) %3$s %2$d', $parameterName, $value, $this->symbol());
        } else {
            $this->addValidationMethod($parameterName, $value);
            $test = sprintf('\'\' !== (%s = self::%s($%s))', $this->getErrorMessageVariableName($parameterName), $this->getValidationMethodName($parameterName), $parameterName);
        }

        return $test;
    }

    final public function exceptionMessageOnTestFailure(string $parameterName, $value, bool $itemType = false): string
    {
        if ($itemType || !$this->getAttribute()->isArray()) {
            $message = sprintf('sprintf(\'Invalid length of %%s, the number of characters/octets contained by the literal must be %s %s\', mb_strlen((string) $%s))', $this->comparisonString(), is_array($value) ? implode(',', array_unique($value)) : $value, $parameterName);
        } else {
            $message = $this->getErrorMessageVariableName($parameterName);
        }

        return $message;
    }

    public function getErrorMessageVariableName(string $parameterName): string
    {
        return sprintf('$%s%sErrorMessage', $parameterName, ucfirst($this->name()));
    }

    protected function addValidationMethod(string $parameterName, $value): void
    {
        $method = new PhpMethod($this->getValidationMethodName($parameterName), [
            new PhpFunctionParameter('values', PhpFunctionParameter::NO_VALUE),
        ], AbstractModelFile::TYPE_STRING, PhpMethod::ACCESS_PUBLIC, false, true);
        $itemName = sprintf('%s%sItem', lcfirst($this->getFile()->getModel()->getCleanName(false)), ucfirst($this->getAttribute()->getCleanName()));

        $method
            ->addChild('$message = \'\';')
            ->addChild('$invalidValues = [];')
            ->addChild(sprintf('foreach ($values as $%s) {', $itemName))
            ->addChild($method->getIndentedString($this->validationRuleComment($value), 1))
            ->addChild($method->getIndentedString(sprintf('if (%s) {', $this->testConditions($itemName, $value, true)), 1))
            ->addChild($method->getIndentedString(sprintf('$invalidValues[] = var_export($%s, true);', $itemName), 2))
            ->addChild($method->getIndentedString('}', 1))
            ->addChild('}')
            ->addChild('if (!empty($invalidValues)) {')
            ->addChild($method->getIndentedString(sprintf('$message = sprintf(\'Invalid length for value(s) %%s, the number of characters/octets contained by the literal must be %s %s\', implode(\', \', $invalidValues));', $this->comparisonString(), $value), 1))
            ->addChild('}')
            ->addChild('unset($invalidValues);')
            ->addChild('')
            ->addChild('return $message;')
        ;
        $this->getMethods()->add($method);
    }

    protected function getValidationMethodName(string $parameterName): string
    {
        return sprintf('validate%sFor%sConstraintFrom%s', ucfirst($parameterName), ucfirst($this->name()), ucfirst($this->getMethod()->getName()));
    }
}
