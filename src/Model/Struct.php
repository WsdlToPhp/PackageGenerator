<?php

namespace WsdlToPhp\PackageGenerator\Model;

use WsdlToPhp\PackageGenerator\Generator\Utils;
use WsdlToPhp\PackageGenerator\Container\Model\StructValue as StructValueContainer;
use WsdlToPhp\PackageGenerator\Container\Model\StructAttribute as StructAttributeContainer;
use WsdlToPhp\PackageGenerator\Generator\Generator;

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
     * Attributes of the struct
     * @var StructAttributeContainer
     */
    private $attributes;
    /**
     * Is the struct a restriction with defined values  ?
     * @var bool
     */
    private $isRestriction = false;
    /**
     * If the struct is a restriction with values, then store values
     * @var StructValueContainer
     */
    private $values;
    /**
     * Define if the urrent struct is a concrete struct or just a virtual struct to store meta informations
     * @var bool
     */
    private $isStruct = false;
    /**
     * Main constructor
     * @see AbstractModel::__construct()
     * @uses Struct::setIsStruct()
     * @param Generator $generator
     * @param string $name the original name
     * @param bool $isStruct defines if it's a real sruct or not
     * @param bool $isRestriction defines if it's an enumeration or not
     */
    public function __construct(Generator $generator, $name, $isStruct = true, $isRestriction = false)
    {
        parent::__construct($generator, $name);
        $this
            ->setIsStruct($isStruct)
            ->setIsRestriction($isRestriction)
            ->setAttributes(new StructAttributeContainer($generator))
            ->setValues(new StructValueContainer($generator));
    }
    /**
     * Returns the contextual part of the class name for the package
     * @see AbstractModel::getContextualPart()
     * @uses Struct::getIsRestriction()
     * @return string
     */
    public function getContextualPart()
    {
        $part = $this->getGenerator()->getOptionStructsFolder();
        if ($this->getIsRestriction()) {
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
     * @uses Struct::getIsRestriction()
     * @return array
     */
    public function getDocSubPackages()
    {
        $package = self::DOC_SUB_PACKAGE_STRUCTS;
        if ($this->getIsRestriction()) {
            $package = self::DOC_SUB_PACKAGE_ENUMERATIONS;
        } elseif ($this->isArray()) {
            $package = self::DOC_SUB_PACKAGE_ARRAYS;
        }
        return array(
            $package,
        );
    }
    /**
     * Returns true if the current struct is a collection of values (like an array)
     * @uses AbstractModel::getName()
     * @uses Struct::countOwnAttributes()
     * @return bool
     */
    public function isArray()
    {
        return ($this->countOwnAttributes() === 1 && stripos($this->getName(), 'array') !== false);
    }
    /**
     * Returns the attributes of the struct and potentially from the parent class
     * @uses AbstractModel::getInheritance()
     * @uses Struct::getIsStruct()
     * @uses Struct::getAttributes()
     * @param bool $includeInheritanceAttributes include the attributes of parent class, default parent attributes are not included. If true, then the array is an associative array containing and index "attribute" for the StructAttribute object and an index "model" for the Struct object.
     * @param bool $requiredFirst places the required attributes first, then the not required in order to have the _contrust method with the required attribute at first
     * @return StructAttributeContainer
     */
    public function getAttributes($includeInheritanceAttributes = false, $requiredFirst = false)
    {
        if ($includeInheritanceAttributes === false && $requiredFirst === false) {
            $attributes = $this->attributes;
        } else {
            $attributes = $this->getAllAttributes($includeInheritanceAttributes, $requiredFirst);
        }
        return $attributes;
    }
    /**
     * @param bool $includeInheritanceAttributes
     * @param bool $requiredFirst
     * @return StructAttributeContainer
     */
    protected function getAllAttributes($includeInheritanceAttributes, $requiredFirst)
    {
        $allAttributes = new StructAttributeContainer($this->getGenerator());
        if ($includeInheritanceAttributes === true) {
            $this->addInheritanceAttributes($allAttributes);
        }
        foreach ($this->attributes as $attribute) {
            $allAttributes->add($attribute);
        }
        if ($requiredFirst === true) {
            $attributes = $this->putRequiredFirst($allAttributes);
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
            while ($model->getIsStruct()) {
                foreach ($model->getAttributes() as $attribute) {
                    $attributes->add($attribute);
                }
                $model = $this->getGenerator()->getStruct($model->getInheritance());
            }
        }
    }
    /**
     * @param StructAttributeContainer $allAttributes
     * @return StructAttributeContainer
     */
    protected function putRequiredFirst(StructAttributeContainer $allAttributes)
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
        return $this->getAttributes(false, false)->count();
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
     * Returns the isRestriction value
     * @return bool
     */
    public function getIsRestriction()
    {
        return $this->isRestriction;
    }
    /**
     * Sets the isRestriction value
     * @param bool $isRestriction
     * @return Struct
     */
    public function setIsRestriction($isRestriction = true)
    {
        $this->isRestriction = $isRestriction;
        return $this;
    }
    /**
     * Returns the isStruct value
     * @return bool
     */
    public function getIsStruct()
    {
        return $this->isStruct;
    }
    /**
     * Sets the isStruct value
     * @param bool $isStruct
     * @return Struct
     */
    public function setIsStruct($isStruct = true)
    {
        $this->isStruct = $isStruct;
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
    private function setValues(StructValueContainer $structValueContainer)
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
            $this->values->add(new StructValue($this->getGenerator(), $value, $this->getValues()->count(), $this));
            $this->setIsRestriction(true);
            $this->setIsStruct(true);
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
     * Allows to define from which class the curent model extends
     * @param bool $short
     * @return string
     */
    public function getExtends($short = false)
    {
        $extends = '';
        if ($this->isArray()) {
            $extends = $this->getGenerator()->getOptionStructArrayClass();
        } elseif (!$this->getIsRestriction()) {
            $extends = $this->getGenerator()->getOptionStructClass();
        }
        return $short ? Utils::removeNamespace($extends) : $extends;
    }
    /**
     * @return Struct|null
     */
    public function getInheritanceStruct()
    {
        return $this->getGenerator()->getStruct($this->getInheritance());
    }
    /**
     * @return Struct|null
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
     * @see \WsdlToPhp\PackageGenerator\Model\AbstractModel::getMeta()
     * @return string[]
     */
    public function getMeta()
    {
        $inheritanceStruct = $this->getInheritanceStruct();
        return array_merge_recursive(parent::getMeta(), ($inheritanceStruct && !$inheritanceStruct->getIsStruct()) ? $inheritanceStruct->getMeta() : array());
    }
}
