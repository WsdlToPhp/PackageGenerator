<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for ItemsChoiceType StructType
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
#[\AllowDynamicProperties]
class ApiItemsChoiceType extends AbstractStructBase
{
    /**
     * The ItemIdentifier
     * Meta information extracted from the WSDL
     * - choice: ItemIdentifier | ItemName
     * - choiceMaxOccurs: 1
     * - choiceMinOccurs: 1
     * - maxOccurs: 5
     * - minOccurs: 1
     * - ref: tns:ItemIdentifier
     * @var int[]
     */
    protected array $ItemIdentifier;
    /**
     * The ItemName
     * Meta information extracted from the WSDL
     * - choice: ItemIdentifier | ItemName
     * - choiceMaxOccurs: 1
     * - choiceMinOccurs: 1
     * - maxOccurs: 5
     * - minOccurs: 1
     * - ref: tns:ItemName
     * @var string[]
     */
    protected array $ItemName;
    /**
     * Constructor method for ItemsChoiceType
     * @uses ApiItemsChoiceType::setItemIdentifier()
     * @uses ApiItemsChoiceType::setItemName()
     * @param int[] $itemIdentifier
     * @param string[] $itemName
     */
    public function __construct(?array $itemIdentifier = null, ?array $itemName = null)
    {
        $this
            ->setItemIdentifier($itemIdentifier)
            ->setItemName($itemName);
    }
    /**
     * Get ItemIdentifier value
     * @return int[]|null
     */
    public function getItemIdentifier(): ?array
    {
        return $this->ItemIdentifier ?? null;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setItemIdentifier method
     * This method is willingly generated in order to preserve the one-line inline validation within the setItemIdentifier method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateItemIdentifierForArrayConstraintFromSetItemIdentifier(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $itemsChoiceTypeItemIdentifierItem) {
            // validation for constraint: itemType
            if (!(is_int($itemsChoiceTypeItemIdentifierItem) || ctype_digit($itemsChoiceTypeItemIdentifierItem))) {
                $invalidValues[] = is_object($itemsChoiceTypeItemIdentifierItem) ? get_class($itemsChoiceTypeItemIdentifierItem) : sprintf('%s(%s)', gettype($itemsChoiceTypeItemIdentifierItem), var_export($itemsChoiceTypeItemIdentifierItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The ItemIdentifier property can only contain items of type int, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setItemIdentifier method
     * This method is willingly generated in order to preserve the one-line inline validation within the setItemIdentifier method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateItemIdentifierForChoiceConstraintFromSetItemIdentifier($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'ItemName',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property ItemIdentifier can\'t be set as the property %s is already set. Only one property must be set among these properties: ItemIdentifier, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Set ItemIdentifier value
     * This property belongs to a choice that allows only one property to exist. It is
     * therefore removable from the request, consequently if the value assigned to this
     * property is null, the property is removed from this object
     * @throws InvalidArgumentException
     * @throws InvalidArgumentException
     * @param int[] $itemIdentifier
     * @return \StructType\ApiItemsChoiceType
     */
    public function setItemIdentifier(?array $itemIdentifier = null): self
    {
        // validation for constraint: array
        if ('' !== ($itemIdentifierArrayErrorMessage = self::validateItemIdentifierForArrayConstraintFromSetItemIdentifier($itemIdentifier))) {
            throw new InvalidArgumentException($itemIdentifierArrayErrorMessage, __LINE__);
        }
        // validation for constraint: choice(ItemIdentifier, ItemName)
        if ('' !== ($itemIdentifierChoiceErrorMessage = self::validateItemIdentifierForChoiceConstraintFromSetItemIdentifier($itemIdentifier))) {
            throw new InvalidArgumentException($itemIdentifierChoiceErrorMessage, __LINE__);
        }
        // validation for constraint: maxOccurs(5)
        if (is_array($itemIdentifier) && count($itemIdentifier) > 5) {
            throw new InvalidArgumentException(sprintf('Invalid count of %s, the number of elements contained by the property must be less than or equal to 5', count($itemIdentifier)), __LINE__);
        }
        if (is_null($itemIdentifier) || (is_array($itemIdentifier) && empty($itemIdentifier))) {
            unset($this->ItemIdentifier);
        } else {
            $this->ItemIdentifier = $itemIdentifier;
        }
        
        return $this;
    }
    /**
     * This method is responsible for validating the value(s) passed to the addToItemIdentifier method
     * This method is willingly generated in order to preserve the one-line inline validation within the addToItemIdentifier method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateItemForChoiceConstraintFromAddToItemIdentifier($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'ItemName',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property ItemIdentifier can\'t be set as the property %s is already set. Only one property must be set among these properties: ItemIdentifier, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Add item to ItemIdentifier value
     * @throws InvalidArgumentException
     * @param int $item
     * @return \StructType\ApiItemsChoiceType
     */
    public function addToItemIdentifier(int $item): self
    {
        // validation for constraint: itemType
        if (!(is_int($item) || ctype_digit($item))) {
            throw new InvalidArgumentException(sprintf('The ItemIdentifier property can only contain items of type int, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        // validation for constraint: choice(ItemIdentifier, ItemName)
        if ('' !== ($itemChoiceErrorMessage = self::validateItemForChoiceConstraintFromAddToItemIdentifier($item))) {
            throw new InvalidArgumentException($itemChoiceErrorMessage, __LINE__);
        }
        // validation for constraint: maxOccurs(5)
        if (is_array($this->ItemIdentifier) && count($this->ItemIdentifier) >= 5) {
            throw new InvalidArgumentException(sprintf('You can\'t add anymore element to this property that already contains %s elements, the number of elements contained by the property must be less than or equal to 5', count($this->ItemIdentifier)), __LINE__);
        }
        $this->ItemIdentifier[] = $item;
        
        return $this;
    }
    /**
     * Get ItemName value
     * @return string[]|null
     */
    public function getItemName(): ?array
    {
        return $this->ItemName ?? null;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setItemName method
     * This method is willingly generated in order to preserve the one-line inline validation within the setItemName method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateItemNameForArrayConstraintFromSetItemName(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $itemsChoiceTypeItemNameItem) {
            // validation for constraint: itemType
            if (!is_string($itemsChoiceTypeItemNameItem)) {
                $invalidValues[] = is_object($itemsChoiceTypeItemNameItem) ? get_class($itemsChoiceTypeItemNameItem) : sprintf('%s(%s)', gettype($itemsChoiceTypeItemNameItem), var_export($itemsChoiceTypeItemNameItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The ItemName property can only contain items of type string, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setItemName method
     * This method is willingly generated in order to preserve the one-line inline validation within the setItemName method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateItemNameForChoiceConstraintFromSetItemName($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'ItemIdentifier',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property ItemName can\'t be set as the property %s is already set. Only one property must be set among these properties: ItemName, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Set ItemName value
     * This property belongs to a choice that allows only one property to exist. It is
     * therefore removable from the request, consequently if the value assigned to this
     * property is null, the property is removed from this object
     * @throws InvalidArgumentException
     * @throws InvalidArgumentException
     * @param string[] $itemName
     * @return \StructType\ApiItemsChoiceType
     */
    public function setItemName(?array $itemName = null): self
    {
        // validation for constraint: array
        if ('' !== ($itemNameArrayErrorMessage = self::validateItemNameForArrayConstraintFromSetItemName($itemName))) {
            throw new InvalidArgumentException($itemNameArrayErrorMessage, __LINE__);
        }
        // validation for constraint: choice(ItemIdentifier, ItemName)
        if ('' !== ($itemNameChoiceErrorMessage = self::validateItemNameForChoiceConstraintFromSetItemName($itemName))) {
            throw new InvalidArgumentException($itemNameChoiceErrorMessage, __LINE__);
        }
        // validation for constraint: maxOccurs(5)
        if (is_array($itemName) && count($itemName) > 5) {
            throw new InvalidArgumentException(sprintf('Invalid count of %s, the number of elements contained by the property must be less than or equal to 5', count($itemName)), __LINE__);
        }
        if (is_null($itemName) || (is_array($itemName) && empty($itemName))) {
            unset($this->ItemName);
        } else {
            $this->ItemName = $itemName;
        }
        
        return $this;
    }
    /**
     * This method is responsible for validating the value(s) passed to the addToItemName method
     * This method is willingly generated in order to preserve the one-line inline validation within the addToItemName method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateItemForChoiceConstraintFromAddToItemName($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'ItemIdentifier',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property ItemName can\'t be set as the property %s is already set. Only one property must be set among these properties: ItemName, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Add item to ItemName value
     * @throws InvalidArgumentException
     * @param string $item
     * @return \StructType\ApiItemsChoiceType
     */
    public function addToItemName(string $item): self
    {
        // validation for constraint: itemType
        if (!is_string($item)) {
            throw new InvalidArgumentException(sprintf('The ItemName property can only contain items of type string, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        // validation for constraint: choice(ItemIdentifier, ItemName)
        if ('' !== ($itemChoiceErrorMessage = self::validateItemForChoiceConstraintFromAddToItemName($item))) {
            throw new InvalidArgumentException($itemChoiceErrorMessage, __LINE__);
        }
        // validation for constraint: maxOccurs(5)
        if (is_array($this->ItemName) && count($this->ItemName) >= 5) {
            throw new InvalidArgumentException(sprintf('You can\'t add anymore element to this property that already contains %s elements, the number of elements contained by the property must be less than or equal to 5', count($this->ItemName)), __LINE__);
        }
        $this->ItemName[] = $item;
        
        return $this;
    }
}
