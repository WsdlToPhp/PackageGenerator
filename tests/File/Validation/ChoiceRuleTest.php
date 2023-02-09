<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

/**
 * @internal
 * @coversDefaultClass
 */
final class ChoiceRuleTest extends AbstractRule
{
    /**
     * - choice: StringValue | BinaryValue
     * - choiceMaxOccurs: 1
     * - choiceMinOccurs: 1.
     */
    public function testSetStringValueAfterBinaryValueMustThrowAnException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('The property StringValue can\'t be set as the property BinaryValue is already set. Only one property must be set among these properties: StringValue, BinaryValue.');

        $instance = self::getQueueMessageAttributeValueInstance();

        $instance
            ->setBinaryValue('1234567980')
            ->setStringValue('0987654321')
        ;
    }

    /**
     * - choice: StringValue | BinaryValue
     * - choiceMaxOccurs: 1
     * - choiceMinOccurs: 1.
     */
    public function testSetStringValueAloneMustPass(): void
    {
        $instance = self::getQueueMessageAttributeValueInstance(true);

        $this->assertSame($instance, $instance->setStringValue('0987654321'));
    }

    /**
     * - choice: StringValue | BinaryValue
     * - choiceMaxOccurs: 1
     * - choiceMinOccurs: 1.
     */
    public function testSetStringValueAloneWithNullMustPass(): void
    {
        // true to avoid having the instance modified previously
        $instance = self::getQueueMessageAttributeValueInstance(true);

        $this->assertSame($instance, $instance->setStringValue(null));
    }
}
