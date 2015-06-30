<?php

namespace WsdlToPhp\PackageGenerator\Tests\File;

use WsdlToPhp\PackageGenerator\File\StructArray as ArrayFile;

class StructArrayTest extends AbstractFile
{
    /**
     *
     */
    public function testWriteBingSearchArrayOfNewsRelatedSearch()
    {
        $generator = self::bingGeneratorInstance();
        $generator->setOptionGenerateWsdlClassFile(true);
        if ($model = $generator->getStruct('ArrayOfNewsRelatedSearch')) {
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
        if ($model = $generator->getStruct('ArrayOfWebSearchOption')) {
            $struct = new ArrayFile($generator, $model->getName(), $this->getTestDirectory());
            $struct
                ->setModel($model)
                ->write();
            $this->assertSameFileContent('ValidApiStructArrayOfWebSearchOption', $struct);
        } else {
            $this->assertFalse(true, 'Unable to find ArrayOfWebSearchOption struct for file generation');
        }
    }
}
