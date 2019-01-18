<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagChoice;

class TagChoiceTest extends WsdlParser
{
    /**
     * @return TagChoice
     */
    public static function whlInstanceParser()
    {
        return new TagChoice(self::generatorInstance(self::wsdlWhlPath()));
    }

    /**
     * @return TagChoice
     */
    public static function ewsInstanceParser()
    {
        return new TagChoice(self::generatorInstance(self::wsdlEwsPath()));
    }

    /**
     *
     */
    public function testParseWhlMustAssignMetaOfChoice()
    {
        $tagChoiceParser = self::whlInstanceParser();

        $tagChoiceParser->parse();

        $count = 0;
        $structs = $tagChoiceParser->getGenerator()->getStructs();
        if ($structs->count() > 0) {
            /** @var Struct $struct */
            foreach ($structs as $struct) {
                switch ($struct->getName()) {
                    case 'PaymentFormType':
                        $this->assertSame(1, $struct->getAttribute('PaymentCard')->getMetaValue('choiceMaxOccurs'));
                        $this->assertSame(0, $struct->getAttribute('PaymentCard')->getMetaValue('choiceMinOccurs'));
                        $this->assertSame([
                            'PaymentCard',
                            'BankAcct',
                            'DirectBill',
                            'Cash',
                        ], $struct->getAttribute('PaymentCard')->getMetaValue('choiceNames'));
                        $count++;
                        break;
                    case 'MessageAcknowledgementType':
                        $this->assertSame(1, $struct->getAttribute('Errors')->getMetaValue('choiceMaxOccurs'));
                        $this->assertSame(1, $struct->getAttribute('Errors')->getMetaValue('choiceMinOccurs'));
                        $this->assertSame([
                            'Success',
                            'Warnings',
                            'Errors',
                        ], $struct->getAttribute('Errors')->getMetaValue('choiceNames'));
                        $count++;
                        break;
                }
            }
        }
        $this->assertSame(2, $count);
    }

    /**
     *
     */
    public function testParseEws()
    {
        $tagChoiceParser = self::ewsInstanceParser();

        $tagChoiceParser->parse();

        $count = 0;
        $structs = $tagChoiceParser->getGenerator()->getStructs();
        if ($structs->count() > 0) {
            /** @var Struct $struct */
            foreach ($structs as $struct) {
                switch ($struct->getName()) {
                    case 'FindFolderType':
                        $this->assertSame(1, $struct->getAttribute('IndexedPageFolderView')->getMetaValue('choiceMaxOccurs'));
                        $this->assertSame(0, $struct->getAttribute('IndexedPageFolderView')->getMetaValue('choiceMinOccurs'));
                        $this->assertSame([
                            'IndexedPageFolderView',
                            'FractionalPageFolderView',
                        ], $struct->getAttribute('IndexedPageFolderView')->getMetaValue('choiceNames'));
                        $count++;
                        break;
                    case 'FindItemType':
                        $this->assertSame(1, $struct->getAttribute('SeekToConditionPageItemView')->getMetaValue('choiceMaxOccurs'));
                        $this->assertSame(0, $struct->getAttribute('SeekToConditionPageItemView')->getMetaValue('choiceMinOccurs'));
                        $this->assertSame([
                            'IndexedPageItemView',
                            'FractionalPageItemView',
                            'SeekToConditionPageItemView',
                            'CalendarView',
                            'ContactsView',
                        ], $struct->getAttribute('SeekToConditionPageItemView')->getMetaValue('choiceNames'));
                        $count++;
                        break;
                }
            }
        }
        $this->assertSame(2, $count);
    }
}
