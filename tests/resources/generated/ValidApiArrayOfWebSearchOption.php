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
     * @var string[]
     */
    public $WebSearchOption;
    /**
     * Constructor method for ArrayOfWebSearchOption
     * @uses ApiArrayOfWebSearchOption::setWebSearchOption()
     * @param string[] $webSearchOption
     */
    public function __construct(array $webSearchOption = array())
    {
        $this
            ->setWebSearchOption($webSearchOption);
    }
    /**
     * Get WebSearchOption value
     * @return string[]|null
     */
    public function getWebSearchOption()
    {
        return $this->WebSearchOption;
    }
    /**
     * This method is responsible for validating the values passed to the method setWebSearchOption
     * This method is willingly generated in order to preserve the one-line inline validation within the setWebSearchOption method
     * @param array $values
     * @return string
     */
    public static function validateWebSearchOptionValuesFromSetWebSearchOption(array $values = array())
    {
        $message = '';
        $invalidValues = array();
        foreach ($values as $arrayOfWebSearchOptionWebSearchOptionItem) {
            // validation for constraint: enumeration
            if (!\Api\EnumType\ApiWebSearchOption::valueIsValid($arrayOfWebSearchOptionWebSearchOptionItem)) {
                $invalidValues[] = is_object($arrayOfWebSearchOptionWebSearchOptionItem) ? get_class($arrayOfWebSearchOptionWebSearchOptionItem) : var_export($arrayOfWebSearchOptionWebSearchOptionItem, true);
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \Api\EnumType\ApiWebSearchOption', is_array($invalidValues) ? implode(', ', $invalidValues) : $invalidValues, implode(', ', \Api\EnumType\ApiWebSearchOption::getValidValues()));
        }
        unset($invalidValues);
        return $message;
    }
    /**
     * Set WebSearchOption value
     * @uses \Api\EnumType\ApiWebSearchOption::valueIsValid()
     * @uses \Api\EnumType\ApiWebSearchOption::getValidValues()
     * @throws \InvalidArgumentException
     * @param string[] $webSearchOption
     * @return \Api\ArrayType\ApiArrayOfWebSearchOption
     */
    public function setWebSearchOption(array $webSearchOption = array())
    {
        // validation for constraint: array
        if ('' !== ($message = self::validateWebSearchOptionValuesFromSetWebSearchOption($webSearchOption))) {
            throw new \InvalidArgumentException($message, __LINE__);
        }
        $this->WebSearchOption = $webSearchOption;
        return $this;
    }
    /**
     * Add item to WebSearchOption value
     * @uses \Api\EnumType\ApiWebSearchOption::valueIsValid()
     * @uses \Api\EnumType\ApiWebSearchOption::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $item
     * @return \Api\ArrayType\ApiArrayOfWebSearchOption
     */
    public function addToWebSearchOption($item)
    {
        // validation for constraint: enumeration
        if (!\Api\EnumType\ApiWebSearchOption::valueIsValid($item)) {
            throw new \InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \Api\EnumType\ApiWebSearchOption', is_array($item) ? implode(', ', $item) : $item, implode(', ', \Api\EnumType\ApiWebSearchOption::getValidValues())), __LINE__);
        }
        $this->WebSearchOption[] = $item;
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
     * @throws \InvalidArgumentException
     * @uses \Api\EnumType\ApiWebSearchOption::valueIsValid()
     * @param string $item
     * @return \Api\ArrayType\ApiArrayOfWebSearchOption
     */
    public function add($item)
    {
        // validation for constraint: enumeration
        if (!\Api\EnumType\ApiWebSearchOption::valueIsValid($item)) {
            throw new \InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \Api\EnumType\ApiWebSearchOption', is_array($item) ? implode(', ', $item) : $item, implode(', ', \Api\EnumType\ApiWebSearchOption::getValidValues())), __LINE__);
        }
        return parent::add($item);
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
