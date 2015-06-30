<?php
/**
 * File for class ApiStructVideoRequest
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
/**
 * This class stands for VideoRequest Struct
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
class ApiStructVideoRequest extends ApiWsdlClass
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
     * @var ApiStructArrayOfString
     */
    public $Filters;
    /**
     * The SortBy
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var ApiEnumVideoSortOption
     */
    public $SortBy;
    /**
     * Constructor method for VideoRequest
     * @see parent::__construct()
     * @param unsignedInt $offset
     * @param unsignedInt $count
     * @param ApiStructArrayOfString $filters
     * @param ApiEnumVideoSortOption $sortBy
     */
    public function __construct($offset = null, $count = null, $filters = null, $sortBy = null)
    {
        parent::__construct(array('Offset'=>$offset, 'Count'=>$count, 'Filters'=>($filters instanceof ApiStructArrayOfString) ? $filters : new ApiStructArrayOfString($filters), 'SortBy'=>$sortBy), false);
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
     * @return ApiStructVideoRequest
     */
    public function setOffset($offset)
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
     * @return ApiStructVideoRequest
     */
    public function setCount($count)
    {
        $this->Count = $count;
        return $this;
    }
    /**
     * Get Filters value
     * @return ApiStructArrayOfString|null
     */
    public function getFilters()
    {
        return $this->Filters;
    }
    /**
     * Set Filters value
     * @param ApiStructArrayOfString $filters
     * @return ApiStructVideoRequest
     */
    public function setFilters($filters)
    {
        $this->Filters = $filters;
        return $this;
    }
    /**
     * Get SortBy value
     * @return ApiEnumVideoSortOption|null
     */
    public function getSortBy()
    {
        return $this->SortBy;
    }
    /**
     * Set SortBy value
     * @uses ApiEnumVideoSortOption::valueIsValid()
     * @param ApiEnumVideoSortOption $sortBy
     * @return ApiStructVideoRequest
     */
    public function setSortBy($sortBy)
    {
        if(!ApiEnumVideoSortOption::valueIsValid($sortBy)) {
            return false;
        }
        $this->SortBy = $sortBy;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see ApiWsdlClass::__set_state()
     * @uses ApiWsdlClass::__set_state()
     * @param array $array the exported values
     * @return ApiStructVideoRequest
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
