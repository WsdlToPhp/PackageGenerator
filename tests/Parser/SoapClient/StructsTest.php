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

        $offer = $generator->getStruct('offer');

        if ($offer instanceof Struct) {
            $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\Model\\StructAttribute', $offer->getAttribute('offerClassMember'));
            $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\Model\\StructAttribute', $offer->getAttribute('offer'));
            $this->assertSame('offer', $offer->getAttribute('offer')->getType());
        } else {
            $this->assertFalse(true, 'Unable to get offer struct');
        }

        $order = $generator->getStruct('order');

        if ($offer instanceof Struct) {
            $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\Model\\StructAttribute', $order->getAttribute('orderClassMember'));
            $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\Model\\StructAttribute', $order->getAttribute('order'));
            $this->assertSame('order', $order->getAttribute('order')->getType());
        } else {
            $this->assertFalse(true, 'Unable to get order struct');
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
            $count += $struct->getIsStruct() ? 1 : 0;
        }

        $this->assertEquals(0, $count);
    }
}
