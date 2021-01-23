<?php

namespace WsdlToPhp\PackageGenerator\Model;

use WsdlToPhp\PackageGenerator\Generator\Utils;
use WsdlToPhp\PackageGenerator\Container\Model\StructValue as StructValueContainer;
use WsdlToPhp\PackageGenerator\Container\Model\StructAttribute as StructAttributeContainer;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\ConfigurationReader\StructReservedMethod;
use WsdlToPhp\PackageGenerator\ConfigurationReader\StructArrayReservedMethod;

/**
 * Class Struct stands for an available struct described in the WSDL
 */
class Struct extends AbstractModel
{
    /**
     * @var string
     */
    const DOC_SUB_PACKAGE_STRUCTS = 'Structs';
    /**
     * @var string
     */
    const DOC_SUB_PACKAGE_ENUMERATIONS = 'Enumerations';
    /**
     * @var string
     */
    const DOC_SUB_PACKAGE_ARRAYS = 'Arrays';
    /**
     * @var string
     */
    const DEFAULT_ENUM_TYPE = 'string';
    /**
     * Attributes of the struct
     * @var StructAttributeContainer
     */
    protected $attributes;
    /**
     * Is the struct a restriction with defined values  ?
     * @var bool
     */
    protected $isRestriction = false;
    /**
     * If the struct is a restriction with values, then store values
     * @var StructValueContainer
     */
    protected $values;
    /**
     * If the struct is a union with types, then store types
     * @var string[]
     */
    protected $types;
    /**
     * Defines if the current struct is a concrete struct or just a virtual struct to store meta information
     * @var bool
     */
    protected $isStruct = false;
    /**
     * Defines if the current struct is a list of a type or not.
     * If it is a list of a type, then the list property value is the type
     * @var string
     */
    protected $list = '';
    /**
     * Main constructor
     * @see AbstractModel::__construct()
     * @uses Struct::setStruct()
     * @param Generator $generator
     * @param string $name the original name
     * @param bool $isStruct defines if it's a real struct or not
     * @param bool $isRestriction defines if it's an enumeration or not
     */
    public function __construct(Generator $generator, $name, $isStruct = true, $isRestriction = false)
    {
        parent::__construct($generator, $name);
        $this
            ->setStruct($isStruct)
            ->setRestriction($isRestriction)
            ->setAttributes(new StructAttributeContainer($generator))
            ->setValues(new StructValueContainer($generator))
            ->setTypes([]);
    }
    /**
     * Returns the contextual part of the class name for the package
     * @see AbstractModel::getContextualPart()
     * @uses Struct::isRestriction()
     * @return string
     */
    public function getContextualPart()
    {
        $part = $this->getGenerator()->getOptionStructsFolder();
        if ($this->isRestriction()) {
            $part = $this->getGenerator()->getOptionEnumsFolder();
        } elseif ($this->isArray()) {
            $part = $this->getGenerator()->getOptionArraysFolder();
        }
        return $part;
    }
    /**
     * Returns the sub package name which the model belongs to
     * Must be overridden by sub classes
     * @see AbstractModel::getDocSubPackages()
     * @uses Struct::isRestriction()
     * @return array
     */
    public function getDocSubPackages()
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
    /**
     * Returns true if the current struct is a collection of values (like an array or a list of values)
     * @uses AbstractModel::getName()
     * @uses Struct::countOwnAttributes()
     * @return bool
     */
    public function isArray()
    {
        return
        (
            (
                (
                    ($this->isStruct() && $this->countAllAttributes() === 1) ||
                    (!$this->isStruct() && $this->countOwnAttributes() <= 1)
                ) &&
                mb_stripos($this->getName(), 'array') !== false
            ) ||
            (!$this->isStruct() && $this->getMetaValueFirstSet(['arraytype', 'arrayType'], false) !== false)
        );
    }
    /**
     * Returns the attributes of the struct and potentially from the parent class
     * @uses AbstractModel::getInheritance()
     * @uses Struct::isStruct()
     * @uses Struct::getAttributes()
     * @param bool $includeInheritanceAttributes include the attributes of parent class, default parent attributes are not included. If true, then the array is an associative array containing and index "attribute" for the StructAttribute object and an index "model" for the Struct object.
     * @param bool $requiredFirst places the required attributes first, then the not required in order to have the _construct method with the required attribute at first
     * @return StructAttributeContainer
     */
    public function getAttributes($includeInheritanceAttributes = false, $requiredFirst = false)
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
     * This means it removes from the attributes this Struct has the attributes declared by its parent class(es)
     * @param bool $requiredFirst places the required attributes first, then the not required in order to have the _construct method with the required attribute at first
     * @return StructAttributeContainer
     */
    public function getProperAttributes($requiredFirst = false)
    {
        $properAttributes = new StructAttributeContainer($this->getGenerator());
        $parentAttributes = new StructAttributeContainer($this->getGenerator());

        if ($this->getInheritance() != '' && ($model = $this->getInheritanceStruct()) instanceof Struct) {
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
    /**
     * @param bool $includeInheritanceAttributes
     * @param bool $requiredFirst
     * @return StructAttributeContainer
     */
    protected function getAllAttributes($includeInheritanceAttributes, $requiredFirst)
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
    /**
     * @param StructAttributeContainer $attributes
     */
    protected function addInheritanceAttributes(StructAttributeContainer $attributes)
    {
        if ($this->getInheritance() != '' && ($model = $this->getInheritanceStruct()) instanceof Struct) {
            while ($model instanceof Struct && $model->isStruct()) {
                foreach ($model->getAttributes() as $attribute) {
                    $attributes->add($attribute);
                }
                $model = $model->getInheritanceStruct();
            }
        }
    }
    /**
     * @param StructAttributeContainer $allAttributes
     * @return StructAttributeContainer
     */
    protected function putRequiredAttributesFirst(StructAttributeContainer $allAttributes)
    {
        $attributes = new StructAttributeContainer($this->getGenerator());
        $requiredAttributes = new StructAttributeContainer($this->getGenerator());
        $notRequiredAttributes = new StructAttributeContainer($this->getGenerator());
        foreach ($allAttributes as $attribute) {
            if ($attribute->isRequired()) {
                $requiredAttributes->add($attribute);
            } else {
                $notRequiredAttributes->add($attribute);
            }
        }
        foreach ($requiredAttributes as $attribute) {
            $attributes->add($attribute);
        }
        foreach ($notRequiredAttributes as $attribute) {
            $attributes->add($attribute);
        }
        unset($requiredAttributes, $notRequiredAttributes);
        return $attributes;
    }
    /**
     * Returns the number of own attributes
     * @uses Struct::getAttributes()
     * @return int
     */
    public function countOwnAttributes()
    {
        return $this->getAttributes()->count();
    }
    /**
     * Returns the number of all attributes
     * @uses Struct::getAttributes()
     * @return int
     */
    public function countAllAttributes()
    {
        return $this->getAttributes(true)->count();
    }
    /**
     * Sets the attributes of the struct
     * @param StructAttributeContainer $structAttributeContainer
     * @return Struct
     */
    public function setAttributes(StructAttributeContainer $structAttributeContainer)
    {
        $this->attributes = $structAttributeContainer;
        return $this;
    }
    /**
     * Adds attribute based on its original name
     * @throws \InvalidArgumentException
     * @param string $attributeName the attribute name
     * @param string $attributeType the attribute type
     * @return Struct
     */
    public function addAttribute($attributeName, $attributeType)
    {
        if (empty($attributeName) || empty($attributeType)) {
            throw new \InvalidArgumentException(sprintf('Attribute name "%s" and/or attribute type "%s" is invalid for Struct "%s"', $attributeName, $attributeType, $this->getName()), __LINE__);
        }
        if ($this->attributes->getStructAttributeByName($attributeName) === null) {
            $structAttribute = new StructAttribute($this->getGenerator(), $attributeName, $attributeType, $this);
            $this->attributes->add($structAttribute);
        }
        return $this;
    }
    /**
     * Returns the attribute by its name, otherwise null
     * @uses Struct::getAttributes()
     * @param string $attributeName the original attribute name
     * @return StructAttribute|null
     */
    public function getAttribute($attributeName)
    {
        return $this->attributes->getStructAttributeByName($attributeName);
    }
    /**
     * Returns the attribute by its cleaned name, otherwise null
     * @uses Struct::getAttributes()
     * @param string $attributeCleanName the cleaned attribute name
     * @return StructAttribute|null
     */
    public function getAttributeByCleanName($attributeCleanName)
    {
        return $this->attributes->getStructAttributeByCleanName($attributeCleanName);
    }
    /**
     * Returns the isRestriction value
     * @return bool
     */
    public function isRestriction()
    {
        return $this->isRestriction;
    }
    /**
     * Sets the isRestriction value
     * @param bool $isRestriction
     * @return Struct
     */
    public function setRestriction($isRestriction = true)
    {
        $this->isRestriction = $isRestriction;
        return $this;
    }
    /**
     * Returns the isStruct value
     * @return bool
     */
    public function isStruct()
    {
        return $this->isStruct;
    }
    /**
     * Sets the isStruct value
     * @param bool $isStruct
     * @return Struct
     */
    public function setStruct($isStruct = true)
    {
        $this->isStruct = $isStruct;
        return $this;
    }
    /**
     * Returns the list value
     * @return string
     */
    public function getList()
    {
        return $this->list;
    }
    /**
     * Returns if the current struct is a list
     * List are a set of basic-type values
     * @return bool
     */
    public function isList()
    {
        return !empty($this->list);
    }
    /**
     * Sets the list value
     * @param string $list
     * @return Struct
     */
    public function setList($list = '')
    {
        $this->list = $list;
        return $this;
    }
    /**
     * Returns the values for an enumeration
     * @return StructValueContainer
     */
    public function getValues()
    {
        return $this->values;
    }
    /**
     * Sets the values for an enumeration
     * @param StructValueContainer $structValueContainer
     * @return Struct
     */
    protected function setValues(StructValueContainer $structValueContainer)
    {
        $this->values = $structValueContainer;
        return $this;
    }
    /**
     * Adds value to values array
     * @uses Struct::getValue()
     * @uses Struct::getValues()
     * @param mixed $value the original value
     * @return Struct
     */
    public function addValue($value)
    {
        if ($this->getValue($value) === null) {
            // issue #177, rare case: a struct and an enum has the same name and the enum is not detected by the SoapClient,
            // then we need to create the enumeration struct in order to deduplicate the two structs
            // this is why enumerations has to be parsed before any other elements by the WSDL parsers
            if (0 < $this->countOwnAttributes()) {
                $enum = new static($this->getGenerator(), $this->getName(), true, true);
                $enum
                    ->setInheritance(self::DEFAULT_ENUM_TYPE)
                    ->getValues()->add(new StructValue($enum->getGenerator(), $value, $enum->getValues()->count(), $enum));
                $this->getGenerator()->getStructs()->add($enum);
                return $enum;
            } else {
                $this
                    ->setStruct(true)
                    ->setRestriction(true)
                    ->getValues()->add(new StructValue($this->getGenerator(), $value, $this->getValues()->count(), $this));
            }
        }
        return $this;
    }
    /**
     * Gets the value object for the given value
     * @uses Struct::getValues()
     * @uses AbstractModel::getName()
     * @param string $value Value name
     * @return StructValue|null
     */
    public function getValue($value)
    {
        return $this->values->getStructValueByName($value);
    }
    /**
     * Allows to define from which class the current model extends
     * @param bool $short
     * @return string
     */
    public function getExtends($short = false)
    {
        $extends = '';
        if ($this->isArray()) {
            $extends = $this->getGenerator()->getOptionStructArrayClass();
        } elseif ($this->isRestriction()) {
            $extends = $this->getGenerator()->getOptionStructEnumClass();
        } else {
            $extends = $this->getGenerator()->getOptionStructClass();
        }
        return $short ? Utils::removeNamespace($extends) : $extends;
    }
    /**
     * @return Struct|null
     */
    public function getInheritanceStruct()
    {
        return $this->getName() === $this->getInheritance() ? null : $this->getGenerator()->getStructByName(str_replace('[]', '', $this->getInheritance()));
    }
    /**
     * @return string
     */
    public function getTopInheritance()
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
    /**
     * @return Struct|null
     */
    public function getTopInheritanceStruct()
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
    /**
     * @see \WsdlToPhp\PackageGenerator\Model\AbstractModel::getMeta()
     * @return string[]
     */
    public function getMeta()
    {
        $inheritanceStruct = $this->getInheritanceStruct();
        return $this->mergeMeta(($inheritanceStruct && !$inheritanceStruct->isStruct()) ? $inheritanceStruct->getMeta() : [], parent::getMeta());
    }
    /**
     * @param $filename
     * @return StructReservedMethod|StructArrayReservedMethod
     */
    public function getReservedMethodsInstance($filename = null)
    {
        $instance = StructReservedMethod::instance($filename);
        if ($this->isArray()) {
            $instance = StructArrayReservedMethod::instance($filename);
        }
        return $instance;
    }
    /**
     * @return string[]
     */
    public function getTypes()
    {
        return $this->types;
    }
    /**
     * @return boolean
     */
    public function isUnion()
    {
        return count($this->types) > 0;
    }
    /**
     * @param string[] $types
     * @return Struct
     */
    public function setTypes(array $types)
    {
        $this->types = $types;
        return $this;
    }
    /**
     * {@inheritDoc}
     * @see \WsdlToPhp\PackageGenerator\Model\AbstractModel::toJsonSerialize()
     */
    protected function toJsonSerialize()
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
    /**
     * @param array $attributes
     */
    public function setAttributesFromSerializedJson(array $attributes)
    {
        foreach ($attributes as $attribute) {
            $this->attributes->add(self::instanceFromSerializedJson($this->generator, $attribute)->setOwner($this));
        }
    }
    /**
     * @param array $values
     */
    public function setValuesFromSerializedJson(array $values)
    {
        foreach ($values as $value) {
            $this->values->add(self::instanceFromSerializedJson($this->generator, $value)->setOwner($this));
        }
    }
}
