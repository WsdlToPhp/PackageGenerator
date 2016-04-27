<?php

namespace WsdlToPhp\PackageGenerator\Tests\DomHandler;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\DomHandler\AbstractAttributeHandler;

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
            'name' => 'parameters',
            'element' => 'tns:SearchRequest',
        ));

        $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\DomHandler\\ElementHandler', $part);
        $this->assertSame('parameters', $part->getAttributeValue('name'));
        $this->assertSame('SearchRequest', $part->getAttributeValue('element'));
    }
    /**
     *
     */
    public function testGetMaxOccursUnbounded()
    {
        $domDocument = DomDocumentHandlerTest::yandeDirectApiAdGroupsInstance();

        $element = $domDocument->getElementByNameAndAttributes('element', array(
            'name' => 'CampaignIds',
        ));

        $this->assertSame('unbounded', $element->getMaxOccurs());
    }
    /**
     *
     */
    public function testGetMaxOccursOne()
    {
        $domDocument = DomDocumentHandlerTest::yandeDirectApiAdGroupsInstance();

        $element = $domDocument->getElementByNameAndAttributes('element', array(
            'name' => 'NegativeKeywords',
        ));

        $this->assertSame(AbstractAttributeHandler::DEFAULT_OCCURENCE_VALUE, $element->getMaxOccurs());
    }
    /**
     *
     */
    public function testGetMinOccursNone()
    {
        $domDocument = DomDocumentHandlerTest::yandeDirectApiAdGroupsInstance();

        $element = $domDocument->getElementByNameAndAttributes('element', array(
            'name' => 'NegativeKeywords',
        ));

        $this->assertSame(0, $element->getMinOccurs());
    }
    /**
     *
     */
    public function testGetMinOccursOne()
    {
        $domDocument = DomDocumentHandlerTest::yandeDirectApiAdGroupsInstance();

        $element = $domDocument->getElementByNameAndAttributes('element', array(
            'name' => 'Name',
        ));

        $this->assertSame(1, $element->getMinOccurs());
    }
    /**
     *
     */
    public function testCanOccurSeveralTimes()
    {
        $domDocument = DomDocumentHandlerTest::yandeDirectApiAdGroupsInstance();

        $element = $domDocument->getElementByNameAndAttributes('element', array(
            'name' => 'RegionIds',
        ));

        $this->assertTrue($element->canOccurSeveralTimes());
    }
    /**
     *
     */
    public function testCanOccurOnlyOnce()
    {
        $domDocument = DomDocumentHandlerTest::yandeDirectApiAdGroupsInstance();

        $element = $domDocument->getElementByNameAndAttributes('element', array(
            'name' => 'CampaignId',
        ));

        $this->assertTrue($element->canOccurOnlyOnce());
    }
    /**
     *
     */
    public function testCanOccurOnlyOnceEvenForOptionalElement()
    {
        $domDocument = DomDocumentHandlerTest::yandeDirectApiAdGroupsInstance();

        $element = $domDocument->getElementByNameAndAttributes('element', array(
            'name' => 'NegativeKeywords',
        ));

        $this->assertTrue($element->canOccurOnlyOnce());
    }
    /**
     *
     */
    public function testIsOptional()
    {
        $domDocument = DomDocumentHandlerTest::yandeDirectApiAdGroupsInstance();

        $element = $domDocument->getElementByNameAndAttributes('element', array(
            'name' => 'NegativeKeywords',
        ));

        $this->assertTrue($element->isOptional());
    }
    /**
     *
     */
    public function testIsRequired()
    {
        $domDocument = DomDocumentHandlerTest::yandeDirectApiAdGroupsInstance();

        $element = $domDocument->getElementByNameAndAttributes('element', array(
            'name' => 'Name',
        ));

        $this->assertTrue($element->isRequired());
    }
    /**
     *
     */
    public function testIsNotRequired()
    {
        $domDocument = DomDocumentHandlerTest::yandeDirectApiAdGroupsInstance();

        $element = $domDocument->getElementByNameAndAttributes('element', array(
            'name' => 'NegativeKeywords',
        ));

        $this->assertFalse($element->isRequired());
    }
    /**
     *
     */
    public function testYandexGetNillableTrue()
    {
        $domDocument = DomDocumentHandlerTest::yandeDirectApiAdGroupsInstance();

        $element = $domDocument->getElementByNameAndAttributes('element', array(
            'name' => 'NegativeKeywords',
        ));

        $this->assertTrue($element->getNillable());
    }
    /**
     *
     */
    public function testYandexIsRemovableTrue()
    {
        $domDocument = DomDocumentHandlerTest::yandeDirectApiAdGroupsInstance();

        $element = $domDocument->getElementByNameAndAttributes('element', array(
            'name' => 'NegativeKeywords',
        ));

        $this->assertTrue($element->isRemovable());
    }
    /**
     *
     */
    public function testYandexGetNillableFalse()
    {
        $domDocument = DomDocumentHandlerTest::yandeDirectApiAdGroupsInstance();

        $element = $domDocument->getElementByNameAndAttributes('element', array(
            'name' => 'TrackingParams',
        ));

        $this->assertFalse($element->getNillable());
    }
    /**
     *
     */
    public function testYandexIsRemovableFalse()
    {
        $domDocument = DomDocumentHandlerTest::yandeDirectApiAdGroupsInstance();

        $element = $domDocument->getElementByNameAndAttributes('element', array(
            'name' => 'TrackingParams',
        ));

        $this->assertFalse($element->isRemovable());
    }
    /**
     *
     */
    public function testActonGetNillableFalse()
    {
        $domDocument = DomDocumentHandlerTest::actonInstance();

        $element = $domDocument->getElementByNameAndAttributes('element', array(
            'name' => 'email',
        ));

        $this->assertFalse($element->getNillable());
    }
    /**
     *
     */
    public function testActonIsRemovableFalse()
    {
        $domDocument = DomDocumentHandlerTest::actonInstance();

        $element = $domDocument->getElementByNameAndAttributes('element', array(
            'name' => 'email',
        ));

        $this->assertFalse($element->isRemovable());
    }
    /**
     *
     */
    public function testActonGetNillableTrue()
    {
        $domDocument = DomDocumentHandlerTest::actonInstance();

        $element = $domDocument->getElementByNameAndAttributes('element', array(
            'name' => 'serverUrl',
        ));

        $this->assertTrue($element->getNillable());
    }
    /**
     *
     */
    public function testActonGetNillableTrueIsRemovableFalse()
    {
        $domDocument = DomDocumentHandlerTest::actonInstance();

        $element = $domDocument->getElementByNameAndAttributes('element', array(
            'name' => 'serverUrl',
        ));

        $this->assertFalse($element->isRemovable());
    }
}
