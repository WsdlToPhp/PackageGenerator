<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for AddRequest StructType
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
#[\AllowDynamicProperties]
class ApiAddRequest extends AbstractStructBase
{
    /**
     * The AdGroups
     * Meta information extracted from the WSDL
     * - maxOccurs: unbounded | 1
     * - minOccurs: 1
     * @var \StructType\ApiAdGroupAddItem[]
     */
    protected array $AdGroups;
    /**
     * Constructor method for AddRequest
     * @uses ApiAddRequest::setAdGroups()
     * @param \StructType\ApiAdGroupAddItem[] $adGroups
     */
    public function __construct(array $adGroups)
    {
        $this
            ->setAdGroups($adGroups);
    }
    /**
     * Get AdGroups value
     * @return \StructType\ApiAdGroupAddItem[]
     */
    public function getAdGroups(): array
    {
        return $this->AdGroups;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setAdGroups method
     * This method is willingly generated in order to preserve the one-line inline validation within the setAdGroups method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateAdGroupsForArrayConstraintFromSetAdGroups(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $addRequestAdGroupsItem) {
            // validation for constraint: itemType
            if (!$addRequestAdGroupsItem instanceof \StructType\ApiAdGroupAddItem) {
                $invalidValues[] = is_object($addRequestAdGroupsItem) ? get_class($addRequestAdGroupsItem) : sprintf('%s(%s)', gettype($addRequestAdGroupsItem), var_export($addRequestAdGroupsItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The AdGroups property can only contain items of type \StructType\ApiAdGroupAddItem, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set AdGroups value
     * @throws InvalidArgumentException
     * @param \StructType\ApiAdGroupAddItem[] $adGroups
     * @return \StructType\ApiAddRequest
     */
    public function setAdGroups(array $adGroups): self
    {
        // validation for constraint: array
        if ('' !== ($adGroupsArrayErrorMessage = self::validateAdGroupsForArrayConstraintFromSetAdGroups($adGroups))) {
            throw new InvalidArgumentException($adGroupsArrayErrorMessage, __LINE__);
        }
        $this->AdGroups = $adGroups;
        
        return $this;
    }
    /**
     * Add item to AdGroups value
     * @throws InvalidArgumentException
     * @param \StructType\ApiAdGroupAddItem $item
     * @return \StructType\ApiAddRequest
     */
    public function addToAdGroups(\StructType\ApiAdGroupAddItem $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ApiAdGroupAddItem) {
            throw new InvalidArgumentException(sprintf('The AdGroups property can only contain items of type \StructType\ApiAdGroupAddItem, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->AdGroups[] = $item;
        
        return $this;
    }
}
