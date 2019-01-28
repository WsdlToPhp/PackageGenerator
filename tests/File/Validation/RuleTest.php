<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\File\Struct as StructFile;
use WsdlToPhp\PackageGenerator\File\Validation\Rules;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Method as MethodContainer;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;
use WsdlToPhp\PackageGenerator\Model\Struct as StructModel;
use WsdlToPhp\PackageGenerator\Model\StructAttribute as StructAttributeModel;

abstract class RuleTest extends TestCase
{
    protected function createRuleFunction($ruleClassName, $value = null, $itemType = false, $structAttributeType = 'string')
    {
        $generator = self::getBingGeneratorInstance();
        $methodName = '_any_' . md5(rand(0, time()));
        $method = new PhpMethod($methodName, [
            'any',
        ]);
        $structFile = new StructFile($generator, 'any');
        $structModel = new StructModel($generator, 'any');
        $methodContainer = new MethodContainer($generator);
        $structAttribute = new StructAttributeModel($generator, 'any', $structAttributeType, $structModel);
        $rule = new $ruleClassName(new Rules($structFile, $method, $structAttribute, $methodContainer));
        $rule->applyRule('any', $value, $itemType);
        $method->addChild('return true;');
        eval(str_replace('public ', '', $method->toString()));
        return $methodName;
    }
}
