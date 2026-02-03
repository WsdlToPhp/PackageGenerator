<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Container\Model;

use WsdlToPhp\PackageGenerator\Container\Model\StructAttribute as StructAttributeContainer;
use WsdlToPhp\PackageGenerator\Model\StructAttribute;
use WsdlToPhp\PackageGenerator\Tests\AbstractTestCase;
use WsdlToPhp\PackageGenerator\Tests\Model\StructTest;

/**
 * @internal
 * @coversDefaultClass
 */
final class StructAttributeContainerTest extends AbstractTestCase
{
    public static function instance(): StructAttributeContainer
    {
        $struct = StructTest::instance('Bar', true);
        $structAttributeContainer = new StructAttributeContainer(self::getBingGeneratorInstance());
        $structAttributeContainer->add(new StructAttribute(self::getBingGeneratorInstance(), 'foo', 'string', $struct));
        $structAttributeContainer->add(new StructAttribute(self::getBingGeneratorInstance(), 'bar', 'int', $struct));
        $structAttributeContainer->add(new StructAttribute(self::getBingGeneratorInstance(), 'Bar', 'float', $struct));
        $structAttributeContainer->add(new StructAttribute(self::getBingGeneratorInstance(), 'fooBar', 'bool', $struct));

        return $structAttributeContainer;
    }

    public function testGetStructAttributeByName(): void
    {
        $structAttributeContainer = self::instance();

        self::assertInstanceOf(\WsdlTophp\PackageGenerator\Model\StructAttribute::class, $structAttributeContainer->getStructAttributeByName('foo'));
        self::assertInstanceOf(\WsdlTophp\PackageGenerator\Model\StructAttribute::class, $structAttributeContainer->getStructAttributeByName('bar'));
        self::assertInstanceOf(\WsdlTophp\PackageGenerator\Model\StructAttribute::class, $structAttributeContainer->getStructAttributeByName('fooBar'));
        self::assertNull($structAttributeContainer->getStructAttributeByName('foobar'));
    }
}
