<?php

namespace WsdlToPhp\PackageGenerator\Tests\WsdlHandler\Tag;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Tests\Model\WsdlTest;
use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl;

class TagImportTest extends TestCase
{
    /**
     *
     */
    public function testGetLocationAttribute()
    {
        $wsdl = WsdlTest::wsdlPartnerInstance(true);

        $imports = $wsdl->getContent()->getElementsByName(Wsdl::TAG_IMPORT);

        $count = 0;
        foreach ($imports as $index => $import) {
            $this->assertSame(sprintf('PartnerService.%d.xsd', $index), $import->getLocationAttribute());
            $count++;
        }
        $this->assertSame(19, $count);
    }
}
