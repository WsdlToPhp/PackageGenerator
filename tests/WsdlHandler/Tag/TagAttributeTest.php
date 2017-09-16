<?php

namespace WsdlToPhp\PackageGenerator\Tests\WsdlHandler\Tag;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Tests\Model\WsdlTest;
use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagAttribute;

class TagAttributeTest extends TestCase
{
    /**
     *
     */
    public function testGetSuitableParentAsAttributeGroup()
    {
        $schema = WsdlTest::wsdlWhlInstance();
        /** @var TagAttribute $attribute */
        $attribute = $schema->getContent()->getElementByNameAndAttributes(Wsdl::TAG_ATTRIBUTE, [
            'name' => 'ShortText',
            'type' => 'whlsoap:StringLength1to64',
            'use' => 'optional',
        ]);
        $this->assertInstanceOf('WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagAttribute', $attribute);
        $parent = $attribute->getSuitableParent();
        $this->assertInstanceOf('WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagAttributeGroup', $parent);
        $this->assertSame(Wsdl::TAG_ATTRIBUTE_GROUP, $parent->getName());
    }
}
