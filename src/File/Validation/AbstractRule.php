<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;
use WsdlToPhp\PackageGenerator\Model\StructAttribute as StructAttributeModel;
use WsdlToPhp\PackageGenerator\File\AbstractModelFile;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Method as MethodContainer;

abstract class AbstractRule
{

    /**
     * @var string
     */
    const VALIDATION_RULE_COMMENT_SENTENCE = 'validation for constraint:';

    /**
     * @var Rules
     */
    protected $rules;

    /**
     * @param Rules $rules
     */
    public function __construct(Rules $rules)
    {
        $this->rules = $rules;
    }

    /**
     * This method has to add the validation rule to the method's body
     * @param string $parameterName
     * @param string|string[] $value
     * @param bool $itemType
     * @return AbstractRule
     */
    final public function applyRule($parameterName, $value, $itemType = false)
    {
        $test = $this->testConditions($parameterName, $value, $itemType);
        if (!empty($test)) {
            $message = $this->exceptionMessageOnTestFailure($parameterName, $value, $itemType);
            $this->getMethod()
                ->addChild($this->validationRuleComment($value))
                ->addChild(sprintf('if (%s) {', $test))
                ->addChild($this->getMethod()->getIndentedString(sprintf('throw new \InvalidArgumentException(%s, __LINE__);', $message), 1))
                ->addChild('}');
            unset($message);
            Rules::ruleHasBeenAppliedToAttribute($this, $value, $this->getAttribute());
        }
        unset($test);
    }

    /**
     * @param string|string[] $value
     * @return string
     */
    final public function validationRuleComment($value)
    {
        return sprintf('// %s %s%s', self::VALIDATION_RULE_COMMENT_SENTENCE, $this->name(), is_array($value) ? sprintf('(%s)', implode(', ', array_unique($value))) : (empty($value) ? '' : sprintf('(%s)', $value)));
    }

    /**
     * Name of the validation rule
     * @return string
     */
    abstract public function name();

    /**
     * Inline tests of the validation rule
     * @param string $parameterName
     * @param string|string[] $value
     * @param bool $itemType
     * @return string
     */
    abstract public function testConditions($parameterName, $value, $itemType = false);

    /**
     * Message when test fails in order to throw the exception
     * @param string $parameterName
     * @param string|string[] $value
     * @param bool $itemType
     * @return string
     */
    abstract public function exceptionMessageOnTestFailure($parameterName, $value, $itemType = false);

    /**
     * @return Rules
     */
    public function getRules()
    {
        return $this->rules;
    }

    /**
     * @return PhpMethod
     */
    public function getMethod()
    {
        return $this->rules->getMethod();
    }

    /**
     * @return MethodContainer
     */
    public function getMethods()
    {
        return $this->rules->getMethods();
    }

    /**
     * @return AbstractModelFile
     */
    public function getFile()
    {
        return $this->rules->getFile();
    }

    /**
     * @return StructAttributeModel
     */
    public function getAttribute()
    {
        return $this->rules->getAttribute();
    }

    /**
     * @return Generator
     */
    public function getGenerator()
    {
        return $this->rules->getGenerator();
    }
}
