<?php

namespace WsdlToPhp\PackageGenerator\Tests\DomHandler;

use WsdlToPhp\PackageGenerator\Tests\TestCase;

class AttributeHandlerTest extends TestCase
{
    /**
     *
     */
    public function testGetName()
    {
        $domDocument = DomDocumentHandlerTest::bingInstance();

        // first element tag
        $element = $domDocument->getElementByName('element');

        $this->assertEquals('minOccurs', $element->getAttribute('minOccurs')->getName());
        $this->assertEquals('maxOccurs', $element->getAttribute('maxOccurs')->getName());
        $this->assertEquals('name', $element->getAttribute('name')->getName());
        $this->assertEquals('default', $element->getAttribute('default')->getName());
    }
    /**
     *
     */
    public function testGetValue()
    {
        $domDocument = DomDocumentHandlerTest::bingInstance();

        // first element tag
        $element = $domDocument->getElementByName('element');

        $this->assertSame(0, $element->getAttribute('minOccurs')->getValue());
        $this->assertSame(1, $element->getAttribute('maxOccurs')->getValue());
        $this->assertSame('Version', $element->getAttribute('name')->getValue());
        $this->assertSame(2.2, $element->getAttribute('default')->getValue());
    }
    /**
     *
     */
    public function testGetValueNamespace()
    {
        $domDocument = DomDocumentHandlerTest::bingInstance();

        $sequence = $domDocument->getElementByName('sequence');
        $elements = $sequence->getChildrenByName('element');

        $namespaces = array(
            'xsd',
            'xsd',
            'xsd',
            'xsd',
            'xsd',
            'tns',
            'xsd',
            'xsd',
            'xsd',
            'tns',
            'tns',
            'tns',
            'tns',
            'tns',
            'tns',
            'tns',
            'tns',
            'tns',
        );

        foreach ($elements as $index=>$element) {
            $this->assertSame($namespaces[$index], $element->getAttribute('type')->getValueNamespace());
        }
    }
    /**
     *
     */
    public function testGetNamespaceNull()
    {
        $domDocument = DomDocumentHandlerTest::bingInstance();

        // first element tag
        $element = $domDocument->getElementByName('element');

        $this->assertNull($element->getAttribute('minOccurs')->getNamespace());
    }
}
