<?php

namespace WsdlToPhp\PackageGenerator\Container\Model;

use WsdlToPhp\PackageGenerator\Model\Method as Model;

class Method extends AbstractModel
{
    const KEY_PARAMETER_TYPE = 'parameterType';
    /**
     * @see \WsdlToPhp\PackageGenerator\Container\Model\Model::objectClass()
     * @return string
     */
    protected function objectClass()
    {
        return 'WsdlToPhp\PackageGenerator\Model\Method';
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\Container\Model\AbstractModel::objectProperty()
     */
    protected function objectProperty()
    {
        return 'methodName';
    }
    /**
     * @param string $name
     * @return Model|null
     */
    public function getMethodByName($name)
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
        foreach ($this->objects as $object) {
            if ($object instanceof Model && $object->getName() === $value) {
                return $object;
            }
        }
        return null;
    }
}
