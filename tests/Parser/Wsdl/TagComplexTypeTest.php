<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagComplexType;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagRestriction;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagElement;

class TagComplexTypeTest extends WsdlParser
{
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagComplexType
     */
    public static function ebayInstance()
    {
        return new TagComplexType(self::generatorInstance(self::wsdlEbayPath()));
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagComplexType
     */
    public static function partnerInstance()
    {
        return new TagComplexType(self::generatorInstance(self::wsdlPartnerPath()));
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagComplexType
     */
    public static function docDataPaymentsInstance()
    {
        return new TagComplexType(self::generatorInstance(self::wsdlDocDataPaymentsPath()));
    }
    /**
     *
     */
    public function testParseEbay()
    {
        $tagComplexTypeParser = self::ebayInstance();

        $tagComplexTypeParser->parse();

        $ok = false;
        $structs = $tagComplexTypeParser->getGenerator()->getStructs();
        if ($structs->count() > 0) {
            $this->assertTrue($structs->getStructByName('AbstractRequestType')->getIsAbstract());
            $this->assertTrue($structs->getStructByName('AbstractResponseType')->getIsAbstract());
            $ok = true;
        }
        $this->assertTrue((bool)$ok);
    }
    /**
     *
     */
    public function testParseOrderContract()
    {
        $tagComplexTypeParser = self::partnerInstance();

        $tagComplexTypeParser->parse();

        $ok = false;
        $structs = $tagComplexTypeParser->getGenerator()->getStructs();
        if ($structs->count() > 0) {
            $this->assertSame('true', $structs->getStructByName('MemberNumber')->getMetaValue('nillable'));
            $this->assertSame('tns:MemberNumber', $structs->getStructByName('MemberNumber')->getMetaValue('type'));
            $ok = true;
        }
        $this->assertTrue((bool)$ok);
    }
    /**
     *
     */
    public function testParseDocDataPaymnts()
    {
        $tagComplexTypeParser = self::docDataPaymentsInstance();
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
                $this->assertSame(array(
                    'maxLength' => '19',
                    'minLength' => '19',
                ), $exchangeRateDate->getMeta());
                $count++;
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
                $this->assertSame(array(
                    'maxOccurs' => '1',
                    'minOccurs' => '1',
                    'pattern' => '[_a-zA-Z0-9\-\+\.]+@[a-zA-Z0-9\-]+(\.[a-zA-Z0-9\-]+)*(\.[a-zA-Z]+)',
                    'maxLength' => '100',
                    'minLength' => '1',
                ), $email->getMeta());
                $count++;
            }
        }
        $this->assertEquals(2, $count);
    }
}
