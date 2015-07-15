<?php

namespace WsdlToPhp\PackageGenerator\Tests\Model;

use WsdlToPhp\PackageGenerator\Tests\TestCase;

class StructValueTest extends TestCase
{
    /**
     *
     */
    public function testGetValue()
    {
        $struct = StructTest::instance('Foot', true);
        $struct->setIsRestriction(true);
        $struct->addValue(1);
        $struct->addValue('Bar');
        $struct->addValue("5.3");

        $this->assertSame(1, $struct->getValue(1)->getValue());
        $this->assertNotSame("1", $struct->getValue(1)->getValue());
        $this->assertSame('5.3', $struct->getValue("5.3")->getValue());
    }
}
