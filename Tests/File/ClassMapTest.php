<?php

namespace WsdlToPhp\PackageGenerator\Tests\File;

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

        $classMap = new ClassMapFile($instance, '', $this->getTestDirectory());
        $classMap->write();

        $this->assertSameFileContent('ValidBingClassMap', $classMap);
    }
    /**
     *
     */
    public function testReforma()
    {
        $instance = self::reformaGeneratorInstance();

        $classMap = new ClassMapFile($instance, '', $this->getTestDirectory());
        $classMap->write();

        $this->assertSameFileContent('ValidReformaClassMap', $classMap);
    }
    /**
     *
     */
    public function testActon()
    {
        $instance = self::actonGeneratorInstance();

        $classMap = new ClassMapFile($instance, '', $this->getTestDirectory());
        $classMap->write();

        $this->assertSameFileContent('ValidActonClassMap', $classMap);
    }
}
