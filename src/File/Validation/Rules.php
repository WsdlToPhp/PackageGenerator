<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

use WsdlToPhp\PackageGenerator\Model\StructAttribute;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;
use WsdlToPhp\PackageGenerator\File\AbstractModelFile;

class Rules
{
    /**
     * @var StructAttribute
     */
    private $attribute;
    /**
     * @var AbstractModelFile
     */
    private $file;
    /**
     * @var PhpMethod
     */
    private $method;
    /**
     * @param StructAttribute $attribute
     */
    public function __construct(AbstractModelFile $file, PhpMethod $method, StructAttribute $attribute)
    {
        $this
            ->setFile($file)
            ->setMethod($method)
            ->setAttribute($attribute);
    }
    /**
     * @param string $parameterName
     * @param bool $itemType
     */
    public function applyRules($parameterName, $itemType = false)
    {
        foreach($this->getAttribute()->getMeta() as $metaName=>$metaValue) {
            $rule = $this->getRule($metaName);
            if ($rule instanceof AbstractRule) {
                $rule->applyRule($parameterName, $metaValue, $itemType);
            }
        }
        if ($this->getAttribute()->isArray() && !$itemType) {
            $this->getArrayRule()->applyRule($parameterName, null, $itemType);
        } elseif ($this->getFile()->getRestrictionFromStructAttribute($this->getAttribute())) {
            $this->getEnumerationRule()->applyRule($parameterName, null, $itemType);
        } elseif ($itemType) {
            $this->getItemTypeRule()->applyRule($parameterName, null, $itemType);
        } elseif(($rule = $this->getRule($this->getFile()->getStructAttributeTypeAsPhpType($this->getAttribute()))) instanceof AbstractRule) {
            $rule->applyRule($parameterName, null, $itemType);
        }
    }
    /**
     * @param string $metaName
     * @return AbstractRule
     */
    protected function getRule($metaName)
    {
        if (is_string($metaName)) {
            $className = sprintf('%s\%sRule', __NAMESPACE__, ucfirst($metaName));
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
     * @return StructAttribute
     */
    public function getAttribute()
    {
        return $this->attribute;
    }
    /**
     * @param StructAttribute $attribute
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
     * @param AbstractModelFile $file
     */
    public function setFile(AbstractModelFile $file)
    {
        $this->file = $file;
        return $this;
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
     */
    public function setMethod(PhpMethod $method)
    {
        $this->method = $method;
        return $this;
    }


}
