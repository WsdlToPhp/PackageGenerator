<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

class IntRuleTest extends AbstractRuleTest
{

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid value 'foo', please provide an integer value, string given
     */
    public function testSetDecimalPlacesValueWithStringValueMustThrowAnException()
    {
        $instance = self::getWhlTaxTypeInstance();

        $instance->setDecimalPlaces('foo');
    }

    /**
     *
     */
    public function testSetDecimalPlacesValueWithIntValueMustPass()
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setDecimalPlaces(18));
    }

    /**
     *
     */
    public function testSetDecimalPlacesValueWithStringIntValueMustPass()
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setDecimalPlaces('18'));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid value 18.5, please provide an integer value, double given
     */
    public function testSetDecimalPlacesValueWithFloatValueMustThrowAnException()
    {
        $instance = self::getWhlTaxTypeInstance();

        $instance->setDecimalPlaces(18.5);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid value '18.5', please provide an integer value, string given
     */
    public function testSetDecimalPlacesValueWithStringFloatValueMustThrowAnException()
    {
        $instance = self::getWhlTaxTypeInstance();

        $instance->setDecimalPlaces('18.5');
    }

    /**
     *
     */
    public function testSetDecimalPlacesValueWithNullValueMustPass()
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setDecimalPlaces(null));
    }
}
