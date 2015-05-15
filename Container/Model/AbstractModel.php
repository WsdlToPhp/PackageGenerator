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
}
