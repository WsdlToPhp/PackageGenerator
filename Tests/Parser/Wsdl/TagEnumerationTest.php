<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagEnumeration;
use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Container\Model\StructValue as StructValueContainer;
use WsdlToPhp\PackageGenerator\Model\StructValue;

class TagEnumerationTest extends WsdlParser
{
    /**
     * @return TagEnumeration
     */
    public static function bingInstance()
    {
        return new TagEnumeration(self::generatorInstance(self::wsdlBingPath()));
    }
    /**
     * @return TagEnumeration
     */
    public static function reformaInstance()
    {
        return new TagEnumeration(self::generatorInstance(self::wsdlReformaPath()));
    }
    /**
     *
     */
    public function testBing()
    {
        $tagEnumerationParser = self::bingInstance();

        $tagEnumerationParser->parse();

        $count = 0;
        foreach ($tagEnumerationParser->getGenerator()->getStructs() as $struct) {
            if ($struct instanceof Struct && $struct->getIsRestriction() === true) {
                if ($struct->getName() === 'AdultOption') {
                    $values = new StructValueContainer();
                    $values->add(new StructValue('Off', 0, $struct));
                    $values->add(new StructValue('Moderate', 1, $struct));
                    $values->add(new StructValue('Strict', 2, $struct));

                    $this->assertEquals($values, $struct->getValues());
                    $count++;
                } elseif ($struct->getName() === 'SearchOption') {
                    $values = new StructValueContainer();
                    $values->add(new StructValue('DisableLocationDetection', 0, $struct));
                    $values->add(new StructValue('EnableHighlighting', 1, $struct));

                    $this->assertEquals($values, $struct->getValues());
                    $count++;
                }
            }
        }
        $this->assertSame(2, $count);
    }
    /**
     *
     */
    public function testReforma()
    {
        $tagEnumerationParser = self::reformaInstance();

        $tagEnumerationParser->parse();

        $count = 0;
        foreach ($tagEnumerationParser->getGenerator()->getStructs() as $struct) {
            if ($struct instanceof Struct && $struct->getIsRestriction() === true) {
                if ($struct->getName() === 'HouseStateEnum') {
                    $values = new StructValueContainer();
                    $values->add(new StructValue('1', 0, $struct));
                    $values->add(new StructValue('2', 1, $struct));
                    $values->add(new StructValue('3', 2, $struct));
                    $values->add(new StructValue('4', 3, $struct));

                    $this->assertEquals($values, $struct->getValues());
                    $count++;
                } elseif ($struct->getName() === 'HouseStageEnum') {
                    $values = new StructValueContainer();
                    $values->add(new StructValue('1', 0, $struct));
                    $values->add(new StructValue('2', 1, $struct));
                    $values->add(new StructValue('3', 2, $struct));

                    $this->assertEquals($values, $struct->getValues());
                    $count++;
                }
            }
        }
        $this->assertSame(2, $count);
    }
}
