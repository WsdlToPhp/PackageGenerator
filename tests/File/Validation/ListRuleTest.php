<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

use EnumType\ApiDayOfWeekType;

/**
 * @internal
 * @coversDefaultClass
 */
final class ListRuleTest extends AbstractRule
{
    public function testSetDayOfWeekWithInvalidArrayValueMustThrowAnException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid value(s) string(\'Today\'), please use one of: Sunday, Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Day, Weekday, WeekendDay from enumeration class \EnumType\ApiDayOfWeekType');

        $instance = self::getEwsWorkingPeriodInstance();

        $instance->setDayOfWeek([
            'Today',
        ]);
    }

    public function testSetDayOfWeekWithInvalidStringValueMustThrowAnException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid value(s) string(\'Today\'), please use one of: Sunday, Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Day, Weekday, WeekendDay from enumeration class \EnumType\ApiDayOfWeekType');

        $instance = self::getEwsWorkingPeriodInstance();

        $instance->setDayOfWeek('Today');
    }

    public function testSetDayOfWeekWithValidArrayValuesMustPass(): void
    {
        $instance = self::getEwsWorkingPeriodInstance();

        $instance->setDayOfWeek($values = [
            ApiDayOfWeekType::VALUE_MONDAY, // @phpstan-ignore-line
            'Tuesday',
            'Friday',
            'Sunday',
        ]);

        $this->assertSame(implode(' ', $values), $instance->getDayOfWeek());
    }

    public function testSetDayOfWeekWithValidStringValueMustPass(): void
    {
        $instance = self::getEwsWorkingPeriodInstance();

        $instance->setDayOfWeek($value = implode(' ', [
            ApiDayOfWeekType::VALUE_MONDAY, // @phpstan-ignore-line
            'Tuesday',
            'Friday',
            'Sunday',
        ]));

        $this->assertSame($value, $instance->getDayOfWeek());
    }

    public function testSetDayOfWeekWithNullValueMustPass(): void
    {
        $instance = self::getEwsWorkingPeriodInstance();

        $this->assertSame($instance, $instance->setDayOfWeek([null]));
    }
}
