<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

/**
 * The ItemsChoiceType struct contains a choice (choiceMaxOccurs: 1) whose elements have
 * their own maxOccurs: 5, so each property must accept up to 5 items even though the
 * choice itself may only occur once.
 *
 * @see https://github.com/WsdlToPhp/PackageGenerator/issues/340
 *
 * @internal
 * @coversDefaultClass
 */
final class ChoiceMaxOccursRuleTest extends AbstractRule
{
    /**
     * The ItemIdentifier
     * Meta information extracted from the WSDL
     * - choice: ItemIdentifier | ItemName
     * - choiceMaxOccurs: 1
     * - choiceMinOccurs: 1
     * - maxOccurs: 5
     * - minOccurs: 1.
     */
    public function testSetItemIdentifierWithSeveralItemsMustPass(): void
    {
        $instance = self::getUnitTestsItemsChoiceTypeInstance(true);

        $this->assertSame($instance, $instance->setItemIdentifier([1, 2, 3, 4, 5]));
    }

    /**
     * The ItemIdentifier
     * Meta information extracted from the WSDL
     * - choice: ItemIdentifier | ItemName
     * - choiceMaxOccurs: 1
     * - choiceMinOccurs: 1
     * - maxOccurs: 5
     * - minOccurs: 1.
     */
    public function testAddToItemIdentifierWithSeveralItemsMustPass(): void
    {
        $instance = self::getUnitTestsItemsChoiceTypeInstance(true);

        $this->assertSame($instance, $instance->setItemIdentifier([1])->addToItemIdentifier(2)->addToItemIdentifier(3));
    }

    /**
     * The ItemIdentifier
     * Meta information extracted from the WSDL
     * - choice: ItemIdentifier | ItemName
     * - choiceMaxOccurs: 1
     * - choiceMinOccurs: 1
     * - maxOccurs: 5
     * - minOccurs: 1.
     */
    public function testSetItemIdentifierWithTooManyItemsMustThrowAnException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid count of 6, the number of elements contained by the property must be less than or equal to 5');

        $instance = self::getUnitTestsItemsChoiceTypeInstance(true);

        $instance->setItemIdentifier([1, 2, 3, 4, 5, 6]);
    }

    /**
     * The ItemName
     * Meta information extracted from the WSDL
     * - choice: ItemIdentifier | ItemName
     * - choiceMaxOccurs: 1
     * - choiceMinOccurs: 1
     * - maxOccurs: 5
     * - minOccurs: 1.
     */
    public function testSetItemNameAfterItemIdentifierMustThrowAnException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('The property ItemName can\'t be set as the property ItemIdentifier is already set. Only one property must be set among these properties: ItemName, ItemIdentifier.');

        $instance = self::getUnitTestsItemsChoiceTypeInstance(true);

        $instance
            ->setItemIdentifier([1, 2])
            ->setItemName(['one', 'two'])
        ;
    }
}
