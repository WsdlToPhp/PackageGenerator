<?php

namespace WsdlToPhp\PackageGenerator\Container\Model;

use WsdlToPhp\PackageGenerator\Model\Struct as Model;

class Struct extends AbstractModel
{
    /**
     * @see \WsdlToPhp\PackageGenerator\Container\Model\Model::objectClass()
     * @return string
     */
    protected function objectClass()
    {
        return 'WsdlToPhp\PackageGenerator\Model\Struct';
    }
    /**
     * @param string $name
     * @return Model|null
     */
    public function getStructByName($name)
    {
        return $this->get($name);
    }
    /**
     * @param string $name
     * @param string $type
     * @return Model|null
     */
    public function getStructByNameAndType($name, $type)
    {
        return $this->getByType($name, $type);
    }
    /**
     * Adds a virtual struct
     * @param string $structName the original struct name
     * @return Struct
     */
    public function addVirtualStruct($structName)
    {
        return $this->addStruct($structName, false);
    }
    /**
     * Adds type to structs
     * @param string $structName the original struct name
     * @param bool $isStruct whether the Struct has to be generated or not
     * @return Struct
     */
    public function addStruct($structName, $isStruct = true)
    {
        if ($this->get($structName) === null) {
            $this->add(new Model($this->generator, $structName, $isStruct));
        }
        return $this;
    }
    /**
     * Adds type to structs and its attribute
     * @param string $structName the original struct name
     * @param string $attributeName the attribute name
     * @param string $attributeType the attribute type
     * @return Struct
     */
    public function addStructWithAttribute($structName, $attributeName, $attributeType)
    {
        $this->addStruct($structName);
        if (($struct = $this->getStructByName($structName)) instanceof Model) {
            $struct->addAttribute($attributeName, $attributeType);
        }
        return $this;
    }
    /**
     * Adds a union struct
     * @param string $structName
     * @param string[] $types
     * @return Struct
     */
    public function addUnionStruct($structName, $types)
    {
        $this->addVirtualStruct($structName);
        if (($struct = $this->getStructByName($structName)) instanceof Model) {
            $struct->setTypes($types);
        }
        return $this;
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\Model\AbstractModel::get()
     * @param string $value
     * @return Model|null
     */
    public function get($value)
    {
        return parent::get($value);
    }
    /**
     * @see parent::get()
     * @param string $value
     * @param string $type
     * @return mixed
     */
    public function getByType($value, $type)
    {
        if (!is_string($value) && !is_int($value)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" can\'t be used to get an object from "%s"', var_export($value, true), get_class($this)), __LINE__);
        }
        if (!is_scalar($type)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" can\'t be used to get an object', var_export($type, true)), __LINE__);
        }
        $key = $this->getTypeKey($value, $type);
        return array_key_exists($key, $this->objects) ? $this->objects[$key] : null;
    }
    /**
     * @param $object
     * @param $type
     * @return string
     */
    public function getObjectWithTypeKey($object, $type)
    {
        return $this->getTypeKey($this->getObjectKey($object), $type);
    }
    /**
     * The key must not conflict with possible key values
     * @param $name
     * @param $type
     * @return string
     */
    public function getTypeKey($name, $type)
    {
        return sprintf('struct_name_%s-type_%s', $name, $type);
    }
    /**
     * By overriding this method, we ensure that each time a new object is stored as usual, it is also stored with our new key.
     * Nonetheless, it is stored only if its type is known.
     * @param Model $object
     * @return Struct
     */
    public function add($object)
    {
        parent::add($object);
        $inheritance = $object->getInheritance();
        if (!empty($inheritance)) {
            $this->objects[$this->getObjectWithTypeKey($object, $object->getInheritance())] = $object;
        }
        return $this;
    }
}
