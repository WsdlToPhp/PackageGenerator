<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\File\Struct as StructFile;
use WsdlToPhp\PackageGenerator\Model\Struct as StructModel;
use WsdlToPhp\PackageGenerator\File\Validation\Rules;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;
use WsdlToPhp\PackageGenerator\Model\StructAttribute;

abstract class RuleTest extends TestCase
{
    protected function createRuleFunction($ruleClassName, $value, $itemType = false)
    {
        $generator = self::getBingGeneratorInstance();
        $methodName = '_any_' . md5(rand(0, time()));
        $method = new PhpMethod($methodName, array(
            'any'
        ));
        $structFile = new StructFile($generator, 'any');
        $structModel = new StructModel($generator, 'any');
        $structAttribute = new StructAttribute($generator, 'any', 'string', $structModel);
        $rule = new $ruleClassName(new Rules($structFile, $method, $structAttribute));
        $rule->applyRule('any', $value, $itemType);
        $method->addChild('return true;');
        eval(str_replace('public ', '', $method->toString()));
        return $methodName;
    }
}
