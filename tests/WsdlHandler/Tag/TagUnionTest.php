<?php

namespace WsdlToPhp\PackageGenerator\Tests\WsdlHandler\Tag;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Tests\Model\WsdlTest;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagUnion;
use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl;

class TagUnionTest extends TestCase
{
    /**
     *
     */
    public function testGetAttributeMemberTypes()
    {
        $wsdl = WsdlTest::wsdlOrderContractInstance();

        $unions = $wsdl->getContent()->getElementsByName(Wsdl::TAG_UNION);

        $this->assertCount(2, $unions);

        $ok = false;
        foreach ($unions as $union) {
            switch ($union->getSuitableParent()->getAttributeName()) {
                case 'RelationshipTypeOpenEnum':
                    $this->assertSame([
                        'RelationshipType',
                        'anyURI',
                    ], $union->getAttributeMemberTypes());
                    $ok |= true;
                    break;
                case 'FaultCodesOpenEnumType':
                    $this->assertSame([
                            'FaultCodesType',
                            'QName',
                    ], $union->getAttributeMemberTypes());
                    $ok |= true;
                    break;
            }
        }
        $this->assertTrue((bool) $ok);
    }
    /**
     *
     */
    public function testHasMemberTypesAsChildrenMustReturnFalse()
    {
        $wsdl = WsdlTest::wsdlOrderContractInstance();

        $unions = $wsdl->getContent()->getElementsByName(Wsdl::TAG_UNION);

        $this->assertCount(2, $unions);

        $tests = 0;
        /** @var TagUnion $union */
        foreach ($unions as $union) {
            switch ($union->getSuitableParent()->getAttributeName()) {
                case 'RelationshipTypeOpenEnum':
                    $this->assertFalse($union->hasMemberTypesAsChildren());
                    $tests++;
                    break;
                case 'FaultCodesOpenEnumType':
                    $this->assertFalse($union->hasMemberTypesAsChildren());
                    $tests++;
                    break;
            }
        }

        $this->assertSame(2, $tests);
    }
    /**
     *
     */
    public function testHasMemberTypesAsChildrenMustReturnTrue()
    {
        $schema = WsdlTest::schemaEwsTypesInstance();

        $unions = $schema->getContent()->getElementsByName(Wsdl::TAG_UNION);

        $tests = 0;
        /** @var TagUnion $union */
        foreach ($unions as $union) {
            switch ($union->getSuitableParent()->getAttributeName()) {
                case 'ReminderMinutesBeforeStartType':
                    $this->assertTrue($union->hasMemberTypesAsChildren());
                    $tests++;
                    break;
                case 'PropertyTagType':
                    $this->assertTrue($union->hasMemberTypesAsChildren());
                    $tests++;
                    break;
            }
        }

        $this->assertSame(2, $tests);
    }
    /**
     *
     */
    public function testGetMemberTypesChildrenMustReturnTheChildren()
    {
        $schema = WsdlTest::schemaEwsTypesInstance();

        $unions = $schema->getContent()->getElementsByName(Wsdl::TAG_UNION);

        $tests = 0;
        /** @var TagUnion $union */
        foreach ($unions as $union) {
            switch ($union->getSuitableParent()->getAttributeName()) {
                case 'ReminderMinutesBeforeStartType':
                    $this->assertCount(2, $union->getMemberTypesChildren());
                    $tests++;
                    break;
                case 'PropertyTagType':
                    $this->assertCount(1, $union->getMemberTypesChildren());
                    $tests++;
                    break;
            }
        }

        $this->assertSame(2, $tests);
    }
}
