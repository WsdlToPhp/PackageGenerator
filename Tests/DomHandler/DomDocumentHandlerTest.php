<?php

namespace WsdlToPhp\PackageGenerator\Tests\DomHandler;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\DomHandler\DomDocumentHandler;

class DomDocumentHandlerTest extends TestCase
{
    protected static $ebayInstance;
    protected static $bingInstance;
    protected static $emptyInstance;
    /**
     * @return DomDocumentHandler
     */
    public static function eBayInstance()
    {
        if (!isset(self::$ebayInstance)) {
            $doc = new \DOMDocument('1.0', 'utf-8');
            $doc->load(dirname(__FILE__) . '/../resources/ebaySvc.wsdl');
            self::$ebayInstance = new DomDocumentHandler($doc);
        }
        return self::$ebayInstance;
    }
    /**
     * @return DomDocumentHandler
     */
    public static function bingInstance()
    {
        if (!isset(self::$bingInstance)) {
            $doc = new \DOMDocument('1.0', 'utf-8');
            $doc->load(dirname(__FILE__) . '/../resources/bingsearch.wsdl');
            self::$bingInstance = new DomDocumentHandler($doc);
        }
        return self::$bingInstance;
    }
    /**
     * @return DomDocumentHandler
     */
    public static function emptyInstance()
    {
        if (!isset(self::$emptyInstance)) {
            $doc = new \DOMDocument('1.0', 'utf-8');
            @$doc->load(dirname(__FILE__) . '/../resources/empty.wsdl');
            self::$emptyInstance = new DomDocumentHandler($doc);
        }
        return self::$emptyInstance;
    }
    /**
     *
     */
    public function testGetNodeByName()
    {
        $instance = self::bingInstance();

        $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\DomHandler\\NodeHandler', $instance->getNodeByName('types'));
        $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\DomHandler\\NodeHandler', $instance->getNodeByName('definitions'));
        $this->assertNull($instance->getNodeByName('foo'));
    }
    /**
     *
     */
    public function testGetNodesByName()
    {
        $instance = self::bingInstance();

        $this->assertNotEmpty($instance->getNodesByName('element'));
        $this->assertEmpty($instance->getNodesByName('foo'));
    }
    /**
     *
     */
    public function testGetElementsByName()
    {
        $instance = self::bingInstance();

        $this->assertNotEmpty($instance->getElementsByName('element'));
        $this->assertContainsOnlyInstancesOf('\\WsdlToPhp\\PackageGenerator\\DomHandler\\ElementHandler', $instance->getElementsByName('element'));
        $this->assertEmpty($instance->getElementsByName('foo'));
    }
    /**
     *
     */
    public function testGetElementsByNameAndAttributes()
    {
        $instance = self::bingInstance();

        $parts = $instance->getElementsByNameAndAttributes('part', array(
            'name'    => 'parameters',
            'element' => 'tns:SearchRequest',
        ));
        $this->assertNotEmpty($parts);
        $this->assertContainsOnlyInstancesOf('\\WsdlToPhp\\PackageGenerator\\DomHandler\\ElementHandler', $parts);
    }
    /**
     *
     */
    public function testGetElementByNameAndAttributes()
    {
        $instance = self::bingInstance();

        $part = $instance->getElementByNameAndAttributes('part', array(
            'name'    => 'parameters',
            'element' => 'tns:SearchRequest',
        ));
        $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\DomHandler\\ElementHandler', $part);
    }
    /**
     * @expectedException InvalidArgumentException
     */
    public function testInitRootElementWithException()
    {
        self::emptyInstance();
    }
}
