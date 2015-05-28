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
        return new EmptyModel($name);
    }
    /**
     *
     */
    public function testGetCleanName()
    {
        $this->assertEquals('_foo_', self::instance('-foo-')->getCleanName());
        $this->assertEquals('_foo_', self::instance('-foo-----')->getCleanName(false));
        $this->assertEquals('___foo', self::instance('---foo')->getCleanName(true));
        $this->assertEquals('_foo', self::instance('___é%àç_çfoo')->getCleanName(false));
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
        $this->assertFalse(self::instance('éfoo_')->nameIsClean());
    }
}
