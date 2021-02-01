<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Container\PhpElement;

use InvalidArgumentException;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;
use WsdlToPhp\PhpGenerator\Element\PhpConstant;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Method;
use WsdlToPhp\PackageGenerator\Tests\AbstractTestCase;

final class MethodTest extends AbstractTestCase
{
    public function testAdd()
    {
        $method = new Method(self::getBingGeneratorInstance());

        $method->add(new PhpMethod('foo'));

        $this->assertCount(1, $method);
        $this->assertInstanceOf(PhpMethod::class, $method->get('foo'));
    }

    public function testAddWithException()
    {
        $this->expectException(InvalidArgumentException::class);

        $method = new Method(self::getBingGeneratorInstance());

        $method->add(new PhpConstant('Bar'));
    }
}
