<?php


namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

use WsdlToPhp\PackageGenerator\Container\PhpElement\Method;
use WsdlToPhp\PackageGenerator\File\Struct;
use WsdlToPhp\PackageGenerator\File\Validation\Rules;
use WsdlToPhp\PackageGenerator\Model\StructAttribute;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;

class InvalidRuleTest extends AbstractRuleTest
{
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid value <> returned by symbol() method, can't determine comparison string
     */
    public function testComparisonStringMustThrowAnException()
    {
        $instance = self::bingGeneratorInstance();
        $i = new InvalidRuleClass(new Rules(new Struct($instance, 'Foo'), new PhpMethod('bar'), new StructAttribute($instance, 'FooBar'), new Method($instance)));
        $i->comparisonString();
    }
}
