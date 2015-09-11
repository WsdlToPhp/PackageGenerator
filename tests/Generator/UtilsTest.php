<?php

namespace WsdlToPhp\PackageGenerator\Tests\Generator;

use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;
use WsdlToPhp\PackageGenerator\Generator\Utils;
use WsdlToPhp\PackageGenerator\Tests\TestCase;

class UtilsTest extends TestCase
{
    /**
     *
     */
    public function testResolveCompleteUrl()
    {
        $this->assertSame(sprintf('http://www.foo.com/my/folder/index.%d.xsd', __LINE__), Utils::resolveCompletePath('http://www.foo.com/my/xml.wsdl', sprintf('./folder/index.%d.xsd', __LINE__)));
        $this->assertSame(sprintf('http://www.foo.com/my/titi/index.%d.xsd', __LINE__), Utils::resolveCompletePath('http://www.foo.com/my/xml.wsdl', sprintf('folder/../titi/index.%d.xsd', __LINE__)));
        $this->assertSame(sprintf('http://www.foo.com/my/titi/index.%d.xsd', __LINE__), Utils::resolveCompletePath('http://www.foo.com/my/xml.wsdl', sprintf('./titi/index.%d.xsd', __LINE__)));
        $this->assertSame(sprintf('http://www.foo.com/my/titi/index.%d.xsd', __LINE__), Utils::resolveCompletePath('http://www.foo.com/my/xml.wsdl', sprintf('folder/toto/../../titi/index.%d.xsd', __LINE__)));
    }
    /**
     *
     */
    public function testResolveCompletePath()
    {
        $dirname = __DIR__;
        $this->assertSame(sprintf('%s/../resources/aukro.wsdl', $dirname), Utils::resolveCompletePath(sprintf('%s/../resources/ebaySvc.wsdl', $dirname), './folder/../aukro.wsdl'));
        $this->assertSame(sprintf('%s/../resources/aukro.wsdl', $dirname), Utils::resolveCompletePath(sprintf('%s/../resources/ebaySvc.wsdl', $dirname), 'folder/../aukro.wsdl'));
        $this->assertSame(sprintf('%s/../resources/aukro.wsdl', $dirname), Utils::resolveCompletePath(sprintf('%s/../resources/ebaySvc.wsdl', $dirname), 'folder/../toto/../aukro.wsdl'));
        $this->assertSame(sprintf('%s/../resources/aukro.wsdl', $dirname), Utils::resolveCompletePath(sprintf('%s/../resources/ebaySvc.wsdl', $dirname), 'aukro.wsdl'));
    }
    /**
     *
     */
    public function testGetValueWithinItsType()
    {
        $this->assertSame('020', Utils::getValueWithinItsType('020', 'string'));
        $this->assertSame('01', Utils::getValueWithinItsType('01', 'string'));
    }
    /**
     *
     */
    public function testGetPartStart()
    {
        $this->assertSame('events', Utils::getPart(GeneratorOptions::VALUE_START, 'eventsGet'));
        $this->assertSame('events', Utils::getPart(GeneratorOptions::VALUE_START, '_events'));
    }
    /**
     *
     */
    public function testGetPartEnd()
    {
        $this->assertSame('Get', Utils::getPart(GeneratorOptions::VALUE_END, 'eventsGet'));
        $this->assertSame('Partition', Utils::getPart(GeneratorOptions::VALUE_END, 'eventsGetPartition'));
        $this->assertSame('events', Utils::getPart(GeneratorOptions::VALUE_END, '_events'));
    }
    /**
     *
     */
    public function testCleanComment()
    {
        $this->assertEmpty(Utils::cleanComment(null));
        $this->assertEmpty(Utils::cleanComment(new \stdClass()));
    }
    /**
     *
     */
    public function testGetContentFromUrlContextOptionsBasicAuth()
    {
        $this->assertSame(array(
            'http' => array(
                'header' => array(
                    sprintf('Authorization: Basic %s', base64_encode('foo:bar')),
                ),
            ),
        ), Utils::getContentFromUrlContextOptions('http://www.foo.com', 'foo', 'bar'));
    }
    /**
     *
     */
    public function testGetContentFromUrlContextOptionsProxy()
    {
        $this->assertSame(array(
            'http' => array(
                'proxy' => 'tcp://dns.proxy.com:4545',
                'header' => array(
                    sprintf('Proxy-Authorization: Basic %s', base64_encode('foo:bar')),
                ),
            ),
        ), Utils::getContentFromUrlContextOptions('http://www.foo.com', null, null, 'dns.proxy.com', 4545, 'foo', 'bar'));
    }
    /**
     *
     */
    public function testGetContentFromUrlContextOptionsBasicAuthProxy()
    {
        $this->assertSame(array(
            'http' => array(
                'proxy' => 'tcp://dns.proxy.com:4545',
                'header' => array(
                    sprintf('Proxy-Authorization: Basic %s', base64_encode('foo:bar')),
                    sprintf('Authorization: Basic %s', base64_encode('foo:bar')),
                ),
            ),
        ), Utils::getContentFromUrlContextOptions('http://www.foo.com', 'foo', 'bar', 'dns.proxy.com', 4545, 'foo', 'bar'));
    }
    /**
     *
     */
    public function testGetPartStringBeginingWithInt()
    {
        $this->assertSame('My', Utils::getPart(GeneratorOptions::VALUE_START, '0MyOperation'));
    }
    /**
     *
     */
    public function testGetPartStringBeginingWithMultipleInt()
    {
        $this->assertSame('My', Utils::getPart(GeneratorOptions::VALUE_START, '0123456789MyOperation'));
    }
    /**
     *
     */
    public function testGetEndPartStringBeginingWithMultipleInt()
    {
        $this->assertSame('Operation', Utils::getPart(GeneratorOptions::VALUE_END, '012345678MyOperation'));
    }
    /**
     *
     */
    public function testGetEndPartStringEndingWithInt()
    {
        $this->assertSame('Operation', Utils::getPart(GeneratorOptions::VALUE_END, 'MyOperation0'));
    }
}
