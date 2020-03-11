<?php

namespace WsdlToPhp\PackageGenerator\Container\Model;

use WsdlToPhp\PackageGenerator\Model\Struct as Model;

class Struct extends AbstractModel
{
    /**
     * Only for virtually-considered objects (in order to avoid duplications in objects property)
     * @var array $virtualObjects
     */
    protected $virtualObjects = [];
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
     * @param string $structType the original struct type
     * @return Struct
     */
    public function addVirtualStruct($structName, $structType = '')
    {
        return $this->addStruct($structName, false, $structType);
    }
    /**
     * Adds type to structs
     * @param string $structName the original struct name
     * @param bool $isStruct whether the Struct has to be generated or not
     * @param string $structType the original struct type
     * @return Struct
     */
    public function addStruct($structName, $isStruct = true, $structType = '')
    {
        if (null === (empty($structType) ? $this->get($structName) : $this->getByType($structName, $structType))) {
            $model = new Model($this->generator, $structName, $isStruct);
            $this->add($model->setInheritance($structType));
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
     * @throws \InvalidArgumentException
     * @param string $value
     * @return mixed
     */
    public function getVirtual($value)
    {
        if (!is_scalar($value)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" can\'t be used to get an object from "%s"', is_object($value) ? get_class($value) : var_export($value, true), __CLASS__), __LINE__);
        }
        $key = $this->getVirtualKey($value);
        return array_key_exists($key, $this->virtualObjects) ? $this->virtualObjects[$key] : null;
    }
    /**
     * @see parent::get()
     * @throws \InvalidArgumentException
     * @param string $value
     * @param string $type
     * @return mixed
     */
    public function getByType($value, $type)
    {
        if (!is_scalar($value)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" can\'t be used to get an object from "%s"', is_object($value) ? get_class($value) : var_export($value, true), __CLASS__), __LINE__);
        }
        if (!is_scalar($type)) {
            throw new \InvalidArgumentException(sprintf('Type "%s" can\'t be used to get an object from "%s"', is_object($value) ? get_class($value) : var_export($type, true), __CLASS__), __LINE__);
        }
        $key = $this->getTypeKey($value, $type);
        return array_key_exists($key, $this->objects) ? $this->objects[$key] : null;
    }
    /**
     * @param $object
     * @param $type
     * @return string
     */
    public function getObjectKeyWithType($object, $type)
    {
        return $this->getTypeKey($this->getObjectKey($object), $type);
    }
    /**
     * @param $object
     * @return string
     */
    public function getObjectKeyWithVirtual($object)
    {
        return $this->getVirtualKey($this->getObjectKey($object));
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
     * The key must not conflict with possible key values
     * @param $type
     * @return string
     */
    public function getVirtualKey($name)
    {
        return sprintf('virtual_struct_name_%s', $name);
    }
    /**
     * By overriding this method, we ensure that each time a new object is stored, it is stored with our new key if the inheritance is defined.
     * @param Model $object
     * @return Struct
     */
    public function add($object)
    {
        $inheritance = $object->getInheritance();
        if (!empty($inheritance)) {
            $this->virtualObjects[$this->getObjectKeyWithVirtual($object)] = $this->objects[$this->getObjectKeyWithType($object, $object->getInheritance())] = $object;
        } else {
            parent::add($object);
        }
        return $this;
    }
}
