<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

use TypeError;

/**
 * @internal
 * @coversDefaultClass
 */
final class FloatRuleTest extends AbstractRuleTest
{
    public function testSetPercentValueWithStringValueMustThrowAnException(): void
    {
        $this->expectException(TypeError::class);

        $instance = self::getWhlTaxTypeInstance();

        $instance->setPercent('foo');
    }

    public function testSetPercentValueWithIntValueMustPass(): void
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setPercent(85));
    }

    public function testSetPercentValueWithFloatValueMustPass(): void
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setPercent(8.5));
    }

    public function testSetPercentValueWithNullValueMustPass(): void
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setPercent(null));
    }
}
