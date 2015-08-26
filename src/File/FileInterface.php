<?php

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PackageGenerator\Generator\Generator;

interface FileInterface
{
    /**
     * @param Generator $generator
     * @param string $name
     */
    public function __construct(Generator $generator, $name);
    /**
     * This method is called to launch the data parsing
     * If an exception must be throwned, then it must be throwned here
     * @return void
     */
    public function write();
}
