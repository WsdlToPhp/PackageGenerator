<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

class FractionDigitsRuleTest extends AbstractRuleTest
{

    /**
     * - fractionDigits: 3
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid value 2.12345, the value must at most contain 3 fraction digits, 5 given
     */
    public function testSetAmountValueWithTooManyFractionDigitsMustThrowAnException()
    {
        $instance = self::getWhlTaxTypeInstance();

        $instance->setAmount(2.12345);
    }

    /**
     * - fractionDigits: 3
     */
    public function testSetAmountValueWithSameFractionDigitsMustPass()
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setAmount(2.123));
    }

    /**
     * - fractionDigits: 3
     */
    public function testSetAmountValueWithLessFractionDigitsMustPass()
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setAmount(2.12));
    }

    /**
     * - fractionDigits: 3
     */
    public function testSetAmountValueWithNullValueMustPass()
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setAmount(null));
    }
}
