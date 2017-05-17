<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

class PatternRuleTest extends RuleTest
{
    /**
     *
     */
    public function testApplyRuleWithBool()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\PatternRule', '\d+');
        $this->assertTrue(call_user_func($funtionName, true));
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleWithString()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\PatternRule', '\d+');
        $this->assertTrue(call_user_func($funtionName, 'foo'));
    }
    /**
     *
     */
    public function testApplyRuleWithInteger()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\PatternRule', '\d+');
        $this->assertTrue(call_user_func($funtionName, 1));
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleWithInvalidDate()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\PatternRule', '\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}:\d{2}');
        $this->assertTrue(call_user_func($funtionName, '2017-04-04T01:00:00'));
    }
    /**
     *
     */
    public function testApplyRuleWithValidDate()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\PatternRule', '\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}:\d{2}');
        $this->assertTrue(call_user_func($funtionName, '2017-04-04 01:00:00'));
    }
}
