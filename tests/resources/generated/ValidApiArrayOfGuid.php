<?php

declare(strict_types=1);

namespace ArrayType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructArrayBase;

/**
 * This class stands for ArrayOfGuid ArrayType
 * @package Api
 * @subpackage Arrays
 * @release 1.1.0
 */
class ApiArrayOfGuid extends AbstractStructArrayBase
{
    /**
     * The string
     * Meta information extracted from the WSDL
     * - base: xsd:string
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * - pattern: [\da-fA-F]{8}-[\da-fA-F]{4}-[\da-fA-F]{4}-[\da-fA-F]{4}-[\da-fA-F]{12}
     * @var string[]
     */
    protected ?array $string = null;
    /**
     * Constructor method for ArrayOfGuid
     * @uses ApiArrayOfGuid::setString()
     * @param string[] $string
     */
    public function __construct(?array $string = null)
    {
        $this
            ->setString($string);
    }
    /**
     * Get string value
     * @return string[]
     */
    public function getString(): ?array
    {
        return $this->string;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setString method
     * This method is willingly generated in order to preserve the one-line inline validation within the setString method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateStringForArrayConstraintFromSetString(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $arrayOfGuidStringItem) {
            // validation for constraint: itemType
            if (!is_string($arrayOfGuidStringItem)) {
                $invalidValues[] = is_object($arrayOfGuidStringItem) ? get_class($arrayOfGuidStringItem) : sprintf('%s(%s)', gettype($arrayOfGuidStringItem), var_export($arrayOfGuidStringItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The string property can only contain items of type string, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setString method
     * This method is willingly generated in order to preserve the one-line inline validation within the setString method
     * This has to validate that the items contained by the array match the defined pattern
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateStringForPatternConstraintFromSetString(?array $values = null): string
    {
        $message = '';
        $invalidValues = [];
        foreach (($values ?? []) as $arrayOfGuidStringItem) {
            // validation for constraint: pattern([\da-fA-F]{8}-[\da-fA-F]{4}-[\da-fA-F]{4}-[\da-fA-F]{4}-[\da-fA-F]{12})
            if (!preg_match('/[\\da-fA-F]{8}-[\\da-fA-F]{4}-[\\da-fA-F]{4}-[\\da-fA-F]{4}-[\\da-fA-F]{12}/', (string) $arrayOfGuidStringItem)) {
                $invalidValues[] = var_export($arrayOfGuidStringItem, true);
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('Invalid value(s) %s, please provide literals that are among the set of character sequences denoted by the regular expression /[\\da-fA-F]{8}-[\\da-fA-F]{4}-[\\da-fA-F]{4}-[\\da-fA-F]{4}-[\\da-fA-F]{12}/\'', implode(', ', $invalidValues));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set string value
     * @throws InvalidArgumentException
     * @param string[] $string
     * @return \ArrayType\ApiArrayOfGuid
     */
    public function setString(?array $string = null): self
    {
        // validation for constraint: array
        if ('' !== ($stringArrayErrorMessage = self::validateStringForArrayConstraintFromSetString($string))) {
            throw new InvalidArgumentException($stringArrayErrorMessage, __LINE__);
        }
        // validation for constraint: pattern([\da-fA-F]{8}-[\da-fA-F]{4}-[\da-fA-F]{4}-[\da-fA-F]{4}-[\da-fA-F]{12})
        if ('' !== ($stringPatternErrorMessage = self::validateStringForPatternConstraintFromSetString($string))) {
            throw new InvalidArgumentException($stringPatternErrorMessage, __LINE__);
        }
        $this->string = $string;
        
        return $this;
    }
    /**
     * Returns the current element
     * @see AbstractStructArrayBase::current()
     * @return string|null
     */
    public function current(): ?string
    {
        return parent::current();
    }
    /**
     * Returns the indexed element
     * @see AbstractStructArrayBase::item()
     * @param int $index
     * @return string|null
     */
    public function item($index): ?string
    {
        return parent::item($index);
    }
    /**
     * Returns the first element
     * @see AbstractStructArrayBase::first()
     * @return string|null
     */
    public function first(): ?string
    {
        return parent::first();
    }
    /**
     * Returns the last element
     * @see AbstractStructArrayBase::last()
     * @return string|null
     */
    public function last(): ?string
    {
        return parent::last();
    }
    /**
     * Returns the element at the offset
     * @see AbstractStructArrayBase::offsetGet()
     * @param int $offset
     * @return string|null
     */
    public function offsetGet($offset): ?string
    {
        return parent::offsetGet($offset);
    }
    /**
     * Add element to array
     * @see AbstractStructArrayBase::add()
     * @throws InvalidArgumentException
     * @param string $item
     * @return \ArrayType\ApiArrayOfGuid
     */
    public function add($item): self
    {
        // validation for constraint: itemType
        if (!is_string($item)) {
            throw new InvalidArgumentException(sprintf('The string property can only contain items of type string, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        // validation for constraint: pattern([\da-fA-F]{8}-[\da-fA-F]{4}-[\da-fA-F]{4}-[\da-fA-F]{4}-[\da-fA-F]{12})
        if (!preg_match('/[\\da-fA-F]{8}-[\\da-fA-F]{4}-[\\da-fA-F]{4}-[\\da-fA-F]{4}-[\\da-fA-F]{12}/', (string) $item)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a literal that is among the set of character sequences denoted by the regular expression /[\\da-fA-F]{8}-[\\da-fA-F]{4}-[\\da-fA-F]{4}-[\\da-fA-F]{4}-[\\da-fA-F]{12}/', var_export($item, true)), __LINE__);
        }
        return parent::add($item);
    }
    /**
     * Returns the attribute name
     * @see AbstractStructArrayBase::getAttributeName()
     * @return string string
     */
    public function getAttributeName(): string
    {
        return 'string';
    }
}
