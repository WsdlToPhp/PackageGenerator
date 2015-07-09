<?php

namespace WsdlToPhp\PackageGenerator\Tests\DomHandler\Wsdl\Tag;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Tests\Model\WsdlTest;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl;

class TagEnumerationTest extends TestCase
{
    /**
     *
     */
    public function testGetValue()
    {
        $wsdl = WsdlTest::numericEnumerationInstance();

        $enumeration = $wsdl->getContent()->getElementsByName(Wsdl::TAG_ENUMERATION);

        foreach ($enumeration as $index=>$enumeration) {
            $this->assertSame(sprintf('0%s', $index+1), $enumeration->getValue());
        }
    }
}
