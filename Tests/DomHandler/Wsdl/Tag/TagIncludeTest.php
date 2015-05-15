<?php

namespace WsdlToPhp\PackageGenerator\Tests\DomHandler\Wsdl\Tag;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Tests\Model\WsdlTest;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl;

class TagIncludeTest extends TestCase
{
    /**
     *
     */
    public function testGetLocationAttribute()
    {
        $wsdl = WsdlTest::partnerInstance();

        $includes = $wsdl->getContent()->getElementsByName(Wsdl::TAG_INCLUDE);

        foreach ($includes as $index=>$include) {
            $this->assertSame(sprintf('http://secapp.euroconsumers.org/partnerservice/PartnerService.svc?xsd=xsd%d', $index), $include->getLocationAttribute());
        }
    }
}
