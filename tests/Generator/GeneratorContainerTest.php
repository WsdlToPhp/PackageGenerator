<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Generator;

use WsdlToPhp\PackageGenerator\Generator\GeneratorContainers;
use WsdlToPhp\PackageGenerator\Tests\AbstractTestCase;

/**
 * @internal
 * @coversDefaultClass
 */
final class GeneratorContainerTest extends AbstractTestCase
{
    public function testJsonSerialize(): void
    {
        $container = new GeneratorContainers(self::getBingGeneratorInstance());

        $this->assertSame([
            'services' => $container->getServices(),
            'structs' => $container->getStructs(),
        ], $container->jsonSerialize());
    }
}
