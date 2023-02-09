<?php

declare(strict_types=1);

namespace ArrayType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructArrayBase;

/**
 * This class stands for ArrayOfNewsRelatedSearch ArrayType
 * @package Api
 * @subpackage Arrays
 * @release 1.1.0
 */
class ApiArrayOfNewsRelatedSearch extends AbstractStructArrayBase
{
    /**
     * The NewsRelatedSearch
     * Meta information extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var \StructType\ApiNewsRelatedSearch[]
     */
    protected ?array $NewsRelatedSearch = null;
    /**
     * Constructor method for ArrayOfNewsRelatedSearch
     * @uses ApiArrayOfNewsRelatedSearch::setNewsRelatedSearch()
     * @param \StructType\ApiNewsRelatedSearch[] $newsRelatedSearch
     */
    public function __construct(?array $newsRelatedSearch = null)
    {
        $this
            ->setNewsRelatedSearch($newsRelatedSearch);
    }
    /**
     * Get NewsRelatedSearch value
     * @return \StructType\ApiNewsRelatedSearch[]
     */
    public function getNewsRelatedSearch(): ?array
    {
        return $this->NewsRelatedSearch;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setNewsRelatedSearch method
     * This method is willingly generated in order to preserve the one-line inline validation within the setNewsRelatedSearch method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateNewsRelatedSearchForArrayConstraintFromSetNewsRelatedSearch(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $arrayOfNewsRelatedSearchNewsRelatedSearchItem) {
            // validation for constraint: itemType
            if (!$arrayOfNewsRelatedSearchNewsRelatedSearchItem instanceof \StructType\ApiNewsRelatedSearch) {
                $invalidValues[] = is_object($arrayOfNewsRelatedSearchNewsRelatedSearchItem) ? get_class($arrayOfNewsRelatedSearchNewsRelatedSearchItem) : sprintf('%s(%s)', gettype($arrayOfNewsRelatedSearchNewsRelatedSearchItem), var_export($arrayOfNewsRelatedSearchNewsRelatedSearchItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The NewsRelatedSearch property can only contain items of type \StructType\ApiNewsRelatedSearch, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set NewsRelatedSearch value
     * @throws InvalidArgumentException
     * @param \StructType\ApiNewsRelatedSearch[] $newsRelatedSearch
     * @return \ArrayType\ApiArrayOfNewsRelatedSearch
     */
    public function setNewsRelatedSearch(?array $newsRelatedSearch = null): self
    {
        // validation for constraint: array
        if ('' !== ($newsRelatedSearchArrayErrorMessage = self::validateNewsRelatedSearchForArrayConstraintFromSetNewsRelatedSearch($newsRelatedSearch))) {
            throw new InvalidArgumentException($newsRelatedSearchArrayErrorMessage, __LINE__);
        }
        $this->NewsRelatedSearch = $newsRelatedSearch;
        
        return $this;
    }
    /**
     * Returns the current element
     * @see AbstractStructArrayBase::current()
     * @return \StructType\ApiNewsRelatedSearch|null
     */
    public function current(): ?\StructType\ApiNewsRelatedSearch
    {
        return parent::current();
    }
    /**
     * Returns the indexed element
     * @see AbstractStructArrayBase::item()
     * @param int $index
     * @return \StructType\ApiNewsRelatedSearch|null
     */
    public function item($index): ?\StructType\ApiNewsRelatedSearch
    {
        return parent::item($index);
    }
    /**
     * Returns the first element
     * @see AbstractStructArrayBase::first()
     * @return \StructType\ApiNewsRelatedSearch|null
     */
    public function first(): ?\StructType\ApiNewsRelatedSearch
    {
        return parent::first();
    }
    /**
     * Returns the last element
     * @see AbstractStructArrayBase::last()
     * @return \StructType\ApiNewsRelatedSearch|null
     */
    public function last(): ?\StructType\ApiNewsRelatedSearch
    {
        return parent::last();
    }
    /**
     * Returns the element at the offset
     * @see AbstractStructArrayBase::offsetGet()
     * @param int $offset
     * @return \StructType\ApiNewsRelatedSearch|null
     */
    public function offsetGet($offset): ?\StructType\ApiNewsRelatedSearch
    {
        return parent::offsetGet($offset);
    }
    /**
     * Add element to array
     * @see AbstractStructArrayBase::add()
     * @throws InvalidArgumentException
     * @param \StructType\ApiNewsRelatedSearch $item
     * @return \ArrayType\ApiArrayOfNewsRelatedSearch
     */
    public function add($item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ApiNewsRelatedSearch) {
            throw new InvalidArgumentException(sprintf('The NewsRelatedSearch property can only contain items of type \StructType\ApiNewsRelatedSearch, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        return parent::add($item);
    }
    /**
     * Returns the attribute name
     * @see AbstractStructArrayBase::getAttributeName()
     * @return string NewsRelatedSearch
     */
    public function getAttributeName(): string
    {
        return 'NewsRelatedSearch';
    }
}
