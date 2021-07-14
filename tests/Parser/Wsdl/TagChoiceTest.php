<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagChoice;

class TagChoiceTest extends WsdlParser
{
    /**
     * @return TagChoice
     */
    public static function whlInstanceParser()
    {
        return new TagChoice(self::generatorInstance(self::wsdlWhlPath()));
    }

    /**
     * @return TagChoice
     */
    public static function ewsInstanceParser()
    {
        return new TagChoice(self::generatorInstance(self::wsdlEwsPath()));
    }

    /**
     * @return TagChoice
     */
    public static function deliveryInstanceParser()
    {
        return new TagChoice(self::generatorInstance(self::wsdlDeliveryServicePath()));
    }

    /**
     * <xs:complexType name="PaymentFormType">
        <xs:annotation>
         <xs:documentation xml:lang="en">Ways of providing funds and guarantees for travel by the individual.</xs:documentation>
        </xs:annotation>
        <xs:choice minOccurs="0">
         <xs:element name="PaymentCard" type="whlsoap:PaymentCardType">
          <xs:annotation>
           <xs:documentation xml:lang="en">Details of a debit or credit card.</xs:documentation>
          </xs:annotation>
         </xs:element>
         <xs:element name="BankAcct" type="whlsoap:BankAcctType">
          <xs:annotation>
           <xs:documentation xml:lang="en">Details of a bank account.</xs:documentation>
          </xs:annotation>
         </xs:element>
         <xs:element name="DirectBill" type="whlsoap:DirectBillType">
          <xs:annotation>
           <xs:documentation xml:lang="en">Details of a direct billing arrangement.</xs:documentation>
          </xs:annotation>
         </xs:element>
         <xs:element name="Cash">
          <xs:annotation>
           <xs:documentation xml:lang="en">Used to indicate payment in cash.</xs:documentation>
          </xs:annotation>
          <xs:complexType>
           <xs:attribute name="CashIndicator" type="xs:boolean" use="optional">
            <xs:annotation>
             <xs:documentation xml:lang="en">If true, this indicates cash is being used.</xs:documentation>
             <xs:documentation xml:lang="en">
              <LegacyDefaultValue>true</LegacyDefaultValue>
             </xs:documentation>
            </xs:annotation>
           </xs:attribute>
          </xs:complexType>
         </xs:element>
        </xs:choice>
        <xs:attribute name="RPH" type="whlsoap:RPH_Type" use="optional">
         <xs:annotation>
          <xs:documentation xml:lang="en">Provides a reference to a specific form of payment.</xs:documentation>
         </xs:annotation>
        </xs:attribute>
       </xs:complexType>
     *
     * <xs:complexType name="MessageAcknowledgementType">
        <xs:annotation>
         <xs:documentation xml:lang="en">Information to acknowledge the receipt of a message.</xs:documentation>
        </xs:annotation>
        <xs:sequence>
         <xs:choice>
          <xs:sequence>
           <xs:element name="Success" type="whlsoap:SuccessType">
            <xs:annotation>
             <xs:documentation xml:lang="en">Returning an empty element of this type indicates the successful processing of an OpenTravel message. This is used in conjunction with Warnings to report any warnings or business errors.</xs:documentation>
            </xs:annotation>
           </xs:element>
           <xs:element name="Warnings" type="whlsoap:WarningsType" minOccurs="0">
            <xs:annotation>
             <xs:documentation xml:lang="en">Used when a message has been successfully processed to report any warnings or business errors that occurred.</xs:documentation>
            </xs:annotation>
           </xs:element>
          </xs:sequence>
          <xs:element name="Errors" type="whlsoap:ErrorsType">
           <xs:annotation>
            <xs:documentation xml:lang="en">Indicates an error occurred during the processing of an OpenTravel message. If the message successfully processes, but there are business errors, those errors should be passed in the warning element.</xs:documentation>
           </xs:annotation>
          </xs:element>
         </xs:choice>
         <xs:element name="UniqueID" type="whlsoap:UniqueID_Type" minOccurs="0">
          <xs:annotation>
           <xs:documentation xml:lang="en">May be used to return the unique id from the request message.</xs:documentation>
          </xs:annotation>
         </xs:element>
        </xs:sequence>
        <xs:attributeGroup ref="whlsoap:OTA_PayloadStdAttributes">
         <xs:annotation>
          <xs:documentation xml:lang="en">The OTA_PayloadStdAttributes defines the standard attributes that appear on the root element for all OpenTravel Messages.</xs:documentation>
         </xs:annotation>
        </xs:attributeGroup>
       </xs:complexType>
     */
    public function testParseWhlMustAssignMetaOfChoice()
    {
        $tagChoiceParser = self::whlInstanceParser();

        $tagChoiceParser->parse();

        $count = 0;
        $structs = $tagChoiceParser->getGenerator()->getStructs();
        if ($structs->count() > 0) {
            /** @var Struct $struct */
            foreach ($structs as $struct) {
                switch ($struct->getName()) {
                    case 'PaymentFormType':
                        $this->assertSame(1, $struct->getAttribute('PaymentCard')->getMetaValue('choiceMaxOccurs'));
                        $this->assertSame(0, $struct->getAttribute('PaymentCard')->getMetaValue('choiceMinOccurs'));
                        $this->assertSame([
                            'PaymentCard',
                            'BankAcct',
                            'DirectBill',
                            'Cash',
                        ], $struct->getAttribute('PaymentCard')->getMetaValue('choice'));
                        $count++;
                        break;
                    case 'MessageAcknowledgementType':
                        $this->assertSame(1, $struct->getAttribute('Errors')->getMetaValue('choiceMaxOccurs'));
                        $this->assertSame(1, $struct->getAttribute('Errors')->getMetaValue('choiceMinOccurs'));
                        $this->assertSame([
                            'Errors',
                        ], $struct->getAttribute('Errors')->getMetaValue('choice'));
                        $count++;
                        break;
                }
            }
        }
        $this->assertSame(2, $count);
    }

