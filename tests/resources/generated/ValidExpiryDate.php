<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for expiryDate StructType
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
class ApiExpiryDate extends AbstractStructBase
{
    /**
     * The month
     * Meta information extracted from the WSDL
     * - base: NMTOKEN
     * - pattern: (0[1-9]|1[012])
     * - use: required
     * @var string
     */
    protected string $month;
    /**
     * The year
     * Meta information extracted from the WSDL
     * - base: NMTOKEN
     * - pattern: [0-9][0-9]
     * - use: required
     * @var string
     */
    protected string $year;
    /**
     * Constructor method for expiryDate
     * @uses ApiExpiryDate::setMonth()
     * @uses ApiExpiryDate::setYear()
     * @param string $month
     * @param string $year
     */
    public function __construct(string $month, string $year)
    {
        $this
            ->setMonth($month)
            ->setYear($year);
    }
    /**
     * Get month value
     * @return string
     */
    public function getMonth(): string
    {
        return $this->month;
    }
    /**
     * Set month value
     * @param string $month
     * @return \StructType\ApiExpiryDate
     */
    public function setMonth(string $month): self
    {
        // validation for constraint: string
        if (!is_null($month) && !is_string($month)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($month, true), gettype($month)), __LINE__);
        }
        // validation for constraint: pattern((0[1-9]|1[012]))
        if (!is_null($month) && !preg_match('/(0[1-9]|1[012])/', (string) $month)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a literal that is among the set of character sequences denoted by the regular expression /(0[1-9]|1[012])/', var_export($month, true)), __LINE__);
        }
        $this->month = $month;
        
        return $this;
    }
    /**
     * Get year value
     * @return string
     */
    public function getYear(): string
    {
        return $this->year;
    }
    /**
     * Set year value
     * @param string $year
     * @return \StructType\ApiExpiryDate
     */
    public function setYear(string $year): self
    {
        // validation for constraint: string
        if (!is_null($year) && !is_string($year)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($year, true), gettype($year)), __LINE__);
        }
        // validation for constraint: pattern([0-9][0-9])
        if (!is_null($year) && !preg_match('/[0-9][0-9]/', (string) $year)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a literal that is among the set of character sequences denoted by the regular expression /[0-9][0-9]/', var_export($year, true)), __LINE__);
        }
        $this->year = $year;
        
        return $this;
    }
}
