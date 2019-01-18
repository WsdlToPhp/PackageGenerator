<?php

namespace WsdlToPhp\PackageGenerator\Tests\Model;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\Model\Schema;

class WsdlTest extends TestCase
{
    /**
     * @var Wsdl[]
     */
    private static $wsdls = [];
    /**
     * @var Schema[]
     */
    private static $schemas = [];
    /**
     * @param string $wsdlPath
     * @return Wsdl
     */
    public static function getWsdl($wsdlPath)
    {
        if (!isset(self::$wsdls[$wsdlPath])) {
            self::$wsdls[$wsdlPath] = new Wsdl(self::getInstance($wsdlPath), $wsdlPath, file_get_contents($wsdlPath));
        }
        return self::$wsdls[$wsdlPath];
    }
    /**
     * @param string $schemaPath
     * @return Schema
     */
    public static function getSchema($schemaPath)
    {
        if (!isset(self::$schemas[$schemaPath])) {
            self::$schemas[$schemaPath] = new Schema(self::getBingGeneratorInstance(), $schemaPath, file_get_contents($schemaPath));
        }
        return self::$schemas[$schemaPath];
    }
    /**
     * @return Wsdl
     */
    public static function wsdlBingInstance()
    {
        return self::getWsdl(self::wsdlBingPath());
    }
    /**
     * @return Wsdl
     */
    public static function wsdlEbayInstance()
    {
        return self::getWsdl(self::wsdlEbayPath());
    }
    /**
     * @return Wsdl
     */
    public static function wsdlPartnerInstance($local = true)
    {
        return self::getWsdl(self::wsdlPartnerPath($local));
    }
    /**
     * @return Wsdl
     */
    public static function wsdlImageServiceViewInstance()
    {
        return self::getWsdl(self::wsdlImageViewServicePath());
    }
    /**
     * @return $schema
     */
    public static function wsdlImageServiceViewAvailRequestInstance()
    {
        return self::getSchema(self::schemaImageViewServiceAvailableImagesRequestPath());
    }
    /**
     *
     */
    public function testGetName()
    {
        $this->assertSame(self::wsdlBingPath(), self::wsdlBingInstance()->getName());
    }
    /**
     * @return Wsdl
     */
    public static function wsdlActonInstance()
    {
        return self::getWsdl(self::wsdlActonPath());
    }
    /**
     * @return Wsdl
     */
    public static function wsdlOdigeoInstance()
    {
        return self::getWsdl(self::wsdlOdigeoPath());
    }
    /**
     * @return Wsdl
     */
    public static function wsdlOrderContractInstance()
    {
        return self::getWsdl(self::wsdlOrderContractPath());
    }
    /**
     * @return Wsdl
     */
    public static function wsdlWhlInstance()
    {
        return self::getWsdl(self::wsdlWhlPath());
    }
    /**
     * @return Wsdl
     */
    public static function wsdlDeliveryInstance()
    {
        return self::getWsdl(self::wsdlDeliveryServicePath());
    }
    /**
     * @return Wsdl
     */
    public static function wsdlEwsInstance()
    {
        return self::getWsdl(self::wsdlEwsPath());
    }
    /**
     * @return Wsdl
     */
    public static function schemaEwsTypesInstance()
    {
        return self::getSchema(self::schemaEwsTypesPath());
    }
    /**
     * @return Wsdl
     */
    public static function schemaEwsMessagesInstance()
    {
        return self::getSchema(self::schemaEwsMessagesPath());
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testException()
    {
        new Wsdl(self::getBingGeneratorInstance(), __DIR__ . '/../resources/empty.wsdl', file_get_contents(__DIR__ . '/../resources/empty.wsdl'));
    }
    /**
     * @return Schema
     */
    public static function wsdlNumericEnumerationInstance()
    {
        return self::getSchema(__DIR__ . '/../resources/numeric_enumeration.xml');
    }
    /**
     *
     */
    public function testJsonSerialize()
    {
        $this->assertSame([
            'inheritance' => '',
            'abstract' => false,
            'meta' => [],
            'name' => self::wsdlBingPath(),
            '__CLASS__' => 'WsdlToPhp\PackageGenerator\Model\Wsdl',
        ], self::getWsdl(self::wsdlBingPath())->jsonSerialize());
    }
}
