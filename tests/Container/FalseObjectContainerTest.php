<?php

namespace WsdlToPhp\PackageGenerator\Tests\Container;

use WsdlToPhp\PackageGenerator\Container\AbstractObjectContainer;

class FalseObjectContainerTest extends AbstractObjectContainer
{
    protected function objectProperty()
    {
        return 'foo';
    }
    protected function objectClass()
    {
        return 'WsdlToPhp\PackageGenerator\Tests\Container\FalseObjectTest';
    }
}
