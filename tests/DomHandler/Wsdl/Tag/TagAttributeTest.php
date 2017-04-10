<?php

namespace WsdlToPhp\PackageGenerator\Tests\DomHandler\Wsdl\Tag;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Tests\Model\WsdlTest;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\TagAttribute;

class TagAttributeTest extends TestCase
{
    /**
     *
     */
    public function testGetSuitableParentAsAttributeGroup()
    {
        $schema = WsdlTest::whlInstance();
        /** @var TagAttribute $attribute */
        $attribute = $schema->getContent()->getElementByNameAndAttributes(Wsdl::TAG_ATTRIBUTE, array(
            'name' => 'ShortText',
            'type' => 'whlsoap:StringLength1to64',
            'use' => 'optional',
        ));
        $this->assertInstanceOf('WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\TagAttribute', $attribute);
        $parent = $attribute->getSuitableParent();
        $this->assertInstanceOf('WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\Tag', $parent);
        $this->assertSame(Wsdl::TAG_ATTRIBUTE_GROUP, $parent->getName());
    }
}
