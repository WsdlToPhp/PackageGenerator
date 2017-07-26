<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagList;
use WsdlToPhp\PackageGenerator\Model\StructAttribute;

class TagListTest extends WsdlParser
{
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagList
     */
    public static function odigeoInstanceParser()
    {
        return new TagList(self::generatorInstance(self::wsdlOdigeoPath()));
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagList
     */
    public static function myBaordInstanceParser()
    {
        return new TagList(self::generatorInstance(self::wsdlMyBoardPackPath()));
    }
    /**
     *
     */
    public function testParseOdigeo()
    {
        $tagListParser = self::odigeoInstanceParser();

        $tagListParser->parse();

        $count = 0;
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
                                    $this->assertSame('int', $attribute->getInheritance());
                                    $count++;
                                    break;
                            }
                        }
                        break;
                    case 'segment':
                        if ($struct->getAttribute('sectionIds') instanceof StructAttribute) {
                            $this->assertSame('int', $struct->getAttribute('sectionIds')->getInheritance());
                            $count++;
                        }
                        break;
                }
            }
        }
        $this->assertSame(4, $count);
    }
    /**
     *
     */
    public function testParseMyBoard()
    {
        $tagListParser = self::myBaordInstanceParser();

        $tagListParser->parse();

        $count = 0;
        $structs = $tagListParser->getGenerator()->getStructs();
        if ($structs->count() > 0) {
            foreach ($structs as $struct) {
                switch ($struct->getName()) {
                    case 'Rights':
                        $this->assertSame('string[]', $struct->getInheritance());
                        $count++;
                        break;
                }
            }
        }
        $this->assertSame(1, $count);
    }
}
