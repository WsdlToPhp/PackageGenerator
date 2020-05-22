<?php

namespace Api\ArrayType;

use \WsdlToPhp\PackageBase\AbstractStructArrayBase;

/**
 * This class stands for ArrayOfString ArrayType
 * @package Api
 * @subpackage Arrays
 * @release 1.1.0
 */
class ApiArrayOfString extends AbstractStructArrayBase
{
    /**
     * The string
     * Meta information extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var string[]
     */
    public $string;
    /**
     * Constructor method for ArrayOfString
     * @uses ApiArrayOfString::setString()
     * @param string[] $string
     */
    public function __construct(array $string = array())
    {
        $this
            ->setString($string);
    }
    /**
     * Get string value
     * @return string[]|null
     */
    public function getString()
    {
        return $this->string;
    }
    /**
     * This method is responsible for validating the values passed to the setString method
     * This method is willingly generated in order to preserve the one-line inline validation within the setString method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateStringForArrayConstraintsFromSetString(array $values = array())
    {
        $message = '';
        $invalidValues = [];
        foreach ($values as $arrayOfStringStringItem) {
            // validation for constraint: itemType
            if (!is_string($arrayOfStringStringItem)) {
                $invalidValues[] = is_object($arrayOfStringStringItem) ? get_class($arrayOfStringStringItem) : sprintf('%s(%s)', gettype($arrayOfStringStringItem), var_export($arrayOfStringStringItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The string property can only contain items of type string, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        return $message;
    }
    /**
     * Set string value
     * @throws \InvalidArgumentException
     * @param string[] $string
     * @return \Api\ArrayType\ApiArrayOfString
     */
    public function setString(array $string = array())
    {
        // validation for constraint: array
        if ('' !== ($stringArrayErrorMessage = self::validateStringForArrayConstraintsFromSetString($string))) {
            throw new \InvalidArgumentException($stringArrayErrorMessage, __LINE__);
        }
        $this->string = $string;
        return $this;
    }
    /**
     * Add item to string value
     * @throws \InvalidArgumentException
     * @param string $item
     * @return \Api\ArrayType\ApiArrayOfString
     */
    public function addToString($item)
    {
        // validation for constraint: itemType
        if (!is_string($item)) {
            throw new \InvalidArgumentException(sprintf('The string property can only contain items of type string, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->string[] = $item;
        return $this;
    }
    /**
     * Returns the current element
     * @see AbstractStructArrayBase::current()
     * @return string|null
     */
    public function current()
    {
        return parent::current();
    }
    /**
     * Returns the indexed element
     * @see AbstractStructArrayBase::item()
     * @param int $index
     * @return string|null
     */
    public function item($index)
    {
        return parent::item($index);
    }
    /**
     * Returns the first element
     * @see AbstractStructArrayBase::first()
     * @return string|null
     */
    public function first()
    {
        return parent::first();
    }
    /**
     * Returns the last element
     * @see AbstractStructArrayBase::last()
     * @return string|null
     */
    public function last()
    {
        return parent::last();
    }
    /**
     * Returns the element at the offset
     * @see AbstractStructArrayBase::offsetGet()
     * @param int $offset
     * @return string|null
     */
    public function offsetGet($offset)
    {
        return parent::offsetGet($offset);
    }
    /**
     * Returns the attribute name
     * @see AbstractStructArrayBase::getAttributeName()
     * @return string string
     */
    public function getAttributeName()
    {
        return 'string';
    }
}
