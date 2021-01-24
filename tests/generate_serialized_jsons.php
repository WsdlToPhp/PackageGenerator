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
$jsons = [
    'unit_tests' => [
        'origin' => __DIR__ . '/resources/unit_tests.wsdl',
        'methods' => [
            'none',
            'start',
        ],
    ],
    'bingsearch' => [
        'origin' => __DIR__ . '/resources/bingsearch.wsdl',
        'methods' => [
            'none',
            'start',
        ],
    ],
    'actonservice2' => [
        'origin' => __DIR__ . '/resources/ActonService2.local.wsdl',
        'methods' => [
            'none',
            'start',
        ],
    ],
    'portaplusapi' => [
        'origin' => __DIR__ . '/resources/portaplusapi.wsdl',
        'methods' => [
            'none',
            'start',
        ],
    ],
    'reformagkh' => [
        'origin' => __DIR__ . '/resources/reformagkh.wsdl',
        'methods' => [
            'none',
            'start',
        ],
    ],
    'queueservice' => [
        'origin' => __DIR__ . '/resources/QueueService.wsdl',
        'methods' => [
            'none',
            'start',
        ],
    ],
    'omnitureadminservices' => [
        'origin' => __DIR__ . '/resources/OmnitureAdminServices.wsdl',
        'methods' => [
            'none',
            'start',
        ],
    ],
    'odigeo' => [
        'origin' => __DIR__ . '/resources/odigeo.wsdl',
        'methods' => [
            'none',
            'start',
        ],
    ],
    'paypal' => [
        'origin' => __DIR__ . '/resources/paypal/PayPalSvc.wsdl',
        'methods' => [
            'none',
            'start',
        ],
    ],
    'wcf' => [
        'origin' => __DIR__ . '/resources/wcf/Service1.wsdl',
        'methods' => [
            'none',
            'start',
        ],
    ],
    'ews' => [
        'origin' => __DIR__ . '/resources/ews/services.wsdl',
        'methods' => [
            'none',
            'start',
        ],
    ],
    'yandex_groups' => [
        'origin' => __DIR__ . '/resources/directapi/adgroups.wsdl',
        'methods' => [
            'none',
            'start',
        ],
    ],
    'yandex_campaigns' => [
        'origin' => __DIR__ . '/resources/directapi/campaigns.wsdl',
        'methods' => [
            'none',
            'start',
        ],
    ],
    'yandex_live' => [
        'origin' => __DIR__ . '/resources/directapi/live.wsdl',
        'methods' => [
            'none',
            'start',
        ],
    ],
    'docdatapayments' => [
        'origin' => __DIR__ . '/resources/docdatapayments/1_3.wsdl',
        'methods' => [
            'none',
            'start',
        ],
    ],
    'deliveryservice' => [
        'origin' => __DIR__ . '/resources/DeliveryService.wsdl',
        'methods' => [
            'none',
            'start',
        ],
    ],
    'deliveryservice' => [
        'origin' => __DIR__ . '/resources/DeliveryService.wsdl',
        'methods' => [
            'none',
            'start',
        ],
    ],
    'ordercontract' => [
        'origin' => __DIR__ . '/resources/OrderContract.wsdl',
        'methods' => [
            'none',
            'start',
        ],
    ],
    'whl' => [
        'origin' => __DIR__ . '/resources/whl.wsdl',
        'methods' => [
            'none',
            'start',
        ],
    ],
    'myboard' => [
        'origin' => __DIR__ . '/resources/MyBoardPack.wsdl',
        'methods' => [
            'none',
            'start',
        ],
    ],
    'vehicleselection' => [
        'origin' => __DIR__ . '/resources/VehicleSelectionService/VehicleSelectionService.wsdl',
        'methods' => [
            'none',
            'start',
        ],
    ],
];

foreach ($jsons as $id => $settings) {
    foreach ($settings['methods'] as $gatherMethod) {
        fwrite(STDERR, PHP_EOL . sprintf('Start generation of %sparsed_%s_%s.json', TestCase::getTestDirectory(), $id, $gatherMethod));
        AbstractModel::purgeUniqueNames();
        AbstractModel::purgePhpReservedKeywords();
        $options = GeneratorOptions::instance()
            ->setAddComments([
                'release' => '1.1.0',
            ])
            ->setOrigin($settings['origin'])
            ->setGatherMethods($gatherMethod)
            ->setPrefix('Api')
            ->setDestination(TestCase::getTestDirectory())
            ->setSchemasSave(false)
            ->setSchemasFolder('wsdl');
        $generator = new Generator($options);
        $generator->parse();
        $json = json_encode($generator, JSON_PRETTY_PRINT);
        $json = str_replace(json_encode($settings['origin']), '"__ORIGIN__"', $json);
        $json = str_replace(json_encode(TestCase::getTestDirectory()), '"__DESTINATION__"', $json);
        file_put_contents(sprintf('%sparsed_%s_%s.json', TestCase::getTestDirectory(), $id, $gatherMethod), $json);
        fwrite(STDERR, ' -> generated');
    }
}
