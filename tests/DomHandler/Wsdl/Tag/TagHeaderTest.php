<?php

namespace WsdlToPhp\PackageGenerator\Tests\DomHandler\Wsdl\Tag;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Tests\Model\WsdlTest;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\TagInput;

class TagHeaderTest extends TestCase
{
    /**
     *
     */
    public function testHeaders()
    {
        $wsdl = WsdlTest::ebayInstance();

        $headers = $wsdl->getContent()->getElementsByName(Wsdl::TAG_HEADER);

        foreach ($headers as $header) {
            if ($header->getParentInput() instanceof TagInput) {
                $this->assertInstanceOf('\WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\TagOperation', $header->getParentOperation());
                $this->assertInstanceOf('\WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\TagInput', $header->getParentInput());
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
        $wsdl = WsdlTest::ebayInstance();

        $header = $wsdl->getContent()->getElementByName(Wsdl::TAG_HEADER);

        $this->assertInstanceOf('\WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\TagMessage', $header->getMessage());
    }
    /**
     *
     */
    public function testGetPart()
    {
        $wsdl = WsdlTest::ebayInstance();

        $header = $wsdl->getContent()->getElementByName(Wsdl::TAG_HEADER);

        $this->assertInstanceOf('\WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\TagPart', $header->getPartTag());
    }
    /**
     *
     */
    public function testGetPartFinalType()
    {
        $wsdl = WsdlTest::ebayInstance();

        $header = $wsdl->getContent()->getElementByName(Wsdl::TAG_HEADER);

        $this->assertSame('CustomSecurityHeaderType', $header->getPartTag()->getFinalType());
    }
    /**
     *
     */
    public function testGetPartFinalNamespace()
    {
        $wsdl = WsdlTest::ebayInstance();

        $header = $wsdl->getContent()->getElementByName(Wsdl::TAG_HEADER);

        $this->assertSame('ns', $header->getPartTag()->getFinalNamespace());
    }
    /**
     *
     */
    public function testGetHeaderNamespace()
    {
        $wsdl = WsdlTest::ebayInstance();

        $header = $wsdl->getContent()->getElementByName(Wsdl::TAG_HEADER);

        $this->assertSame('urn:ebay:apis:eBLBaseComponents', $header->getHeaderNamespace());
    }
    /**
     *
     */
    public function testGetAttributeRequired()
    {
        $wsdl = WsdlTest::actonInstance();

        $binding = $wsdl->getContent()->getElementByNameAndAttributes(Wsdl::TAG_BINDING, array(
            'name' => 'SoapBinding',
            'type' => 'tns:SOAP',
        ));

        $operation = $binding->getChildByNameAndAttributes(Wsdl::TAG_OPERATION, array(
            'name' => 'list',
        ));

        $sessionHeader = $operation->getChildByNameAndAttributes(Wsdl::TAG_HEADER, array(
            'part' => 'SessionHeader',
        ));
        $clusterHeader = $operation->getChildByNameAndAttributes(Wsdl::TAG_HEADER, array(
            'part' => 'ClusterHeader',
        ));

        $this->assertFalse($sessionHeader->getAttributeRequired());
        $this->assertTrue($clusterHeader->getAttributeRequired());
    }
}
