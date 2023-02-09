<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagComplexType;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagElement;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagRestriction;

/**
 * @internal
 * @coversDefaultClass
 */
final class TagComplexTypeTest extends WsdlParser
{
    public static function ebayInstanceParser(): TagComplexType
    {
        return new TagComplexType(self::generatorInstance(self::wsdlEbayPath()));
    }

    public static function partnerInstanceParser(): TagComplexType
    {
        return new TagComplexType(self::generatorInstance(self::wsdlPartnerPath()));
    }

    public static function docDataPaymentsInstanceParser(): TagComplexType
    {
        return new TagComplexType(self::generatorInstance(self::wsdlDocDataPaymentsPath()));
    }

    public function testParseEbay(): void
    {
        $tagComplexTypeParser = self::ebayInstanceParser();

        $tagComplexTypeParser->parse();

        $ok = false;
        $structs = $tagComplexTypeParser->getGenerator()->getStructs();
        if ($structs->count() > 0) {
            $this->assertTrue($structs->getStructByName('AbstractRequestType')->isAbstract());
            $this->assertTrue($structs->getStructByName('AbstractResponseType')->isAbstract());
            $ok = true;
        }
        $this->assertTrue((bool) $ok);
    }

    public function testParseOrderContract(): void
    {
        $tagComplexTypeParser = self::partnerInstanceParser();

        $tagComplexTypeParser->parse();

        $ok = false;
        $structs = $tagComplexTypeParser->getGenerator()->getStructs();
        if ($structs->count() > 0) {
            $this->assertSame('true', $structs->getStructByName('MemberNumber')->getMetaValue('nillable'));
            $this->assertSame('tns:MemberNumber', $structs->getStructByName('MemberNumber')->getMetaValue('type'));
            $ok = true;
        }
        $this->assertTrue((bool) $ok);
    }

    public function testParseDocDataPaymnts(): void
    {
        $tagComplexTypeParser = self::docDataPaymentsInstanceParser();
        $tagRestriction = new TagRestriction($tagComplexTypeParser->getGenerator());
        $tagElement = new TagElement($tagComplexTypeParser->getGenerator());

        $tagComplexTypeParser->parse();
        $tagRestriction->parse();
        $tagElement->parse();

        $count = 0;
        $structs = $tagComplexTypeParser->getGenerator()->getStructs();
        $approximateTotals = $structs->getStructByName('approximateTotals');
        if ($approximateTotals) {
            $exchangeRateDate = $approximateTotals->getAttribute('exchangeRateDate');
            if ($exchangeRateDate) {
                $this->assertSame('plainDateTime', $exchangeRateDate->getType());
                $this->assertSame('normalizedString', $exchangeRateDate->getTypeStruct()->getInheritance());
                $this->assertSame('plainDateTime', $exchangeRateDate->getTypeStruct()->getName());
                $this->assertSame([
                    'base' => 'normalizedString',
                    'maxLength' => '19',
                    'minLength' => '19',
                ], $exchangeRateDate->getMeta());
                ++$count;
            }
        }
        $shopper = $structs->getStructByName('shopper');
        if ($shopper) {
            $email = $shopper->getAttribute('email');
            if ($email) {
                $this->assertSame('emailAddress', $email->getType());
                $this->assertSame('emailAddress', $email->getTypeStruct()->getName());
                $this->assertSame('string100', $email->getTypeStruct()->getInheritance());
                $this->assertSame('normalizedString', $email->getTypeStruct()->getTopInheritance());
                $this->assertSame([
                    'base' => 'ddp:string100',
                    'maxLength' => '100',
                    'maxOccurs' => '1',
                    'minLength' => '1',
                    'minOccurs' => '1',
                    'pattern' => '[_a-zA-Z0-9\-\+\.]+@[a-zA-Z0-9\-]+(\.[a-zA-Z0-9\-]+)*(\.[a-zA-Z]+)',
                ], $email->getMeta());
                ++$count;
            }
        }
        $this->assertEquals(2, $count);
    }
}
