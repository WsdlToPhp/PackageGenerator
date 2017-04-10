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
        $schema = WsdlTest::imageServiceViewAvailRequestInstance();
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
        $wsdl = WsdlTest::ebayInstance();
        $enumeration = $wsdl->getContent()->getElementByNameAndAttributes(Wsdl::TAG_ENUMERATION, array(
            'value' => 'Success',
        ));
        $this->assertSame('Success', $enumeration->getValue());
        $documentation = $enumeration->getChildByNameAndAttributes(Wsdl::TAG_DOCUMENTATION, array());
        $this->assertSame('(out) Request processing succeeded', $documentation->getValue());
        $this->assertInstanceOf('\WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\TagDocumentation', $documentation);
        $this->assertInstanceOf('\WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\TagEnumeration', $documentation->getSuitableParent());
        $this->assertSame($enumeration->getValue(), $documentation->getSuitableParent()->getValue());
    }
}
