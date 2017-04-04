<?php

namespace WsdlToPhp\PackageGenerator\Tests\ConfigurationReader;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\ConfigurationReader\ServiceReservedMethod;

class ServiceReservedMethodTest extends TestCase
{
    /**
     * @return ServiceReservedMethod
     */
    public static function instance()
    {
        return ServiceReservedMethod::instance(__DIR__ . '/../resources/service_reserved_keywords.yml');
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
        $this->assertTrue(self::instance()->is('__construct'));
    }
    public function testIsgetSoapClient()
    {
        $this->assertTrue(self::instance()->is('getSoapClient'));
    }
    public function testIssetSoapClient()
    {
        $this->assertTrue(self::instance()->is('setSoapClient'));
    }
    public function testIsinitSoapClient()
    {
        $this->assertTrue(self::instance()->is('initSoapClient'));
    }
    public function testIsgetSoapClientClassName()
    {
        $this->assertTrue(self::instance()->is('getSoapClientClassName'));
    }
    public function testIsgetDefaultWsdlOptions()
    {
        $this->assertTrue(self::instance()->is('getDefaultWsdlOptions'));
    }
    public function testIssetLocation()
    {
        $this->assertTrue(self::instance()->is('setLocation'));
    }
    public function testIsgetLastRequest()
    {
        $this->assertTrue(self::instance()->is('getLastRequest'));
    }
    public function testIsgetLastResponse()
    {
        $this->assertTrue(self::instance()->is('getLastResponse'));
    }
    public function testIsgetLastXml()
    {
        $this->assertTrue(self::instance()->is('getLastXml'));
    }
    public function testIsgetLastRequestHeaders()
    {
        $this->assertTrue(self::instance()->is('getLastRequestHeaders'));
    }
    public function testIsgetLastResponseHeaders()
    {
        $this->assertTrue(self::instance()->is('getLastResponseHeaders'));
    }
    public function testIsgetLastHeaders()
    {
        $this->assertTrue(self::instance()->is('getLastHeaders'));
    }
    public function testIsgetFormatedXml()
    {
        $this->assertTrue(self::instance()->is('getFormatedXml'));
    }
    public function testIsconvertStringHeadersToArray()
    {
        $this->assertTrue(self::instance()->is('convertStringHeadersToArray'));
    }
    public function testIssetSoapHeader()
    {
        $this->assertTrue(self::instance()->is('setSoapHeader'));
    }
    public function testIssetHttpHeader()
    {
        $this->assertTrue(self::instance()->is('setHttpHeader'));
    }
    public function testIsgetLastError()
    {
        $this->assertTrue(self::instance()->is('getLastError'));
    }
    public function testIssetLastError()
    {
        $this->assertTrue(self::instance()->is('setLastError'));
    }
    public function testIssaveLastError()
    {
        $this->assertTrue(self::instance()->is('saveLastError'));
    }
    public function testIsgetLastErrorForMethod()
    {
        $this->assertTrue(self::instance()->is('getLastErrorForMethod'));
    }
    public function testIsgetResult()
    {
        $this->assertTrue(self::instance()->is('getResult'));
    }
    public function testIssetResult()
    {
        $this->assertTrue(self::instance()->is('setResult'));
    }
    public function testIs_set()
    {
        $this->assertFalse(self::instance()->is('_set'));
    }
    public function testIs_get()
    {
        $this->assertFalse(self::instance()->is('_get'));
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
