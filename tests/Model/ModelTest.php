<?php

namespace WsdlToPhp\PackageGenerator\Tests\Model;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Model\EmptyModel;

class ModelTest extends TestCase
{
    /**
     * @param string $name
     * @return \WsdlToPhp\PackageGenerator\Model\EmptyModel
     */
    public static function instance($name)
    {
        return new EmptyModel(self::getBingGeneratorInstance(), $name);
    }
    /**
     *
     */
    public function testGetCleanName()
    {
        $this->assertEquals('_foo_', self::instance('-foo-')->getCleanName());
        $this->assertEquals('_foo_', self::instance('-foo-----')->getCleanName(false));
        $this->assertEquals('___foo', self::instance('---foo')->getCleanName(true));
        $this->assertEquals('_é_àç_çfoo', self::instance('___é%àç_çfoo')->getCleanName(false));
        $this->assertEquals('_foo_245', self::instance('___é%àç_çfoo----245')->getCleanName(false));
    }
    /**
     *
     */
    public function testNameIsClean()
    {
        $this->assertTrue(self::instance('foo_')->nameIsClean());
        $this->assertTrue(self::instance('foo_54')->nameIsClean());
        $this->assertFalse(self::instance('%foo_')->nameIsClean());
        $this->assertFalse(self::instance('-foo_')->nameIsClean());
        $this->asserttrue(self::instance('éfoo_')->nameIsClean());
    }
    /**
     *
     */
    public function testGetDocSubPackages()
    {
        $this->assertEmpty(self::instance('Foo')->getDocSubPackages());
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionOnAddMetaName()
    {
        self::instance('foo')->addMeta(null, 'bar');
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionOnAddMetaValue()
    {
        self::instance('foo')->addMeta('', new \stdClass());
    }
    /**
     *
     */
    public function testAddMeta()
    {
        $instance = self::instance('foo');

        $instance->addMeta('foo', array(
            'bar' => 1,
        ));
        $instance->addMeta('foo', 'bar');

        $this->assertSame(array(
            'foo' => array(
                'bar' => 1,
                'bar',
            ),
        ), $instance->getMeta());
    }
}
