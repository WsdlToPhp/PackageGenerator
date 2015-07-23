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
        $structContainer = new StructContainer();
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

        $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\Model\\Struct', $structContainer->getStructByName('Foo'));
        $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\Model\\Struct', $structContainer->getStructByName('Bar'));
        $this->assertNull($structContainer->getStructByName('bar'));
    }
    /**
     *
     */
    public function testAddStructWithSameAttributeName()
    {
        $structContainer = self::instance();

        $structContainer->addStructWithAttribute(self::getBingGeneratorInstance(), 'Foo', 'bar', 'string');
        $structContainer->addStructWithAttribute(self::getBingGeneratorInstance(), 'Foo', 'bar', 'int');

        $this->assertCount(1, $structContainer->getStructByName('Foo')->getAttributes());
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetInvalidProperty()
    {
        self::instance()->get(true, 'foo');
    }
    /**
     *
     */
    public function testOffsetGet()
    {
        $instance = self::instance();

        $instance->offsetSet(100, StructTest::instance('Foo', true));

        $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\Model\\Struct', $instance->offsetGet(100));
    }
    /**
     *
     */
    public function testOffsetUnset()
    {
        $instance = self::instance();

        $instance->offsetSet(100, StructTest::instance('Foo', true));
        $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\Model\\Struct', $instance->offsetGet(100));

        $instance->offsetUnset(100);
        $this->assertNull($instance->offsetGet(100));
    }
    /**
     *
     */
    public function testGetAs()
    {
        $structContainer = self::instance();

        $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\Model\\Struct', $structContainer->getAs(array(
            StructContainer::KEY_NAME => 'Bar',
        )));
        $this->assertNull($structContainer->getAs(array(
            StructContainer::KEY_NAME => null,
        )));
    }
}
