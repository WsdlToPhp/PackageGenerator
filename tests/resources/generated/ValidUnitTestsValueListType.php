<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for ValueListType StructType
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
#[\AllowDynamicProperties]
class ApiValueListType extends AbstractStructBase
{
    /**
     * The Value
     * Meta information extracted from the WSDL
     * - base: xsd:string
     * - maxLength: 256
     * - ref: tns:Value
     * @var string[]
     */
    protected ?array $Value = null;
    /**
     * Constructor method for ValueListType
     * @uses ApiValueListType::setValue()
     * @param string[] $value
     */
    public function __construct(?array $value = null)
    {
        $this
            ->setValue($value);
    }
    /**
     * Get Value value
     * @return string[]
     */
    public function getValue(): ?array
    {
        return $this->Value;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setValue method
     * This method is willingly generated in order to preserve the one-line inline validation within the setValue method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateValueForArrayConstraintFromSetValue(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $valueListTypeValueItem) {
            // validation for constraint: itemType
            if (!is_string($valueListTypeValueItem)) {
                $invalidValues[] = is_object($valueListTypeValueItem) ? get_class($valueListTypeValueItem) : sprintf('%s(%s)', gettype($valueListTypeValueItem), var_export($valueListTypeValueItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The Value property can only contain items of type string, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setValue method
     * This method is willingly generated in order to preserve the one-line inline validation within the setValue method
     * This has to validate that the items contained by the array match the length constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateValueForMaxLengthConstraintFromSetValue(?array $values = null): string
    {
        $message = '';
        $invalidValues = [];
        foreach (($values ?? []) as $valueListTypeValueItem) {
            // validation for constraint: maxLength(256)
            if (mb_strlen((string) $valueListTypeValueItem) > 256) {
                $invalidValues[] = var_export($valueListTypeValueItem, true);
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('Invalid length for value(s) %s, the number of characters/octets contained by the literal must be less than or equal to 256', implode(', ', $invalidValues));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set Value value
     * @throws InvalidArgumentException
     * @param string[] $value
     * @return \StructType\ApiValueListType
     */
    public function setValue(?array $value = null): self
    {
        // validation for constraint: array
        if ('' !== ($valueArrayErrorMessage = self::validateValueForArrayConstraintFromSetValue($value))) {
            throw new InvalidArgumentException($valueArrayErrorMessage, __LINE__);
        }
        // validation for constraint: maxLength(256)
        if ('' !== ($valueMaxLengthErrorMessage = self::validateValueForMaxLengthConstraintFromSetValue($value))) {
            throw new InvalidArgumentException($valueMaxLengthErrorMessage, __LINE__);
        }
        $this->Value = $value;
        
        return $this;
    }
    /**
     * Add item to Value value
     * @throws InvalidArgumentException
     * @param string $item
     * @return \StructType\ApiValueListType
     */
    public function addToValue(string $item): self
    {
        // validation for constraint: itemType
        if (!is_string($item)) {
            throw new InvalidArgumentException(sprintf('The Value property can only contain items of type string, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        // validation for constraint: maxLength(256)
        if (mb_strlen((string) $item) > 256) {
            throw new InvalidArgumentException(sprintf('Invalid length of %s, the number of characters/octets contained by the literal must be less than or equal to 256', mb_strlen((string) $item)), __LINE__);
        }
        $this->Value[] = $item;
        
        return $this;
    }
}
