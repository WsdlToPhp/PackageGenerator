<?php

declare(strict_types=1);

namespace Api\ArrayType;

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
     * @var \Api\StructType\ApiErrorProject[]
     */
    protected array $Error = [];
    /**
     * Constructor method for ArrayOfError
     * @uses ApiArrayOfErrorProject::setError()
     * @param \Api\StructType\ApiErrorProject[] $error
     */
    public function __construct(array $error = [])
    {
        $this
            ->setError($error);
    }
    /**
     * Get Error value
     * @return \Api\StructType\ApiErrorProject[]
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
            if (!$arrayOfErrorErrorItem instanceof \Api\StructType\ApiErrorProject) {
                $invalidValues[] = is_object($arrayOfErrorErrorItem) ? get_class($arrayOfErrorErrorItem) : sprintf('%s(%s)', gettype($arrayOfErrorErrorItem), var_export($arrayOfErrorErrorItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The Error property can only contain items of type \Api\StructType\ApiErrorProject, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set Error value
     * @throws InvalidArgumentException
     * @param \Api\StructType\ApiErrorProject[] $error
     * @return \Api\ArrayType\ApiArrayOfErrorProject
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
     * @return \Api\StructType\ApiErrorProject|null
     */
    public function current(): ?\Api\StructType\ApiErrorProject
    {
        return parent::current();
    }
    /**
     * Returns the indexed element
     * @see AbstractStructArrayBase::item()
     * @param int $index
     * @return \Api\StructType\ApiErrorProject|null
     */
    public function item($index): ?\Api\StructType\ApiErrorProject
    {
        return parent::item($index);
    }
    /**
     * Returns the first element
     * @see AbstractStructArrayBase::first()
     * @return \Api\StructType\ApiErrorProject|null
     */
    public function first(): ?\Api\StructType\ApiErrorProject
    {
        return parent::first();
    }
    /**
     * Returns the last element
     * @see AbstractStructArrayBase::last()
     * @return \Api\StructType\ApiErrorProject|null
     */
    public function last(): ?\Api\StructType\ApiErrorProject
    {
        return parent::last();
    }
    /**
     * Returns the element at the offset
     * @see AbstractStructArrayBase::offsetGet()
     * @param int $offset
     * @return \Api\StructType\ApiErrorProject|null
     */
    public function offsetGet($offset): ?\Api\StructType\ApiErrorProject
    {
        return parent::offsetGet($offset);
    }
    /**
     * Add element to array
     * @see AbstractStructArrayBase::add()
     * @throws InvalidArgumentException
     * @uses \Api\StructType\ApiErrorProject::valueIsValid()
     * @param \Api\StructType\ApiErrorProject $item
     * @return \Api\ArrayType\ApiArrayOfErrorProject
     */
    public function add(\Api\StructType\ApiErrorProject $item): self
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
