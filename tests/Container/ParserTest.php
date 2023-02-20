<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Container;

use WsdlToPhp\PackageGenerator\Container\Parser;
use WsdlToPhp\PackageGenerator\Tests\AbstractTestCase;

/**
 * @internal
 * @coversDefaultClass
 */
final class ParserTest extends AbstractTestCase
{
    public function testAddWithException(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $container = new Parser(self::getBingGeneratorInstance());
        $container->add($container);
    }
}
