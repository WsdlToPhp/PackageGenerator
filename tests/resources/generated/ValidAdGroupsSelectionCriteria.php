<?php

namespace Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for AdGroupsSelectionCriteria StructType
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
class ApiAdGroupsSelectionCriteria extends AbstractStructBase
{
    /**
     * The CampaignIds
     * Meta informations extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var int[]
     */
    public $CampaignIds;
    /**
     * The Ids
     * Meta informations extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var int[]
     */
    public $Ids;
    /**
     * The Types
     * Meta informations extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var string[]
     */
    public $Types;
    /**
     * The Statuses
     * Meta informations extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var string[]
     */
    public $Statuses;
    /**
     * The TagIds
     * Meta informations extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var int[]
     */
    public $TagIds;
    /**
     * The Tags
     * Meta informations extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var string[]
     */
    public $Tags;
    /**
     * The AppIconStatuses
     * Meta informations extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var string[]
     */
    public $AppIconStatuses;
    /**
     * Constructor method for AdGroupsSelectionCriteria
     * @uses ApiAdGroupsSelectionCriteria::setCampaignIds()
     * @uses ApiAdGroupsSelectionCriteria::setIds()
     * @uses ApiAdGroupsSelectionCriteria::setTypes()
     * @uses ApiAdGroupsSelectionCriteria::setStatuses()
     * @uses ApiAdGroupsSelectionCriteria::setTagIds()
     * @uses ApiAdGroupsSelectionCriteria::setTags()
     * @uses ApiAdGroupsSelectionCriteria::setAppIconStatuses()
     * @param int[] $campaignIds
     * @param int[] $ids
     * @param string[] $types
     * @param string[] $statuses
     * @param int[] $tagIds
     * @param string[] $tags
     * @param string[] $appIconStatuses
     */
    public function __construct(array $campaignIds = array(), array $ids = array(), array $types = array(), array $statuses = array(), array $tagIds = array(), array $tags = array(), array $appIconStatuses = array())
    {
        $this
            ->setCampaignIds($campaignIds)
            ->setIds($ids)
            ->setTypes($types)
            ->setStatuses($statuses)
            ->setTagIds($tagIds)
            ->setTags($tags)
            ->setAppIconStatuses($appIconStatuses);
    }
    /**
     * Get CampaignIds value
     * @return int[]|null
     */
    public function getCampaignIds()
    {
        return $this->CampaignIds;
    }
    /**
     * Set CampaignIds value
     * @throws \InvalidArgumentException
     * @param int[] $campaignIds
     * @return \Api\StructType\ApiAdGroupsSelectionCriteria
     */
    public function setCampaignIds(array $campaignIds = array())
    {
        // validation for constraint: array
        foreach ($campaignIds as $adGroupsSelectionCriteriaCampaignIdsItem) {
            // validation for constraint: itemType
            if (!is_numeric($adGroupsSelectionCriteriaCampaignIdsItem)) {
                throw new \InvalidArgumentException(sprintf('The CampaignIds property can only contain items of long, "%s" given', is_object($adGroupsSelectionCriteriaCampaignIdsItem) ? get_class($adGroupsSelectionCriteriaCampaignIdsItem) : gettype($adGroupsSelectionCriteriaCampaignIdsItem)), __LINE__);
            }
        }
        $this->CampaignIds = $campaignIds;
        return $this;
    }
    /**
     * Add item to CampaignIds value
     * @throws \InvalidArgumentException
     * @param int $item
     * @return \Api\StructType\ApiAdGroupsSelectionCriteria
     */
    public function addToCampaignIds($item)
    {
        // validation for constraint: itemType
        if (!is_numeric($item)) {
            throw new \InvalidArgumentException(sprintf('The CampaignIds property can only contain items of long, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
        }
        $this->CampaignIds[] = $item;
        return $this;
    }
    /**
     * Get Ids value
     * @return int[]|null
     */
    public function getIds()
    {
        return $this->Ids;
    }
    /**
     * Set Ids value
     * @throws \InvalidArgumentException
     * @param int[] $ids
     * @return \Api\StructType\ApiAdGroupsSelectionCriteria
     */
    public function setIds(array $ids = array())
    {
        // validation for constraint: array
        foreach ($ids as $adGroupsSelectionCriteriaIdsItem) {
            // validation for constraint: itemType
            if (!is_numeric($adGroupsSelectionCriteriaIdsItem)) {
                throw new \InvalidArgumentException(sprintf('The Ids property can only contain items of long, "%s" given', is_object($adGroupsSelectionCriteriaIdsItem) ? get_class($adGroupsSelectionCriteriaIdsItem) : gettype($adGroupsSelectionCriteriaIdsItem)), __LINE__);
            }
        }
        $this->Ids = $ids;
        return $this;
    }
    /**
     * Add item to Ids value
     * @throws \InvalidArgumentException
     * @param int $item
     * @return \Api\StructType\ApiAdGroupsSelectionCriteria
     */
    public function addToIds($item)
    {
        // validation for constraint: itemType
        if (!is_numeric($item)) {
            throw new \InvalidArgumentException(sprintf('The Ids property can only contain items of long, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
        }
        $this->Ids[] = $item;
        return $this;
    }
    /**
     * Get Types value
     * @return string[]|null
     */
    public function getTypes()
    {
        return $this->Types;
    }
    /**
     * Set Types value
     * @uses \Api\EnumType\ApiAdGroupTypesEnum::valueIsValid()
     * @uses \Api\EnumType\ApiAdGroupTypesEnum::getValidValues()
     * @throws \InvalidArgumentException
     * @param string[] $types
     * @return \Api\StructType\ApiAdGroupsSelectionCriteria
     */
    public function setTypes(array $types = array())
    {
        // validation for constraint: array
        $invalidValues = array();
        foreach ($types as $adGroupsSelectionCriteriaTypesItem) {
            if (!\Api\EnumType\ApiAdGroupTypesEnum::valueIsValid($adGroupsSelectionCriteriaTypesItem)) {
                $invalidValues[] = var_export($adGroupsSelectionCriteriaTypesItem, true);
            }
        }
        if (!empty($invalidValues)) {
            throw new \InvalidArgumentException(sprintf('Value(s) "%s" is/are invalid, please use one of: %s', implode(', ', $invalidValues), implode(', ', \Api\EnumType\ApiAdGroupTypesEnum::getValidValues())), __LINE__);
        }
        $this->Types = $types;
        return $this;
    }
    /**
     * Add item to Types value
     * @uses \Api\EnumType\ApiAdGroupTypesEnum::valueIsValid()
     * @uses \Api\EnumType\ApiAdGroupTypesEnum::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $item
     * @return \Api\StructType\ApiAdGroupsSelectionCriteria
     */
    public function addToTypes($item)
    {
        // validation for constraint: enumeration
        if (!\Api\EnumType\ApiAdGroupTypesEnum::valueIsValid($item)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" is invalid, please use one of: %s', $item, implode(', ', \Api\EnumType\ApiAdGroupTypesEnum::getValidValues())), __LINE__);
        }
        $this->Types[] = $item;
        return $this;
    }
    /**
     * Get Statuses value
     * @return string[]|null
     */
    public function getStatuses()
    {
        return $this->Statuses;
    }
    /**
     * Set Statuses value
     * @uses \Api\EnumType\ApiStatusSelectionEnum::valueIsValid()
     * @uses \Api\EnumType\ApiStatusSelectionEnum::getValidValues()
     * @throws \InvalidArgumentException
     * @param string[] $statuses
     * @return \Api\StructType\ApiAdGroupsSelectionCriteria
     */
    public function setStatuses(array $statuses = array())
    {
        // validation for constraint: array
        $invalidValues = array();
        foreach ($statuses as $adGroupsSelectionCriteriaStatusesItem) {
            if (!\Api\EnumType\ApiStatusSelectionEnum::valueIsValid($adGroupsSelectionCriteriaStatusesItem)) {
                $invalidValues[] = var_export($adGroupsSelectionCriteriaStatusesItem, true);
            }
        }
        if (!empty($invalidValues)) {
            throw new \InvalidArgumentException(sprintf('Value(s) "%s" is/are invalid, please use one of: %s', implode(', ', $invalidValues), implode(', ', \Api\EnumType\ApiStatusSelectionEnum::getValidValues())), __LINE__);
        }
        $this->Statuses = $statuses;
        return $this;
    }
    /**
     * Add item to Statuses value
     * @uses \Api\EnumType\ApiStatusSelectionEnum::valueIsValid()
     * @uses \Api\EnumType\ApiStatusSelectionEnum::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $item
     * @return \Api\StructType\ApiAdGroupsSelectionCriteria
     */
    public function addToStatuses($item)
    {
        // validation for constraint: enumeration
        if (!\Api\EnumType\ApiStatusSelectionEnum::valueIsValid($item)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" is invalid, please use one of: %s', $item, implode(', ', \Api\EnumType\ApiStatusSelectionEnum::getValidValues())), __LINE__);
        }
        $this->Statuses[] = $item;
        return $this;
    }
    /**
     * Get TagIds value
     * @return int[]|null
     */
    public function getTagIds()
    {
        return $this->TagIds;
    }
    /**
     * Set TagIds value
     * @throws \InvalidArgumentException
     * @param int[] $tagIds
     * @return \Api\StructType\ApiAdGroupsSelectionCriteria
     */
    public function setTagIds(array $tagIds = array())
    {
        // validation for constraint: array
        foreach ($tagIds as $adGroupsSelectionCriteriaTagIdsItem) {
            // validation for constraint: itemType
            if (!is_numeric($adGroupsSelectionCriteriaTagIdsItem)) {
                throw new \InvalidArgumentException(sprintf('The TagIds property can only contain items of long, "%s" given', is_object($adGroupsSelectionCriteriaTagIdsItem) ? get_class($adGroupsSelectionCriteriaTagIdsItem) : gettype($adGroupsSelectionCriteriaTagIdsItem)), __LINE__);
            }
        }
        $this->TagIds = $tagIds;
        return $this;
    }
    /**
     * Add item to TagIds value
     * @throws \InvalidArgumentException
     * @param int $item
     * @return \Api\StructType\ApiAdGroupsSelectionCriteria
     */
    public function addToTagIds($item)
    {
        // validation for constraint: itemType
        if (!is_numeric($item)) {
            throw new \InvalidArgumentException(sprintf('The TagIds property can only contain items of long, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
        }
        $this->TagIds[] = $item;
        return $this;
    }
    /**
     * Get Tags value
     * @return string[]|null
     */
    public function getTags()
    {
        return $this->Tags;
    }
    /**
     * Set Tags value
     * @throws \InvalidArgumentException
     * @param string[] $tags
     * @return \Api\StructType\ApiAdGroupsSelectionCriteria
     */
    public function setTags(array $tags = array())
    {
        // validation for constraint: array
        foreach ($tags as $adGroupsSelectionCriteriaTagsItem) {
            // validation for constraint: itemType
            if (!is_string($adGroupsSelectionCriteriaTagsItem)) {
                throw new \InvalidArgumentException(sprintf('The Tags property can only contain items of string, "%s" given', is_object($adGroupsSelectionCriteriaTagsItem) ? get_class($adGroupsSelectionCriteriaTagsItem) : gettype($adGroupsSelectionCriteriaTagsItem)), __LINE__);
            }
        }
        $this->Tags = $tags;
        return $this;
    }
    /**
     * Add item to Tags value
     * @throws \InvalidArgumentException
     * @param string $item
     * @return \Api\StructType\ApiAdGroupsSelectionCriteria
     */
    public function addToTags($item)
    {
        // validation for constraint: itemType
        if (!is_string($item)) {
            throw new \InvalidArgumentException(sprintf('The Tags property can only contain items of string, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
        }
        $this->Tags[] = $item;
        return $this;
    }
    /**
     * Get AppIconStatuses value
     * @return string[]|null
     */
    public function getAppIconStatuses()
    {
        return $this->AppIconStatuses;
    }
    /**
     * Set AppIconStatuses value
     * @uses \Api\EnumType\ApiStatusSelectionEnum::valueIsValid()
     * @uses \Api\EnumType\ApiStatusSelectionEnum::getValidValues()
     * @throws \InvalidArgumentException
     * @param string[] $appIconStatuses
     * @return \Api\StructType\ApiAdGroupsSelectionCriteria
     */
    public function setAppIconStatuses(array $appIconStatuses = array())
    {
        // validation for constraint: array
        $invalidValues = array();
        foreach ($appIconStatuses as $adGroupsSelectionCriteriaAppIconStatusesItem) {
            if (!\Api\EnumType\ApiStatusSelectionEnum::valueIsValid($adGroupsSelectionCriteriaAppIconStatusesItem)) {
                $invalidValues[] = var_export($adGroupsSelectionCriteriaAppIconStatusesItem, true);
            }
        }
        if (!empty($invalidValues)) {
            throw new \InvalidArgumentException(sprintf('Value(s) "%s" is/are invalid, please use one of: %s', implode(', ', $invalidValues), implode(', ', \Api\EnumType\ApiStatusSelectionEnum::getValidValues())), __LINE__);
        }
        $this->AppIconStatuses = $appIconStatuses;
        return $this;
    }
    /**
     * Add item to AppIconStatuses value
     * @uses \Api\EnumType\ApiStatusSelectionEnum::valueIsValid()
     * @uses \Api\EnumType\ApiStatusSelectionEnum::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $item
     * @return \Api\StructType\ApiAdGroupsSelectionCriteria
     */
    public function addToAppIconStatuses($item)
    {
        // validation for constraint: enumeration
        if (!\Api\EnumType\ApiStatusSelectionEnum::valueIsValid($item)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" is invalid, please use one of: %s', $item, implode(', ', \Api\EnumType\ApiStatusSelectionEnum::getValidValues())), __LINE__);
        }
        $this->AppIconStatuses[] = $item;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Api\StructType\ApiAdGroupsSelectionCriteria
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
