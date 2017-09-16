<?php

namespace WsdlToPhp\PackageGenerator\Tests\File;

use WsdlToPhp\PackageGenerator\File\Tutorial as TutorialFile;
use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;

class TutorialTest extends AbstractFile
{
    const FILE_NAME = 'tutorial';
    /**
     *
     */
    public function testBing()
    {
        $instance = self::bingGeneratorInstance();

        $tutorial = new TutorialFile($instance, self::FILE_NAME);
        $tutorial->write();

        $this->assertSameFileContent('ValidBingTutorial', $tutorial);
    }
    /**
     *
     */
    public function testBingNotStandalone()
    {
        $instance = self::bingGeneratorInstance();
        $instance->setOptionStandalone(false);

        $tutorial = new TutorialFile($instance, self::FILE_NAME);
        $tutorial->write();

        $this->assertSameFileContent('ValidBingTutorialNotStandalone', $tutorial);
    }
    /**
     *
     */
    public function testBingNoPrefix()
    {
        $instance = self::bingGeneratorInstance();
        $instance->setOptionPrefix('');

        $tutorial = new TutorialFile($instance, self::FILE_NAME);
        $tutorial->write();

        $this->assertSameFileContent('ValidBingTutorialNoPrefix', $tutorial);
    }
    /**
     *
     */
    public function testReforma()
    {
        $instance = self::reformaGeneratorInstance();

        $tutorial = new TutorialFile($instance, self::FILE_NAME);
        $tutorial->write();

        $this->assertSameFileContent('ValidReformaTutorial', $tutorial);
    }
    /**
     *
     */
    public function testActon()
    {
        $instance = self::actonGeneratorInstance();

        $tutorial = new TutorialFile($instance, self::FILE_NAME);
        $tutorial->write();

        $this->assertSameFileContent('ValidActonTutorial', $tutorial);
    }
    /**
     *
     */
    public function testOmniture()
    {
        $instance = self::omnitureGeneratorInstance();

        $tutorial = new TutorialFile($instance, self::FILE_NAME);
        $tutorial->write();

        $this->assertSameFileContent('ValidOmnitureTutorial', $tutorial);
    }
    /**
     *
     */
    public function testActonNone()
    {
        $instance = self::actonGeneratorInstance(true, GeneratorOptions::VALUE_NONE);

        $tutorial = new TutorialFile($instance, self::FILE_NAME);
        $tutorial->write();

        $this->assertSameFileContent('ValidActonNoneTutorial', $tutorial);
    }
}
