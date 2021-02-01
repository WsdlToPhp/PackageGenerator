<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

use InvalidArgumentException;

final class BooleanRuleTest extends AbstractRuleTest
{
    public function testSetPrimaryWithStringValueMustThrowAnException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid value \'true\', please provide a bool, string given');

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
