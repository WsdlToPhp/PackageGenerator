<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagHeader;

/**
 * @internal
 * @coversDefaultClass
 */
final class TagHeaderTest extends WsdlParser
{
    public static function imageViewServiceInstanceParser(): TagHeader
    {
        return new TagHeader(self::generatorInstance(self::wsdlImageViewServicePath()));
    }

    public static function actonInstanceParser(): TagHeader
    {
        return new TagHeader(self::generatorInstance(self::wsdlActonPath()));
    }

    public static function paypalInstanceParser(): TagHeader
    {
        return new TagHeader(self::generatorInstance(self::wsdlPayPalPath()));
    }

    public static function ewsInstanceParser(): TagHeader
    {
        return new TagHeader(self::generatorInstance(self::wsdlEwsPath(), true, false, false));
    }

    public static function unitTestInstanceParser(): TagHeader
    {
        return new TagHeader(self::generatorInstance(self::wsdlUnitTestsPath()));
    }

    public function testParseImageViewService(): void
    {
        $tagHeaderParser = self::imageViewServiceInstanceParser();

        $tagHeaderParser->parse();

        $ok = false;
        $services = $tagHeaderParser->getGenerator()->getServices();
        if ($services->count() > 0) {
            foreach ($services as $service) {
                if ('Image' === $service->getName()) {
                    foreach ($service->getMethods() as $method) {
                        $this->assertSame([
                            'auth',
                        ], $method->getMetaValue(TagHeader::META_SOAP_HEADER_NAMES));
                        $this->assertSame([
                            'http://ws.estesexpress.com/imageview',
                        ], $method->getMetaValue(TagHeader::META_SOAP_HEADER_NAMESPACES));
                        $this->assertSame([
                            'AuthenticationType',
                        ], $method->getMetaValue(TagHeader::META_SOAP_HEADER_TYPES));
                        $this->assertSame([
                            'required',
                        ], $method->getMetaValue(TagHeader::META_SOAP_HEADERS));
                        $ok = true;
                    }
                }
            }
        }
        $this->assertTrue((bool) $ok);
    }

    public function testParseActon(): void
    {
        $tagHeaderParser = self::actonInstanceParser();

        $tagHeaderParser->parse();

        $ok = false;
        $services = $tagHeaderParser->getGenerator()->getServices();
        if ($services->count() > 0) {
            foreach ($services as $service) {
                if ('Send' === $service->getName()) {
                    foreach ($service->getMethods() as $method) {
                        $this->assertSame([
                            'SessionHeader',
                            'ClusterHeader',
                        ], $method->getMetaValue(TagHeader::META_SOAP_HEADER_NAMES));
                        $this->assertSame([
                            'urn:api.actonsoftware.com',
                            'urn:api.actonsoftware.com',
                        ], $method->getMetaValue(TagHeader::META_SOAP_HEADER_NAMESPACES));
                        $this->assertSame([
                            'SessionHeader',
                            'ClusterHeader',
                        ], $method->getMetaValue(TagHeader::META_SOAP_HEADER_TYPES));
                        $this->assertSame([
                            'optional',
                            'optional',
                        ], $method->getMetaValue(TagHeader::META_SOAP_HEADERS));
                        $ok = true;
                    }
                } elseif ('List' === $service->getName()) {
                    foreach ($service->getMethods() as $method) {
                        $this->assertSame([
                            'SessionHeader',
                            'ClusterHeader',
                        ], $method->getMetaValue(TagHeader::META_SOAP_HEADER_NAMES));
                        $this->assertSame([
                            'urn:api.actonsoftware.com',
                            'urn:api.actonsoftware.com',
                        ], $method->getMetaValue(TagHeader::META_SOAP_HEADER_NAMESPACES));
                        $this->assertSame([
                            'SessionHeader',
                            'ClusterHeader',
                        ], $method->getMetaValue(TagHeader::META_SOAP_HEADER_TYPES));
                        $this->assertSame([
                            'optional',
                            'required',
                        ], $method->getMetaValue(TagHeader::META_SOAP_HEADERS));
                        $ok = true;
                    }
                } elseif ('Login' === $service->getName()) {
                    foreach ($service->getMethods() as $method) {
                        $this->assertSame([
                            'ClusterHeader',
                        ], $method->getMetaValue(TagHeader::META_SOAP_HEADER_NAMES));
                        $this->assertSame([
                            'urn:api.actonsoftware.com',
                        ], $method->getMetaValue(TagHeader::META_SOAP_HEADER_NAMESPACES));
                        $this->assertSame([
                            'ClusterHeader',
                        ], $method->getMetaValue(TagHeader::META_SOAP_HEADER_TYPES));
                        $this->assertSame([
                            'required',
                        ], $method->getMetaValue(TagHeader::META_SOAP_HEADERS));
                        $ok = true;
                    }
                }
            }
        }
        $this->assertTrue((bool) $ok);
    }

