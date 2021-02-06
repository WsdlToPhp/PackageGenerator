<?php

declare(strict_types=1);

namespace Api\StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for HotelReservationType StructType
 * Meta information extracted from the WSDL
 * - documentation: The Reservation class contains the point of sale, reservation identifier, room stay, service, guest, payment, loyalty program, comments, confirmation and queue information for the reservation being created or modify.
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
class ApiHotelReservationType extends AbstractStructBase
{
    /**
     * The RoomStays
     * Meta information extracted from the WSDL
     * - documentation: Collection of room stays.
     * - minOccurs: 0
     * @var \Api\StructType\ApiRoomStaysType|null
     */
    protected ?\Api\StructType\ApiRoomStaysType $RoomStays = null;
    /**
     * The ResGuests
     * Meta information extracted from the WSDL
     * - documentation: Collection of guests associated with the reservation.
     * - minOccurs: 0
     * @var \Api\StructType\ApiResGuestsType|null
     */
    protected ?\Api\StructType\ApiResGuestsType $ResGuests = null;
    /**
     * The ResGlobalInfo
     * Meta information extracted from the WSDL
     * - documentation: ResGlobalInfo is a container for various information that affects the Reservation as a whole. These include global comments, counts, reservation IDs, loyalty programs, and payment methods.
     * - minOccurs: 0
     * @var \Api\StructType\ApiResGlobalInfoType|null
     */
    protected ?\Api\StructType\ApiResGlobalInfoType $ResGlobalInfo = null;
    /**
     * The RoomStayReservation
     * Meta information extracted from the WSDL
     * - documentation: Boolean True if this reservation is reserving rooms. False if it is only reserving services.
     * - use: optional
     * @var bool|null
     */
    protected ?bool $RoomStayReservation = null;
    /**
     * The ResStatus
     * Meta information extracted from the WSDL
     * - documentation: Indicates the status of the reservation. | A union between TransactionActionType and PMS_ResStatusType. Used in messages that communicate between reservation systems as well as between a reservation and property management system. In
     * addition to the TransactionActionType and PMS_ResStatusType, the UpperCaseAlphaLength1to2 may be used for company specifc codes.
     * - union: PMS_ResStatusType | TransactionActionType | UpperCaseAlphaLength1to2
     * - use: optional
     * @var string|null
     */
    protected ?string $ResStatus = null;
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
    public function __construct(?\Api\StructType\ApiRoomStaysType $roomStays = null, ?\Api\StructType\ApiResGuestsType $resGuests = null, ?\Api\StructType\ApiResGlobalInfoType $resGlobalInfo = null, ?bool $roomStayReservation = null, ?string $resStatus = null)
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
    public function getRoomStays(): ?\Api\StructType\ApiRoomStaysType
    {
        return $this->RoomStays;
    }
    /**
     * Set RoomStays value
     * @param \Api\StructType\ApiRoomStaysType $roomStays
     * @return \Api\StructType\ApiHotelReservationType
     */
    public function setRoomStays(?\Api\StructType\ApiRoomStaysType $roomStays = null): self
    {
        $this->RoomStays = $roomStays;
        return $this;
    }
    /**
     * Get ResGuests value
     * @return \Api\StructType\ApiResGuestsType|null
     */
    public function getResGuests(): ?\Api\StructType\ApiResGuestsType
    {
        return $this->ResGuests;
    }
    /**
     * Set ResGuests value
     * @param \Api\StructType\ApiResGuestsType $resGuests
     * @return \Api\StructType\ApiHotelReservationType
     */
    public function setResGuests(?\Api\StructType\ApiResGuestsType $resGuests = null): self
    {
        $this->ResGuests = $resGuests;
        return $this;
    }
    /**
     * Get ResGlobalInfo value
     * @return \Api\StructType\ApiResGlobalInfoType|null
     */
    public function getResGlobalInfo(): ?\Api\StructType\ApiResGlobalInfoType
    {
        return $this->ResGlobalInfo;
    }
    /**
     * Set ResGlobalInfo value
     * @param \Api\StructType\ApiResGlobalInfoType $resGlobalInfo
     * @return \Api\StructType\ApiHotelReservationType
     */
    public function setResGlobalInfo(?\Api\StructType\ApiResGlobalInfoType $resGlobalInfo = null): self
    {
        $this->ResGlobalInfo = $resGlobalInfo;
        return $this;
    }
    /**
     * Get RoomStayReservation value
     * @return bool|null
     */
    public function getRoomStayReservation(): ?bool
    {
        return $this->RoomStayReservation;
    }
    /**
     * Set RoomStayReservation value
     * @param bool $roomStayReservation
     * @return \Api\StructType\ApiHotelReservationType
     */
    public function setRoomStayReservation(?bool $roomStayReservation = null): self
    {
        // validation for constraint: boolean
        if (!is_null($roomStayReservation) && !is_bool($roomStayReservation)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a bool, %s given', var_export($roomStayReservation, true), gettype($roomStayReservation)), __LINE__);
        }
        $this->RoomStayReservation = $roomStayReservation;
        return $this;
    }
    /**
     * Get ResStatus value
     * @return string|null
     */
    public function getResStatus(): ?string
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
    public static function validateResStatusForUnionConstraintsFromSetResStatus($value): string
    {
        $message = '';
        // validation for constraint: enumeration
        if (!\Api\EnumType\ApiPMS_ResStatusType::valueIsValid($value)) {
            $exception0 = new InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \Api\EnumType\ApiPMS_ResStatusType', is_array($value) ? implode(', ', $value) : var_export($value, true), implode(', ', \Api\EnumType\ApiPMS_ResStatusType::getValidValues())), __LINE__);
        }
        // validation for constraint: enumeration
        if (!\Api\EnumType\ApiTransactionActionType::valueIsValid($value)) {
            $exception1 = new InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \Api\EnumType\ApiTransactionActionType', is_array($value) ? implode(', ', $value) : var_export($value, true), implode(', ', \Api\EnumType\ApiTransactionActionType::getValidValues())), __LINE__);
        }
        // validation for constraint: pattern([A-Z]{1,2})
        if (!is_null($value) && !preg_match('/[A-Z]{1,2}/', $value)) {
            $exception2 = new InvalidArgumentException(sprintf('Invalid value %s, please provide a literal that is among the set of character sequences denoted by the regular expression /[A-Z]{1,2}/', var_export($value, true)), __LINE__);
        }
        if (isset($exception0) && isset($exception1) && isset($exception2)) {
            $message = sprintf("The value %s does not match any of the union rules: PMS_ResStatusType, TransactionActionType, UpperCaseAlphaLength1to2. See following errors:\n%s", var_export($value, true), implode("\n", array_map(function(InvalidArgumentException $e) { return sprintf(' - %s', $e->getMessage()); }, [$exception0, $exception1, $exception2])));
        }
        unset($exception0, $exception1, $exception2);
        return $message;
    }
    /**
     * Set ResStatus value
     * @param string $resStatus
     * @return \Api\StructType\ApiHotelReservationType
     */
    public function setResStatus(?string $resStatus = null): self
    {
        // validation for constraint: string
        if (!is_null($resStatus) && !is_string($resStatus)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($resStatus, true), gettype($resStatus)), __LINE__);
        }
        // validation for constraint: union(PMS_ResStatusType, TransactionActionType, UpperCaseAlphaLength1to2)
        if ('' !== ($resStatusUnionErrorMessage = self::validateResStatusForUnionConstraintsFromSetResStatus($resStatus))) {
            throw new InvalidArgumentException($resStatusUnionErrorMessage, __LINE__);
        }
        $this->ResStatus = $resStatus;
        return $this;
    }
}
