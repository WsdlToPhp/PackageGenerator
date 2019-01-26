<?php

namespace Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for HotelReservationType StructType
 * Meta informations extracted from the WSDL
 * - documentation: The Reservation class contains the point of sale, reservation identifier, room stay, service, guest, payment, loyalty program, comments, confirmation and queue information for the reservation being created or modify.
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
class ApiHotelReservationType extends AbstractStructBase
{
    /**
     * The RoomStays
     * Meta informations extracted from the WSDL
     * - documentation: Collection of room stays.
     * - minOccurs: 0
     * @var \Api\StructType\ApiRoomStaysType
     */
    public $RoomStays;
    /**
     * The ResGuests
     * Meta informations extracted from the WSDL
     * - documentation: Collection of guests associated with the reservation.
     * - minOccurs: 0
     * @var \Api\StructType\ApiResGuestsType
     */
    public $ResGuests;
    /**
     * The ResGlobalInfo
     * Meta informations extracted from the WSDL
     * - documentation: ResGlobalInfo is a container for various information that affects the Reservation as a whole. These include global comments, counts, reservation IDs, loyalty programs, and payment methods.
     * - minOccurs: 0
     * @var \Api\StructType\ApiResGlobalInfoType
     */
    public $ResGlobalInfo;
    /**
     * The RoomStayReservation
     * Meta informations extracted from the WSDL
     * - documentation: Boolean True if this reservation is reserving rooms. False if it is only reserving services.
     * - use: optional
     * @var bool
     */
    public $RoomStayReservation;
    /**
     * The ResStatus
     * Meta informations extracted from the WSDL
     * - documentation: Indicates the status of the reservation. | A union between TransactionActionType and PMS_ResStatusType. Used in messages that communicate between reservation systems as well as between a reservation and property management system. In
     * addition to the TransactionActionType and PMS_ResStatusType, the UpperCaseAlphaLength1to2 may be used for company specifc codes.
     * - use: optional
     * - union: PMS_ResStatusType | TransactionActionType | UpperCaseAlphaLength1to2
     * @var string
     */
    public $ResStatus;
    /**
     * Constructor method for HotelReservationType
     * @uses ApiHotelReservationType::setRoomStays()
     * @uses ApiHotelReservationType::setResGuests()
     * @uses ApiHotelReservationType::setResGlobalInfo()
     * @uses ApiHotelReservationType::setRoomStayReservation()
     * @uses ApiHotelReservationType::setResStatus()
     * @param \Api\StructType\ApiRoomStaysType $roomStays
     * @param \Api\StructType\ApiResGuestsType $resGuests
     * @param \Api\StructType\ApiResGlobalInfoType $resGlobalInfo
     * @param bool $roomStayReservation
     * @param string $resStatus
     */
    public function __construct(\Api\StructType\ApiRoomStaysType $roomStays = null, \Api\StructType\ApiResGuestsType $resGuests = null, \Api\StructType\ApiResGlobalInfoType $resGlobalInfo = null, $roomStayReservation = null, $resStatus = null)
    {
        $this
            ->setRoomStays($roomStays)
            ->setResGuests($resGuests)
            ->setResGlobalInfo($resGlobalInfo)
            ->setRoomStayReservation($roomStayReservation)
            ->setResStatus($resStatus);
    }
    /**
     * Get RoomStays value
     * @return \Api\StructType\ApiRoomStaysType|null
     */
    public function getRoomStays()
    {
        return $this->RoomStays;
    }
    /**
     * Set RoomStays value
     * @param \Api\StructType\ApiRoomStaysType $roomStays
     * @return \Api\StructType\ApiHotelReservationType
     */
    public function setRoomStays(\Api\StructType\ApiRoomStaysType $roomStays = null)
    {
        $this->RoomStays = $roomStays;
        return $this;
    }
    /**
     * Get ResGuests value
     * @return \Api\StructType\ApiResGuestsType|null
     */
    public function getResGuests()
    {
        return $this->ResGuests;
    }
    /**
     * Set ResGuests value
     * @param \Api\StructType\ApiResGuestsType $resGuests
     * @return \Api\StructType\ApiHotelReservationType
     */
    public function setResGuests(\Api\StructType\ApiResGuestsType $resGuests = null)
    {
        $this->ResGuests = $resGuests;
        return $this;
    }
    /**
     * Get ResGlobalInfo value
     * @return \Api\StructType\ApiResGlobalInfoType|null
     */
    public function getResGlobalInfo()
    {
        return $this->ResGlobalInfo;
    }
    /**
     * Set ResGlobalInfo value
     * @param \Api\StructType\ApiResGlobalInfoType $resGlobalInfo
     * @return \Api\StructType\ApiHotelReservationType
     */
    public function setResGlobalInfo(\Api\StructType\ApiResGlobalInfoType $resGlobalInfo = null)
    {
        $this->ResGlobalInfo = $resGlobalInfo;
        return $this;
    }
    /**
     * Get RoomStayReservation value
     * @return bool|null
     */
    public function getRoomStayReservation()
    {
        return $this->RoomStayReservation;
    }
    /**
     * Set RoomStayReservation value
     * @param bool $roomStayReservation
     * @return \Api\StructType\ApiHotelReservationType
     */
    public function setRoomStayReservation($roomStayReservation = null)
    {
        // validation for constraint: boolean
        if (!is_null($roomStayReservation) && !is_bool($roomStayReservation)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a bool, %s given', var_export($roomStayReservation, true), gettype($roomStayReservation)), __LINE__);
        }
        $this->RoomStayReservation = $roomStayReservation;
        return $this;
    }
    /**
     * Get ResStatus value
     * @return string|null
     */
    public function getResStatus()
    {
        return $this->ResStatus;
    }
    /**
     * This method is responsible for validating the value passed to the setResStatus method
     * This method is willingly generated in order to preserve the one-line inline validation within the setResStatus method
     * This is a set of validation rules based on the union types associated to the property being set by the setResStatus method
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateResStatusForUnionConstraintsFromSetResStatus($value)
    {
        $message = '';
        // validation for constraint: enumeration
        if (!\Api\EnumType\ApiPMS_ResStatusType::valueIsValid($value)) {
            $exception0 = new \InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \Api\EnumType\ApiPMS_ResStatusType', is_array($value) ? implode(', ', $value) : var_export($value, true), implode(', ', \Api\EnumType\ApiPMS_ResStatusType::getValidValues())), __LINE__);
        }
        // validation for constraint: enumeration
        if (!\Api\EnumType\ApiTransactionActionType::valueIsValid($value)) {
            $exception1 = new \InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \Api\EnumType\ApiTransactionActionType', is_array($value) ? implode(', ', $value) : var_export($value, true), implode(', ', \Api\EnumType\ApiTransactionActionType::getValidValues())), __LINE__);
        }
        // validation for constraint: string
        if (!is_null($value) && !is_string($value)) {
            $exception2 = new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($value, true), gettype($value)), __LINE__);
        }
        // validation for constraint: pattern
        if (is_scalar($value) && !preg_match('/[A-Z]{1,2}/', $value)) {
            $exception3 = new \InvalidArgumentException(sprintf('Invalid value %s, please provide a scalar value that matches "[A-Z]{1,2}"', var_export($value, true)), __LINE__);
        }
        if (isset($exception0) && isset($exception1) && isset($exception2) && isset($exception3)) {
            $message = sprintf("The value %s does not match any of the union rules: PMS_ResStatusType, TransactionActionType, UpperCaseAlphaLength1to2. See following errors:\n%s", var_export($value, true), implode("\n", array_map(function(\InvalidArgumentException $e) { return sprintf(' - %s', $e->getMessage()); }, [$exception0, $exception1, $exception2, $exception3])));
        }
        unset($exception0, $exception1, $exception2, $exception3);
        return $message;
    }
    /**
     * Set ResStatus value
     * @param string $resStatus
     * @return \Api\StructType\ApiHotelReservationType
     */
    public function setResStatus($resStatus = null)
    {
        // validation for constraint: string
        if (!is_null($resStatus) && !is_string($resStatus)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($resStatus, true), gettype($resStatus)), __LINE__);
        }
        // validation for constraint: union
        if ('' !== ($resStatusUnionErrorMessage = self::validateResStatusForUnionConstraintsFromSetResStatus($resStatus))) {
            throw new \InvalidArgumentException($resStatusUnionErrorMessage, __LINE__);
        }
        $this->ResStatus = $resStatus;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Api\StructType\ApiHotelReservationType
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
