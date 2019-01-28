<?php


namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

class InvalidRuleTest extends RuleTest
{
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid value <> returned by static::symbol(), can't determine comparison string
     */
    public function testComparisonStringMustThrowAnException()
    {
        InvalidRuleClass::comparisonString();
    }
}
