<?php

namespace Generator;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Generator\GeneratorContainers;

class GeneratorContainerTest extends TestCase
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
