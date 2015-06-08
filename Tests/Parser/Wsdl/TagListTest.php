<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagList;
use WsdlToPhp\PackageGenerator\Model\StructAttribute;

class TagListTest extends WsdlParser
{
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagList
     */
    public static function odigeoInstance()
    {
        return new TagList(self::generatorInstance(self::wsdlOdigeoPath()));
    }
    /**
     *
     */
    public function testParseOdigeo()
    {
        $tagListParser = self::odigeoInstance();

        $tagListParser->parse();

        $ok = false;
        $structs = $tagListParser->getGenerator()->getStructs();
        if ($structs->count() > 0) {
            foreach ($structs as $struct) {
                switch ($struct->getName()) {
                    case 'fareItinerary':
                        foreach ($struct->getAttributes() as $attribute) {
                            switch ($attribute->getName()) {
                                case 'firstSegmentsIds':
                                case 'secondSegmentsIds':
                                case 'thirdSegmentsIds':
                                    $this->assertSame('array[int]', $attribute->getInheritance());
                                    $ok = true;
                                    break;
                            }
                        }
                        break;
                    case 'segment':
                        if ($struct->getAttribute('sectionIds') instanceof StructAttribute) {
                            $this->assertSame('array[int]', $struct->getAttribute('sectionIds')->getInheritance());
                        }
                        break;
                }
            }
        }
        $this->assertTrue((bool)$ok);
    }
}
