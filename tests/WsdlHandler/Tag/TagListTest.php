<?php

namespace WsdlToPhp\PackageGenerator\Tests\WsdlHandler\Tag;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Tests\Model\WsdlTest;
use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagList;

class TagListTest extends TestCase
{
    public function testGetItemTypeMustReturnIntForExistingItemTypeAttribute()
    {
        $wsdl = WsdlTest::wsdlOdigeoInstance();

        $lists = $wsdl->getContent()->getElementsByName(Wsdl::TAG_LIST);

        $this->assertCount(4, $lists);

        /** @var TagList $list */
        foreach ($lists as $list) {
            $this->assertSame('int', $list->getItemType());
        }
    }

    public function testGetItemTypeMustReturnCorrespondingValueFromRestrictionChildOrItemType()
    {
        $wsdl = WsdlTest::schemaEwsTypesInstance();
        $lists = $wsdl->getContent()->getElementsByName(Wsdl::TAG_LIST);
        $types = [
            'string',
            'string',
            'string',
            'string',
            'string',
            'DayOfWeekType',
            'string',
            'string',
            'string',
            'string',
            'string',
            'string',
            'string',
            'string',
            'string',
        ];
        $itemTypes = [
            '',
            '',
            '',
            '',
            '',
            'DayOfWeekType',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
        ];

        $this->assertCount(15, $lists);

        /** @var TagList $list */
        foreach ($lists as $index => $list) {
            $this->assertSame($itemTypes[$index], $list->getAttributeItemType());
            $this->assertSame($types[$index], $list->getItemType());
        }
    }
}
