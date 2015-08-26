<?php

namespace WsdlToPhp\PackageGenerator\Parser;

interface ParserInterface
{
    /**
     * This method is called to launch the data parsing
     * If an exception must be throwned, then it must throwned here
     * @return void
     */
    public function parse();
}
