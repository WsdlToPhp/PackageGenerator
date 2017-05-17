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
}
