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
     * Meta information extracted from the WSDL
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
     * This method is responsible for validating the values passed to the setAdGroups method
     * This method is willingly generated in order to preserve the one-line inline validation within the setAdGroups method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateAdGroupsForArrayConstraintsFromSetAdGroups(array $values = array())
    {
        $message = '';
        $invalidValues = [];
        foreach ($values as $addRequestAdGroupsItem) {
            // validation for constraint: itemType
            if (!$addRequestAdGroupsItem instanceof \Api\StructType\ApiAdGroupAddItem) {
                $invalidValues[] = is_object($addRequestAdGroupsItem) ? get_class($addRequestAdGroupsItem) : sprintf('%s(%s)', gettype($addRequestAdGroupsItem), var_export($addRequestAdGroupsItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The AdGroups property can only contain items of type \Api\StructType\ApiAdGroupAddItem, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        return $message;
    }
    /**
     * Set AdGroups value
     * @throws \InvalidArgumentException
     * @param \Api\StructType\ApiAdGroupAddItem[] $adGroups
     * @return \Api\StructType\ApiAddRequest
     */
    public function setAdGroups(array $adGroups = array())
    {
        // validation for constraint: array
        if ('' !== ($adGroupsArrayErrorMessage = self::validateAdGroupsForArrayConstraintsFromSetAdGroups($adGroups))) {
            throw new \InvalidArgumentException($adGroupsArrayErrorMessage, __LINE__);
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
        // validation for constraint: itemType
        if (!$item instanceof \Api\StructType\ApiAdGroupAddItem) {
            throw new \InvalidArgumentException(sprintf('The AdGroups property can only contain items of type \Api\StructType\ApiAdGroupAddItem, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->AdGroups[] = $item;
        return $this;
    }
}
