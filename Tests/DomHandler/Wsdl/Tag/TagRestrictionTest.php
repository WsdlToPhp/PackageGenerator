<?php

namespace WsdlToPhp\PackageGenerator\Tests\DomHandler\Wsdl\Tag;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Tests\Model\WsdlTest;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl;

class TagRestrictionTest extends TestCase
{
    /**
     *
     */
    public function testIsEnumeration()
    {
        $wsdl = WsdlTest::bingInstance();

        $restrictions = $wsdl->getContent()->getElementsByName(Wsdl::TAG_RESTRICTION);

        foreach ($restrictions as $index=>$restriction) {
            $this->assertTrue($restriction->isEnumeration());
        }
    }
}
