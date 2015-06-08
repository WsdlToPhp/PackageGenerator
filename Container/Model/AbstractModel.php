<?php

namespace WsdlToPhp\PackageGenerator\Container\Model;

use WsdlToPhp\PackageGenerator\Container\AbstractObjectContainer;
use WsdlToPhp\PackageGenerator\Model\AbstractModel as Model;

abstract class AbstractModel extends AbstractObjectContainer
{
    const
        KEY_NAME  = 'name',
        KEY_VALUE = 'value';
    /**
     * @return Model
     */
    public function get($value, $key = self::KEY_NAME)
    {
        return parent::get($value, $key);
    }
    /**
     * Override this method to store object in cache using its name
     * as most of the time objects are looked up using their name.
     * @see \WsdlToPhp\PackageGenerator\Container\AbstractObjectContainer::afterObjetIsStored()
     * @param mixed $object
     */
    protected function afterObjetIsStored($object)
    {
        if ($object instanceof Model) {
            $this->setSimpleCache(self::KEY_NAME, $object->getName(), $object);
        }
    }
}
