<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

class PatternRuleTest extends RuleTest
{
    /**
     *
     */
    public function testApplyRuleWithBool()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\PatternRule', '\d+');
        $this->assertTrue(call_user_func($functionName, true));
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleWithString()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\PatternRule', '\d+');
        $this->assertTrue(call_user_func($functionName, 'foo'));
    }
    /**
     *
     */
    public function testApplyRuleWithInteger()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\PatternRule', '\d+');
        $this->assertTrue(call_user_func($functionName, 1));
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleWithInvalidDate()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\PatternRule', '\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}:\d{2}');
        $this->assertTrue(call_user_func($functionName, '2017-04-04T01:00:00'));
    }
    /**
     *
     */
    public function testApplyRuleWithValidDate()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\PatternRule', '\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}:\d{2}');
        $this->assertTrue(call_user_func($functionName, '2017-04-04 01:00:00'));
    }
    /**
     *
     */
    public function testApplyRuleWithQuote()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\PatternRule', '\'');
        $this->assertTrue(call_user_func($functionName, '\''));
    }
    /**
     *
     */
    public function testApplyRuleWithBackslash()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\PatternRule', '\\\\');
        $this->assertTrue(call_user_func($functionName, '\\'));
    }
}
