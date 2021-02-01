<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Container\PhpElement;

use InvalidArgumentException;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;
use WsdlToPhp\PhpGenerator\Element\PhpConstant;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Constant;
use WsdlToPhp\PackageGenerator\Tests\AbstractTestCase;

final class ConstantTest extends AbstractTestCase
{
    public function testAdd()
    {
        $constant = new Constant(self::getBingGeneratorInstance());

        $constant->add(new PhpConstant('foo', 1));

        $this->assertCount(1, $constant);
        $this->assertInstanceOf(PhpConstant::class, $constant->get('foo'));
    }

    public function testAddWithException()
    {
        $this->expectException(InvalidArgumentException::class);

        $constant = new Constant(self::getBingGeneratorInstance());

        $constant->add(new PhpMethod('Bar'));
    }
}
