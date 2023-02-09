<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Container\Model;

use WsdlToPhp\PackageGenerator\Container\Model\Method as MethodContainer;
use WsdlToPhp\PackageGenerator\Model\Method as MethodModel;
use WsdlToPhp\PackageGenerator\Tests\AbstractTestCase;
use WsdlToPhp\PackageGenerator\Tests\Model\ServiceTest;

/**
 * @internal
 * @coversDefaultClass
 */
final class MethodContainerTest extends AbstractTestCase
{
    /**
     * @return MethodContainer
     */
    public static function instance()
    {
        $service = ServiceTest::instance('Bar');
        $methodContainer = new MethodContainer(self::getBingGeneratorInstance());
        $methodContainer->add(new MethodModel(self::getBingGeneratorInstance(), 'Foo', 'string', 'int', $service));
        $methodContainer->add(new MethodModel(self::getBingGeneratorInstance(), 'Bar', 'string', 'int', $service));
        $methodContainer->add(new MethodModel(self::getBingGeneratorInstance(), 'FooBar', [
            'string',
            'int',
            'int',
        ], 'int', $service));

        return $methodContainer;
    }

    public function testGetMethodByName(): void
    {
        $methodContainer = self::instance();

        $this->assertInstanceOf(MethodModel::class, $methodContainer->getMethodByName('Foo'));
        $this->assertNull($methodContainer->getMethodByName('boo'));
    }
}
