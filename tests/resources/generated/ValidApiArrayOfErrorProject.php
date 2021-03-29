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
class ApiArrayOfErrorProject extends AbstractStructArrayBase
{
    /**
     * The Error
     * Meta information extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var \StructType\ApiErrorProject[]
     */
    protected array $Error = [];
    /**
     * Constructor method for ArrayOfError
     * @uses ApiArrayOfErrorProject::setError()
     * @param \StructType\ApiErrorProject[] $error
     */
    public function __construct(array $error = [])
    {
        $this
            ->setError($error);
    }
    /**
     * Get Error value
     * @return \StructType\ApiErrorProject[]
     */
    public function getError(): array
    {
        return $this->Error;
    }
    /**
     * This method is responsible for validating the values passed to the setError method
     * This method is willingly generated in order to preserve the one-line inline validation within the setError method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateErrorForArrayConstraintsFromSetError(array $values = []): string
    {
        $message = '';
        $invalidValues = [];
        foreach ($values as $arrayOfErrorErrorItem) {
            // validation for constraint: itemType
            if (!$arrayOfErrorErrorItem instanceof \StructType\ApiErrorProject) {
                $invalidValues[] = is_object($arrayOfErrorErrorItem) ? get_class($arrayOfErrorErrorItem) : sprintf('%s(%s)', gettype($arrayOfErrorErrorItem), var_export($arrayOfErrorErrorItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The Error property can only contain items of type \StructType\ApiErrorProject, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set Error value
     * @throws InvalidArgumentException
     * @param \StructType\ApiErrorProject[] $error
     * @return \ArrayType\ApiArrayOfErrorProject
     */
    public function setError(array $error = []): self
    {
        // validation for constraint: array
        if ('' !== ($errorArrayErrorMessage = self::validateErrorForArrayConstraintsFromSetError($error))) {
            throw new InvalidArgumentException($errorArrayErrorMessage, __LINE__);
        }
        $this->Error = $error;
        
        return $this;
    }
    /**
     * Returns the current element
     * @see AbstractStructArrayBase::current()
     * @return \StructType\ApiErrorProject|null
     */
    public function current(): ?\StructType\ApiErrorProject
    {
        return parent::current();
    }
    /**
     * Returns the indexed element
     * @see AbstractStructArrayBase::item()
     * @param int $index
     * @return \StructType\ApiErrorProject|null
     */
    public function item($index): ?\StructType\ApiErrorProject
    {
        return parent::item($index);
    }
    /**
     * Returns the first element
     * @see AbstractStructArrayBase::first()
     * @return \StructType\ApiErrorProject|null
     */
    public function first(): ?\StructType\ApiErrorProject
    {
        return parent::first();
    }
    /**
     * Returns the last element
     * @see AbstractStructArrayBase::last()
     * @return \StructType\ApiErrorProject|null
     */
    public function last(): ?\StructType\ApiErrorProject
    {
        return parent::last();
    }
    /**
     * Returns the element at the offset
     * @see AbstractStructArrayBase::offsetGet()
     * @param int $offset
     * @return \StructType\ApiErrorProject|null
     */
    public function offsetGet($offset): ?\StructType\ApiErrorProject
    {
        return parent::offsetGet($offset);
    }
    /**
     * Add element to array
     * @see AbstractStructArrayBase::add()
     * @throws InvalidArgumentException
     * @param \StructType\ApiErrorProject $item
     * @return \ArrayType\ApiArrayOfErrorProject
     */
    public function add(\StructType\ApiErrorProject $item): self
    {
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
