<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagElement;
use WsdlToPhp\PackageGenerator\Model\Struct;

class TagElementTest extends WsdlParser
{
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagElement
     */
    public static function bingInstance()
    {
        return new TagElement(self::generatorInstance(self::wsdlBingPath()));
    }
    /**
     *
     */
    public function testParseBing()
    {
        $tagElementParser = self::bingInstance();

        $tagElementParser->parse();

        $ok = 0;
        $structs = $tagElementParser->getGenerator()->getStructs();
        if ($structs->count() > 0) {
            if ($structs->getStructByName('SearchRequest') instanceof Struct) {
                $this->assertSame(array(
                    'default' => '2.2',
                    'maxOccurs' => '1',
                    'minOccurs' => '0',
                ), $structs->getStructByName('SearchRequest')->getAttribute('Version')->getMeta());
                $this->assertSame('string', $structs->getStructByName('SearchRequest')->getAttribute('Version')->getType());
                $ok++;
            }
            if ($structs->getStructByName('ArrayOfNewsRelatedSearch') instanceof Struct) {
                $this->assertSame(array(
                    'maxOccurs' => 'unbounded',
                    'minOccurs' => '0',
                ), $structs->getStructByName('ArrayOfNewsRelatedSearch')->getAttribute('NewsRelatedSearch')->getMeta());
                $this->assertSame('NewsRelatedSearch', $structs->getStructByName('ArrayOfNewsRelatedSearch')->getAttribute('NewsRelatedSearch')->getType());
                $ok++;
            }
        }
        $this->assertEquals(2, $ok);
    }
}
