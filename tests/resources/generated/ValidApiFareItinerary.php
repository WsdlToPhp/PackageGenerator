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
     * @var bool
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
     * @param bool $resident
     * @param int[] $secondSegmentsIds
     * @param int[] $thirdSegmentsIds
     */
    public function __construct(\Api\StructType\ApiFareItineraryPrice $price = null, $key = null, array $firstSegmentsIds = array(), $clickoutURLParams = null, $resident = null, array $secondSegmentsIds = array(), array $thirdSegmentsIds = array())
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
     * @throws \InvalidArgumentException
     * @param int[] $firstSegmentsIds
     * @return \Api\StructType\ApiFareItinerary
     */
    public function setFirstSegmentsIds(array $firstSegmentsIds = array())
    {
        foreach ($firstSegmentsIds as $fareItineraryFirstSegmentsIdsItem) {
            if (!is_int($fareItineraryFirstSegmentsIdsItem)) {
                throw new \InvalidArgumentException(sprintf('The firstSegmentsIds property can only contain items of int, "%s" given', is_object($fareItineraryFirstSegmentsIdsItem) ? get_class($fareItineraryFirstSegmentsIdsItem) : gettype($fareItineraryFirstSegmentsIdsItem)), __LINE__);
            }
        }
        $this->firstSegmentsIds = $firstSegmentsIds;
        return $this;
    }
    /**
     * Add item to firstSegmentsIds value
     * @throws \InvalidArgumentException
     * @param int $item
     * @return \Api\StructType\ApiFareItinerary
     */
    public function addToFirstSegmentsIds($item)
    {
        if (!is_int($item)) {
            throw new \InvalidArgumentException(sprintf('The firstSegmentsIds property can only contain items of int, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
        }
        $this->firstSegmentsIds[] = $item;
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
     * @return bool|null
     */
    public function getResident()
    {
        return $this->resident;
    }
    /**
     * Set resident value
     * @param bool $resident
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
     * @throws \InvalidArgumentException
     * @param int[] $secondSegmentsIds
     * @return \Api\StructType\ApiFareItinerary
     */
    public function setSecondSegmentsIds(array $secondSegmentsIds = array())
    {
        foreach ($secondSegmentsIds as $fareItinerarySecondSegmentsIdsItem) {
            if (!is_int($fareItinerarySecondSegmentsIdsItem)) {
                throw new \InvalidArgumentException(sprintf('The secondSegmentsIds property can only contain items of int, "%s" given', is_object($fareItinerarySecondSegmentsIdsItem) ? get_class($fareItinerarySecondSegmentsIdsItem) : gettype($fareItinerarySecondSegmentsIdsItem)), __LINE__);
            }
        }
        $this->secondSegmentsIds = $secondSegmentsIds;
        return $this;
    }
    /**
     * Add item to secondSegmentsIds value
     * @throws \InvalidArgumentException
     * @param int $item
     * @return \Api\StructType\ApiFareItinerary
     */
    public function addToSecondSegmentsIds($item)
    {
        if (!is_int($item)) {
            throw new \InvalidArgumentException(sprintf('The secondSegmentsIds property can only contain items of int, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
        }
        $this->secondSegmentsIds[] = $item;
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
     * @throws \InvalidArgumentException
     * @param int[] $thirdSegmentsIds
     * @return \Api\StructType\ApiFareItinerary
     */
    public function setThirdSegmentsIds(array $thirdSegmentsIds = array())
    {
        foreach ($thirdSegmentsIds as $fareItineraryThirdSegmentsIdsItem) {
            if (!is_int($fareItineraryThirdSegmentsIdsItem)) {
                throw new \InvalidArgumentException(sprintf('The thirdSegmentsIds property can only contain items of int, "%s" given', is_object($fareItineraryThirdSegmentsIdsItem) ? get_class($fareItineraryThirdSegmentsIdsItem) : gettype($fareItineraryThirdSegmentsIdsItem)), __LINE__);
            }
        }
        $this->thirdSegmentsIds = $thirdSegmentsIds;
        return $this;
    }
    /**
     * Add item to thirdSegmentsIds value
     * @throws \InvalidArgumentException
     * @param int $item
     * @return \Api\StructType\ApiFareItinerary
     */
    public function addToThirdSegmentsIds($item)
    {
        if (!is_int($item)) {
            throw new \InvalidArgumentException(sprintf('The thirdSegmentsIds property can only contain items of int, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
        }
        $this->thirdSegmentsIds[] = $item;
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
