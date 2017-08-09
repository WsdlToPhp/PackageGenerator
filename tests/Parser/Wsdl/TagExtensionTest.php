<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagExtension;
use WsdlToPhp\PackageGenerator\Model\Struct;

class TagExtensionTest extends WsdlParser
{
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagExtension
     */
    public static function ebayInstanceParser()
    {
        return new TagExtension(self::generatorInstance(self::wsdlEbayPath()));
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagExtension
     */
    public static function wcfInstanceParser()
    {
        return new TagExtension(self::generatorInstance(self::wsdlWcfPath()));
    }
    /**
     *
     */
    public function testParseEbay()
    {
        $tagEnumerationParser = self::ebayInstanceParser();

        $tagEnumerationParser->parse();

        $count = 0;
        $structs = $tagEnumerationParser->getGenerator()->getStructs();
        if ($structs->count() > 0) {
            if ($structs->getStructByName('AddDisputeRequestType') instanceof Struct) {
                $this->assertSame('AbstractRequestType', $structs->getStructByName('AddDisputeRequestType')->getInheritance());
                $count++;
            }
            if ($structs->getStructByName('TaxIdentifierAttributeType') instanceof Struct) {
                $this->assertSame('string', $structs->getStructByName('TaxIdentifierAttributeType')->getInheritance());
                $count++;
            }
        }
        $this->assertSame(2, $count);
    }
    /**
     *
     */
    public function testParseWcf()
    {
        $tagEnumerationParser = self::wcfInstanceParser();

        $tagEnumerationParser->parse();

        $count = 0;
        $structs = $tagEnumerationParser->getGenerator()->getStructs();
        if ($structs->count() > 0) {
            if ($structs->getStructByName('offer') instanceof Struct) {
                $this->assertSame('order', $structs->getStructByName('offer')->getInheritance());
                $count++;
            }
            if ($structs->getStructByName('order') instanceof Struct) {
                $this->assertSame('', $structs->getStructByName('order')->getInheritance());
                $count++;
            }
        }
        $this->assertSame(2, $count);
    }
}
