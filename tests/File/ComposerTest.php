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
        $instance = self::getBingGeneratorInstance(true);
        $instance
            ->setOptionPrefix('Api')
            ->setOptionComposerName('wsdltophp/bing');
        $composerFile = new Composer($instance, 'composer');
        $composerFile
            ->setRunComposerUpdate(false)
            ->write();

        $this->assertSameFileContent('ValidBingComposer' . (version_compare(PHP_VERSION, '5.4.0') === -1 ? '.php53' : ''), $composerFile, 'json');
    }
    /**
     *
     */
    public function testBingWithSettings()
    {
        $instance = self::getBingGeneratorInstance(true);
        $instance
            ->setOptionPrefix('Api')
            ->setOptionComposerName('wsdltophp/bing')
            ->setOptionComposerSettings(array(
                'config.disable-tls:true',
                'require.wsdltophp/wssecurity:dev-master',
            ));
        $composerFile = new Composer($instance, 'composer');
        $composerFile
            ->setRunComposerUpdate(false)
            ->write();

        $this->assertSameFileContent('ValidBingComposerSettings' . (version_compare(PHP_VERSION, '5.4.0') === -1 ? '.php53' : ''), $composerFile, 'json');
    }
    /**
     *
     */
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

        $this->assertSameFileContent('ValidBingComposerEmptySrcDirname' . (version_compare(PHP_VERSION, '5.4.0') === -1 ? '.php53' : ''), $composerFile, 'json');
    }
    /**
     *
     */
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

        $this->assertSameFileContent('ValidBingComposerSlashSrcDirname' . (version_compare(PHP_VERSION, '5.4.0') === -1 ? '.php53' : ''), $composerFile, 'json');
    }
    /**
     *
     */
    public function testSetRunComposerUdpate()
    {
        $instance = self::getBingGeneratorInstance(true);
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
        $instance = self::getBingGeneratorInstance(true);
        $instance->setOptionPrefix('Api');
        $composerFile = new Composer($instance, 'composer');

        $this->assertSame(self::getTestDirectory() . 'composer.json', $composerFile->getFileName());
    }
}
