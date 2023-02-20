<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

/**
 * @internal
 * @coversDefaultClass
 */
final class LengthRuleTest extends AbstractRule
{
    /**
     * The PostalCode
     * Meta informations extracted from the WSDL
     * - base: string
     * - length: 4.
     */
    public function testAddToAddressLineWithTooManyCharactersLengthMustThrowAnException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid length of 5, the number of characters/octets contained by the literal must be equal to 4');

        $instance = self::getOrderContractAddressDeliveryTypeInstance();

        $instance->setPostalCode('12345');
    }

    /**
     * The PostalCode
     * Meta informations extracted from the WSDL
     * - base: string
     * - length: 4.
     */
    public function testAddToAddressLineWithTooLessCharactersLengthMustThrowAnException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid length of 3, the number of characters/octets contained by the literal must be equal to 4');

        $instance = self::getOrderContractAddressDeliveryTypeInstance();

        $instance->setPostalCode('123');
    }

    /**
     * The PostalCode
     * Meta informations extracted from the WSDL
     * - base: string
     * - length: 4.
     */
    public function testAddToAddressLineWithSAmeCharactersLengthMustPass(): void
    {
        $instance = self::getOrderContractAddressDeliveryTypeInstance();

        $this->assertSame($instance, $instance->setPostalCode('1234'));
    }
}
