<?php

namespace Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for expiryDate StructType
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
class ApiExpiryDate extends AbstractStructBase
{
    /**
     * The month
     * Meta informations extracted from the WSDL
     * - use: required
     * @var string
     */
    public $month;
    /**
     * The year
     * Meta informations extracted from the WSDL
     * - use: required
     * @var string
     */
    public $year;
    /**
     * Constructor method for expiryDate
     * @uses ApiExpiryDate::setMonth()
     * @uses ApiExpiryDate::setYear()
     * @param string $month
     * @param string $year
     */
    public function __construct($month = null, $year = null)
    {
        $this
            ->setMonth($month)
            ->setYear($year);
    }
    /**
     * Get month value
     * @return string
     */
    public function getMonth()
    {
        return $this->month;
    }
    /**
     * Set month value
     * @param string $month
     * @return \Api\StructType\ApiExpiryDate
     */
    public function setMonth($month = null)
    {
        $this->month = $month;
        return $this;
    }
    /**
     * Get year value
     * @return string
     */
    public function getYear()
    {
        return $this->year;
    }
    /**
     * Set year value
     * @param string $year
     * @return \Api\StructType\ApiExpiryDate
     */
    public function setYear($year = null)
    {
        $this->year = $year;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Api\StructType\ApiExpiryDate
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
