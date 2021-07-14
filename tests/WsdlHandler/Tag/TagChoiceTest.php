<?php

namespace WsdlToPhp\PackageGenerator\Tests\WsdlHandler\Tag;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Tests\Model\WsdlTest;
use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagChoice;

class TagChoiceTest extends TestCase
{
    public function testGetChildrenElementsTagsMustReturnTheListOfTags()
    {
        $this->assertSame([
            'element',
            'group',
            'choice',
            'any',
        ], TagChoice::getChildrenElementsTags());
    }

    public function testGetForbiddenParentTagsMustReturnTheListOfForbiddenParentTags()
    {
        $this->assertSame([
            'complexType',
            'sequence',
        ], TagChoice::getForbiddenParentTags());
    }

    public function testGetChildrenElementsMustReturnAnArray()
    {
        $schema = WsdlTest::schemaEwsMessagesInstance();

        /** @var TagChoice $choice */
        $choice = $schema->getContent()->getElementByName(Wsdl::TAG_CHOICE);

        $this->assertTrue(is_array($choice->getChildrenElements()));
    }

    /**
     *  <xs:choice maxOccurs="1" minOccurs="0">
     *   <xs:element name="IndexedPageFolderView" type="t:IndexedPageViewType" />
     *   <xs:element name="FractionalPageFolderView" type="t:FractionalPageViewType" />
     *  </xs:choice>
     */
    public function testGetChildrenElementsMustReturnDirectChildrenTags()
    {
        $schema = WsdlTest::schemaEwsMessagesInstance();

        /** @var TagChoice $choice */
        $choice = $schema->getContent()->getElementByNameAndAttributes(Wsdl::TAG_CHOICE, [
            'maxOccurs' => '1',
            'minOccurs' => '0',
        ]);

        $children = $choice->getChildrenElements();

        $this->assertCount(2, $children);
        $this->assertSame('IndexedPageFolderView', $children[0]->getAttributeName());
        $this->assertSame('FractionalPageFolderView', $children[1]->getAttributeName());
    }

    /**
     *  <xs:choice minOccurs="0" maxOccurs="unbounded">
     *   <xs:element name="Text" type="whlsoap:FormattedTextTextType">
     *    <xs:annotation>
     *     <xs:documentation xml:lang="en">Formatted text content.</xs:documentation>
     *    </xs:annotation>
     *   </xs:element>
     *   <xs:element name="Image" type="xs:string">
     *    <xs:annotation>
     *     <xs:documentation xml:lang="en">An image for this paragraph.</xs:documentation>
     *    </xs:annotation>
     *   </xs:element>
     *   <xs:element name="URL" type="xs:anyURI">
     *    <xs:annotation>
     *     <xs:documentation xml:lang="en">A URL for this paragraph.</xs:documentation>
     *    </xs:annotation>
     *   </xs:element>
     *   <xs:element name="ListItem">
     *    <xs:annotation>
     *     <xs:documentation xml:lang="en">Formatted text content and an associated item or sequence number.</xs:documentation>
     *    </xs:annotation>
     *    <xs:complexType>
     *     <xs:simpleContent>
     *      <xs:extension base="whlsoap:FormattedTextTextType">
     *       <xs:attribute name="ListItem" type="xs:integer" use="optional">
     *        <xs:annotation>
     *         <xs:documentation xml:lang="en">The item or sequence number.</xs:documentation>
     *        </xs:annotation>
     *       </xs:attribute>
     *      </xs:extension>
     *     </xs:simpleContent>
     *    </xs:complexType>
     *   </xs:element>
     *  </xs:choice>
     */
    public function testGetChildrenElementsMustReturnNestedChildrenTags()
    {
        $schema = WsdlTest::wsdlWhlInstance();

        /** @var TagChoice $choice */
        $choice = $schema->getContent()->getElementByNameAndAttributes(Wsdl::TAG_CHOICE, [
            'minOccurs' => '0',
            'maxOccurs' => 'unbounded',
        ]);

        $children = $choice->getChildrenElements();

        $this->assertCount(4, $children);
        $this->assertSame('Text', $children[0]->getAttributeName());
        $this->assertSame('Image', $children[1]->getAttributeName());
        $this->assertSame('URL', $children[2]->getAttributeName());
        $this->assertSame('ListItem', $children[3]->getAttributeName());
    }

