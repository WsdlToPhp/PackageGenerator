<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

class BooleanRuleTest extends RuleTest
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleWithInteger()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\BooleanRule', null);
        call_user_func($funtionName, 2);
    }
    /**
     *
     */
    public function testApplyRuleWithTrue()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\BooleanRule', null);
        $this->assertTrue(call_user_func($funtionName, true));
    }
    /**
     *
     */
    public function testApplyRuleWithFalse()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\BooleanRule', null);
        $this->assertTrue(call_user_func($funtionName, false));
    }
    /**
     *
     */
    public function testApplyRuleWithNull()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\BooleanRule', null);
        $this->assertTrue(call_user_func($funtionName, null));
    }
}
