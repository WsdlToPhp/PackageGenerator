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
     * Meta informations extracted from the WSDL
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
     * Set string value
     * @throws \InvalidArgumentException
     * @param string[] $string
     * @return \Api\ArrayType\ApiArrayOfString
     */
    public function setString(array $string = array())
    {
        // validation for constraint: array
        foreach ($string as $arrayOfStringStringItem) {
            // validation for constraint: itemType
            if (!is_string($arrayOfStringStringItem)) {
                throw new \InvalidArgumentException(sprintf('The string property can only contain items of string, "%s" given', is_object($arrayOfStringStringItem) ? get_class($arrayOfStringStringItem) : gettype($arrayOfStringStringItem)), __LINE__);
            }
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
            throw new \InvalidArgumentException(sprintf('The string property can only contain items of string, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
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
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructArrayBase::__set_state()
     * @uses AbstractStructArrayBase::__set_state()
     * @param array $array the exported values
     * @return \Api\ArrayType\ApiArrayOfString
     */
    public static function __set_state(array $array)
    {
        return parent::__set_state($array);
    }
    /**
     * Method returning the class name
     * @return string __CLASS__
     */
    public function __toString()
    {
        return __CLASS__;
    }
}
