<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

class MaxInclusiveRuleTest extends RuleTest
{
    /**
     *
     */
    public function testApplyRuleWithExactSameValue()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MaxInclusiveRule', 2);
        $this->assertTrue(call_user_func($funtionName, 2));
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleWithGreaterValue()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MaxInclusiveRule', 2);
        call_user_func($funtionName, 3);
    }
    /**
     *
     */
    public function testApplyRuleWithLowerValue()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MaxInclusiveRule', 2);
        $this->assertTrue(call_user_func($funtionName, 1.99));
    }
    /**
     *
     */
    public function testApplyRuleWithNull()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MaxInclusiveRule', 2);
        $this->assertTrue(call_user_func($funtionName, null));
    }
    /**
     *
     */
    public function testApplyRuleWithDateIntervalMustBeTrueWithLowerInterval()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MaxInclusiveRule', 'P10675199DT2H49M5.4775807S');
        $this->assertTrue(call_user_func($funtionName, 'P10675199DT2H49M4.4775807S'));
    }
    /**
     *
     */
    public function testApplyRuleWithDateIntervalMustBeTrueWithSameInterval()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MaxInclusiveRule', $interval = 'P10675199DT2H49M5.4775807S');
        $this->assertTrue(call_user_func($funtionName, $interval));
    }
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid value 'P10675199DT2H49M6.4775807S', the value must be chronologically less than or equal to P10675199DT2H49M5.4775807S
     */
    public function testApplyRuleWithDateIntervalMustBeFalseWthHigherInterval()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MaxInclusiveRule', 'P10675199DT2H49M5.4775807S');
        $this->assertTrue(call_user_func($funtionName, 'P10675199DT2H49M6.4775807S'));
    }
}
