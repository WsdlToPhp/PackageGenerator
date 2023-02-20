<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

/**
 * @internal
 * @coversDefaultClass
 */
final class BooleanRuleTest extends AbstractRule
{
    public function testSetPrimaryWithStringValueMustThrowAnException(): void
    {
        $this->expectException(\TypeError::class);

        $instance = self::getWhlBookingChannelInstance();

        $instance->setPrimary('true');
    }

    public function testSetPrimaryWithTrueValueMustPass(): void
    {
        $instance = self::getWhlBookingChannelInstance();

        $this->assertSame($instance, $instance->setPrimary(true));
    }

    public function testSetPrimaryWithFalseValueMustPass(): void
    {
        $instance = self::getWhlBookingChannelInstance();

        $this->assertSame($instance, $instance->setPrimary(false));
    }

    public function testSetPrimaryWithNullValueMustPass(): void
    {
        $instance = self::getWhlBookingChannelInstance();

        $this->assertSame($instance, $instance->setPrimary(null));
    }
}
