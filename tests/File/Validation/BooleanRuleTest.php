<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

class BooleanRuleTest extends AbstractRuleTest
{

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid value 'true', please provide a bool, string given
     */
    public function testSetPrimaryWithStringValueMustThrowAnException()
    {
        $instance = self::getWhlBookingChannelInstance();

        $instance->setPrimary('true');
    }

    /**
     *
     */
    public function testSetPrimaryWithTrueValueMustPass()
    {
        $instance = self::getWhlBookingChannelInstance();

        $this->assertSame($instance, $instance->setPrimary(true));
    }

    /**
     *
     */
    public function testSetPrimaryWithFalseValueMustPass()
    {
        $instance = self::getWhlBookingChannelInstance();

        $this->assertSame($instance, $instance->setPrimary(false));
    }

    /**
     *
     */
    public function testSetPrimaryWithNullValueMustPass()
    {
        $instance = self::getWhlBookingChannelInstance();

        $this->assertSame($instance, $instance->setPrimary(null));
    }
}
