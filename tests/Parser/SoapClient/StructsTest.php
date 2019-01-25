<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\SoapClient;

use WsdlToPhp\PackageGenerator\Parser\SoapClient\Structs;
use WsdlToPhp\PackageGenerator\Model\Struct;

class StructsTest extends SoapClientParser
{
    /**
     *
     */
    public function testWcf()
    {
        $generator = self::getWcfInstance();

        $parser = new Structs($generator);
        $parser->parse();

        $offer = $generator->getStructByName('offer');

        if ($offer instanceof Struct) {
            $this->assertInstanceOf('\WsdlToPhp\PackageGenerator\Model\StructAttribute', $offer->getAttribute('offerClassMember'));
            $this->assertInstanceOf('\WsdlToPhp\PackageGenerator\Model\StructAttribute', $offer->getAttribute('offer'));
            $this->assertSame('offer', $offer->getAttribute('offer')->getType());
        } else {
            $this->fail('Unable to get offer struct');
        }

        $order = $generator->getStructByName('order');

        if ($offer instanceof Struct) {
            $this->assertInstanceOf('\WsdlToPhp\PackageGenerator\Model\StructAttribute', $order->getAttribute('orderClassMember'));
            $this->assertInstanceOf('\WsdlToPhp\PackageGenerator\Model\StructAttribute', $order->getAttribute('order'));
            $this->assertSame('order', $order->getAttribute('order')->getType());
        } else {
            $this->fail('Unable to get order struct');
        }
    }
    /**
     *
     */
    public function testLnp()
    {
        $generator = self::getLnpInstance();

        $parser = new Structs($generator);
        $parser->parse();

        $count = 0;
        foreach ($generator->getStructs() as $struct) {
            $count += $struct->isStruct() ? 1 : 0;
        }

        $this->assertEquals(0, $count);
    }
    /**
     *
     */
    public function testWhl()
    {
        $generator = self::getWhlInstance(true);

        $parser = new Structs($generator);
        $parser->parse();

        $unionTypes = [
            explode(',', 'anonymous25,anonymous26'),
            explode(',', 'dateTime,time'),
            explode(',', 'date,dateTime,time'),
            explode(',', 'NightDurationType,duration'),
            explode(',', 'PMS_ResStatusType,TransactionActionType,UpperCaseAlphaLength1to2'),
            explode(',', 'PMS_ResStatusType,TransactionActionType,UpperCaseAlphaLength1to2'),
        ];

        $count = 0;
        $index = 0;
        /** @var Struct $struct */
        foreach ($generator->getStructs() as $struct) {
            $count += $struct->isUnion() ? 1 : 0;
            if ($struct->isUnion()) {
                $this->assertSame($unionTypes[$index++], $struct->getTypes());
            }
        }

        $this->assertEquals(5, $count);
    }
}
