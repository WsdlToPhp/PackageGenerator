<?php

namespace WsdlToPhp\PackageGenerator\Tests\WsdlHandler\Tag;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Tests\Model\WsdlTest;
use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl;

class TagUnionTest extends TestCase
{
    /**
     *
     */
    public function testGetAttributeMemberTypes()
    {
        $wsdl = WsdlTest::orderContractInstance();

        $unions = $wsdl->getContent()->getElementsByName(Wsdl::TAG_UNION);

        $this->assertCount(2, $unions);

        $ok = false;
        foreach ($unions as $union) {
            switch ($union->getSuitableParent()->getAttributeName()) {
                case 'RelationshipTypeOpenEnum':
                    $this->assertSame(array(
                        'RelationshipType',
                        'anyURI',
                    ), $union->getAttributeMemberTypes());
                    $ok |= true;
                    break;
                case 'FaultCodesOpenEnumType':
                    $this->assertSame(array(
                            'FaultCodesType',
                            'QName',
                    ), $union->getAttributeMemberTypes());
                    $ok |= true;
                    break;
            }
        }
        $this->assertTrue((bool) $ok);
    }
}
