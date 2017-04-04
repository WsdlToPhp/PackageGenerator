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
}
