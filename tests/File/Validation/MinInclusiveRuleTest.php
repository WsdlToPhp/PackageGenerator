<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

class MinInclusiveRuleTest extends RuleTest
{
    /**
     *
     */
    public function testApplyRuleWithExactSameValue()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinInclusiveRule', 2);
        $this->assertTrue(call_user_func($funtionName, 2));
    }
    /**
     *
     */
    public function testApplyRuleWithGreaterValue()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinInclusiveRule', 2);
        $this->assertTrue(call_user_func($funtionName, 2.1));
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleWithLowerValue()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinInclusiveRule', 2);
        call_user_func($funtionName, 1.99);
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleWithNull()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinInclusiveRule', 2);
        call_user_func($funtionName, null);
    }
}
