<?php

declare(strict_types=1);

namespace ArrayType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructArrayBase;

/**
 * This class stands for ArrayOfWebSearchOption ArrayType
 * @package Api
 * @subpackage Arrays
 * @release 1.1.0
 */
class ApiArrayOfWebSearchOption extends AbstractStructArrayBase
{
    /**
     * The WebSearchOption
     * Meta information extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var string[]
     */
    protected ?array $WebSearchOption = null;
    /**
     * Constructor method for ArrayOfWebSearchOption
     * @uses ApiArrayOfWebSearchOption::setWebSearchOption()
     * @param string[] $webSearchOption
     */
    public function __construct(?array $webSearchOption = null)
    {
        $this
            ->setWebSearchOption($webSearchOption);
    }
    /**
     * Get WebSearchOption value
     * @return string[]
     */
    public function getWebSearchOption(): ?array
    {
        return $this->WebSearchOption;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setWebSearchOption method
     * This method is willingly generated in order to preserve the one-line inline validation within the setWebSearchOption method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateWebSearchOptionForArrayConstraintFromSetWebSearchOption(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $arrayOfWebSearchOptionWebSearchOptionItem) {
            // validation for constraint: enumeration
            if (!\EnumType\ApiWebSearchOption::valueIsValid($arrayOfWebSearchOptionWebSearchOptionItem)) {
                $invalidValues[] = is_object($arrayOfWebSearchOptionWebSearchOptionItem) ? get_class($arrayOfWebSearchOptionWebSearchOptionItem) : sprintf('%s(%s)', gettype($arrayOfWebSearchOptionWebSearchOptionItem), var_export($arrayOfWebSearchOptionWebSearchOptionItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \EnumType\ApiWebSearchOption', is_array($invalidValues) ? implode(', ', $invalidValues) : var_export($invalidValues, true), implode(', ', \EnumType\ApiWebSearchOption::getValidValues()));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set WebSearchOption value
     * @uses \EnumType\ApiWebSearchOption::valueIsValid()
     * @uses \EnumType\ApiWebSearchOption::getValidValues()
     * @throws InvalidArgumentException
     * @param string[] $webSearchOption
     * @return \ArrayType\ApiArrayOfWebSearchOption
     */
    public function setWebSearchOption(?array $webSearchOption = null): self
    {
        // validation for constraint: array
        if ('' !== ($webSearchOptionArrayErrorMessage = self::validateWebSearchOptionForArrayConstraintFromSetWebSearchOption($webSearchOption))) {
            throw new InvalidArgumentException($webSearchOptionArrayErrorMessage, __LINE__);
        }
        $this->WebSearchOption = $webSearchOption;
        
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
     * @return \ArrayType\ApiArrayOfWebSearchOption
     */
    public function add($item): self
    {
        // validation for constraint: enumeration
        if (!\EnumType\ApiWebSearchOption::valueIsValid($item)) {
            throw new InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \EnumType\ApiWebSearchOption', is_array($item) ? implode(', ', $item) : var_export($item, true), implode(', ', \EnumType\ApiWebSearchOption::getValidValues())), __LINE__);
        }
        return parent::add($item);
    }
    /**
     * Returns the attribute name
     * @see AbstractStructArrayBase::getAttributeName()
     * @return string WebSearchOption
     */
    public function getAttributeName(): string
    {
        return 'WebSearchOption';
    }
}
