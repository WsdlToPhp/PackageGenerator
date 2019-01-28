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
     * @param mixed $value
     * @param bool $itemType
     * @return AbstractRule
     */
    final public function applyRule($parameterName, $value, $itemType = false)
    {
        $test = $this->testConditions($parameterName, $value, $itemType);
        if (!empty($test)) {
            $message = $this->exceptionMessageOnTestFailure($parameterName, $value, $itemType);
            $this->getMethod()
                ->addChild($this->getMethod()->getIndentedString(sprintf('// validation for constraint: %s', $this->name()), $itemType ? 1 : 0))
                ->addChild($this->getMethod()->getIndentedString(sprintf('if (%s) {', $test), $itemType ? 1 : 0))
                ->addChild($this->getMethod()->getIndentedString(sprintf('throw new \InvalidArgumentException(%s, __LINE__);', $message), $itemType ? 2 : 1))
                ->addChild($this->getMethod()->getIndentedString('}', $itemType ? 1 : 0));
            unset($message);
        }
        unset($test);
    }

    /**
     * Name of the validation rule
     * @return string
     */
    abstract public function name();

    /**
     * Inline tests of the validation rule
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    abstract public function testConditions($parameterName, $value, $itemType = false);

    /**
     * Message when test fails in order to throw the exception
     * @param string $parameterName
     * @param mixed $value
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
