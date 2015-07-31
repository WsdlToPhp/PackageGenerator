<?php

namespace WsdlToPhp\PackageGenerator\Tests\File;

use WsdlToPhp\PackageGenerator\Model\EmptyModel;
use WsdlToPhp\PackageGenerator\Model\Service as ServiceModel;
use WsdlToPhp\PackageGenerator\File\Service as ServiceFile;

class ServiceTest extends AbstractFile
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetModelGoodNameTooManyAttributesWithException()
    {
        $instance = self::bingGeneratorInstance();
        $struct = new ServiceFile($instance, 'Foo');
        $struct->setModel(new EmptyModel($instance, 'Foo'));
    }
    /**
     *
     */
    public function testWriteActonServiceDeleteService()
    {
        $generator = self::actonGeneratorInstance();
        if (($model = $generator->getService('Delete')) instanceof ServiceModel) {
            $service = new ServiceFile($generator, $model->getName());
            $service
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiDelete', $service);
        } else {
            $this->assertFalse(true, 'Unable to find Delete service for file generation');
        }
    }
    /**
     *
     */
    public function testWriteBingSearchSearchService()
    {
        $generator = self::bingGeneratorInstance();
        if (($model = $generator->getService('Search')) instanceof ServiceModel) {
            $service = new ServiceFile($generator, $model->getName());
            $service
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiSearch', $service);
        } else {
            $this->assertFalse(true, 'Unable to find Search service for file generation');
        }
    }
    /**
     *
     */
    public function testWritePortalServiceAuthenticate()
    {
        $generator = self::portalGeneratorInstance();
        if (($model = $generator->getService('Authenticate')) instanceof ServiceModel) {
            $service = new ServiceFile($generator, $model->getName());
            $service
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiAuthenticate', $service);
        } else {
            $this->assertFalse(true, 'Unable to find Authenticate service for file generation');
        }
    }
    /**
     *
     */
    public function testWriteReformServiceLogin()
    {
        $generator = self::reformaGeneratorInstance();
        if (($model = $generator->getService('Login')) instanceof ServiceModel) {
            $service = new ServiceFile($generator, $model->getName());
            $service
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiLogin', $service);
        } else {
            $this->assertFalse(true, 'Unable to find Login service for file generation');
        }
    }
    /**
     *
     */
    public function testWriteQueueServiceCreate()
    {
        $generator = self::queueGeneratorInstance();
        if (($model = $generator->getService('Create')) instanceof ServiceModel) {
            $service = new ServiceFile($generator, $model->getName());
            $service
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiCreate', $service);
        } else {
            $this->assertFalse(true, 'Unable to find Create service for file generation');
        }
    }
    /**
     *
     */
    public function testWriteOmnitureServiceSaint()
    {
        $generator = self::omnitureGeneratorInstance();
        if (($model = $generator->getService('Saint')) instanceof ServiceModel) {
            $service = new ServiceFile($generator, $model->getName());
            $service
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiSaint', $service);
        } else {
            $this->assertFalse(true, 'Unable to find Saint service for file generation');
        }
    }
    /**
     *
     */
    public function testWritePayPalServiceDo()
    {
        $generator = self::payPalGeneratorInstance();
        if (($model = $generator->getService('Do')) instanceof ServiceModel) {
            $service = new ServiceFile($generator, $model->getName());
            $service
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiDo', $service);
        } else {
            $this->assertFalse(true, 'Unable to find Do service for file generation');
        }
    }
}
