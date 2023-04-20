<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Model;

use WsdlToPhp\PackageGenerator\ConfigurationReader\AbstractReservedWord;
use WsdlToPhp\PackageGenerator\ConfigurationReader\StructArrayReservedMethod;
use WsdlToPhp\PackageGenerator\ConfigurationReader\StructReservedMethod;
use WsdlToPhp\PackageGenerator\Container\Model\StructAttribute as StructAttributeContainer;
use WsdlToPhp\PackageGenerator\Container\Model\StructValue as StructValueContainer;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\Generator\Utils;

/**
 * Class Struct stands for an available struct described in the WSDL.
 */
final class Struct extends AbstractModel
{
    public const DOC_SUB_PACKAGE_STRUCTS = 'Structs';
    public const DOC_SUB_PACKAGE_ENUMERATIONS = 'Enumerations';
    public const DOC_SUB_PACKAGE_ARRAYS = 'Arrays';
    public const DEFAULT_ENUM_TYPE = 'string';

    /**
     * Attributes of the struct.
     */
    protected StructAttributeContainer $attributes;

    /**
     * Is the struct a restriction with defined values  ?
     */
    protected bool $isRestriction = false;

    /**
     * If the struct is a restriction with values, then store values.
     */
    protected StructValueContainer $values;

    /**
     * If the struct is a union with types, then store types.
     *
     * @var string[]
     */
    protected array $types = [];

    /**
     * Defines if the current struct is a concrete struct or just a virtual struct to store meta information.
     */
    protected bool $isStruct = false;

    /**
     * Defines if the current struct is a list of a type or not.
     * If it is a list of a type, then the list property value is the type.
     */
    protected string $list = '';

    public function __construct(Generator $generator, $name, $isStruct = true, $isRestriction = false)
    {
        parent::__construct($generator, $name);
        $this
            ->setStruct($isStruct)
            ->setRestriction($isRestriction)
            ->setAttributes(new StructAttributeContainer($generator))
            ->setValues(new StructValueContainer($generator))
        ;
    }

    public function getContextualPart(): string
    {
        $part = $this->getGenerator()->getOptionStructsFolder();
        if ($this->isRestriction()) {
            $part = $this->getGenerator()->getOptionEnumsFolder();
        } elseif ($this->isArray()) {
            $part = $this->getGenerator()->getOptionArraysFolder();
        }

        return $part;
    }

    public function getDocSubPackages(): array
    {
        $package = self::DOC_SUB_PACKAGE_STRUCTS;
        if ($this->isRestriction()) {
            $package = self::DOC_SUB_PACKAGE_ENUMERATIONS;
        } elseif ($this->isArray()) {
            $package = self::DOC_SUB_PACKAGE_ARRAYS;
        }

        return [
            $package,
        ];
    }

    public function isArray(): bool
    {
        return
            (
                (
                    ($this->isStruct() && 1 === $this->countAllAttributes())
                    || (!$this->isStruct() && 1 >= $this->countOwnAttributes())
                )
                && false !== mb_stripos($this->getName(), 'array')
            )
            || (!$this->isStruct() && false !== $this->getMetaValueFirstSet(['arraytype', 'arrayType'], false))
        ;
    }

    public function getAttributes(bool $includeInheritanceAttributes = false, bool $requiredFirst = false): StructAttributeContainer
    {
        if (!$includeInheritanceAttributes && !$requiredFirst) {
            $attributes = $this->attributes;
        } else {
            $attributes = $this->getAllAttributes($includeInheritanceAttributes, $requiredFirst);
        }

        return $attributes;
    }

    /**
     * Returns the attributes of the struct and not the ones that are declared by the parent struct if this struct inherits from a Struct
     * This means it removes from the attributes this Struct has the attributes declared by its parent class(es).
     *
     * @param bool $requiredFirst places the required attributes first, then the not required in order to have the _construct method with the required attribute at first
     */
    public function getProperAttributes(bool $requiredFirst = false): StructAttributeContainer
    {
        $properAttributes = new StructAttributeContainer($this->getGenerator());
        $parentAttributes = new StructAttributeContainer($this->getGenerator());

        if (!empty($this->getInheritance()) && ($model = $this->getInheritanceStruct()) instanceof Struct) {
            while ($model instanceof Struct && $model->isStruct()) {
                foreach ($model->getAttributes() as $attribute) {
                    $parentAttributes->add($attribute);
                }
                $model = $model->getInheritanceStruct();
            }
        }

        /** @var StructAttribute $attribute */
        foreach ($this->getAttributes() as $attribute) {
            if ($parentAttributes->getStructAttributeByName($attribute->getName())) {
                continue;
            }
            $properAttributes->add($attribute);
        }

        return $requiredFirst ? $this->putRequiredAttributesFirst($properAttributes) : $properAttributes;
    }

