<?php

namespace WsdlToPhp\PackageGenerator\Tests\Container;

use WsdlToPhp\PackageGenerator\Tests\TestCase;

class ContainerTest extends TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testAddWithException()
    {
        $container = new ObjectContainerTest();
        $container->add(new ObjectTest());
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testoffsetSetWithException()
    {
        $container = new ObjectContainerTest();
        $container->offsetSet(1, new ObjectTest());
    }
}
