<?php

namespace WsdlToPhp\PackageGenerator\Container\Model;

use WsdlToPhp\PackageGenerator\Model\Method as Model;

class Method extends AbstractModel
{
    const KEY_PARAMETER_TYPE = 'parameterType';
    /**
     * @see \WsdlToPhp\PackageGenerator\Container\ModelContainer\Model::objectClass()
     * @return string
     */
    protected function objectClass()
    {
        return 'WsdlToPhp\\PackageGenerator\\Model\\Method';
    }
    /**
     * @param string $name
     * @return Model|null
     */
    public function getMethodByName($name)
    {
        return $this->get($name, parent::KEY_NAME);
    }
    /**
     * @param string $name
     * @param mixed $parameterType
     * @return boolean
     */
    public function hasMethod($name, $parameterType)
    {
        return null !== $this->getAs(array(
            parent::KEY_NAME         => $name,
            self::KEY_PARAMETER_TYPE => $parameterType,
        ));
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
     * @return Model|null
     */
    public function getAs(array $properties)
    {
        return parent::getAs($properties);
    }
}
