<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File;

use WsdlToPhp\PackageGenerator\File\Composer;

/**
 * @internal
 * @coversDefaultClass
 */
final class ComposerTest extends AbstractFile
{
    public function testBing(): void
    {
        $instance = self::getBingGeneratorInstance(true);
        $instance
            ->setOptionPrefix('Api')
            ->setOptionComposerName('wsdltophp/bing')
        ;
        $composerFile = new Composer($instance, 'composer');
        $composerFile
            ->setRunComposerUpdate(false)
            ->write()
        ;

        $this->assertSameFileContent('ValidBingComposer', $composerFile, 'json');
    }

    public function testBingWithEmptyComposerNameAndFilledPrefix(): void
    {
        $instance = self::getBingGeneratorInstance(true);
        $instance
            ->setOptionNamespacePrefix('')
            ->setOptionPrefix('Api')
            ->setOptionSuffix('Class')
            ->setOptionComposerName('wsdltophp/bing')
        ;
        $composerFile = new Composer($instance, 'composer');
        $composerFile
            ->setRunComposerUpdate(false)
            ->write()
        ;

        $this->assertSameFileContent('ValidBingEmptyComposerNameComposer', $composerFile, 'json');
    }

    public function testBingWithSettings(): void
    {
        $instance = self::getBingGeneratorInstance(true);
        $instance
            ->setOptionPrefix('Api')
            ->setOptionComposerName('wsdltophp/bing')
            ->setOptionComposerSettings([
                'config.disable-tls:true',
                'require.wsdltophp/wssecurity:dev-master',
            ])
        ;
        $composerFile = new Composer($instance, 'composer');
        $composerFile
            ->setRunComposerUpdate(false)
            ->write()
        ;

        $this->assertSameFileContent('ValidBingComposerSettings', $composerFile, 'json');
    }

    public function testBingWithEmptySrcDirname(): void
    {
        $instance = self::getBingGeneratorInstance(true);
        $instance
            ->setOptionPrefix('Api')
            ->setOptionComposerName('wsdltophp/bing')
            ->setOptionSrcDirname('')
        ;
        $composerFile = new Composer($instance, 'composer');
        $composerFile
            ->setRunComposerUpdate(false)
            ->write()
        ;

        $this->assertSameFileContent('ValidBingComposerEmptySrcDirname', $composerFile, 'json');
    }

    public function testBingWithSlashSrcDirname(): void
    {
        $instance = self::getBingGeneratorInstance(true);
        $instance
            ->setOptionPrefix('Api')
            ->setOptionComposerName('wsdltophp/bing')
            ->setOptionSrcDirname('/')
        ;
        $composerFile = new Composer($instance, 'composer');
        $composerFile
            ->setRunComposerUpdate(false)
            ->write()
        ;

        $this->assertSameFileContent('ValidBingComposerSlashSrcDirname', $composerFile, 'json');
    }

    public function testSetRunComposerUdpate(): void
    {
        $instance = self::getBingGeneratorInstance(true);
        $instance
            ->setOptionPrefix('Api')
        ;
        $composerFile = new Composer($instance, 'composer');
        $composerFile->setRunComposerUpdate(false);

        $this->assertFalse($composerFile->getRunComposerUpdate());
    }

    public function testGetFileName(): void
    {
        $instance = self::getBingGeneratorInstance(true);
        $instance->setOptionPrefix('Api');
        $composerFile = new Composer($instance, 'composer');

        $this->assertSame(self::getTestDirectory().'composer.json', $composerFile->getFileName());
    }
}
