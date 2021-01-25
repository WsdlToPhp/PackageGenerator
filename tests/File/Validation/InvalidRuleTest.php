<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

use InvalidArgumentException;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Method;
use WsdlToPhp\PackageGenerator\File\Struct;
use WsdlToPhp\PackageGenerator\File\Validation\Rules;
use WsdlToPhp\PackageGenerator\Model\StructAttribute;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;

/**
 * @internal
 * @coversDefaultClass
 */
final class InvalidRuleTest extends AbstractRuleTest
{
    public function testComparisonStringMustThrowAnException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid value <> returned by symbol() method, can\'t determine comparison string');

        $instance = self::bingGeneratorInstance();
        $i = new InvalidRuleClass(new Rules(new Struct($instance, 'Foo'), new PhpMethod('bar'), new StructAttribute($instance, 'FooBar'), new Method($instance)));
        $i->comparisonString();
    }
}
