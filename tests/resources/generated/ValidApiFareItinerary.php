<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

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
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var \StructType\ApiFareItineraryPrice
     */
    protected \StructType\ApiFareItineraryPrice $price;
    /**
     * The key
     * Meta information extracted from the WSDL
     * - use: required
     * @var string
     */
    protected string $key;
    /**
     * The firstSegmentsIds
     * Meta information extracted from the WSDL
     * - use: required
     * @var int[]
     */
    protected array $firstSegmentsIds;
    /**
     * The clickoutURLParams
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $clickoutURLParams = null;
    /**
     * The resident
     * @var bool|null
     */
    protected ?bool $resident = null;
    /**
     * The secondSegmentsIds
     * @var int[]
     */
    protected ?array $secondSegmentsIds = null;
    /**
     * The thirdSegmentsIds
     * @var int[]
     */
    protected ?array $thirdSegmentsIds = null;
    /**
     * Constructor method for fareItinerary
     * @uses ApiFareItinerary::setPrice()
     * @uses ApiFareItinerary::setKey()
     * @uses ApiFareItinerary::setFirstSegmentsIds()
     * @uses ApiFareItinerary::setClickoutURLParams()
     * @uses ApiFareItinerary::setResident()
     * @uses ApiFareItinerary::setSecondSegmentsIds()
     * @uses ApiFareItinerary::setThirdSegmentsIds()
     * @param \StructType\ApiFareItineraryPrice $price
     * @param string $key
     * @param int[] $firstSegmentsIds
     * @param string $clickoutURLParams
     * @param bool $resident
     * @param int[] $secondSegmentsIds
     * @param int[] $thirdSegmentsIds
     */
    public function __construct(\StructType\ApiFareItineraryPrice $price, string $key, array $firstSegmentsIds, ?string $clickoutURLParams = null, ?bool $resident = null, ?array $secondSegmentsIds = null, ?array $thirdSegmentsIds = null)
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
     * @return \StructType\ApiFareItineraryPrice
     */
    public function getPrice(): \StructType\ApiFareItineraryPrice
    {
        return $this->price;
    }
    /**
     * Set price value
     * @param \StructType\ApiFareItineraryPrice $price
     * @return \StructType\ApiFareItinerary
     */
    public function setPrice(\StructType\ApiFareItineraryPrice $price): self
    {
        $this->price = $price;
        
        return $this;
    }
    /**
     * Get key value
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }
    /**
     * Set key value
     * @param string $key
     * @return \StructType\ApiFareItinerary
     */
    public function setKey(string $key): self
    {
        // validation for constraint: string
        if (!is_null($key) && !is_string($key)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($key, true), gettype($key)), __LINE__);
        }
        $this->key = $key;
        
        return $this;
    }
    /**
     * Get firstSegmentsIds value
     * @return int[]
     */
    public function getFirstSegmentsIds(): array
    {
        return $this->firstSegmentsIds;
    }
    /**
     * This method is responsible for validating the values passed to the setFirstSegmentsIds method
     * This method is willingly generated in order to preserve the one-line inline validation within the setFirstSegmentsIds method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateFirstSegmentsIdsForArrayConstraintsFromSetFirstSegmentsIds(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $fareItineraryFirstSegmentsIdsItem) {
            // validation for constraint: itemType
            if (!(is_int($fareItineraryFirstSegmentsIdsItem) || ctype_digit($fareItineraryFirstSegmentsIdsItem))) {
                $invalidValues[] = is_object($fareItineraryFirstSegmentsIdsItem) ? get_class($fareItineraryFirstSegmentsIdsItem) : sprintf('%s(%s)', gettype($fareItineraryFirstSegmentsIdsItem), var_export($fareItineraryFirstSegmentsIdsItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The firstSegmentsIds property can only contain items of type int, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set firstSegmentsIds value
     * @throws InvalidArgumentException
     * @param int[] $firstSegmentsIds
     * @return \StructType\ApiFareItinerary
     */
    public function setFirstSegmentsIds(array $firstSegmentsIds): self
    {
        // validation for constraint: array
        if ('' !== ($firstSegmentsIdsArrayErrorMessage = self::validateFirstSegmentsIdsForArrayConstraintsFromSetFirstSegmentsIds($firstSegmentsIds))) {
            throw new InvalidArgumentException($firstSegmentsIdsArrayErrorMessage, __LINE__);
        }
        $this->firstSegmentsIds = $firstSegmentsIds;
        
        return $this;
    }
    /**
     * Add item to firstSegmentsIds value
     * @throws InvalidArgumentException
     * @param int $item
     * @return \StructType\ApiFareItinerary
     */
    public function addToFirstSegmentsIds(int $item): self
    {
        // validation for constraint: itemType
        if (!(is_int($item) || ctype_digit($item))) {
            throw new InvalidArgumentException(sprintf('The firstSegmentsIds property can only contain items of type int, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->firstSegmentsIds[] = $item;
        
        return $this;
    }
    /**
     * Get clickoutURLParams value
     * @return string|null
     */
    public function getClickoutURLParams(): ?string
    {
        return $this->clickoutURLParams;
    }
    /**
     * Set clickoutURLParams value
     * @param string $clickoutURLParams
     * @return \StructType\ApiFareItinerary
     */
    public function setClickoutURLParams(?string $clickoutURLParams = null): self
    {
        // validation for constraint: string
        if (!is_null($clickoutURLParams) && !is_string($clickoutURLParams)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($clickoutURLParams, true), gettype($clickoutURLParams)), __LINE__);
        }
        $this->clickoutURLParams = $clickoutURLParams;
        
        return $this;
    }
    /**
     * Get resident value
     * @return bool|null
     */
    public function getResident(): ?bool
    {
        return $this->resident;
    }
    /**
     * Set resident value
     * @param bool $resident
     * @return \StructType\ApiFareItinerary
     */
    public function setResident(?bool $resident = null): self
    {
        // validation for constraint: boolean
        if (!is_null($resident) && !is_bool($resident)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a bool, %s given', var_export($resident, true), gettype($resident)), __LINE__);
        }
        $this->resident = $resident;
        
        return $this;
    }
    /**
     * Get secondSegmentsIds value
     * @return int[]
     */
    public function getSecondSegmentsIds(): ?array
    {
        return $this->secondSegmentsIds;
    }
    /**
     * This method is responsible for validating the values passed to the setSecondSegmentsIds method
     * This method is willingly generated in order to preserve the one-line inline validation within the setSecondSegmentsIds method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateSecondSegmentsIdsForArrayConstraintsFromSetSecondSegmentsIds(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $fareItinerarySecondSegmentsIdsItem) {
            // validation for constraint: itemType
            if (!(is_int($fareItinerarySecondSegmentsIdsItem) || ctype_digit($fareItinerarySecondSegmentsIdsItem))) {
                $invalidValues[] = is_object($fareItinerarySecondSegmentsIdsItem) ? get_class($fareItinerarySecondSegmentsIdsItem) : sprintf('%s(%s)', gettype($fareItinerarySecondSegmentsIdsItem), var_export($fareItinerarySecondSegmentsIdsItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The secondSegmentsIds property can only contain items of type int, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set secondSegmentsIds value
     * @throws InvalidArgumentException
     * @param int[] $secondSegmentsIds
     * @return \StructType\ApiFareItinerary
     */
    public function setSecondSegmentsIds(?array $secondSegmentsIds = null): self
    {
        // validation for constraint: array
        if ('' !== ($secondSegmentsIdsArrayErrorMessage = self::validateSecondSegmentsIdsForArrayConstraintsFromSetSecondSegmentsIds($secondSegmentsIds))) {
            throw new InvalidArgumentException($secondSegmentsIdsArrayErrorMessage, __LINE__);
        }
        $this->secondSegmentsIds = $secondSegmentsIds;
        
        return $this;
    }
    /**
     * Add item to secondSegmentsIds value
     * @throws InvalidArgumentException
     * @param int $item
     * @return \StructType\ApiFareItinerary
     */
    public function addToSecondSegmentsIds(int $item): self
    {
        // validation for constraint: itemType
        if (!(is_int($item) || ctype_digit($item))) {
            throw new InvalidArgumentException(sprintf('The secondSegmentsIds property can only contain items of type int, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->secondSegmentsIds[] = $item;
        
        return $this;
    }
    /**
     * Get thirdSegmentsIds value
     * @return int[]
     */
    public function getThirdSegmentsIds(): ?array
    {
        return $this->thirdSegmentsIds;
    }
    /**
     * This method is responsible for validating the values passed to the setThirdSegmentsIds method
     * This method is willingly generated in order to preserve the one-line inline validation within the setThirdSegmentsIds method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateThirdSegmentsIdsForArrayConstraintsFromSetThirdSegmentsIds(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $fareItineraryThirdSegmentsIdsItem) {
            // validation for constraint: itemType
            if (!(is_int($fareItineraryThirdSegmentsIdsItem) || ctype_digit($fareItineraryThirdSegmentsIdsItem))) {
                $invalidValues[] = is_object($fareItineraryThirdSegmentsIdsItem) ? get_class($fareItineraryThirdSegmentsIdsItem) : sprintf('%s(%s)', gettype($fareItineraryThirdSegmentsIdsItem), var_export($fareItineraryThirdSegmentsIdsItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The thirdSegmentsIds property can only contain items of type int, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set thirdSegmentsIds value
     * @throws InvalidArgumentException
     * @param int[] $thirdSegmentsIds
     * @return \StructType\ApiFareItinerary
     */
    public function setThirdSegmentsIds(?array $thirdSegmentsIds = null): self
    {
        // validation for constraint: array
        if ('' !== ($thirdSegmentsIdsArrayErrorMessage = self::validateThirdSegmentsIdsForArrayConstraintsFromSetThirdSegmentsIds($thirdSegmentsIds))) {
            throw new InvalidArgumentException($thirdSegmentsIdsArrayErrorMessage, __LINE__);
        }
        $this->thirdSegmentsIds = $thirdSegmentsIds;
        
        return $this;
    }
    /**
     * Add item to thirdSegmentsIds value
     * @throws InvalidArgumentException
     * @param int $item
     * @return \StructType\ApiFareItinerary
     */
    public function addToThirdSegmentsIds(int $item): self
    {
        // validation for constraint: itemType
        if (!(is_int($item) || ctype_digit($item))) {
            throw new InvalidArgumentException(sprintf('The thirdSegmentsIds property can only contain items of type int, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->thirdSegmentsIds[] = $item;
        
        return $this;
    }
}
