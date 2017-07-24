<?php

namespace WsdlToPhp\PackageGenerator\Tests\WsdlHandler\Tag;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Tests\Model\WsdlTest;
use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl;

class TagListTest extends TestCase
{
    /**
     *
     */
    public function testGetSuitableParent()
    {
        $wsdl = WsdlTest::wsdlOdigeoInstance();

        $lists = $wsdl->getContent()->getElementsByName(Wsdl::TAG_LIST);

        $this->assertCount(4, $lists);

        foreach ($lists as $list) {
            $this->assertSame('int', $list->getAttributeItemType());
        }
    }
}
