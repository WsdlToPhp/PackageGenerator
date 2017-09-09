<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

class IntRuleTest extends RuleTest
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleWithBool()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\IntRule', null);
        call_user_func($funtionName, true);
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleWithArray()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\IntRule', null);
        call_user_func($funtionName, [6]);
    }
    /**
     *
     */
    public function testApplyRuleWithInteger()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\IntRule', null);
        $this->assertTrue(call_user_func($funtionName, 6));
    }
    /**
     *
     */
    public function testApplyRuleWithNull()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\IntRule', null);
        $this->assertTrue(call_user_func($funtionName, null));
    }
    /**
     *
     */
    public function testApplyRuleWithString()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\IntRule', null);
        $this->assertTrue(call_user_func($funtionName, '6'));
    }
}
