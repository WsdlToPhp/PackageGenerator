<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

/**
 * The choice's maxOccurs attribute bounds the number of times the choice group may repeat,
 * not the number of times the chosen element may occur within the group. When the element
 * itself may occur more than once (its own maxOccurs is greater than 1 or unbounded), the
 * element's occurrences count is constrained by its own maxOccurs rule, and applying the
 * choice's bound to the element's items count would wrongly reject valid contents.
 *
 * @see https://github.com/WsdlToPhp/PackageGenerator/issues/340
 */
class ChoiceMaxOccursRule extends MaxOccursRule
{
    public function name(): string
    {
        return 'choiceMaxOccurs';
    }

    public function testConditions(string $parameterName, $value, bool $itemType = false): string
    {
        $elementMaxOccurs = $this->getAttribute()->getMetaValueFirstSet([
            'maxOccurs',
            'maxoccurs',
            'MaxOccurs',
            'Maxoccurs',
        ], 1);

        if ('unbounded' === $elementMaxOccurs || 1 < (int) $elementMaxOccurs) {
            return '';
        }

        return parent::testConditions($parameterName, $value, $itemType);
    }
}
