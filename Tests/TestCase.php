<?php

namespace WsdlToPhp\PackageGenerator\Tests;

use WsdlToPhp\PackageGenerator\Generator\Generator;

abstract class TestCase extends \PHPUnit_Framework_TestCase
{
    private static $instances = array();
    /**
     * @return string
     */
    public static function wsdlPartnerPath($local = true)
    {
        return __DIR__ . sprintf('/resources/PartnerService%s.wsdl', $local ? '.local' : '');
    }
    /**
     * @return string
     */
    public static function schemaPartnerPath()
    {
        return __DIR__ . '/resources/PartnerService.0.xsd';
    }
    /**
     * @return string
     */
    public static function wsdlImageViewServicePath()
    {
        return __DIR__ . '/resources/ImageViewService.local.wsdl';
    }
    /**
     * @return string
     */
    public static function schemaImageViewServicePath()
    {
        return __DIR__ . '/resources/imageViewCommon.xsd';
    }
    /**
     * @return string
     */
    public static function schemaImageViewServiceAvailableImagesRequestPath()
    {
        return __DIR__ . '/resources/availableImagesRequest.xsd';
    }
    /**
     * @return string
     */
    public static function wsdlBingPath()
    {
        return __DIR__ . '/resources/bingsearch.wsdl';
    }
    /**
     * @return string
     */
    public static function wsdlEbayPath()
    {
        return __DIR__ . '/resources/ebaySvc.wsdl';
    }
    /**
     * @return string
     */
    public static function wsdlActonPath()
    {
        return __DIR__ . '/resources/ActonService2.local.wsdl';
    }
    /**
     * @return string
     */
    public static function wsdlOdigeoPath()
    {
        return __DIR__ . '/resources/odigeo.wsdl';
    }
    /**
     * @return string
     */
    public static function wsdlOrderContractPath()
    {
        return __DIR__ . '/resources/OrderContract.wsdl';
    }
    /**
     * @return string
     */
    public static function wsdlMyBoardPackPath()
    {
        return __DIR__ . '/resources/MyBoardPack.wsdl';
    }
    /**
     * @return string
     */
    public static function wsdlWhlPath()
    {
        return __DIR__ . '/resources/whl.wsdl';
    }
    /**
     * @return string
     */
    public static function wsdlPortalPath()
    {
        return __DIR__ . '/resources/portaplusapi.wsdl';
    }
    /**
     * @return string
     */
    public static function wsdlReformaPath()
    {
        return __DIR__ . '/resources/reformagkh.wsdl';
    }
    /**
     * @return string
     */
    public static function wsdlQueuePath()
    {
        return __DIR__ . '/resources/QueueService.wsdl';
    }
    /**
     * @return string
     */
    public static function wsdlBullhornstaffingPath()
    {
        return __DIR__ . '/resources/bullhornstaffing.local.wsdl';
    }
    /**
     * @return string
     */
    public static function wsdlOmniturePath()
    {
        return __DIR__ . '/resources/OmnitureAdminServices.wsdl';
    }
    /**
     * @param string $wsdlPath
     * @return Generator
     */
    public static function getGeneratorInstance($wsdlPath)
    {
        return new Generator($wsdlPath);
    }
    /**
     * @return Generator
     */
    public static function getBingGeneratorInstance()
    {
        return self::getGeneratorInstance(self::wsdlBingPath());
    }
    /**
     * @return Generator
     */
    public static function getOmnitureInstance()
    {
        return self::getInstance(self::wsdlOmniturePath());
    }
    /**
     * @return Generator
     */
    public static function getBullhornstaffingInstance()
    {
        return self::getInstance(self::wsdlBullhornstaffingPath());
    }
    /**
     * @return Generator
     */
    public static function getReformaInstance()
    {
        return self::getInstance(self::wsdlReformaPath());
    }
    /**
     * @param strin $wsdlPath
     * @return Generator
     */
    protected static function getInstance($wsdlPath)
    {
        if (!isset(self::$instances[$wsdlPath])) {
            self::$instances[$wsdlPath] = self::getGeneratorInstance($wsdlPath);
        }
        return self::$instances[$wsdlPath];
    }
}
