<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

class UnionRuleTest extends AbstractRuleTest
{

    /**
     * Meta informations extracted from the WSDL
     * - documentation: Indicates the status of the reservation. | A union between TransactionActionType and PMS_ResStatusType. Used in messages that communicate between reservation systems as well as between a reservation and property management system. In
     * addition to the TransactionActionType and PMS_ResStatusType, the UpperCaseAlphaLength1to2 may be used for company specifc codes.
     * - use: optional
     * - union: PMS_ResStatusType | TransactionActionType | UpperCaseAlphaLength1to2
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage The value '1234567980' does not match any of the union rules: PMS_ResStatusType, TransactionActionType, UpperCaseAlphaLength1to2. See following errors:
    - Invalid value(s) '1234567980', please use one of: Reserved, Requested, Request denied, No-show, Cancelled, In-house, Checked out, Waitlisted from enumeration class \EnumType\ApiPMS_ResStatusType
    - Invalid value(s) '1234567980', please use one of: Book, Quote, Hold, Initiate, Ignore, Modify, Commit, Cancel, CommitOverrideEdits, VerifyPrice, Ticket from enumeration class \EnumType\ApiTransactionActionType
    - Invalid value '1234567980', please provide a literal that is among the set of character sequences denoted by the regular expression [A-Z]{1,2}
     */
    public function testSetResStatusWithInvalidValueMustThrowAnException()
    {
        $instance = self::getWhlHotelReservationTypeInstance(true);

        $instance->setResStatus('1234567980');
    }

    /**
     * Meta informations extracted from the WSDL
     * - documentation: Indicates the status of the reservation. | A union between TransactionActionType and PMS_ResStatusType. Used in messages that communicate between reservation systems as well as between a reservation and property management system. In
     * addition to the TransactionActionType and PMS_ResStatusType, the UpperCaseAlphaLength1to2 may be used for company specifc codes.
     * - use: optional
     * - union: PMS_ResStatusType | TransactionActionType | UpperCaseAlphaLength1to2
     */
    public function testSetResStatusWithFirstUnionValidValueMustPass()
    {
        $instance = self::getWhlHotelReservationTypeInstance(true);

        $this->assertSame($instance, $instance->setResStatus(\EnumType\ApiPMS_ResStatusType::VALUE_RESERVED));
    }

    /**
     * Meta informations extracted from the WSDL
     * - documentation: Indicates the status of the reservation. | A union between TransactionActionType and PMS_ResStatusType. Used in messages that communicate between reservation systems as well as between a reservation and property management system. In
     * addition to the TransactionActionType and PMS_ResStatusType, the UpperCaseAlphaLength1to2 may be used for company specifc codes.
     * - use: optional
     * - union: PMS_ResStatusType | TransactionActionType | UpperCaseAlphaLength1to2
     */
    public function testSetResStatusWithSecondUnionValidValueMustPass()
    {
        $instance = self::getWhlHotelReservationTypeInstance(true);

        $this->assertSame($instance, $instance->setResStatus(\EnumType\ApiTransactionActionType::VALUE_BOOK));
    }

    /**
     * Meta informations extracted from the WSDL
     * - documentation: Indicates the status of the reservation. | A union between TransactionActionType and PMS_ResStatusType. Used in messages that communicate between reservation systems as well as between a reservation and property management system. In
     * addition to the TransactionActionType and PMS_ResStatusType, the UpperCaseAlphaLength1to2 may be used for company specifc codes.
     * - use: optional
     * - union: PMS_ResStatusType | TransactionActionType | UpperCaseAlphaLength1to2
     */
    public function testSetResStatusWithThirdUnionValidValueMustPass()
    {
        $instance = self::getWhlHotelReservationTypeInstance(true);

        $this->assertSame($instance, $instance->setResStatus('AAABBBCCCDDDEEEFFFGGGHHHIIIJJJKKKLLMMOOPPQQRRSSTTUUVVWWXXXYYYZZ'));
    }

    /**
     * Meta informations extracted from the WSDL
     * - documentation: Indicates the status of the reservation. | A union between TransactionActionType and PMS_ResStatusType. Used in messages that communicate between reservation systems as well as between a reservation and property management system. In
     * addition to the TransactionActionType and PMS_ResStatusType, the UpperCaseAlphaLength1to2 may be used for company specifc codes.
     * - use: optional
     * - union: PMS_ResStatusType | TransactionActionType | UpperCaseAlphaLength1to2
     */
    public function testSetResStatusWithNullValueMustPass()
    {
        $instance = self::getWhlHotelReservationTypeInstance(true);

        $this->assertSame($instance, $instance->setResStatus(null));
    }
}
