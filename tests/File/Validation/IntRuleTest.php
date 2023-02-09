<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

/**
 * @internal
 * @coversDefaultClass
 */
final class IntRuleTest extends AbstractRule
{
    public function testSetDecimalPlacesValueWithStringValueMustThrowAnException(): void
    {
        $this->expectException(\TypeError::class);

        $instance = self::getWhlTaxTypeInstance();

        $instance->setDecimalPlaces('foo');
    }

    public function testSetDecimalPlacesValueWithIntValueMustPass(): void
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setDecimalPlaces(18));
    }

    public function testSetDecimalPlacesValueWithStringIntValueMustPass(): void
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setDecimalPlaces(18));
    }

    public function testSetDecimalPlacesValueWithFloatValueMustThrowAnException(): void
    {
        $this->expectException(\TypeError::class);

        $instance = self::getWhlTaxTypeInstance();

        $instance->setDecimalPlaces(18.5);
    }

    public function testSetDecimalPlacesValueWithStringFloatValueMustThrowAnException(): void
    {
        $this->expectException(\TypeError::class);

        $instance = self::getWhlTaxTypeInstance();

        $instance->setDecimalPlaces('18.5');
    }

    public function testSetDecimalPlacesValueWithNullValueMustPass(): void
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setDecimalPlaces(null));
    }
}
