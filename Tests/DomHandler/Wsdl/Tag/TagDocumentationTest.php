<?php

namespace WsdlToPhp\PackageGenerator\Tests\DomHandler\Wsdl\Tag;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Tests\Model\WsdlTest;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\AbstractTag;

class TagDocumentationTest extends TestCase
{
    /**
     *
     */
    public function testGetSuitableParent()
    {
        $wsdl = WsdlTest::imageServiceViewAvailRequestInstance();

        $documentations = $wsdl->getContent()->getElementsByName(Wsdl::TAG_DOCUMENTATION);

        $ok = false;
        foreach ($documentations as $index=>$documentation) {
            $parent = $documentation->getSuitableParent();
            if ($parent instanceof AbstractTag) {
                $this->assertSame('availRequest', $parent->getAttributeName());
                $ok = true;
            }
        }
        $this->assertTrue($ok);
    }
}
