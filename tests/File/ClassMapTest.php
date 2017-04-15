<?php

namespace WsdlToPhp\PackageGenerator\Tests\File;

use WsdlToPhp\PackageGenerator\Model\EmptyModel;
use WsdlToPhp\PackageGenerator\File\ClassMap as ClassMapFile;
use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;

class ClassMapTest extends AbstractFile
{
    /**
     *
     */
    public function testBing()
    {
        $instance = self::bingGeneratorInstance();

        $model = new EmptyModel($instance, 'ClassMap');
        $classMap = new ClassMapFile($instance, $model->getPackagedName());
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
        $classMap = new ClassMapFile($instance, $model->getPackagedName());
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
        $classMap = new ClassMapFile($instance, $model->getPackagedName());
        $classMap
            ->setModel($model)
            ->write();

        $this->assertSameFileContent('ValidActonClassMap', $classMap);
    }
    /**
     *
     */
    public function testActonWihthoutPrefix()
    {
        $instance = self::actonGeneratorInstance();
        $instance
            ->setOptionNamespacePrefix('')
            ->setOptionPrefix('');

        $model = new EmptyModel($instance, 'ClassMap');
        $classMap = new ClassMapFile($instance, $model->getPackagedName());
        $classMap
            ->setModel($model)
            ->write();

        $this->assertSameFileContent('ValidActonClassMapWihoutNamespace', $classMap);
    }
    /**
     *
     */
    public function testActonWihthoutPrefixAndCategory()
    {
        $instance = self::actonGeneratorInstance();
        $instance
            ->setOptionNamespacePrefix('')
            ->setOptionPrefix('')
            ->setOptionCategory(GeneratorOptions::VALUE_NONE);

        $model = new EmptyModel($instance, 'ClassMap');
        $classMap = new ClassMapFile($instance, $model->getPackagedName());
        $classMap
            ->setModel($model)
            ->write();

        $this->assertSameFileContent('ValidActonClassMapWihoutNamespaceAndCategory', $classMap);
    }
    /**
     *
     */
    public function testDestination()
    {
        $instance = self::bingGeneratorInstance();

        $model = new EmptyModel($instance, 'ClassMap');
        $classMap = new ClassMapFile($instance, $model->getPackagedName());
        $classMap->setModel($model);

        $this->assertSame(sprintf('%s%s', self::getTestDirectory(), $instance->getOptionSrcDirname() . DIRECTORY_SEPARATOR), $classMap->getFileDestination());
    }
}
