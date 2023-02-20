<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File;

use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;
use WsdlToPhp\PackageGenerator\File\Service as ServiceFile;
use WsdlToPhp\PackageGenerator\Model\EmptyModel;
use WsdlToPhp\PackageGenerator\Model\Method as MethodModel;
use WsdlToPhp\PackageGenerator\Model\Service as ServiceModel;

/**
 * @internal
 * @coversDefaultClass
 */
final class ServiceTest extends AbstractFile
{
    public function testSetModelGoodNameTooManyAttributesWithException(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $instance = self::bingGeneratorInstance();
        $service = new ServiceFile($instance, 'Foo');
        $service->setModel(new EmptyModel($instance, 'Foo'));
    }

    public function testWriteActonServiceDeleteService(): void
    {
        $generator = self::actonGeneratorInstance();
        if (($model = $generator->getService('Delete')) instanceof ServiceModel) {
            $service = new ServiceFile($generator, $model->getName());
            $service
                ->setModel($model)
                ->write()
            ;
            $this->assertSameFileContent('ValidApiDelete', $service);
        } else {
            $this->fail('Unable to find Delete service for file generation');
        }
    }

    public function testWriteBingSearchSearchService(): void
    {
        $generator = self::bingGeneratorInstance();
        if (($model = $generator->getService('Search')) instanceof ServiceModel) {
            $service = new ServiceFile($generator, $model->getName());
            $service
                ->setModel($model)
                ->write()
            ;
            $this->assertSameFileContent('ValidApiSearch', $service);
        } else {
            $this->fail('Unable to find Search service for file generation');
        }
    }

    public function testWriteBingSearchSearchServiceMyProjectApiProject(): void
    {
        $generator = self::bingGeneratorInstance();
        if (($model = $generator->getService('Search')) instanceof ServiceModel) {
            $generator
                ->setOptionPrefix('Api')
                ->setOptionSuffix('Project')
                ->setOptionNamespacePrefix('My\Project')
            ;
            $service = new ServiceFile($generator, $model->getName());
            $service
                ->setModel($model)
                ->write()
            ;
            $this->assertSameFileContent('ValidMyProjectApiSearchProject', $service);
        } else {
            $this->fail('Unable to find Search service for file generation');
        }
    }

    public function testWriteBingSearchSearchServiceBingApi(): void
    {
        $generator = self::bingGeneratorInstance();
        if (($model = $generator->getService('Search')) instanceof ServiceModel) {
            $generator
                ->setOptionPrefix('')
                ->setOptionSuffix('BingApi')
            ;
            $service = new ServiceFile($generator, $model->getName());
            $service
                ->setModel($model)
                ->write()
            ;
            $this->assertSameFileContent('ValidApiSearchBingApi', $service);
        } else {
            $this->fail('Unable to find Search service for file generation');
        }
    }

    public function testWritePortalServiceAuthenticate(): void
    {
        $generator = self::portalGeneratorInstance();
        if (($model = $generator->getService('Authenticate')) instanceof ServiceModel) {
            $service = new ServiceFile($generator, $model->getName());
            $service
                ->setModel($model)
                ->write()
            ;
            $this->assertSameFileContent('ValidApiAuthenticate', $service);
        } else {
            $this->fail('Unable to find Authenticate service for file generation');
        }
    }

    public function testWriteReformServiceLogin(): void
    {
        $generator = self::reformaGeneratorInstance();
        if (($model = $generator->getService('Login')) instanceof ServiceModel) {
            $service = new ServiceFile($generator, $model->getName());
            $service
                ->setModel($model)
                ->write()
            ;
            $this->assertSameFileContent('ValidApiLogin', $service);
        } else {
            $this->fail('Unable to find Login service for file generation');
        }
    }

    public function testWriteQueueServiceCreate(): void
    {
        $generator = self::queueGeneratorInstance();
        if (($model = $generator->getService('Create')) instanceof ServiceModel) {
            $service = new ServiceFile($generator, $model->getName());
            $service
                ->setModel($model)
                ->write()
            ;
            $this->assertSameFileContent('ValidApiCreate', $service);
        } else {
            $this->fail('Unable to find Create service for file generation');
        }
    }

    public function testWriteOmnitureServiceSaint(): void
    {
        $generator = self::omnitureGeneratorInstance();
        if (($model = $generator->getService('Saint')) instanceof ServiceModel) {
            $service = new ServiceFile($generator, $model->getName());
            $service
                ->setModel($model)
                ->write()
            ;
            $this->assertSameFileContent('ValidApiSaint', $service);
        } else {
            $this->fail('Unable to find Saint service for file generation');
        }
    }

    public function testWritePayPalServiceDo(): void
    {
        $generator = self::payPalGeneratorInstance(false, GeneratorOptions::VALUE_START);
        if (($model = $generator->getService('Do')) instanceof ServiceModel) {
            $service = new ServiceFile($generator, $model->getName());
            $service
                ->setModel($model)
                ->write()
            ;
            $this->assertSameFileContent('ValidApiDo', $service);
        } else {
            $this->fail('Unable to find Do service for file generation');
        }
    }

    public function testWritePayPalServiceDoWithoutPrefix(): void
    {
        $generator = self::payPalGeneratorInstance();
        $generator->setOptionPrefix('');
        if (($model = $generator->getService('Do')) instanceof ServiceModel) {
            $service = new ServiceFile($generator, $model->getName());
            $service
                ->setModel($model)
                ->write()
            ;
            $this->assertSameFileContent('ValidDoWithoutPrefix', $service);
        } else {
            $this->fail('Unable to find Do service for file generation');
        }
    }

