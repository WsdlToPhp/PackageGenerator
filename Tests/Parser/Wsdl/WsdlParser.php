<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Container\AbstractObjectContainer;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagImport;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagInclude;
use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Parser\SoapClient\Structs;
use WsdlToPhp\PackageGenerator\Parser\SoapClient\Functions;

abstract class WsdlParser extends TestCase
{
    /**
     * @return string
     */
    public static function wsdlPartnerPath()
    {
        return dirname(__FILE__) . '/../../resources/PartnerService.local.wsdl';
    }
    /**
     * @return string
     */
    public static function schemaPartnerPath()
    {
        return dirname(__FILE__) . '/../../resources/PartnerService.0.xsd';
    }
    /**
     * @return string
     */
    public static function wsdlImageViewServicePath()
    {
        return dirname(__FILE__) . '/../../resources/ImageViewService.local.wsdl';
    }
    /**
     * @return string
     */
    public static function schemaImageViewServicePath()
    {
        return dirname(__FILE__) . '/../../resources/imageViewCommon.xsd';
    }
    /**
     * @return string
     */
    public static function wsdlBingPath()
    {
        return dirname(__FILE__) . '/../../resources/bingsearch.wsdl';
    }
    /**
     * @return string
     */
    public static function wsdlEbayPath()
    {
        return dirname(__FILE__) . '/../../resources/ebaySvc.wsdl';
    }
    /**
     * @return string
     */
    public static function wsdlActonPath()
    {
        return dirname(__FILE__) . '/../../resources/ActonService2.local.wsdl';
    }
    /**
     * @return string
     */
    public static function wsdlOdigeoPath()
    {
        return dirname(__FILE__) . '/../../resources/odigeo.wsdl';
    }
    /**
     * @return string
     */
    public static function wsdlOrderContractPath()
    {
        return dirname(__FILE__) . '/../../resources/OrderContract.wsdl';
    }
    /**
     * @return string
     */
    public static function wsdlMyBoardPackPath()
    {
        return dirname(__FILE__) . '/../../resources/MyBoardPack.wsdl';
    }
    /**
     * @return string
     */
    public static function wsdlWhlPath()
    {
        return dirname(__FILE__) . '/../../resources/whl.wsdl';
    }
    /**
     * @param srting $wsdlPath
     * @return Generator
     */
    public static function generatorInstance($wsdlPath)
    {
        AbstractObjectContainer::purgeAllCache();
        $generator = new Generator($wsdlPath);
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
