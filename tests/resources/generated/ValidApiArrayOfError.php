<?php

declare(strict_types=1);

namespace ArrayType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructArrayBase;

/**
 * This class stands for ArrayOfError ArrayType
 * @package Api
 * @subpackage Arrays
 * @release 1.1.0
 */
class ApiArrayOfError extends AbstractStructArrayBase
{
    /**
     * The Error
     * Meta information extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var \StructType\ApiError[]
     */
    protected ?array $Error = null;
    /**
     * Constructor method for ArrayOfError
     * @uses ApiArrayOfError::setError()
     * @param \StructType\ApiError[] $error
     */
    public function __construct(?array $error = null)
    {
        $this
            ->setError($error);
    }
    /**
     * Get Error value
     * @return \StructType\ApiError[]
     */
    public function getError(): ?array
    {
        return $this->Error;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setError method
     * This method is willingly generated in order to preserve the one-line inline validation within the setError method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateErrorForArrayConstraintFromSetError(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $arrayOfErrorErrorItem) {
            // validation for constraint: itemType
            if (!$arrayOfErrorErrorItem instanceof \StructType\ApiError) {
                $invalidValues[] = is_object($arrayOfErrorErrorItem) ? get_class($arrayOfErrorErrorItem) : sprintf('%s(%s)', gettype($arrayOfErrorErrorItem), var_export($arrayOfErrorErrorItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The Error property can only contain items of type \StructType\ApiError, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set Error value
     * @throws InvalidArgumentException
     * @param \StructType\ApiError[] $error
     * @return \ArrayType\ApiArrayOfError
     */
    public function setError(?array $error = null): self
    {
        // validation for constraint: array
        if ('' !== ($errorArrayErrorMessage = self::validateErrorForArrayConstraintFromSetError($error))) {
            throw new InvalidArgumentException($errorArrayErrorMessage, __LINE__);
        }
        $this->Error = $error;
        
        return $this;
    }
    /**
     * Returns the current element
     * @see AbstractStructArrayBase::current()
     * @return \StructType\ApiError|null
     */
    public function current(): ?\StructType\ApiError
    {
        return parent::current();
    }
    /**
     * Returns the indexed element
     * @see AbstractStructArrayBase::item()
     * @param int $index
     * @return \StructType\ApiError|null
     */
    public function item($index): ?\StructType\ApiError
    {
        return parent::item($index);
    }
    /**
     * Returns the first element
     * @see AbstractStructArrayBase::first()
     * @return \StructType\ApiError|null
     */
    public function first(): ?\StructType\ApiError
    {
        return parent::first();
    }
    /**
     * Returns the last element
     * @see AbstractStructArrayBase::last()
     * @return \StructType\ApiError|null
     */
    public function last(): ?\StructType\ApiError
    {
        return parent::last();
    }
    /**
     * Returns the element at the offset
     * @see AbstractStructArrayBase::offsetGet()
     * @param int $offset
     * @return \StructType\ApiError|null
     */
    public function offsetGet($offset): ?\StructType\ApiError
    {
        return parent::offsetGet($offset);
    }
    /**
     * Add element to array
     * @see AbstractStructArrayBase::add()
     * @throws InvalidArgumentException
     * @param \StructType\ApiError $item
     * @return \ArrayType\ApiArrayOfError
     */
    public function add($item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ApiError) {
            throw new InvalidArgumentException(sprintf('The Error property can only contain items of type \StructType\ApiError, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        return parent::add($item);
    }
    /**
     * Returns the attribute name
     * @see AbstractStructArrayBase::getAttributeName()
     * @return string Error
     */
    public function getAttributeName(): string
    {
        return 'Error';
    }
}
