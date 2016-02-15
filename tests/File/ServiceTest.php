<?php

namespace WsdlToPhp\PackageGenerator\Tests\File;

use WsdlToPhp\PackageGenerator\Model\EmptyModel;
use WsdlToPhp\PackageGenerator\Model\Service as ServiceModel;
use WsdlToPhp\PackageGenerator\File\Service as ServiceFile;
use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;

class ServiceTest extends AbstractFile
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetModelGoodNameTooManyAttributesWithException()
    {
        $instance = self::bingGeneratorInstance();
        $service = new ServiceFile($instance, 'Foo');
        $service->setModel(new EmptyModel($instance, 'Foo'));
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
    public function testWriteBingSearchSearchServiceMyProjectApiProject()
    {
        $generator = self::bingGeneratorInstance();
        if (($model = $generator->getService('Search')) instanceof ServiceModel) {
            $generator
                ->setOptionPrefix('Api')
                ->setOptionSuffix('Project')
                ->setOptionNamespacePrefix('My\Project');
            $service = new ServiceFile($generator, $model->getName());
            $service
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidMyProjectApiSearchProject', $service);
        } else {
            $this->assertFalse(true, 'Unable to find Search service for file generation');
        }
    }
    /**
     *
     */
    public function testWriteBingSearchSearchServiceBingApi()
    {
        $generator = self::bingGeneratorInstance();
        if (($model = $generator->getService('Search')) instanceof ServiceModel) {
            $generator
                ->setOptionPrefix('')
                ->setOptionSuffix('BingApi');
            $service = new ServiceFile($generator, $model->getName());
            $service
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiSearchBingApi', $service);
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
    /**
     *
     */
    public function testWritePayPalServiceDoWithoutPrefix()
    {
        $generator = self::payPalGeneratorInstance();
        $generator->setOptionPrefix('');
        if (($model = $generator->getService('Do')) instanceof ServiceModel) {
            $service = new ServiceFile($generator, $model->getName());
            $service
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidDoWithoutPrefix', $service);
        } else {
            $this->assertFalse(true, 'Unable to find Search service for file generation');
        }
    }
    /**
     *
     */
    public function testWriteBingService()
    {
        $generator = self::bingGeneratorInstance(true, GeneratorOptions::VALUE_NONE);
        if (($model = $generator->getServices()->offsetGet(0)) instanceof ServiceModel) {
            $service = new ServiceFile($generator, $model->getName());
            $service
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidBingApiService', $service);
        } else {
            $this->assertFalse(true, 'Unable to find Service model for file generation');
        }
    }
    /**
     *
     */
    public function testWriteOmnitureService()
    {
        $generator = self::omnitureGeneratorInstance(true, GeneratorOptions::VALUE_NONE);
        if (($model = $generator->getServices()->offsetGet(0)) instanceof ServiceModel) {
            $generator->setOptionGatherMethods(GeneratorOptions::VALUE_NONE);
            $service = new ServiceFile($generator, $model->getName());
            $service
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidOmnitureApiService', $service);
        } else {
            $this->assertFalse(true, 'Unable to find Service model for file generation');
        }
    }
    /**
     *
     */
    public function testWritePayPalService()
    {
        $generator = self::payPalGeneratorInstance(true, GeneratorOptions::VALUE_NONE);
        if (($model = $generator->getServices()->offsetGet(0)) instanceof ServiceModel) {
            $generator->setOptionGatherMethods(GeneratorOptions::VALUE_NONE);
            $service = new ServiceFile($generator, $model->getName());
            $service
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidPayPalApiService', $service);
        } else {
            $this->assertFalse(true, 'Unable to find Service model for file generation');
        }
    }
    /**
     *
     */
    public function testWriteActonService()
    {
        $generator = self::actonGeneratorInstance(true, GeneratorOptions::VALUE_NONE);
        if (($model = $generator->getServices()->offsetGet(0)) instanceof ServiceModel) {
            $generator->setOptionGatherMethods(GeneratorOptions::VALUE_NONE);
            $service = new ServiceFile($generator, $model->getName());
            $service
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidActonApiService', $service);
        } else {
            $this->assertFalse(true, 'Unable to find Service model for file generation');
        }
    }
    /**
     *
     */
    public function testDestination()
    {
        $generator = self::bingGeneratorInstance();
        if (($model = $generator->getService('Search')) instanceof ServiceModel) {
            $service = new ServiceFile($generator, $model->getName());
            $service->setModel($model);

            $this->assertSame(sprintf('%s%s%s/', self::getTestDirectory(), ServiceFile::SRC_FOLDER, $model->getContextualPart()), $service->getFileDestination());
        } else {
            $this->assertFalse(true, 'Unable to find Search service for file generation');
        }
    }
}
