<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Container\Model;

use WsdlToPhp\PackageGenerator\Container\Model\StructValue as StructValueContainer;
use WsdlToPhp\PackageGenerator\Model\StructValue;
use WsdlToPhp\PackageGenerator\Model\StructValue as StructValueModel;
use WsdlToPhp\PackageGenerator\Tests\AbstractTestCase;
use WsdlToPhp\PackageGenerator\Tests\Model\StructTest;

/**
 * @internal
 * @coversDefaultClass
 */
final class StructValueContainerTest extends AbstractTestCase
{
    public static function instance(): StructValueContainer
    {
        $struct = StructTest::instance('Foo', true);

        $structValueContainer = new StructValueContainer(self::getBingGeneratorInstance());
        $structValueContainer->add(new StructValue(self::getBingGeneratorInstance(), 1, 0, $struct));
        $structValueContainer->add(new StructValue(self::getBingGeneratorInstance(), 2, 1, $struct));
        $structValueContainer->add(new StructValue(self::getBingGeneratorInstance(), 'any', 2, $struct));
        $structValueContainer->add(new StructValue(self::getBingGeneratorInstance(), 'bar', 3, $struct));

        return $structValueContainer;
    }

    public function testGetStructValueByName(): void
    {
        $structValueContainer = self::instance();

        $this->assertInstanceOf(StructValueModel::class, $structValueContainer->getStructValueByName(1));
        $this->assertInstanceOf(StructValueModel::class, $structValueContainer->getStructValueByName(2));
        $this->assertInstanceOf(StructValueModel::class, $structValueContainer->getStructValueByName('any'));
        $this->assertNull($structValueContainer->getStructValueByName('Bar'));
    }
}