    /**
     * <xs:complexType name="FindFolderType">
            <xs:complexContent>
                <xs:extension base="m:BaseRequestType">
                    <xs:sequence>
                        <xs:element name="FolderShape" type="t:FolderResponseShapeType" />
                        <xs:choice maxOccurs="1" minOccurs="0">
                            <xs:element name="IndexedPageFolderView" type="t:IndexedPageViewType" />
                            <xs:element name="FractionalPageFolderView" type="t:FractionalPageViewType" />
                        </xs:choice>
                        <xs:element name="Restriction" type="t:RestrictionType" minOccurs="0" />
                        <xs:element name="ParentFolderIds" type="t:NonEmptyArrayOfBaseFolderIdsType" />
                    </xs:sequence>
                    <xs:attribute name="Traversal" type="t:FolderQueryTraversalType" use="required" />
                </xs:extension>
            </xs:complexContent>
        </xs:complexType>
     *
     * <xs:complexType name="FindItemType">
            <xs:complexContent>
                <xs:extension base="m:BaseRequestType">
                    <xs:sequence>
                        <xs:element name="ItemShape" type="t:ItemResponseShapeType" />
                        <xs:choice minOccurs="0">
                            <xs:element name="IndexedPageItemView" type="t:IndexedPageViewType" />
                            <xs:element name="FractionalPageItemView" type="t:FractionalPageViewType" />
                            <xs:element name="SeekToConditionPageItemView" type="t:SeekToConditionPageViewType" />
                            <xs:element name="CalendarView" type="t:CalendarViewType" />
                            <xs:element name="ContactsView" type="t:ContactsViewType" />
                        </xs:choice>
                        <xs:choice minOccurs="0">
                            <xs:element name="GroupBy" type="t:GroupByType" />
                            <xs:element name="DistinguishedGroupBy" type="t:DistinguishedGroupByType" />
                        </xs:choice>
                        <xs:element name="Restriction" type="t:RestrictionType" minOccurs="0" />
                        <xs:element name="SortOrder" type="t:NonEmptyArrayOfFieldOrdersType" minOccurs="0" />
                        <xs:element name="ParentFolderIds" type="t:NonEmptyArrayOfBaseFolderIdsType" />
                        <xs:element name="QueryString" type="m:QueryStringType" minOccurs="0" maxOccurs="1" />
                    </xs:sequence>
                    <xs:attribute name="Traversal" type="t:ItemQueryTraversalType" use="required" />
                </xs:extension>
            </xs:complexContent>
        </xs:complexType>
     */
    public function testParseEwsMustAssignMetaOfChoice()
    {
        $tagChoiceParser = self::ewsInstanceParser();

        $tagChoiceParser->parse();

        $count = 0;
        $structs = $tagChoiceParser->getGenerator()->getStructs();
        if ($structs->count() > 0) {
            /** @var Struct $struct */
            foreach ($structs as $struct) {
                switch ($struct->getName()) {
                    case 'FindFolderType':
                        $this->assertSame(1, $struct->getAttribute('IndexedPageFolderView')->getMetaValue('choiceMaxOccurs'));
                        $this->assertSame(0, $struct->getAttribute('IndexedPageFolderView')->getMetaValue('choiceMinOccurs'));
                        $this->assertSame([
                            'IndexedPageFolderView',
                            'FractionalPageFolderView',
                        ], $struct->getAttribute('IndexedPageFolderView')->getMetaValue('choice'));
                        $count++;
                        break;
                    case 'FindItemType':
                        $this->assertSame(1, $struct->getAttribute('SeekToConditionPageItemView')->getMetaValue('choiceMaxOccurs'));
                        $this->assertSame(0, $struct->getAttribute('SeekToConditionPageItemView')->getMetaValue('choiceMinOccurs'));
                        $this->assertSame([
                            'IndexedPageItemView',
                            'FractionalPageItemView',
                            'SeekToConditionPageItemView',
                            'CalendarView',
                            'ContactsView',
                        ], $struct->getAttribute('SeekToConditionPageItemView')->getMetaValue('choice'));
                        $count++;
                        break;
                }
            }
        }
        $this->assertSame(2, $count);
    }

