<?php

namespace WsdlToPhp\PackageGenerator\Tests\File;

use WsdlToPhp\PackageGenerator\File\StructEnum as EnumFile;
use WsdlToPhp\PackageGenerator\Model\Struct as StructModel;

class StructEnumTest extends AbstractFile
{
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
            $this->assertSameFileContent('ValidApiEnumAdultOption', $struct);
        } else {
            $this->assertFalse(true, 'Unable to find AdultOption enumeration for file generation');
        }
    }
}
