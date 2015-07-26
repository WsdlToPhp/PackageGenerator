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
    private static $wsdls = array();
    /**
     * @var Schema[]
     */
    private static $schemas = array();
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
    public static function bingInstance()
    {
        return self::getWsdl(self::wsdlBingPath());
    }
    /**
     * @return Wsdl
     */
    public static function ebayInstance()
    {
        return self::getWsdl(self::wsdlEbayPath());
    }
    /**
     * @return Wsdl
     */
    public static function partnerInstance($local = true)
    {
        return self::getWsdl(self::wsdlPartnerPath($local));
    }
    /**
     * @return Wsdl
     */
    public static function imageServiceViewInstance()
    {
        return self::getWsdl(self::wsdlImageViewServicePath());
    }
    /**
     * @return $schema
     */
    public static function imageServiceViewAvailRequestInstance()
    {
        return self::getSchema(self::schemaImageViewServiceAvailableImagesRequestPath());
    }
    /**
     *
     */
    public function testGetName()
    {
        $this->assertSame(self::wsdlBingPath(), self::bingInstance()->getName());
    }
    /**
     * @return Wsdl
     */
    public static function actonInstance()
    {
        return self::getWsdl(self::wsdlActonPath());
    }
    /**
     * @return Wsdl
     */
    public static function odigeoInstance()
    {
        return self::getWsdl(self::wsdlOdigeoPath());
    }
    /**
     * @return Wsdl
     */
    public static function orderContractInstance()
    {
        return self::getWsdl(self::wsdlOrderContractPath());
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
    public static function numericEnumerationInstance()
    {
        return self::getSchema(__DIR__ . '/../resources/numeric_enumeration.xml');
    }
}
