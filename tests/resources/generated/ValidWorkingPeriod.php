<?php

namespace Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for WorkingPeriod StructType
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
class ApiWorkingPeriod extends AbstractStructBase
{
    /**
     * The DayOfWeek
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var string[]
     */
    public $DayOfWeek;
    /**
     * The StartTimeInMinutes
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var int
     */
    public $StartTimeInMinutes;
    /**
     * The EndTimeInMinutes
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var int
     */
    public $EndTimeInMinutes;
    /**
     * Constructor method for WorkingPeriod
     * @uses ApiWorkingPeriod::setDayOfWeek()
     * @uses ApiWorkingPeriod::setStartTimeInMinutes()
     * @uses ApiWorkingPeriod::setEndTimeInMinutes()
     * @param string[] $dayOfWeek
     * @param int $startTimeInMinutes
     * @param int $endTimeInMinutes
     */
    public function __construct(array $dayOfWeek = null, $startTimeInMinutes = null, $endTimeInMinutes = null)
    {
        $this
            ->setDayOfWeek($dayOfWeek)
            ->setStartTimeInMinutes($startTimeInMinutes)
            ->setEndTimeInMinutes($endTimeInMinutes);
    }
    /**
     * Get DayOfWeek value
     * @return string[]
     */
    public function getDayOfWeek()
    {
        return $this->DayOfWeek;
    }
    /**
     * Set DayOfWeek value
     * @uses \Api\EnumType\ApiDayOfWeekType::valueIsValid()
     * @uses \Api\EnumType\ApiDayOfWeekType::getValidValues()
     * @throws \InvalidArgumentException
     * @param string[] $dayOfWeek
     * @return \Api\StructType\ApiWorkingPeriod
     */
    public function setDayOfWeek(array $dayOfWeek = null)
    {
        // validation for constraint: list
        $invalidValues = array();
        foreach ($dayOfWeek as $workingPeriodDayOfWeekItem) {
            if (!\Api\EnumType\ApiDayOfWeekType::valueIsValid($workingPeriodDayOfWeekItem)) {
                $invalidValues[] = var_export($workingPeriodDayOfWeekItem, true);
            }
        }
        if (!empty($invalidValues)) {
            throw new \InvalidArgumentException(sprintf('Value(s) "%s" is/are invalid, please use one of: %s', implode(', ', $invalidValues), implode(', ', \Api\EnumType\ApiDayOfWeekType::getValidValues())), __LINE__);
        }
        $this->DayOfWeek = is_array($dayOfWeek) ? implode(' ', $dayOfWeek) : null;
        return $this;
    }
    /**
     * Get StartTimeInMinutes value
     * @return int
     */
    public function getStartTimeInMinutes()
    {
        return $this->StartTimeInMinutes;
    }
    /**
     * Set StartTimeInMinutes value
     * @param int $startTimeInMinutes
     * @return \Api\StructType\ApiWorkingPeriod
     */
    public function setStartTimeInMinutes($startTimeInMinutes = null)
    {
        // validation for constraint: int
        if (!is_null($startTimeInMinutes) && !is_numeric($startTimeInMinutes)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($startTimeInMinutes)), __LINE__);
        }
        $this->StartTimeInMinutes = $startTimeInMinutes;
        return $this;
    }
    /**
     * Get EndTimeInMinutes value
     * @return int
     */
    public function getEndTimeInMinutes()
    {
        return $this->EndTimeInMinutes;
    }
    /**
     * Set EndTimeInMinutes value
     * @param int $endTimeInMinutes
     * @return \Api\StructType\ApiWorkingPeriod
     */
    public function setEndTimeInMinutes($endTimeInMinutes = null)
    {
        // validation for constraint: int
        if (!is_null($endTimeInMinutes) && !is_numeric($endTimeInMinutes)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($endTimeInMinutes)), __LINE__);
        }
        $this->EndTimeInMinutes = $endTimeInMinutes;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Api\StructType\ApiWorkingPeriod
     */
    public static function __set_state(array $array)
    {
        return parent::__set_state($array);
    }
    /**
     * Method returning the class name
     * @return string __CLASS__
     */
    public function __toString()
    {
        return __CLASS__;
    }
}
