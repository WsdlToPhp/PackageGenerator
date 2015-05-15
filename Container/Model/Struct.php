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
     * @return Model
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
     * @param string $attributeName the attribute name
     * @param string $attributeType the attribute type
     * @return Model
     */
    public function addStruct($structName, $attributeName, $attributeType)
    {
        if ($this->get($structName) === null) {
            $this->add(new Model($structName));
        }
        if (!empty($attributeName) && !empty($attributeType) && $this->get($structName) instanceof Model) {
            $this->get($structName)->addAttribute($attributeName, $attributeType);
        }
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
