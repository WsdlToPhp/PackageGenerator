<?php

namespace WsdlToPhp\PackageGenerator\Tests\Container;

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
