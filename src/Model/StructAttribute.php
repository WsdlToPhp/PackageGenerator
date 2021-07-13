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
    protected $type = '';
    /**
     * Defines that this property is not a simple value but an array of values
     * Infos at {@link https://www.w3.org/TR/xmlschema-0/#OccurrenceConstraints}
     * @var bool
     */
    protected $containsElements = false;
    /**
     * Defines that this property can be removed from request or not.
     * The property can be removed from the request (meaning from the Struct) as soon as the nillable=true && minOccurs=0
     * Infos at {@link http://www.w3schools.com/xml/el_element.asp}
     * @var bool
     */
    protected $removableFromRequest = false;
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
    public function __construct(Generator $generator, $name, $type = '', Struct $struct = null)
    {
        parent::__construct($generator, $name);
        $this->setType($type)->setOwner($struct);
    }
    /**
     * Returns the unique name in the current struct (for setters/getters and struct constructor array)
     * @uses AbstractModel::getCleanName()
     * @uses AbstractModel::getName()
     * @uses AbstractModel::uniqueName()
     * @uses StructAttribute::getOwner()
     * @param string $string
     * @param string $additionalContext
     * @return string
     */
    public function getUniqueString($string, $additionalContext = '')
    {
        return self::uniqueName($string, spl_object_hash($this->getOwner()) . $this->getOwner()->getName() . $additionalContext);
    }
    /**
     * Returns the unique name in the current struct (for setters/getters and struct constructor array)
     * @uses AbstractModel::getCleanName()
     * @uses AbstractModel::getName()
     * @uses AbstractModel::uniqueName()
     * @uses StructAttribute::getOwner()
     * @param string $additionalContext
     * @return string
     */
    public function getUniqueName($additionalContext = '')
    {
        return $this->getUniqueString($this->getCleanName(), $additionalContext);
    }
    /**
     * Returns the getter name for this attribute
     * @uses StructAttribute::getUniqueName()
     * @return string
     */
    public function getGetterName()
    {
        return $this->replaceReservedMethod(sprintf('get%s', ucfirst($this->getUniqueName('get'))), $this->getOwner()->getPackagedName());
    }
    /**
     * Returns the getter name for this attribute
     * @uses StructAttribute::getUniqueName()
     * @return string
     */
    public function getSetterName()
    {
        return $this->replaceReservedMethod(sprintf('set%s', ucfirst($this->getUniqueName('set'))), $this->getOwner()->getPackagedName());
    }
    /**
     * Returns the type value
     * @return string
     */
    public function getType($useTypeStruct = false)
    {
        if ($useTypeStruct) {
            $typeStruct = $this->getTypeStruct();
            if ($typeStruct instanceof Struct) {
                $type = $typeStruct->getTopInheritance();
                return $type ? $type : $this->type;
            }
        }
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
     * If already able to contain several occurrences, it must stay as it is, the wider behaviour wins
     * @param bool $containsElements
     * @return StructAttribute
     */
    public function setContainsElements($containsElements)
    {
        $this->containsElements = $this->containsElements || $containsElements;
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
     * @return bool
     */
    public function isAChoice()
    {
        return is_array($this->getMetaValue('choice'));
    }
    /**
     * If already able to be removed from request, it must stay as it is, the wider behaviour wins
     * @param bool $removableFromRequest
     * @return StructAttribute
     */
    public function setRemovableFromRequest($removableFromRequest)
    {
        $this->removableFromRequest = $this->removableFromRequest || $removableFromRequest;
        return $this;
    }
    /**
     * If this attribute contains elements then it's an array
     * only if its parent, the Struct, is not itself an array,
     * if the parent is an array, then it is certainly an array too
     * @return bool
     */
    public function isArray()
    {
        return $this->containsElements || $this->isTypeStructArray();
    }
    /**
     * If this attribute is based on a struct that is a list,
     * then it is list of basic scalar values that are sent space-separated
     * @return bool
     */
    public function isList()
    {
        $typeStruct = $this->getTypeStruct();
        return $typeStruct && $typeStruct->isList();
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
        if ($this->isArray() || $this->isList()) {
            return [];
        }

        if (($struct = $this->getTypeStruct()) && $struct->isStruct()) {
            return null;
        }

        return Utils::getValueWithinItsType($this->getMetaValueFirstSet([
            'default',
            'Default',
            'DefaultValue',
            'defaultValue',
            'defaultvalue',
        ]), $this->getType(true));
    }
    /**
     * Returns true or false depending on minOccurs information associated to the attribute
     * @uses AbstractModel::getMetaValueFirstSet()
     * @uses AbstractModel::getMetaValue()
     * @return bool true|false
     */
    public function isRequired()
    {
        return ($this->getMetaValue('use', '') === 'required' || $this->getMetaValueFirstSet([
            'minOccurs',
            'minoccurs',
            'MinOccurs',
            'Minoccurs',
        ], false));
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
        return mb_stripos($this->getType(), '\DOM') === 0;
    }
    /**
     * @return Struct|null
     */
    public function getTypeStruct()
    {
        $struct = $this->getGenerator()->getStructByNameAndType($this->getType(), $this->getInheritance());
        return $struct ? $struct : $this->getGenerator()->getStructByName($this->getType());
    }
    /**
     * @return string[]
     */
    public function getTypeStructMeta()
    {
        $typeStruct = $this->getTypeStruct();
        return ($typeStruct && !$typeStruct->isStruct()) ? $typeStruct->getMeta() : [];
    }
    /**
     * @return bool
     */
    public function isTypeStructArray()
    {
        $typeStruct = $this->getTypeStruct();
        return $typeStruct && $typeStruct->isArray() && !$typeStruct->isStruct();
    }
    /**
     * @return Struct|null
     */
    public function getInheritanceStruct()
    {
        return $this->getGenerator()->getStructByName($this->getInheritance());
    }
    /**
     * @return string[]
     */
    public function getInheritanceStructMeta()
    {
        $inheritanceStruct = $this->getInheritanceStruct();
        return ($inheritanceStruct && !$inheritanceStruct->isStruct()) ? $inheritanceStruct->getMeta() : [];
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\Model\AbstractModel::getMeta()
     * @return string[]
     */
    public function getMeta()
    {
        return $this->mergeMeta($this->getInheritanceStructMeta(), $this->getTypeStructMeta(), parent::getMeta());
    }
    /**
     * @param $filename
     * @return StructReservedMethod|StructArrayReservedMethod
     */
    public function getReservedMethodsInstance($filename = null)
    {
        return $this->getOwner()->getReservedMethodsInstance($filename);
    }
    /**
     * {@inheritDoc}
     * @see \WsdlToPhp\PackageGenerator\Model\AbstractModel::toJsonSerialize()
     */
    protected function toJsonSerialize()
    {
        return [
            'containsElements' => $this->containsElements,
            'removableFromRequest' => $this->removableFromRequest,
            'type' => $this->type,
        ];
    }
}
