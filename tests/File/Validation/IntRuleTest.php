<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

class IntRuleTest extends RuleTest
{
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid value true, please provide an integer value, boolean given
     */
    public function testApplyRuleWithBool()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\IntRule');
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
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\IntRule');
        call_user_func($functionName, [6]);
    }
    /**
     *
     */
    public function testApplyRuleWithInteger()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\IntRule');
        $this->assertTrue(call_user_func($functionName, 6));
    }
    /**
     *
     */
    public function testApplyRuleWithNull()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\IntRule');
        $this->assertTrue(call_user_func($functionName, null));
    }
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid value '6', please provide an integer value, string given
     */
    public function testApplyRuleWithString()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\IntRule');
        $this->assertTrue(call_user_func($functionName, '6'));
    }
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid value 6.5, please provide an integer value, double given
     */
    public function testApplyRuleWithFloatMustThrowAnException()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\IntRule');
        $this->assertTrue(call_user_func($functionName, 6.5));
    }
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid value '6.5', please provide an integer value, string given
     */
    public function testApplyRuleWithFloatStringMustThrowAnException()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\IntRule');
        $this->assertTrue(call_user_func($functionName, '6.5'));
    }
}
