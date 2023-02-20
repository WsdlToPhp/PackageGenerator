<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

use EnumType\ApiPMS_ResStatusType;
use EnumType\ApiTransactionActionType;

/**
 * @internal
 * @coversDefaultClass
 */
final class UnionRuleTest extends AbstractRule
{
    /**
     * Meta informations extracted from the WSDL
     * - documentation: Indicates the status of the reservation. | A union between TransactionActionType and PMS_ResStatusType. Used in messages that communicate between reservation systems as well as between a reservation and property management system. In
     * addition to the TransactionActionType and PMS_ResStatusType, the UpperCaseAlphaLength1to2 may be used for company specifc codes.
     * - use: optional
     * - union: PMS_ResStatusType | TransactionActionType | UpperCaseAlphaLength1to2.
     */
    public function testSetResStatusWithInvalidValueMustThrowAnException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("The value '1234567980' does not match any of the union rules: PMS_ResStatusType, TransactionActionType, UpperCaseAlphaLength1to2. See following errors:\n - Invalid value(s) '1234567980', please use one of: Reserved, Requested, Request denied, No-show, Cancelled, In-house, Checked out, Waitlisted from enumeration class \\EnumType\\ApiPMS_ResStatusType\n - Invalid value(s) '1234567980', please use one of: Book, Quote, Hold, Initiate, Ignore, Modify, Commit, Cancel, CommitOverrideEdits, VerifyPrice, Ticket from enumeration class \\EnumType\\ApiTransactionActionType\n - Invalid value '1234567980', please provide a literal that is among the set of character sequences denoted by the regular expression /[A-Z]{1,2}/");

        $instance = self::getWhlHotelReservationTypeInstance(true);

        $instance->setResStatus('1234567980');
    }

    /**
     * Meta informations extracted from the WSDL
     * - documentation: Indicates the status of the reservation. | A union between TransactionActionType and PMS_ResStatusType. Used in messages that communicate between reservation systems as well as between a reservation and property management system. In
     * addition to the TransactionActionType and PMS_ResStatusType, the UpperCaseAlphaLength1to2 may be used for company specifc codes.
     * - use: optional
     * - union: PMS_ResStatusType | TransactionActionType | UpperCaseAlphaLength1to2.
     */
    public function testSetResStatusWithFirstUnionValidValueMustPass(): void
    {
        $instance = self::getWhlHotelReservationTypeInstance(true);

        $this->assertSame($instance, $instance->setResStatus(ApiPMS_ResStatusType::VALUE_RESERVED));
    }

    /**
     * Meta informations extracted from the WSDL
     * - documentation: Indicates the status of the reservation. | A union between TransactionActionType and PMS_ResStatusType. Used in messages that communicate between reservation systems as well as between a reservation and property management system. In
     * addition to the TransactionActionType and PMS_ResStatusType, the UpperCaseAlphaLength1to2 may be used for company specifc codes.
     * - use: optional
     * - union: PMS_ResStatusType | TransactionActionType | UpperCaseAlphaLength1to2.
     */
    public function testSetResStatusWithSecondUnionValidValueMustPass(): void
    {
        $instance = self::getWhlHotelReservationTypeInstance(true);

        $this->assertSame($instance, $instance->setResStatus(ApiTransactionActionType::VALUE_BOOK));
    }

    /**
     * Meta informations extracted from the WSDL
     * - documentation: Indicates the status of the reservation. | A union between TransactionActionType and PMS_ResStatusType. Used in messages that communicate between reservation systems as well as between a reservation and property management system. In
     * addition to the TransactionActionType and PMS_ResStatusType, the UpperCaseAlphaLength1to2 may be used for company specifc codes.
     * - use: optional
     * - union: PMS_ResStatusType | TransactionActionType | UpperCaseAlphaLength1to2.
     */
    public function testSetResStatusWithThirdUnionValidValueMustPass(): void
    {
        $instance = self::getWhlHotelReservationTypeInstance(true);

        $this->assertSame($instance, $instance->setResStatus('AAABBBCCCDDDEEEFFFGGGHHHIIIJJJKKKLLMMOOPPQQRRSSTTUUVVWWXXXYYYZZ'));
    }

    /**
     * Meta informations extracted from the WSDL
     * - documentation: Indicates the status of the reservation. | A union between TransactionActionType and PMS_ResStatusType. Used in messages that communicate between reservation systems as well as between a reservation and property management system. In
     * addition to the TransactionActionType and PMS_ResStatusType, the UpperCaseAlphaLength1to2 may be used for company specifc codes.
     * - use: optional
     * - union: PMS_ResStatusType | TransactionActionType | UpperCaseAlphaLength1to2.
     */
    public function testSetResStatusWithNullValueMustPass(): void
    {
        $instance = self::getWhlHotelReservationTypeInstance(true);

        $this->assertSame($instance, $instance->setResStatus(null));
    }
}
