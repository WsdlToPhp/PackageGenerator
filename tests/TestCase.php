<?php

namespace WsdlToPhp\PackageGenerator\Tests;

use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\Tests\ConfigurationReader\GeneratorOptionsTest;
use PHPUnit\Framework\TestCase as PHPUnitFrameworkTestCase;
use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;
use WsdlToPhp\PackageGenerator\Model\AbstractModel;

abstract class TestCase extends PHPUnitFrameworkTestCase
{

    /**
     * @var Generator[]
     */
    private static $instances = [];

    /**
     * Instances
     * @var Generator[]
     */
    private static $ids = [];

    /**
     * @return string
     */
    public static function wsdlUnitTestsPath()
    {
        return __DIR__ . '/resources/unit_tests.wsdl';
    }

    /**
     * @param $local bool
     * @return string
     */
    public static function wsdlPartnerPath($local = true)
    {
        return __DIR__ . sprintf('/resources/partner/PartnerService%s.wsdl', $local ? '.local' : '');
    }

    /**
     * @param $local bool
     * @return string
     */
    public static function wsdlPartnerScdPath($local = true)
    {
        return __DIR__ . sprintf('/resources/partner/PartnerService%s.wsdl', $local ? '.local.scd' : '');
    }

    /**
     * @param $local bool
     * @return string
     */
    public static function wsdlPartnerThirdPath($local = true)
    {
        return __DIR__ . sprintf('/resources/partner/PartnerService%s.wsdl', $local ? '.local.third' : '');
    }

    /**
     * @return string
     */
    public static function schemaPartnerPath()
    {
        return __DIR__ . '/resources/partner/PartnerService.0.xsd';
    }

    /**
     * @return string
     */
    public static function wsdlImageViewServicePath()
    {
        return __DIR__ . '/resources/image/ImageViewService.local.wsdl';
    }

    /**
     * @return string
     */
    public static function schemaImageViewServicePath()
    {
        return __DIR__ . '/resources/image/imageViewCommon.xsd';
    }

