<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

use WsdlToPhp\PackageGenerator\File\Validation\FractionDigitsRule;

/**
 * @internal
 * @coversDefaultClass
 */
final class FractionDigitsRuleTest extends AbstractRule
{
    /**
     * - fractionDigits: 3.
     */
    public function testSetAmountValueWithTooManyFractionDigitsMustThrowAnException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid value 2.12345, the value must at most contain 3 fraction digits, 5 given');

        // hack as precision can return false negative with 2.1234500000000001
        ini_set('serialize_precision', '6');
        $instance = self::getWhlTaxTypeInstance();

        $instance->setAmount(2.12345);
    }

    /**
     * - fractionDigits: 0.
     */
    public function testSetWeightValueWithIntegerMustPass(): void
    {
        $functionName = self::createRuleFunction(FractionDigitsRule::class, 0);

        $this->assertTrue(call_user_func($functionName, 200));
    }

    /**
     * - fractionDigits: 0.
     */
    public function testSetWeightValueWithDecimalMustThrowAnException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid value 200.01, the value must at most contain 0 fraction digits, 2 given');

        $functionName = self::createRuleFunction(FractionDigitsRule::class, 0);

        call_user_func($functionName, 200.010);
    }

    /**
     * - fractionDigits: 3.
     */
    public function testSetAmountValueWithSameFractionDigitsMustPass(): void
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setAmount(2.123));
    }

    /**
     * - fractionDigits: 3.
     */
    public function testSetAmountValueWithLessFractionDigitsMustPass(): void
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setAmount(2.12));
    }

    /**
     * - fractionDigits: 3.
     */
    public function testSetAmountValueWithNullValueMustPass(): void
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setAmount(null));
    }
}
