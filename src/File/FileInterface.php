<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PackageGenerator\Generator\Generator;

interface FileInterface
{
    public function __construct(Generator $generator, string $name);

    /**
     * This method is called to launch the data parsing
     * If an exception must be thrown, then it must be thrown here.
     */
    public function write(): void;
}
