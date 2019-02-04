<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

class MinInclusiveRuleTest extends AbstractRuleTest
{

    /**
     * The Percent
     * Meta informations extracted from the WSDL
     * - documentation: Fee percentage; if zero, assume use of the Amount attribute (Amount or Percent must be a zero value). | Used for percentage values.
     * - base: xs:decimal
     * - maxInclusive: 100.00
     * - minInclusive: 0.00
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid value -0.01, the value must be numerically greater than or equal to 0.00
     */
    public function testSetPercentWithLowerFloatValueMustThrowAnException()
    {
        $instance = self::getWhlTaxTypeInstance();

        $instance->setPercent(-0.01);
    }

    /**
     * The Percent
     * Meta informations extracted from the WSDL
     * - documentation: Fee percentage; if zero, assume use of the Amount attribute (Amount or Percent must be a zero value). | Used for percentage values.
     * - base: xs:decimal
     * - maxInclusive: 100.00
     * - minInclusive: 0.00
     */
    public function testSetPercentWithSameFloatValueMustPass()
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setPercent(0.00));
    }

    /**
     * The Percent
     * Meta informations extracted from the WSDL
     * - documentation: Fee percentage; if zero, assume use of the Amount attribute (Amount or Percent must be a zero value). | Used for percentage values.
     * - base: xs:decimal
     * - maxInclusive: 100.00
     * - minInclusive: 0.00
     */
    public function testSetPercentWithSameIntValueMustPass()
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setPercent(0));
    }

    /**
     * The Percent
     * Meta informations extracted from the WSDL
     * - documentation: Fee percentage; if zero, assume use of the Amount attribute (Amount or Percent must be a zero value). | Used for percentage values.
     * - base: xs:decimal
     * - maxInclusive: 100.00
     * - minInclusive: 0.00
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid value -1, the value must be numerically greater than or equal to 0.00
     */
    public function testSetPercentWithLowerIntValueMustPass()
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setPercent(-1));
    }

    /**
     * The Percent
     * Meta informations extracted from the WSDL
     * - documentation: Fee percentage; if zero, assume use of the Amount attribute (Amount or Percent must be a zero value). | Used for percentage values.
     * - base: xs:decimal
     * - maxInclusive: 100.00
     * - minInclusive: 0.00
     */
    public function testSetPercentWithNullValueMustPass()
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setPercent(null));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid value '-P10675199DT2H49M6.4775807S', the value must be chronologically greater than or equal to -P10675199DT2H49M5.4775807S
     */
    public function testApplyRuleWithDateIntervalMustBeFalseWithLowerInterval()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinInclusiveRule', '-P10675199DT2H49M5.4775807S');
        $this->assertTrue(call_user_func($functionName, '-P10675199DT2H49M6.4775807S'));
    }

    /**
     *
     */
    public function testApplyRuleWithDateIntervalMustBeTrueWithSameInterval()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinInclusiveRule', $interval = '-P10675199DT2H49M5.4775807S');
        $this->assertTrue(call_user_func($functionName, $interval));
    }

    /**
     *
     */
    public function testApplyRuleWithDateIntervalMustBeTrueWthHigherInterval()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinInclusiveRule', '-P10675199DT2H49M5.4775807S');
        $this->assertTrue(call_user_func($functionName, '-P10675199DT2H49M4.4775807S'));
    }
}
