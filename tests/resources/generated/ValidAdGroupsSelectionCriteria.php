<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

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
    protected ?array $CampaignIds = null;
    /**
     * The Ids
     * Meta information extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var int[]
     */
    protected ?array $Ids = null;
    /**
     * The Types
     * Meta information extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var string[]
     */
    protected ?array $Types = null;
    /**
     * The Statuses
     * Meta information extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var string[]
     */
    protected ?array $Statuses = null;
    /**
     * The TagIds
     * Meta information extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var int[]
     */
    protected ?array $TagIds = null;
    /**
     * The Tags
     * Meta information extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var string[]
     */
    protected ?array $Tags = null;
    /**
     * The AppIconStatuses
     * Meta information extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var string[]
     */
    protected ?array $AppIconStatuses = null;
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
    public function __construct(?array $campaignIds = null, ?array $ids = null, ?array $types = null, ?array $statuses = null, ?array $tagIds = null, ?array $tags = null, ?array $appIconStatuses = null)
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
     * @return int[]
     */
    public function getCampaignIds(): ?array
    {
        return $this->CampaignIds;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setCampaignIds method
     * This method is willingly generated in order to preserve the one-line inline validation within the setCampaignIds method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateCampaignIdsForArrayConstraintFromSetCampaignIds(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $adGroupsSelectionCriteriaCampaignIdsItem) {
            // validation for constraint: itemType
            if (!(is_int($adGroupsSelectionCriteriaCampaignIdsItem) || ctype_digit($adGroupsSelectionCriteriaCampaignIdsItem))) {
                $invalidValues[] = is_object($adGroupsSelectionCriteriaCampaignIdsItem) ? get_class($adGroupsSelectionCriteriaCampaignIdsItem) : sprintf('%s(%s)', gettype($adGroupsSelectionCriteriaCampaignIdsItem), var_export($adGroupsSelectionCriteriaCampaignIdsItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The CampaignIds property can only contain items of type int, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set CampaignIds value
     * @throws InvalidArgumentException
     * @param int[] $campaignIds
     * @return \StructType\ApiAdGroupsSelectionCriteria
     */
    public function setCampaignIds(?array $campaignIds = null): self
    {
        // validation for constraint: array
        if ('' !== ($campaignIdsArrayErrorMessage = self::validateCampaignIdsForArrayConstraintFromSetCampaignIds($campaignIds))) {
            throw new InvalidArgumentException($campaignIdsArrayErrorMessage, __LINE__);
        }
        $this->CampaignIds = $campaignIds;
        
        return $this;
    }
    /**
     * Add item to CampaignIds value
     * @throws InvalidArgumentException
     * @param int $item
     * @return \StructType\ApiAdGroupsSelectionCriteria
     */
    public function addToCampaignIds(int $item): self
    {
        // validation for constraint: itemType
        if (!(is_int($item) || ctype_digit($item))) {
            throw new InvalidArgumentException(sprintf('The CampaignIds property can only contain items of type int, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->CampaignIds[] = $item;
        
        return $this;
    }
    /**
     * Get Ids value
     * @return int[]
     */
    public function getIds(): ?array
    {
        return $this->Ids;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setIds method
     * This method is willingly generated in order to preserve the one-line inline validation within the setIds method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateIdsForArrayConstraintFromSetIds(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $adGroupsSelectionCriteriaIdsItem) {
            // validation for constraint: itemType
            if (!(is_int($adGroupsSelectionCriteriaIdsItem) || ctype_digit($adGroupsSelectionCriteriaIdsItem))) {
                $invalidValues[] = is_object($adGroupsSelectionCriteriaIdsItem) ? get_class($adGroupsSelectionCriteriaIdsItem) : sprintf('%s(%s)', gettype($adGroupsSelectionCriteriaIdsItem), var_export($adGroupsSelectionCriteriaIdsItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The Ids property can only contain items of type int, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set Ids value
     * @throws InvalidArgumentException
     * @param int[] $ids
     * @return \StructType\ApiAdGroupsSelectionCriteria
     */
    public function setIds(?array $ids = null): self
    {
        // validation for constraint: array
        if ('' !== ($idsArrayErrorMessage = self::validateIdsForArrayConstraintFromSetIds($ids))) {
            throw new InvalidArgumentException($idsArrayErrorMessage, __LINE__);
        }
        $this->Ids = $ids;
        
        return $this;
    }
    /**
     * Add item to Ids value
     * @throws InvalidArgumentException
     * @param int $item
     * @return \StructType\ApiAdGroupsSelectionCriteria
     */
    public function addToIds(int $item): self
    {
        // validation for constraint: itemType
        if (!(is_int($item) || ctype_digit($item))) {
            throw new InvalidArgumentException(sprintf('The Ids property can only contain items of type int, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->Ids[] = $item;
        
        return $this;
    }
    /**
     * Get Types value
     * @return string[]
     */
    public function getTypes(): ?array
    {
        return $this->Types;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setTypes method
     * This method is willingly generated in order to preserve the one-line inline validation within the setTypes method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateTypesForArrayConstraintFromSetTypes(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $adGroupsSelectionCriteriaTypesItem) {
            // validation for constraint: enumeration
            if (!\EnumType\ApiAdGroupTypesEnum::valueIsValid($adGroupsSelectionCriteriaTypesItem)) {
                $invalidValues[] = is_object($adGroupsSelectionCriteriaTypesItem) ? get_class($adGroupsSelectionCriteriaTypesItem) : sprintf('%s(%s)', gettype($adGroupsSelectionCriteriaTypesItem), var_export($adGroupsSelectionCriteriaTypesItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \EnumType\ApiAdGroupTypesEnum', is_array($invalidValues) ? implode(', ', $invalidValues) : var_export($invalidValues, true), implode(', ', \EnumType\ApiAdGroupTypesEnum::getValidValues()));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set Types value
     * @uses \EnumType\ApiAdGroupTypesEnum::valueIsValid()
     * @uses \EnumType\ApiAdGroupTypesEnum::getValidValues()
     * @throws InvalidArgumentException
     * @param string[] $types
     * @return \StructType\ApiAdGroupsSelectionCriteria
     */
    public function setTypes(?array $types = null): self
    {
        // validation for constraint: array
        if ('' !== ($typesArrayErrorMessage = self::validateTypesForArrayConstraintFromSetTypes($types))) {
            throw new InvalidArgumentException($typesArrayErrorMessage, __LINE__);
        }
        $this->Types = $types;
        
        return $this;
    }
    /**
     * Add item to Types value
     * @uses \EnumType\ApiAdGroupTypesEnum::valueIsValid()
     * @uses \EnumType\ApiAdGroupTypesEnum::getValidValues()
     * @throws InvalidArgumentException
     * @param string $item
     * @return \StructType\ApiAdGroupsSelectionCriteria
     */
    public function addToTypes(string $item): self
    {
        // validation for constraint: enumeration
        if (!\EnumType\ApiAdGroupTypesEnum::valueIsValid($item)) {
            throw new InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \EnumType\ApiAdGroupTypesEnum', is_array($item) ? implode(', ', $item) : var_export($item, true), implode(', ', \EnumType\ApiAdGroupTypesEnum::getValidValues())), __LINE__);
        }
        $this->Types[] = $item;
        
        return $this;
    }
    /**
     * Get Statuses value
     * @return string[]
     */
    public function getStatuses(): ?array
    {
        return $this->Statuses;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setStatuses method
     * This method is willingly generated in order to preserve the one-line inline validation within the setStatuses method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateStatusesForArrayConstraintFromSetStatuses(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $adGroupsSelectionCriteriaStatusesItem) {
            // validation for constraint: enumeration
            if (!\EnumType\ApiStatusSelectionEnum::valueIsValid($adGroupsSelectionCriteriaStatusesItem)) {
                $invalidValues[] = is_object($adGroupsSelectionCriteriaStatusesItem) ? get_class($adGroupsSelectionCriteriaStatusesItem) : sprintf('%s(%s)', gettype($adGroupsSelectionCriteriaStatusesItem), var_export($adGroupsSelectionCriteriaStatusesItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \EnumType\ApiStatusSelectionEnum', is_array($invalidValues) ? implode(', ', $invalidValues) : var_export($invalidValues, true), implode(', ', \EnumType\ApiStatusSelectionEnum::getValidValues()));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set Statuses value
     * @uses \EnumType\ApiStatusSelectionEnum::valueIsValid()
     * @uses \EnumType\ApiStatusSelectionEnum::getValidValues()
     * @throws InvalidArgumentException
     * @param string[] $statuses
     * @return \StructType\ApiAdGroupsSelectionCriteria
     */
    public function setStatuses(?array $statuses = null): self
    {
        // validation for constraint: array
        if ('' !== ($statusesArrayErrorMessage = self::validateStatusesForArrayConstraintFromSetStatuses($statuses))) {
            throw new InvalidArgumentException($statusesArrayErrorMessage, __LINE__);
        }
        $this->Statuses = $statuses;
        
        return $this;
    }
    /**
     * Add item to Statuses value
     * @uses \EnumType\ApiStatusSelectionEnum::valueIsValid()
     * @uses \EnumType\ApiStatusSelectionEnum::getValidValues()
     * @throws InvalidArgumentException
     * @param string $item
     * @return \StructType\ApiAdGroupsSelectionCriteria
     */
    public function addToStatuses(string $item): self
    {
        // validation for constraint: enumeration
        if (!\EnumType\ApiStatusSelectionEnum::valueIsValid($item)) {
            throw new InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \EnumType\ApiStatusSelectionEnum', is_array($item) ? implode(', ', $item) : var_export($item, true), implode(', ', \EnumType\ApiStatusSelectionEnum::getValidValues())), __LINE__);
        }
        $this->Statuses[] = $item;
        
        return $this;
    }
    /**
     * Get TagIds value
     * @return int[]
     */
    public function getTagIds(): ?array
    {
        return $this->TagIds;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setTagIds method
     * This method is willingly generated in order to preserve the one-line inline validation within the setTagIds method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateTagIdsForArrayConstraintFromSetTagIds(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $adGroupsSelectionCriteriaTagIdsItem) {
            // validation for constraint: itemType
            if (!(is_int($adGroupsSelectionCriteriaTagIdsItem) || ctype_digit($adGroupsSelectionCriteriaTagIdsItem))) {
                $invalidValues[] = is_object($adGroupsSelectionCriteriaTagIdsItem) ? get_class($adGroupsSelectionCriteriaTagIdsItem) : sprintf('%s(%s)', gettype($adGroupsSelectionCriteriaTagIdsItem), var_export($adGroupsSelectionCriteriaTagIdsItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The TagIds property can only contain items of type int, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set TagIds value
     * @throws InvalidArgumentException
     * @param int[] $tagIds
     * @return \StructType\ApiAdGroupsSelectionCriteria
     */
    public function setTagIds(?array $tagIds = null): self
    {
        // validation for constraint: array
        if ('' !== ($tagIdsArrayErrorMessage = self::validateTagIdsForArrayConstraintFromSetTagIds($tagIds))) {
            throw new InvalidArgumentException($tagIdsArrayErrorMessage, __LINE__);
        }
        $this->TagIds = $tagIds;
        
        return $this;
    }
    /**
     * Add item to TagIds value
     * @throws InvalidArgumentException
     * @param int $item
     * @return \StructType\ApiAdGroupsSelectionCriteria
     */
    public function addToTagIds(int $item): self
    {
        // validation for constraint: itemType
        if (!(is_int($item) || ctype_digit($item))) {
            throw new InvalidArgumentException(sprintf('The TagIds property can only contain items of type int, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->TagIds[] = $item;
        
        return $this;
    }
    /**
     * Get Tags value
     * @return string[]
     */
    public function getTags(): ?array
    {
        return $this->Tags;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setTags method
     * This method is willingly generated in order to preserve the one-line inline validation within the setTags method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateTagsForArrayConstraintFromSetTags(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
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
     * @throws InvalidArgumentException
     * @param string[] $tags
     * @return \StructType\ApiAdGroupsSelectionCriteria
     */
    public function setTags(?array $tags = null): self
    {
        // validation for constraint: array
        if ('' !== ($tagsArrayErrorMessage = self::validateTagsForArrayConstraintFromSetTags($tags))) {
            throw new InvalidArgumentException($tagsArrayErrorMessage, __LINE__);
        }
        $this->Tags = $tags;
        
        return $this;
    }
    /**
     * Add item to Tags value
     * @throws InvalidArgumentException
     * @param string $item
     * @return \StructType\ApiAdGroupsSelectionCriteria
     */
    public function addToTags(string $item): self
    {
        // validation for constraint: itemType
        if (!is_string($item)) {
            throw new InvalidArgumentException(sprintf('The Tags property can only contain items of type string, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->Tags[] = $item;
        
        return $this;
    }
    /**
     * Get AppIconStatuses value
     * @return string[]
     */
    public function getAppIconStatuses(): ?array
    {
        return $this->AppIconStatuses;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setAppIconStatuses method
     * This method is willingly generated in order to preserve the one-line inline validation within the setAppIconStatuses method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateAppIconStatusesForArrayConstraintFromSetAppIconStatuses(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $adGroupsSelectionCriteriaAppIconStatusesItem) {
            // validation for constraint: enumeration
            if (!\EnumType\ApiStatusSelectionEnum::valueIsValid($adGroupsSelectionCriteriaAppIconStatusesItem)) {
                $invalidValues[] = is_object($adGroupsSelectionCriteriaAppIconStatusesItem) ? get_class($adGroupsSelectionCriteriaAppIconStatusesItem) : sprintf('%s(%s)', gettype($adGroupsSelectionCriteriaAppIconStatusesItem), var_export($adGroupsSelectionCriteriaAppIconStatusesItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \EnumType\ApiStatusSelectionEnum', is_array($invalidValues) ? implode(', ', $invalidValues) : var_export($invalidValues, true), implode(', ', \EnumType\ApiStatusSelectionEnum::getValidValues()));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set AppIconStatuses value
     * @uses \EnumType\ApiStatusSelectionEnum::valueIsValid()
     * @uses \EnumType\ApiStatusSelectionEnum::getValidValues()
     * @throws InvalidArgumentException
     * @param string[] $appIconStatuses
     * @return \StructType\ApiAdGroupsSelectionCriteria
     */
    public function setAppIconStatuses(?array $appIconStatuses = null): self
    {
        // validation for constraint: array
        if ('' !== ($appIconStatusesArrayErrorMessage = self::validateAppIconStatusesForArrayConstraintFromSetAppIconStatuses($appIconStatuses))) {
            throw new InvalidArgumentException($appIconStatusesArrayErrorMessage, __LINE__);
        }
        $this->AppIconStatuses = $appIconStatuses;
        
        return $this;
    }
    /**
     * Add item to AppIconStatuses value
     * @uses \EnumType\ApiStatusSelectionEnum::valueIsValid()
     * @uses \EnumType\ApiStatusSelectionEnum::getValidValues()
     * @throws InvalidArgumentException
     * @param string $item
     * @return \StructType\ApiAdGroupsSelectionCriteria
     */
    public function addToAppIconStatuses(string $item): self
    {
        // validation for constraint: enumeration
        if (!\EnumType\ApiStatusSelectionEnum::valueIsValid($item)) {
            throw new InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \EnumType\ApiStatusSelectionEnum', is_array($item) ? implode(', ', $item) : var_export($item, true), implode(', ', \EnumType\ApiStatusSelectionEnum::getValidValues())), __LINE__);
        }
        $this->AppIconStatuses[] = $item;
        
        return $this;
    }
}
