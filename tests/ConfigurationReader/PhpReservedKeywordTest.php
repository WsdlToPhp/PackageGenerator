<?php

namespace WsdlToPhp\PackageGenerator\Tests\ConfigurationReader;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\ConfigurationReader\PhpReservedKeyword;

class PhpReservedKeywordTest extends TestCase
{
    /**
     * @return PhpReservedKeyword
     */
    public static function instance()
    {
        return PhpReservedKeyword::instance(__DIR__ . '/../resources/php_reserved_keywords.yml');
    }
    /**
     *
     */
    public function testIs__CLASS__()
    {
        $this->assertTrue(self::instance()->is('__CLASS__'));
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
        $this->assertTrue(self::instance()->is('Do'));
    }
    public function testUppercaseIsoffsetGet()
    {
        $this->assertFalse(self::instance()->is('OffsetGet'));
    }
    /**
     * @expectedException InvalidArgumentException
     */
    public function testException()
    {
        PhpReservedKeyword::instance(__DIR__ . '/../resources/bad_php_reserved_keywords.yml');
    }
    /**
     * @expectedException InvalidArgumentException
     */
    public function testExceptionForUnexistingFile()
    {
        PhpReservedKeyword::instance(__DIR__ . '/../resources/bad_php_reserved_keywords');
    }
    public function testIntMustBeReserved()
    {
        $this->assertTrue(self::instance()->is('int'));
    }
    public function testFloatMustBeReserved()
    {
        $this->assertTrue(self::instance()->is('float'));
    }
    public function testBoolMustBeReserved()
    {
        $this->assertTrue(self::instance()->is('bool'));
    }
    public function testStringMustBeReserved()
    {
        $this->assertTrue(self::instance()->is('string'));
    }
    public function testTrueMustBeReserved()
    {
        $this->assertTrue(self::instance()->is('true'));
    }
    public function testFalseMustBeReserved()
    {
        $this->assertTrue(self::instance()->is('false'));
    }
    public function testNullMustBeReserved()
    {
        $this->assertTrue(self::instance()->is('null'));
    }
    public function testVoidMustBeReserved()
    {
        $this->assertTrue(self::instance()->is('void'));
    }
    public function testIterableMustBeReserved()
    {
        $this->assertTrue(self::instance()->is('iterable'));
    }
    public function testObjectMustBeReserved()
    {
        $this->assertTrue(self::instance()->is('object'));
    }
    public function testResourceMustBeReserved()
    {
        $this->assertTrue(self::instance()->is('resource'));
    }
    public function testMixedMustBeReserved()
    {
        $this->assertTrue(self::instance()->is('mixed'));
    }
    public function testNumericMustBeReserved()
    {
        $this->assertTrue(self::instance()->is('numeric'));
    }
}
