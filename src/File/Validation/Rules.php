<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

use WsdlToPhp\PackageGenerator\Container\PhpElement\Method as MethodContainer;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;
use WsdlToPhp\PackageGenerator\File\AbstractModelFile;
use WsdlToPhp\PackageGenerator\Model\StructAttribute;

class Rules
{

    /**
     * @var StructAttribute
     */
    protected $attribute;

    /**
     * @var AbstractModelFile
     */
    protected $file;

    /**
     * @var PhpMethod
     */
    protected $method;

    /**
     * @var MethodContainer
     */
    protected $methods;
    /**
     * @param AbstractModelFile $file
     * @param PhpMethod $method
     * @param StructAttribute $attribute
     */
    public function __construct(AbstractModelFile $file, PhpMethod $method, StructAttribute $attribute, MethodContainer $methods)
    {
        $this->file = $file;
        $this->method = $method;
        $this->attribute = $attribute;
        $this->methods = $methods;
    }

    /**
     * @param string $parameterName
     * @param bool $itemType
     */
    public function applyRules($parameterName, $itemType = false)
    {
        if ($this->attribute->isArray() && !$itemType) {
            $this->getArrayRule()->applyRule($parameterName, null, $itemType);
        } elseif ($this->attribute->isList() && !$itemType) {
            $this->getListRule()->applyRule($parameterName, null, $itemType);
        } elseif ($this->getFile()->getRestrictionFromStructAttribute($this->attribute)) {
            $this->getEnumerationRule()->applyRule($parameterName, null);
        } elseif ($itemType) {
            $this->getItemTypeRule()->applyRule($parameterName, $itemType);
        } elseif (($rule = $this->getRule($this->getFile()->getStructAttributeTypeAsPhpType($this->attribute))) instanceof AbstractRule) {
            $rule->applyRule($parameterName, null, $itemType);
        }
        $this->applyRulesFromAttribute($parameterName);
    }

    /**
     * Generic method to apply rules from current model
     * @param string $parameterName
     */
    protected function applyRulesFromAttribute($parameterName)
    {
        foreach ($this->attribute->getMeta() as $metaName => $metaValue) {
            $rule = $this->getRule($metaName);
            if ($rule instanceof AbstractRule) {
                $rule->applyRule($parameterName, $metaValue);
            }
        }
    }

    /**
     * @param string $name
     * @return AbstractRule|null
     */
    public function getRule($name)
    {
        if (is_string($name)) {
            $className = sprintf('%s\%sRule', __NAMESPACE__, ucfirst($name));
            if (class_exists($className)) {
                return new $className($this);
            }
        }
        return null;
    }

    /**
     * @return ArrayRule
     */
    public function getArrayRule()
    {
        return $this->getRule('array');
    }

    /**
     * @return EnumerationRule
     */
    public function getEnumerationRule()
    {
        return $this->getRule('enumeration');
    }

    /**
     * @return ItemTypeRule
     */
    public function getItemTypeRule()
    {
        return $this->getRule('itemType');
    }

    /**
     * @return ListRule
     */
    public function getListRule()
    {
        return $this->getRule('list');
    }
    /**
     * @return StructAttribute
     */
    public function getAttribute()
    {
        return $this->attribute;
    }

    /**
     * @param StructAttribute $attribute
     * @return Rules
     */
    public function setAttribute(StructAttribute $attribute)
    {
        $this->attribute = $attribute;
        return $this;
    }

    /**
     * @return AbstractModelFile
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @return PhpMethod
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param PhpMethod $method
     * @return Rules
     */
    public function setMethod(PhpMethod $method)
    {
        $this->method = $method;
        return $this;
    }
    /**
     * @return MethodContainer
     */
    public function getMethods()
    {
        return $this->methods;
    }
    /**
     * @return Generator
     */
    public function getGenerator()
    {
        return $this->file->getGenerator();
    }
}
