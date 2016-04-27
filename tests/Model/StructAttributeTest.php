<?php

namespace WsdlToPhp\PackageGenerator\Tests\Model;

use WsdlToPhp\PackageGenerator\Tests\TestCase;

class StructAttributeTest extends TestCase
{
    /**
     *
     */
    public function testGetUniqueName()
    {
        $struct = StructTest::instance('Foo', true);
        $struct->addAttribute('id', 'int');
        $struct->addAttribute('name', 'string');
        $struct->addAttribute('Name', 'string');

        $this->assertEquals('id', $struct->getAttribute('id')->getUniqueName());
        $this->assertEquals('name', $struct->getAttribute('name')->getUniqueName());
        $this->assertEquals('Name_1', $struct->getAttribute('Name')->getUniqueName());
    }
    public function testGetReservedMethodsInstance()
    {
        $struct = StructTest::instance('Foo', true);
        $struct->addAttribute('id', 'int');
        $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\ConfigurationReader\\StructReservedMethod', $struct->getAttribute('id')->getReservedMethodsInstance());
    }
}
