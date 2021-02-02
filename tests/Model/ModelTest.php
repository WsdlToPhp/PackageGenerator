<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Model;

use InvalidArgumentException;
use stdClass;
use TypeError;
use WsdlToPhp\PackageGenerator\Model\EmptyModel;
use WsdlToPhp\PackageGenerator\Tests\AbstractTestCase;

/**
 * @internal
 * @coversDefaultClass
 */
final class ModelTest extends AbstractTestCase
{
    public static function instance(string $name): EmptyModel
    {
        return new EmptyModel(self::getBingGeneratorInstance(), $name);
    }

    public function testGetCleanName()
    {
        $this->assertEquals('_foo_', self::instance('-foo-')->getCleanName());
        $this->assertEquals('_foo_', self::instance('-foo-----')->getCleanName(false));
        $this->assertEquals('___foo', self::instance('---foo')->getCleanName(true));
        $this->assertEquals('_é_àç_çfoo', self::instance('___é%àç_çfoo')->getCleanName(false));
        $this->assertEquals('_é_àç_çfoo_245', self::instance('___é%àç_çfoo----245')->getCleanName(false));
    }

    public function testNameIsClean()
    {
        $this->assertTrue(self::instance('foo_')->nameIsClean());
        $this->assertTrue(self::instance('foo_54')->nameIsClean());
        $this->assertFalse(self::instance('%foo_')->nameIsClean());
        $this->assertFalse(self::instance('-foo_')->nameIsClean());
        $this->asserttrue(self::instance('éfoo_')->nameIsClean());
    }

    public function testGetDocSubPackages()
    {
        $this->assertEmpty(self::instance('Foo')->getDocSubPackages());
    }

    public function testExceptionOnAddMetaName()
    {
        $this->expectException(TypeError::class);

        self::instance('foo')->addMeta(null, 'bar');
    }

    public function testExceptionOnAddMetaValue()
    {
        $this->expectException(InvalidArgumentException::class);

        self::instance('foo')->addMeta('', new stdClass());
    }

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

    public function testGetReservedMethodsInstance()
    {
        $this->expectException(InvalidArgumentException::class);

        self::instance('foo')->getReservedMethodsInstance();
    }

    public function testToJsonSerialize()
    {
        $this->assertSame([
            'inheritance' => '',
            'abstract' => false,
            'meta' => [],
            'name' => 'foo_',
            '__CLASS__' => EmptyModel::class,
        ], self::instance('foo_')->jsonSerialize());
    }

    public function testInstanceFromSerializedJsonMustThrowAnExceptionForMissingClass()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(sprintf('__CLASS__ key is missing from "%s"', var_export($array = [
            'inheritance' => '',
            'abstract' => false,
            'meta' => [],
            'name' => 'foo_',
        ], true)));

        EmptyModel::instanceFromSerializedJson(self::bingGeneratorInstance(), $array);
    }

    public function testInstanceFromSerializedJsonMustThrowAnExceptionForInexistingClass()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Class "WsdlToPhp\PackageGenerator\Model\EmptyFakeModel" is unknown');

        EmptyModel::instanceFromSerializedJson(self::bingGeneratorInstance(), [
            'inheritance' => '',
            'abstract' => false,
            'meta' => [],
            'name' => 'foo_',
            '__CLASS__' => 'WsdlToPhp\PackageGenerator\Model\EmptyFakeModel',
        ]);
    }

    public function testInstanceFromSerializedJsonMustThrowAnAxceptionForMissingName()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(sprintf('name key is missing from "%s"', var_export($array = [
            'inheritance' => '',
            'abstract' => false,
            'meta' => [],
            '__CLASS__' => EmptyModel::class,
        ], true)));

        EmptyModel::instanceFromSerializedJson(self::bingGeneratorInstance(), $array);
    }
}
