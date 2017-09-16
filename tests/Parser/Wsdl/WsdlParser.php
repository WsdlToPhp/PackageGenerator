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
     * @param bool $parseSoapStructs
     * @param bool $parseSoapFunctions
     * @return Generator
     */
    public static function generatorInstance($wsdlPath, $reset = true, $parseSoapStructs = true, $parseSoapFunctions = true)
    {
        $generator = self::getInstance($wsdlPath, $reset);
        $parsers = [
            new TagImport($generator),
            new TagInclude($generator),
        ];
        if ($parseSoapStructs === true) {
            $parsers[] = new Structs($generator);
        }
        if ($parseSoapFunctions === true) {
            $parsers[] = new Functions($generator);
        }
        foreach ($parsers as $parser) {
            $parser->parse();
        }
        return $generator;
    }
}
