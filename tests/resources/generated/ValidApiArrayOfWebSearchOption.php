<?php

namespace Api\ArrayType;

use \WsdlToPhp\PackageBase\AbstractStructArrayBase;

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
     * Meta informations extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var array
     */
    public $WebSearchOption;
    /**
     * Constructor method for ArrayOfWebSearchOption
     * @uses ApiArrayOfWebSearchOption::setWebSearchOption()
     * @param array $webSearchOption
     */
    public function __construct(array $webSearchOption = array())
    {
        $this
            ->setWebSearchOption($webSearchOption);
    }
    /**
     * Get WebSearchOption value
     * @return array
     */
    public function getWebSearchOption()
    {
        return $this->WebSearchOption;
    }
    /**
     * Set WebSearchOption value
     * @param array $webSearchOption
     * @return \Api\ArrayType\ApiArrayOfWebSearchOption
     */
    public function setWebSearchOption(array $webSearchOption = array())
    {
        $this->WebSearchOption = $webSearchOption;
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
     * Add element to array
     * @see AbstractStructArrayBase::add()
     * @uses \Api\EnumType\ApiWebSearchOption::valueIsValid()
     * @param string $item
     * @return \Api\ArrayType\ApiArrayOfWebSearchOption|bool
     */
    public function add($item)
    {
        return \Api\EnumType\ApiWebSearchOption::valueIsValid($item) ? parent::add($item) : false;
    }
    /**
     * Returns the attribute name
     * @see AbstractStructArrayBase::getAttributeName()
     * @return string WebSearchOption
     */
    public function getAttributeName()
    {
        return 'WebSearchOption';
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructArrayBase::__set_state()
     * @uses AbstractStructArrayBase::__set_state()
     * @param array $array the exported values
     * @return \Api\ArrayType\ApiArrayOfWebSearchOption
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
