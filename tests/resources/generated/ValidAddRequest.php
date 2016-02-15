<?php

namespace Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for AddRequest StructType
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
class ApiAddRequest extends AbstractStructBase
{
    /**
     * The AdGroups
     * Meta informations extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 1
     * @var \Api\StructType\ApiAdGroupAddItem[]
     */
    public $AdGroups;
    /**
     * Constructor method for AddRequest
     * @uses ApiAddRequest::setAdGroups()
     * @param \Api\StructType\ApiAdGroupAddItem[] $adGroups
     */
    public function __construct(array $adGroups = array())
    {
        $this
            ->setAdGroups($adGroups);
    }
    /**
     * Get AdGroups value
     * @return \Api\StructType\ApiAdGroupAddItem[]
     */
    public function getAdGroups()
    {
        return $this->AdGroups;
    }
    /**
     * Set AdGroups value
     * @throws \InvalidArgumentException
     * @param \Api\StructType\ApiAdGroupAddItem[] $adGroups
     * @return \Api\StructType\ApiAddRequest
     */
    public function setAdGroups(array $adGroups = array())
    {
        foreach ($adGroups as $addRequestAdGroupsItem) {
            if (!$addRequestAdGroupsItem instanceof \Api\StructType\ApiAdGroupAddItem) {
                throw new \InvalidArgumentException(sprintf('The AdGroups property can only contain items of \Api\StructType\ApiAdGroupAddItem, "%s" given', is_object($addRequestAdGroupsItem) ? get_class($addRequestAdGroupsItem) : gettype($addRequestAdGroupsItem)), __LINE__);
            }
        }
        $this->AdGroups = $adGroups;
        return $this;
    }
    /**
     * Add item to AdGroups value
     * @throws \InvalidArgumentException
     * @param \Api\StructType\ApiAdGroupAddItem $item
     * @return \Api\StructType\ApiAddRequest
     */
    public function addToAdGroups(\Api\StructType\ApiAdGroupAddItem $item)
    {
        if (!$item instanceof \Api\StructType\ApiAdGroupAddItem) {
            throw new \InvalidArgumentException(sprintf('The AdGroups property can only contain items of \Api\StructType\ApiAdGroupAddItem, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
        }
        $this->AdGroups[] = $item;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Api\StructType\ApiAddRequest
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
