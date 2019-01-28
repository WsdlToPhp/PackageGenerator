<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

class TotalDigitsRuleTest extends RuleTest
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleWithExceptionFor2Digits()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\TotalDigitsRule', 2);
        call_user_func($funtionName, 2.555);
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleWithExceptionFor3Digits()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\TotalDigitsRule', 3);
        call_user_func($funtionName, 2.5556);
    }
    /**
     *
     */
    public function testApplyRuleFor4Digits()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\TotalDigitsRule', 4);
        $this->assertTrue(call_user_func($funtionName, 2.55));
    }
    /**
     *
     */
    public function testApplyRuleFor2DigitsNegativeValue()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\TotalDigitsRule', 2);
        $this->assertTrue(call_user_func($funtionName, -25));
    }
    /**
     *
     */
    public function testApplyRuleFor4DigitsPositiveValue()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\TotalDigitsRule', 4);
        $this->assertTrue(call_user_func($funtionName, "+2,515"));
    }
    /**
     *
     */
    public function testApplyRuleForNull()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\TotalDigitsRule', 4);
        $this->assertTrue(call_user_func($funtionName, null));
    }
}