    /**
     * <xs:element name="HotelDescriptiveInfoRS">
        <xs:annotation>
         <xs:documentation xml:lang="en">The Hotel Descriptive Info Response is a message used to provide detailed descriptive information about a hotel property.</xs:documentation>
        </xs:annotation>
        <xs:complexType>
         <xs:choice>
          <xs:sequence>
           <xs:element name="Success" type="whlsoap:SuccessType">
            <xs:annotation>
             <xs:documentation xml:lang="en">The presence of the empty Success element explicitly indicates that the OpenTravel message succeeded.</xs:documentation>
            </xs:annotation>
           </xs:element>
           <xs:element name="Warnings" type="whlsoap:WarningsType" minOccurs="0">
            <xs:annotation>
             <xs:documentation xml:lang="en">Used in conjunction with the Success element to define one or more business errors.</xs:documentation>
            </xs:annotation>
           </xs:element>
           <xs:element name="HotelDescriptiveContents" minOccurs="0">
            <xs:annotation>
             <xs:documentation xml:lang="en">A collection of hotel descriptive information.</xs:documentation>
            </xs:annotation>
            <xs:complexType>
             <xs:sequence>
              <xs:element name="HotelDescriptiveContent" maxOccurs="unbounded">
               <xs:annotation>
                <xs:documentation xml:lang="en">Hotel descriptive information.</xs:documentation>
               </xs:annotation>
               <xs:complexType>
                <xs:complexContent>
                 <xs:extension base="whlsoap:HotelDescriptiveContentType">
                  <xs:attributeGroup ref="whlsoap:HotelReferenceGroup">
                   <xs:annotation>
                    <xs:documentation xml:lang="en">Used to identify the specific hotel.</xs:documentation>
                   </xs:annotation>
                  </xs:attributeGroup>
                 </xs:extension>
                </xs:complexContent>
               </xs:complexType>
              </xs:element>
             </xs:sequence>
            </xs:complexType>
           </xs:element>
          </xs:sequence>
          <xs:element name="Errors" type="whlsoap:ErrorsType">
           <xs:annotation>
            <xs:documentation xml:lang="en">Errors are returned if the request was unable to be processed.</xs:documentation>
           </xs:annotation>
          </xs:element>
         </xs:choice>
         <xs:attributeGroup ref="whlsoap:OTA_PayloadStdAttributes">
          <xs:annotation>
           <xs:documentation xml:lang="en">This element defines standard attributes that appear on the root element for all OpenTravel Messages.</xs:documentation>
          </xs:annotation>
         </xs:attributeGroup>
        </xs:complexType>
       </xs:element>
     */
    public function testGetChildrenElementsMustReturnFirstLevelNestedChildrenTagsOfHotelDescriptiveInfoRS()
    {
        $schema = WsdlTest::wsdlWhlInstance();

        /** @var TagChoice $choice */
        $choice = $schema->getContent()->getElementByNameAndAttributes(Wsdl::TAG_ELEMENT, [
            'name' => 'HotelDescriptiveInfoRS',
        ])->getChildByNameAndAttributes(Wsdl::TAG_CHOICE, []);

        $children = $choice->getChildrenElements();

        $this->assertCount(1, $children);
        $this->assertSame('Errors', $children[0]->getAttributeName());
    }

