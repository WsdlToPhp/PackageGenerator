<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File;

use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;
use WsdlToPhp\PackageGenerator\File\Tutorial as TutorialFile;

/**
 * @internal
 * @coversDefaultClass
 */
final class TutorialTest extends AbstractFile
{
    public const FILE_NAME = 'tutorial';

    public function testBing(): void
    {
        $instance = self::bingGeneratorInstance();

        $tutorial = new TutorialFile($instance, self::FILE_NAME);
        $tutorial->write();

        $this->assertSameFileContent('ValidBingTutorial', $tutorial);
    }

    public function testBingNotStandalone(): void
    {
        $instance = self::bingGeneratorInstance();
        $instance->setOptionStandalone(false);

        $tutorial = new TutorialFile($instance, self::FILE_NAME);
        $tutorial->write();

        $this->assertSameFileContent('ValidBingTutorialNotStandalone', $tutorial);
    }

    public function testBingNoPrefix(): void
    {
        $instance = self::bingGeneratorInstance();
        $instance->setOptionPrefix('');

        $tutorial = new TutorialFile($instance, self::FILE_NAME);
        $tutorial->write();

        $this->assertSameFileContent('ValidBingTutorialNoPrefix', $tutorial);
    }

    public function testReforma(): void
    {
        $instance = self::reformaGeneratorInstance();

        $tutorial = new TutorialFile($instance, self::FILE_NAME);
        $tutorial->write();

        $this->assertSameFileContent('ValidReformaTutorial', $tutorial);
    }

    public function testActon(): void
    {
        $instance = self::actonGeneratorInstance();

        $tutorial = new TutorialFile($instance, self::FILE_NAME);
        $tutorial->write();

        $this->assertSameFileContent('ValidActonTutorial', $tutorial);
    }

    public function testOmniture(): void
    {
        $instance = self::omnitureGeneratorInstance();

        $tutorial = new TutorialFile($instance, self::FILE_NAME);
        $tutorial->write();

        $this->assertSameFileContent('ValidOmnitureTutorial', $tutorial);
    }

    public function testActonNone(): void
    {
        $instance = self::actonGeneratorInstance(true, GeneratorOptions::VALUE_NONE);

        $tutorial = new TutorialFile($instance, self::FILE_NAME);
        $tutorial->write();

        $this->assertSameFileContent('ValidActonNoneTutorial', $tutorial);
    }
}
