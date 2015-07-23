<?php

namespace WsdlToPhp\PackageGenerator\Tests\File;

use WsdlToPhp\PackageGenerator\File\StructEnum as EnumFile;
use WsdlToPhp\PackageGenerator\Model\Struct as StructModel;

class StructEnumTest extends AbstractFile
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetModelGoodNameTooManyAttributesWithException()
    {
        $instance = self::bingGeneratorInstance();
        $enum = new EnumFile($instance, 'Foo', $this->getTestDirectory());
        $enum->setModel(new StructModel($instance, 'FooEnum'));
    }
    /**
     *
     */
    public function testWriteBingSearchEnumAdultOption()
    {
        $file = $this->getTestDirectory();
        $generator = self::bingGeneratorInstance();
        if (($model = $generator->getStruct('AdultOption')) instanceof StructModel) {
            $struct = new EnumFile($generator, $model->getName(), $file);
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiAdultOption', $struct);
        } else {
            $this->assertFalse(true, 'Unable to find AdultOption enumeration for file generation');
        }
    }
    /**
     *
     */
    public function testWriteBingSearchEnumSourceType()
    {
        $file = $this->getTestDirectory();
        $generator = self::bingGeneratorInstance();
        if (($model = $generator->getStruct('SourceType')) instanceof StructModel) {
            $struct = new EnumFile($generator, $model->getName(), $file);
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiSourceType', $struct);
        } else {
            $this->assertFalse(true, 'Unable to find SourceType enumeration for file generation');
        }
    }
    /**
     *
     */
    public function testWriteReformaHouseStageEnum()
    {
        $file = $this->getTestDirectory();
        $generator = self::reformaGeneratorInstance();
        if (($model = $generator->getStruct('HouseStageEnum')) instanceof StructModel) {
            $struct = new EnumFile($generator, $model->getName(), $file);
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiHouseStageEnum', $struct);
        } else {
            $this->assertFalse(true, 'Unable to find HouseStageEnum enumeration for file generation');
        }
    }
    /**
     *
     */
    public function testWriteOmnitureDsWeblogFormats()
    {
        $file = $this->getTestDirectory();
        $generator = self::omnitureGeneratorInstance();
        if (($model = $generator->getStruct('ds_weblog_formats')) instanceof StructModel) {
            $struct = new EnumFile($generator, $model->getName(), $file);
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiDs_weblog_formats', $struct);
        } else {
            $this->assertFalse(true, 'Unable to find ds_weblog_formats enumeration for file generation');
        }
    }
}
