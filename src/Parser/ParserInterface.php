<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Parser;

interface ParserInterface
{
    /**
     * This method is called to launch the data parsing
     * If an exception must be thrown, then it must be thrown here.
     */
    public function parse(): void;
}
