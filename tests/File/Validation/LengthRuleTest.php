<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

use InvalidArgumentException;

final class LengthRuleTest extends AbstractRuleTest
{

    /**
     * The PostalCode
     * Meta informations extracted from the WSDL
     * - base: string
     * - length: 4
     */
    public function testAddToAddressLineWithTooManyCharactersLengthMustThrowAnException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid length of 5, the number of characters/octets contained by the literal must be equal to 4');

        $instance = self::getOrderContractAddressDeliveryTypeInstance();

        $instance->setPostalCode('12345');
    }

    /**
     * The PostalCode
     * Meta informations extracted from the WSDL
     * - base: string
     * - length: 4
     */
    public function testAddToAddressLineWithTooLessCharactersLengthMustThrowAnException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid length of 3, the number of characters/octets contained by the literal must be equal to 4');

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
