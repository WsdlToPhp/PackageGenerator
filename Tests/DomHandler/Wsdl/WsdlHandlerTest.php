<?php

namespace WsdlToPhp\PackageGenerator\Tests\DomHandler\Wsdl;

use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl;
use WsdlToPhp\PackageGenerator\Tests\TestCase;

class WsdlHandlerTest extends TestCase
{
    protected static $ebayInstance;
    protected static $bingInstance;
    protected static $partnerInstance;
    protected static $aukroInstance;
    /**
     * @return WsdlHandler
     */
    public static function eBayInstance()
    {
        if (!isset(self::$ebayInstance)) {
            $doc = new \DOMDocument('1.0', 'utf-8');
            $doc->load(__DIR__ . '/../../resources/ebaySvc.wsdl');
            self::$ebayInstance = new Wsdl($doc);
        }
        return self::$ebayInstance;
    }
    /**
     * @return WsdlHandler
     */
    public static function bingInstance()
    {
        if (!isset(self::$bingInstance)) {
            $doc = new \DOMDocument('1.0', 'utf-8');
            $doc->load(__DIR__ . '/../../resources/bingsearch.wsdl');
            self::$bingInstance = new Wsdl($doc);
        }
        return self::$bingInstance;
    }
    /**
     * @return WsdlHandler
     */
    public static function partnerInstance()
    {
        if (!isset(self::$partnerInstance)) {
            $doc = new \DOMDocument('1.0', 'utf-8');
            $doc->load(__DIR__ . '/../../resources/PartnerService.wsdl');
            self::$partnerInstance = new Wsdl($doc);
        }
        return self::$partnerInstance;
    }
    /**
     * @return WsdlHandler
     */
    public static function aukroInstance()
    {
        if (!isset(self::$aukroInstance)) {
            $doc = new \DOMDocument('1.0', 'utf-8');
            $doc->load(__DIR__ . '/../../resources/aukro.wsdl');
            self::$aukroInstance = new Wsdl($doc);
        }
        return self::$aukroInstance;
    }
    /**
     *
     */
    public function testGetElementByNameFromWsdl()
    {
        $bing = self::bingInstance();

        $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\DomHandler\\Wsdl\\Tag\\TagComplexType', $bing->getElementByName(Wsdl::TAG_COMPLEX_TYPE));
    }
    /**
     *
     */
    public function testGetRootElement()
    {
        $bing = self::bingInstance();

        $this->assertSame('definitions', $bing->getRootElement()->getName());
        $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\DomHandler\\Wsdl\\Tag\\TagDefinitions', $bing->getRootElement());
    }
    public function testGetNamespaceUri()
    {
        $bing = self::bingInstance();

        $this->assertSame('http://www.w3.org/2001/XMLSchema-instance', $bing->getNamespaceUri('xsi'));
        $this->assertSame('http://schemas.xmlsoap.org/wsdl/soap/', $bing->getNamespaceUri('soap'));
        $this->assertSame('http://schemas.xmlsoap.org/wsdl/', $bing->getNamespaceUri('wsdl'));
        $this->assertSame('http://schemas.xmlsoap.org/ws/2004/08/addressing', $bing->getNamespaceUri('wsa'));
        $this->assertSame('http://schemas.microsoft.com/LiveSearch/2008/03/Search', $bing->getNamespaceUri('tns'));
        $this->assertSame('http://www.w3.org/2001/XMLSchema', $bing->getNamespaceUri('xsd'));
    }
    public static function assertContainsOnlyInstancesOf($classname, $haystack, $message = '')
    {
        return parent::assertNotEmpty($haystack) && parent::assertContainsOnlyInstancesOf($classname, $haystack, $message);
    }
}
