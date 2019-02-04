<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

class MinExclusiveRuleTest extends AbstractRuleTest
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleWithExactSameValue()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinExclusiveRule', 2);
        call_user_func($functionName, 2);
    }
    /**
     *
     */
    public function testApplyRuleWithGreaterValue()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinExclusiveRule', 2);
        $this->assertTrue(call_user_func($functionName, 2.1));
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleWithLowerValue()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinExclusiveRule', 2);
        call_user_func($functionName, 1.99);
    }
    /**
     *
     */
    public function testApplyRuleWithNull()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinExclusiveRule', 2);
        $this->assertTrue(call_user_func($functionName, null));
    }
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid value '-P10675199DT2H49M6.4775807S', the value must be chronologically greater than -P10675199DT2H49M5.4775807S
     */
    public function testApplyRuleWithDateIntervalMustBeFalseWithLowerInterval()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinExclusiveRule', '-P10675199DT2H49M5.4775807S');
        $this->assertTrue(call_user_func($functionName, '-P10675199DT2H49M6.4775807S'));
    }
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid value '-P10675199DT2H49M5.4775807S', the value must be chronologically greater than -P10675199DT2H49M5.4775807S
     */
    public function testApplyRuleWithDateIntervalMustBeFalseWithSameInterval()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinExclusiveRule', $interval = '-P10675199DT2H49M5.4775807S');
        $this->assertTrue(call_user_func($functionName, $interval));
    }
    /**
     *
     */
    public function testApplyRuleWithDateIntervalMustBeTrueWthHigherInterval()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinExclusiveRule', '-P10675199DT2H49M5.4775807S');
        $this->assertTrue(call_user_func($functionName, '-P10675199DT2H49M4.4775807S'));
    }
}
