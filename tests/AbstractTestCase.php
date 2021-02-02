<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests;

use PHPUnit\Framework\TestCase as PHPUnitFrameworkTestCase;
use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\Model\AbstractModel;
use WsdlToPhp\PackageGenerator\Tests\ConfigurationReader\GeneratorOptionsTest;

abstract class AbstractTestCase extends PHPUnitFrameworkTestCase
{
    private static array $generators = [];

    private static array $ids = [];

    public static function wsdlUnitTestsPath(): string
    {
        return __DIR__.'/resources/unit_tests.wsdl';
    }

    public static function wsdlPartnerPath(bool $local = true): string
    {
        return __DIR__.sprintf('/resources/partner/PartnerService%s.wsdl', $local ? '.local' : '');
    }

    public static function wsdlPartnerScdPath(bool $local = true): string
    {
        return __DIR__.sprintf('/resources/partner/PartnerService%s.wsdl', $local ? '.local.scd' : '');
    }

    public static function wsdlPartnerThirdPath(bool $local = true): string
    {
        return __DIR__.sprintf('/resources/partner/PartnerService%s.wsdl', $local ? '.local.third' : '');
    }

    public static function schemaPartnerPath(): string
    {
        return __DIR__.'/resources/partner/PartnerService.0.xsd';
    }

    public static function wsdlImageViewServicePath(): string
    {
        return __DIR__.'/resources/image/ImageViewService.local.wsdl';
    }

    public static function schemaImageViewServicePath(): string
    {
        return __DIR__.'/resources/image/imageViewCommon.xsd';
    }

    public static function schemaImageViewServiceAvailableImagesRequestPath(): string
    {
        return __DIR__.'/resources/image/availableImagesRequest.xsd';
    }

    public static function wsdlBingPath(): string
    {
        return __DIR__.'/resources/bingsearch.wsdl';
    }

    public static function onlineWsdlBingPath(): string
    {
        return 'https://phar.wsdltophp.com/bingsearch.wsdl';
    }

    public static function wsdlEbayPath(): string
    {
        return __DIR__.'/resources/ebaySvc.wsdl';
    }

    public static function wsdlActonPath(): string
    {
        return __DIR__.'/resources/ActonService2.local.wsdl';
    }

    public static function wsdlOdigeoPath(): string
    {
        return __DIR__.'/resources/odigeo.wsdl';
    }

    public static function wsdlOrderContractPath(): string
    {
        return __DIR__.'/resources/OrderContract.wsdl';
    }

    public static function wsdlMyBoardPackPath(): string
    {
        return __DIR__.'/resources/MyBoardPack.wsdl';
    }

    public static function wsdlWhlPath(): string
    {
        return __DIR__.'/resources/whl.wsdl';
    }

    public static function wsdlVehicleSelectionPath(): string
    {
        return __DIR__.'/resources/VehicleSelectionService/VehicleSelectionService.wsdl';
    }

    public static function wsdlPortalPath(): string
    {
        return __DIR__.'/resources/portaplusapi.wsdl';
    }

    public static function wsdlReformaPath(): string
    {
        return __DIR__.'/resources/reformagkh.wsdl';
    }

    public static function wsdlQueuePath(): string
    {
        return __DIR__.'/resources/QueueService.wsdl';
    }

    public static function wsdlBullhornstaffingPath(): string
    {
        return __DIR__.'/resources/bullhornstaffing.local.wsdl';
    }

    public static function wsdlOmniturePath(): string
    {
        return __DIR__.'/resources/OmnitureAdminServices.wsdl';
    }

    public static function wsdlPayPalPath(): string
    {
        return __DIR__.'/resources/paypal/PayPalSvc.wsdl';
    }

    public static function wsdlWcfPath(): string
    {
        return __DIR__.'/resources/wcf/Service1.wsdl';
    }

    public static function wsdlLnpPath(): string
    {
        return __DIR__.'/resources/lnp/NumberManagement.wsdl';
    }

    public static function wsdlEwsPath(): string
    {
        return __DIR__.'/resources/ews/services.wsdl';
    }

    public static function schemaEwsTypesPath(): string
    {
        return __DIR__.'/resources/ews/types.xsd';
    }

    public static function schemaEwsMessagesPath(): string
    {
        return __DIR__.'/resources/ews/messages.xsd';
    }

    public static function wsdlYandexDirectApiCampaignsPath(): string
    {
        return __DIR__.'/resources/directapi/campaigns.wsdl';
    }

    public static function wsdlYandexDirectApiAdGroupsPath(): string
    {
        return __DIR__.'/resources/directapi/adgroups.wsdl';
    }

