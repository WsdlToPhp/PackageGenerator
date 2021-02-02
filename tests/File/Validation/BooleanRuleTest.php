<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

use TypeError;

/**
 * @internal
 * @coversDefaultClass
 */
final class BooleanRuleTest extends AbstractRuleTest
{
    public function testSetPrimaryWithStringValueMustThrowAnException()
    {
        $this->expectException(TypeError::class);

        $instance = self::getWhlBookingChannelInstance();

        $instance->setPrimary('true');
    }

    public function testSetPrimaryWithTrueValueMustPass()
    {
        $instance = self::getWhlBookingChannelInstance();

        $this->assertSame($instance, $instance->setPrimary(true));
    }

    public function testSetPrimaryWithFalseValueMustPass()
    {
        $instance = self::getWhlBookingChannelInstance();

        $this->assertSame($instance, $instance->setPrimary(false));
    }

    public function testSetPrimaryWithNullValueMustPass()
    {
        $instance = self::getWhlBookingChannelInstance();

        $this->assertSame($instance, $instance->setPrimary(null));
    }
}