    public function countOwnAttributes(): int
    {
        return $this->getAttributes()->count();
    }

    public function countAllAttributes(): int
    {
        return $this->getAttributes(true)->count();
    }

    public function setAttributes(StructAttributeContainer $structAttributeContainer): self
    {
        $this->attributes = $structAttributeContainer;

        return $this;
    }

    public function addAttribute(string $attributeName, string $attributeType): self
    {
        if (empty($attributeName) || empty($attributeType)) {
            throw new \InvalidArgumentException(sprintf('Attribute name "%s" and/or attribute type "%s" is invalid for Struct "%s"', $attributeName, $attributeType, $this->getName()), __LINE__);
        }
        if (is_null($this->attributes->getStructAttributeByName($attributeName))) {
            $structAttribute = new StructAttribute($this->getGenerator(), $attributeName, $attributeType, $this);
            $this->attributes->add($structAttribute);
        }

        return $this;
    }

    public function getAttribute(string $attributeName): ?StructAttribute
    {
        return $this->attributes->getStructAttributeByName($attributeName);
    }

    public function getAttributeByCleanName(string $attributeCleanName): ?StructAttribute
    {
        return $this->attributes->getStructAttributeByCleanName($attributeCleanName);
    }

    public function isRestriction(): bool
    {
        return $this->isRestriction;
    }

    public function setRestriction($isRestriction = true): self
    {
        $this->isRestriction = $isRestriction;

        return $this;
    }

    public function isStruct(): bool
    {
        return $this->isStruct;
    }

    public function setStruct(bool $isStruct = true): self
    {
        $this->isStruct = $isStruct;

        return $this;
    }

    public function getList(): string
    {
        return $this->list;
    }

    public function isList(): bool
    {
        return !empty($this->list);
    }

    public function setList(string $list = ''): self
    {
        $this->list = $list;

        return $this;
    }

    public function getValues(): StructValueContainer
    {
        return $this->values;
    }

    public function addValue($value): self
    {
        if (is_null($this->getValue($value))) {
            // issue #177, rare case: a struct and an enum has the same name and the enum is not detected by the SoapClient,
            // then we need to create the enumeration struct in order to deduplicate the two structs
            // this is why enumerations has to be parsed before any other elements by the WSDL parsers
            if (0 < $this->countOwnAttributes()) {
                $enum = new Struct($this->getGenerator(), $this->getName(), true, true);
                $enum->setInheritance(self::DEFAULT_ENUM_TYPE);
                $enum->getValues()->add(new StructValue($enum->getGenerator(), $value, $enum->getValues()->count(), $enum));
                $this->getGenerator()->getStructs()->add($enum);

                return $enum;
            }
            $this
                ->setStruct(true)
                ->setRestriction(true)
                ->getValues()->add(new StructValue($this->getGenerator(), $value, $this->getValues()->count(), $this));
        }

        return $this;
    }

    public function getValue($value): ?StructValue
    {
        return $this->values->getStructValueByName($value);
    }

    public function getExtends(bool $short = false): string
    {
        if ($this->isArray()) {
            $extends = $this->getGenerator()->getOptionStructArrayClass();
        } elseif ($this->isRestriction()) {
            $extends = $this->getGenerator()->getOptionStructEnumClass();
        } else {
            $extends = $this->getGenerator()->getOptionStructClass();
        }

        return $short ? Utils::removeNamespace($extends) : $extends;
    }

    public function getInheritanceStruct(): ?Struct
    {
        return $this->getName() === $this->getInheritance() ? null : $this->getGenerator()->getStructByName(str_replace('[]', '', $this->getInheritance()));
    }