    public function testParsePayPal(): void
    {
        $tagHeaderParser = self::paypalInstanceParser();

        $tagHeaderParser->parse();

        $count = 0;
        $services = $tagHeaderParser->getGenerator()->getServices();
        if ($services->count() > 0) {
            foreach ($services as $service) {
                foreach ($service->getMethods() as $method) {
                    $this->assertSame([
                        'RequesterCredentials',
                    ], $method->getMetaValue(TagHeader::META_SOAP_HEADER_NAMES));
                    $this->assertSame([
                        'urn:ebay:api:PayPalAPI',
                    ], $method->getMetaValue(TagHeader::META_SOAP_HEADER_NAMESPACES));
                    $this->assertSame([
                        'CustomSecurityHeaderType',
                    ], $method->getMetaValue(TagHeader::META_SOAP_HEADER_TYPES));
                    $this->assertSame([
                        'required',
                    ], $method->getMetaValue(TagHeader::META_SOAP_HEADERS));
                    ++$count;
                }
            }
        }
        $this->assertSame(57, $count);
    }

    public function testParseEws(): void
    {
        $tagHeaderParser = self::ewsInstanceParser();
        // parsing the whole structs/functions is too long for only tests purpose!
        $tagHeaderParser
            ->getGenerator()
            ->getServices()
            ->addService('Update', 'UpdateItemInRecoverableItems', 'string', 'string')
        ;

        $tagHeaderParser->parse();

        $count = 0;
        $services = $tagHeaderParser->getGenerator()->getServices();
        if ($services->count() > 0) {
            foreach ($services as $service) {
                foreach ($service->getMethods() as $method) {
                    if ('UpdateItemInRecoverableItems' === $method->getName()) {
                        $this->assertSame([
                            'ExchangeImpersonation',
                            'MailboxCulture',
                            'RequestServerVersion',
                            'TimeZoneContext',
                            'ManagementRole',
                        ], $method->getMetaValue(TagHeader::META_SOAP_HEADER_NAMES));
                        $this->assertSame([
                            'ExchangeImpersonationType',
                            'MailboxCultureType',
                            'RequestServerVersion',
                            'TimeZoneContextType',
                            'ManagementRoleType',
                        ], $method->getMetaValue(TagHeader::META_SOAP_HEADER_TYPES));
                        $this->assertSame([
                            'required',
                            'required',
                            'required',
                            'required',
                            'required',
                        ], $method->getMetaValue(TagHeader::META_SOAP_HEADERS));
                        $this->assertSame([
                            'http://schemas.microsoft.com/exchange/services/2006/types',
                            'http://schemas.microsoft.com/exchange/services/2006/types',
                            'http://schemas.microsoft.com/exchange/services/2006/types',
                            'http://schemas.microsoft.com/exchange/services/2006/types',
                            'http://schemas.microsoft.com/exchange/services/2006/types',
                        ], $method->getMetaValue(TagHeader::META_SOAP_HEADER_NAMESPACES));
                        ++$count;
                    }
                }
            }
        }
        $this->assertSame(1, $count);
    }

    public function testParseUnitTest(): void
    {
        $tagHeaderParser = self::unitTestInstanceParser();

        $tagHeaderParser->parse();

        $ok = false;
        $services = $tagHeaderParser->getGenerator()->getServices();
        if ($services->count() > 0) {
            foreach ($services as $service) {
                foreach ($service->getMethods() as $method) {
                    $this->assertSame([
                        'auth',
                    ], $method->getMetaValue(TagHeader::META_SOAP_HEADER_NAMES));
                    $this->assertSame([
                        'http://schemas.com/GetResult',
                    ], $method->getMetaValue(TagHeader::META_SOAP_HEADER_NAMESPACES));
                    $this->assertSame([
                        'AuthenticationType',
                    ], $method->getMetaValue(TagHeader::META_SOAP_HEADER_TYPES));
                    $this->assertSame([
                        'required',
                    ], $method->getMetaValue(TagHeader::META_SOAP_HEADERS));
                    $ok = true;
                }
            }
        }
        $this->assertTrue((bool) $ok);
    }
}
