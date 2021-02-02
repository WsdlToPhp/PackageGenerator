<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

use Api\EnumType\ApiDayOfWeekType;
use InvalidArgumentException;

/**
 * @internal
 * @coversDefaultClass
 */
final class ListRuleTest extends AbstractRuleTest
{
    public function testSetDayOfWeekWithInvalidValueMustThrowAnException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid value(s) string(\'Today\'), please use one of: Sunday, Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Day, Weekday, WeekendDay from enumeration class \Api\EnumType\ApiDayOfWeekType');

        $instance = self::getEwsWorkingPeriodInstance();

        $instance->setDayOfWeek([
            'Today',
        ]);
    }

    public function testSetDayOfWeekWithValidValuesMustPass()
    {
        $instance = self::getEwsWorkingPeriodInstance();

        $this->assertSame($instance, $instance->setDayOfWeek([
            ApiDayOfWeekType::VALUE_MONDAY,
            'Tuesday',
            'Friday',
            'Sunday',
        ]));
    }

    public function testSetDayOfWeekWithNullValueMustPass()
    {
        $instance = self::getEwsWorkingPeriodInstance();

        $this->assertSame($instance, $instance->setDayOfWeek([null]));
    }
}
