<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Model\Struct;
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
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagList
     */
    public static function ewsInstanceParser()
    {
        return new TagList(self::generatorInstance(self::wsdlEwsPath()));
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
            /** @var Struct $struct */
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

    public function testParseEwsMustSetlistProperty()
    {
        $tagListParser = self::ewsInstanceParser();

        // default value must be empty
        $daysOfWeekType = $tagListParser->getGenerator()->getStructByName('DaysOfWeekType');
        if ($daysOfWeekType) {
            $this->assertSame('', $daysOfWeekType->getList());
        } else {
            $this->fail('Struct DaysOfWeekType not found, can\'t test list property');
        }

        $mailTipTypes = $tagListParser->getGenerator()->getStructByName('MailTipTypes');
        if ($mailTipTypes) {
            $this->assertSame('', $mailTipTypes->getList());
        } else {
            $this->fail('Struct MailTipTypes not found, can\'t test list property');
        }

        $tagListParser->parse();

        // parser must have set the list property
        $daysOfWeekType = $tagListParser->getGenerator()->getStructByName('DaysOfWeekType');
        if ($daysOfWeekType) {
            $this->assertSame('DayOfWeekType', $daysOfWeekType->getList());
        } else {
            $this->fail('Struct DaysOfWeekType not found, can\'t test list property');
        }

        $mailTipTypes = $tagListParser->getGenerator()->getStructByName('MailTipTypes');
        if ($mailTipTypes) {
            $this->assertSame('string', $mailTipTypes->getList());
        } else {
            $this->fail('Struct MailTipTypes not found, can\'t test list property');
        }
    }
}
