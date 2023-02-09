<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Model\StructAttribute;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagList;

/**
 * @internal
 * @coversDefaultClass
 */
final class TagListTest extends WsdlParser
{
    public static function odigeoInstanceParser(): TagList
    {
        return new TagList(self::generatorInstance(self::wsdlOdigeoPath()));
    }

    public static function myBaordInstanceParser(): TagList
    {
        return new TagList(self::generatorInstance(self::wsdlMyBoardPackPath()));
    }

    public static function ewsInstanceParser(): TagList
    {
        return new TagList(self::generatorInstance(self::wsdlEwsPath()));
    }

    public function testParseOdigeo(): void
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
                                    ++$count;

                                    break;
                            }
                        }

                        break;

                    case 'segment':
                        if ($struct->getAttribute('sectionIds') instanceof StructAttribute) {
                            $this->assertSame('int', $struct->getAttribute('sectionIds')->getInheritance());
                            ++$count;
                        }

                        break;
                }
            }
        }
        $this->assertSame(4, $count);
    }

    public function testParseMyBoard(): void
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
                        ++$count;

                        break;
                }
            }
        }
        $this->assertSame(1, $count);
    }

    public function testParseEwsMustSetlistProperty(): void
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
