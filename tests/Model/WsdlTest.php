<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Model;

use WsdlToPhp\PackageGenerator\Model\Schema;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\Tests\AbstractTestCase;

/**
 * @internal
 * @coversDefaultClass
 */
final class WsdlTest extends AbstractTestCase
{
    /**
     * @var Wsdl[]
     */
    private static array $wsdls = [];

    /**
     * @var Schema[]
     */
    private static array $schemas = [];

    public static function getWsdl(string $wsdlPath): Wsdl
    {
        if (!isset(self::$wsdls[$wsdlPath])) {
            self::$wsdls[$wsdlPath] = new Wsdl(self::getInstance($wsdlPath), $wsdlPath, file_get_contents($wsdlPath));
        }

        return self::$wsdls[$wsdlPath];
    }

    public static function getSchema(string $schemaPath): Schema
    {
        if (!isset(self::$schemas[$schemaPath])) {
            self::$schemas[$schemaPath] = new Schema(self::getBingGeneratorInstance(), $schemaPath, file_get_contents($schemaPath));
        }

        return self::$schemas[$schemaPath];
    }

    public static function wsdlBingInstance(): Wsdl
    {
        return self::getWsdl(self::wsdlBingPath());
    }

    public static function wsdlEbayInstance(): Wsdl
    {
        return self::getWsdl(self::wsdlEbayPath());
    }

    public static function wsdlPartnerInstance(bool $local = true): Wsdl
    {
        return self::getWsdl(self::wsdlPartnerPath($local));
    }

    public static function wsdlImageServiceViewInstance(): Wsdl
    {
        return self::getWsdl(self::wsdlImageViewServicePath());
    }

    public static function wsdlImageServiceViewAvailRequestInstance(): Schema
    {
        return self::getSchema(self::schemaImageViewServiceAvailableImagesRequestPath());
    }

    public function testGetName(): void
    {
        $this->assertSame(self::wsdlBingPath(), self::wsdlBingInstance()->getName());
    }

    public static function wsdlActonInstance(): Wsdl
    {
        return self::getWsdl(self::wsdlActonPath());
    }

    public static function wsdlOdigeoInstance(): Wsdl
    {
        return self::getWsdl(self::wsdlOdigeoPath());
    }

    public static function wsdlOrderContractInstance(): Wsdl
    {
        return self::getWsdl(self::wsdlOrderContractPath());
    }

    public static function wsdlWhlInstance(): Wsdl
    {
        return self::getWsdl(self::wsdlWhlPath());
    }

    public static function wsdlDeliveryInstance(): Wsdl
    {
        return self::getWsdl(self::wsdlDeliveryServicePath());
    }

    public static function wsdlEwsInstance(): Wsdl
    {
        return self::getWsdl(self::wsdlEwsPath());
    }

    public static function schemaEwsTypesInstance(): Schema
    {
        return self::getSchema(self::schemaEwsTypesPath());
    }

    public static function schemaEwsMessagesInstance(): Schema
    {
        return self::getSchema(self::schemaEwsMessagesPath());
    }

    public function testException(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        new Wsdl(self::getBingGeneratorInstance(), __DIR__.'/../resources/empty.wsdl', file_get_contents(__DIR__.'/../resources/empty.wsdl'));
    }

    public static function wsdlNumericEnumerationInstance(): Schema
    {
        return self::getSchema(__DIR__.'/../resources/numeric_enumeration.xml');
    }

    public function testJsonSerialize(): void
    {
        $this->assertSame([
            'inheritance' => '',
            'abstract' => false,
            'meta' => [],
            'name' => self::wsdlBingPath(),
            '__CLASS__' => Wsdl::class,
        ], self::getWsdl(self::wsdlBingPath())->jsonSerialize());
    }
}
