<?php


namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

use WsdlToPhp\PackageGenerator\File\Validation\AbstractMinMaxRule;

class InvalidRuleClass extends AbstractMinMaxRule
{
    public function name()
    {
        return 'invalid';
    }
    public function symbol()
    {
        return '<>';
    }

    public function testConditions($parameterName, $value, $itemType = false)
    {
        return 'true';
    }

    public function exceptionMessageOnTestFailure($parameterName, $value, $itemType = false)
    {
        return '';
    }
}
