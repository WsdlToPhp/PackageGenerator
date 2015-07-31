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
        $file = new StructFile(self::bingGeneratorInstance(), 'foo', __DIR__ . '/../rsources/');

        $file->write();
    }
    /**
     *
     */
    public function testGetFileName()
    {
        $model = new StructModel(self::bingGeneratorInstance(), 'Foo');
        $file = new StructFile(self::bingGeneratorInstance(), 'foo', __DIR__ . '/../resources/');
        $file->setModel($model);

        $this->assertSame(realpath(__DIR__ . '/../resources') . '/ApiFoo.php', $file->getFileName());
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
}
