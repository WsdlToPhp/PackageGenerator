<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagAttribute;
use WsdlToPhp\PackageGenerator\Model\Struct;

class TagAttributeTest extends WsdlParser
{
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagAttribute
     */
    public static function ebayInstanceParser()
    {
        return new TagAttribute(self::generatorInstance(self::wsdlEbayPath()));
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagAttribute
     */
    public static function whlInstanceParser()
    {
        return new TagAttribute(self::generatorInstance(self::wsdlWhlPath()));
    }
    /**
     *
     */
    public function testParseEbay()
    {
        $tagAttributeParser = self::ebayInstanceParser();

        $tagAttributeParser->parse();

        $ok = false;
        $structs = $tagAttributeParser->getGenerator()->getStructs();
        if ($structs->count() > 0) {
            if (($struct = $structs->getStructByName('QuantityType')) instanceof Struct) {
                $this->assertSame('token', $struct->getAttribute('unit')->getType());
                $this->assertSame(['use' => 'optional'], $struct->getAttribute('unit')->getMeta());
                $ok = true;
            }
            if (($struct = $structs->getStructByName('CharityIDType')) instanceof Struct) {
                $this->assertSame('CharityAffiliationTypeCodeType', $struct->getAttribute('type')->getType());
                $this->assertSame(['use' => 'required'], $struct->getAttribute('type')->getMeta());
                $ok = true;
            }
            if (($struct = $structs->getStructByName('CharityAffiliationType')) instanceof Struct) {
                $this->assertSame('string', $struct->getAttribute('id')->getType());
                $this->assertSame('CharityAffiliationTypeCodeType', $struct->getAttribute('type')->getType());
                $ok = true;
            }
        }
        $this->assertTrue((bool) $ok);
    }
    /**
     *
     */
    public function testParseWhl()
    {
        $tagAttributeParser = self::whlInstanceParser();

        $tagAttributeParser->parse();

        $count = 0;
        $structs = $tagAttributeParser->getGenerator()->getStructs();
        if ($structs->count() > 0) {
            if (($struct = $structs->getStructByName('DestinationType')) instanceof Struct) {
                $this->assertSame('integer', $struct->getAttribute('ID')->getType());
                $this->assertSame('integer', $struct->getAttribute('CountryID')->getType());
                $count++;
            }
            if (($struct = $structs->getStructByName('InventoryType')) instanceof Struct) {
                $this->assertSame('string', $struct->getAttribute('RatePlanId')->getType());
                $this->assertSame('string', $struct->getAttribute('Availability')->getType());
                $this->assertSame('string', $struct->getAttribute('StartDate')->getType());
                $this->assertSame('string', $struct->getAttribute('EndDate')->getType());
                $count++;
            }
            if (($struct = $structs->getStructByName('UniqueID_Type')) instanceof Struct) {
                $this->assertSame('optional', $struct->getAttribute('URL')->getMetaValue('use'));
                $this->assertSame('xs:anyURI', $struct->getAttribute('URL')->getMetaValue('type'));
                $this->assertFalse($struct->getAttribute('URL')->isRequired());

                $this->assertSame('required', $struct->getAttribute('Type')->getMetaValue('use'));
                $this->assertSame('whlsoap:OTA_CodeType', $struct->getAttribute('Type')->getMetaValue('type'));
                $this->assertTrue($struct->getAttribute('Type')->isRequired());

                $this->assertSame('optional', $struct->getAttribute('ID_Context')->getMetaValue('use'));
                $this->assertSame('whlsoap:StringLength1to32', $struct->getAttribute('ID_Context')->getMetaValue('type'));
                $this->assertFalse($struct->getAttribute('ID_Context')->isRequired());

                $this->assertSame('required', $struct->getAttribute('ID')->getMetaValue('use'));
                $this->assertSame('whlsoap:StringLength1to32', $struct->getAttribute('ID')->getMetaValue('type'));
                $this->assertTrue($struct->getAttribute('ID')->isRequired());
                $count++;
            }
        }
        $this->assertSame(3, $count);
    }
}
