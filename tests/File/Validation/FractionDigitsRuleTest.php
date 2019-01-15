<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

class FractionDigitsRuleTest extends RuleTest
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleWithExceptionForOneMoreDigitThanExpected2Digits()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\FractionDigitsRule', 2);
        call_user_func($functionName, 2.555);
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleWithExceptionForOneMoreDigitThanExpected3Digits()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\FractionDigitsRule', 3);
        call_user_func($functionName, 2.5556);
    }
    /**
     *
     */
    public function testApplyRuleForTwoLessDigitsThanExpected4Digits()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\FractionDigitsRule', 4);
        $this->assertTrue(call_user_func($functionName, 2.55));
    }
    /**
     *
     */
    public function testApplyRuleForAsManyDigitsAsExpected2Digits()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\FractionDigitsRule', 2);
        $this->assertTrue(call_user_func($functionName, 2.55));
    }
    /**
     *
     */
    public function testApplyRuleForAsManyDigitsAsExpected4Digits()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\FractionDigitsRule', 4);
        $this->assertTrue(call_user_func($functionName, 2.5152));
    }
    /**
     *
     */
    public function testApplyRuleForNull()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\FractionDigitsRule', 4);
        $this->assertTrue(call_user_func($functionName, null));
    }
}
