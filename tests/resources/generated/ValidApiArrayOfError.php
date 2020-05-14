<?php

namespace Api\ArrayType;

use \WsdlToPhp\PackageBase\AbstractStructArrayBase;

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
     * @var \Api\StructType\ApiError[]
     */
    public $Error;
    /**
     * Constructor method for ArrayOfError
     * @uses ApiArrayOfError::setError()
     * @param \Api\StructType\ApiError[] $error
     */
    public function __construct(array $error = array())
    {
        $this
            ->setError($error);
    }
    /**
     * Get Error value
     * @return \Api\StructType\ApiError[]|null
     */
    public function getError()
    {
        return $this->Error;
    }
    /**
     * This method is responsible for validating the values passed to the setError method
     * This method is willingly generated in order to preserve the one-line inline validation within the setError method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateErrorForArrayConstraintsFromSetError(array $values = array())
    {
        $message = '';
        $invalidValues = [];
        foreach ($values as $arrayOfErrorErrorItem) {
            // validation for constraint: itemType
            if (!$arrayOfErrorErrorItem instanceof \Api\StructType\ApiError) {
                $invalidValues[] = is_object($arrayOfErrorErrorItem) ? get_class($arrayOfErrorErrorItem) : sprintf('%s(%s)', gettype($arrayOfErrorErrorItem), var_export($arrayOfErrorErrorItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The Error property can only contain items of type \Api\StructType\ApiError, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        return $message;
    }
    /**
     * Set Error value
     * @throws \InvalidArgumentException
     * @param \Api\StructType\ApiError[] $error
     * @return \Api\ArrayType\ApiArrayOfError
     */
    public function setError(array $error = array())
    {
        // validation for constraint: array
        if ('' !== ($errorArrayErrorMessage = self::validateErrorForArrayConstraintsFromSetError($error))) {
            throw new \InvalidArgumentException($errorArrayErrorMessage, __LINE__);
        }
        $this->Error = $error;
        return $this;
    }
    /**
     * Add item to Error value
     * @throws \InvalidArgumentException
     * @param \Api\StructType\ApiError $item
     * @return \Api\ArrayType\ApiArrayOfError
     */
    public function addToError(\Api\StructType\ApiError $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \Api\StructType\ApiError) {
            throw new \InvalidArgumentException(sprintf('The Error property can only contain items of type \Api\StructType\ApiError, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->Error[] = $item;
        return $this;
    }
    /**
     * Returns the current element
     * @see AbstractStructArrayBase::current()
     * @return \Api\StructType\ApiError|null
     */
    public function current()
    {
        return parent::current();
    }
    /**
     * Returns the indexed element
     * @see AbstractStructArrayBase::item()
     * @param int $index
     * @return \Api\StructType\ApiError|null
     */
    public function item($index)
    {
        return parent::item($index);
    }
    /**
     * Returns the first element
     * @see AbstractStructArrayBase::first()
     * @return \Api\StructType\ApiError|null
     */
    public function first()
    {
        return parent::first();
    }
    /**
     * Returns the last element
     * @see AbstractStructArrayBase::last()
     * @return \Api\StructType\ApiError|null
     */
    public function last()
    {
        return parent::last();
    }
    /**
     * Returns the element at the offset
     * @see AbstractStructArrayBase::offsetGet()
     * @param int $offset
     * @return \Api\StructType\ApiError|null
     */
    public function offsetGet($offset)
    {
        return parent::offsetGet($offset);
    }
    /**
     * Returns the attribute name
     * @see AbstractStructArrayBase::getAttributeName()
     * @return string Error
     */
    public function getAttributeName()
    {
        return 'Error';
    }
}
