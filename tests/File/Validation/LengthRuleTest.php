<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

class LengthRuleTest extends AbstractRuleTest
{

    /**
     * The PostalCode
     * Meta informations extracted from the WSDL
     * - base: string
     * - length: 4
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid length of 5, the number of characters/octets contained by the literal must be equal to 4
     */
    public function testAddToAddressLineWithTooManyCharactersLengthMustThrowAnException()
    {
        $instance = self::getOrderContractAddressDeliveryTypeInstance();

        $instance->setPostalCode('12345');
    }

    /**
     * The PostalCode
     * Meta informations extracted from the WSDL
     * - base: string
     * - length: 4
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid length of 3, the number of characters/octets contained by the literal must be equal to 4
     */
    public function testAddToAddressLineWithTooLessCharactersLengthMustThrowAnException()
    {
        $instance = self::getOrderContractAddressDeliveryTypeInstance();

        $instance->setPostalCode('123');
    }

    /**
     * The PostalCode
     * Meta informations extracted from the WSDL
     * - base: string
     * - length: 4
     */
    public function testAddToAddressLineWithSAmeCharactersLengthMustPass()
    {
        $instance = self::getOrderContractAddressDeliveryTypeInstance();

        $this->assertSame($instance, $instance->setPostalCode('1234'));
    }
}
