<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Container\PhpElement;

use WsdlToPhp\PackageGenerator\Container\PhpElement\Property;
use WsdlToPhp\PackageGenerator\Tests\AbstractTestCase;
use WsdlToPhp\PhpGenerator\Element\PhpConstant;
use WsdlToPhp\PhpGenerator\Element\PhpProperty;

/**
 * @internal
 * @coversDefaultClass
 */
final class PropertyTest extends AbstractTestCase
{
    public function testAdd(): void
    {
        $property = new Property(self::getBingGeneratorInstance());

        $property->add(new PhpProperty('foo'));

        $this->assertCount(1, $property);
        $this->assertInstanceOf(PhpProperty::class, $property->get('foo'));
    }

    public function testAddWithException(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $property = new Property(self::getBingGeneratorInstance());

        $property->add(new PhpConstant('Bar'));
    }
}
