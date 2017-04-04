<?php

namespace WsdlToPhp\PackageGenerator\Tests\DomHandler;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\DomHandler\AbstractAttributeHandler;

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

        $this->assertEquals(AbstractAttributeHandler::ATTRIBUTE_MIN_OCCURS, $element->getAttribute(AbstractAttributeHandler::ATTRIBUTE_MIN_OCCURS)->getName());
        $this->assertEquals(AbstractAttributeHandler::ATTRIBUTE_MAX_OCCURS, $element->getAttribute(AbstractAttributeHandler::ATTRIBUTE_MAX_OCCURS)->getName());
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

        $this->assertSame('0', $element->getAttributeValue(AbstractAttributeHandler::ATTRIBUTE_MIN_OCCURS));
        $this->assertSame('1', $element->getAttributeValue(AbstractAttributeHandler::ATTRIBUTE_MAX_OCCURS));
        $this->assertSame('Version', $element->getAttributeValue('name'));
        $this->assertSame('2.2', $element->getAttributeValue('default'));
        $this->assertSame('2.2', $element->getAttributeValue('default', false, true, null));
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

        foreach ($elements as $index => $element) {
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

        $this->assertNull($element->getAttribute(AbstractAttributeHandler::ATTRIBUTE_MIN_OCCURS)->getNamespace());
    }
    /**
     *
     */
    public function testGetMaxOccurs()
    {
        $domDocument = DomDocumentHandlerTest::yandeDirectApiAdGroupsInstance();

        $element = $domDocument->getElementByName('element', array(
            'name' => 'CampaignIds',
        ));

        $this->assertEquals(AbstractAttributeHandler::VALUE_UNBOUNDED, $element->getAttributeValue(AbstractAttributeHandler::ATTRIBUTE_MAX_OCCURS));
        $this->assertEquals(0, $element->getAttributeValue(AbstractAttributeHandler::ATTRIBUTE_MIN_OCCURS));
    }
}
