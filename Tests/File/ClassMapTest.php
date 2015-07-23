<?php

namespace WsdlToPhp\PackageGenerator\Tests\File;

use WsdlToPhp\PackageGenerator\Model\EmptyModel;
use WsdlToPhp\PackageGenerator\File\ClassMap as ClassMapFile;
use WsdlToPhp\PackageGenerator\Tests\File\AbstractFile;

class ClassMapTest extends AbstractFile
{
    /**
     *
     */
    public function testBing()
    {
        $instance = self::bingGeneratorInstance();

        $model = new EmptyModel($instance, 'ClassMap');
        $classMap = new ClassMapFile($instance, $model->getPackagedName(), $this->getTestDirectory());
        $classMap
            ->setModel($model)
            ->write();

        $this->assertSameFileContent('ValidBingClassMap', $classMap);
    }
    /**
     *
     */
    public function testReforma()
    {
        $instance = self::reformaGeneratorInstance();

        $model = new EmptyModel($instance, 'ClassMap');
        $classMap = new ClassMapFile($instance, $model->getPackagedName(), $this->getTestDirectory());
        $classMap
            ->setModel($model)
            ->write();

        $this->assertSameFileContent('ValidReformaClassMap', $classMap);
    }
    /**
     *
     */
    public function testActon()
    {
        $instance = self::actonGeneratorInstance();

        $model = new EmptyModel($instance, 'ClassMap');
        $classMap = new ClassMapFile($instance, $model->getPackagedName(), $this->getTestDirectory());
        $classMap
            ->setModel($model)
            ->write();

        $this->assertSameFileContent('ValidActonClassMap', $classMap);
    }
}