    public function testWriteDocDataPaymentsServiceListWithoutPrefix(): void
    {
        $generator = self::docDataPaymentsGeneratorInstance();
        $generator->setOptionPrefix('');
        if (($model = $generator->getService('List')) instanceof ServiceModel) {
            $service = new ServiceFile($generator, $model->getName());
            $service
                ->setModel($model)
                ->write()
            ;
            $this->assertSameFileContent('ValidListWithoutPrefix', $service);
        } else {
            $this->fail('Unable to find List service for file generation');
        }
    }

    public function testWriteBingService(): void
    {
        $generator = self::bingGeneratorInstance(false, GeneratorOptions::VALUE_NONE);
        if (($model = $generator->getServices()->offsetGet(0)) instanceof ServiceModel) {
            $model->setName(ServiceModel::DEFAULT_SERVICE_CLASS_NAME);
            $service = new ServiceFile($generator, ServiceModel::DEFAULT_SERVICE_CLASS_NAME);
            $service
                ->setModel($model)
                ->write()
            ;
            $this->assertSameFileContent('ValidBingApiService', $service);
        } else {
            $this->fail('Unable to find Service model for file generation');
        }
    }

    public function testWriteOmnitureService(): void
    {
        $generator = self::omnitureGeneratorInstance(false, GeneratorOptions::VALUE_NONE);
        $model = new ServiceModel($generator, ServiceModel::DEFAULT_SERVICE_CLASS_NAME);
        $serviceFile = new ServiceFile($generator, ServiceModel::DEFAULT_SERVICE_CLASS_NAME);
        foreach ($generator->getServices() as $service) {
            foreach ($service->getMethods() as $method) {
                $model->getMethods()->add($method);
            }
        }
        $serviceFile
            ->setModel($model)
            ->write()
        ;
        $this->assertSameFileContent('ValidOmnitureApiService', $serviceFile);
    }

    public function testWritePayPalService(): void
    {
        $generator = self::payPalGeneratorInstance(false, GeneratorOptions::VALUE_NONE);
        $model = new ServiceModel($generator, ServiceModel::DEFAULT_SERVICE_CLASS_NAME);
        $serviceFile = new ServiceFile($generator, ServiceModel::DEFAULT_SERVICE_CLASS_NAME);
        foreach ($generator->getServices() as $service) {
            foreach ($service->getMethods() as $method) {
                $model->getMethods()->add($method);
            }
        }
        $serviceFile
            ->setModel($model)
            ->write()
        ;
        $this->assertSameFileContent('ValidPayPalApiService', $serviceFile);
    }

    public function testWriteActonService(): void
    {
        $generator = self::actonGeneratorInstance(false, GeneratorOptions::VALUE_NONE);
        $model = new ServiceModel($generator, ServiceModel::DEFAULT_SERVICE_CLASS_NAME);
        $serviceFile = new ServiceFile($generator, ServiceModel::DEFAULT_SERVICE_CLASS_NAME);
        foreach ($generator->getServices() as $service) {
            foreach ($service->getMethods() as $method) {
                $model->getMethods()->add($method);
            }
        }
        $serviceFile
            ->setModel($model)
            ->write()
        ;
        $this->assertSameFileContent('ValidActonApiService', $serviceFile);
    }

    public function testWriteYandexDirectApiLiveGetService(): void
    {
        $generator = self::yandexDirectApiLiveGeneratorInstance();
        $generator->setOptionPrefix('');
        if (($model = $generator->getService('Get')) instanceof ServiceModel) {
            $service = new ServiceFile($generator, $model->getName());
            $service
                ->setModel($model)
                ->write()
            ;
            $this->assertSameFileContent('ValidYandexDirectApiLiveGet', $service);
        } else {
            $this->fail('Unable to find Get service for file generation');
        }
    }

    public function testDestination(): void
    {
        $generator = self::bingGeneratorInstance();
        if (($model = $generator->getService('Search')) instanceof ServiceModel) {
            $service = new ServiceFile($generator, $model->getName());
            $service->setModel($model);

            $this->assertSame(sprintf('%s%s%s/', self::getTestDirectory(), $generator->getOptionSrcDirname().DIRECTORY_SEPARATOR, $model->getContextualPart()), $service->getFileDestination());
        } else {
            $this->fail('Unable to find Search service for file generation');
        }
    }

    public function testWriteEwsFindService(): void
    {
        $generator = self::ewsInstance();
        if (($model = $generator->getService('Find')) instanceof ServiceModel) {
            $service = new ServiceFile($generator, $model->getName());
            $service
                ->setModel($model)
                ->write()
            ;
            $this->assertSameFileContent('ValidApiFind', $service);
        } else {
            $this->fail('Unable to find Find service for file generation');
        }
    }

    public function testGetOperationMethodReturnTypeWithNullReturnTypeMustReturnNull(): void
    {
        $generatorInstance = self::bingGeneratorInstance();
        $method = new MethodModel(
            $generatorInstance,
            'test',
            'nullParameter',
            null,
            new ServiceModel($generatorInstance, 'nullService')
        );

        $this->assertSame('null', ServiceFile::getOperationMethodReturnType($method, $generatorInstance));
    }
}
