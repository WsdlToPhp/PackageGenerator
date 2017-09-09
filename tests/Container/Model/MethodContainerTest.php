<?php

namespace WsdlToPhp\PackageGenerator\Tests\Container\Model;

use WsdlToPhp\PackageGenerator\Tests\Model\ServiceTest;
use WsdlToPhp\PackageGenerator\Model\Method;
use WsdlToPhp\PackageGenerator\Container\Model\Method as MethodContainer;
use WsdlToPhp\PackageGenerator\Tests\TestCase;

class MethodContainerTest extends TestCase
{
    /**
     * @return MethodContainer
     */
    public static function instance()
    {
        $service = ServiceTest::instance('Bar');
        $methodContainer = new MethodContainer(self::getBingGeneratorInstance());
        $methodContainer->add(new Method(self::getBingGeneratorInstance(), 'Foo', 'string', 'int', $service));
        $methodContainer->add(new Method(self::getBingGeneratorInstance(), 'Bar', 'string', 'int', $service));
        $methodContainer->add(new Method(self::getBingGeneratorInstance(), 'FooBar', [
            'string',
            'int',
            'int',
        ], 'int', $service));
        return $methodContainer;
    }
    /**
     *
     */
    public function testGetMethodByName()
    {
        $methodContainer = self::instance();

        $this->assertInstanceOf('\WsdlToPhp\PackageGenerator\Model\Method', $methodContainer->getMethodByName('Foo'));
        $this->assertNull($methodContainer->getMethodByName('boo'));
    }
}