    /**
     * <xs:element name="HotelAvailRS">
        <xs:annotation>
         <xs:documentation xml:lang="en">Returns information about hotel availability that meet the requested criteria.</xs:documentation>
        </xs:annotation>
        <xs:complexType>
         <xs:choice>
          <xs:sequence>
           <xs:element name="Success" type="whlsoap:SuccessType">
            <xs:annotation>
             <xs:documentation xml:lang="en">The presence of the empty Success element explicitly indicates that the request message was successful.</xs:documentation>
            </xs:annotation>
           </xs:element>
           <xs:element name="Warnings" type="whlsoap:WarningsType" minOccurs="0">
            <xs:annotation>
             <xs:documentation xml:lang="en">Used in conjunction with the Success element to define one or more business errors.</xs:documentation>
            </xs:annotation>
           </xs:element>
           <xs:element name="RoomStays" minOccurs="0">
            <xs:annotation>
             <xs:documentation xml:lang="en">A collection of details on the Room Stay including Guest Counts, Time Span of this Room Stay, and financial information related to the Room Stay, including Guarantee, Deposit and Payment and Cancellation Penalties.</xs:documentation>
            </xs:annotation>
            <xs:complexType>
             <xs:sequence>
              <xs:element name="RoomStay" maxOccurs="unbounded">
               <xs:annotation>
                <xs:documentation xml:lang="en">Details on the Room Stay including Guest Counts, Time Span of this Room Stay, and financial information related to the Room Stay, including Guarantee, Deposit and Payment and Cancellation Penalties.</xs:documentation>
               </xs:annotation>
               <xs:complexType>
                <xs:complexContent>
                 <xs:extension base="whlsoap:RoomStayType">
                  <xs:attribute name="AvailabilityStatus" type="whlsoap:RateIndicatorType" use="optional">
                   <xs:annotation>
                    <xs:documentation xml:lang="en">Used to specify an availability status at the room stay level for a property.</xs:documentation>
                   </xs:annotation>
                  </xs:attribute>
                 </xs:extension>
                </xs:complexContent>
               </xs:complexType>
              </xs:element>
             </xs:sequence>
            </xs:complexType>
           </xs:element>
          </xs:sequence>
          <xs:element name="Errors" type="whlsoap:ErrorsType">
           <xs:annotation>
            <xs:documentation xml:lang="en">Errors are returned if the request was unable to be processed.</xs:documentation>
           </xs:annotation>
          </xs:element>
         </xs:choice>
         <xs:attributeGroup ref="whlsoap:OTA_PayloadStdAttributes">
          <xs:annotation>
           <xs:documentation xml:lang="en">This element defines standard attributes that appear on the root element for all OpenTravel Messages.</xs:documentation>
          </xs:annotation>
         </xs:attributeGroup>
        </xs:complexType>
       </xs:element>
     */
    public function testGetChildrenElementsMustReturnFirstLevelNestedChildrenTagsOfHotelAvailRS()
    {
        $schema = WsdlTest::wsdlWhlInstance();

        /** @var TagChoice $choice */
        $choice = $schema->getContent()->getElementByNameAndAttributes(Wsdl::TAG_ELEMENT, [
            'name' => 'HotelAvailRS',
        ])->getChildByNameAndAttributes(Wsdl::TAG_CHOICE, []);

        $children = $choice->getChildrenElements();

        $this->assertCount(1, $children);
        $this->assertSame('Errors', $children[0]->getAttributeName());
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
    public function testGetChildrenElementsMustReturnFirstLevelNestedChildrenTagsOfDetails()
    {
        $schema = WsdlTest::wsdlDeliveryInstance();

        /** @var TagChoice $choice */
        $choice = $schema->getContent()->getElementByNameAndAttributes(Wsdl::TAG_ELEMENT, [
            'name' => 'details',
            'form' => 'qualified',
            'minOccurs' => 0,
        ])->getChildByNameAndAttributes(Wsdl::TAG_CHOICE, []);

        $children = $choice->getChildrenElements();

        $this->assertCount(17, $children);
        $this->assertSame('mutualSettlementDetailCalcCostShipping', $children[0]->getAttributeRef());
        $this->assertSame('mutualSettlementDetailRegisterStorage', $children[16]->getAttributeRef());
    }
}
