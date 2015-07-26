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
        $this->assertTrue((bool)$ok);
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
        $this->assertTrue((bool)$ok);
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
}
