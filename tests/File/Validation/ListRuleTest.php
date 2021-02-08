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
    public function testSetDayOfWeekWithInvalidArrayValueMustThrowAnException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid value(s) string(\'Today\'), please use one of: Sunday, Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Day, Weekday, WeekendDay from enumeration class \Api\EnumType\ApiDayOfWeekType');

        $instance = self::getEwsWorkingPeriodInstance();

        $instance->setDayOfWeek([
            'Today',
        ]);
    }

    public function testSetDayOfWeekWithInvalidStringValueMustThrowAnException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid value(s) string(\'Today\'), please use one of: Sunday, Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Day, Weekday, WeekendDay from enumeration class \Api\EnumType\ApiDayOfWeekType');

        $instance = self::getEwsWorkingPeriodInstance();

        $instance->setDayOfWeek('Today');
    }

    public function testSetDayOfWeekWithValidArrayValuesMustPass()
    {
        $instance = self::getEwsWorkingPeriodInstance();

        $instance->setDayOfWeek($values = [
            ApiDayOfWeekType::VALUE_MONDAY,
            'Tuesday',
            'Friday',
            'Sunday',
        ]);

        $this->assertSame(implode(' ', $values), $instance->getDayOfWeek());
    }

    public function testSetDayOfWeekWithValidStringValueMustPass()
    {
        $instance = self::getEwsWorkingPeriodInstance();

        $instance->setDayOfWeek($value = implode(' ', [
            ApiDayOfWeekType::VALUE_MONDAY,
            'Tuesday',
            'Friday',
            'Sunday',
        ]));

        $this->assertSame($value, $instance->getDayOfWeek());
    }

    public function testSetDayOfWeekWithNullValueMustPass()
    {
        $instance = self::getEwsWorkingPeriodInstance();

        $this->assertSame($instance, $instance->setDayOfWeek([null]));
    }
}
