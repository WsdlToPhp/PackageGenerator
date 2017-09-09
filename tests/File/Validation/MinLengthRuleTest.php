<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

class MinLengthRuleTest extends RuleTest
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleWithLowerLengthInteger()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinLengthRule', 6);
        $this->assertTrue(call_user_func($funtionName, 12345));
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleWithLowerLengthString()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinLengthRule', 6);
        $this->assertTrue(call_user_func($funtionName, '12345'));
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleWithLowerLengthArray()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinLengthRule', 6);
        $this->assertTrue(call_user_func($funtionName, [
            1,
            2,
            3,
            4,
            5,
        ]));
    }
    /**
     *
     */
    public function testApplyRuleWithNull()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinLengthRule', 6);
        $this->assertTrue(call_user_func($funtionName, null));
    }
    /**
     *
     */
    public function testApplyRuleWithSameLengthInteger()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinLengthRule', 6);
        $this->assertTrue(call_user_func($funtionName, 123456));
    }
    /**
     *
     */
    public function testApplyRuleWithSameLengthString()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinLengthRule', 6);
        $this->assertTrue(call_user_func($funtionName, 123456));
    }
    /**
     *
     */
    public function testApplyRuleWithSameLengthArray()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinLengthRule', 6);
        $this->assertTrue(call_user_func($funtionName, [
            1,
            2,
            3,
            4,
            5,
            6,
        ]));
    }
    /**
     *
     */
    public function testApplyRuleWithGreaterLengthInteger()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinLengthRule', 6);
        $this->assertTrue(call_user_func($funtionName, 1234567));
    }
    /**
     *
     */
    public function testApplyRuleWithGreaterLengthString()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinLengthRule', 6);
        $this->assertTrue(call_user_func($funtionName, 1234567));
    }
    /**
     *
     */
    public function testApplyRuleWithGreaterLengthArray()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinLengthRule', 6);
        $this->assertTrue(call_user_func($funtionName, [
            1,
            2,
            3,
            4,
            5,
            6,
            7,
        ]));
    }
}
