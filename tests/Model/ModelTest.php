<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Model;

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
        return new EmptyModel(self::getBingGeneratorInstance(true), $name);
    }

    public function testGetCleanName(): void
    {
        $this->assertEquals('_foo_', self::instance('-foo-')->getCleanName());
        $this->assertEquals('_foo_', self::instance('-foo-----')->getCleanName(false));
        $this->assertEquals('___foo', self::instance('---foo')->getCleanName(true));
        $this->assertEquals('_é_àç_çfoo', self::instance('___é%àç_çfoo')->getCleanName(false));
        $this->assertEquals('_é_àç_çfoo_245', self::instance('___é%àç_çfoo----245')->getCleanName(false));
    }

    public function testNameIsClean(): void
    {
        $this->assertTrue(self::instance('foo_')->nameIsClean());
        $this->assertTrue(self::instance('foo_54')->nameIsClean());
        $this->assertFalse(self::instance('%foo_')->nameIsClean());
        $this->assertFalse(self::instance('-foo_')->nameIsClean());
        $this->asserttrue(self::instance('éfoo_')->nameIsClean());
    }

    public function testGetDocSubPackages(): void
    {
        $this->assertEmpty(self::instance('Foo')->getDocSubPackages());
    }

    public function testExceptionOnAddMetaName(): void
    {
        $this->expectException(\TypeError::class);

        self::instance('foo')->addMeta(null, 'bar');
    }

    public function testExceptionOnAddMetaValue(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        self::instance('foo')->addMeta('', new \stdClass());
    }

    public function testAddMeta(): void
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

    public function testGetReservedMethodsInstance(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        self::instance('foo')->getReservedMethodsInstance();
    }

    public function testToJsonSerialize(): void
    {
        $this->assertSame([
            'inheritance' => '',
            'abstract' => false,
            'meta' => [],
            'name' => 'foo_',
            '__CLASS__' => EmptyModel::class,
        ], self::instance('foo_')->jsonSerialize());
    }

    public function testInstanceFromSerializedJsonMustThrowAnExceptionForMissingClass(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(sprintf('__CLASS__ key is missing from "%s"', var_export($array = [
            'inheritance' => '',
            'abstract' => false,
            'meta' => [],
            'name' => 'foo_',
        ], true)));

        EmptyModel::instanceFromSerializedJson(self::bingGeneratorInstance(), $array);
    }

    public function testInstanceFromSerializedJsonMustThrowAnExceptionForInexistingClass(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Class "WsdlToPhp\PackageGenerator\Model\EmptyFakeModel" is unknown');

        EmptyModel::instanceFromSerializedJson(self::bingGeneratorInstance(), [
            'inheritance' => '',
            'abstract' => false,
            'meta' => [],
            'name' => 'foo_',
            '__CLASS__' => 'WsdlToPhp\PackageGenerator\Model\EmptyFakeModel',
        ]);
    }

    public function testInstanceFromSerializedJsonMustThrowAnAxceptionForMissingName(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(sprintf('name key is missing from "%s"', var_export($array = [
            'inheritance' => '',
            'abstract' => false,
            'meta' => [],
            '__CLASS__' => EmptyModel::class,
        ], true)));

        EmptyModel::instanceFromSerializedJson(self::bingGeneratorInstance(), $array);
    }

    public function testGetNamespaceWithDefaultDirectoryStructuresMustReturnAnEmptyNamespace(): void
    {
        $this->assertEmpty(self::instance('foo')->getNamespace());
    }

    public function testGetNamespaceWithCustomNamespaceMustReturnTheNamespace(): void
    {
        ($model = self::instance('foo'))->getGenerator()->setOptionNamespacePrefix('My\Namespace');
        $this->assertSame('My\Namespace', $model->getNamespace());
    }
}
