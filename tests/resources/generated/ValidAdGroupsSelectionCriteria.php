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
     * @var long[]
     */
    public $CampaignIds;
    /**
     * The Ids
     * Meta informations extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var long[]
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
     * @var long[]
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
     * @param long[] $campaignIds
     * @param long[] $ids
     * @param string[] $types
     * @param string[] $statuses
     * @param long[] $tagIds
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
     * @return long[]|null
     */
    public function getCampaignIds()
    {
        return $this->CampaignIds;
    }
    /**
     * Set CampaignIds value
     * @throws \InvalidArgumentException
     * @param long[] $campaignIds
     * @return \Api\StructType\ApiAdGroupsSelectionCriteria
     */
    public function setCampaignIds(array $campaignIds = array())
    {
        array_walk($campaignIds, function($item) {
            if (!is_int($item)) {
                throw new \InvalidArgumentException(sprintf('The CampaignIds property can only contain items of long, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
            }
        });
        $this->CampaignIds = $campaignIds;
        return $this;
    }
    /**
     * Get Ids value
     * @return long[]|null
     */
    public function getIds()
    {
        return $this->Ids;
    }
    /**
     * Set Ids value
     * @throws \InvalidArgumentException
     * @param long[] $ids
     * @return \Api\StructType\ApiAdGroupsSelectionCriteria
     */
    public function setIds(array $ids = array())
    {
        array_walk($ids, function($item) {
            if (!is_int($item)) {
                throw new \InvalidArgumentException(sprintf('The Ids property can only contain items of long, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
            }
        });
        $this->Ids = $ids;
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
        if (!\Api\EnumType\ApiAdGroupTypesEnum::valueIsValid($types)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" is invalid, please use one of: %s', $types, implode(', ', \Api\EnumType\ApiAdGroupTypesEnum::getValidValues())), __LINE__);
        }
        $this->Types = $types;
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
        if (!\Api\EnumType\ApiStatusSelectionEnum::valueIsValid($statuses)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" is invalid, please use one of: %s', $statuses, implode(', ', \Api\EnumType\ApiStatusSelectionEnum::getValidValues())), __LINE__);
        }
        $this->Statuses = $statuses;
        return $this;
    }
    /**
     * Get TagIds value
     * @return long[]|null
     */
    public function getTagIds()
    {
        return $this->TagIds;
    }
    /**
     * Set TagIds value
     * @throws \InvalidArgumentException
     * @param long[] $tagIds
     * @return \Api\StructType\ApiAdGroupsSelectionCriteria
     */
    public function setTagIds(array $tagIds = array())
    {
        array_walk($tagIds, function($item) {
            if (!is_int($item)) {
                throw new \InvalidArgumentException(sprintf('The TagIds property can only contain items of long, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
            }
        });
        $this->TagIds = $tagIds;
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
        array_walk($tags, function($item) {
            if (!is_string($item)) {
                throw new \InvalidArgumentException(sprintf('The Tags property can only contain items of string, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
            }
        });
        $this->Tags = $tags;
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
        if (!\Api\EnumType\ApiStatusSelectionEnum::valueIsValid($appIconStatuses)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" is invalid, please use one of: %s', $appIconStatuses, implode(', ', \Api\EnumType\ApiStatusSelectionEnum::getValidValues())), __LINE__);
        }
        $this->AppIconStatuses = $appIconStatuses;
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