    public static function wsdlYandexDirectApiLivePath(): string
    {
        return __DIR__.'/resources/directapi/live.wsdl';
    }

    public static function wsdlDocDataPaymentsPath(): string
    {
        return __DIR__.'/resources/docdatapayments/1_3.wsdl';
    }

    public static function wsdlDeliveryServicePath(): string
    {
        return __DIR__.'/resources/DeliveryService.wsdl';
    }

    public static function wsdlEmptyPath(): string
    {
        return __DIR__.'/resources/empty.wsdl';
    }

    public static function getBingGeneratorInstance(bool $reset = false): Generator
    {
        return self::getInstance(self::wsdlBingPath(), $reset);
    }

    public static function getOmnitureInstance(): Generator
    {
        return self::getInstance(self::wsdlOmniturePath());
    }

    public static function getBullhornstaffingInstance(): Generator
    {
        return self::getInstance(self::wsdlBullhornstaffingPath());
    }

    public static function getReformaInstance(): Generator
    {
        return self::getInstance(self::wsdlReformaPath());
    }

    public static function getWcfInstance(): Generator
    {
        return self::getInstance(self::wsdlWcfPath());
    }

    public static function getLnpInstance(): Generator
    {
        return self::getInstance(self::wsdlLnpPath(), true);
    }

    public static function getEwsInstance(): Generator
    {
        return self::getInstance(self::wsdlEwsPath());
    }

    public static function getYandexDirectApiCampaignsInstance(): Generator
    {
        return self::getInstance(self::wsdlYandexDirectApiCampaignsPath());
    }

    public static function getYandexDirectApiAdGroupsInstance(): Generator
    {
        return self::getInstance(self::wsdlYandexDirectApiAdGroupsPath());
    }

    public static function getDocDataPAymentsInstance(): Generator
    {
        return self::getInstance(self::wsdlDocDataPaymentsPath());
    }

    public static function getDeliveryServiceInstance(): Generator
    {
        return self::getInstance(self::wsdlDeliveryServicePath());
    }

    public static function getWhlInstance(bool $reset = false): Generator
    {
        return self::getInstance(self::wsdlWhlPath(), $reset);
    }

    public static function getVehicleSelectionInstance(bool $reset = false): Generator
    {
        return self::getInstance(self::wsdlVehicleSelectionPath(), $reset);
    }

    public static function getUnitTestsInstance(bool $reset = false): Generator
    {
        return self::getInstance(self::wsdlUnitTestsPath(), $reset);
    }

    public static function getInstance(string $wsdlPath, bool $reset = false): Generator
    {
        if (!isset(self::$generators[$wsdlPath]) || $reset) {
            self::$generators[$wsdlPath] = self::getGeneratorInstance($wsdlPath);
        }

        return self::$generators[$wsdlPath];
    }

    public static function getInstanceFromSerializedJson(string $id, string $gatherMethods, string $origin, bool $reset = true): Generator
    {
        AbstractModel::purgeUniqueNames();
        AbstractModel::purgePhpReservedKeywords();
        if (!array_key_exists($id.$gatherMethods, self::$ids) || $reset) {
            $json = file_get_contents(sprintf('%sparsed_%s_%s.json', self::getTestDirectory(), $id, $gatherMethods));
            $json = str_replace([
                '__DESTINATION__',
                '__ORIGIN__',
            ], [
                self::getTestDirectory(),
                $origin,
            ], $json);
            self::$ids[$id.$gatherMethods] = Generator::instanceFromSerializedJson($json);
        }

        return self::$ids[$id.$gatherMethods];
    }

    public static function bingGeneratorInstance(bool $reset = true, string $gatherMethods = GeneratorOptions::VALUE_START): Generator
    {
        return self::getInstanceFromSerializedJson('bingsearch', $gatherMethods, self::wsdlBingPath(), $reset);
    }

    public static function actonGeneratorInstance(bool $reset = true, string $gatherMethods = GeneratorOptions::VALUE_START): Generator
    {
        return self::getInstanceFromSerializedJson('actonservice2', $gatherMethods, self::wsdlActonPath(), $reset);
    }

    public static function portalGeneratorInstance(bool $reset = true): Generator
    {
        return self::getInstanceFromSerializedJson('portaplusapi', 'start', self::wsdlPortalPath(), $reset);
    }

    public static function reformaGeneratorInstance(bool $reset = true): Generator
    {
        return self::getInstanceFromSerializedJson('reformagkh', 'start', self::wsdlReformaPath(), $reset);
    }

