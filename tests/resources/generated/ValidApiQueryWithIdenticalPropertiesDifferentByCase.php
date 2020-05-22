<?php

namespace Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for Query StructType
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
class ApiQuery extends AbstractStructBase
{
    /**
     * The SearchTerms
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $SearchTerms;
    /**
     * The AlteredQuery
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $AlteredQuery;
    /**
     * The AlterationOverrideQuery
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $AlterationOverrideQuery;
    /**
     * The searchTerms
     * @var string
     */
    public $searchTerms;
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
    public function __construct($searchTerms = null, $alteredQuery = null, $alterationOverrideQuery = null, $searchTerms_1 = null)
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
    public function getSearchTerms()
    {
        return $this->SearchTerms;
    }
    /**
     * Set SearchTerms value
     * @param string $searchTerms
     * @return \Api\StructType\ApiQuery
     */
    public function setSearchTerms($searchTerms = null)
    {
        // validation for constraint: string
        if (!is_null($searchTerms) && !is_string($searchTerms)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($searchTerms, true), gettype($searchTerms)), __LINE__);
        }
        $this->SearchTerms = $searchTerms;
        return $this;
    }
    /**
     * Get AlteredQuery value
     * @return string|null
     */
    public function getAlteredQuery()
    {
        return $this->AlteredQuery;
    }
    /**
     * Set AlteredQuery value
     * @param string $alteredQuery
     * @return \Api\StructType\ApiQuery
     */
    public function setAlteredQuery($alteredQuery = null)
    {
        // validation for constraint: string
        if (!is_null($alteredQuery) && !is_string($alteredQuery)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($alteredQuery, true), gettype($alteredQuery)), __LINE__);
        }
        $this->AlteredQuery = $alteredQuery;
        return $this;
    }
    /**
     * Get AlterationOverrideQuery value
     * @return string|null
     */
    public function getAlterationOverrideQuery()
    {
        return $this->AlterationOverrideQuery;
    }
    /**
     * Set AlterationOverrideQuery value
     * @param string $alterationOverrideQuery
     * @return \Api\StructType\ApiQuery
     */
    public function setAlterationOverrideQuery($alterationOverrideQuery = null)
    {
        // validation for constraint: string
        if (!is_null($alterationOverrideQuery) && !is_string($alterationOverrideQuery)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($alterationOverrideQuery, true), gettype($alterationOverrideQuery)), __LINE__);
        }
        $this->AlterationOverrideQuery = $alterationOverrideQuery;
        return $this;
    }
    /**
     * Get SearchTerms value
     * @return string|null
     */
    public function getSearchTerms_1()
    {
        return $this->searchTerms;
    }
    /**
     * Set SearchTerms value
     * @param string $searchTerms
     * @return \Api\StructType\ApiQuery
     */
    public function setSearchTerms_1($searchTerms_1 = null)
    {
        // validation for constraint: string
        if (!is_null($searchTerms_1) && !is_string($searchTerms_1)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($searchTerms_1, true), gettype($searchTerms_1)), __LINE__);
        }
        $this->searchTerms = $searchTerms_1;
        return $this;
    }
}
