<?php

namespace WsdlToPhp\PackageGenerator\Tests\Container\Model;

use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Model\EmptyModel;
use WsdlToPhp\PackageGenerator\Container\Model\EmptyModel as ModelContainer;
use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Model\Method;
use WsdlToPhp\PackageGenerator\Model\Service;
use WsdlToPhp\PackageGenerator\Container\Model\Method as MethodContainer;

class ModelContainerTest extends TestCase
{
    /**
     *
     */
    public function testAdd()
    {
        $modelContainer = new ModelContainer();
        $modelContainer->add(new EmptyModel('Foo'));
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
        $modelContainer->add(new Struct('Foo'));
    }
    /**
     *
     */
    public function testGet()
    {
        $modelContainer = new ModelContainer();
        $modelContainer->add(new EmptyModel('Foo'));
        $modelContainer->add(new EmptyModel('Bar'));

        $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\Model\\EmptyModel', $modelContainer->get('Foo'));
    }
    /**
     * @expectedException InvalidArgumentException
     */
    public function testGetWithException()
    {
        $modelContainer = new ModelContainer();
        $modelContainer->add(new EmptyModel('Foo'));
        $modelContainer->add(new EmptyModel('Bar'));

        $modelContainer->get('Foo', 'bar');
    }
    /**
     *
     */
    public function testForeach()
    {
        $models = new ModelContainer();
        $models->add(new EmptyModel('Foo'));
        $models->add(new EmptyModel('Bar'));
        $models->add(new EmptyModel('FooBar'));
        $models->add(new EmptyModel('BarFoo'));

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
        $models->add(new EmptyModel('Foo'));
        $models->add(new EmptyModel('Bar'));
        $models->add(new EmptyModel('FooBar'));
        $models->add(new EmptyModel('BarFoo'));

        $this->assertSame(4, $models->count());
        $this->assertSame(4, count($models));
    }
}
