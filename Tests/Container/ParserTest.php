<?php

namespace WsdlToPhp\PackageGenerator\Tests\Container;

use WsdlToPhp\PackageGenerator\Container\Parser;
use WsdlToPhp\PackageGenerator\Tests\TestCase;

class ParserTest extends TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testAddWithException()
    {
        $container = new Parser(self::getBingGeneratorInstance());
        $container->add($container);
    }
}
