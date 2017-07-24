<?php

namespace WsdlToPhp\PackageGenerator\Tests\WsdlHandler\Tag;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Tests\Model\WsdlTest;
use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl;

class TagEnumerationTest extends TestCase
{
    /**
     *
     */
    public function testGetValue()
    {
        $schema = WsdlTest::wsdlNumericEnumerationInstance();

        $enumerations = $schema->getContent()->getElementsByName(Wsdl::TAG_ENUMERATION);

        foreach ($enumerations as $index => $enumeration) {
            $this->assertSame(sprintf('0%s', $index + 1), $enumeration->getValue());
        }
    }
}
