<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\ConfigurationReader;

use WsdlToPhp\PackageGenerator\ConfigurationReader\XsdTypes;
use WsdlToPhp\PackageGenerator\Tests\AbstractTestCase;

/**
 * @internal
 * @coversDefaultClass
 */
final class XsdTypesTest extends AbstractTestCase
{
    public static function instance(): XsdTypes
    {
        return XsdTypes::instance(__DIR__.'/../resources/xsd_types.yml');
    }

    public function testException(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        XsdTypes::instance(__DIR__.'/../resources/bad_xsd_types.yml');
    }

    public function testExceptionForUnexistingFile(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        XsdTypes::instance(__DIR__.'/../resources/bad_xsd_types');
    }

    public function testIsXsdTrue(): void
    {
        $this->assertTrue(self::instance()->isXsd('duration'));
    }

    public function testIsXsdFalse(): void
    {
        $this->assertFalse(self::instance()->isXsd('Duration'));
    }

    public function testPhpXsd(): void
    {
        $this->assertSame('string', self::instance()->phpType('duration'));
    }

    public function testPhpNonXsd(): void
    {
        $this->assertSame('', self::instance()->phpType('Duration'));
    }

    public function testIsAnonymous(): void
    {
        $this->assertTrue(self::instance()->isAnonymous('anonymous159'));
    }

    public function testAnonymousPhpType(): void
    {
        $this->assertSame('string', self::instance()->phpType('anonymous159'));
    }

    public function testBase64BinaryXsd()
    {
        $this->assertTrue(self::instance()->isXsd('base64Binary'));
    }

    public function testBase64BinaryPhpType()
    {
        $this->assertSame('string', self::instance()->phpType('base64Binary'));
    }
}
