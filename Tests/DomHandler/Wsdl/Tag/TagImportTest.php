<?php

namespace WsdlToPhp\PackageGenerator\Tests\DomHandler\Wsdl\Tag;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Tests\Model\WsdlTest;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl;

class TagImportTest extends TestCase
{
    /**
     *
     */
    public function testGetLocationAttribute()
    {
        $wsdl = WsdlTest::partnerInstance();

        $imports = $wsdl->getContent()->getElementsByName(Wsdl::TAG_IMPORT);

        $count = 0;
        foreach ($imports as $index=>$import) {
            $this->assertSame(sprintf('http://secapp.euroconsumers.org/partnerservice/PartnerService.svc?xsd=xsd%d', $index), $import->getLocationAttribute());
            $count++;
        }
        $this->assertSame(19, $count);
    }
}
