<?php

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PackageGenerator\Generator\Generator;

interface FileInterface
{
    /**
     * @param Generator $generator
     * @param string $name
     * @param string $destination
     */
    public function __construct(Generator $generator, $name, $destination);
    /**
     * This method is called to launch the data parsing
     * If an exception must be throwned, then it must throwned here
     * @return void
     */
    public function write();
}
