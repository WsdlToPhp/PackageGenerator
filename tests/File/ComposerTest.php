<?php

namespace WsdlToPhp\PackageGenerator\Tests\File;

use WsdlToPhp\PackageGenerator\File\Composer;

class ComposerTest extends AbstractFile
{
    /**
     *
     */
    public function testBing()
    {
        $instance = clone self::getBingGeneratorInstance();
        $instance
            ->setOptionPrefix('Api');
        $composerFile = new Composer($instance, 'composer');
        $composerFile
            ->setRunComposerUpdate(false)
            ->write();

        $this->assertSameFileContent('ValidBingComposer', $composerFile, 'json');
    }
    /**
     *
     */
    public function testSetRunComposerUdpate()
    {
        $instance = clone self::getBingGeneratorInstance();
        $instance
            ->setOptionPrefix('Api');
        $composerFile = new Composer($instance, 'composer');
        $composerFile->setRunComposerUpdate(false);

        $this->assertFalse($composerFile->getRunComposerUpdate());
    }
    /**
     *
     */
    public function testGetFileName()
    {
        $instance = clone self::getBingGeneratorInstance();
        $instance
            ->setOptionPrefix('Api');
        $composerFile = new Composer($instance, 'composer');

        $this->assertSame(self::getTestDirectory() . 'composer.json', $composerFile->getFileName());
    }
}
