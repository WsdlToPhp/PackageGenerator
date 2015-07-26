<?php

namespace WsdlToPhp\PackageGenerator\Tests\Container\Model;

use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Model\EmptyModel;
use WsdlToPhp\PackageGenerator\Container\Model\EmptyModel as ModelContainer;
use WsdlToPhp\PackageGenerator\Tests\TestCase;

class ModelContainerTest extends TestCase
{
    /**
     *
     */
    public function testAdd()
    {
        $modelContainer = new ModelContainer();
        $modelContainer->add(new EmptyModel(self::getBingGeneratorInstance(), 'Foo'));
    }
    /**
     * @expectedException InvalidArgumentException
     */
    public function testExceptionOnObject()
    {
        $modelContainer = new ModelContainer();
        $modelContainer->add(array());
    }
    /**
     * @expectedException InvalidArgumentException
     */
    public function testExceptionOnModelClass()
    {
        $modelContainer = new ModelContainer();
        $modelContainer->add(new Struct(self::getBingGeneratorInstance(), 'Foo'));
    }
    /**
     *
     */
    public function testGet()
    {
        $modelContainer = new ModelContainer();
        $modelContainer->add(new EmptyModel(self::getBingGeneratorInstance(), 'Foo'));
        $modelContainer->add(new EmptyModel(self::getBingGeneratorInstance(), 'Bar'));

        $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\Model\\EmptyModel', $modelContainer->get('Foo'));
    }
    /**
     *
     */
    public function testForeach()
    {
        $models = new ModelContainer();
        $models->add(new EmptyModel(self::getBingGeneratorInstance(), 'Foo'));
        $models->add(new EmptyModel(self::getBingGeneratorInstance(), 'Bar'));
        $models->add(new EmptyModel(self::getBingGeneratorInstance(), 'FooBar'));
        $models->add(new EmptyModel(self::getBingGeneratorInstance(), 'BarFoo'));

        $index = 0;
        foreach ($models as $model) {
            $this->assertSame($index, $models->key());

            if ($models->key() === 0) {
                $this->assertSame('Foo', $model->getName());
            } elseif ($models->key() === 1) {
                $this->assertSame('Bar', $model->getName());
            } elseif ($models->key() === 2) {
                $this->assertSame('FooBar', $model->getName());
            } elseif ($models->key() === 3) {
                $this->assertSame('BarFoo', $model->getName());
            }

            $index++;
        }
    }
    /**
     *
     */
    public function testCount()
    {
        $models = new ModelContainer();
        $models->add(new EmptyModel(self::getBingGeneratorInstance(), 'Foo'));
        $models->add(new EmptyModel(self::getBingGeneratorInstance(), 'Bar'));
        $models->add(new EmptyModel(self::getBingGeneratorInstance(), 'FooBar'));
        $models->add(new EmptyModel(self::getBingGeneratorInstance(), 'BarFoo'));

        $this->assertSame(4, $models->count());
        $this->assertSame(4, count($models));
    }
}
