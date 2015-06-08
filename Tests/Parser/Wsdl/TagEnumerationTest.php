<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagEnumeration;
use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Container\Model\StructValue as StructValueContainer;
use WsdlToPhp\PackageGenerator\Model\StructValue;

class TagEnumerationTest extends WsdlParser
{
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagEnumeration
     */
    public static function bingInstance()
    {
        return new TagEnumeration(self::generatorInstance(self::wsdlBingPath()));
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagEnumeration
     */
    public static function partnerInstance()
    {
        return new TagEnumeration(self::generatorInstance(self::wsdlPartnerPath()));
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagEnumeration
     */
    public static function imageViewInstance()
    {
        return new TagEnumeration(self::generatorInstance(self::wsdlImageViewServicePath()));
    }
    /**
     *
     */
    public function testBing()
    {
        $tagEnumerationParser = self::bingInstance();

        $tagEnumerationParser->parse();

        $ok = false;
        foreach ($tagEnumerationParser->getGenerator()->getStructs() as $struct) {
            if ($struct instanceof Struct && $struct->getIsRestriction() === true) {
                if ($struct->getName() === 'AdultOption') {
                    $values = new StructValueContainer();
                    $values->add(new StructValue('Off', 0, $struct));
                    $values->add(new StructValue('Moderate', 1, $struct));
                    $values->add(new StructValue('Strict', 2, $struct));

                    $this->assertEquals($values, $struct->getValues());
                    $ok = true;
                } elseif ($struct->getName() === 'SearchOption') {
                    $values = new StructValueContainer();
                    $values->add(new StructValue('DisableLocationDetection', 0, $struct));
                    $values->add(new StructValue('EnableHighlighting', 1, $struct));

                    $this->assertEquals($values, $struct->getValues());
                    $ok = true;
                }
            }
        }
        $this->assertTrue((bool)$ok);
    }
}
