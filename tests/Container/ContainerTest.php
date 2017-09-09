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
        $container->add(new FalseObjectTest());
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testOffsetSetWithException()
    {
        $container = new ObjectContainerTest(self::getBingGeneratorInstance());
        $container->offsetSet(1, new FalseObjectTest());
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidPropertyName()
    {
        $container = new FalseObjectContainerTest(self::getBingGeneratorInstance());
        $container->add(new FalseObjectTest());
    }
    /**
     *
     */
    public function testJsonSerialize()
    {
        $object = new ObjectTest();
        $container = new ObjectContainerTest(self::getBingGeneratorInstance());
        $container->add($object);
        $this->assertSame([
            $object,
        ], $container->jsonSerialize());
    }
}
