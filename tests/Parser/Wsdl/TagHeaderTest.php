<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagHeader;

class TagHeaderTest extends WsdlParser
{
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagHeader
     */
    public static function imageViewServiceInstance()
    {
        return new TagHeader(self::generatorInstance(self::wsdlImageViewServicePath()));
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagHeader
     */
    public static function actonInstance()
    {
        return new TagHeader(self::generatorInstance(self::wsdlActonPath()));
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagHeader
     */
    public static function paypalInstance()
    {
        return new TagHeader(self::generatorInstance(self::wsdlPayPalPath()));
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagHeader
     */
    public static function ewsInstance()
    {
        return new TagHeader(self::generatorInstance(self::wsdlEwsPath(), false, false, false));
    }
    /**
     *
     */
    public function testParseImageViewService()
    {
        $tagHeaderParser = self::imageViewServiceInstance();

        $tagHeaderParser->parse();

        $ok = false;
        $services = $tagHeaderParser->getGenerator()->getServices();
        if ($services->count() > 0) {
            foreach ($services as $service) {
                if ($service->getName() === 'Image') {
                    foreach ($service->getMethods() as $method) {
                        $this->assertSame(array(
                            'auth',
                        ), $method->getMetaValue(TagHeader::META_SOAP_HEADER_NAMES));
                        $this->assertSame(array(
                            'http://ws.estesexpress.com/imageview',
                        ), $method->getMetaValue(TagHeader::META_SOAP_HEADER_NAMESPACES));
                        $this->assertSame(array(
                            'AuthenticationType',
                        ), $method->getMetaValue(TagHeader::META_SOAP_HEADER_TYPES));
                        $this->assertSame(array(
                            'required',
                        ), $method->getMetaValue(TagHeader::META_SOAP_HEADERS));
                        $ok = true;
                    }
                }
            }
        }
        $this->assertTrue((bool) $ok);
    }
    /**
     *
     */
    public function testParseActon()
    {
        $tagHeaderParser = self::actonInstance();

        $tagHeaderParser->parse();

        $ok = false;
        $services = $tagHeaderParser->getGenerator()->getServices();
        if ($services->count() > 0) {
            foreach ($services as $service) {
                if ($service->getName() === 'Send') {
                    foreach ($service->getMethods() as $method) {
                        $this->assertSame(array(
                            'SessionHeader',
                            'ClusterHeader',
                        ), $method->getMetaValue(TagHeader::META_SOAP_HEADER_NAMES));
                        $this->assertSame(array(
                            'urn:api.actonsoftware.com',
                            'urn:api.actonsoftware.com',
                        ), $method->getMetaValue(TagHeader::META_SOAP_HEADER_NAMESPACES));
                        $this->assertSame(array(
                            'SessionHeader',
                            'ClusterHeader',
                        ), $method->getMetaValue(TagHeader::META_SOAP_HEADER_TYPES));
                        $this->assertSame(array(
                            'optional',
                            'optional',
                        ), $method->getMetaValue(TagHeader::META_SOAP_HEADERS));
                        $ok = true;
                    }
                } elseif ($service->getName() === 'List') {
                    foreach ($service->getMethods() as $method) {
                        $this->assertSame(array(
                            'SessionHeader',
                            'ClusterHeader',
                        ), $method->getMetaValue(TagHeader::META_SOAP_HEADER_NAMES));
                        $this->assertSame(array(
                            'urn:api.actonsoftware.com',
                            'urn:api.actonsoftware.com',
                        ), $method->getMetaValue(TagHeader::META_SOAP_HEADER_NAMESPACES));
                        $this->assertSame(array(
                            'SessionHeader',
                            'ClusterHeader',
                        ), $method->getMetaValue(TagHeader::META_SOAP_HEADER_TYPES));
                        $this->assertSame(array(
                            'optional',
                            'required',
                        ), $method->getMetaValue(TagHeader::META_SOAP_HEADERS));
                        $ok = true;
                    }
                } elseif ($service->getName() === 'Login') {
                    foreach ($service->getMethods() as $method) {
                        $this->assertSame(array(
                            'ClusterHeader',
                        ), $method->getMetaValue(TagHeader::META_SOAP_HEADER_NAMES));
                        $this->assertSame(array(
                            'urn:api.actonsoftware.com',
                        ), $method->getMetaValue(TagHeader::META_SOAP_HEADER_NAMESPACES));
                        $this->assertSame(array(
                            'ClusterHeader',
                        ), $method->getMetaValue(TagHeader::META_SOAP_HEADER_TYPES));
                        $this->assertSame(array(
                            'required',
                        ), $method->getMetaValue(TagHeader::META_SOAP_HEADERS));
                        $ok = true;
                    }
                }
            }
        }
        $this->assertTrue((bool) $ok);
    }
    /**
     *
     */
    public function testParsePayPal()
    {
        $tagHeaderParser = self::paypalInstance();

        $tagHeaderParser->parse();

        $count = 0;
        $services = $tagHeaderParser->getGenerator()->getServices();
        if ($services->count() > 0) {
            foreach ($services as $service) {
                foreach ($service->getMethods() as $method) {
                    $this->assertSame(array(
                        'RequesterCredentials',
                    ), $method->getMetaValue(TagHeader::META_SOAP_HEADER_NAMES));
                    $this->assertSame(array(
                        'urn:ebay:api:PayPalAPI',
                    ), $method->getMetaValue(TagHeader::META_SOAP_HEADER_NAMESPACES));
                    $this->assertSame(array(
                        'CustomSecurityHeaderType',
                    ), $method->getMetaValue(TagHeader::META_SOAP_HEADER_TYPES));
                    $this->assertSame(array(
                        'required',
                    ), $method->getMetaValue(TagHeader::META_SOAP_HEADERS));
                    $count++;
                }
            }
        }
        $this->assertSame(57, $count);
    }
    /**
     *
     */
    public function testParseEws()
    {
        $tagHeaderParser = self::ewsInstance();
        // parsing the whole structs/functions is too long for only tests purpose!
        $tagHeaderParser
            ->getGenerator()
                ->getServices()
                    ->addService($tagHeaderParser->getGenerator(), 'Update', 'UpdateItemInRecoverableItems', 'string', 'string');

        $tagHeaderParser->parse();

        $count = 0;
        $services = $tagHeaderParser->getGenerator()->getServices();
        if ($services->count() > 0) {
            foreach ($services as $service) {
                foreach ($service->getMethods() as $method) {
                    if ($method->getName() === 'UpdateItemInRecoverableItems') {
                        $this->assertSame(array(
                            'ExchangeImpersonation',
                            'MailboxCulture',
                            'RequestServerVersion',
                            'TimeZoneContext',
                            'ManagementRole',
                        ), $method->getMetaValue(TagHeader::META_SOAP_HEADER_NAMES));
                        $this->assertSame(array(
                            'ExchangeImpersonationType',
                            'MailboxCultureType',
                            'RequestServerVersion',
                            'TimeZoneContextType',
                            'ManagementRoleType',
                        ), $method->getMetaValue(TagHeader::META_SOAP_HEADER_TYPES));
                        $this->assertSame(array(
                            'required',
                            'required',
                            'required',
                            'required',
                            'required',
                        ), $method->getMetaValue(TagHeader::META_SOAP_HEADERS));
                        $this->assertSame(array(
                            'http://schemas.microsoft.com/exchange/services/2006/types',
                            'http://schemas.microsoft.com/exchange/services/2006/types',
                            'http://schemas.microsoft.com/exchange/services/2006/types',
                            'http://schemas.microsoft.com/exchange/services/2006/types',
                            'http://schemas.microsoft.com/exchange/services/2006/types',
                        ), $method->getMetaValue(TagHeader::META_SOAP_HEADER_NAMESPACES));
                        $count++;
                    }
                }
            }
        }
        $this->assertSame(1, $count);
    }
}
