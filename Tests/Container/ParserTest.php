<?php

namespace WsdlToPhp\PackageGenerator\Tests\Container;

use WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl\WsdlParser;
use WsdlToPhp\PackageGenerator\Parser\SoapClient\Structs;
use WsdlToPhp\PackageGenerator\Container\Parser;
use WsdlToPhp\PackageGenerator\Tests\TestCase;

class ParserTest extends TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testAddWithException()
    {
        $container = new Parser();
        $container->add($container);
    }
}
