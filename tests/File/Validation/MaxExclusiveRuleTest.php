<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

class MaxExclusiveRuleTest extends RuleTest
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleWithExactSameValue()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MaxExclusiveRule', 2);
        call_user_func($funtionName, 2);
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleWithGreaterValue()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MaxExclusiveRule', 2);
        call_user_func($funtionName, 3);
    }
    /**
     *
     */
    public function testApplyRuleWithLowerValue()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MaxExclusiveRule', 2);
        $this->assertTrue(call_user_func($funtionName, 1.99));
    }
    /**
     *
     */
    public function testApplyRuleWithNull()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MaxExclusiveRule', 2);
        $this->assertTrue(call_user_func($funtionName, null));
    }
    /**
     *
     */
    public function testApplyRuleWithDateIntervalMustBeTrueWithLowerInterval()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MaxExclusiveRule', 'P10675199DT2H49M5.4775807S');
        $this->assertTrue(call_user_func($funtionName, 'P10675199DT2H49M4.4775807S'));
    }
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid value 'P10675199DT2H49M5.4775807S', the value must be chronologically less than P10675199DT2H49M5.4775807S
     */
    public function testApplyRuleWithDateIntervalMustBeFalseWithSameInterval()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MaxExclusiveRule', $interval = 'P10675199DT2H49M5.4775807S');
        $this->assertTrue(call_user_func($funtionName, $interval));
    }
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid value 'P10675199DT2H49M6.4775807S', the value must be chronologically less than P10675199DT2H49M5.4775807S
     */
    public function testApplyRuleWithDateIntervalMustBeFalseWithHigherInterval()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MaxExclusiveRule', 'P10675199DT2H49M5.4775807S');
        $this->assertTrue(call_user_func($funtionName, 'P10675199DT2H49M6.4775807S'));
    }
}
