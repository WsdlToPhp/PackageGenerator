<?php

namespace WsdlToPhp\PackageGenerator\Container\PhpElement;

use WsdlToPhp\PackageGenerator\Container\AbstractObjectContainer;

abstract class AbstractPhpElement extends AbstractObjectContainer
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