    /**
     * <xs:element form="qualified" minOccurs="0" name="details">
            <xs:complexType>
                <xs:sequence>
                    <xs:choice maxOccurs="unbounded" minOccurs="0">
                        <xs:element ref="tns:mutualSettlementDetailCalcCostShipping" />
                        <xs:element ref="tns:mutualSettlementDetailCashFlow" />
                        <xs:element ref="tns:mutualSettlementDetailClientPayment" />
                        <xs:element ref="tns:mutualSettlementDetailPostReturnRegistry" />
                        <xs:element ref="tns:mutualSettlementDetailRouteList" />
                        <xs:element ref="tns:mutualSettlementDetailTrackNumberPayment" />
                        <xs:element ref="tns:mutualSettlementDetailServiceRegistration" />
                        <xs:element ref="tns:mutualSettlementDetailAcceptanceRegistry" />
                        <xs:element ref="tns:mutualSettlementDetailAdditionalChargeFare" />
                        <xs:element ref="tns:mutualSettlementDetailOutgoingRequestToCarrier" />
                        <xs:element ref="tns:mutualSettlementDetailSMSInformation" />
                        <xs:element ref="tns:mutualSettlementDetailBuyerGoodsReturn" />
                        <xs:element ref="tns:mutualSettlementDetailProductsPackaging" />
                        <xs:element ref="tns:mutualSettlementDetailAdjustmentWriteRegisters" />
                        <xs:element ref="tns:mutualSettlementDetailSafeCustody" />
                        <xs:element ref="tns:mutualSettlementDetailSafeCustodyCalculation" />
                        <xs:element ref="tns:mutualSettlementDetailRegisterStorage" />
                    </xs:choice>
                </xs:sequence>
            </xs:complexType>
         </xs:element>
     */
    public function testParseDeliveryMustAssignMetaOfChoice()
    {
        $tagChoiceParser = self::deliveryInstanceParser();

        $tagChoiceParser->parse();

        $count = 0;
        $structs = $tagChoiceParser->getGenerator()->getStructs();
        if ($structs->count() > 0) {
            /** @var Struct $struct */
            foreach ($structs as $struct) {
                switch ($struct->getName()) {
                    case 'details':
                        $this->assertSame('unbounded', $struct->getAttribute('mutualSettlementDetailCalcCostShipping')->getMetaValue('choiceMaxOccurs'));
                        $this->assertSame(0, $struct->getAttribute('mutualSettlementDetailCalcCostShipping')->getMetaValue('choiceMinOccurs'));
                        $this->assertSame([
                            'mutualSettlementDetailCalcCostShipping',
                            'mutualSettlementDetailCashFlow',
                            'mutualSettlementDetailClientPayment',
                            'mutualSettlementDetailPostReturnRegistry',
                            'mutualSettlementDetailRouteList',
                            'mutualSettlementDetailTrackNumberPayment',
                            'mutualSettlementDetailServiceRegistration',
                            'mutualSettlementDetailAcceptanceRegistry',
                            'mutualSettlementDetailAdditionalChargeFare',
                            'mutualSettlementDetailOutgoingRequestToCarrier',
                            'mutualSettlementDetailSMSInformation',
                            'mutualSettlementDetailBuyerGoodsReturn',
                            'mutualSettlementDetailProductsPackaging',
                            'mutualSettlementDetailAdjustmentWriteRegisters',
                            'mutualSettlementDetailSafeCustody',
                            'mutualSettlementDetailSafeCustodyCalculation',
                            'mutualSettlementDetailRegisterStorage',
                        ], $struct->getAttribute('mutualSettlementDetailCalcCostShipping')->getMetaValue('choice'));
                        $count++;
                        break;
                }
            }
        }
        $this->assertSame(1, $count);
    }
}
