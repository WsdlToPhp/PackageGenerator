<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for searchStatusResponse StructType
 * Meta information extracted from the WSDL
 * - type: tns:searchStatusResponse
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
#[\AllowDynamicProperties]
class ApiSearchStatusResponse extends ApiPreferencesAwareResponse
{
    /**
     * The itineraryResultsPages
     * Meta information extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var \StructType\ApiSearchResultsPage[]
     */
    protected ?array $itineraryResultsPages = null;
    /**
     * The legend
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \StructType\ApiItinerariesLegend|null
     */
    protected ?\StructType\ApiItinerariesLegend $legend = null;
    /**
     * Constructor method for searchStatusResponse
     * @uses ApiSearchStatusResponse::setItineraryResultsPages()
     * @uses ApiSearchStatusResponse::setLegend()
     * @param \StructType\ApiSearchResultsPage[] $itineraryResultsPages
     * @param \StructType\ApiItinerariesLegend $legend
     */
    public function __construct(?array $itineraryResultsPages = null, ?\StructType\ApiItinerariesLegend $legend = null)
    {
        $this
            ->setItineraryResultsPages($itineraryResultsPages)
            ->setLegend($legend);
    }
    /**
     * Get itineraryResultsPages value
     * @return \StructType\ApiSearchResultsPage[]
     */
    public function getItineraryResultsPages(): ?array
    {
        return $this->itineraryResultsPages;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setItineraryResultsPages method
     * This method is willingly generated in order to preserve the one-line inline validation within the setItineraryResultsPages method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateItineraryResultsPagesForArrayConstraintFromSetItineraryResultsPages(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $searchStatusResponseItineraryResultsPagesItem) {
            // validation for constraint: itemType
            if (!$searchStatusResponseItineraryResultsPagesItem instanceof \StructType\ApiSearchResultsPage) {
                $invalidValues[] = is_object($searchStatusResponseItineraryResultsPagesItem) ? get_class($searchStatusResponseItineraryResultsPagesItem) : sprintf('%s(%s)', gettype($searchStatusResponseItineraryResultsPagesItem), var_export($searchStatusResponseItineraryResultsPagesItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The itineraryResultsPages property can only contain items of type \StructType\ApiSearchResultsPage, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set itineraryResultsPages value
     * @throws InvalidArgumentException
     * @param \StructType\ApiSearchResultsPage[] $itineraryResultsPages
     * @return \StructType\ApiSearchStatusResponse
     */
    public function setItineraryResultsPages(?array $itineraryResultsPages = null): self
    {
        // validation for constraint: array
        if ('' !== ($itineraryResultsPagesArrayErrorMessage = self::validateItineraryResultsPagesForArrayConstraintFromSetItineraryResultsPages($itineraryResultsPages))) {
            throw new InvalidArgumentException($itineraryResultsPagesArrayErrorMessage, __LINE__);
        }
        $this->itineraryResultsPages = $itineraryResultsPages;
        
        return $this;
    }
    /**
     * Add item to itineraryResultsPages value
     * @throws InvalidArgumentException
     * @param \StructType\ApiSearchResultsPage $item
     * @return \StructType\ApiSearchStatusResponse
     */
    public function addToItineraryResultsPages(\StructType\ApiSearchResultsPage $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ApiSearchResultsPage) {
            throw new InvalidArgumentException(sprintf('The itineraryResultsPages property can only contain items of type \StructType\ApiSearchResultsPage, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->itineraryResultsPages[] = $item;
        
        return $this;
    }
    /**
     * Get legend value
     * @return \StructType\ApiItinerariesLegend|null
     */
    public function getLegend(): ?\StructType\ApiItinerariesLegend
    {
        return $this->legend;
    }
    /**
     * Set legend value
     * @param \StructType\ApiItinerariesLegend $legend
     * @return \StructType\ApiSearchStatusResponse
     */
    public function setLegend(?\StructType\ApiItinerariesLegend $legend = null): self
    {
        $this->legend = $legend;
        
        return $this;
    }
}