    public static function queueGeneratorInstance(bool $reset = true): Generator
    {
        return self::getInstanceFromSerializedJson('queueservice', 'start', self::wsdlQueuePath(), $reset);
    }

    public static function omnitureGeneratorInstance(bool $reset = true, string $gatherMethods = GeneratorOptions::VALUE_START): Generator
    {
        return self::getInstanceFromSerializedJson('omnitureadminservices', $gatherMethods, self::wsdlOmniturePath(), $reset);
    }

    public static function odigeoGeneratorInstance(bool $reset = true): Generator
    {
        return self::getInstanceFromSerializedJson('odigeo', 'start', self::wsdlOdigeoPath(), $reset);
    }

    public static function payPalGeneratorInstance(bool $reset = true, string $gatherMethods = GeneratorOptions::VALUE_START): Generator
    {
        return self::getInstanceFromSerializedJson('paypal', $gatherMethods, self::wsdlPayPalPath(), $reset);
    }

    public static function wcfGeneratorInstance(bool $reset = true, string $gatherMethods = GeneratorOptions::VALUE_START): Generator
    {
        return self::getInstanceFromSerializedJson('wcf', $gatherMethods, self::wsdlWcfPath(), $reset);
    }

    public static function yandexDirectApiAdGroupsGeneratorInstance(bool $reset = true, string $gatherMethods = GeneratorOptions::VALUE_START): Generator
    {
        return self::getInstanceFromSerializedJson('yandex_groups', $gatherMethods, self::wsdlYandexDirectApiAdGroupsPath(), $reset);
    }

    public static function yandexDirectApiCampaignsGeneratorInstance(bool $reset = true, string $gatherMethods = GeneratorOptions::VALUE_START): Generator
    {
        return self::getInstanceFromSerializedJson('yandex_campaigns', $gatherMethods, self::wsdlYandexDirectApiCampaignsPath(), $reset);
    }

    public static function yandexDirectApiLiveGeneratorInstance(bool $reset = true, string $gatherMethods = GeneratorOptions::VALUE_START): Generator
    {
        return self::getInstanceFromSerializedJson('yandex_live', $gatherMethods, self::wsdlYandexDirectApiLivePath(), $reset);
    }

    public static function docDataPaymentsGeneratorInstance(bool $reset = true, string $gatherMethods = GeneratorOptions::VALUE_START): Generator
    {
        return self::getInstanceFromSerializedJson('docdatapayments', $gatherMethods, self::wsdlDocDataPaymentsPath(), $reset);
    }

    public static function deliveryServiceInstance(bool $reset = true, string $gatherMethods = GeneratorOptions::VALUE_START): Generator
    {
        return self::getInstanceFromSerializedJson('deliveryservice', $gatherMethods, self::wsdlDeliveryServicePath(), $reset);
    }

    public static function orderContractInstance(bool $reset = true, string $gatherMethods = GeneratorOptions::VALUE_START): Generator
    {
        return self::getInstanceFromSerializedJson('ordercontract', $gatherMethods, self::wsdlOrderContractPath(), $reset);
    }

    public static function whlInstance(bool $reset = true, string $gatherMethods = GeneratorOptions::VALUE_START): Generator
    {
        return self::getInstanceFromSerializedJson('whl', $gatherMethods, self::wsdlWhlPath(), $reset);
    }

    public static function ewsInstance()
    {
        return self::getInstanceFromSerializedJson('ews', 'start', self::wsdlEwsPath());
    }

    public static function myBoardPackGeneratorInstance(bool $reset = true, string $gatherMethods = GeneratorOptions::VALUE_START): Generator
    {
        return self::getInstanceFromSerializedJson('myboard', $gatherMethods, self::wsdlMyBoardPackPath(), $reset);
    }

    public static function vehicleSelectionPackGeneratorInstance(bool $reset = true, string $gatherMethods = GeneratorOptions::VALUE_START): Generator
    {
        return self::getInstanceFromSerializedJson('vehicleselection', $gatherMethods, self::wsdlVehicleSelectionPath(), $reset);
    }

    public static function unitTestsInstance(): Generator
    {
        return self::getInstanceFromSerializedJson('unit_tests', 'start', self::wsdlUnitTestsPath());
    }

    public static function getTestDirectory(): string
    {
        return __DIR__.'/resources/generated/';
    }

    private static function getGeneratorInstance(string $wsdlPath): Generator
    {
        $options = GeneratorOptionsTest::optionsInstance()
            ->setOrigin($wsdlPath)
            ->setDestination(self::getTestDirectory())
        ;

        return new Generator($options);
    }
}
