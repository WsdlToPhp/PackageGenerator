<?php

namespace WsdlToPhp\PackageGenerator\Tests\File;

use WsdlToPhp\PackageGenerator\File\Composer;

class ComposerTest extends AbstractFile
{
    public function testBing()
    {
        $instance = self::getBingGeneratorInstance(true);
        $instance
            ->setOptionPrefix('Api')
            ->setOptionComposerName('wsdltophp/bing');
        $composerFile = new Composer($instance, 'composer');
        $composerFile
            ->setRunComposerUpdate(false)
            ->write();

        $this->assertSameFileContent('ValidBingComposer', $composerFile, 'json');
    }
    public function testBingWithEmptyComposerNameAndFilledPrefix()
    {
        $instance = self::getBingGeneratorInstance(true);
        $instance
            ->setOptionNamespacePrefix('')
            ->setOptionPrefix('Api')
            ->setOptionSuffix('Class')
            ->setOptionComposerName('wsdltophp/bing');
        $composerFile = new Composer($instance, 'composer');
        $composerFile
            ->setRunComposerUpdate(false)
            ->write();

        $this->assertSameFileContent('ValidBingEmptyComposerNameComposer', $composerFile, 'json');
    }

    public function testBingWithSettings()
    {
        $instance = self::getBingGeneratorInstance(true);
        $instance
            ->setOptionPrefix('Api')
            ->setOptionComposerName('wsdltophp/bing')
            ->setOptionComposerSettings([
                'config.disable-tls:true',
                'require.wsdltophp/wssecurity:dev-master',
            ]);
        $composerFile = new Composer($instance, 'composer');
        $composerFile
            ->setRunComposerUpdate(false)
            ->write();

        $this->assertSameFileContent('ValidBingComposerSettings', $composerFile, 'json');
    }

    public function testBingWithEmptySrcDirname()
    {
        $instance = self::getBingGeneratorInstance(true);
        $instance
            ->setOptionPrefix('Api')
            ->setOptionComposerName('wsdltophp/bing')
            ->setOptionSrcDirname('');
        $composerFile = new Composer($instance, 'composer');
        $composerFile
            ->setRunComposerUpdate(false)
            ->write();

        $this->assertSameFileContent('ValidBingComposerEmptySrcDirname', $composerFile, 'json');
    }

    public function testBingWithSlashSrcDirname()
    {
        $instance = self::getBingGeneratorInstance(true);
        $instance
            ->setOptionPrefix('Api')
            ->setOptionComposerName('wsdltophp/bing')
            ->setOptionSrcDirname('/');
        $composerFile = new Composer($instance, 'composer');
        $composerFile
            ->setRunComposerUpdate(false)
            ->write();

        $this->assertSameFileContent('ValidBingComposerSlashSrcDirname', $composerFile, 'json');
    }

    public function testSetRunComposerUdpate()
    {
        $instance = self::getBingGeneratorInstance(true);
        $instance
            ->setOptionPrefix('Api');
        $composerFile = new Composer($instance, 'composer');
        $composerFile->setRunComposerUpdate(false);

        $this->assertFalse($composerFile->getRunComposerUpdate());
    }

    public function testGetFileName()
    {
        $instance = self::getBingGeneratorInstance(true);
        $instance->setOptionPrefix('Api');
        $composerFile = new Composer($instance, 'composer');

        $this->assertSame(self::getTestDirectory() . 'composer.json', $composerFile->getFileName());
    }
}
