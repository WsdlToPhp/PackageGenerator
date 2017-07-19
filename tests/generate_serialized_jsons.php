<?php
require_once __DIR__ . '/../vendor/autoload.php';
use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Model\AbstractModel;
/**
 * This file is here to help generate the serialized Generator instances as JSON files.
 * This can be executed as php generate_serialized_jsons.php which generates the files under the resources/generated directory
 * The array associated to the WSDL is the gather methods options value(s) for which the JSON file has to be generated
 */
$jsons = array(
    'bingsearch' => array(
        'origin' => __DIR__ . '/resources/bingsearch.wsdl',
        'methods' => array(
            'none',
            'start',
        ),
    ),
    'actonservice2' => array(
        'origin' => __DIR__ . '/resources/ActonService2.local.wsdl',
        'methods' => array(
            'none',
            'start',
        ),
    ),
    'portaplusapi' => array(
        'origin' => __DIR__ . '/resources/portaplusapi.wsdl',
        'methods' => array(
            'none',
            'start',
        ),
    ),
    'reformagkh' => array(
        'origin' => __DIR__ . '/resources/reformagkh.wsdl',
        'methods' => array(
            'none',
            'start',
        ),
    ),
    'queueservice' => array(
        'origin' => __DIR__ . '/resources/QueueService.wsdl',
        'methods' => array(
            'none',
            'start',
        ),
    ),
    'omnitureadminservices' => array(
        'origin' => __DIR__ . '/resources/OmnitureAdminServices.wsdl',
        'methods' => array(
            'none',
            'start',
        ),
    ),
    'odigeo' => array(
        'origin' => __DIR__ . '/resources/odigeo.wsdl',
        'methods' => array(
            'none',
            'start',
        ),
    ),
    'paypal' => array(
        'origin' => __DIR__ . '/resources/paypal/PayPalSvc.wsdl',
        'methods' => array(
            'none',
            'start',
        ),
    ),
    'wcf' => array(
        'origin' => __DIR__ . '/resources/wcf/Service1.wsdl',
        'methods' => array(
            'none',
            'start',
        ),
    ),
    'ews' => array(
        'origin' => __DIR__ . '/resources/ews/services.wsdl',
        'methods' => array(
            'none',
            'start',
        ),
    ),
    'yandex_groups' => array(
        'origin' => __DIR__ . '/resources/directapi/adgroups.wsdl',
        'methods' => array(
            'none',
            'start',
        ),
    ),
    'yandex_campaigns' => array(
        'origin' => __DIR__ . '/resources/directapi/campaigns.wsdl',
        'methods' => array(
            'none',
            'start',
        ),
    ),
    'yandex_live' => array(
        'origin' => __DIR__ . '/resources/directapi/live.wsdl',
        'methods' => array(
            'none',
            'start',
        ),
    ),
    'docdatapayments' => array(
        'origin' => __DIR__ . '/resources/docdatapayments/1_3.wsdl',
        'methods' => array(
            'none',
            'start',
        ),
    ),
    'deliveryservice' => array(
        'origin' => __DIR__ . '/resources/DeliveryService.wsdl',
        'methods' => array(
            'none',
            'start',
        ),
    ),
    'deliveryservice' => array(
        'origin' => __DIR__ . '/resources/DeliveryService.wsdl',
        'methods' => array(
            'none',
            'start',
        ),
    ),
    'ordercontract' => array(
        'origin' => __DIR__ . '/resources/OrderContract.wsdl',
        'methods' => array(
            'none',
            'start',
        ),
    ),
    'whl' => array(
        'origin' => __DIR__ . '/resources/whl.wsdl',
        'methods' => array(
            'none',
            'start',
        ),
    ),
);

foreach ($jsons as $id => $settings) {
    foreach ($settings['methods'] as $gatherMethod) {
        AbstractModel::purgeUniqueNames();
        AbstractModel::purgePhpReservedKeywords();
        $options = GeneratorOptions::instance()
            ->setAddComments(array(
                'release' => '1.1.0',
            ))
            ->setOrigin($settings['origin'])
            ->setGatherMethods($gatherMethod)
            ->setPrefix('Api')
            ->setDestination(TestCase::getTestDirectory());
        $generator = new Generator($options);
        $generator->parse();
        $json = json_encode($generator, JSON_PRETTY_PRINT);
        $json = str_replace(json_encode($settings['origin']), '__ORIGIN__', $json);
        $json = str_replace(json_encode(TestCase::getTestDirectory()), '__DESTINATION__', $json);
        file_put_contents(sprintf('%sparsed_%s_%s.json', TestCase::getTestDirectory(), $id, $gatherMethod), $json);
    }

}