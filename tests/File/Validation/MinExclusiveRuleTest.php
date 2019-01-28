<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

class MinExclusiveRuleTest extends RuleTest
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleWithExactSameValue()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinExclusiveRule', 2);
        call_user_func($funtionName, 2);
    }
    /**
     *
     */
    public function testApplyRuleWithGreaterValue()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinExclusiveRule', 2);
        $this->assertTrue(call_user_func($funtionName, 2.1));
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleWithLowerValue()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinExclusiveRule', 2);
        call_user_func($funtionName, 1.99);
    }
    /**
     *
     */
    public function testApplyRuleWithNull()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinExclusiveRule', 2);
        $this->assertTrue(call_user_func($funtionName, null));
    }
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid value 'P10675199DT2H49M4.4775807S', the value must be chronologically greater than P10675199DT2H49M5.4775807S
     */
    public function testApplyRuleWithDateIntervalMustBeFalseWithLowerInterval()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinExclusiveRule', 'P10675199DT2H49M5.4775807S');
        $this->assertTrue(call_user_func($funtionName, 'P10675199DT2H49M4.4775807S'));
    }
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage P10675199DT2H49M5.4775807S', the value must be chronologically greater than P10675199DT2H49M5.4775807S
     */
    public function testApplyRuleWithDateIntervalMustBeFalseWithSameInterval()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinExclusiveRule', $interval = 'P10675199DT2H49M5.4775807S');
        $this->assertTrue(call_user_func($funtionName, $interval));
    }
    /**
     *
     */
    public function testApplyRuleWithDateIntervalMustBeTrueWthHigherInterval()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinExclusiveRule', 'P10675199DT2H49M5.4775807S');
        $this->assertTrue(call_user_func($funtionName, 'P10675199DT2H49M6.4775807S'));
    }
}
