<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

use EnumType\ApiAdultOption;

/**
 * @internal
 * @coversDefaultClass
 */
final class EnumerationRuleTest extends AbstractRule
{
    public function testSetAdultValueWithInvalidValueMustThrowAnException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid value(s) \'foo\', please use one of: Off, Moderate, Strict from enumeration class \EnumType\ApiAdultOption');

        $instance = self::getBingSearchRequestInstance();

        $instance->setAdult('foo');
    }

    public function testSetAdultValueWithValidValueMustPass(): void
    {
        $instance = self::getBingSearchRequestInstance();

        $this->assertSame($instance, $instance->setAdult(ApiAdultOption::VALUE_MODERATE));
    }

    public function testSetAdultValueWithNullValueMustPass(): void
    {
        $instance = self::getBingSearchRequestInstance();

        $this->assertSame($instance, $instance->setAdult(null));
    }
}
