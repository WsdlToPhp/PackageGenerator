<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagUnion;

class TagUnionTest extends WsdlParser
{
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagUnion
     */
    public static function orderContractInstanceParser()
    {
        return new TagUnion(self::generatorInstance(self::wsdlOrderContractPath()));
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagUnion
     */
    public static function ewsInstanceParser()
    {
        return new TagUnion(self::generatorInstance(self::wsdlEwsPath()));
    }
    /**
     *
     */
    public function testParseOrderContract()
    {
        $tagUnionParser = self::orderContractInstanceParser();

        $tagUnionParser->parse();

        $count = 0;
        $structs = $tagUnionParser->getGenerator()->getStructs();
        if ($structs->count() > 0) {
            foreach ($structs as $struct) {
                switch ($struct->getName()) {
                    case 'RelationshipTypeOpenEnum':
                        $this->assertSame('anyURI', $struct->getInheritance());
                        $count++;
                        break;
                    case 'FaultCodesOpenEnumType':
                        $this->assertSame('QName', $struct->getInheritance());
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
        $tagUnionParser = self::ewsInstanceParser();

        $tagUnionParser->parse();

        $count = 0;
        $structs = $tagUnionParser->getGenerator()->getStructs();
        if ($structs->count() > 0) {
            /** @var Struct $struct */
            foreach ($structs as $struct) {
                switch ($struct->getName()) {
                    case 'PathToExtendedFieldType':
                        $this->assertSame([
                            'union' => [
                                'unsignedShort',
                                'string',
                            ],
                        ], $struct->getAttribute('PropertyTag')->getMeta());
                        $count++;
                        break;
                    case 'ItemType':
                        $this->assertSame([
                            'union' => [
                                'int',
                            ],
                        ], $struct->getAttribute('ReminderMinutesBeforeStart')->getMeta());
                        $count++;
                        break;
                }
            }
        }
        $this->assertSame(2, $count);
    }
}
