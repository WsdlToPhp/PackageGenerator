<?php

namespace WsdlToPhp\PackageGenerator\Tests\ConfigurationReader;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\ConfigurationReader\StructReservedMethod;

class StructReservedMethodTest extends TestCase
{
    /**
     * @return StructReservedMethod
     */
    public static function instance()
    {
        return StructReservedMethod::instance(__DIR__ . '/../resources/struct_reserved_keywords.yml');
    }
    /**
     *
     */
    public function testIs__CLASS__()
    {
        $this->assertFalse(self::instance()->is('__CLASS__'));
    }
    /**
     *
     */
    public function testIs___class___()
    {
        $this->assertFalse(self::instance()->is('__class__'));
    }
    public function testIs__construct()
    {
        $this->assertFalse(self::instance()->is('__construct'));
    }
    public function testIsgetSoapClient()
    {
        $this->assertFalse(self::instance()->is('getSoapClient'));
    }
    public function testIssetSoapClient()
    {
        $this->assertFalse(self::instance()->is('setSoapClient'));
    }
    public function testIsinitSoapClient()
    {
        $this->assertFalse(self::instance()->is('initSoapClient'));
    }
    public function testIsgetSoapClientClassName()
    {
        $this->assertFalse(self::instance()->is('getSoapClientClassName'));
    }
    public function testIsgetDefaultWsdlOptions()
    {
        $this->assertFalse(self::instance()->is('getDefaultWsdlOptions'));
    }
    public function testIssetLocation()
    {
        $this->assertFalse(self::instance()->is('setLocation'));
    }
    public function testIsgetLastRequest()
    {
        $this->assertFalse(self::instance()->is('getLastRequest'));
    }
    public function testIsgetLastResponse()
    {
        $this->assertFalse(self::instance()->is('getLastResponse'));
    }
    public function testIsgetLastXml()
    {
        $this->assertFalse(self::instance()->is('getLastXml'));
    }
    public function testIsgetLastRequestHeaders()
    {
        $this->assertFalse(self::instance()->is('getLastRequestHeaders'));
    }
    public function testIsgetLastResponseHeaders()
    {
        $this->assertFalse(self::instance()->is('getLastResponseHeaders'));
    }
    public function testIsgetLastHeaders()
    {
        $this->assertFalse(self::instance()->is('getLastHeaders'));
    }
    public function testIsgetFormatedXml()
    {
        $this->assertFalse(self::instance()->is('getFormatedXml'));
    }
    public function testIsconvertStringHeadersToArray()
    {
        $this->assertFalse(self::instance()->is('convertStringHeadersToArray'));
    }
    public function testIssetSoapHeader()
    {
        $this->assertFalse(self::instance()->is('setSoapHeader'));
    }
    public function testIssetHttpHeader()
    {
        $this->assertFalse(self::instance()->is('setHttpHeader'));
    }
    public function testIsgetLastError()
    {
        $this->assertFalse(self::instance()->is('getLastError'));
    }
    public function testIssetLastError()
    {
        $this->assertFalse(self::instance()->is('setLastError'));
    }
    public function testIssaveLastError()
    {
        $this->assertFalse(self::instance()->is('saveLastError'));
    }
    public function testIsgetLastErrorForMethod()
    {
        $this->assertFalse(self::instance()->is('getLastErrorForMethod'));
    }
    public function testIsgetResult()
    {
        $this->assertFalse(self::instance()->is('getResult'));
    }
    public function testIssetResult()
    {
        $this->assertFalse(self::instance()->is('setResult'));
    }
    public function testIs_set()
    {
        $this->assertTrue(self::instance()->is('_set'));
    }
    public function testIs_get()
    {
        $this->assertTrue(self::instance()->is('_get'));
    }
    public function testIsgetAttributeName()
    {
        $this->assertFalse(self::instance()->is('getAttributeName'));
    }
    public function testIslength()
    {
        $this->assertFalse(self::instance()->is('length'));
    }
    public function testIscount()
    {
        $this->assertFalse(self::instance()->is('count'));
    }
    public function testIscurrent()
    {
        $this->assertFalse(self::instance()->is('current'));
    }
    public function testIsnext()
    {
        $this->assertFalse(self::instance()->is('next'));
    }
    public function testIsrewind()
    {
        $this->assertFalse(self::instance()->is('rewind'));
    }
    public function testIsvalid()
    {
        $this->assertFalse(self::instance()->is('valid'));
    }
    public function testIskey()
    {
        $this->assertFalse(self::instance()->is('key'));
    }
    public function testIsitem()
    {
        $this->assertFalse(self::instance()->is('item'));
    }
    public function testIsadd()
    {
        $this->assertFalse(self::instance()->is('add'));
    }
    public function testIsfirst()
    {
        $this->assertFalse(self::instance()->is('first'));
    }
    public function testIslast()
    {
        $this->assertFalse(self::instance()->is('last'));
    }
    public function testIsoffsetExists()
    {
        $this->assertFalse(self::instance()->is('offsetExists'));
    }
    public function testIsoffsetGet()
    {
        $this->assertFalse(self::instance()->is('offsetGet'));
    }
    public function testIsoffsetSet()
    {
        $this->assertFalse(self::instance()->is('offsetSet'));
    }
    public function testIsoffsetUnset()
    {
        $this->assertFalse(self::instance()->is('offsetUnset'));
    }
    public function testIsgetInternArray()
    {
        $this->assertFalse(self::instance()->is('getInternArray'));
    }
    public function testIssetInternArray()
    {
        $this->assertFalse(self::instance()->is('setInternArray'));
    }
    public function testIsgetInternArrayOffset()
    {
        $this->assertFalse(self::instance()->is('getInternArrayOffset'));
    }
    public function testIsinitInternArray()
    {
        $this->assertFalse(self::instance()->is('initInternArray'));
    }
    public function testIssetInternArrayOffset()
    {
        $this->assertFalse(self::instance()->is('setInternArrayOffset'));
    }
    public function testIsgetInternArrayIsArray()
    {
        $this->assertFalse(self::instance()->is('getInternArrayIsArray'));
    }
    public function testIssetInternArrayIsArray()
    {
        $this->assertFalse(self::instance()->is('setInternArrayIsArray'));
    }
    public function testUppercasePHPReservedKeyword()
    {
        $this->assertFalse(self::instance()->is('Do'));
    }
    public function testUppercaseIsoffsetGet()
    {
        $this->assertFalse(self::instance()->is('OffsetGet'));
    }
}
