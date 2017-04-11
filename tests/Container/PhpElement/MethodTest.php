<?php

namespace WsdlToPhp\PackageGenerator\Tests\Container\PhpElement;

use WsdlToPhp\PhpGenerator\Element\PhpMethod;
use WsdlToPhp\PhpGenerator\Element\PhpConstant;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Method;
use WsdlToPhp\PackageGenerator\Tests\TestCase;

class MethodTest extends TestCase
{
    /**
     *
     */
    public function testAdd()
    {
        $method = new Method(self::getBingGeneratorInstance());

        $method->add(new PhpMethod('foo'));

        $this->assertCount(1, $method);

        $this->assertInstanceOf('\WsdlToPhp\PhpGenerator\Element\PhpMethod', $method->get('foo'));
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testAddWithException()
    {
        $method = new Method(self::getBingGeneratorInstance());

        $method->add(new PhpConstant('Bar'));
    }
}
