<?php

namespace WsdlToPhp\PackageGenerator\Model;

use WsdlToPhp\PackageGenerator\Generator\Utils;
use WsdlToPhp\PackageGenerator\Generator\Generator;

/**
 * Class StructAttribute stands for an available struct attribute described in the WSDL
 */
class StructAttribute extends AbstractModel
{
    /**
     * Type of the struct attribute
     * @var string
     */
    private $type = '';
    /**
     * Defines that this property is not a simple value but an array of values
     * Infos at {@link https://www.w3.org/TR/xmlschema-0/#OccurrenceConstraints}
     * @var string
     */
    private $containsElements = false;
    /**
     * Main constructor
     * @see AbstractModel::__construct()
     * @uses StructAttribute::setType()
     * @uses AbstractModel::setOwner()
     * @param Generator $generator
     * @param string $name the original name
     * @param string $type the type
     * @param Struct $struct defines the struct which owns this value
     */
    public function __construct(Generator $generator, $name, $type, Struct $struct)
    {
        parent::__construct($generator, $name);
        $this->setType($type);
        $this->setOwner($struct);
    }
    /**
     * Returns the unique name in the current struct (for setters/getters and struct contrusctor array)
     * @uses AbstractModel::getCleanName()
     * @uses AbstractModel::getName()
     * @uses AbstractModel::uniqueName()
     * @uses StructAttribute::getOwner()
     * @return string
     */
    public function getUniqueName()
    {
        return self::uniqueName($this->getCleanName(), $this->getOwner()->getName());
    }
    /**
     * Returns the getter name for this attribute
     * @uses StructAttribute::getUniqueName()
     * @return string
     */
    public function getGetterName()
    {
        return sprintf('get%s', ucfirst(self::getUniqueName()));
    }
    /**
     * Returns the getter name for this attribute
     * @uses StructAttribute::getUniqueName()
     * @return string
     */
    public function getSetterName()
    {
        return sprintf('set%s', ucfirst(self::getUniqueName()));
    }
    /**
     * Returns the type value
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * Sets the type value
     * @param string $type
     * @return StructAttribute
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }
    /**
     * Returns the type value
     * @return string
     */
    public function getContainsElements()
    {
        return $this->containsElements;
    }
    /**
     * Sets the type value
     * @param bool $containsElements
     * @return StructAttribute
     */
    public function setContainsElements($containsElements)
    {
        $this->containsElements = $containsElements;
        return $this;
    }
    /**
     * If this attribute contains elements then it's an array
     * only if its parent, the Struct, is not itself an array,
     * if the parent is an array, then it is certainly not an array too
     * @return bool
     */
    public function isArray()
    {
        return $this->containsElements && !$this->getOwner()->isArray();
    }
    /**
     * Returns potential default value
     * @uses AbstractModel::getMetaValueFirstSet()
     * @uses Utils::getValueWithinItsType()
     * @uses StructAttribute::getType()
     * @uses StructAttribute::getContainsElements()
     * @return mixed
     */
    public function getDefaultValue()
    {
        if ($this->isArray()) {
            return array();
        }
        return Utils::getValueWithinItsType($this->getMetaValueFirstSet(array(
            'default',
            'Default',
            'DefaultValue',
            'defaultValue',
            'defaultvalue',
        )), $this->getType());
    }
    /**
     * Returns true or false depending on minOccurs information associated to the attribute
     * @uses AbstractModel::getMetaValueFirstSet()
     * @uses AbstractModel::getMetaValue()
     * @return bool true|false
     */
    public function isRequired()
    {
        return ($this->getMetaValue('use', '') === 'required' || $this->getMetaValueFirstSet(array(
            'minOccurs',
            'minoccurs',
            'MinOccurs',
            'Minoccurs',
        ), false));
    }
    /**
     * Returns the owner model object, meaning a Struct object
     * @see AbstractModel::getOwner()
     * @uses AbstractModel::getOwner()
     * @return Struct
     */
    public function getOwner()
    {
        return parent::getOwner();
    }
    /**
     * @uses StructAttribute::getType()
     * @return bool
     */
    public function isXml()
    {
        return stripos($this->getType(), '\DOM') === 0;
    }
}
