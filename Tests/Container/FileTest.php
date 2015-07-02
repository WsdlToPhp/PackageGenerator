<?php

namespace WsdlToPhp\PackageGenerator\Tests\Container;

use WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl\WsdlParser;
use WsdlToPhp\PackageGenerator\File\Struct;
use WsdlToPhp\PackageGenerator\Tests\File\Wsdl\WsdlFile;
use WsdlToPhp\PackageGenerator\Container\File;
use WsdlToPhp\PackageGenerator\Tests\TestCase;

class FileTest extends TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testAddWithException()
    {
        $container = new File();
        $container->add($container);
    }
}
