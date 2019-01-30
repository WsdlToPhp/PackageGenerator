<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

class FloatRuleTest extends RuleTest
{
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid value true, please provide a float value, boolean given
     */
    public function testApplyRuleWithBool()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\FloatRule');
        call_user_func($functionName, true);
    }
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid value array (
    0 => 6,
    ), please provide an integer value, array given
     */
    public function testApplyRuleWithArray()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\FloatRule');
        call_user_func($functionName, [6]);
    }
    /**
     *
     */
    public function testApplyRuleWithFloat()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\FloatRule');
        $this->assertTrue(call_user_func($functionName, 6.5));
    }
    /**
     *
     */
    public function testApplyRuleWithInteger()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\FloatRule');
        $this->assertTrue(call_user_func($functionName, 6));
    }
    /**
     *
     */
    public function testApplyRuleWithNull()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\FloatRule');
        $this->assertTrue(call_user_func($functionName, null));
    }
    /**
     *
     */
    public function testApplyRuleWithStringInteger()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\FloatRule');
        $this->assertTrue(call_user_func($functionName, '6'));
    }
    /**
     *
     */
    public function testApplyRuleWithFloatStringMustPass()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\FloatRule');
        $this->assertTrue(call_user_func($functionName, '6.5'));
    }
}