    /**
     * @return string
     */
    public static function schemaImageViewServiceAvailableImagesRequestPath()
    {
        return __DIR__ . '/resources/image/availableImagesRequest.xsd';
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
    public static function onlineWsdlBingPath()
    {
        return 'https://phar.wsdltophp.com/bingsearch.wsdl';
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
    public static function wsdlVehicleSelectionPath()
    {
        return __DIR__ . '/resources/VehicleSelectionService/VehicleSelectionService.wsdl';
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
     * @return string
     */
    public static function wsdlPayPalPath()
    {
        return __DIR__ . '/resources/paypal/PayPalSvc.wsdl';
    }

    /**
     * @return string
     */
    public static function wsdlWcfPath()
    {
        return __DIR__ . '/resources/wcf/Service1.wsdl';
    }

    /**
     * @return string
     */
    public static function wsdlLnpPath()
    {
        return __DIR__ . '/resources/lnp/NumberManagement.wsdl';
    }

    /**
     * @return string
     */
    public static function wsdlEwsPath()
    {
        return __DIR__ . '/resources/ews/services.wsdl';
    }

    /**
     * @return string
     */
    public static function schemaEwsTypesPath()
    {
        return __DIR__ . '/resources/ews/types.xsd';
    }

    /**
     * @return string
     */
    public static function schemaEwsMessagesPath()
    {
        return __DIR__ . '/resources/ews/messages.xsd';
    }

    /**
     * @return string
     */
    public static function wsdlYandexDirectApiCampaignsPath()
    {
        return __DIR__ . '/resources/directapi/campaigns.wsdl';
    }

    /**
     * @return string
     */
    public static function wsdlYandexDirectApiAdGroupsPath()
    {
        return __DIR__ . '/resources/directapi/adgroups.wsdl';
    }

    /**
     * @return string
     */
    public static function wsdlYandexDirectApiLivePath()
    {
        return __DIR__ . '/resources/directapi/live.wsdl';
    }

    /**
     * @return string
     */
    public static function wsdlDocDataPaymentsPath()
    {
        return __DIR__ . '/resources/docdatapayments/1_3.wsdl';
    }

    /**
     * @return string
     */
    public static function wsdlDeliveryServicePath()
    {
        return __DIR__ . '/resources/DeliveryService.wsdl';
    }

    /**
     * @return string
     */
    public static function wsdlEmptyPath()
    {
        return __DIR__ . '/resources/empty.wsdl';
    }

    /**
     * @param string $wsdlPath
     * @return Generator
     */
    private static function getGeneratorInstance($wsdlPath)
    {
        $options = GeneratorOptionsTest::optionsInstance()
            ->setOrigin($wsdlPath)
            ->setDestination(self::getTestDirectory());
        return new Generator($options);
    }

    /**
     * @return Generator
     */
    public static function getBingGeneratorInstance($reset = false)
    {
        return self::getInstance(self::wsdlBingPath(), $reset);
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
     * @return Generator
     */
    public static function getWcfInstance()
    {
        return self::getInstance(self::wsdlWcfPath());
    }

    /**
     * @return Generator
     */
    public static function getLnpInstance()
    {
        return self::getInstance(self::wsdlLnpPath(), true);
    }

    /**
     * @return Generator
     */
    public static function getEwsInstance()
    {
        return self::getInstance(self::wsdlEwsPath());
    }

    /**
     * @return Generator
     */
    public static function getYandexDirectApiCampaignsInstance()
    {
        return self::getInstance(self::wsdlYandexDirectApiCampaignsPath());
    }

    /**
     * @return Generator
     */
    public static function getYandexDirectApiAdGroupsInstance()
    {
        return self::getInstance(self::wsdlYandexDirectApiAdGroupsPath());
    }

    /**
     * @return Generator
     */
    public static function getDocDataPAymentsInstance()
    {
        return self::getInstance(self::wsdlDocDataPaymentsPath());
    }

    /**
     * @return Generator
     */
    public static function getDeliveryServiceInstance()
    {
        return self::getInstance(self::wsdlDeliveryServicePath());
    }

    /**
     * @return Generator
     */
    public static function getWhlInstance($reset = false)
    {
        return self::getInstance(self::wsdlWhlPath(), $reset);
    }

    /**
     * @return Generator
     */
    public static function getVehicleSelectionInstance($reset = false)
    {
        return self::getInstance(self::wsdlVehicleSelectionPath(), $reset);
    }

    /**
     * @return Generator
     */
    public static function getUnitTestsInstance($reset = false)
    {
        return self::getInstance(self::wsdlUnitTestsPath(), $reset);
    }

    /**
     * @param string $wsdlPath
     * @param $reset bool
     * @return Generator
     */
    public static function getInstance($wsdlPath, $reset = false)
    {
        if (!isset(self::$instances[$wsdlPath]) || $reset) {
            self::$instances[$wsdlPath] = self::getGeneratorInstance($wsdlPath);
        }
        return self::$instances[$wsdlPath];
    }

    /**
     * @param string $id
     * @return Generator
     */
    public static function getInstanceFromSerializedJson($id, $gatherMethods, $origin, $reset = true)
    {
        AbstractModel::purgeUniqueNames();
        AbstractModel::purgePhpReservedKeywords();
        if (!array_key_exists($id . $gatherMethods, self::$ids) || $reset) {
            $json = file_get_contents(sprintf('%sparsed_%s_%s.json', self::getTestDirectory(), $id, $gatherMethods));
            $json = str_replace([
                '__DESTINATION__',
                '__ORIGIN__',
            ], [
                self::getTestDirectory(),
                $origin,
            ], $json);
            self::$ids[$id . $gatherMethods] = Generator::instanceFromSerializedJson($json);
        }
        return self::$ids[$id . $gatherMethods];
    }

    /**
     * @return Generator
     */
    public static function bingGeneratorInstance($reset = true, $gatherMethods = GeneratorOptions::VALUE_START)
    {
        return self::getInstanceFromSerializedJson('bingsearch', $gatherMethods, self::wsdlBingPath(), $reset);
    }

    /**
     * @return Generator
     */
    public static function actonGeneratorInstance($reset = true, $gatherMethods = GeneratorOptions::VALUE_START)
    {
        return self::getInstanceFromSerializedJson('actonservice2', $gatherMethods, self::wsdlActonPath(), $reset);
    }

    /**
     * @return Generator
     */
    public static function portalGeneratorInstance($reset = true)
    {
        return self::getInstanceFromSerializedJson('portaplusapi', 'start', self::wsdlPortalPath(), $reset);
    }

    /**
     * @return Generator
     */
    public static function reformaGeneratorInstance($reset = true)
    {
        return self::getInstanceFromSerializedJson('reformagkh', 'start', self::wsdlReformaPath(), $reset);
    }

    /**
     * @return Generator
     */
    public static function queueGeneratorInstance($reset = true)
    {
        return self::getInstanceFromSerializedJson('queueservice', 'start', self::wsdlQueuePath(), $reset);
    }

    /**
     * @return Generator
     */
    public static function omnitureGeneratorInstance($reset = true, $gatherMethods = GeneratorOptions::VALUE_START)
    {
        return self::getInstanceFromSerializedJson('omnitureadminservices', $gatherMethods, self::wsdlOmniturePath(), $reset);
    }

    /**
     * @return Generator
     */
    public static function odigeoGeneratorInstance($reset = true)
    {
        return self::getInstanceFromSerializedJson('odigeo', 'start', self::wsdlOdigeoPath(), $reset);
    }

    /**
     * @return Generator
     */
    public static function payPalGeneratorInstance($reset = true, $gatherMethods = GeneratorOptions::VALUE_START)
    {
        return self::getInstanceFromSerializedJson('paypal', $gatherMethods, self::wsdlPayPalPath(), $reset);
    }

    /**
     * @return Generator
     */
    public static function wcfGeneratorInstance($reset = true, $gatherMethods = GeneratorOptions::VALUE_START)
    {
        return self::getInstanceFromSerializedJson('wcf', $gatherMethods, self::wsdlWcfPath(), $reset);
    }

    /**
     * @return Generator
     */
    public static function yandexDirectApiAdGroupsGeneratorInstance($reset = true, $gatherMethods = GeneratorOptions::VALUE_START)
    {
        return self::getInstanceFromSerializedJson('yandex_groups', $gatherMethods, self::wsdlYandexDirectApiAdGroupsPath(), $reset);
    }

    /**
     * @return Generator
     */
    public static function yandexDirectApiCampaignsGeneratorInstance($reset = true, $gatherMethods = GeneratorOptions::VALUE_START)
    {
        return self::getInstanceFromSerializedJson('yandex_campaigns', $gatherMethods, self::wsdlYandexDirectApiCampaignsPath(), $reset);
    }

    /**
     * @return Generator
     */
    public static function yandexDirectApiLiveGeneratorInstance($reset = true, $gatherMethods = GeneratorOptions::VALUE_START)
    {
        return self::getInstanceFromSerializedJson('yandex_live', $gatherMethods, self::wsdlYandexDirectApiLivePath(), $reset);
    }

    /**
     * @return Generator
     */
    public static function docDataPaymentsGeneratorInstance($reset = true, $gatherMethods = GeneratorOptions::VALUE_START)
    {
        return self::getInstanceFromSerializedJson('docdatapayments', $gatherMethods, self::wsdlDocDataPaymentsPath(), $reset);
    }

    /**
     * @return Generator
     */
    public static function deliveryServiceInstance($reset = true, $gatherMethods = GeneratorOptions::VALUE_START)
    {
        return self::getInstanceFromSerializedJson('deliveryservice', $gatherMethods, self::wsdlDeliveryServicePath(), $reset);
    }

    /**
     * @return Generator
     */
    public static function orderContractInstance($reset = true, $gatherMethods = GeneratorOptions::VALUE_START)
    {
        return self::getInstanceFromSerializedJson('ordercontract', $gatherMethods, self::wsdlOrderContractPath(), $reset);
    }

    /**
     * @return Generator
     */
    public static function whlInstance($reset = true, $gatherMethods = GeneratorOptions::VALUE_START)
    {
        return self::getInstanceFromSerializedJson('whl', $gatherMethods, self::wsdlWhlPath(), $reset);
    }

    /**
     * @return Generator
     */
    public static function ewsInstance()
    {
        return self::getInstanceFromSerializedJson('ews', 'start', self::wsdlEwsPath());
    }

    /**
     * @return Generator
     */
    public static function myBoardPackGeneratorInstance($reset = true, $gatherMethods = GeneratorOptions::VALUE_START)
    {
        return self::getInstanceFromSerializedJson('myboard', $gatherMethods, self::wsdlMyBoardPackPath(), $reset);
    }

    /**
     * @return Generator
     */
    public static function vehicleSelectionPackGeneratorInstance($reset = true, $gatherMethods = GeneratorOptions::VALUE_START)
    {
        return self::getInstanceFromSerializedJson('vehicleselection', $gatherMethods, self::wsdlVehicleSelectionPath(), $reset);
    }

    /**
     * @return Generator
     */
    public static function unitTestsInstanceParser()
    {
        return self::getInstanceFromSerializedJson('unit_tests', 'start', self::wsdlUnitTestsPath());
    }

    /**
     * @return string
     */
    public static function getTestDirectory()
    {
        return __DIR__ . '/resources/generated/';
    }
}
