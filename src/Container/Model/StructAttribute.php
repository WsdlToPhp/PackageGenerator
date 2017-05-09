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
        return 'WsdlToPhp\PackageGenerator\Model\StructAttribute';
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
     * @param string $cleanedName
     * @return Model|null
     */
    public function getStructAttributeByCleanName($cleanedName)
    {
        return $this->getByCleanName($cleanedName);
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
     * @param string $cleanedName
     * @return Model
     */
    public function getByCleanName($cleanedName)
    {
        $attribute = null;
        foreach ($this->objects as $object) {
            if ($object instanceof Model && $cleanedName === $object->getCleanName()) {
                $attribute = $object;
                break;
            }
        }
        return $attribute;
    }
}
