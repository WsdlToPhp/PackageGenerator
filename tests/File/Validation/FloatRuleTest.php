<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

class FloatRuleTest extends AbstractRuleTest
{

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid value 'foo', please provide a float value, string given
     */
    public function testSetPercentValueWithStringValueMustThrowAnException()
    {
        $instance = self::getWhlTaxTypeInstance();

        $instance->setPercent('foo');
    }

    /**
     *
     */
    public function testSetPercentValueWithIntValueMustPass()
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setPercent(85));
    }

    /**
     *
     */
    public function testSetPercentValueWithStringIntValueMustPass()
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setPercent('85'));
    }

    /**
     *
     */
    public function testSetPercentValueWithFloatValueMustPass()
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setPercent(8.5));
    }

    /**
     *
     */
    public function testSetPercentValueWithStringFloatValueMustPass()
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setPercent('8.5'));
    }

    /**
     *
     */
    public function testSetPercentValueWithNullValueMustPass()
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setPercent(null));
    }
}
