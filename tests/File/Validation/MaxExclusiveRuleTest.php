<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

class MaxExclusiveRuleTest extends AbstractRuleTest
{

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleWithExactSameValue()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MaxExclusiveRule', 2);
        call_user_func($functionName, 2);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleWithGreaterValue()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MaxExclusiveRule', 2);
        call_user_func($functionName, 3);
    }

    /**
     *
     */
    public function testApplyRuleWithLowerValue()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MaxExclusiveRule', 2);
        $this->assertTrue(call_user_func($functionName, 1.99));
    }

    /**
     *
     */
    public function testApplyRuleWithNull()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MaxExclusiveRule', 2);
        $this->assertTrue(call_user_func($functionName, null));
    }

    /**
     *
     */
    public function testApplyRuleWithDateIntervalMustBeTrueWithLowerInterval()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MaxExclusiveRule', 'P10675199DT2H49M5.4775807S');
        $this->assertTrue(call_user_func($functionName, 'P10675199DT2H49M4.4775807S'));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid value 'P10675199DT2H49M5.4775807S', the value must be chronologically less than P10675199DT2H49M5.4775807S
     */
    public function testApplyRuleWithDateIntervalMustBeFalseWithSameInterval()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MaxExclusiveRule', $interval = 'P10675199DT2H49M5.4775807S');
        call_user_func($functionName, $interval);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid value 'P10675199DT2H49M6.4775807S', the value must be chronologically less than P10675199DT2H49M5.4775807S
     */
    public function testApplyRuleWithDateIntervalMustBeFalseWithHigherInterval()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MaxExclusiveRule', 'P10675199DT2H49M5.4775807S');
        call_user_func($functionName, 'P10675199DT2H49M6.4775807S');
    }
}
