<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

use WsdlToPhp\PhpGenerator\Element\PhpMethod;
use WsdlToPhp\PackageGenerator\Model\StructAttribute as StructAttributeModel;
use WsdlToPhp\PackageGenerator\File\AbstractModelFile;

abstract class AbstractRule
{
    /**
     * @var Rules
     */
    private $rules;
    /**
     * @param Rules $rules
     */
    public function __construct(Rules $rules)
    {
        $this->setRules($rules);
    }
    /**
     * This method has to add the validation rule to the method's body
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return AbstractValidation
     */
    abstract public function applyRule($parameterName, $value, $itemType = false);
    /**
     * @return Rules
     */
    public function getRules()
    {
        return $this->rules;
    }
    /**
     * @param Rules $rules
     */
    public function setRules(Rules $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    /**
     * @return PhpMethod
     */
    public function getMethod()
    {
        return $this->getRules()->getMethod();
    }
    /**
     * @return AbstractModelFile
     */
    public function getFile()
    {
        return $this->getRules()->getFile();
    }
    /**
     * @return StructAttributeModel
     */
    public function getAttribute()
    {
        return $this->getRules()->getAttribute();
    }
}
