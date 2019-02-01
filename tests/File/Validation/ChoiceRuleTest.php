<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

class ChoiceRuleTest extends AbstractRuleTest
{

    /**
     * - choice: StringValue | BinaryValue
     * - choiceMaxOccurs: 1
     * - choiceMinOccurs: 1
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage The property StringValue can't be set as the property BinaryValue is already set. Only one property must be set among these properties: StringValue, BinaryValue.
     */
    public function testSetStringValueAfterBinaryValueMustThrowAnException()
    {
        $instance = self::getQueueMessageAttributeValueInstance();

        $instance
            ->setBinaryValue('1234567980')
            ->setStringValue('0987654321');
    }

    /**
     * - choice: StringValue | BinaryValue
     * - choiceMaxOccurs: 1
     * - choiceMinOccurs: 1
     */
    public function testSetStringValueAloneMustPass()
    {
        $instance = self::getQueueMessageAttributeValueInstance(true);

        $this->assertSame($instance, $instance->setStringValue('0987654321'));
    }

    /**
     * - choice: StringValue | BinaryValue
     * - choiceMaxOccurs: 1
     * - choiceMinOccurs: 1
     */
    public function testSetStringValueAloneWithNullMustPass()
    {
        // true to avoid having the instance modified previously
        $instance = self::getQueueMessageAttributeValueInstance(true);

        $this->assertSame($instance, $instance->setStringValue(null));
    }
}
