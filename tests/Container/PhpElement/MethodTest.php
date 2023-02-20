<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Container\PhpElement;

use WsdlToPhp\PackageGenerator\Container\PhpElement\Method;
use WsdlToPhp\PackageGenerator\Tests\AbstractTestCase;
use WsdlToPhp\PhpGenerator\Element\PhpConstant;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;

/**
 * @internal
 * @coversDefaultClass
 */
final class MethodTest extends AbstractTestCase
{
    public function testAdd(): void
    {
        $method = new Method(self::getBingGeneratorInstance());

        $method->add(new PhpMethod('foo'));

        $this->assertCount(1, $method);
        $this->assertInstanceOf(PhpMethod::class, $method->get('foo'));
    }

    public function testAddWithException(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $method = new Method(self::getBingGeneratorInstance());

        $method->add(new PhpConstant('Bar'));
    }
}
