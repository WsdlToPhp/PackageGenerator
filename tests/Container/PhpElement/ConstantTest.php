<?php

namespace WsdlToPhp\PackageGenerator\Tests\Container\PhpElement;

use WsdlToPhp\PhpGenerator\Element\PhpMethod;
use WsdlToPhp\PhpGenerator\Element\PhpConstant;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Constant;
use WsdlToPhp\PackageGenerator\Tests\TestCase;

class ConstantTest extends TestCase
{
    /**
     *
     */
    public function testAdd()
    {
        $constant = new Constant(self::getBingGeneratorInstance());

        $constant->add(new PhpConstant('foo', 1));

        $this->assertCount(1, $constant);

        $this->assertInstanceOf('\WsdlToPhp\PhpGenerator\Element\PhpConstant', $constant->get('foo'));
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testAddWithException()
    {
        $constant = new Constant(self::getBingGeneratorInstance());

        $constant->add(new PhpMethod('Bar'));
    }
}
