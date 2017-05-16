<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

class FractionDigitsRuleTest extends RuleTest
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleWithExceptionFor2Digits()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\FractionDigitsRule', 2);
        call_user_func($funtionName, 2.555);
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleWithExceptionFor3Digits()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\FractionDigitsRule', 3);
        call_user_func($funtionName, 2.5556);
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleWithExceptionFor4Digits()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\FractionDigitsRule', 4);
        call_user_func($funtionName, 2.55);
    }
    /**
     *
     */
    public function testApplyRuleFor2Digits()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\FractionDigitsRule', 2);
        $this->assertTrue(call_user_func($funtionName, 2.55));
    }
    /**
     *
     */
    public function testApplyRuleFor4Digits()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\FractionDigitsRule', 4);
        $this->assertTrue(call_user_func($funtionName, 2.5152));
    }
}
