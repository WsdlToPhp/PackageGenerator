<?php

namespace WsdlToPhp\PackageGenerator\Container\Model;

use WsdlToPhp\PackageGenerator\Container\AbstractObjectContainer;

abstract class AbstractModel extends AbstractObjectContainer
{
    /**
     * @see \WsdlToPhp\PackageGenerator\Container\AbstractObjectContainer::objectProperty()
     * @return string
     */
    protected function objectProperty()
    {
        return self::PROPERTY_NAME;
    }
}
