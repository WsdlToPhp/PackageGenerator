<?php

namespace WsdlToPhp\PackageGenerator\Tests\DomHandler\Wsdl\Tag;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Tests\Model\WsdlTest;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl;

class TagAttributeGroupTest extends TestCase
{
    /**
     *
     */
    public function testGetAttributeRef()
    {
        $schema = WsdlTest::whlInstance();
        $attributeGroups = $schema->getContent()->getElementsByName(Wsdl::TAG_ATTRIBUTE_GROUP);
        $attributeRefs = array(
            'PrimaryLangID_Group',
            'ID_Group',
            'CurrencyAmountGroup',
            'CurrencyCodeGroup',
            'PrivacyGroup',
            'TelephoneAttributesGroup',
            'FormattedInd',
            'TelephoneGroup',
            'DefaultIndGroup',
            'LanguageGroup',
            'ErrorWarningAttributeGroup',
            'ErrorWarningAttributeGroup',
            'CompanyID_AttributesGroup',
            'UniqueID_Group',
            'OTA_PayloadStdAttributes',
            'BookingChannelGroup',
            'ID_OptionalGroup',
            'CurrencyAmountGroup',
            'FeeTaxGroup',
            'IssuerNameGroup',
            'TelephoneInfoGroup',
            'PrivacyGroup',
            'PaymentCardDateGroup',
            'FormattedInd',
            'PrivacyGroup',
            'PrivacyGroup',
            'DefaultIndGroup',
            'PrivacyGroup',
            'TelephoneInfoGroup',
            'PrivacyGroup',
            'DefaultIndGroup',
            'FeeTaxGroup',
            'ChargeUnitGroup',
            'PrivacyGroup',
            'PrivacyGroup',
            'DefaultIndGroup',
            'MultimediaDescriptionGroup',
            'ID_OptionalGroup',
            'MultimediaItemGroup',
            'ID_OptionalGroup',
            'MultimediaDescriptionGroup',
            'MultimediaDescriptionGroup',
            'DateTimeSpanGroup',
            'CurrencyCodeGroup',
            'TelephoneInfoGroup',
            'CitizenCountryNameGroup',
            'GenderGroup',
            'BirthDateGroup',
            'CurrencyCodeGroup',
            'ProfileTypeGroup',
            'DateTimeSpanGroup',
            'RatePlanGroup',
            'InventoryGroup',
            'CodeInfoGroup',
            'CodeInfoGroup',
            'CodeInfoGroup',
            'PositionGroup',
            'DeadlineGroup',
            'CurrencyAmountGroup',
            'CurrencyCodeGroup',
            'ID_OptionalGroup',
            'CodeInfoGroup',
            'GenderGroup',
            'ID_OptionalGroup',
            'ID_OptionalGroup',
            'TelephoneInfoGroup',
            'ID_OptionalGroup',
            'ID_OptionalGroup',
            'ID_OptionalGroup',
            'ID_OptionalGroup',
            'PositionGroup',
            'ID_OptionalGroup',
            'RoomGroup',
            'CodeInfoGroup',
            'ID_OptionalGroup',
            'ID_OptionalGroup',
            'ID_Group',
            'GuestCountGroup',
            'HotelReferenceGroup',
            'ID_Group',
            'CurrencyCodeGroup',
            'HotelReferenceGroup',
            'StatusApplicationGroup',
            'RestrictionStatusGroup',
            'OTA_PayloadStdAttributes',
            'RoomGroup',
            'OTA_PayloadStdAttributes',
            'OTA_PayloadStdAttributes',
            'OTA_PayloadStdAttributes',
            'OTA_PayloadStdAttributes',
            'OTA_PayloadStdAttributes',
            'OTA_PayloadStdAttributes',
            'OTA_PayloadStdAttributes',
            'OTA_PayloadStdAttributes',
            'OTA_PayloadStdAttributes',
            'OTA_PayloadStdAttributes',
            'OTA_PayloadStdAttributes',
            'OTA_PayloadStdAttributes',
            'OTA_PayloadStdAttributes',
            'OTA_PayloadStdAttributes',
            'HotelReferenceGroup',
            'OTA_PayloadStdAttributes',
            'OTA_PayloadStdAttributes',
            'OTA_PayloadStdAttributes',
            'HotelReferenceGroup',
            'OTA_PayloadStdAttributes'
        );
        $attributeNames = array(
            'ErrorWarningAttributeGroup',
            'LanguageGroup',
            'PrimaryLangID_Group',
            'OTA_PayloadStdAttributes',
            'CompanyID_AttributesGroup',
            'UniqueID_Group',
            'ID_Group',
            'PositionGroup',
            'BookingChannelGroup',
            'NameOptionalCodeGroup',
            'CodeInfoGroup',
            'DeadlineGroup',
            'FeeTaxGroup',
            'CurrencyAmountGroup',
            'CurrencyCodeGroup',
            'IssuerNameGroup',
            'FormattedInd',
            'PrivacyGroup',
            'TelephoneAttributesGroup',
            'TelephoneGroup',
            'TelephoneInfoGroup',
            'DefaultIndGroup',
            'PaymentCardDateGroup',
            'GenderGroup',
            'MultimediaItemGroup',
            'MultimediaDescriptionGroup',
            'RoomGroup',
            'ID_OptionalGroup',
            'ChargeUnitGroup',
            'DateTimeSpanGroup',
            'GuestCountGroup',
            'BirthDateGroup',
            'ProfileTypeGroup',
            'CitizenCountryNameGroup',
            'HotelReferenceGroup',
            'RestrictionStatusGroup',
            'InventoryGroup',
            'RatePlanGroup',
            'StatusApplicationGroup'
        );
        $indexRef = 0;
        $indexName = 0;
        foreach ($attributeGroups as $attributeGroup) {
            if ($attributeGroup->getAttributeRef() !== '') {
                $this->assertSame($attributeRefs[$indexRef++], $attributeGroup->getAttributeRef());
            }
            if ($attributeGroup->getAttributeName() !== '') {
                $this->assertSame($attributeNames[$indexName++], $attributeGroup->getAttributeName());
            }
        }
    }
}
