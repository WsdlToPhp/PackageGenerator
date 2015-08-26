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
        $container = new ObjectContainerTest(self::getBingGeneratorInstance());
        $container->add(new ObjectTest());
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testOffsetSetWithException()
    {
        $container = new ObjectContainerTest(self::getBingGeneratorInstance());
        $container->offsetSet(1, new ObjectTest());
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidPropertyName()
    {
        $container = new FalseObjectContainerTest(self::getBingGeneratorInstance());
        $container->add(new FalseObjectTest());
    }
}
