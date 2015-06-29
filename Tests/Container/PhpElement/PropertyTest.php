<?php

namespace WsdlToPhp\PackageGenerator\Tests\Container\PhpElement;

use WsdlToPhp\PhpGenerator\Element\PhpConstant;
use WsdlToPhp\PhpGenerator\Element\PhpProperty;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Property;
use WsdlToPhp\PackageGenerator\Tests\TestCase;

class PropertyTest extends TestCase
{
    /**
     *
     */
    public function testAdd()
    {
        $property = new Property();

        $property->add(new PhpProperty('foo'));

        $this->assertCount(1, $property);
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testAddWithException()
    {
        $property = new Property();

        $property->add(new PhpConstant('Bar'));
    }
}
