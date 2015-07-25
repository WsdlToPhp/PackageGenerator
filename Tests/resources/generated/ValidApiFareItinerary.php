<?php

namespace Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for fareItinerary StructType
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
class ApiFareItinerary extends AbstractStructBase
{
    /**
     * The price
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var \Api\StructType\ApiFareItineraryPrice
     */
    public $price;
    /**
     * The key
     * Meta informations extracted from the WSDL
     * - use: required
     * @var string
     */
    public $key;
    /**
     * The firstSegmentsIds
     * Meta informations extracted from the WSDL
     * - use: required
     * @var int[]
     */
    public $firstSegmentsIds;
    /**
     * The clickoutURLParams
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $clickoutURLParams;
    /**
     * The resident
     * @var boolean
     */
    public $resident;
    /**
     * The secondSegmentsIds
     * @var int[]
     */
    public $secondSegmentsIds;
    /**
     * The thirdSegmentsIds
     * @var int[]
     */
    public $thirdSegmentsIds;
    /**
     * Constructor method for fareItinerary
     * @uses ApiFareItinerary::setPrice()
     * @uses ApiFareItinerary::setKey()
     * @uses ApiFareItinerary::setFirstSegmentsIds()
     * @uses ApiFareItinerary::setClickoutURLParams()
     * @uses ApiFareItinerary::setResident()
     * @uses ApiFareItinerary::setSecondSegmentsIds()
     * @uses ApiFareItinerary::setThirdSegmentsIds()
     * @param \Api\StructType\ApiFareItineraryPrice $price
     * @param string $key
     * @param int[] $firstSegmentsIds
     * @param string $clickoutURLParams
     * @param boolean $resident
     * @param int[] $secondSegmentsIds
     * @param int[] $thirdSegmentsIds
     */
    public function __construct(\Api\StructType\ApiFareItineraryPrice $price = null, $key = null, $firstSegmentsIds = null, $clickoutURLParams = null, $resident = null, $secondSegmentsIds = null, $thirdSegmentsIds = null)
    {
        $this
            ->setPrice($price)
            ->setKey($key)
            ->setFirstSegmentsIds($firstSegmentsIds)
            ->setClickoutURLParams($clickoutURLParams)
            ->setResident($resident)
            ->setSecondSegmentsIds($secondSegmentsIds)
            ->setThirdSegmentsIds($thirdSegmentsIds);
    }
    /**
     * Get price value
     * @return \Api\StructType\ApiFareItineraryPrice
     */
    public function getPrice()
    {
        return $this->price;
    }
    /**
     * Set price value
     * @param \Api\StructType\ApiFareItineraryPrice $price
     * @return \Api\StructType\ApiFareItinerary
     */
    public function setPrice(\Api\StructType\ApiFareItineraryPrice $price = null)
    {
        $this->price = $price;
        return $this;
    }
    /**
     * Get key value
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }
    /**
     * Set key value
     * @param string $key
     * @return \Api\StructType\ApiFareItinerary
     */
    public function setKey($key = null)
    {
        $this->key = $key;
        return $this;
    }
    /**
     * Get firstSegmentsIds value
     * @return int[]
     */
    public function getFirstSegmentsIds()
    {
        return $this->firstSegmentsIds;
    }
    /**
     * Set firstSegmentsIds value
     * @param int[] $firstSegmentsIds
     * @return \Api\StructType\ApiFareItinerary
     */
    public function setFirstSegmentsIds($firstSegmentsIds = null)
    {
        $this->firstSegmentsIds = $firstSegmentsIds;
        return $this;
    }
    /**
     * Get clickoutURLParams value
     * @return string|null
     */
    public function getClickoutURLParams()
    {
        return $this->clickoutURLParams;
    }
    /**
     * Set clickoutURLParams value
     * @param string $clickoutURLParams
     * @return \Api\StructType\ApiFareItinerary
     */
    public function setClickoutURLParams($clickoutURLParams = null)
    {
        $this->clickoutURLParams = $clickoutURLParams;
        return $this;
    }
    /**
     * Get resident value
     * @return boolean|null
     */
    public function getResident()
    {
        return $this->resident;
    }
    /**
     * Set resident value
     * @param boolean $resident
     * @return \Api\StructType\ApiFareItinerary
     */
    public function setResident($resident = null)
    {
        $this->resident = $resident;
        return $this;
    }
    /**
     * Get secondSegmentsIds value
     * @return int[]|null
     */
    public function getSecondSegmentsIds()
    {
        return $this->secondSegmentsIds;
    }
    /**
     * Set secondSegmentsIds value
     * @param int[] $secondSegmentsIds
     * @return \Api\StructType\ApiFareItinerary
     */
    public function setSecondSegmentsIds($secondSegmentsIds = null)
    {
        $this->secondSegmentsIds = $secondSegmentsIds;
        return $this;
    }
    /**
     * Get thirdSegmentsIds value
     * @return int[]|null
     */
    public function getThirdSegmentsIds()
    {
        return $this->thirdSegmentsIds;
    }
    /**
     * Set thirdSegmentsIds value
     * @param int[] $thirdSegmentsIds
     * @return \Api\StructType\ApiFareItinerary
     */
    public function setThirdSegmentsIds($thirdSegmentsIds = null)
    {
        $this->thirdSegmentsIds = $thirdSegmentsIds;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Api\StructType\ApiFareItinerary
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
