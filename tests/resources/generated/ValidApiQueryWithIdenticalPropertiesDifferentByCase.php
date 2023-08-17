<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for Query StructType
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
#[\AllowDynamicProperties]
class ApiQuery extends AbstractStructBase
{
    /**
     * The SearchTerms
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $SearchTerms = null;
    /**
     * The AlteredQuery
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $AlteredQuery = null;
    /**
     * The AlterationOverrideQuery
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $AlterationOverrideQuery = null;
    /**
     * The searchTerms
     * @var string|null
     */
    protected ?string $searchTerms = null;
    /**
     * Constructor method for Query
     * @uses ApiQuery::setSearchTerms()
     * @uses ApiQuery::setAlteredQuery()
     * @uses ApiQuery::setAlterationOverrideQuery()
     * @uses ApiQuery::setSearchTerms_1()
     * @param string $searchTerms
     * @param string $alteredQuery
     * @param string $alterationOverrideQuery
     * @param string $searchTerms
     */
    public function __construct(?string $searchTerms = null, ?string $alteredQuery = null, ?string $alterationOverrideQuery = null, ?string $searchTerms_1 = null)
    {
        $this
            ->setSearchTerms($searchTerms)
            ->setAlteredQuery($alteredQuery)
            ->setAlterationOverrideQuery($alterationOverrideQuery)
            ->setSearchTerms_1($searchTerms_1);
    }
    /**
     * Get SearchTerms value
     * @return string|null
     */
    public function getSearchTerms(): ?string
    {
        return $this->SearchTerms;
    }
    /**
     * Set SearchTerms value
     * @param string $searchTerms
     * @return \StructType\ApiQuery
     */
    public function setSearchTerms(?string $searchTerms = null): self
    {
        // validation for constraint: string
        if (!is_null($searchTerms) && !is_string($searchTerms)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($searchTerms, true), gettype($searchTerms)), __LINE__);
        }
        $this->SearchTerms = $searchTerms;
        
        return $this;
    }
    /**
     * Get AlteredQuery value
     * @return string|null
     */
    public function getAlteredQuery(): ?string
    {
        return $this->AlteredQuery;
    }
    /**
     * Set AlteredQuery value
     * @param string $alteredQuery
     * @return \StructType\ApiQuery
     */
    public function setAlteredQuery(?string $alteredQuery = null): self
    {
        // validation for constraint: string
        if (!is_null($alteredQuery) && !is_string($alteredQuery)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($alteredQuery, true), gettype($alteredQuery)), __LINE__);
        }
        $this->AlteredQuery = $alteredQuery;
        
        return $this;
    }
    /**
     * Get AlterationOverrideQuery value
     * @return string|null
     */
    public function getAlterationOverrideQuery(): ?string
    {
        return $this->AlterationOverrideQuery;
    }
    /**
     * Set AlterationOverrideQuery value
     * @param string $alterationOverrideQuery
     * @return \StructType\ApiQuery
     */
    public function setAlterationOverrideQuery(?string $alterationOverrideQuery = null): self
    {
        // validation for constraint: string
        if (!is_null($alterationOverrideQuery) && !is_string($alterationOverrideQuery)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($alterationOverrideQuery, true), gettype($alterationOverrideQuery)), __LINE__);
        }
        $this->AlterationOverrideQuery = $alterationOverrideQuery;
        
        return $this;
    }
    /**
     * Get SearchTerms value
     * @return string|null
     */
    public function getSearchTerms_1(): ?string
    {
        return $this->searchTerms;
    }
    /**
     * Set SearchTerms value
     * @param string $searchTerms
     * @return \StructType\ApiQuery
     */
    public function setSearchTerms_1(?string $searchTerms_1 = null): self
    {
        // validation for constraint: string
        if (!is_null($searchTerms_1) && !is_string($searchTerms_1)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($searchTerms_1, true), gettype($searchTerms_1)), __LINE__);
        }
        $this->searchTerms = $searchTerms_1;
        
        return $this;
    }
}
