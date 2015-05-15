<?php

namespace WsdlToPhp\PackageGenerator\Tests\DomHandler\Wsdl\Tag;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Tests\Model\WsdlTest;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl;

class TagListTest extends TestCase
{
    /**
     *
     */
    public function testGetSuitableParent()
    {
        $wsdl = WsdlTest::odigeoInstance();

        $lists = $wsdl->getContent()->getElementsByName(Wsdl::TAG_LIST);

        $this->assertCount(4, $lists);

        foreach ($lists as $index=>$list) {
            $this->assertSame('int', $list->getAttributeItemType());
        }
    }
}
