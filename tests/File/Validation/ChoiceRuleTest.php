<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

use WsdlToPhp\PackageGenerator\Model\StructAttribute;
use WsdlToPhp\PhpGenerator\Element\PhpClass;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;
use WsdlToPhp\PackageGenerator\File\Struct as StructFile;
use WsdlToPhp\PackageGenerator\Model\Struct as StructModel;
use WsdlToPhp\PackageGenerator\File\Validation\Rules;
use WsdlToPhp\PhpGenerator\Element\PhpProperty;

class ChoiceRuleTest extends RuleTest
{
    protected function createRuleClass($ruleClassName, array $choiceNames, $itemType = false, $structAttributeType = 'string')
    {
        $generator = self::getBingGeneratorInstance();
        $class = new PhpClass($className = '_any_' . md5(rand(0, time())));
        $structFile = new StructFile($generator, 'any');
        $structModel = new StructModel($generator, 'any');
        foreach ($choiceNames as $index => $choiceName) {
            $structModel->addAttribute($choiceName, $structAttributeType);
        }
        foreach ($choiceNames as $index => $choiceName) {
            $class->addChild(new PhpProperty($choiceName, PhpProperty::NO_VALUE));
            $method = new PhpMethod(sprintf('set%s', ucfirst($choiceName)), [
                $choiceName,
            ]);
            $class->addChild($method);
            $structAttribute = new StructAttribute($generator, $choiceName, $structAttributeType, $structModel);
            $rule = new $ruleClassName(new Rules($structFile, $method, $structAttribute));
            $rule->applyRule($choiceName, $choiceNames, $itemType);
            $method
                ->addChild(sprintf('$this->%s = $%s;', $choiceName, $choiceName))
                ->addChild('return $this;');
        }
        eval($class->toString());
        return $className;
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage The property bar can't be set as the property foo is already set. Only one property must be set among these properties: foo, bar.
     */
    public function testTryToSetBothPropertiesMustThrowAnException()
    {
        $className = self::createRuleClass('WsdlToPhp\PackageGenerator\File\Validation\ChoiceRule', [
            'foo',
            'bar',
        ]);
        $class = new $className();
        $class->setFoo(true)->setBar(true);
        unset($class);
    }

    /**
     *
     */
    public function testTryToSetOnePropertyMustPass()
    {
        $className = self::createRuleClass('WsdlToPhp\PackageGenerator\File\Validation\ChoiceRule', [
            'foo',
            'bar',
        ]);
        $class = new $className();
        $class->setFoo(true);
        $this->assertTrue($class->foo);
        unset($class);
    }
}
