<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Container\Model;

use WsdlToPhp\PackageGenerator\Container\Model\Struct as StructContainer;
use WsdlToPhp\PackageGenerator\Model\Struct as StructModel;
use WsdlToPhp\PackageGenerator\Tests\AbstractTestCase;
use WsdlToPhp\PackageGenerator\Tests\Model\StructTest;

/**
 * @internal
 * @coversDefaultClass
 */
final class StructContainerTest extends AbstractTestCase
{
    public static function instance(): StructContainer
    {
        $structContainer = new StructContainer(self::getBingGeneratorInstance());
        $structContainer->add(StructTest::instance('Foo', true));
        $structContainer->add(StructTest::instance('Bar', false));

        return $structContainer;
    }

    public function testGetStructByName(): void
    {
        $structContainer = self::instance();

        $this->assertInstanceOf(StructModel::class, $structContainer->getStructByName('Foo'));
        $this->assertInstanceOf(StructModel::class, $structContainer->getStructByName('Bar'));
        $this->assertNull($structContainer->getStructByName('bar'));
    }

    public function testAddStructWithSameAttributeName(): void
    {
        $structContainer = self::instance();

        $structContainer->addStructWithAttribute('Foo', 'bar', 'string');
        $structContainer->addStructWithAttribute('Foo', 'bar', 'int');

        $this->assertCount(1, $structContainer->getStructByName('Foo')->getAttributes());
    }

    public function testOffsetUnset(): void
    {
        $instance = self::instance();

        $instance->addStructWithAttribute('Foo', 'bar', 'string');
        $instance->addStructWithAttribute('Foo', 'bar', 'int');

        $instance->offsetUnset(1);

        $this->assertNull($instance->offsetGet(1));
    }

    public function testGetStructByNameAndTypeMustFailAsTypeIsUnknown(): void
    {
        $structContainer = self::instance();

        $this->assertNull($structContainer->getStructByNameAndType('bar', 'string'));
    }

    public function testGetStructByNameAndTypeMustReturnTheStruct(): void
    {
        $structContainer = self::instance();
        $structContainer->add($fooStringFirst = StructTest::instance('FooString', true)->setInheritance('string')->setMeta($fooStringFirstMeta = [
            'meta1' => 'value1',
        ]));
        $structContainer->add($fooStringSecond = StructTest::instance('FooString', true)->setInheritance('int')->setMeta($fooStringSecondMeta = [
            'meta2' => 'value2',
        ]));

        $this->assertSame($fooStringSecond, $structContainer->getVirtual('FooString'));
        $this->assertSame($fooStringSecond, $structContainer->getStructByNameAndType('FooString', 'int'));
        $this->assertSame($fooStringFirst, $structContainer->getStructByNameAndType('FooString', 'string'));
        $this->assertSame($fooStringFirstMeta, $structContainer->getStructByNameAndType('FooString', 'string')->getMeta());
        $this->assertSame($fooStringSecondMeta, $structContainer->getStructByNameAndType('FooString', 'int')->getMeta());
    }
}
