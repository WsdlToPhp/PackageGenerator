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
        $struct = new StructFile(self::bingGeneratorInstance(), 'Foo', $this->getTestDirectory());
        $struct->setModel(new EmptyModel('Foo'));
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionOnDestination()
    {
        $file = new StructFile(self::bingGeneratorInstance(), 'foo', __DIR__ . '/../rsources/');
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionOnWrite()
    {
        $file = new StructFile(self::bingGeneratorInstance(), 'foo', __DIR__ . '/../rsources/');

        $file->write();
    }
    /**
     *
     */
    public function testDestination()
    {
        $file = new StructFile(self::bingGeneratorInstance(), 'foo', __DIR__ . '/../resources/');

        $this->assertSame(realpath(__DIR__ . '/../resources'), $file->getDestination());
    }
    /**
     *
     */
    public function testGetFileName()
    {
        $model = new StructModel('Foo');
        $file = new StructFile(self::bingGeneratorInstance(), 'foo', __DIR__ . '/../resources/');
        $file->setModel($model);

        $this->assertSame(realpath(__DIR__ . '/../resources') . '/ApiStructFoo.php', $file->getFileName());
    }
    /**
     *
     */
    public function testWriteBingSearchStructQuery()
    {
        $generator = self::bingGeneratorInstance();
        if (($model = $generator->getStruct('Query')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName(), $this->getTestDirectory());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiStructQuery', $struct);
        } else {
            $this->assertFalse(true, 'Unable to find Query struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteBingSearchStructQueryWithoutWsdlClass()
    {
        $generator = self::bingGeneratorInstance();
        if (($model = $generator->getStruct('Query')) instanceof StructModel) {
            $struct = new StructFile($generator, $model->getName(), $this->getTestDirectory());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiStructQueryWithoutWsdlClass', $struct);
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
            $struct = new StructFile($generator, $model->getName(), $this->getTestDirectory());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiStructVideoRequest', $struct);
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
            $struct = new StructFile($generator, $model->getName(), $this->getTestDirectory());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiStructSearchRequest', $struct);
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
            $struct = new StructFile($generator, $model->getName(), $this->getTestDirectory());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiStructItem', $struct);
        } else {
            $this->assertFalse(true, 'Unable to find Item struct for file generation');
        }
    }
}
