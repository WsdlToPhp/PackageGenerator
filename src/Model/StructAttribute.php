<?php

namespace WsdlToPhp\PackageGenerator\Model;

use WsdlToPhp\PackageGenerator\Generator\Utils;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\ConfigurationReader\StructReservedMethod;
use WsdlToPhp\PackageGenerator\ConfigurationReader\StructArrayReservedMethod;

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
     * @var bool
     */
    private $containsElements = false;
    /**
     * Defines that this property can be removed from request or not.
     * The property cna be removed from the request (meaning from the Struct) as soon as the nillable=true && minOccurs=0
     * Infos at {@link http://www.w3schools.com/xml/el_element.asp}
     * @var bool
     */
    private $removableFromRequest = false;
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
        $this->setType($type)->setOwner($struct);
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
        return $this->replaceReservedMethod(sprintf('get%s', ucfirst(self::getUniqueName())), $this->getOwner()->getPackagedName());
    }
    /**
     * Returns the getter name for this attribute
     * @uses StructAttribute::getUniqueName()
     * @return string
     */
    public function getSetterName()
    {
        return $this->replaceReservedMethod(sprintf('set%s', ucfirst(self::getUniqueName())), $this->getOwner()->getPackagedName());
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
     * @return bool
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
     * @return bool
     */
    public function getRemovableFromRequest()
    {
        return $this->removableFromRequest;
    }
    /**
     * @param bool $removableFromRequest
     * @return StructAttribute
     */
    public function setRemovableFromRequest($removableFromRequest)
    {
        $this->removableFromRequest = $removableFromRequest;
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
        return $this->containsElements || $this->isTypeStructArray();
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
    /**
     * @return Struct|null
     */
    public function getTypeStruct()
    {
        return $this->getGenerator()->getStruct($this->getType());
    }
    /**
     * @return string[]
     */
    public function getTypeStructMeta()
    {
        $typeStruct = $this->getTypeStruct();
        return ($typeStruct && !$typeStruct->getIsStruct()) ? $typeStruct->getMeta() : array();
    }
    /**
     * @return bool
     */
    public function isTypeStructArray()
    {
        $typeStruct = $this->getTypeStruct();
        return $typeStruct && $typeStruct->isArray() && !$typeStruct->getIsStruct();
    }
    /**
     * @return Struct|null
     */
    public function getInheritanceStruct()
    {
        return $this->getGenerator()->getStruct($this->getInheritance());
    }
    /**
     * @return string[]
     */
    public function getInheritanceStructMeta()
    {
        $inheritanceStruct = $this->getInheritanceStruct();
        return ($inheritanceStruct && !$inheritanceStruct->getIsStruct()) ? $inheritanceStruct->getMeta() : array();
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\Model\AbstractModel::getMeta()
     * @return string[]
     */
    public function getMeta()
    {
        return array_merge_recursive(parent::getMeta(), $this->getTypeStructMeta(), $this->getInheritanceStructMeta());
    }
    /**
     * @param $filename
     * @return StructReservedMethod|StructArrayReservedMethod
     */
    public function getReservedMethodsInstance($filename = null)
    {
        return $this->getOwner()->getReservedMethodsInstance($filename);
    }
}
