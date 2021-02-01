<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

use InvalidArgumentException;

final class FloatRuleTest extends AbstractRuleTest
{
    public function testSetPercentValueWithStringValueMustThrowAnException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid value \'foo\', please provide a float value, string given');

        $instance = self::getWhlTaxTypeInstance();

        $instance->setPercent('foo');
    }

    public function testSetPercentValueWithIntValueMustPass()
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setPercent(85));
    }

    public function testSetPercentValueWithStringIntValueMustPass()
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setPercent('85'));
    }

    public function testSetPercentValueWithFloatValueMustPass()
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setPercent(8.5));
    }

    public function testSetPercentValueWithStringFloatValueMustPass()
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setPercent('8.5'));
    }

    public function testSetPercentValueWithNullValueMustPass()
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setPercent(null));
    }
}
