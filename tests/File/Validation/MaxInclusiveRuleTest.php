<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

use WsdlToPhp\PackageGenerator\File\Validation\MaxInclusiveRule;

/**
 * @internal
 * @coversDefaultClass
 */
final class MaxInclusiveRuleTest extends AbstractRule
{
    /**
     * The Percent
     * Meta informations extracted from the WSDL
     * - documentation: Fee percentage; if zero, assume use of the Amount attribute (Amount or Percent must be a zero value). | Used for percentage values.
     * - base: xs:decimal
     * - maxInclusive: 100.00
     * - minInclusive: 0.00.
     */
    public function testSetPercentWithHigherFloatValueMustThrowAnException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid value 100.01, the value must be numerically less than or equal to 100.00');

        $instance = self::getWhlTaxTypeInstance();

        $instance->setPercent(100.01);
    }

    /**
     * The Percent
     * Meta informations extracted from the WSDL
     * - documentation: Fee percentage; if zero, assume use of the Amount attribute (Amount or Percent must be a zero value). | Used for percentage values.
     * - base: xs:decimal
     * - maxInclusive: 100.00
     * - minInclusive: 0.00.
     */
    public function testSetPercentWithSameFloatValueMustPass(): void
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setPercent(100.00));
    }

    /**
     * The Percent
     * Meta informations extracted from the WSDL
     * - documentation: Fee percentage; if zero, assume use of the Amount attribute (Amount or Percent must be a zero value). | Used for percentage values.
     * - base: xs:decimal
     * - maxInclusive: 100.00
     * - minInclusive: 0.00.
     */
    public function testSetPercentWithSameIntValueMustPass(): void
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setPercent(100));
    }

    /**
     * The Percent
     * Meta informations extracted from the WSDL
     * - documentation: Fee percentage; if zero, assume use of the Amount attribute (Amount or Percent must be a zero value). | Used for percentage values.
     * - base: xs:decimal
     * - maxInclusive: 100.00
     * - minInclusive: 0.00.
     */
    public function testSetPercentWithLowerIntValueMustPass(): void
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setPercent(99));
    }

    /**
     * The Percent
     * Meta informations extracted from the WSDL
     * - documentation: Fee percentage; if zero, assume use of the Amount attribute (Amount or Percent must be a zero value). | Used for percentage values.
     * - base: xs:decimal
     * - maxInclusive: 100.00
     * - minInclusive: 0.00.
     */
    public function testSetPercentWithNullValueMustPass(): void
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setPercent(null));
    }

    public function testApplyRuleWithDateIntervalMustBeTrueWithLowerInterval(): void
    {
        $functionName = parent::createRuleFunction(MaxInclusiveRule::class, 'P10675199DT2H49M5.4775807S');
        $this->assertTrue(call_user_func($functionName, 'P10675199DT2H49M4.4775807S'));
    }

    public function testApplyRuleWithDateIntervalMustBeTrueWithSameInterval(): void
    {
        $functionName = parent::createRuleFunction(MaxInclusiveRule::class, $interval = 'P10675199DT2H49M5.4775807S');
        $this->assertTrue(call_user_func($functionName, $interval));
    }

    public function testApplyRuleWithDateIntervalMustBeFalseWthHigherInterval(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid value \'P10675199DT2H49M6.4775807S\', the value must be chronologically less than or equal to P10675199DT2H49M5.4775807S');

        $functionName = parent::createRuleFunction(MaxInclusiveRule::class, 'P10675199DT2H49M5.4775807S');
        $this->assertTrue(call_user_func($functionName, 'P10675199DT2H49M6.4775807S'));
    }
}
