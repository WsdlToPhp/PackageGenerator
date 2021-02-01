<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

use InvalidArgumentException;

final class IntRuleTest extends AbstractRuleTest
{
    public function testSetDecimalPlacesValueWithStringValueMustThrowAnException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid value \'foo\', please provide an integer value, string given');

        $instance = self::getWhlTaxTypeInstance();

        $instance->setDecimalPlaces('foo');
    }

    public function testSetDecimalPlacesValueWithIntValueMustPass()
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setDecimalPlaces(18));
    }

    public function testSetDecimalPlacesValueWithStringIntValueMustPass()
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setDecimalPlaces('18'));
    }

    public function testSetDecimalPlacesValueWithFloatValueMustThrowAnException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid value 18.5, please provide an integer value, double given');

        $instance = self::getWhlTaxTypeInstance();

        $instance->setDecimalPlaces(18.5);
    }

    public function testSetDecimalPlacesValueWithStringFloatValueMustThrowAnException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid value \'18.5\', please provide an integer value, string given');

        $instance = self::getWhlTaxTypeInstance();

        $instance->setDecimalPlaces('18.5');
    }

    public function testSetDecimalPlacesValueWithNullValueMustPass()
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setDecimalPlaces(null));
    }
}
