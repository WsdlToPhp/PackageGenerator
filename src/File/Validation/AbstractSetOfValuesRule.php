<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File\Validation;

use WsdlToPhp\PackageGenerator\File\AbstractModelFile;
use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PhpGenerator\Element\PhpFunctionParameter;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;

abstract class AbstractSetOfValuesRule extends AbstractRule
{
    /**
     * Must check the attribute validity according to the current rule
     * @return bool
     */
    abstract protected function mustApplyRuleOnAttribute(): bool;

    public function testConditions(string $parameterName, $value, bool $itemType = false): string
    {
        $test = '';
        if ($this->mustApplyRuleOnAttribute()) {
            $this->addValidationMethod($parameterName, $value);
            $test = sprintf('\'\' !== (%s = self::%s($%s))', self::getErrorMessageVariableName($parameterName), $this->getValidationMethodName($parameterName), $parameterName);
        }

        return $test;
    }

    public function exceptionMessageOnTestFailure(string $parameterName, $value, bool $itemType = false): string
    {
        return self::getErrorMessageVariableName($parameterName);
    }

    protected function addValidationMethod(string $parameterName, $value)
    {
        $method = new PhpMethod($this->getValidationMethodName($parameterName), [
            new PhpFunctionParameter('values', [], 'array'),
        ], AbstractModelFile::TYPE_STRING, PhpMethod::ACCESS_PUBLIC, false, true);
        $model = $this->getFile()->getRestrictionFromStructAttribute($this->getAttribute());
        $itemName = sprintf('%s%sItem', lcfirst($this->getFile()->getModel()->getCleanName(false)), ucfirst($this->getAttribute()->getCleanName()));
        $rules = clone $this->getRules();

        if ($model instanceof Struct) {
            $rule = $rules->getEnumerationRule();
        } else {
            $rule = $rules->setMethod($method)->getItemTypeRule();
        }

        $method
            ->addChild('$message = \'\';')
            ->addChild('$invalidValues = [];')
            ->addChild(sprintf('foreach ($values as $%s) {', $itemName))
            ->addChild($method->getIndentedString($rule->validationRuleComment($value), 1))
            ->addChild($method->getIndentedString(sprintf('if (%s) {', $rule->testConditions($itemName, null)), 1))
            ->addChild($method->getIndentedString(sprintf('$invalidValues[] = %s;', sprintf('is_object($%1$s) ? get_class($%1$s) : sprintf(\'%%s(%%s)\', gettype($%1$s), var_export($%1$s, true))', $itemName)), 2))
            ->addChild($method->getIndentedString('}', 1))
            ->addChild('}')
            ->addChild('if (!empty($invalidValues)) {')
            ->addChild($method->getIndentedString(sprintf('$message = %s;', $rule->exceptionMessageOnTestFailure('invalidValues', null)), 1))
            ->addChild('}')
            ->addChild('unset($invalidValues);')
            ->addChild('return $message;');
        $this->getMethods()->add($method);
    }

    protected function getValidationMethodName(string $parameterName): string
    {
        return sprintf('validate%sForArrayConstraintsFrom%s', ucfirst($parameterName), ucFirst($this->getMethod()->getName()));
    }

    public static function getErrorMessageVariableName(string $parameterName): string
    {
        return sprintf('$%sArrayErrorMessage', $parameterName);
    }
}
