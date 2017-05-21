<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

class StringRuleTest extends RuleTest
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleWithBool()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\StringRule', null);
        call_user_func($funtionName, true);
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleWithArray()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\StringRule', null);
        call_user_func($funtionName, array(6));
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleWithInteger()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\StringRule', null);
        $this->assertTrue(call_user_func($funtionName, 6));
    }
    /**
     *
     */
    public function testApplyRuleWithNull()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\StringRule', null);
        $this->assertTrue(call_user_func($funtionName, null));
    }
    /**
     *
     */
    public function testApplyRuleWithString()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\StringRule', null);
        $this->assertTrue(call_user_func($funtionName, ''));
    }
}
