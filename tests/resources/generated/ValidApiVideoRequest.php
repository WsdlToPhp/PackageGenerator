<?php

declare(strict_types=1);

namespace StructType;

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
     * @var \ArrayType\ApiArrayOfString|null
     */
    protected ?\ArrayType\ApiArrayOfString $Filters = null;
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
     * @param \ArrayType\ApiArrayOfString $filters
     * @param string $sortBy
     */
    public function __construct(?int $offset = null, ?int $count = null, ?\ArrayType\ApiArrayOfString $filters = null, ?string $sortBy = null)
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
     * @return \StructType\ApiVideoRequest
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
     * @return \StructType\ApiVideoRequest
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
     * @return \ArrayType\ApiArrayOfString|null
     */
    public function getFilters(): ?\ArrayType\ApiArrayOfString
    {
        return $this->Filters;
    }
    /**
     * Set Filters value
     * @param \ArrayType\ApiArrayOfString $filters
     * @return \StructType\ApiVideoRequest
     */
    public function setFilters(?\ArrayType\ApiArrayOfString $filters = null): self
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
     * @uses \EnumType\ApiVideoSortOption::valueIsValid()
     * @uses \EnumType\ApiVideoSortOption::getValidValues()
     * @throws InvalidArgumentException
     * @param string $sortBy
     * @return \StructType\ApiVideoRequest
     */
    public function setSortBy(?string $sortBy = null): self
    {
        // validation for constraint: enumeration
        if (!\EnumType\ApiVideoSortOption::valueIsValid($sortBy)) {
            throw new InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \EnumType\ApiVideoSortOption', is_array($sortBy) ? implode(', ', $sortBy) : var_export($sortBy, true), implode(', ', \EnumType\ApiVideoSortOption::getValidValues())), __LINE__);
        }
        $this->SortBy = $sortBy;
        
        return $this;
    }
}
