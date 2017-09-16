<?php

namespace WsdlToPhp\PackageGenerator\Tests\WsdlHandler\Tag;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Tests\Model\WsdlTest;
use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagInput;

class TagHeaderTest extends TestCase
{
    /**
     *
     */
    public function testHeaders()
    {
        $wsdl = WsdlTest::wsdlEbayInstance();

        $headers = $wsdl->getContent()->getElementsByName(Wsdl::TAG_HEADER);

        foreach ($headers as $header) {
            if ($header->getParentInput() instanceof TagInput) {
                $this->assertInstanceOf('\WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagOperation', $header->getParentOperation());
                $this->assertInstanceOf('\WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagInput', $header->getParentInput());
                $this->assertSame('RequesterCredentials', $header->getAttributePart());
                $this->assertSame('RequesterCredentials', $header->getAttributeMessage());
                $this->assertSame('', $header->getAttributeNamespace());
            }
        }
    }
    /**
     *
     */
    public function testGetMessage()
    {
        $wsdl = WsdlTest::wsdlEbayInstance();

        $header = $wsdl->getContent()->getElementByName(Wsdl::TAG_HEADER);

        $this->assertInstanceOf('\WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagMessage', $header->getMessage());
    }
    /**
     *
     */
    public function testGetPart()
    {
        $wsdl = WsdlTest::wsdlEbayInstance();

        $header = $wsdl->getContent()->getElementByName(Wsdl::TAG_HEADER);

        $this->assertInstanceOf('\WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagPart', $header->getPartTag());
    }
    /**
     *
     */
    public function testGetPartFinalType()
    {
        $wsdl = WsdlTest::wsdlEbayInstance();

        $header = $wsdl->getContent()->getElementByName(Wsdl::TAG_HEADER);

        $this->assertSame('CustomSecurityHeaderType', $header->getPartTag()->getFinalType());
    }
    /**
     *
     */
    public function testGetPartFinalNamespace()
    {
        $wsdl = WsdlTest::wsdlEbayInstance();

        $header = $wsdl->getContent()->getElementByName(Wsdl::TAG_HEADER);

        $this->assertSame('ns', $header->getPartTag()->getFinalNamespace());
    }
    /**
     *
     */
    public function testGetHeaderNamespace()
    {
        $wsdl = WsdlTest::wsdlEbayInstance();

        $header = $wsdl->getContent()->getElementByName(Wsdl::TAG_HEADER);

        $this->assertSame('urn:ebay:apis:eBLBaseComponents', $header->getHeaderNamespace());
    }
    /**
     *
     */
    public function testGetAttributeRequired()
    {
        $wsdl = WsdlTest::wsdlActonInstance();

        $binding = $wsdl->getContent()->getElementByNameAndAttributes(Wsdl::TAG_BINDING, [
            'name' => 'SoapBinding',
            'type' => 'tns:SOAP',
        ]);

        $operation = $binding->getChildByNameAndAttributes(Wsdl::TAG_OPERATION, [
            'name' => 'list',
        ]);

        $sessionHeader = $operation->getChildByNameAndAttributes(Wsdl::TAG_HEADER, [
            'part' => 'SessionHeader',
        ]);
        $clusterHeader = $operation->getChildByNameAndAttributes(Wsdl::TAG_HEADER, [
            'part' => 'ClusterHeader',
        ]);

        $this->assertFalse($sessionHeader->getAttributeRequired());
        $this->assertTrue($clusterHeader->getAttributeRequired());
    }
}
