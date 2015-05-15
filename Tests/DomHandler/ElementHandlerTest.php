<?php

namespace WsdlToPhp\PackageGenerator\Tests\DomHandler;

use WsdlToPhp\PackageGenerator\Tests\TestCase;

class ElementHandlerTest extends TestCase
{
    /**
     *
     */
    public function testHasAttribute()
    {
        $domDocument = DomDocumentHandlerTest::bingInstance();

        // first element tag
        $element = $domDocument->getElementByName('element');
        // first schema tag
        $schema = $domDocument->getElementByName('schema');

        $this->assertTrue($element->hasAttribute('minOccurs'));
        $this->assertTrue($element->hasAttribute('type'));
        $this->assertFalse($element->hasAttribute('minoccurs'));
        $this->assertTrue($schema->hasAttribute('targetNamespace'));
        $this->assertFalse($schema->hasAttribute('targetnamespace'));
    }
    /**
     *
     */
    public function testGetAttribute()
    {
        $domDocument = DomDocumentHandlerTest::bingInstance();

        // first element tag
        $element = $domDocument->getElementByName('element');
        // first schema tag
        $schema = $domDocument->getElementByName('schema');

        $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\DomHandler\\AttributeHandler', $schema->getAttribute('elementFormDefault'));
        $this->assertEmpty($schema->getAttribute('targetnamespace'));
        $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\DomHandler\\AttributeHandler', $element->getAttribute('name'));
        $this->assertEmpty($schema->getAttribute('foo'));
    }
    /**
     *
     */
    public function testGetElementChildren()
    {
        $domDocument = DomDocumentHandlerTest::bingInstance();

        // first schema tag
        $schema = $domDocument->getElementByName('schema');
        // first element tag
        $element = $domDocument->getElementByName('element');

        $this->assertNotEmpty($schema->getElementChildren());
        $this->assertContainsOnlyInstancesOf('\\WsdlToPhp\\PackageGenerator\\DomHandler\\AbstractElementHandler', $schema->getElementChildren());
        $this->assertEmpty($element->getElementChildren());
    }
    /**
     *
     */
    public function testGetChildrenByName()
    {
        $domDocument = DomDocumentHandlerTest::bingInstance();

        // first sequence tag
        $sequence = $domDocument->getElementByName('sequence');

        $childrenByName = $sequence->getChildrenByName('element');
        foreach ($childrenByName as $child) {
            $this->assertSame('element', $child->getName());
        }
    }
    /**
     *
     */
    public function testGetChildByNameAndAttributes()
    {
        $domDocument = DomDocumentHandlerTest::bingInstance();

        // first message tag
        $message = $domDocument->getElementByName('message');
        $part = $message->getChildByNameAndAttributes('part', array(
            'name'    => 'parameters',
            'element' => 'SearchRequest',
        ));

        $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\DomHandler\\ElementHandler', $part);
        $this->assertSame('parameters', $part->getAttribute('name')->getValue());
        $this->assertSame('SearchRequest', $part->getAttribute('element')->getValue());
    }
}
