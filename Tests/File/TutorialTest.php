<?php

namespace WsdlToPhp\PackageGenerator\Tests\File;

use WsdlToPhp\PackageGenerator\Model\AbstractModel;
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
        AbstractModel::purgeUniqueNames();
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
        AbstractModel::purgeUniqueNames();
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
