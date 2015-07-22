<?php

namespace WsdlToPhp\PackageGenerator\Tests\File;

use WsdlToPhp\PackageGenerator\Container\Model\Service;
use WsdlToPhp\PackageGenerator\File\Tutorial as TutorialFile;

class TutorialTest extends AbstractFile
{
    /**
     *
     */
    public function testBing()
    {
        $instance = self::bingGeneratorInstance();

        $tutorial = new TutorialFile($instance, '', $this->getTestDirectory());
        $tutorial->write();

        $this->assertSameFileContent('ValidBingTutorial', $tutorial);
    }
    /**
     *
     */
    public function testReforma()
    {
        Service::purgeAllCache();
        $instance = self::reformaGeneratorInstance();

        $tutorial = new TutorialFile($instance, '', $this->getTestDirectory());
        $tutorial->write();

        $this->assertSameFileContent('ValidReformaTutorial', $tutorial);
    }
    /**
     *
     */
    public function testActon()
    {
        Service::purgeAllCache();
        $instance = self::actonGeneratorInstance();

        $tutorial = new TutorialFile($instance, '', $this->getTestDirectory());
        $tutorial->write();

        $this->assertSameFileContent('ValidActonTutorial', $tutorial);
    }
    /**
     *
     */
    public function testOmniture()
    {
        $instance = self::omnitureGeneratorInstance();

        $tutorial = new TutorialFile($instance, '', $this->getTestDirectory());
        $tutorial->write();

        $this->assertSameFileContent('ValidOmnitureTutorial', $tutorial);
    }
}
