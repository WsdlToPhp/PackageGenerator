<?php

namespace WsdlToPhp\PackageGenerator\Tests\WsdlHandler\Tag;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Tests\Model\WsdlTest;
use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\AbstractTag;

class TagDocumentationTest extends TestCase
{
    /**
     *
     */
    public function testGetSuitableParent()
    {
        $schema = WsdlTest::wsdlImageServiceViewAvailRequestInstance();
        $documentations = $schema->getContent()->getElementsByName(Wsdl::TAG_DOCUMENTATION);
        $ok = false;
        foreach ($documentations as $documentation) {
            $parent = $documentation->getSuitableParent();
            if ($parent instanceof AbstractTag) {
                $this->assertSame('availRequest', $parent->getAttributeName());
                $ok = true;
            }
        }
        $this->assertTrue($ok);
    }
    /**
     *
     */
    public function testGetSuitableParentAsEnumeration()
    {
        $wsdl = WsdlTest::wsdlEbayInstance();
        $enumeration = $wsdl->getContent()->getElementByNameAndAttributes(Wsdl::TAG_ENUMERATION, [
            'value' => 'Success',
        ]);
        $this->assertSame('Success', $enumeration->getValue());
        $documentation = $enumeration->getChildByNameAndAttributes(Wsdl::TAG_DOCUMENTATION, []);
        $this->assertSame('(out) Request processing succeeded', $documentation->getValue());
        $this->assertInstanceOf('\WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagDocumentation', $documentation);
        $this->assertInstanceOf('\WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagEnumeration', $documentation->getSuitableParent());
        $this->assertSame($enumeration->getValue(), $documentation->getSuitableParent()->getValue());
    }
}
