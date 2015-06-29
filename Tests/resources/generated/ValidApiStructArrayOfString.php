<?php
/**
 * File for class ApiStructArrayOfString
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
/**
 * This class stands for ApiStructArrayOfString originally named ArrayOfString
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
class ApiStructArrayOfString extends ApiWsdlClass
{
    /**
     * The string
     * Meta informations extracted from the WSDL
     * - maxOccurs : unbounded
     * - minOccurs : 0
     * @var string
     */
    public $string;
    /**
     * Constructor method for ArrayOfString
     * @see parent::__construct()
     * @param string $string
     * @return ApiStructArrayOfString
     */
    public function __construct($string = null)
    {
        parent::__construct(array('string'=>$string), false);
    }
    /**
     * Get string value
     * @return string|null
     */
    public function getString()
    {
        return $this->string;
    }
    /**
     * Set string value
     * @param string $string the string
     * @return string
     */
    public function setString($string)
    {
        return ($this->string = $string);
    }
    /**
     * Returns the current element
     * @see ApiWsdlClass::current()
     * @return string
     */
    public function current()
    {
        return parent::current();
    }
    /**
     * Returns the indexed element
     * @see ApiWsdlClass::item()
     * @param int $index
     * @return string
     */
    public function item($index)
    {
        return parent::item($index);
    }
    /**
     * Returns the first element
     * @see ApiWsdlClass::first()
     * @return string
     */
    public function first()
    {
        return parent::first();
    }
    /**
     * Returns the last element
     * @see ApiWsdlClass::last()
     * @return string
     */
    public function last()
    {
        return parent::last();
    }
    /**
     * Returns the element at the offset
     * @see ApiWsdlClass::last()
     * @param int $offset
     * @return string
     */
    public function offsetGet($offset)
    {
        return parent::offsetGet($offset);
    }
    /**
     * Returns the attribute name
     * @see ApiWsdlClass::getAttributeName()
     * @return string string
     */
    public function getAttributeName()
    {
        return 'string';
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see ApiWsdlClass::__set_state()
     * @uses ApiWsdlClass::__set_state()
     * @param array $array the exported values
     * @return ApiStructArrayOfString
     */
    public static function __set_state(array $array, $className = __CLASS__)
    {
        return parent::__set_state($array, $className);
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
