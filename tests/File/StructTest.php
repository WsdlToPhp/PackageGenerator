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

        $this->assertSame(sprintf('%s%s%s/%s.php', self::getTestDirectory(), StructFile::SRC_FOLDER, $model->getContextualPart(), $model->getPackagedName(false)), $file->getFileName());
    }
    /**
     *
     */
    public function testWriteBingSearchStructQuery()
    {
        $generator = self::bingGeneratorInstance();
        if (($model = $generator->getStruct('Query')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiQuery', $struct);
        } else {
            $this->assertFalse(true, 'Unable to find Query struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteBingSearchStructVideoRequest()
    {
        $generator = self::bingGeneratorInstance();
        if (($model = $generator->getStruct('VideoRequest')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiVideoRequest', $struct);
        } else {
            $this->assertFalse(true, 'Unable to find VideoRequest struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteBingSearchStructSearchRequest()
    {
        $generator = self::bingGeneratorInstance();
        if (($model = $generator->getStruct('SearchRequest')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiSearchRequest', $struct);
        } else {
            $this->assertFalse(true, 'Unable to find SearchRequest struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteActonStructItem()
    {
        $generator = self::actonGeneratorInstance();
        if (($model = $generator->getStruct('Item')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiItem', $struct);
        } else {
            $this->assertFalse(true, 'Unable to find Item struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteOdigeoStructFareItinerary()
    {
        $generator = self::odigeoGeneratorInstance();
        if (($model = $generator->getStruct('fareItinerary')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiFareItinerary', $struct);
        } else {
            $this->assertFalse(true, 'Unable to find fareItinerary struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteBingStructNewsArticle()
    {
        $generator = self::bingGeneratorInstance();
        if (($model = $generator->getStruct('NewsArticle')) instanceof StructModel) {
            $generator->setOptionStructClass('\Std\Opt\StructClass');
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiNewsArticle', $struct);
        } else {
            $this->assertFalse(true, 'Unable to find NewsArticle struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteWcfStructOffer()
    {
        $generator = self::wcfGeneratorInstance();
        if (($model = $generator->getStruct('offer')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiOffer', $struct);
        } else {
            $this->assertFalse(true, 'Unable to find offer struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteYandexDirectApiStructAddRequest()
    {
        $generator = self::yandexDirectApiAdGroupsGeneratorInstance();
        if (($model = $generator->getStruct('AddRequest')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidAddRequest', $struct);
        } else {
            $this->assertFalse(true, 'Unable to find AddRequest struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteYandexDirectApiStructAdGroupsSelectionCriteria()
    {
        $generator = self::yandexDirectApiAdGroupsGeneratorInstance();
        if (($model = $generator->getStruct('AdGroupsSelectionCriteria')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidAdGroupsSelectionCriteria', $struct);
        } else {
            $this->assertFalse(true, 'Unable to find AdGroupsSelectionCriteria struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteDocDataPaymentsStructShopper()
    {
        $generator = self::docDataPaymentsGeneratorInstance(true);
        if (($model = $generator->getStruct('shopper')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidShopper', $struct);
        } else {
            $this->assertFalse(true, 'Unable to find shopper struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteDocDataPaymentsStructExpiryDate()
    {
        $generator = self::docDataPaymentsGeneratorInstance(true);
        if (($model = $generator->getStruct('expiryDate')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidExpiryDate', $struct);
        } else {
            $this->assertFalse(true, 'Unable to find expiryDate struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteDeliveryServiceStructExpiryDate()
    {
        $generator = self::deliveryServiceInstance();
        if (($model = $generator->getStruct('АдресРФ')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidАдресРФ', $struct);
        } else {
            $this->assertFalse(true, 'Unable to find АдресРФ struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteReformaStructHouseProfileData()
    {
        $generator = self::reformaGeneratorInstance(true);
        if (($model = $generator->getStruct('HouseProfileData')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidHouseProfileData', $struct);
        } else {
            $this->assertFalse(true, 'Unable to find HouseProfileData struct for file generation');
        }
    }
    /**
     *
     */
    public function testOrderContractStructAddressDelivery_Type()
    {
        $generator = self::orderContractInstance(true);
        if (($model = $generator->getStruct('AddressDelivery_Type')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidAddressDelivery_Type', $struct);
        } else {
            $this->assertFalse(true, 'Unable to find AddressDelivery_Type struct for file generation');
        }
    }
    /**
     *
     */
    public function testDestination()
    {
        $generator = self::bingGeneratorInstance();
        if (($model = $generator->getStruct('NewsArticle')) instanceof StructModel) {
            $generator->setOptionStructClass('\Std\Opt\StructClass');
            $struct = new StructFile($generator, $model->getName());
            $struct->setModel($model);

            $this->assertSame(sprintf('%s%s%s/', self::getTestDirectory(), StructFile::SRC_FOLDER, $model->getContextualPart()), $struct->getFileDestination());
        } else {
            $this->assertFalse(true, 'Unable to find NewsArticle struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteYandexDirectApiStructCampaignsCompaignGetItem()
    {
        $generator = self::yandexDirectApiCampaignsGeneratorInstance(true);
        $generator->setOptionValidation(false);
        if (($model = $generator->getStruct('CampaignGetItem')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidCampaignGetItem', $struct);
        } else {
            $this->assertFalse(true, 'Unable to find CampaignGetItem struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteYandexDirectApiStructLiveBannerInfo()
    {
        $generator = self::yandexDirectApiLiveGeneratorInstance(true);
        $generator->setOptionValidation(true);
        if (($model = $generator->getStruct('BannerInfo')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidBannerInfo', $struct);
        } else {
            $this->assertFalse(true, 'Unable to find BannerInfo struct for file generation');
        }
    }
}
