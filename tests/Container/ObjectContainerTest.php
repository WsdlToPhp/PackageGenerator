<?php

namespace WsdlToPhp\PackageGenerator\Tests\Container;

use WsdlToPhp\PackageGenerator\Container\AbstractObjectContainer;

class ObjectContainerTest extends AbstractObjectContainer
{
    protected function objectProperty()
    {
        return self::PROPERTY_NAME;
    }
    protected function objectClass()
    {
        return 'WsdlToPhp\PackageGenerator\Tests\Container\ObjectTest';
    }
}
