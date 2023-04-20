<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File\Validation;

use WsdlToPhp\PackageGenerator\Container\PhpElement\Method as MethodContainer;
use WsdlToPhp\PackageGenerator\File\AbstractModelFile;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\Model\StructAttribute as StructAttributeModel;
use WsdlToPhp\PhpGenerator\Element\PhpFunctionParameter;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;

abstract class AbstractRule
{
    public const VALIDATION_RULE_COMMENT_SENTENCE = 'validation for constraint:';

    protected Rules $rules;

    public function __construct(Rules $rules)
    {
        $this->rules = $rules;
    }

    final public function applyRule(string $parameterName, $value, bool $itemType = false): void
    {
        $test = $this->testConditions($parameterName, $value, $itemType);
        if (!empty($test)) {
            $message = $this->exceptionMessageOnTestFailure($parameterName, $value, $itemType);
            $this
                ->getMethod()
                ->addChild($this->validationRuleComment($value))
                ->addChild(sprintf('if (%s) {', $test))
                ->addChild($this->getMethod()->getIndentedString(sprintf('throw new InvalidArgumentException(%s, __LINE__);', $message), 1))
                ->addChild('}')
            ;
            unset($message);
            Rules::ruleHasBeenAppliedToAttribute($this, $value, $this->getAttribute());
        }
        unset($test);
    }

    final public function validationRuleComment($value): string
    {
        return sprintf(
            '// %s %s%s',
            self::VALIDATION_RULE_COMMENT_SENTENCE,
            $this->name(),
            is_array($value) ? sprintf('(%s)', implode(', ', array_unique($value))) : (empty($value) ? '' : sprintf('(%s)', $value))
        );
    }

    abstract public function name(): string;

    abstract public function testConditions(string $parameterName, $value, bool $itemType = false): string;

    abstract public function exceptionMessageOnTestFailure(string $parameterName, $value, bool $itemType = false): string;

    public function getRules(): Rules
    {
        return $this->rules;
    }

    public function getMethod(): PhpMethod
    {
        return $this->rules->getMethod();
    }

    public function getMethods(): MethodContainer
    {
        return $this->rules->getMethods();
    }

    public function getFile(): AbstractModelFile
    {
        return $this->rules->getFile();
    }

    public function getAttribute(): StructAttributeModel
    {
        return $this->rules->getAttribute();
    }

    public function getGenerator(): Generator
    {
        return $this->rules->getGenerator();
    }

    final protected function addArrayValidationMethod(string $parameterName, $value): void
    {
        $itemName = sprintf(
            '%s%sItem',
            lcfirst($this->getFile()->getModel()->getCleanName(false)),
            ucfirst($this->getAttribute()->getCleanName())
        );
        $method = new PhpMethod($this->getValidationMethodName($parameterName), [
            new PhpFunctionParameter('values', null, '?array'),
        ], AbstractModelFile::TYPE_STRING, PhpMethod::ACCESS_PUBLIC, false, true);

        $method
            ->addChild('$message = \'\';')
            ->addChild('$invalidValues = [];')
            ->addChild(sprintf('foreach (($values ?? []) as $%s) {', $itemName))
            ->addChild($method->getIndentedString($this->validationRuleComment($value), 1))
            ->addChild($method->getIndentedString(sprintf('if (%s) {', $this->testConditions($itemName, $value, true)), 1))
            ->addChild($method->getIndentedString(sprintf('$invalidValues[] = var_export($%s, true);', $itemName), 2))
            ->addChild($method->getIndentedString('}', 1))
            ->addChild('}')
            ->addChild('if (!empty($invalidValues)) {')
            ->addChild($method->getIndentedString(
                sprintf(
                    '$message = sprintf(\'%s\', implode(\', \', $invalidValues));',
                    addslashes($this->getArrayExceptionMessageOnTestFailure($value)),
                ),
                1
            ))
            ->addChild('}')
            ->addChild('unset($invalidValues);')
            ->addChild('')
            ->addChild('return $message;')
        ;
        $this->getMethods()->add($method);
    }

    protected function getArrayExceptionMessageOnTestFailure($value): string
    {
        return '';
    }

    final protected function getValidationMethodName(string $parameterName): string
    {
        return sprintf(
            'validate%sFor%sConstraintFrom%s',
            ucfirst($parameterName),
            ucfirst($this->name()),
            ucfirst($this->getMethod()->getName())
        );
    }

    final protected function getArrayErrorMessageVariableName(string $parameterName): string
    {
        return sprintf('$%s%sErrorMessage', $parameterName, ucfirst($this->name()));
    }
}
