<?php

namespace WsdlToPhp\PackageGenerator\Tests\File;

use WsdlToPhp\PackageGenerator\Model\EmptyModel;
use WsdlToPhp\PackageGenerator\Model\Struct as StructModel;
use WsdlToPhp\PackageGenerator\File\Struct as StructFile;

class StructTest extends AbstractFile
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetModelGoodNameTooManyAttributesWithException()
    {
        $instance = self::bingGeneratorInstance();
        $struct = new StructFile($instance, 'Foo');
        $struct->setModel(new EmptyModel($instance, 'Foo'));
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionOnWrite()
    {
        $file = new StructFile(self::bingGeneratorInstance(), 'foo');

        $file->write();
    }
    /**
     *
     */
    public function testGetFileName()
    {
        $model = new StructModel(self::bingGeneratorInstance(), 'Foo');
        $file = new StructFile(self::bingGeneratorInstance(), 'foo');
        $file->setModel($model);

        $this->assertSame(sprintf('%s%s%s/%s.php', self::getTestDirectory(), $model->getGenerator()->getOptionSrcDirname() . DIRECTORY_SEPARATOR, $model->getContextualPart(), $model->getPackagedName(false)), $file->getFileName());
    }
    /**
     *
     */
    public function testWriteBingSearchStructQuery()
    {
        $generator = self::bingGeneratorInstance();
        if (($model = $generator->getStructByName('Query')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiQuery', $struct);
        } else {
            $this->fail('Unable to find Query struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteBingSearchStructVideoRequest()
    {
        $generator = self::bingGeneratorInstance();
        if (($model = $generator->getStructByName('VideoRequest')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiVideoRequest', $struct);
        } else {
            $this->fail('Unable to find VideoRequest struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteBingSearchStructSearchRequest()
    {
        $generator = self::bingGeneratorInstance();
        if (($model = $generator->getStructByName('SearchRequest')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiSearchRequest', $struct);
        } else {
            $this->fail('Unable to find SearchRequest struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteActonStructItem()
    {
        $generator = self::actonGeneratorInstance();
        if (($model = $generator->getStructByName('Item')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiItem', $struct);
        } else {
            $this->fail('Unable to find Item struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteOdigeoStructFareItinerary()
    {
        $generator = self::odigeoGeneratorInstance();
        if (($model = $generator->getStructByName('fareItinerary')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiFareItinerary', $struct);
        } else {
            $this->fail('Unable to find fareItinerary struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteBingStructNewsArticle()
    {
        $generator = self::bingGeneratorInstance();
        if (($model = $generator->getStructByName('NewsArticle')) instanceof StructModel) {
            $generator->setOptionStructClass('\Std\Opt\StructClass');
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiNewsArticle', $struct);
        } else {
            $this->fail('Unable to find NewsArticle struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteWcfStructOffer()
    {
        $generator = self::wcfGeneratorInstance();
        if (($model = $generator->getStructByName('offer')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiOffer', $struct);
        } else {
            $this->fail('Unable to find offer struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteYandexDirectApiStructAddRequest()
    {
        $generator = self::yandexDirectApiAdGroupsGeneratorInstance();
        if (($model = $generator->getStructByName('AddRequest')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidAddRequest', $struct);
        } else {
            $this->fail('Unable to find AddRequest struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteYandexDirectApiStructAddRequestWithRepeatedMetaValueMaxOccurs()
    {
        $generator = self::yandexDirectApiAdGroupsGeneratorInstance();
        if (($model = $generator->getStructByName('AddRequest')) instanceof StructModel) {
            $model->getAttribute('AdGroups')
                ->addMeta('maxOccurs', 1)
                ->addMeta('maxOccurs', 'unbounded');

            $this->assertSame([
                'unbounded',
                1,
                'unbounded',
            ], $model->getAttribute('AdGroups')->getMetaValue('maxOccurs'));

            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidAddRequestRepeatedMaxOccurs', $struct);
        } else {
            $this->fail('Unable to find AddRequest struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteYandexDirectApiStructAdGroupsSelectionCriteria()
    {
        $generator = self::yandexDirectApiAdGroupsGeneratorInstance();
        if (($model = $generator->getStructByName('AdGroupsSelectionCriteria')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidAdGroupsSelectionCriteria', $struct);
        } else {
            $this->fail('Unable to find AdGroupsSelectionCriteria struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteDocDataPaymentsStructShopper()
    {
        $generator = self::docDataPaymentsGeneratorInstance(true);
        if (($model = $generator->getStructByName('shopper')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidShopper', $struct);
        } else {
            $this->fail('Unable to find shopper struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteDocDataPaymentsStructExpiryDate()
    {
        $generator = self::docDataPaymentsGeneratorInstance(true);
        if (($model = $generator->getStructByName('expiryDate')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidExpiryDate', $struct);
        } else {
            $this->fail('Unable to find expiryDate struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteDeliveryServiceStructExpiryDate()
    {
        $generator = self::deliveryServiceInstance();
        if (($model = $generator->getStructByName('АдресРФ')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidAddress', $struct);
        } else {
            $this->fail('Unable to find АдресРФ struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteReformaStructHouseProfileData()
    {
        $generator = self::reformaGeneratorInstance(true);
        if (($model = $generator->getStructByName('HouseProfileData')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidHouseProfileData', $struct);
        } else {
            $this->fail('Unable to find HouseProfileData struct for file generation');
        }
    }
    /**
     *
     */
    public function testOrderContractStructAddressDelivery_Type()
    {
        $generator = self::orderContractInstance(true);
        if (($model = $generator->getStructByName('AddressDelivery_Type')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidAddressDelivery_Type', $struct);
        } else {
            $this->fail('Unable to find AddressDelivery_Type struct for file generation');
        }
    }
    /**
     *
     */
    public function testDestination()
    {
        $generator = self::bingGeneratorInstance();
        if (($model = $generator->getStructByName('NewsArticle')) instanceof StructModel) {
            $generator->setOptionStructClass('\Std\Opt\StructClass');
            $struct = new StructFile($generator, $model->getName());
            $struct->setModel($model);

            $this->assertSame(sprintf('%s%s%s/', self::getTestDirectory(), $generator->getOptionSrcDirname() . DIRECTORY_SEPARATOR, $model->getContextualPart()), $struct->getFileDestination());
        } else {
            $this->fail('Unable to find NewsArticle struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteYandexDirectApiStructCampaignsCompaignGetItem()
    {
        $generator = self::yandexDirectApiCampaignsGeneratorInstance(true);
        $generator->setOptionValidation(false);
        if (($model = $generator->getStructByName('CampaignGetItem')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidCampaignGetItem', $struct);
        } else {
            $this->fail('Unable to find CampaignGetItem struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteYandexDirectApiStructLiveBannerInfo()
    {
        $generator = self::yandexDirectApiLiveGeneratorInstance(true);
        $generator->setOptionValidation(true);
        if (($model = $generator->getStructByName('BannerInfo')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidBannerInfo', $struct);
        } else {
            $this->fail('Unable to find BannerInfo struct for file generation');
        }
    }
    /**
     *
     */
    public function testWritePayPalApiStructSetExpressCheckoutRequestDetailsType()
    {
        $generator = self::payPalGeneratorInstance(true);
        $generator->setOptionValidation(true);
        if (($model = $generator->getStructByName('SetExpressCheckoutRequestDetailsType')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidSetExpressCheckoutRequestDetailsType', $struct);
        } else {
            $this->fail('Unable to find SetExpressCheckoutRequestDetailsType struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteWhlHotelReservationType()
    {
        $generator = self::whlInstance(true);
        $generator->setOptionValidation(true);
        if (($model = $generator->getStructByName('HotelReservationType')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidHotelReservationType', $struct);
        } else {
            $this->fail('Unable to find HotelReservationType struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteWhlTaxType()
    {
        $generator = self::whlInstance();
        $generator->setOptionValidation(true);
        if (($model = $generator->getStructByName('TaxType')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidTaxType', $struct);
        } else {
            $this->fail('Unable to find TaxType struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteWhlPaymentCardType()
    {
        $generator = self::whlInstance();
        $generator->setOptionValidation(true);
        if (($model = $generator->getStructByName('PaymentCardType')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidPaymentCardType', $struct);
        } else {
            $this->fail('Unable to find PaymentCardType struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteWhlAddressType()
    {
        $generator = self::whlInstance();
        $generator->setOptionValidation(true);
        if (($model = $generator->getStructByName('AddressType')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidAddressType', $struct);
        } else {
            $this->fail('Unable to find AddressType struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteWhlUniqueID_Type()
    {
        $generator = self::whlInstance();
        $generator->setOptionValidation(true);
        if (($model = $generator->getStructByName('UniqueID_Type')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidUniqueID_Type', $struct);
        } else {
            $this->fail('Unable to find UniqueID_Type struct for file generation');
        }
    }
    /**
     *
     */
    public function testStructWithIdenticalPropertiesDifferentByCase()
    {
        $generator = self::bingGeneratorInstance();
        if (($model = $generator->getStructByName('Query')) instanceof StructModel) {
            $model->addAttribute('searchTerms', 'string');
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiQueryWithIdenticalPropertiesDifferentByCase', $struct);
        } else {
            $this->fail('Unable to find Query struct for file generation');
        }
    }
    /**
     *
     */
    public function testStructResultFromUnitTestsWithBooleanAttribute()
    {
        $generator = self::unitTestsInstanceParser();
        if (($model = $generator->getStructByName('Result')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidUnitTestsStructResult', $struct);
        } else {
            $this->fail('Unable to find Result struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteDeliveryDetails()
    {
        $generator = self::deliveryServiceInstance();
        $generator->setOptionValidation(true);
        if (($model = $generator->getStructByName('details')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidDetails', $struct);
        } else {
            $this->fail('Unable to find details struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteEwsStructWorkingPeriod()
    {
        $generator = self::ewsInstance();
        if (($model = $generator->getStructByName('WorkingPeriod')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidWorkingPeriod', $struct);
        } else {
            $this->assertFalse(true, 'Unable to find WorkingPeriod struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteEwsStructProposeNewTimeTypeWithNoConstructor()
    {
        $generator = self::ewsInstance();
        if (($model = $generator->getStructByName('ProposeNewTimeType')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidProposeNewTimeType', $struct);
        } else {
            $this->assertFalse(true, 'Unable to find ProposeNewTimeType struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteVehicleSelectionStructFieldString1000()
    {
        $generator = self::vehicleSelectionPackGeneratorInstance();
        if (($model = $generator->getStructByName('fieldString1000')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidFieldString1000', $struct);
        } else {
            $this->fail('Unable to find fieldString1000 struct for file generation');
        }
    }
}
