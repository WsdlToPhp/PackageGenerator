<?php

namespace WsdlToPhp\PackageGenerator\Container\Model;

use WsdlToPhp\PackageGenerator\Model\Struct as Model;

class Struct extends AbstractModel
{
    /**
     * @see \WsdlToPhp\PackageGenerator\Container\ModelContainer\Model::objectClass()
     * @return string
     */
    protected function objectClass()
    {
        return 'WsdlToPhp\\PackageGenerator\\Model\\Struct';
    }
    /**
     * @param string $name
     * @return Model|null
     */
    public function getStructByName($name)
    {
        return $this->get($name, parent::KEY_NAME);
    }
    /**
     * Adds a virtual struct
     * @param string $structName the original struct name
     * @return Struct
     */
    public function addVirtualStruct($structName)
    {
        if ($this->get($structName) === null) {
            $this->add(new Model($structName, false));
        }
        return $this;
    }
    /**
     * Adds type to structs
     * @param string $structName the original struct name
     * @return Struct
     */
    public function addStruct($structName)
    {
        if ($this->get($structName) === null) {
            $this->add(new Model($structName));
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
     * @see \WsdlToPhp\PackageGenerator\Model\AbstractModel::get()
     * @return Model|null
     */
    public function get($value, $key = parent::KEY_NAME)
    {
        return parent::get($value, $key);
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\Model\AbstractModel::getAs()
     * @return Struct|null
     */
    public function getAs(array $properties)
    {
        return parent::getAs($properties);
    }
}
