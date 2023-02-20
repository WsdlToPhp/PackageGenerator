<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagUnion;

/**
 * @internal
 * @coversDefaultClass
 */
final class TagUnionTest extends WsdlParser
{
    public static function orderContractInstanceParser(): TagUnion
    {
        return new TagUnion(self::generatorInstance(self::wsdlOrderContractPath()));
    }

    public static function ewsInstanceParser(): TagUnion
    {
        return new TagUnion(self::generatorInstance(self::wsdlEwsPath()));
    }

    public function testParseOrderContract(): void
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
                        ++$count;

                        break;

                    case 'FaultCodesOpenEnumType':
                        $this->assertSame('QName', $struct->getInheritance());
                        ++$count;

                        break;
                }
            }
        }
        $this->assertSame(2, $count);
    }

    public function testParseEws(): void
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
                        ++$count;

                        break;

                    case 'ItemType':
                        $this->assertSame([
                            'union' => [
                                'int',
                            ],
                        ], $struct->getAttribute('ReminderMinutesBeforeStart')->getMeta());
                        ++$count;

                        break;
                }
            }
        }
        $this->assertSame(2, $count);
    }
}
