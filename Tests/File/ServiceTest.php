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
    public function testWriteActonServiceMethodDelete()
    {
        $generator = self::actonGeneratorInstance();
        if (($model = $generator->getService('Delete')) instanceof ServiceModel) {
            $service = new ServiceFile($generator, $model->getName(), $this->getTestDirectory());
            $service
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiServiceDelete', $service);
        } else {
            $this->assertFalse(true, 'Unable to find Delete service for file generation');
        }
    }
}
