<?php

declare(strict_types=1);

namespace Api\ArrayType;

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
     * @var \Api\StructType\ApiNewsRelatedSearch[]
     */
    public array $NewsRelatedSearch = [];
    /**
     * Constructor method for ArrayOfNewsRelatedSearch
     * @uses ApiArrayOfNewsRelatedSearch::setNewsRelatedSearch()
     * @param \Api\StructType\ApiNewsRelatedSearch[] $newsRelatedSearch
     */
    public function __construct(array $newsRelatedSearch = [])
    {
        $this
            ->setNewsRelatedSearch($newsRelatedSearch);
    }
    /**
     * Get NewsRelatedSearch value
     * @return \Api\StructType\ApiNewsRelatedSearch[]|null
     */
    public function getNewsRelatedSearch(): ?array
    {
        return $this->NewsRelatedSearch;
    }
    /**
     * This method is responsible for validating the values passed to the setNewsRelatedSearch method
     * This method is willingly generated in order to preserve the one-line inline validation within the setNewsRelatedSearch method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateNewsRelatedSearchForArrayConstraintsFromSetNewsRelatedSearch(array $values = []): string
    {
        $message = '';
        $invalidValues = [];
        foreach ($values as $arrayOfNewsRelatedSearchNewsRelatedSearchItem) {
            // validation for constraint: itemType
            if (!$arrayOfNewsRelatedSearchNewsRelatedSearchItem instanceof \Api\StructType\ApiNewsRelatedSearch) {
                $invalidValues[] = is_object($arrayOfNewsRelatedSearchNewsRelatedSearchItem) ? get_class($arrayOfNewsRelatedSearchNewsRelatedSearchItem) : sprintf('%s(%s)', gettype($arrayOfNewsRelatedSearchNewsRelatedSearchItem), var_export($arrayOfNewsRelatedSearchNewsRelatedSearchItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The NewsRelatedSearch property can only contain items of type \Api\StructType\ApiNewsRelatedSearch, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        return $message;
    }
    /**
     * Set NewsRelatedSearch value
     * @throws \InvalidArgumentException
     * @param \Api\StructType\ApiNewsRelatedSearch[] $newsRelatedSearch
     * @return \Api\ArrayType\ApiArrayOfNewsRelatedSearch
     */
    public function setNewsRelatedSearch(array $newsRelatedSearch = []): self
    {
        // validation for constraint: array
        if ('' !== ($newsRelatedSearchArrayErrorMessage = self::validateNewsRelatedSearchForArrayConstraintsFromSetNewsRelatedSearch($newsRelatedSearch))) {
            throw new \InvalidArgumentException($newsRelatedSearchArrayErrorMessage, __LINE__);
        }
        $this->NewsRelatedSearch = $newsRelatedSearch;
        return $this;
    }
    /**
     * Returns the current element
     * @see AbstractStructArrayBase::current()
     * @return \Api\StructType\ApiNewsRelatedSearch|null
     */
    public function current(): ?\Api\StructType\ApiNewsRelatedSearch
    {
        return parent::current();
    }
    /**
     * Returns the indexed element
     * @see AbstractStructArrayBase::item()
     * @param int $index
     * @return \Api\StructType\ApiNewsRelatedSearch|null
     */
    public function item($index): ?\Api\StructType\ApiNewsRelatedSearch
    {
        return parent::item($index);
    }
    /**
     * Returns the first element
     * @see AbstractStructArrayBase::first()
     * @return \Api\StructType\ApiNewsRelatedSearch|null
     */
    public function first(): ?\Api\StructType\ApiNewsRelatedSearch
    {
        return parent::first();
    }
    /**
     * Returns the last element
     * @see AbstractStructArrayBase::last()
     * @return \Api\StructType\ApiNewsRelatedSearch|null
     */
    public function last(): ?\Api\StructType\ApiNewsRelatedSearch
    {
        return parent::last();
    }
    /**
     * Returns the element at the offset
     * @see AbstractStructArrayBase::offsetGet()
     * @param int $offset
     * @return \Api\StructType\ApiNewsRelatedSearch|null
     */
    public function offsetGet($offset): ?\Api\StructType\ApiNewsRelatedSearch
    {
        return parent::offsetGet($offset);
    }
    /**
     * Add element to array
     * @see AbstractStructArrayBase::add()
     * @throws \InvalidArgumentException
     * @uses \Api\StructType\ApiNewsRelatedSearch::valueIsValid()
     * @param ApiNewsRelatedSearch $item
     * @return \Api\ArrayType\ApiArrayOfNewsRelatedSearch
     */
    public function add(\Api\StructType\ApiNewsRelatedSearch $item): self
    {
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
