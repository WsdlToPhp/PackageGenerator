<?php

namespace WsdlToPhp\PackageGenerator\Tests\WsdlHandler\Tag;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Tests\Model\WsdlTest;
use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagAttributeGroup;

class TagAttributeGroupTest extends TestCase
{
    /**
     *
     */
    public function testGetAttributeRef()
    {
        $schema = WsdlTest::wsdlWhlInstance();
        $attributeGroups = $schema->getContent()->getElementsByName(Wsdl::TAG_ATTRIBUTE_GROUP);
        $attributeRefs = [
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
            'OTA_PayloadStdAttributes',
        ];
        $indexRef = 0;
        foreach ($attributeGroups as $attributeGroup) {
            if ($attributeGroup->getAttributeRef() !== '') {
                $this->assertSame($attributeRefs[$indexRef++], $attributeGroup->getAttributeRef());
            }
        }
    }
    /**
     *
     */
    public function testGetAttributeName()
    {
        $schema = WsdlTest::wsdlWhlInstance();
        $attributeGroups = $schema->getContent()->getElementsByName(Wsdl::TAG_ATTRIBUTE_GROUP);
        $attributeNames = [
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
            'StatusApplicationGroup',
        ];
        $indexName = 0;
        foreach ($attributeGroups as $attributeGroup) {
            if ($attributeGroup->getAttributeName() !== '') {
                $this->assertSame($attributeNames[$indexName++], $attributeGroup->getAttributeName());
            }
        }
    }
    /**
     *
     */
    public function testGetReferencingElements()
    {
        $schema = WsdlTest::wsdlWhlInstance();
        $attributeGroups = $schema->getContent()->getElementsByName(Wsdl::TAG_ATTRIBUTE_GROUP);
        $attributeGroupCounts = [
            'ErrorWarningAttributeGroup' => 2,
            'LanguageGroup' => 1,
            'PrimaryLangID_Group' => 20,
            'OTA_PayloadStdAttributes' => 20,
            'CompanyID_AttributesGroup' => 1,
            'UniqueID_Group' => 1,
            'ID_Group' => 3,
            'PositionGroup' => 2,
            'BookingChannelGroup' => 1,
            'NameOptionalCodeGroup' => 0,
            'CodeInfoGroup' => 5,
            'DeadlineGroup' => 1,
            'FeeTaxGroup' => 2,
            'CurrencyAmountGroup' => 4,
            'CurrencyCodeGroup' => 8,
            'IssuerNameGroup' => 1,
            'FormattedInd' => 5,
            'PrivacyGroup' => 11,
            'TelephoneAttributesGroup' => 4,
            'TelephoneGroup' => 4,
            'TelephoneInfoGroup' => 4,
            'DefaultIndGroup' => 4,
            'PaymentCardDateGroup' => 1,
            'GenderGroup' => 2,
            'MultimediaItemGroup' => 1,
            'MultimediaDescriptionGroup' => 3,
            'RoomGroup' => 2,
            'ID_OptionalGroup' => 13,
            'ChargeUnitGroup' => 1,
            'DateTimeSpanGroup' => 2,
            'GuestCountGroup' => 1,
            'BirthDateGroup' => 1,
            'ProfileTypeGroup' => 1,
            'CitizenCountryNameGroup' => 1,
            'HotelReferenceGroup' => 4,
            'RestrictionStatusGroup' => 1,
            'InventoryGroup' => 1,
            'RatePlanGroup' => 1,
            'StatusApplicationGroup' => 1,
        ];
        $testedCount = 0;
        /** @var TagAttributeGroup $attributeGroup */
        foreach ($attributeGroups as $attributeGroup) {
            if ($attributeGroup->getAttributeName() !== '') {
                $elements = $attributeGroup->getReferencingElements();
                $this->assertCount($attributeGroupCounts[$attributeGroup->getAttributeName()], $elements, sprintf('Failed with attributeGroup is "%s"', $attributeGroup->getAttributeName()));
                $this->assertContainsOnlyInstancesOf('\WsdlToPhp\PackageGenerator\WsdlHandler\Tag\Tag', $elements);
                $testedCount++;
            }
        }
        $this->assertCount($testedCount, $attributeGroupCounts);
    }
}
