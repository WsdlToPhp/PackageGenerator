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
                            TagHeader::META_SOAP_HEADER_NAMES => array(
                                'auth',
                            ),
                            TagHeader::META_SOAP_HEADER_NAMESPACES => array(
                                'http://ws.estesexpress.com/imageview',
                            ),
                            TagHeader::META_SOAP_HEADER_TYPES => array(
                                'AuthenticationType',
                            ),
                            TagHeader::META_SOAP_HEADERS => array(
                                'required',
                            ),
                        ), $method->getMeta());
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
                            TagHeader::META_SOAP_HEADER_NAMES => array(
                                'SessionHeader',
                                'ClusterHeader',
                            ),
                            TagHeader::META_SOAP_HEADER_NAMESPACES => array(
                                'urn:api.actonsoftware.com',
                                'urn:api.actonsoftware.com',
                            ),
                            TagHeader::META_SOAP_HEADER_TYPES => array(
                                'SessionHeader',
                                'ClusterHeader',
                            ),
                            TagHeader::META_SOAP_HEADERS => array(
                                'optional',
                                'optional',
                            ),
                        ), $method->getMeta());
                        $ok = true;
                    }
                } elseif ($service->getName() === 'List') {
                    foreach ($service->getMethods() as $method) {
                        $this->assertSame(array(
                            TagHeader::META_SOAP_HEADER_NAMES => array(
                                'SessionHeader',
                                'ClusterHeader',
                            ),
                            TagHeader::META_SOAP_HEADER_NAMESPACES => array(
                                'urn:api.actonsoftware.com',
                                'urn:api.actonsoftware.com',
                            ),
                            TagHeader::META_SOAP_HEADER_TYPES => array(
                                'SessionHeader',
                                'ClusterHeader',
                            ),
                            TagHeader::META_SOAP_HEADERS => array(
                                'optional',
                                'required',
                            ),
                        ), $method->getMeta());
                        $ok = true;
                    }
                } elseif ($service->getName() === 'Login') {
                    foreach ($service->getMethods() as $method) {
                        $this->assertSame(array(
                            TagHeader::META_SOAP_HEADER_NAMES => array(
                                'ClusterHeader',
                            ),
                            TagHeader::META_SOAP_HEADER_NAMESPACES => array(
                                'urn:api.actonsoftware.com',
                            ),
                            TagHeader::META_SOAP_HEADER_TYPES => array(
                                'ClusterHeader',
                            ),
                            TagHeader::META_SOAP_HEADERS => array(
                                'required',
                            ),
                        ), $method->getMeta());
                        $ok = true;
                    }
                }
            }
        }
        $this->assertTrue((bool)$ok);
    }
}
