<?php

namespace WsdlToPhp\PackageGenerator\Tests\File;

use WsdlToPhp\PackageGenerator\File\StructArray as ArrayFile;
use WsdlToPhp\PackageGenerator\Model\Struct as StructModel;

class StructArrayTest extends AbstractFile
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetModelGoodNameTooManyAttributesWithException()
    {
        $struct = new StructModel(self::bingGeneratorInstance(), 'FooArray');
        $struct
            ->addAttribute('bar', 'string')
            ->addAttribute('foo', 'int');
        $array = new ArrayFile(self::bingGeneratorInstance(), 'Foo', self::getTestDirectory());
        $array->setModel($struct);
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetModelBasNameOneAttributeWithException()
    {
        $struct = new StructModel(self::bingGeneratorInstance(), 'Foo');
        $struct->addAttribute('bar', 'string');
        $array = new ArrayFile(self::bingGeneratorInstance(), 'Foo', self::getTestDirectory());
        $array->setModel($struct);
    }
    /**
     *
     */
    public function testWriteBingSearchArrayOfNewsRelatedSearch()
    {
        $generator = self::bingGeneratorInstance();
        if (($model = $generator->getStruct('ArrayOfNewsRelatedSearch')) instanceof StructModel) {
            $struct = new ArrayFile($generator, $model->getName(), self::getTestDirectory());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiArrayOfNewsRelatedSearch', $struct);
        } else {
            $this->assertFalse(true, 'Unable to find ArrayOfNewsRelatedSearch struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteBingSearchArrayOfWebSearchOption()
    {
        $generator = self::bingGeneratorInstance();
        if (($model = $generator->getStruct('ArrayOfWebSearchOption')) instanceof StructModel) {
            $struct = new ArrayFile($generator, $model->getName(), self::getTestDirectory());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiArrayOfWebSearchOption', $struct);
        } else {
            $this->assertFalse(true, 'Unable to find ArrayOfWebSearchOption struct for file generation');
        }
    }
    /**
     *
     */
    public function testWriteBingSearchArrayOfString()
    {
        $generator = self::bingGeneratorInstance();
        if (($model = $generator->getStruct('ArrayOfString')) instanceof StructModel) {
            $struct = new ArrayFile($generator, $model->getName(), self::getTestDirectory());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiArrayOfString', $struct);
        } else {
            $this->assertFalse(true, 'Unable to find ArrayOfString struct for file generation');
        }
    }
}
