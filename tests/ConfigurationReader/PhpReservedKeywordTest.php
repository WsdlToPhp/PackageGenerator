<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\ConfigurationReader;

use WsdlToPhp\PackageGenerator\ConfigurationReader\PhpReservedKeyword;
use WsdlToPhp\PackageGenerator\Tests\AbstractTestCase;

/**
 * @internal
 * @coversDefaultClass
 */
final class PhpReservedKeywordTest extends AbstractTestCase
{
    public static function instance(): PhpReservedKeyword
    {
        return PhpReservedKeyword::instance(__DIR__.'/../resources/php_reserved_keywords.yml');
    }

    public function testIsClassUpper(): void
    {
        $this->assertTrue(self::instance()->is('__CLASS__'));
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
        $this->assertFalse(self::instance()->is('getSoapClient'));
    }

    public function testIssetSoapClient(): void
    {
        $this->assertFalse(self::instance()->is('setSoapClient'));
    }

    public function testIsinitSoapClient(): void
    {
        $this->assertFalse(self::instance()->is('initSoapClient'));
    }

    public function testIsgetSoapClientClassName(): void
    {
        $this->assertFalse(self::instance()->is('getSoapClientClassName'));
    }

    public function testIsgetDefaultWsdlOptions(): void
    {
        $this->assertFalse(self::instance()->is('getDefaultWsdlOptions'));
    }

    public function testIssetLocation(): void
    {
        $this->assertFalse(self::instance()->is('setLocation'));
    }

    public function testIsgetLastRequest(): void
    {
        $this->assertFalse(self::instance()->is('getLastRequest'));
    }

    public function testIsgetLastResponse(): void
    {
        $this->assertFalse(self::instance()->is('getLastResponse'));
    }

    public function testIsgetLastXml(): void
    {
        $this->assertFalse(self::instance()->is('getLastXml'));
    }

    public function testIsgetLastRequestHeaders(): void
    {
        $this->assertFalse(self::instance()->is('getLastRequestHeaders'));
    }

    public function testIsgetLastResponseHeaders(): void
    {
        $this->assertFalse(self::instance()->is('getLastResponseHeaders'));
    }

    public function testIsgetLastHeaders(): void
    {
        $this->assertFalse(self::instance()->is('getLastHeaders'));
    }

    public function testIsgetFormattedXml(): void
    {
        $this->assertFalse(self::instance()->is('getFormattedXml'));
    }

    public function testIsconvertStringHeadersToArray(): void
    {
        $this->assertFalse(self::instance()->is('convertStringHeadersToArray'));
    }

    public function testIssetSoapHeader(): void
    {
        $this->assertFalse(self::instance()->is('setSoapHeader'));
    }

    public function testIssetHttpHeader(): void
    {
        $this->assertFalse(self::instance()->is('setHttpHeader'));
    }

    public function testIsgetLastError(): void
    {
        $this->assertFalse(self::instance()->is('getLastError'));
    }

    public function testIssetLastError(): void
    {
        $this->assertFalse(self::instance()->is('setLastError'));
    }

    public function testIssaveLastError(): void
    {
        $this->assertFalse(self::instance()->is('saveLastError'));
    }

    public function testIsgetLastErrorForMethod(): void
    {
        $this->assertFalse(self::instance()->is('getLastErrorForMethod'));
    }

    public function testIsgetResult(): void
    {
        $this->assertFalse(self::instance()->is('getResult'));
    }

    public function testIssetResult(): void
    {
        $this->assertFalse(self::instance()->is('setResult'));
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
        $this->assertTrue(self::instance()->is('Do'));
    }

    public function testUppercaseIsoffsetGet(): void
    {
        $this->assertFalse(self::instance()->is('OffsetGet'));
    }

    public function testException(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        PhpReservedKeyword::instance(__DIR__.'/../resources/bad_php_reserved_keywords.yml');
    }

    public function testExceptionForUnexistingFile(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        PhpReservedKeyword::instance(__DIR__.'/../resources/bad_php_reserved_keywords');
    }

    public function testIntMustBeReserved(): void
    {
        $this->assertTrue(self::instance()->is('int'));
    }

    public function testFloatMustBeReserved(): void
    {
        $this->assertTrue(self::instance()->is('float'));
    }

    public function testBoolMustBeReserved(): void
    {
        $this->assertTrue(self::instance()->is('bool'));
    }

    public function testStringMustBeReserved(): void
    {
        $this->assertTrue(self::instance()->is('string'));
    }

    public function testTrueMustBeReserved(): void
    {
        $this->assertTrue(self::instance()->is('true'));
    }

    public function testFalseMustBeReserved(): void
    {
        $this->assertTrue(self::instance()->is('false'));
    }

    public function testNullMustBeReserved(): void
    {
        $this->assertTrue(self::instance()->is('null'));
    }

    public function testVoidMustBeReserved(): void
    {
        $this->assertTrue(self::instance()->is('void'));
    }

    public function testIterableMustBeReserved(): void
    {
        $this->assertTrue(self::instance()->is('iterable'));
    }

    public function testObjectMustBeReserved(): void
    {
        $this->assertTrue(self::instance()->is('object'));
    }

    public function testResourceMustBeReserved(): void
    {
        $this->assertTrue(self::instance()->is('resource'));
    }

    public function testMixedMustBeReserved(): void
    {
        $this->assertTrue(self::instance()->is('mixed'));
    }

    public function testNumericMustBeReserved(): void
    {
        $this->assertTrue(self::instance()->is('numeric'));
    }
}
