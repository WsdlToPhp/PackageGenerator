<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

use WsdlToPhp\PackageGenerator\Container\PhpElement\Method as MethodContainer;
use WsdlToPhp\PackageGenerator\File\Struct as StructFile;
use WsdlToPhp\PackageGenerator\File\StructArray as StructArrayFile;
use WsdlToPhp\PackageGenerator\File\StructEnum as StructEnumFile;
use WsdlToPhp\PackageGenerator\File\Validation\Rules;
use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Model\Struct as StructModel;
use WsdlToPhp\PackageGenerator\Model\StructAttribute as StructAttributeModel;
use WsdlToPhp\PackageGenerator\Tests\AbstractTestCase;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;

abstract class AbstractRule extends AbstractTestCase
{
    private static array $generators = [];

    public static function getActonItemInstance(bool $reset = false)
    {
        return self::getClassInstance('actonGeneratorInstance', 'Item', $reset);
    }

    public static function getWhlAddressTypeInstance(bool $reset = false)
    {
        return self::getClassInstance('whlInstance', 'AddressType', $reset);
    }

    public static function getWhlBookingChannelInstance(bool $reset = false)
    {
        return self::getClassInstance('whlInstance', 'BookingChannel', $reset);
    }

    public static function getWhlHotelReservationTypeInstance(bool $reset = false)
    {
        // required for validating enumeration values
        self::getClassInstance('whlInstance', 'PMS_ResStatusType');
        self::getClassInstance('whlInstance', 'TransactionActionType');

        return self::getClassInstance('whlInstance', 'HotelReservationType', $reset);
    }

    public static function getWhlPaymentCardTypeInstance(bool $reset = false)
    {
        // required for validating enumeration values
        self::getClassInstance('whlInstance', 'PaymentCardCodeType');

        return self::getClassInstance('whlInstance', 'PaymentCardType', $reset);
    }

    public static function getWhlTaxTypeInstance(bool $reset = false)
    {
        // required for validating enumeration values
        self::getClassInstance('whlInstance', 'AmountDeterminationType');
        // required for validating itemType
        self::getClassInstance('whlInstance', 'ParagraphType');

        return self::getClassInstance('whlInstance', 'TaxType', $reset);
    }

    public static function getArrayOfGuidInstance(bool $reset = false)
    {
        return self::getClassInstance('bingGeneratorInstance', 'ArrayOfGuid', $reset);
    }

    public static function getQueueMessageAttributeValueInstance(bool $reset = false)
    {
        return self::getClassInstance('queueGeneratorInstance', 'MessageAttributeValue', $reset);
    }

    public static function getBingSearchRequestInstance(bool $reset = false)
    {
        // required for validating enumeration values
        self::getClassInstance('bingGeneratorInstance', 'AdultOption');

        return self::getClassInstance('bingGeneratorInstance', 'SearchRequest', $reset);
    }

    public static function getBingNewsArticleInstance(bool $reset = false)
    {
        return self::getClassInstance('bingGeneratorInstance', 'NewsArticle', $reset);
    }

    public static function getOdigeoFareItineraryInstance(bool $reset = false)
    {
        return self::getClassInstance('odigeoGeneratorInstance', 'fareItinerary', $reset);
    }

    public static function getOrderContractAddressDeliveryTypeInstance(bool $reset = false)
    {
        return self::getClassInstance('orderContractInstance', 'AddressDelivery_Type', $reset);
    }

    public static function getEwsWorkingPeriodInstance(bool $reset = false)
    {
        // required for validating enumeration values
        self::getClassInstance('ewsInstance', 'DayOfWeekType');

        return self::getClassInstance('ewsInstance', 'WorkingPeriod', $reset);
    }

    public static function getDocDataPaymentsShoppperInstance(bool $reset = false)
    {
        // required for validating enumeration values
        self::getClassInstance('docDataPaymentsGeneratorInstance', 'gender');

        return self::getClassInstance('docDataPaymentsGeneratorInstance', 'shopper', $reset);
    }

    public static function getReformaHouseProfileDataInstance(bool $reset = false)
    {
        // required for validating enumeration values
        self::getClassInstance('reformaGeneratorInstance', 'HouseTypeEnum');
        self::getClassInstance('reformaGeneratorInstance', 'HouseWallMaterialEnum');
        self::getClassInstance('reformaGeneratorInstance', 'HouseFloorTypeEnum');
        self::getClassInstance('reformaGeneratorInstance', 'HouseEnergyEfficiencyClassEnum');

        return self::getClassInstance('reformaGeneratorInstance', 'HouseProfileData', $reset);
    }

    protected function createRuleFunction(string $ruleClassName, $value = null, bool $itemType = false, string $structAttributeType = 'string'): string
    {
        $generator = self::getBingGeneratorInstance();
        $methodName = '_any_'.md5((string) random_int(0, time()));
        $method = new PhpMethod($methodName, [
            'any',
        ]);
        $structFile = new StructFile($generator, 'any');
        $structModel = new StructModel($generator, 'any');
        $methodContainer = new MethodContainer($generator);
        $structAttribute = new StructAttributeModel($generator, 'any', $structAttributeType, $structModel);
        $rule = new $ruleClassName(new Rules($structFile, $method, $structAttribute, $methodContainer));
        $rule->applyRule('any', $value, $itemType);
        $method->addChild('return true;');
        eval(str_replace('public ', '', $method->toString()));

        return $methodName;
    }

    protected static function createClassInstance(Struct $struct)
    {
        // generate class' file
        if ($struct->isArray()) {
            $structFile = new StructArrayFile($struct->getGenerator(), 'any');
        } elseif ($struct->isRestriction()) {
            $structFile = new StructEnumFile($struct->getGenerator(), 'any');
        } else {
            $structFile = new StructFile($struct->getGenerator(), 'any');
        }
        $structFile->setModel($struct)->writeFile();

        // load class
        require_once $structFile->getFileName();

        // remove no more useful file
        @unlink($structFile->getFileName());
    }

    private static function getClassInstance($instanceMethod, $structName, $reset = false)
    {
        $key = implode('_', [
            $instanceMethod,
            $structName,
        ]);

        // get struct
        $struct = call_user_func_array([
            'self',
            $instanceMethod,
        ], [
            false,
        ])->getStructByName($structName);

        if (!$struct) {
            self::fail(sprintf('Unable to find %s struct for instantiating a new instance using %s', $structName, $instanceMethod));
        }

        // create class' file
        $fileCreated = false;
        if (!array_key_exists($key, self::$generators)) {
            self::createClassInstance($struct);
            $fileCreated = true;
        }

        // instantiate class
        if ($reset || $fileCreated) {
            $reflection = new \ReflectionClass(($struct->getNamespace() ? $struct->getNamespace().'\\' : '').$struct->getPackagedName());
            self::$generators[$key] = $reflection->newInstanceWithoutConstructor();
        }

        return self::$generators[$key];
    }
}
