<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagImport;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagInclude;
use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Parser\SoapClient\Structs;
use WsdlToPhp\PackageGenerator\Parser\SoapClient\Functions;

abstract class WsdlParser extends TestCase
{
    /**
     * @param string $wsdlPath
     * @param bool $reset
     * @return Generator
     */
    public static function generatorInstance($wsdlPath, $reset = false)
    {
        $generator = self::getInstance($wsdlPath, $reset);
        $parsers = array(
            new TagInclude($generator),
            new TagImport($generator),
            new Structs($generator),
            new Functions($generator),
        );
        foreach ($parsers as $parser) {
            $parser->parse();
        }
        return $generator;
    }
}
