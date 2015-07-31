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
    public function testOffsetSetWithException()
    {
        $container = new ObjectContainerTest();
        $container->offsetSet(1, new ObjectTest());
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidPropertyName()
    {
        $container = new FalseObjectContainerTest();
        $container->add(new FalseObjectTest());
    }
}
