<?php

namespace WsdlToPhp\PackageGenerator\Tests\DomHandler;

use WsdlToPhp\PackageGenerator\Tests\TestCase;

class NodeHandlerTest extends TestCase
{
    /**
     *
     */
    public function testGetName()
    {
        $domDocument = DomDocumentHandlerTest::bingInstance();

        // first element tag
        $element = $domDocument->getNodeByName('element');

        $this->assertEquals('element', $element->getName());
        $this->assertEquals('definitions', $domDocument->getRootElement()->getName());
    }
    /**
     *
     */
    public function testGetNamespace()
    {
        $domDocument = DomDocumentHandlerTest::bingInstance();

        // first element tag
        $element = $domDocument->getNodeByName('element');

        $this->assertEquals('xsd', $element->getNamespace());
        $this->assertEquals('wsdl', $domDocument->getRootElement()->getNamespace());
    }
    /**
     *
     */
    public function testHasAttributes()
    {
        $domDocument = DomDocumentHandlerTest::bingInstance();

        // first schema tag
        $schema = $domDocument->getNodeByName('schema');
        // first sequence tag
        $sequence = $domDocument->getNodeByName('sequence');

        $this->assertTrue($schema->hasAttributes());
        $this->assertFalse($sequence->hasAttributes());
    }
    /**
     *
     */
    public function testGetAttributes()
    {
        $domDocument = DomDocumentHandlerTest::bingInstance();

        // first schema tag
        $schema = $domDocument->getNodeByName('schema');
        // first element tag
        $element = $domDocument->getNodeByName('element');
        // first sequence tag
        $sequence = $domDocument->getNodeByName('sequence');

        $this->assertContainsOnlyInstancesOf('\\WsdlToPhp\\PackageGenerator\\DomHandler\\AbstractAttributeHandler', $schema->getAttributes());
        $this->assertContainsOnlyInstancesOf('\\WsdlToPhp\\PackageGenerator\\DomHandler\\AbstractAttributeHandler', $element->getAttributes());
        $this->assertEmpty($sequence->getAttributes());
    }
    /**
     *
     */
    public function testHasChildren()
    {
        $domDocument = DomDocumentHandlerTest::bingInstance();

        // first schema tag
        $schema = $domDocument->getNodeByName('schema');
        // first element tag
        $element = $domDocument->getNodeByName('element');

        $this->assertTrue($schema->hasChildren());
        $this->assertFalse($element->hasChildren());
    }
    /**
     *
     */
    public function testGetChildren()
    {
        $domDocument = DomDocumentHandlerTest::bingInstance();

        // first schema tag
        $schema = $domDocument->getNodeByName('schema');
        // first element tag
        $element = $domDocument->getNodeByName('element');

        $this->assertNotEmpty($schema->getChildren());
        $this->assertContainsOnlyInstancesOf('\\WsdlToPhp\\PackageGenerator\\DomHandler\\AbstractNodeHandler', $schema->getChildren());
        $this->assertEmpty($element->getChildren());
    }
    /**
     *
     */
    public function testGetParent()
    {
        $domDocument = DomDocumentHandlerTest::bingInstance();

        // first schema tag
        $schema = $domDocument->getNodeByName('schema');
        // first element tag
        $element = $domDocument->getNodeByName('element');

        $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\DomHandler\\AbstractNodeHandler', $schema->getParent());
        $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\DomHandler\\AbstractNodeHandler', $element->getParent());
        $this->assertSame('sequence', $element->getParent()->getName());
        $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\DomHandler\\AbstractNodeHandler', $domDocument->getRootElement()->getParent());
    }
}
