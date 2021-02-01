<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Generator;

use WsdlToPhp\PackageGenerator\Tests\AbstractTestCase;
use WsdlToPhp\PackageGenerator\Generator\GeneratorContainers;

final class GeneratorContainerTest extends AbstractTestCase
{
    public function testJsonSerialize()
    {
        $container = new GeneratorContainers(self::getBingGeneratorInstance());

        $this->assertSame([
            'services' => $container->getServices(),
            'structs' => $container->getStructs(),
        ], $container->jsonSerialize());
    }
}
