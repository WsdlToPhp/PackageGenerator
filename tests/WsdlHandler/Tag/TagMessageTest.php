<?php

namespace WsdlToPhp\PackageGenerator\Tests\WsdlHandler\Tag;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Tests\Model\WsdlTest;
use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl;

class TagMessageTest extends TestCase
{
    /**
     *
     */
    public function testGetPart()
    {
        $wsdl = WsdlTest::wsdlEbayInstance();

        $messages = $wsdl->getContent()->getElementsByName(Wsdl::TAG_MESSAGE);

        $this->assertInstanceOf('\WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagPart', $messages[0]->getPart('RequesterCredentials'));
    }
}
