<?php

namespace WsdlToPhp\PackageGenerator\Tests\Container\Model;

use WsdlToPhp\PackageGenerator\Tests\Model\StructTest;
use WsdlToPhp\PackageGenerator\Container\Model\Struct as StructContainer;
use WsdlToPhp\PackageGenerator\Tests\TestCase;

class StructContainerTest extends TestCase
{
    /**
     * @return StructContainer
     */
    public static function instance()
    {
        $structContainer = new StructContainer(self::getBingGeneratorInstance());
        $structContainer->add(StructTest::instance('Foo', true));
        $structContainer->add(StructTest::instance('Bar', false));
        return $structContainer;
    }
    /**
     *
     */
    public function testGetStructByName()
    {
        $structContainer = self::instance();

        $this->assertInstanceOf('\WsdlToPhp\PackageGenerator\Model\Struct', $structContainer->getStructByName('Foo'));
        $this->assertInstanceOf('\WsdlToPhp\PackageGenerator\Model\Struct', $structContainer->getStructByName('Bar'));
        $this->assertNull($structContainer->getStructByName('bar'));
    }
    /**
     *
     */
    public function testAddStructWithSameAttributeName()
    {
        $structContainer = self::instance();

        $structContainer->addStructWithAttribute('Foo', 'bar', 'string');
        $structContainer->addStructWithAttribute('Foo', 'bar', 'int');

        $this->assertCount(1, $structContainer->getStructByName('Foo')->getAttributes());
    }
    /**
     *
     */
    public function testOffsetUnset()
    {
        $instance = self::instance();

        $instance->addStructWithAttribute('Foo', 'bar', 'string');
        $instance->addStructWithAttribute('Foo', 'bar', 'int');

        $instance->offsetUnset(1);

        $this->assertNull($instance->offsetGet(1));
    }
    /**
     *
     */
    public function testGetStructByNameAndTypeMustFailAsTypeIsUnknown()
    {
        $structContainer = self::instance();

        $this->assertNull($structContainer->getStructByNameAndType('bar', 'string'));
    }
    /**
     *
     */
    public function testGetStructByNameAndTypeMustReturnTheStruct()
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
    /**
     * @requires PHP < 7.3
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Value "stdClass" can't be used to get an object from "WsdlToPhp\PackageGenerator\Container\Model\Struct"
     */
    public function testGetByTypeMustThrowAnExceptionForInvalidValue()
    {
        $structContainer = self::instance();
        $structContainer->getByType(new \stdClass(), '_');
    }
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Type "array (
     * )" can't be used to get an object
     */
    public function testGetByTypeMustThrowAnExceptionForInvalidType()
    {
        $structContainer = self::instance();
        $structContainer->getByType(1, []);
    }
    /**
     * @requires PHP < 7.3
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Value "stdClass" can't be used to get an object from "WsdlToPhp\PackageGenerator\Container\Model\Struct"
     */
    public function testGetVirtualMustThrowAnExceptionForInvalidValue()
    {
        $structContainer = self::instance();
        $structContainer->getVirtual(new \stdClass());
    }
}
