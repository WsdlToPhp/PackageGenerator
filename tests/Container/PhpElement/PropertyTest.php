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
        $property = new Property(self::getBingGeneratorInstance());

        $property->add(new PhpProperty('foo'));

        $this->assertCount(1, $property);

        $this->assertInstanceOf('\WsdlToPhp\PhpGenerator\Element\PhpProperty', $property->get('foo'));
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testAddWithException()
    {
        $property = new Property(self::getBingGeneratorInstance());

        $property->add(new PhpConstant('Bar'));
    }
}
