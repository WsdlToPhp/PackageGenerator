<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

class ItemTypeRuleTest extends RuleTest
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleForBoolWithInteger()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\ItemTypeRule', null, false, 'bool');
        call_user_func($funtionName, 1);
    }
    /**
     *
     */
    public function testApplyRuleForBoolWithTrue()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\ItemTypeRule', null, false, 'bool');
        $this->assertTrue(call_user_func($funtionName, true));
    }
    /**
     *
     */
    public function testApplyRuleForBoolWithFalse()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\ItemTypeRule', null, false, 'bool');
        $this->assertTrue(call_user_func($funtionName, false));
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleForBoolWithNull()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\ItemTypeRule', null, false, 'bool');
        $this->assertTrue(call_user_func($funtionName, null));
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleForFloatWithInteger()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\ItemTypeRule', null, false, 'float');
        call_user_func($funtionName, 1);
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleForFloatWithBool()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\ItemTypeRule', null, false, 'float');
        call_user_func($funtionName, true);
    }
    /**
     *
     */
    public function testApplyRuleForFloatWithFloat()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\ItemTypeRule', null, false, 'float');
        $this->assertTrue(call_user_func($funtionName, 2.5));
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testApplyRuleForNull()
    {
        $funtionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\ItemTypeRule', null, false, 'float');
        $this->assertTrue(call_user_func($funtionName, null));
    }
}