    public function getTopInheritance(): string
    {
        $inheritance = $this->getInheritance();
        if (!empty($inheritance)) {
            $struct = $this->getInheritanceStruct();
            while ($struct instanceof Struct) {
                $structInheritance = $struct->getInheritance();
                if (!empty($structInheritance)) {
                    $inheritance = $structInheritance;
                }
                $struct = $struct->getInheritanceStruct();
            }
        }

        return $inheritance;
    }

    public function getTopInheritanceStruct(): ?Struct
    {
        $struct = $this->getInheritanceStruct();
        $latestValidStruct = $struct;
        while ($struct instanceof Struct) {
            $struct = $struct->getInheritanceStruct();
            if ($struct instanceof Struct) {
                $latestValidStruct = $struct;
            }
        }

        return $latestValidStruct;
    }

    public function getMeta(): array
    {
        $inheritanceStruct = $this->getInheritanceStruct();

        return $this->mergeMeta(($inheritanceStruct && !$inheritanceStruct->isStruct()) ? $inheritanceStruct->getMeta() : [], parent::getMeta());
    }

    public function getReservedMethodsInstance(?string $filename = null): AbstractReservedWord
    {
        $instance = StructReservedMethod::instance($filename);
        if ($this->isArray()) {
            $instance = StructArrayReservedMethod::instance($filename);
        }

        return $instance;
    }

    public function getTypes(): array
    {
        return $this->types;
    }

    public function isUnion(): bool
    {
        return 0 < count($this->types);
    }

    public function setTypes(array $types): self
    {
        $this->types = $types;

        return $this;
    }

    public function setAttributesFromSerializedJson(array $attributes): void
    {
        foreach ($attributes as $attribute) {
            $this->attributes->add(self::instanceFromSerializedJson($this->generator, $attribute)->setOwner($this));
        }
    }

    public function setValuesFromSerializedJson(array $values): void
    {
        foreach ($values as $value) {
            $this->values->add(self::instanceFromSerializedJson($this->generator, $value)->setOwner($this));
        }
    }

    protected function getAllAttributes(bool $includeInheritanceAttributes, bool $requiredFirst): StructAttributeContainer
    {
        $allAttributes = new StructAttributeContainer($this->getGenerator());
        if ($includeInheritanceAttributes) {
            $this->addInheritanceAttributes($allAttributes);
        }

        foreach ($this->attributes as $attribute) {
            $allAttributes->add($attribute);
        }

        if ($requiredFirst) {
            $attributes = $this->putRequiredAttributesFirst($allAttributes);
        } else {
            $attributes = $allAttributes;
        }

        return $attributes;
    }

    protected function addInheritanceAttributes(StructAttributeContainer $attributes): void
    {
        if (!empty($this->getInheritance()) && ($model = $this->getInheritanceStruct()) instanceof Struct) {
            while ($model instanceof Struct && $model->isStruct()) {
                foreach ($model->getAttributes() as $attribute) {
                    $attributes->add($attribute);
                }
                $model = $model->getInheritanceStruct();
            }
        }
    }

    protected function putRequiredAttributesFirst(StructAttributeContainer $allAttributes): StructAttributeContainer
    {
        $attributes = new StructAttributeContainer($this->getGenerator());
        $requiredAttributes = [];
        $notRequiredAttributes = [];
        $nullableNotRequiredAttributes = [];

        /** @var StructAttribute $attribute */
        foreach ($allAttributes as $attribute) {
            if ($attribute->isRequired() && !$attribute->isNullable()) {
                $requiredAttributes[] = $attribute;
            } elseif (!$attribute->isNullable()) {
                $notRequiredAttributes[] = $attribute;
            } else {
                $nullableNotRequiredAttributes[] = $attribute;
            }
        }

        array_walk($requiredAttributes, [$attributes, 'add']);
        array_walk($notRequiredAttributes, [$attributes, 'add']);
        array_walk($nullableNotRequiredAttributes, [$attributes, 'add']);

        unset($requiredAttributes, $notRequiredAttributes, $nullableNotRequiredAttributes);

        return $attributes;
    }

    protected function setValues(StructValueContainer $structValueContainer): self
    {
        $this->values = $structValueContainer;

        return $this;
    }

    protected function toJsonSerialize(): array
    {
        return [
            'attributes' => $this->attributes,
            'restriction' => $this->isRestriction,
            'struct' => $this->isStruct,
            'types' => $this->types,
            'values' => $this->values,
            'list' => $this->list,
        ];
    }
}
