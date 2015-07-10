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
        $struct = new ServiceFile(self::bingGeneratorInstance(), 'Foo', $this->getTestDirectory());
        $struct->setModel(new EmptyModel('Foo'));
    }
    /**
     *
     */
    public function testWriteActonServiceDeleteService()
    {
        $generator = self::actonGeneratorInstance();
        if (($model = $generator->getService('Delete')) instanceof ServiceModel) {
            $service = new ServiceFile($generator, $model->getName(), $this->getTestDirectory());
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
            $service = new ServiceFile($generator, $model->getName(), $this->getTestDirectory());
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
            $service = new ServiceFile($generator, $model->getName(), $this->getTestDirectory());
            $service
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiAuthenticate', $service);
        } else {
            $this->assertFalse(true, 'Unable to find Authenticate service for file generation');
        }
    }
}
