<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File\Validation;

use WsdlToPhp\PackageGenerator\Container\PhpElement\Method as MethodContainer;
use WsdlToPhp\PackageGenerator\File\AbstractModelFile;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\Model\StructAttribute as StructAttributeModel;
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
            $this->getMethod()
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
        return sprintf('// %s %s%s', self::VALIDATION_RULE_COMMENT_SENTENCE, $this->name(), is_array($value) ? sprintf('(%s)', implode(', ', array_unique($value))) : (empty($value) ? '' : sprintf('(%s)', $value)));
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
}
