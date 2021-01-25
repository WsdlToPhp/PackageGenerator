<?php

declare(strict_types=1);

namespace Api\StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for VideoRequest StructType
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
class ApiVideoRequest extends AbstractStructBase
{
    /**
     * The Offset
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var int|null
     */
    protected ?int $Offset = null;
    /**
     * The Count
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var int|null
     */
    protected ?int $Count = null;
    /**
     * The Filters
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Api\ArrayType\ApiArrayOfString|null
     */
    protected ?\Api\ArrayType\ApiArrayOfString $Filters = null;
    /**
     * The SortBy
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $SortBy = null;
    /**
     * Constructor method for VideoRequest
     * @uses ApiVideoRequest::setOffset()
     * @uses ApiVideoRequest::setCount()
     * @uses ApiVideoRequest::setFilters()
     * @uses ApiVideoRequest::setSortBy()
     * @param int $offset
     * @param int $count
     * @param \Api\ArrayType\ApiArrayOfString $filters
     * @param string $sortBy
     */
    public function __construct(?int $offset = null, ?int $count = null, ?\Api\ArrayType\ApiArrayOfString $filters = null, ?string $sortBy = null)
    {
        $this
            ->setOffset($offset)
            ->setCount($count)
            ->setFilters($filters)
            ->setSortBy($sortBy);
    }
    /**
     * Get Offset value
     * @return int|null
     */
    public function getOffset(): ?int
    {
        return $this->Offset;
    }
    /**
     * Set Offset value
     * @param int $offset
     * @return \Api\StructType\ApiVideoRequest
     */
    public function setOffset(?int $offset = null): self
    {
        // validation for constraint: int
        if (!is_null($offset) && !(is_int($offset) || ctype_digit($offset))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide an integer value, %s given', var_export($offset, true), gettype($offset)), __LINE__);
        }
        $this->Offset = $offset;
        
        return $this;
    }
    /**
     * Get Count value
     * @return int|null
     */
    public function getCount(): ?int
    {
        return $this->Count;
    }
    /**
     * Set Count value
     * @param int $count
     * @return \Api\StructType\ApiVideoRequest
     */
    public function setCount(?int $count = null): self
    {
        // validation for constraint: int
        if (!is_null($count) && !(is_int($count) || ctype_digit($count))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide an integer value, %s given', var_export($count, true), gettype($count)), __LINE__);
        }
        $this->Count = $count;
        
        return $this;
    }
    /**
     * Get Filters value
     * @return \Api\ArrayType\ApiArrayOfString|null
     */
    public function getFilters(): ?\Api\ArrayType\ApiArrayOfString
    {
        return $this->Filters;
    }
    /**
     * Set Filters value
     * @param \Api\ArrayType\ApiArrayOfString $filters
     * @return \Api\StructType\ApiVideoRequest
     */
    public function setFilters(?\Api\ArrayType\ApiArrayOfString $filters = null): self
    {
        $this->Filters = $filters;
        
        return $this;
    }
    /**
     * Get SortBy value
     * @return string|null
     */
    public function getSortBy(): ?string
    {
        return $this->SortBy;
    }
    /**
     * Set SortBy value
     * @uses \Api\EnumType\ApiVideoSortOption::valueIsValid()
     * @uses \Api\EnumType\ApiVideoSortOption::getValidValues()
     * @throws InvalidArgumentException
     * @param string $sortBy
     * @return \Api\StructType\ApiVideoRequest
     */
    public function setSortBy(?string $sortBy = null): self
    {
        // validation for constraint: enumeration
        if (!\Api\EnumType\ApiVideoSortOption::valueIsValid($sortBy)) {
            throw new InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \Api\EnumType\ApiVideoSortOption', is_array($sortBy) ? implode(', ', $sortBy) : var_export($sortBy, true), implode(', ', \Api\EnumType\ApiVideoSortOption::getValidValues())), __LINE__);
        }
        $this->SortBy = $sortBy;
        
        return $this;
    }
}
