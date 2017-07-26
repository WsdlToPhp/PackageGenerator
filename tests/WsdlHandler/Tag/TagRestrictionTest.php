<?php

namespace WsdlToPhp\PackageGenerator\Tests\WsdlHandler\Tag;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Tests\Model\WsdlTest;
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

        foreach ($restrictions as $restriction) {
            $this->assertTrue($restriction->isEnumeration());
        }
    }
}
