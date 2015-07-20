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
        $enum = new EnumFile(self::bingGeneratorInstance(), 'Foo', $this->getTestDirectory());
        $enum->setModel(new StructModel('FooEnum'));
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
    public function testWriteReformHouseStageEnum()
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
}
