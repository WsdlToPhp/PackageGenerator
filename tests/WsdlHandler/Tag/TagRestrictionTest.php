<?php

namespace WsdlToPhp\PackageGenerator\Tests\WsdlHandler\Tag;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Tests\Model\WsdlTest;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagRestriction;
use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl;

class TagRestrictionTest extends TestCase
{
    /**
     *
     */
    public function testIsEnumeration()
    {
        $wsdl = WsdlTest::wsdlBingInstance();

        $restrictions = $wsdl->getContent()->getElementsByName(Wsdl::TAG_RESTRICTION);

        /** @var TagRestriction $restriction */
        foreach ($restrictions as $restriction) {
            $this->assertTrue($restriction->isEnumeration());
            $this->assertTrue($restriction->hasAttributeBase());
        }
    }
}
