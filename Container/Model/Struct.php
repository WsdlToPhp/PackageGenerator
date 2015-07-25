<?php

namespace WsdlToPhp\PackageGenerator\Container\Model;

use WsdlToPhp\PackageGenerator\Generator\Generator;
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
        return $this->get($name);
    }
    /**
     * Adds a virtual struct
     * @param Generator $generator
     * @param string $structName the original struct name
     * @return Struct
     */
    public function addVirtualStruct(Generator $generator, $structName)
    {
        if ($this->get($structName) === null) {
            $this->add(new Model($generator, $structName, false));
        }
        return $this;
    }
    /**
     * Adds type to structs
     * @param Generator $generator
     * @param string $structName the original struct name
     * @return Struct
     */
    public function addStruct(Generator $generator, $structName)
    {
        if ($this->get($structName) === null) {
            $this->add(new Model($generator, $structName));
        }
        return $this;
    }
    /**
     * Adds type to structs and its attribute
     * @param Generator $generator
     * @param string $structName the original struct name
     * @param string $attributeName the attribute name
     * @param string $attributeType the attribute type
     * @return Struct
     */
    public function addStructWithAttribute(Generator $generator, $structName, $attributeName, $attributeType)
    {
        $this->addStruct($generator, $structName);
        if (($struct = $this->getStructByName($structName)) instanceof Model) {
            $struct->addAttribute($attributeName, $attributeType);
        }
        return $this;
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\Model\AbstractModel::get()
     * @return Model|null
     */
    public function get($value)
    {
        return parent::get($value);
    }
}
