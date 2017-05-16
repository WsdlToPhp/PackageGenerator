<?php

namespace WsdlToPhp\PackageGenerator\Container\Model;

use WsdlToPhp\PackageGenerator\Generator\Generator;
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
}
