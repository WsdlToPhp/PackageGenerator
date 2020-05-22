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
     * Meta information extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var int[]
     */
    public $CampaignIds;
    /**
     * The Ids
     * Meta information extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var int[]
     */
    public $Ids;
    /**
     * The Types
     * Meta information extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var string[]
     */
    public $Types;
    /**
     * The Statuses
     * Meta information extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var string[]
     */
    public $Statuses;
    /**
     * The TagIds
     * Meta information extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var int[]
     */
    public $TagIds;
    /**
     * The Tags
     * Meta information extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var string[]
     */
    public $Tags;
    /**
     * The AppIconStatuses
     * Meta information extracted from the WSDL
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
     * This method is responsible for validating the values passed to the setCampaignIds method
     * This method is willingly generated in order to preserve the one-line inline validation within the setCampaignIds method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateCampaignIdsForArrayConstraintsFromSetCampaignIds(array $values = array())
    {
        $message = '';
        $invalidValues = [];
        foreach ($values as $adGroupsSelectionCriteriaCampaignIdsItem) {
            // validation for constraint: itemType
            if (!(is_int($adGroupsSelectionCriteriaCampaignIdsItem) || ctype_digit($adGroupsSelectionCriteriaCampaignIdsItem))) {
                $invalidValues[] = is_object($adGroupsSelectionCriteriaCampaignIdsItem) ? get_class($adGroupsSelectionCriteriaCampaignIdsItem) : sprintf('%s(%s)', gettype($adGroupsSelectionCriteriaCampaignIdsItem), var_export($adGroupsSelectionCriteriaCampaignIdsItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The CampaignIds property can only contain items of type long, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        return $message;
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
        if ('' !== ($campaignIdsArrayErrorMessage = self::validateCampaignIdsForArrayConstraintsFromSetCampaignIds($campaignIds))) {
            throw new \InvalidArgumentException($campaignIdsArrayErrorMessage, __LINE__);
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
        if (!(is_int($item) || ctype_digit($item))) {
            throw new \InvalidArgumentException(sprintf('The CampaignIds property can only contain items of type long, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
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
     * This method is responsible for validating the values passed to the setIds method
     * This method is willingly generated in order to preserve the one-line inline validation within the setIds method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateIdsForArrayConstraintsFromSetIds(array $values = array())
    {
        $message = '';
        $invalidValues = [];
        foreach ($values as $adGroupsSelectionCriteriaIdsItem) {
            // validation for constraint: itemType
            if (!(is_int($adGroupsSelectionCriteriaIdsItem) || ctype_digit($adGroupsSelectionCriteriaIdsItem))) {
                $invalidValues[] = is_object($adGroupsSelectionCriteriaIdsItem) ? get_class($adGroupsSelectionCriteriaIdsItem) : sprintf('%s(%s)', gettype($adGroupsSelectionCriteriaIdsItem), var_export($adGroupsSelectionCriteriaIdsItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The Ids property can only contain items of type long, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        return $message;
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
        if ('' !== ($idsArrayErrorMessage = self::validateIdsForArrayConstraintsFromSetIds($ids))) {
            throw new \InvalidArgumentException($idsArrayErrorMessage, __LINE__);
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
        if (!(is_int($item) || ctype_digit($item))) {
            throw new \InvalidArgumentException(sprintf('The Ids property can only contain items of type long, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
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
     * This method is responsible for validating the values passed to the setTypes method
     * This method is willingly generated in order to preserve the one-line inline validation within the setTypes method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateTypesForArrayConstraintsFromSetTypes(array $values = array())
    {
        $message = '';
        $invalidValues = [];
        foreach ($values as $adGroupsSelectionCriteriaTypesItem) {
            // validation for constraint: enumeration
            if (!\Api\EnumType\ApiAdGroupTypesEnum::valueIsValid($adGroupsSelectionCriteriaTypesItem)) {
                $invalidValues[] = is_object($adGroupsSelectionCriteriaTypesItem) ? get_class($adGroupsSelectionCriteriaTypesItem) : sprintf('%s(%s)', gettype($adGroupsSelectionCriteriaTypesItem), var_export($adGroupsSelectionCriteriaTypesItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \Api\EnumType\ApiAdGroupTypesEnum', is_array($invalidValues) ? implode(', ', $invalidValues) : var_export($invalidValues, true), implode(', ', \Api\EnumType\ApiAdGroupTypesEnum::getValidValues()));
        }
        unset($invalidValues);
        return $message;
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
        if ('' !== ($typesArrayErrorMessage = self::validateTypesForArrayConstraintsFromSetTypes($types))) {
            throw new \InvalidArgumentException($typesArrayErrorMessage, __LINE__);
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
            throw new \InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \Api\EnumType\ApiAdGroupTypesEnum', is_array($item) ? implode(', ', $item) : var_export($item, true), implode(', ', \Api\EnumType\ApiAdGroupTypesEnum::getValidValues())), __LINE__);
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
     * This method is responsible for validating the values passed to the setStatuses method
     * This method is willingly generated in order to preserve the one-line inline validation within the setStatuses method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateStatusesForArrayConstraintsFromSetStatuses(array $values = array())
    {
        $message = '';
        $invalidValues = [];
        foreach ($values as $adGroupsSelectionCriteriaStatusesItem) {
            // validation for constraint: enumeration
            if (!\Api\EnumType\ApiStatusSelectionEnum::valueIsValid($adGroupsSelectionCriteriaStatusesItem)) {
                $invalidValues[] = is_object($adGroupsSelectionCriteriaStatusesItem) ? get_class($adGroupsSelectionCriteriaStatusesItem) : sprintf('%s(%s)', gettype($adGroupsSelectionCriteriaStatusesItem), var_export($adGroupsSelectionCriteriaStatusesItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \Api\EnumType\ApiStatusSelectionEnum', is_array($invalidValues) ? implode(', ', $invalidValues) : var_export($invalidValues, true), implode(', ', \Api\EnumType\ApiStatusSelectionEnum::getValidValues()));
        }
        unset($invalidValues);
        return $message;
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
        if ('' !== ($statusesArrayErrorMessage = self::validateStatusesForArrayConstraintsFromSetStatuses($statuses))) {
            throw new \InvalidArgumentException($statusesArrayErrorMessage, __LINE__);
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
            throw new \InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \Api\EnumType\ApiStatusSelectionEnum', is_array($item) ? implode(', ', $item) : var_export($item, true), implode(', ', \Api\EnumType\ApiStatusSelectionEnum::getValidValues())), __LINE__);
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
     * This method is responsible for validating the values passed to the setTagIds method
     * This method is willingly generated in order to preserve the one-line inline validation within the setTagIds method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateTagIdsForArrayConstraintsFromSetTagIds(array $values = array())
    {
        $message = '';
        $invalidValues = [];
        foreach ($values as $adGroupsSelectionCriteriaTagIdsItem) {
            // validation for constraint: itemType
            if (!(is_int($adGroupsSelectionCriteriaTagIdsItem) || ctype_digit($adGroupsSelectionCriteriaTagIdsItem))) {
                $invalidValues[] = is_object($adGroupsSelectionCriteriaTagIdsItem) ? get_class($adGroupsSelectionCriteriaTagIdsItem) : sprintf('%s(%s)', gettype($adGroupsSelectionCriteriaTagIdsItem), var_export($adGroupsSelectionCriteriaTagIdsItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The TagIds property can only contain items of type long, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        return $message;
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
        if ('' !== ($tagIdsArrayErrorMessage = self::validateTagIdsForArrayConstraintsFromSetTagIds($tagIds))) {
            throw new \InvalidArgumentException($tagIdsArrayErrorMessage, __LINE__);
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
        if (!(is_int($item) || ctype_digit($item))) {
            throw new \InvalidArgumentException(sprintf('The TagIds property can only contain items of type long, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
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
     * This method is responsible for validating the values passed to the setTags method
     * This method is willingly generated in order to preserve the one-line inline validation within the setTags method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateTagsForArrayConstraintsFromSetTags(array $values = array())
    {
        $message = '';
        $invalidValues = [];
        foreach ($values as $adGroupsSelectionCriteriaTagsItem) {
            // validation for constraint: itemType
            if (!is_string($adGroupsSelectionCriteriaTagsItem)) {
                $invalidValues[] = is_object($adGroupsSelectionCriteriaTagsItem) ? get_class($adGroupsSelectionCriteriaTagsItem) : sprintf('%s(%s)', gettype($adGroupsSelectionCriteriaTagsItem), var_export($adGroupsSelectionCriteriaTagsItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The Tags property can only contain items of type string, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        return $message;
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
        if ('' !== ($tagsArrayErrorMessage = self::validateTagsForArrayConstraintsFromSetTags($tags))) {
            throw new \InvalidArgumentException($tagsArrayErrorMessage, __LINE__);
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
            throw new \InvalidArgumentException(sprintf('The Tags property can only contain items of type string, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
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
     * This method is responsible for validating the values passed to the setAppIconStatuses method
     * This method is willingly generated in order to preserve the one-line inline validation within the setAppIconStatuses method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateAppIconStatusesForArrayConstraintsFromSetAppIconStatuses(array $values = array())
    {
        $message = '';
        $invalidValues = [];
        foreach ($values as $adGroupsSelectionCriteriaAppIconStatusesItem) {
            // validation for constraint: enumeration
            if (!\Api\EnumType\ApiStatusSelectionEnum::valueIsValid($adGroupsSelectionCriteriaAppIconStatusesItem)) {
                $invalidValues[] = is_object($adGroupsSelectionCriteriaAppIconStatusesItem) ? get_class($adGroupsSelectionCriteriaAppIconStatusesItem) : sprintf('%s(%s)', gettype($adGroupsSelectionCriteriaAppIconStatusesItem), var_export($adGroupsSelectionCriteriaAppIconStatusesItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \Api\EnumType\ApiStatusSelectionEnum', is_array($invalidValues) ? implode(', ', $invalidValues) : var_export($invalidValues, true), implode(', ', \Api\EnumType\ApiStatusSelectionEnum::getValidValues()));
        }
        unset($invalidValues);
        return $message;
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
        if ('' !== ($appIconStatusesArrayErrorMessage = self::validateAppIconStatusesForArrayConstraintsFromSetAppIconStatuses($appIconStatuses))) {
            throw new \InvalidArgumentException($appIconStatusesArrayErrorMessage, __LINE__);
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
            throw new \InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \Api\EnumType\ApiStatusSelectionEnum', is_array($item) ? implode(', ', $item) : var_export($item, true), implode(', ', \Api\EnumType\ApiStatusSelectionEnum::getValidValues())), __LINE__);
        }
        $this->AppIconStatuses[] = $item;
        return $this;
    }
}
