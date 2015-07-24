<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagUnion;

class TagUnionTest extends WsdlParser
{
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagUnion
     */
    public static function orderContractInstance()
    {
        return new TagUnion(self::generatorInstance(self::wsdlOrderContractPath()));
    }
    /**
     *
     */
    public function testParseOrderContract()
    {
        $tagUnionParser = self::orderContractInstance();

        $tagUnionParser->parse();

        $count = 0;
        $structs = $tagUnionParser->getGenerator()->getStructs();
        if ($structs->count() > 0) {
            foreach ($structs as $struct) {
                switch ($struct->getName()) {
                    case 'RelationshipTypeOpenEnum':
                        $this->assertSame('RelationshipType', $struct->getInheritance());
                        $count++;
                        break;
                    case 'FaultCodesOpenEnumType':
                        $this->assertSame('FaultCodesType', $struct->getInheritance());
                        $count++;
                        break;
                }
            }
        }
        $this->assertSame(2, $count);
    }
}
