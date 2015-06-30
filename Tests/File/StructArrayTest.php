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
        $struct = new StructModel('FooArray');
        $struct
            ->addAttribute('bar', 'string')
            ->addAttribute('foo', 'int');
        $array = new ArrayFile(self::bingGeneratorInstance(), 'Foo', $this->getTestDirectory());
        $array->setModel($struct);
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetModelBasNameOneAttributeWithException()
    {
        $struct = new StructModel('Foo');
        $struct->addAttribute('bar', 'string');
        $array = new ArrayFile(self::bingGeneratorInstance(), 'Foo', $this->getTestDirectory());
        $array->setModel($struct);
    }
    /**
     *
     */
    public function testWriteBingSearchArrayOfNewsRelatedSearch()
    {
        $generator = self::bingGeneratorInstance();
        $generator->setOptionGenerateWsdlClassFile(true);
        if (($model = $generator->getStruct('ArrayOfNewsRelatedSearch')) instanceof StructModel) {
            $struct = new ArrayFile($generator, $model->getName(), $this->getTestDirectory());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiStructArrayOfNewsRelatedSearch', $struct);
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
        $generator->setOptionGenerateWsdlClassFile(true);
        if (($model = $generator->getStruct('ArrayOfWebSearchOption')) instanceof StructModel) {
            $struct = new ArrayFile($generator, $model->getName(), $this->getTestDirectory());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiStructArrayOfWebSearchOption', $struct);
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
        $generator->setOptionGenerateWsdlClassFile(true);
        if (($model = $generator->getStruct('ArrayOfString')) instanceof StructModel) {
            $struct = new ArrayFile($generator, $model->getName(), $this->getTestDirectory());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiStructArrayOfString', $struct);
        } else {
            $this->assertFalse(true, 'Unable to find ArrayOfString struct for file generation');
        }
    }
}
