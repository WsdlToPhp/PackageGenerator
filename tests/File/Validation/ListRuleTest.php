<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

class ListRuleTest extends AbstractRuleTest
{

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid value(s) string('Today'), please use one of: Sunday, Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Day, Weekday, WeekendDay from enumeration class \EnumType\ApiDayOfWeekType
     */
    public function testSetDayOfWeekWithInvalidValueMustThrowAnException()
    {
        $instance = self::getEwsWorkingPeriodInstance();

        $instance->setDayOfWeek([
            'Today',
        ]);
    }

    /**
     *
     */
    public function testSetDayOfWeekWithValidValuesMustPass()
    {
        $instance = self::getEwsWorkingPeriodInstance();

        $this->assertSame($instance, $instance->setDayOfWeek([
            \EnumType\ApiDayOfWeekType::VALUE_MONDAY,
            'Tuesday',
            'Friday',
            'Sunday',
        ]));
    }

    /**
     *
     */
    public function testSetDayOfWeekWithNullValueMustPass()
    {
        $instance = self::getEwsWorkingPeriodInstance();

        $this->assertSame($instance, $instance->setDayOfWeek([null]));
    }
}
