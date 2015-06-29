<?php

namespace WsdlToPhp\PackageGenerator\Container\PhpElement;

use WsdlToPhp\PackageGenerator\Container\AbstractObjectContainer;
use WsdlToPhp\PhpGenerator\Element\AbstractElement as PhpElement;

abstract class AbstractPhpElement extends AbstractObjectContainer
{
    const
        KEY_NAME  = 'name',
        KEY_VALUE = 'value';
    /**
     * @return PhpElement
     */
    public function get($value, $key = self::KEY_NAME)
    {
        return parent::get($value, $key);
    }
}
