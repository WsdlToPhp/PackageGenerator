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
        $enum = new EnumFile($instance, 'Foo');
        $enum->setModel(new StructModel($instance, 'FooEnum'));
    }
    /**
     *
     */
    public function testWriteBingSearchEnumAdultOption()
    {
        $generator = self::bingGeneratorInstance();
        if (($model = $generator->getStruct('AdultOption')) instanceof StructModel) {
            $struct = new EnumFile($generator, $model->getName());
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
        $generator = self::bingGeneratorInstance();
        if (($model = $generator->getStruct('SourceType')) instanceof StructModel) {
            $struct = new EnumFile($generator, $model->getName());
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
        $generator = self::reformaGeneratorInstance();
        if (($model = $generator->getStruct('HouseStageEnum')) instanceof StructModel) {
            $struct = new EnumFile($generator, $model->getName());
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
        $generator = self::omnitureGeneratorInstance();
        if (($model = $generator->getStruct('ds_weblog_formats')) instanceof StructModel) {
            $struct = new EnumFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiDs_weblog_formats', $struct);
        } else {
            $this->assertFalse(true, 'Unable to find ds_weblog_formats enumeration for file generation');
        }
    }
    /**
     *
     */
    public function testWriteBingSearchEnumWebSearchOption()
    {
        $generator = self::bingGeneratorInstance();
        if (($model = $generator->getStruct('WebSearchOption')) instanceof StructModel) {
            $generator->setOptionGenericConstantsNames(true);
            $struct = new EnumFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiWebSearchOption', $struct);
        } else {
            $this->assertFalse(true, 'Unable to find WebSearchOption enumeration for file generation');
        }
    }
}
