<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File\Validation;

use WsdlToPhp\PackageGenerator\Container\PhpElement\Method as MethodContainer;
use WsdlToPhp\PackageGenerator\File\AbstractModelFile;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\Model\StructAttribute;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;

final class Rules
{
    private StructAttribute $attribute;

    private AbstractModelFile $file;

    private PhpMethod $method;

    private MethodContainer $methods;

    private static array $rulesAppliedToAttribute = [];

    public function __construct(AbstractModelFile $file, PhpMethod $method, StructAttribute $attribute, MethodContainer $methods)
    {
        $this->file = $file;
        $this->method = $method;
        $this->attribute = $attribute;
        $this->methods = $methods;
    }

    public function applyRules(string $parameterName, bool $itemType = false): void
    {
        if (!$itemType && $this->attribute->isArray()) {
            $this->getArrayRule()->applyRule($parameterName, null, $itemType);
        } elseif (!$itemType && $this->attribute->isXml()) {
            $this->getXmlRule()->applyRule($parameterName, null, $itemType);
        } elseif (!$itemType && $this->attribute->isList()) {
            $this->getListRule()->applyRule($parameterName, null, $itemType);
        } elseif ($this->getFile()->getRestrictionFromStructAttribute($this->attribute)) {
            $this->getEnumerationRule()->applyRule($parameterName, null);
        } elseif ($itemType) {
            $this->getItemTypeRule()->applyRule($parameterName, null);
        } elseif (($rule = $this->getRule($this->getFile()->getStructAttributeTypeAsPhpType($this->attribute))) instanceof AbstractRule) {
            $rule->applyRule($parameterName, null, $itemType);
        }

        $this->applyRulesFromAttribute($parameterName, $itemType);
    }

    public function getRule(string $name): ?AbstractRule
    {
        $className = sprintf('%s\%sRule', __NAMESPACE__, ucfirst($name));

        return class_exists($className) ? new $className($this) : null;
    }

    public function getArrayRule(): ArrayRule
    {
        return $this->getRule('array');
    }

    public function getXmlRule(): XmlRule
    {
        return $this->getRule('xml');
    }

    public function getEnumerationRule(): EnumerationRule
    {
        return $this->getRule('enumeration');
    }

    public function getItemTypeRule(): ItemTypeRule
    {
        return $this->getRule('itemType');
    }

    public function getListRule(): ListRule
    {
        return $this->getRule('list');
    }

    public function getAttribute(): StructAttribute
    {
        return $this->attribute;
    }

    public function setAttribute(StructAttribute $attribute): self
    {
        $this->attribute = $attribute;

        return $this;
    }

    public function getFile(): AbstractModelFile
    {
        return $this->file;
    }

    public function getMethod(): PhpMethod
    {
        return $this->method;
    }

    public function setMethod(PhpMethod $method): self
    {
        $this->method = $method;

        return $this;
    }

    public function getMethods(): MethodContainer
    {
        return $this->methods;
    }

    public function getGenerator(): Generator
    {
        return $this->file->getGenerator();
    }

    public static function ruleHasBeenAppliedToAttribute(AbstractRule $rule, $value, StructAttribute $attribute): void
    {
        self::$rulesAppliedToAttribute[self::getAppliedRuleToAttributeKey($rule, $value, $attribute)] = true;
    }

    public static function hasRuleBeenAppliedToAttribute(AbstractRule $rule, $value, StructAttribute $attribute): bool
    {
        return array_key_exists(self::getAppliedRuleToAttributeKey($rule, $value, $attribute), self::$rulesAppliedToAttribute);
    }

    private function applyRulesFromAttribute(string $parameterName, bool $itemType = false): void
    {
        foreach ($this->attribute->getMeta() as $metaName => $metaValue) {
            if (!($rule = $this->getRule($metaName)) instanceof AbstractRule) {
                continue;
            }

            $rule->applyRule($parameterName, $metaValue, $itemType);
        }
    }

    private static function getAppliedRuleToAttributeKey(AbstractRule $rule, $value, StructAttribute $attribute): string
    {
        return implode('_', [
            $rule->validationRuleComment($value),
            $attribute->getOwner()->getName(),
            $attribute->getName(),
        ]);
    }
}
