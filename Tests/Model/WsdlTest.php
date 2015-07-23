<?php

namespace WsdlToPhp\PackageGenerator\Tests\Model;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Model\Wsdl;

class WsdlTest extends TestCase
{
    /**
     * @return Wsdl
     */
    public static function bingInstance()
    {
        return new Wsdl(self::getBingGeneratorInstance(), self::wsdlBingPath(), file_get_contents(self::wsdlBingPath()));
    }
    /**
     * @return Wsdl
     */
    public static function ebayInstance()
    {
        return new Wsdl(self::getBingGeneratorInstance(), self::wsdlEbayPath(), file_get_contents(self::wsdlEbayPath()));
    }
    /**
     * @return Wsdl
     */
    public static function partnerInstance($local = true)
    {
        return new Wsdl(self::getBingGeneratorInstance(), self::wsdlPartnerPath(), file_get_contents(self::wsdlPartnerPath($local)));
    }
    /**
     * @return Wsdl
     */
    public static function imageServiceViewInstance()
    {
        return new Wsdl(self::getBingGeneratorInstance(), self::wsdlImageViewServicePath(), file_get_contents(self::wsdlImageViewServicePath()));
    }
    /**
     * @return Wsdl
     */
    public static function imageServiceViewAvailRequestInstance()
    {
        return new Wsdl(self::getBingGeneratorInstance(), self::schemaImageViewServiceAvailableImagesRequestPath(), file_get_contents(self::schemaImageViewServiceAvailableImagesRequestPath()));
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
        return new Wsdl(self::getBingGeneratorInstance(), self::wsdlActonPath(), file_get_contents(self::wsdlActonPath()));
    }
    /**
     * @return Wsdl
     */
    public static function odigeoInstance()
    {
        return new Wsdl(self::getBingGeneratorInstance(), self::wsdlOdigeoPath(), file_get_contents(self::wsdlOdigeoPath()));
    }
    /**
     * @return Wsdl
     */
    public static function orderContractInstance()
    {
        return new Wsdl(self::getBingGeneratorInstance(), self::wsdlOrderContractPath(), file_get_contents(self::wsdlOrderContractPath()));
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testException()
    {
        new Wsdl(self::getBingGeneratorInstance(), __DIR__ . '/../resources/empty.wsdl', file_get_contents(__DIR__ . '/../resources/empty.wsdl'));
    }
    /**
     * @return Wsdl
     */
    public static function numericEnumerationInstance()
    {
        return new Wsdl(self::getBingGeneratorInstance(), __DIR__ . '/../resources/numeric_enumeration.xml', file_get_contents(__DIR__ . '/../resources/numeric_enumeration.xml'));
    }
}
