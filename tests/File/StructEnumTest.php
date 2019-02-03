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
        if (($model = $generator->getStructByName('AdultOption')) instanceof StructModel) {
            $struct = new EnumFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiAdultOption', $struct);
        } else {
            $this->fail('Unable to find AdultOption enumeration for file generation');
        }
    }
    /**
     *
     */
    public function testWriteBingSearchEnumSourceType()
    {
        $generator = self::bingGeneratorInstance();
        if (($model = $generator->getStructByName('SourceType')) instanceof StructModel) {
            $struct = new EnumFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiSourceType', $struct);
        } else {
            $this->fail('Unable to find SourceType enumeration for file generation');
        }
    }
    /**
     *
     */
    public function testWriteReformaHouseStageEnum()
    {
        $generator = self::reformaGeneratorInstance();
        if (($model = $generator->getStructByName('HouseStageEnum')) instanceof StructModel) {
            $struct = new EnumFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiHouseStageEnum', $struct);
        } else {
            $this->fail('Unable to find HouseStageEnum enumeration for file generation');
        }
    }
    /**
     *
     */
    public function testWriteOmnitureDsWeblogFormats()
    {
        $generator = self::omnitureGeneratorInstance();
        if (($model = $generator->getStructByName('ds_weblog_formats')) instanceof StructModel) {
            $struct = new EnumFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiDs_weblog_formats', $struct);
        } else {
            $this->fail('Unable to find ds_weblog_formats enumeration for file generation');
        }
    }
    /**
     *
     */
    public function testWriteBingSearchEnumWebSearchOption()
    {
        $generator = self::bingGeneratorInstance(true);
        if (($model = $generator->getStructByName('WebSearchOption')) instanceof StructModel) {
            $generator->setOptionGenericConstantsNames(true);
            $struct = new EnumFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiWebSearchOption', $struct);
        } else {
            $this->fail('Unable to find WebSearchOption enumeration for file generation');
        }
    }
    /**
     *
     */
    public function testWriteBingSearchEnumPhonebookSortOption()
    {
        $generator = self::bingGeneratorInstance(true);
        if (($model = $generator->getStructByName('PhonebookSortOption')) instanceof StructModel) {
            $generator
                ->setOptionNamespacePrefix('Std\Opt');
            $struct = new EnumFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiPhonebookSortOption', $struct);
        } else {
            $this->fail('Unable to find PhonebookSortOption enumeration for file generation');
        }
    }
    /**
     *
     */
    public function testWriteBingSearchEnumPhonebookSortOptionSuffixed()
    {
        $generator = self::bingGeneratorInstance(true);
        if (($model = $generator->getStructByName('PhonebookSortOption')) instanceof StructModel) {
            $generator
                ->setOptionPrefix('')
                ->setOptionSuffix('Api');
            $struct = new EnumFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiPhonebookSortOptionApi', $struct);
        } else {
            $this->fail('Unable to find PhonebookSortOption enumeration for file generation');
        }
    }
    /**
     *
     */
    public function testDestination()
    {
        $generator = self::bingGeneratorInstance(true);
        if (($model = $generator->getStructByName('PhonebookSortOption')) instanceof StructModel) {
            $generator
                ->setOptionPrefix('')
                ->setOptionSuffix('Api');
            $struct = new EnumFile($generator, $model->getName());
            $struct->setModel($model);

            $this->assertSame(sprintf('%s%s%s/', self::getTestDirectory(), $generator->getOptionSrcDirname() . DIRECTORY_SEPARATOR, $model->getContextualPart()), $struct->getFileDestination());
        } else {
            $this->fail('Unable to find PhonebookSortOption enumeration for file generation');
        }
    }
    /**
     *
     */
    public function testWriteWhlEnumTransactionActionType()
    {
        $generator = self::whlInstance();
        if (($model = $generator->getStructByName('TransactionActionType')) instanceof StructModel) {
            $struct = new EnumFile($generator, $model->getName());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiTransactionActionType', $struct);
        } else {
            $this->fail('Unable to find TransactionActionType enumeration for file generation');
        }
    }
}
