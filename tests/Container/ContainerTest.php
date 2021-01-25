<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Container;

use InvalidArgumentException;
use WsdlToPhp\PackageGenerator\Tests\AbstractTestCase;

/**
 * @internal
 * @coversDefaultClass
 */
final class ContainerTest extends AbstractTestCase
{
    public function testAddWithException()
    {
        $this->expectException(InvalidArgumentException::class);

        $container = new ObjectContainerTest(self::getBingGeneratorInstance());
        $container->add(new FalseObjectTest());
    }

    public function testOffsetSetWithException()
    {
        $this->expectException(InvalidArgumentException::class);

        $container = new ObjectContainerTest(self::getBingGeneratorInstance());
        $container->offsetSet(1, new FalseObjectTest());
    }

    public function testInvalidPropertyName()
    {
        $this->expectException(InvalidArgumentException::class);

        $container = new FalseObjectContainerTest(self::getBingGeneratorInstance());
        $container->add(new FalseObjectTest());
    }

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
