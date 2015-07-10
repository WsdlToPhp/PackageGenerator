<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\SoapClient;

use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\Tests\TestCase;

abstract class SoapClientParser extends TestCase
{
    /**
     * @return Generator
     */
    public static function getReformaInstance()
    {
        return self::getInstance(self::wsdlReformaPath());
    }
    /**
     * @param string $pathToWsdl
     * @return Generator
     */
    public static function getInstance($pathToWsdl)
    {
        return new Generator($pathToWsdl);
    }
}
