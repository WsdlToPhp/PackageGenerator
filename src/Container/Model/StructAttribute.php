<?php

namespace WsdlToPhp\PackageGenerator\Container\Model;

use WsdlToPhp\PackageGenerator\Model\StructAttribute as Model;

class StructAttribute extends AbstractModel
{
    /**
     * @see \WsdlToPhp\PackageGenerator\Container\Model\Model::objectClass()
     * @return string
     */
    protected function objectClass()
    {
        return 'WsdlToPhp\\PackageGenerator\\Model\\StructAttribute';
    }
    /**
     * @param string $name
     * @return Model|null
     */
    public function getStructAttributeByName($name)
    {
        return $this->get($name);
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
