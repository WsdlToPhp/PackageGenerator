<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagElement;

/**
 * @internal
 * @coversDefaultClass
 */
final class TagElementTest extends WsdlParser
{
    public static function bingInstanceParser(): TagElement
    {
        return new TagElement(self::generatorInstance(self::wsdlBingPath()));
    }

    public static function yandexAdGroupsInstanceParser(): TagElement
    {
        return new TagElement(self::generatorInstance(self::wsdlYandexDirectApiAdGroupsPath()));
    }

    public static function actonInstanceParser(): TagElement
    {
        return new TagElement(self::generatorInstance(self::wsdlActonPath()));
    }

    public static function payPalInstanceParser(): TagElement
    {
        return new TagElement(self::generatorInstance(self::wsdlPayPalPath()));
    }

    public function testParseBing(): void
    {
        $tagElementParser = self::bingInstanceParser();
        $tagElementParser->parse();
        $count = 0;
        $structs = $tagElementParser->getGenerator()->getStructs();
        if ($structs->count() > 0) {
            if ($structs->getStructByName('SearchRequest') instanceof Struct) {
                $this->assertSame([
                    'default' => '2.2',
                    'maxOccurs' => '1',
                    'minOccurs' => '0',
                ], $structs->getStructByName('SearchRequest')->getAttribute('Version')->getMeta());
                $this->assertSame('string', $structs->getStructByName('SearchRequest')->getAttribute('Version')->getType());
                $this->assertFalse($structs->getStructByName('SearchRequest')->getAttribute('Version')->getContainsElements());
                $this->assertFalse($structs->getStructByName('SearchRequest')->getAttribute('Version')->getRemovableFromRequest());
                ++$count;
            }
            if ($structs->getStructByName('ArrayOfNewsRelatedSearch') instanceof Struct) {
                $this->assertSame([
                    'maxOccurs' => 'unbounded',
                    'minOccurs' => '0',
                ], $structs->getStructByName('ArrayOfNewsRelatedSearch')->getAttribute('NewsRelatedSearch')->getMeta());
                $this->assertSame('NewsRelatedSearch', $structs->getStructByName('ArrayOfNewsRelatedSearch')->getAttribute('NewsRelatedSearch')->getType());
                $this->assertTrue($structs->getStructByName('ArrayOfNewsRelatedSearch')->getAttribute('NewsRelatedSearch')->getContainsElements());
                $this->assertFalse($structs->getStructByName('ArrayOfNewsRelatedSearch')->getAttribute('NewsRelatedSearch')->getRemovableFromRequest());
                ++$count;
            }
        }
        $this->assertEquals(2, $count);
    }

    public function testParseYandexAdGroups(): void
    {
        $tagElementParser = self::yandexAdGroupsInstanceParser();
        $tagElementParser->parse();
        $count = 0;
        $structs = $tagElementParser->getGenerator()->getStructs();
        if ($structs->count() > 0) {
            if ($structs->getStructByName('AdGroupBase') instanceof Struct) {
                $this->assertSame([
                    'maxOccurs' => '1',
                    'minOccurs' => '0',
                    'nillable' => 'true',
                ], $structs->getStructByName('AdGroupBase')->getAttribute('NegativeKeywords')->getMeta());
                $this->assertSame('ArrayOfString', $structs->getStructByName('AdGroupBase')->getAttribute('NegativeKeywords')->getType());
                $this->assertFalse($structs->getStructByName('AdGroupBase')->getAttribute('NegativeKeywords')->getContainsElements());
                $this->assertTrue($structs->getStructByName('AdGroupBase')->getAttribute('NegativeKeywords')->getRemovableFromRequest());
                ++$count;
            }
        }
        $this->assertEquals(1, $count);
    }

    public function testParseActon(): void
    {
        $tagElementParser = self::actonInstanceParser();
        $tagElementParser->parse();
        $count = 0;
        $structs = $tagElementParser->getGenerator()->getStructs();
        if ($structs->count() > 0) {
            if ($structs->getStructByName('LoginResult') instanceof Struct) {
                $this->assertSame([
                    'nillable' => 'true',
                ], $structs->getStructByName('LoginResult')->getAttribute('serverUrl')->getMeta());
                $this->assertSame('string', $structs->getStructByName('LoginResult')->getAttribute('serverUrl')->getType());
                $this->assertFalse($structs->getStructByName('LoginResult')->getAttribute('serverUrl')->getContainsElements());
                $this->assertFalse($structs->getStructByName('LoginResult')->getAttribute('serverUrl')->getRemovableFromRequest());
                ++$count;
            }
        }
        $this->assertEquals(1, $count);
    }

    public function testParsePayPal(): void
    {
        $tagElementParser = self::payPalInstanceParser();
        $tagElementParser->parse();
        $okCount = 0;
        $struct = $tagElementParser->getGenerator()->getStructByName('SetExpressCheckoutRequestDetailsType');
        $attributes = [
            'cpp-header-image' => 'string',
            'cpp-header-border-color' => 'string',
            'cpp-header-back-color' => 'string',
            'cpp-payflow-color' => 'string',
            'cpp-cart-border-color' => 'string',
            'cpp-logo-image' => 'string',
        ];
        if ($struct instanceof Struct) {
            foreach ($attributes as $attribute => $value) {
                $header = $struct->getAttribute($attribute);
                if ($header) {
                    $okCount += (int) ($value === $header->getType());
                }
            }
        }
        $this->assertSame(count($attributes), $okCount);
    }
}
