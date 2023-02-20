<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\ConfigurationReader;

use WsdlToPhp\PackageGenerator\ConfigurationReader\ServiceReservedMethod;
use WsdlToPhp\PackageGenerator\Tests\AbstractTestCase;

/**
 * @internal
 * @coversDefaultClass
 */
final class ServiceReservedMethodTest extends AbstractTestCase
{
    public static function instance(): ServiceReservedMethod
    {
        return ServiceReservedMethod::instance(__DIR__.'/../resources/service_reserved_keywords.yml');
    }

    public function testIsClassUpper(): void
    {
        $this->assertFalse(self::instance()->is('__CLASS__'));
    }

    public function testIsClassLower(): void
    {
        $this->assertFalse(self::instance()->is('__class__'));
    }

    public function testIsConstruct(): void
    {
        $this->assertTrue(self::instance()->is('__construct'));
    }

    public function testIsgetSoapClient(): void
    {
        $this->assertTrue(self::instance()->is('getSoapClient'));
    }

    public function testIssetSoapClient(): void
    {
        $this->assertTrue(self::instance()->is('setSoapClient'));
    }

    public function testIsinitSoapClient(): void
    {
        $this->assertTrue(self::instance()->is('initSoapClient'));
    }

    public function testIsgetSoapClientClassName(): void
    {
        $this->assertTrue(self::instance()->is('getSoapClientClassName'));
    }

    public function testIsgetDefaultWsdlOptions(): void
    {
        $this->assertTrue(self::instance()->is('getDefaultWsdlOptions'));
    }

    public function testIssetLocation(): void
    {
        $this->assertTrue(self::instance()->is('setLocation'));
    }

    public function testIsgetLastRequest(): void
    {
        $this->assertTrue(self::instance()->is('getLastRequest'));
    }

    public function testIsgetLastResponse(): void
    {
        $this->assertTrue(self::instance()->is('getLastResponse'));
    }

    public function testIsgetLastXml(): void
    {
        $this->assertTrue(self::instance()->is('getLastXml'));
    }

    public function testIsgetLastRequestHeaders(): void
    {
        $this->assertTrue(self::instance()->is('getLastRequestHeaders'));
    }

    public function testIsgetLastResponseHeaders(): void
    {
        $this->assertTrue(self::instance()->is('getLastResponseHeaders'));
    }

    public function testIsgetLastHeaders(): void
    {
        $this->assertTrue(self::instance()->is('getLastHeaders'));
    }

    public function testIsgetFormattedXml(): void
    {
        $this->assertTrue(self::instance()->is('getFormattedXml'));
    }

    public function testIsconvertStringHeadersToArray(): void
    {
        $this->assertTrue(self::instance()->is('convertStringHeadersToArray'));
    }

    public function testIssetSoapHeader(): void
    {
        $this->assertTrue(self::instance()->is('setSoapHeader'));
    }

    public function testIssetHttpHeader(): void
    {
        $this->assertTrue(self::instance()->is('setHttpHeader'));
    }

    public function testIsgetLastError(): void
    {
        $this->assertTrue(self::instance()->is('getLastError'));
    }

    public function testIssetLastError(): void
    {
        $this->assertTrue(self::instance()->is('setLastError'));
    }

    public function testIssaveLastError(): void
    {
        $this->assertTrue(self::instance()->is('saveLastError'));
    }

    public function testIsgetLastErrorForMethod(): void
    {
        $this->assertTrue(self::instance()->is('getLastErrorForMethod'));
    }

    public function testIsgetResult(): void
    {
        $this->assertTrue(self::instance()->is('getResult'));
    }

    public function testIssetResult(): void
    {
        $this->assertTrue(self::instance()->is('setResult'));
    }

    public function testIsSet(): void
    {
        $this->assertFalse(self::instance()->is('_set'));
    }

    public function testIsGet(): void
    {
        $this->assertFalse(self::instance()->is('_get'));
    }

    public function testIsgetAttributeName(): void
    {
        $this->assertFalse(self::instance()->is('getAttributeName'));
    }

    public function testIslength(): void
    {
        $this->assertFalse(self::instance()->is('length'));
    }

    public function testIscount(): void
    {
        $this->assertFalse(self::instance()->is('count'));
    }

    public function testIscurrent(): void
    {
        $this->assertFalse(self::instance()->is('current'));
    }

    public function testIsnext(): void
    {
        $this->assertFalse(self::instance()->is('next'));
    }

    public function testIsrewind(): void
    {
        $this->assertFalse(self::instance()->is('rewind'));
    }

    public function testIsvalid(): void
    {
        $this->assertFalse(self::instance()->is('valid'));
    }

    public function testIskey(): void
    {
        $this->assertFalse(self::instance()->is('key'));
    }

    public function testIsitem(): void
    {
        $this->assertFalse(self::instance()->is('item'));
    }

    public function testIsadd(): void
    {
        $this->assertFalse(self::instance()->is('add'));
    }

    public function testIsfirst(): void
    {
        $this->assertFalse(self::instance()->is('first'));
    }

    public function testIslast(): void
    {
        $this->assertFalse(self::instance()->is('last'));
    }

    public function testIsoffsetExists(): void
    {
        $this->assertFalse(self::instance()->is('offsetExists'));
    }

    public function testIsoffsetGet(): void
    {
        $this->assertFalse(self::instance()->is('offsetGet'));
    }

    public function testIsoffsetSet(): void
    {
        $this->assertFalse(self::instance()->is('offsetSet'));
    }

    public function testIsoffsetUnset(): void
    {
        $this->assertFalse(self::instance()->is('offsetUnset'));
    }

    public function testIsgetInternArray(): void
    {
        $this->assertFalse(self::instance()->is('getInternArray'));
    }

    public function testIssetInternArray(): void
    {
        $this->assertFalse(self::instance()->is('setInternArray'));
    }

    public function testIsgetInternArrayOffset(): void
    {
        $this->assertFalse(self::instance()->is('getInternArrayOffset'));
    }

    public function testIsinitInternArray(): void
    {
        $this->assertFalse(self::instance()->is('initInternArray'));
    }

    public function testIssetInternArrayOffset(): void
    {
        $this->assertFalse(self::instance()->is('setInternArrayOffset'));
    }

    public function testIsgetInternArrayIsArray(): void
    {
        $this->assertFalse(self::instance()->is('getInternArrayIsArray'));
    }

    public function testIssetInternArrayIsArray(): void
    {
        $this->assertFalse(self::instance()->is('setInternArrayIsArray'));
    }

    public function testUppercasePHPReservedKeyword(): void
    {
        $this->assertFalse(self::instance()->is('Do'));
    }

    public function testUppercaseIsoffsetGet(): void
    {
        $this->assertFalse(self::instance()->is('OffsetGet'));
    }
}
