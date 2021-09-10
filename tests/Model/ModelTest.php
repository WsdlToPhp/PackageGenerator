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
        return new EmptyModel(self::getBingGeneratorInstance(true), $name);
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
        $this->assertEquals('_é_àç_çfoo_245', self::instance('___é%àç_çfoo----245')->getCleanName(false));
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

        $instance->addMeta('foo', [
            'bar' => 1,
        ]);
        $instance->addMeta('foo', 'bar');

        $this->assertSame([
            'foo' => [
                'bar' => 1,
                'bar',
            ],
        ], $instance->getMeta());
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetReservedMethodsInstance()
    {
        self::instance('foo')->getReservedMethodsInstance();
    }
    /**
     *
     */
    public function testToJsonSerialize()
    {
        $this->assertSame([
            'inheritance' => '',
            'abstract' => false,
            'meta' => [],
            'name' => 'foo_',
            '__CLASS__' => 'WsdlToPhp\PackageGenerator\Model\EmptyModel',
        ], self::instance('foo_')->jsonSerialize());
    }
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage __CLASS__ key is missing from "array (
    'inheritance' => '',
    'abstract' => false,
    'meta' =>
    array (
    ),
    'name' => 'foo_',
    )"
     */
    public function testInstanceFromSerializedJsonMustThrowAnExceptionForMissingClass()
    {
        EmptyModel::instanceFromSerializedJson(self::bingGeneratorInstance(), [
            'inheritance' => '',
            'abstract' => false,
            'meta' => [],
            'name' => 'foo_',
        ]);
    }
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Class WsdlToPhp\PackageGenerator\Model\EmptyFakeModel is unknown
     */
    public function testInstanceFromSerializedJsonMustThrowAnAxceptionForInexistingClass()
    {
        EmptyModel::instanceFromSerializedJson(self::bingGeneratorInstance(), [
            'inheritance' => '',
            'abstract' => false,
            'meta' => [],
            'name' => 'foo_',
            '__CLASS__' => 'WsdlToPhp\PackageGenerator\Model\EmptyFakeModel',
        ]);
    }
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage name key is missing from array (
    'inheritance' => '',
    'abstract' => false,
    'meta' =>
    array (
    ),
    '__CLASS__' => 'WsdlToPhp\\PackageGenerator\\Model\\EmptyModel',
    )
     */
    public function testInstanceFromSerializedJsonMustThrowAnAxceptionForMissingName()
    {
        EmptyModel::instanceFromSerializedJson(self::bingGeneratorInstance(), [
            'inheritance' => '',
            'abstract' => false,
            'meta' => [],
            '__CLASS__' => 'WsdlToPhp\PackageGenerator\Model\EmptyModel',
        ]);
    }

    public function testGetNamespaceWithDefaultDirectoryStructuresMustReturnAnEmptyNamespace()
    {
        $this->assertEmpty(self::instance('foo')->getNamespace());
    }

    public function testGetNamespaceWithCustomNamespaceMustReturnTheNamespace()
    {
        $model = self::instance('foo');
        $model->getGenerator()->setOptionNamespacePrefix('My\Namespace');
        $this->assertSame('My\Namespace', $model->getNamespace());
    }
}
