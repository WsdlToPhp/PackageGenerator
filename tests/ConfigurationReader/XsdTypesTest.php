<?php
namespace WsdlToPhp\PackageGenerator\Tests\ConfigurationReader;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\ConfigurationReader\XsdTypes;

class XsdTypesTest extends TestCase
{
    /**
     * @return XsdTypes
     */
    public static function instance()
    {
        return XsdTypes::instance(__DIR__ . '/../resources/xsd_types.yml');
    }
    /**
     * @expectedException InvalidArgumentException
     */
    public function testException()
    {
        XsdTypes::instance(__DIR__ . '/../resources/bad_xsd_types.yml');
    }
    /**
     * @expectedException InvalidArgumentException
     */
    public function testExceptionForUnexistingFile()
    {
        XsdTypes::instance(__DIR__ . '/../resources/bad_xsd_types');
    }
    /**
     *
     */
    public function testIsXsdTrue()
    {
        $this->assertTrue(self::instance()->isXsd('duration'));
    }
    /**
     *
     */
    public function testIsXsdFalse()
    {
        $this->assertFalse(self::instance()->isXsd('Duration'));
    }
    /**
     *
     */
    public function testPhpXsd()
    {
        $this->assertSame('string', self::instance()->phpType('duration'));
    }
    /**
     *
     */
    public function testPhpNonXsd()
    {
        $this->assertSame('', self::instance()->phpType('Duration'));
    }
    /**
     *
     */
    public function testIsAnonymous()
    {
        $this->assertTrue(self::instance()->isAnonymous('anonymous159'));
    }
    /**
     *
     */
    public function testAnonymousPhpType()
    {
        $this->assertSame('string', self::instance()->phpType('anonymous159'));
    }
    /**
     *
     */
    public function testBase64BinaryXsd()
    {
        $this->assertTrue(self::instance()->isXsd('base64Binary'));
    }
    /**
     *
     */
    public function testBase64BinaryPhpType()
    {
        $this->assertSame('string', self::instance()->phpType('base64Binary'));
    }
}
