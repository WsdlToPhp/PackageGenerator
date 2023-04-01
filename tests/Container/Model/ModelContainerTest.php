<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Container\Model;

use WsdlToPhp\PackageGenerator\Container\Model\EmptyModel as ModelContainer;
use WsdlToPhp\PackageGenerator\Model\EmptyModel;
use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Tests\AbstractTestCase;

/**
 * @internal
 * @coversDefaultClass
 */
final class ModelContainerTest extends AbstractTestCase
{
    public static function instance(): ModelContainer
    {
        return new ModelContainer(self::getBingGeneratorInstance());
    }

    public function testAdd(): void
    {
        $modelContainer = self::instance();
        $modelContainer->add(new EmptyModel(self::getBingGeneratorInstance(), 'Foo'));
        $this->assertInstanceOf(EmptyModel::class, $modelContainer->get('Foo'));
    }

    public function testExceptionOnObject(): void
    {
        $this->expectException(\TypeError::class);

        $modelContainer = self::instance();
        $modelContainer->add([]);
    }

    public function testGetExceptionOnValue(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $modelContainer = self::instance();
        $modelContainer->add(new EmptyModel(self::getBingGeneratorInstance(), 'Foo'));

        $modelContainer->get([]);
        $modelContainer->get(null);
    }

    public function testExceptionOnModelClass(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $modelContainer = self::instance();
        $modelContainer->add(new Struct(self::getBingGeneratorInstance(), 'Foo'));
    }

    public function testGet(): void
    {
        $modelContainer = self::instance();
        $modelContainer->add(new EmptyModel(self::getBingGeneratorInstance(), 'Foo'));
        $modelContainer->add(new EmptyModel(self::getBingGeneratorInstance(), 'Bar'));

        $this->assertInstanceOf(EmptyModel::class, $modelContainer->get('Foo'));
    }

    public function testForeach(): void
    {
        $models = self::instance();
        $models->add(new EmptyModel(self::getBingGeneratorInstance(), 'Foo'));
        $models->add(new EmptyModel(self::getBingGeneratorInstance(), 'Bar'));
        $models->add(new EmptyModel(self::getBingGeneratorInstance(), 'FooBar'));
        $models->add(new EmptyModel(self::getBingGeneratorInstance(), 'BarFoo'));

        $index = 0;
        foreach ($models as $model) {
            $this->assertSame($index, $models->key());

            if (0 === $models->key()) {
                $this->assertSame('Foo', $model->getName());
            } elseif (1 === $models->key()) {
                $this->assertSame('Bar', $model->getName());
            } elseif (2 === $models->key()) {
                $this->assertSame('FooBar', $model->getName());
            } elseif (3 === $models->key()) {
                $this->assertSame('BarFoo', $model->getName());
            }

            ++$index;
        }
    }

    public function testCount(): void
    {
        $models = self::instance();
        $models->add(new EmptyModel(self::getBingGeneratorInstance(), 'Foo'));
        $models->add(new EmptyModel(self::getBingGeneratorInstance(), 'Bar'));
        $models->add(new EmptyModel(self::getBingGeneratorInstance(), 'FooBar'));
        $models->add(new EmptyModel(self::getBingGeneratorInstance(), 'BarFoo'));

        $this->assertSame(4, $models->count());
        $this->assertSame(4, is_countable($models) ? count($models) : 0);
    }
}
