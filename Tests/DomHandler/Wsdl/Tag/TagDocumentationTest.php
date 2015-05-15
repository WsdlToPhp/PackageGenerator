<?php

namespace WsdlToPhp\PackageGenerator\Tests\DomHandler\Wsdl\Tag;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Tests\Model\WsdlTest;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl;

class TagDocumentationTest extends TestCase
{
    /**
     *
     */
    public function testGetSuitableParent()
    {
        $wsdl = WsdlTest::imageServiceViewAvailRequestInstance();

        $documentations = $wsdl->getContent()->getElementsByName(Wsdl::TAG_DOCUMENTATION);

        foreach ($documentations as $index=>$documentation) {
            $parent = $documentation->getSuitableParent();
            if ($parent !== null) {
                $this->assertSame('availRequest', $parent->getAttributeName());
            }
        }
    }
}
