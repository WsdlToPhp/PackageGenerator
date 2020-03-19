<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

use WsdlToPhp\PackageGenerator\File\Validation\FractionDigitsRule;

class FractionDigitsRuleTest extends AbstractRuleTest
{

    /**
     * - fractionDigits: 3
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid value 2.12345, the value must at most contain 3 fraction digits, 5 given
     */
    public function testSetAmountValueWithTooManyFractionDigitsMustThrowAnException()
    {
        // hack as precision can return false negative with 2.1234500000000001
        ini_set('serialize_precision', 6);
        $instance = self::getWhlTaxTypeInstance();

        $instance->setAmount(2.12345);
    }

    /**
     * - fractionDigits: 0
     */
    public function testSetWeightValueWithIntegerMustPass()
    {
        $functionName = self::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\FractionDigitsRule', 0);

        $this->assertTrue(call_user_func($functionName, 200));
    }

    /**
     * - fractionDigits: 0
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid value 200.01, the value must at most contain 0 fraction digits, 2 given
     */
    public function testSetWeightValueWithDecimalMustThrowAnException()
    {
        $functionName = self::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\FractionDigitsRule', 0);

        call_user_func($functionName, 200.010);
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
