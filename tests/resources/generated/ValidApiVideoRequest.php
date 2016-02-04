<?php

namespace Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for VideoRequest StructType
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
class ApiVideoRequest extends AbstractStructBase
{
    /**
     * The Offset
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var unsignedInt
     */
    public $Offset;
    /**
     * The Count
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var unsignedInt
     */
    public $Count;
    /**
     * The Filters
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Api\ArrayType\ApiArrayOfString
     */
    public $Filters;
    /**
     * The SortBy
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $SortBy;
    /**
     * Constructor method for VideoRequest
     * @uses ApiVideoRequest::setOffset()
     * @uses ApiVideoRequest::setCount()
     * @uses ApiVideoRequest::setFilters()
     * @uses ApiVideoRequest::setSortBy()
     * @param unsignedInt $offset
     * @param unsignedInt $count
     * @param \Api\ArrayType\ApiArrayOfString $filters
     * @param string $sortBy
     */
    public function __construct($offset = null, $count = null, \Api\ArrayType\ApiArrayOfString $filters = null, $sortBy = null)
    {
        $this
            ->setOffset($offset)
            ->setCount($count)
            ->setFilters($filters)
            ->setSortBy($sortBy);
    }
    /**
     * Get Offset value
     * @return unsignedInt|null
     */
    public function getOffset()
    {
        return $this->Offset;
    }
    /**
     * Set Offset value
     * @param unsignedInt $offset
     * @return \Api\StructType\ApiVideoRequest
     */
    public function setOffset($offset = null)
    {
        $this->Offset = $offset;
        return $this;
    }
    /**
     * Get Count value
     * @return unsignedInt|null
     */
    public function getCount()
    {
        return $this->Count;
    }
    /**
     * Set Count value
     * @param unsignedInt $count
     * @return \Api\StructType\ApiVideoRequest
     */
    public function setCount($count = null)
    {
        $this->Count = $count;
        return $this;
    }
    /**
     * Get Filters value
     * @return \Api\ArrayType\ApiArrayOfString|null
     */
    public function getFilters()
    {
        return $this->Filters;
    }
    /**
     * Set Filters value
     * @param \Api\ArrayType\ApiArrayOfString $filters
     * @return \Api\StructType\ApiVideoRequest
     */
    public function setFilters(\Api\ArrayType\ApiArrayOfString $filters = null)
    {
        $this->Filters = $filters;
        return $this;
    }
    /**
     * Get SortBy value
     * @return string|null
     */
    public function getSortBy()
    {
        return $this->SortBy;
    }
    /**
     * Set SortBy value
     * @uses \Api\EnumType\ApiVideoSortOption::valueIsValid()
     * @uses \Api\EnumType\ApiVideoSortOption::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $sortBy
     * @return \Api\StructType\ApiVideoRequest
     */
    public function setSortBy($sortBy = null)
    {
        if (!\Api\EnumType\ApiVideoSortOption::valueIsValid($sortBy)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" is invalid, please use one of: %s', $sortBy, implode(', ', \Api\EnumType\ApiVideoSortOption::getValidValues())), __LINE__);
        }
        $this->SortBy = $sortBy;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Api\StructType\ApiVideoRequest
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
