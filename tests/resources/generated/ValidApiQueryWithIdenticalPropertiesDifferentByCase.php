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
     * The searchTerms
     * @var string
     */
    protected string $searchTerms;
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
     * Constructor method for Query
     * @uses ApiQuery::setSearchTerms()
     * @uses ApiQuery::setSearchTerms_1()
     * @uses ApiQuery::setAlteredQuery()
     * @uses ApiQuery::setAlterationOverrideQuery()
     * @param string $searchTerms
     * @param string $searchTerms
     * @param string $alteredQuery
     * @param string $alterationOverrideQuery
     */
    public function __construct(string $searchTerms, ?string $searchTerms_1 = null, ?string $alteredQuery = null, ?string $alterationOverrideQuery = null)
    {
        $this
            ->setSearchTerms($searchTerms)
            ->setSearchTerms_1($searchTerms_1)
            ->setAlteredQuery($alteredQuery)
            ->setAlterationOverrideQuery($alterationOverrideQuery);
    }
    /**
     * Get SearchTerms value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (minOccurs=0)
     * @return string|null
     */
    public function getSearchTerms(): string
    {
        return $this->searchTerms;
    }
    /**
     * Set SearchTerms value
     * This property is removable from request (minOccurs=0), therefore if the value
     * assigned to this property is null, it is removed from this object
     * @param string $searchTerms
     * @return \StructType\ApiQuery
     */
    public function setSearchTerms(string $searchTerms): self
    {
        // validation for constraint: string
        if (!is_null($searchTerms) && !is_string($searchTerms)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($searchTerms, true), gettype($searchTerms)), __LINE__);
        }
        $this->searchTerms = $searchTerms;
        
        return $this;
    }
    /**
     * Get SearchTerms value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (minOccurs=0)
     * @return string|null
     */
    public function getSearchTerms_1(): ?string
    {
        return $this->SearchTerms ?? null;
    }
    /**
     * Set SearchTerms value
     * This property is removable from request (minOccurs=0), therefore if the value
     * assigned to this property is null, it is removed from this object
     * @param string $searchTerms
     * @return \StructType\ApiQuery
     */
    public function setSearchTerms_1(?string $searchTerms_1 = null): self
    {
        // validation for constraint: string
        if (!is_null($searchTerms_1) && !is_string($searchTerms_1)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($searchTerms_1, true), gettype($searchTerms_1)), __LINE__);
        }
        if (is_null($searchTerms_1) || (is_array($searchTerms_1) && empty($searchTerms_1))) {
            unset($this->SearchTerms);
        } else {
            $this->SearchTerms = $searchTerms_1;
        }
        
        return $this;
    }
    /**
     * Get AlteredQuery value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (minOccurs=0)
     * @return string|null
     */
    public function getAlteredQuery(): ?string
    {
        return $this->AlteredQuery ?? null;
    }
    /**
     * Set AlteredQuery value
     * This property is removable from request (minOccurs=0), therefore if the value
     * assigned to this property is null, it is removed from this object
     * @param string $alteredQuery
     * @return \StructType\ApiQuery
     */
    public function setAlteredQuery(?string $alteredQuery = null): self
    {
        // validation for constraint: string
        if (!is_null($alteredQuery) && !is_string($alteredQuery)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($alteredQuery, true), gettype($alteredQuery)), __LINE__);
        }
        if (is_null($alteredQuery) || (is_array($alteredQuery) && empty($alteredQuery))) {
            unset($this->AlteredQuery);
        } else {
            $this->AlteredQuery = $alteredQuery;
        }
        
        return $this;
    }
    /**
     * Get AlterationOverrideQuery value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (minOccurs=0)
     * @return string|null
     */
    public function getAlterationOverrideQuery(): ?string
    {
        return $this->AlterationOverrideQuery ?? null;
    }
    /**
     * Set AlterationOverrideQuery value
     * This property is removable from request (minOccurs=0), therefore if the value
     * assigned to this property is null, it is removed from this object
     * @param string $alterationOverrideQuery
     * @return \StructType\ApiQuery
     */
    public function setAlterationOverrideQuery(?string $alterationOverrideQuery = null): self
    {
        // validation for constraint: string
        if (!is_null($alterationOverrideQuery) && !is_string($alterationOverrideQuery)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($alterationOverrideQuery, true), gettype($alterationOverrideQuery)), __LINE__);
        }
        if (is_null($alterationOverrideQuery) || (is_array($alterationOverrideQuery) && empty($alterationOverrideQuery))) {
            unset($this->AlterationOverrideQuery);
        } else {
            $this->AlterationOverrideQuery = $alterationOverrideQuery;
        }
        
        return $this;
    }
}
