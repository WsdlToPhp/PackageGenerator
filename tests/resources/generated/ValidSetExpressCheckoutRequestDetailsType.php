<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for SetExpressCheckoutRequestDetailsType StructType
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
class ApiSetExpressCheckoutRequestDetailsType extends AbstractStructBase
{
    /**
     * The OrderTotal
     * Meta information extracted from the WSDL
     * - documentation: The total cost of the order to the customer. If shipping cost and tax charges are known, include them in OrderTotal; if not, OrderTotal should be the current sub-total of the order. You must set the currencyID attribute to one of the
     * three-character currency codes for any of the supported PayPal currencies. Limitations: Must not exceed $10,000 USD in any currency. No currency symbol. Decimal separator must be a period (.), and the thousands separator must be a comma (,).
     * - minOccurs: 0
     * @var \StructType\ApiBasicAmountType|null
     */
    protected ?\StructType\ApiBasicAmountType $OrderTotal = null;
    /**
     * The ReturnURL
     * Meta information extracted from the WSDL
     * - documentation: URL to which the customer's browser is returned after choosing to pay with PayPal. PayPal recommends that the value of ReturnURL be the final review page on which the customer confirms the order and payment. Required Character length
     * and limitations: no limit.
     * @var string|null
     */
    protected ?string $ReturnURL = null;
    /**
     * The CancelURL
     * Meta information extracted from the WSDL
     * - documentation: URL to which the customer is returned if he does not approve the use of PayPal to pay you. PayPal recommends that the value of CancelURL be the original page on which the customer chose to pay with PayPal. Required Character length
     * and limitations: no limit
     * @var string|null
     */
    protected ?string $CancelURL = null;
    /**
     * The TrackingImageURL
     * Meta information extracted from the WSDL
     * - documentation: Tracking URL for ebay. Required Character length and limitations: no limit
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $TrackingImageURL = null;
    /**
     * The giropaySuccessURL
     * Meta information extracted from the WSDL
     * - documentation: URL to which the customer's browser is returned after paying with giropay online. Optional Character length and limitations: no limit.
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $giropaySuccessURL = null;
    /**
     * The giropayCancelURL
     * Meta information extracted from the WSDL
     * - documentation: URL to which the customer's browser is returned after fail to pay with giropay online. Optional Character length and limitations: no limit.
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $giropayCancelURL = null;
    /**
     * The BanktxnPendingURL
     * Meta information extracted from the WSDL
     * - documentation: URL to which the customer's browser can be returned in the mEFT done page. Optional Character length and limitations: no limit.
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $BanktxnPendingURL = null;
    /**
     * The Token
     * Meta information extracted from the WSDL
     * - documentation: On your first invocation of SetExpressCheckoutRequest, the value of this token is returned by SetExpressCheckoutResponse. Optional Include this element and its value only if you want to modify an existing checkout session with
     * another invocation of SetExpressCheckoutRequest; for example, if you want the customer to edit his shipping address on PayPal. Character length and limitations: 20 single-byte characters
     * - base: xs:string
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $Token = null;
    /**
     * The MaxAmount
     * Meta information extracted from the WSDL
     * - documentation: The expected maximum total amount of the complete order, including shipping cost and tax charges. Optional You must set the currencyID attribute to one of the three-character currency codes for any of the supported PayPal currencies.
     * Limitations: Must not exceed $10,000 USD in any currency. No currency symbol. Decimal separator must be a period (.), and the thousands separator must be a comma (,).
     * - minOccurs: 0
     * @var \StructType\ApiBasicAmountType|null
     */
    protected ?\StructType\ApiBasicAmountType $MaxAmount = null;
    /**
     * The OrderDescription
     * Meta information extracted from the WSDL
     * - documentation: Description of items the customer is purchasing. Optional Character length and limitations: 127 single-byte alphanumeric characters
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $OrderDescription = null;
    /**
     * The Custom
     * Meta information extracted from the WSDL
     * - documentation: A free-form field for your own use, such as a tracking number or other value you want PayPal to return on GetExpressCheckoutDetailsResponse and DoExpressCheckoutPaymentResponse. Optional Character length and limitations: 256
     * single-byte alphanumeric characters
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $Custom = null;
    /**
     * The InvoiceID
     * Meta information extracted from the WSDL
     * - documentation: Your own unique invoice or tracking number. PayPal returns this value to you on DoExpressCheckoutPaymentResponse. Optional Character length and limitations: 127 single-byte alphanumeric characters
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $InvoiceID = null;
    /**
     * The ReqConfirmShipping
     * Meta information extracted from the WSDL
     * - documentation: The value 1 indicates that you require that the customer's shipping address on file with PayPal be a confirmed address. Any value other than 1 indicates that the customer's shipping address on file with PayPal need NOT be a confirmed
     * address. Setting this element overrides the setting you have specified in the recipient's Merchant Account Profile. Optional Character length and limitations: One single-byte numeric character.
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $ReqConfirmShipping = null;
    /**
     * The ReqBillingAddress
     * Meta information extracted from the WSDL
     * - documentation: The value 1 indicates that you require that the customer's billing address on file. Setting this element overrides the setting you have specified in Admin. Optional Character length and limitations: One single-byte numeric character.
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $ReqBillingAddress = null;
    /**
     * The BillingAddress
     * Meta information extracted from the WSDL
     * - documentation: The billing address for the buyer. Optional If you include the BillingAddress element, the AddressType elements are required: Name Street1 CityName CountryCode Do not set set the CountryName element.
     * - minOccurs: 0
     * @var \StructType\ApiAddressType|null
     */
    protected ?\StructType\ApiAddressType $BillingAddress = null;
    /**
     * The NoShipping
     * Meta information extracted from the WSDL
     * - documentation: The value 1 indicates that on the PayPal pages, no shipping address fields should be displayed whatsoever. Optional Character length and limitations: Four single-byte numeric characters.
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $NoShipping = null;
    /**
     * The AddressOverride
     * Meta information extracted from the WSDL
     * - documentation: The value 1 indicates that the PayPal pages should display the shipping address set by you in the Address element on this SetExpressCheckoutRequest, not the shipping address on file with PayPal for this customer. Displaying the
     * PayPal street address on file does not allow the customer to edit that address. Optional Character length and limitations: Four single-byte numeric characters.
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $AddressOverride = null;
    /**
     * The LocaleCode
     * Meta information extracted from the WSDL
     * - documentation: Locale of pages displayed by PayPal during Express Checkout. Optional Character length and limitations: Five single-byte alphabetic characters, upper- or lowercase. Allowable values: AU or en_AU DE or de_DE FR or fr_FR GB or en_GB IT
     * or it_IT JP or ja_JP US or en_US
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $LocaleCode = null;
    /**
     * The PageStyle
     * Meta information extracted from the WSDL
     * - documentation: Sets the Custom Payment Page Style for payment pages associated with this button/link. PageStyle corresponds to the HTML variable page_style for customizing payment pages. The value is the same as the Page Style Name you chose when
     * adding or editing the page style from the Profile subtab of the My Account tab of your PayPal account. Optional Character length and limitations: 30 single-byte alphabetic characters.
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $PageStyle = null;
    /**
     * The cpp_header_image
     * Meta information extracted from the WSDL
     * - documentation: A URL for the image you want to appear at the top left of the payment page. The image has a maximum size of 750 pixels wide by 90 pixels high. PayPal recommends that you provide an image that is stored on a secure (https) server.
     * Optional Character length and limitations: 127
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $cpp_header_image = null;
    /**
     * The cpp_header_border_color
     * Meta information extracted from the WSDL
     * - documentation: Sets the border color around the header of the payment page. The border is a 2-pixel perimeter around the header space, which is 750 pixels wide by 90 pixels high. Optional Character length and limitations: Six character HTML
     * hexadecimal color code in ASCII
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $cpp_header_border_color = null;
    /**
     * The cpp_header_back_color
     * Meta information extracted from the WSDL
     * - documentation: Sets the background color for the header of the payment page. Optional Character length and limitation: Six character HTML hexadecimal color code in ASCII
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $cpp_header_back_color = null;
    /**
     * The cpp_payflow_color
     * Meta information extracted from the WSDL
     * - documentation: Sets the background color for the payment page. Optional Character length and limitation: Six character HTML hexadecimal color code in ASCII
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $cpp_payflow_color = null;
    /**
     * The cpp_cart_border_color
     * Meta information extracted from the WSDL
     * - documentation: Sets the cart gradient color for the Mini Cart on 1X flow. Optional Character length and limitation: Six character HTML hexadecimal color code in ASCII
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $cpp_cart_border_color = null;
    /**
     * The cpp_logo_image
     * Meta information extracted from the WSDL
     * - documentation: A URL for the image you want to appear above the mini-cart. The image has a maximum size of 190 pixels wide by 60 pixels high. PayPal recommends that you provide an image that is stored on a secure (https) server. Optional Character
     * length and limitations: 127
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $cpp_logo_image = null;
    /**
     * The Address
     * Meta information extracted from the WSDL
     * - documentation: Customer's shipping address. Optional If you include a shipping address and set the AddressOverride element on the request, PayPal returns this same address in GetExpressCheckoutDetailsResponse.
     * - minOccurs: 0
     * @var \StructType\ApiAddressType|null
     */
    protected ?\StructType\ApiAddressType $Address = null;
    /**
     * The PaymentAction
     * Meta information extracted from the WSDL
     * - documentation: How you want to obtain payment. Required Authorization indicates that this payment is a basic authorization subject to settlement with PayPal Authorization and Capture. Order indicates that this payment is is an order authorization
     * subject to settlement with PayPal Authorization and Capture. Sale indicates that this is a final sale for which you are requesting payment. IMPORTANT: You cannot set PaymentAction to Sale or Order on SetExpressCheckoutRequest and then change
     * PaymentAction to Authorization on the final Express Checkout API, DoExpressCheckoutPaymentRequest. Character length and limit: Up to 13 single-byte alphabetic characters
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $PaymentAction = null;
    /**
     * The SolutionType
     * Meta information extracted from the WSDL
     * - documentation: This will indicate which flow you are choosing (expresschecheckout or expresscheckout optional) Optional None Sole indicates that you are in the ExpressO flow Mark indicates that you are in the old express flow.
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $SolutionType = null;
    /**
     * The LandingPage
     * Meta information extracted from the WSDL
     * - documentation: This indicates Which page to display for ExpressO (Billing or Login) Optional None Billing indicates that you are not a paypal account holder Login indicates that you are a paypal account holder
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $LandingPage = null;
    /**
     * The BuyerEmail
     * Meta information extracted from the WSDL
     * - documentation: Email address of the buyer as entered during checkout. PayPal uses this value to pre-fill the PayPal membership sign-up portion of the PayPal login page. Optional Character length and limit: 127 single-byte alphanumeric characters
     * - base: xs:string
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $BuyerEmail = null;
    /**
     * The ChannelType
     * Meta information extracted from the WSDL
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $ChannelType = null;
    /**
     * The BillingAgreementDetails
     * Meta information extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var \StructType\ApiBillingAgreementDetailsType[]
     */
    protected ?array $BillingAgreementDetails = null;
    /**
     * The PromoCodes
     * Meta information extracted from the WSDL
     * - documentation: Promo Code Optional List of promo codes supplied by merchant. These promo codes enable the Merchant Services Promotion Financing feature.
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var string[]
     */
    protected ?array $PromoCodes = null;
    /**
     * The PayPalCheckOutBtnType
     * Meta information extracted from the WSDL
     * - documentation: Default Funding option for PayLater Checkout button.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $PayPalCheckOutBtnType = null;
    /**
     * The ProductCategory
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $ProductCategory = null;
    /**
     * The ShippingMethod
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $ShippingMethod = null;
    /**
     * The ProfileAddressChangeDate
     * Meta information extracted from the WSDL
     * - documentation: Date and time (in GMT in the format yyyy-MM-ddTHH:mm:ssZ) at which address was changed by the user.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $ProfileAddressChangeDate = null;
    /**
     * The AllowNote
     * Meta information extracted from the WSDL
     * - documentation: The value 1 indicates that the customer may enter a note to the merchant on the PayPal page during checkout. The note is returned in the GetExpressCheckoutDetails response and the DoExpressCheckoutPayment response. Optional Character
     * length and limitations: One single-byte numeric character. Allowable values: 0,1
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $AllowNote = null;
    /**
     * The FundingSourceDetails
     * Meta information extracted from the WSDL
     * - documentation: Funding source preferences.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \StructType\ApiFundingSourceDetailsType|null
     */
    protected ?\StructType\ApiFundingSourceDetailsType $FundingSourceDetails = null;
    /**
     * The BrandName
     * Meta information extracted from the WSDL
     * - documentation: The label that needs to be displayed on the cancel links in the PayPal hosted checkout pages. Optional Character length and limit: 127 single-byte alphanumeric characters
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $BrandName = null;
    /**
     * The CallbackURL
     * Meta information extracted from the WSDL
     * - documentation: URL for PayPal to use to retrieve shipping, handling, insurance, and tax details from your website. Optional Character length and limitations: 2048 characters.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $CallbackURL = null;
    /**
     * The EnhancedCheckoutData
     * Meta information extracted from the WSDL
     * - documentation: Enhanced data for different industry segments. Optional
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \StructType\ApiEnhancedCheckoutDataType|null
     */
    protected ?\StructType\ApiEnhancedCheckoutDataType $EnhancedCheckoutData = null;
    /**
     * The OtherPaymentMethods
     * Meta information extracted from the WSDL
     * - documentation: List of other payment methods the user can pay with. Optional Refer to the OtherPaymentMethodDetailsType for more details.
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var \StructType\ApiOtherPaymentMethodDetailsType[]
     */
    protected ?array $OtherPaymentMethods = null;
    /**
     * The BuyerDetails
     * Meta information extracted from the WSDL
     * - documentation: Details about the buyer's account. Optional Refer to the BuyerDetailsType for more details.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \StructType\ApiBuyerDetailsType|null
     */
    protected ?\StructType\ApiBuyerDetailsType $BuyerDetails = null;
    /**
     * The PaymentDetails
     * Meta information extracted from the WSDL
     * - documentation: Information about the payment.
     * - maxOccurs: 10
     * - minOccurs: 0
     * @var \StructType\ApiPaymentDetailsType[]
     */
    protected ?array $PaymentDetails = null;
    /**
     * The FlatRateShippingOptions
     * Meta information extracted from the WSDL
     * - documentation: List of Fall Back Shipping options provided by merchant.
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var \StructType\ApiShippingOptionType[]
     */
    protected ?array $FlatRateShippingOptions = null;
    /**
     * The CallbackTimeout
     * Meta information extracted from the WSDL
     * - documentation: Information about the call back timeout override.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $CallbackTimeout = null;
    /**
     * The CallbackVersion
     * Meta information extracted from the WSDL
     * - documentation: Information about the call back version.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $CallbackVersion = null;
    /**
     * The CustomerServiceNumber
     * Meta information extracted from the WSDL
     * - documentation: Information about the Customer service number.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $CustomerServiceNumber = null;
    /**
     * The GiftMessageEnable
     * Meta information extracted from the WSDL
     * - documentation: Information about the Gift message enable.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $GiftMessageEnable = null;
    /**
     * The GiftReceiptEnable
     * Meta information extracted from the WSDL
     * - documentation: Information about the Gift receipt enable.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $GiftReceiptEnable = null;
    /**
     * The GiftWrapEnable
     * Meta information extracted from the WSDL
     * - documentation: Information about the Gift Wrap enable.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $GiftWrapEnable = null;
    /**
     * The GiftWrapName
     * Meta information extracted from the WSDL
     * - documentation: Information about the Gift Wrap name.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $GiftWrapName = null;
    /**
     * The GiftWrapAmount
     * Meta information extracted from the WSDL
     * - documentation: Information about the Gift Wrap amount.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \StructType\ApiBasicAmountType|null
     */
    protected ?\StructType\ApiBasicAmountType $GiftWrapAmount = null;
    /**
     * The BuyerEmailOptInEnable
     * Meta information extracted from the WSDL
     * - documentation: Information about the Buyer email option enable .
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $BuyerEmailOptInEnable = null;
    /**
     * The SurveyEnable
     * Meta information extracted from the WSDL
     * - documentation: Information about the survey enable.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $SurveyEnable = null;
    /**
     * The SurveyQuestion
     * Meta information extracted from the WSDL
     * - documentation: Information about the survey question.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $SurveyQuestion = null;
    /**
     * The SurveyChoice
     * Meta information extracted from the WSDL
     * - documentation: Information about the survey choices for survey question.
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var string[]
     */
    protected ?array $SurveyChoice = null;
    /**
     * The TotalType
     * Meta information extracted from the WSDL
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $TotalType = null;
    /**
     * The NoteToBuyer
     * Meta information extracted from the WSDL
     * - documentation: Any message the seller would like to be displayed in the Mini Cart for UX.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $NoteToBuyer = null;
    /**
     * The Incentives
     * Meta information extracted from the WSDL
     * - documentation: Incentive Code Optional List of incentive codes supplied by ebay/merchant.
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var \StructType\ApiIncentiveInfoType[]
     */
    protected ?array $Incentives = null;
    /**
     * The ReqInstrumentDetails
     * Meta information extracted from the WSDL
     * - documentation: Merchant specified flag which indicates whether to return Funding Instrument Details in DoEC or not. Optional
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $ReqInstrumentDetails = null;
    /**
     * The ExternalRememberMeOptInDetails
     * Meta information extracted from the WSDL
     * - documentation: This element contains information that allows the merchant to request to opt into external remember me on behalf of the buyer or to request login bypass using external remember me. Note the opt-in details are silently ignored if the
     * ExternalRememberMeID is present.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \StructType\ApiExternalRememberMeOptInDetailsType|null
     */
    protected ?\StructType\ApiExternalRememberMeOptInDetailsType $ExternalRememberMeOptInDetails = null;
    /**
     * The FlowControlDetails
     * Meta information extracted from the WSDL
     * - documentation: An optional set of values related to flow-specific details.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \StructType\ApiFlowControlDetailsType|null
     */
    protected ?\StructType\ApiFlowControlDetailsType $FlowControlDetails = null;
    /**
     * The DisplayControlDetails
     * Meta information extracted from the WSDL
     * - documentation: An optional set of values related to display-specific details.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \StructType\ApiDisplayControlDetailsType|null
     */
    protected ?\StructType\ApiDisplayControlDetailsType $DisplayControlDetails = null;
    /**
     * The ExternalPartnerTrackingDetails
     * Meta information extracted from the WSDL
     * - documentation: An optional set of values related to tracking for external partner.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \StructType\ApiExternalPartnerTrackingDetailsType|null
     */
    protected ?\StructType\ApiExternalPartnerTrackingDetailsType $ExternalPartnerTrackingDetails = null;
    /**
     * The CoupledBuckets
     * Meta information extracted from the WSDL
     * - documentation: Optional element that defines relationship between buckets
     * - maxOccurs: 5
     * - minOccurs: 0
     * @var \StructType\ApiCoupledBucketsType[]
     */
    protected ?array $CoupledBuckets = null;
    /**
     * Constructor method for SetExpressCheckoutRequestDetailsType
     * @uses ApiSetExpressCheckoutRequestDetailsType::setOrderTotal()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setReturnURL()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setCancelURL()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setTrackingImageURL()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setGiropaySuccessURL()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setGiropayCancelURL()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setBanktxnPendingURL()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setToken()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setMaxAmount()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setOrderDescription()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setCustom()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setInvoiceID()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setReqConfirmShipping()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setReqBillingAddress()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setBillingAddress()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setNoShipping()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setAddressOverride()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setLocaleCode()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setPageStyle()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setCpp_header_image()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setCpp_header_border_color()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setCpp_header_back_color()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setCpp_payflow_color()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setCpp_cart_border_color()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setCpp_logo_image()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setAddress()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setPaymentAction()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setSolutionType()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setLandingPage()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setBuyerEmail()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setChannelType()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setBillingAgreementDetails()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setPromoCodes()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setPayPalCheckOutBtnType()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setProductCategory()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setShippingMethod()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setProfileAddressChangeDate()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setAllowNote()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setFundingSourceDetails()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setBrandName()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setCallbackURL()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setEnhancedCheckoutData()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setOtherPaymentMethods()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setBuyerDetails()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setPaymentDetails()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setFlatRateShippingOptions()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setCallbackTimeout()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setCallbackVersion()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setCustomerServiceNumber()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setGiftMessageEnable()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setGiftReceiptEnable()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setGiftWrapEnable()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setGiftWrapName()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setGiftWrapAmount()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setBuyerEmailOptInEnable()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setSurveyEnable()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setSurveyQuestion()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setSurveyChoice()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setTotalType()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setNoteToBuyer()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setIncentives()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setReqInstrumentDetails()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setExternalRememberMeOptInDetails()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setFlowControlDetails()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setDisplayControlDetails()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setExternalPartnerTrackingDetails()
     * @uses ApiSetExpressCheckoutRequestDetailsType::setCoupledBuckets()
     * @param \StructType\ApiBasicAmountType $orderTotal
     * @param string $returnURL
     * @param string $cancelURL
     * @param string $trackingImageURL
     * @param string $giropaySuccessURL
     * @param string $giropayCancelURL
     * @param string $banktxnPendingURL
     * @param string $token
     * @param \StructType\ApiBasicAmountType $maxAmount
     * @param string $orderDescription
     * @param string $custom
     * @param string $invoiceID
     * @param string $reqConfirmShipping
     * @param string $reqBillingAddress
     * @param \StructType\ApiAddressType $billingAddress
     * @param string $noShipping
     * @param string $addressOverride
     * @param string $localeCode
     * @param string $pageStyle
     * @param string $cpp_header_image
     * @param string $cpp_header_border_color
     * @param string $cpp_header_back_color
     * @param string $cpp_payflow_color
     * @param string $cpp_cart_border_color
     * @param string $cpp_logo_image
     * @param \StructType\ApiAddressType $address
     * @param string $paymentAction
     * @param string $solutionType
     * @param string $landingPage
     * @param string $buyerEmail
     * @param string $channelType
     * @param \StructType\ApiBillingAgreementDetailsType[] $billingAgreementDetails
     * @param string[] $promoCodes
     * @param string $payPalCheckOutBtnType
     * @param string $productCategory
     * @param string $shippingMethod
     * @param string $profileAddressChangeDate
     * @param string $allowNote
     * @param \StructType\ApiFundingSourceDetailsType $fundingSourceDetails
     * @param string $brandName
     * @param string $callbackURL
     * @param \StructType\ApiEnhancedCheckoutDataType $enhancedCheckoutData
     * @param \StructType\ApiOtherPaymentMethodDetailsType[] $otherPaymentMethods
     * @param \StructType\ApiBuyerDetailsType $buyerDetails
     * @param \StructType\ApiPaymentDetailsType[] $paymentDetails
     * @param \StructType\ApiShippingOptionType[] $flatRateShippingOptions
     * @param string $callbackTimeout
     * @param string $callbackVersion
     * @param string $customerServiceNumber
     * @param string $giftMessageEnable
     * @param string $giftReceiptEnable
     * @param string $giftWrapEnable
     * @param string $giftWrapName
     * @param \StructType\ApiBasicAmountType $giftWrapAmount
     * @param string $buyerEmailOptInEnable
     * @param string $surveyEnable
     * @param string $surveyQuestion
     * @param string[] $surveyChoice
     * @param string $totalType
     * @param string $noteToBuyer
     * @param \StructType\ApiIncentiveInfoType[] $incentives
     * @param string $reqInstrumentDetails
     * @param \StructType\ApiExternalRememberMeOptInDetailsType $externalRememberMeOptInDetails
     * @param \StructType\ApiFlowControlDetailsType $flowControlDetails
     * @param \StructType\ApiDisplayControlDetailsType $displayControlDetails
     * @param \StructType\ApiExternalPartnerTrackingDetailsType $externalPartnerTrackingDetails
     * @param \StructType\ApiCoupledBucketsType[] $coupledBuckets
     */
    public function __construct(?\StructType\ApiBasicAmountType $orderTotal = null, ?string $returnURL = null, ?string $cancelURL = null, ?string $trackingImageURL = null, ?string $giropaySuccessURL = null, ?string $giropayCancelURL = null, ?string $banktxnPendingURL = null, ?string $token = null, ?\StructType\ApiBasicAmountType $maxAmount = null, ?string $orderDescription = null, ?string $custom = null, ?string $invoiceID = null, ?string $reqConfirmShipping = null, ?string $reqBillingAddress = null, ?\StructType\ApiAddressType $billingAddress = null, ?string $noShipping = null, ?string $addressOverride = null, ?string $localeCode = null, ?string $pageStyle = null, ?string $cpp_header_image = null, ?string $cpp_header_border_color = null, ?string $cpp_header_back_color = null, ?string $cpp_payflow_color = null, ?string $cpp_cart_border_color = null, ?string $cpp_logo_image = null, ?\StructType\ApiAddressType $address = null, ?string $paymentAction = null, ?string $solutionType = null, ?string $landingPage = null, ?string $buyerEmail = null, ?string $channelType = null, ?array $billingAgreementDetails = null, ?array $promoCodes = null, ?string $payPalCheckOutBtnType = null, ?string $productCategory = null, ?string $shippingMethod = null, ?string $profileAddressChangeDate = null, ?string $allowNote = null, ?\StructType\ApiFundingSourceDetailsType $fundingSourceDetails = null, ?string $brandName = null, ?string $callbackURL = null, ?\StructType\ApiEnhancedCheckoutDataType $enhancedCheckoutData = null, ?array $otherPaymentMethods = null, ?\StructType\ApiBuyerDetailsType $buyerDetails = null, ?array $paymentDetails = null, ?array $flatRateShippingOptions = null, ?string $callbackTimeout = null, ?string $callbackVersion = null, ?string $customerServiceNumber = null, ?string $giftMessageEnable = null, ?string $giftReceiptEnable = null, ?string $giftWrapEnable = null, ?string $giftWrapName = null, ?\StructType\ApiBasicAmountType $giftWrapAmount = null, ?string $buyerEmailOptInEnable = null, ?string $surveyEnable = null, ?string $surveyQuestion = null, ?array $surveyChoice = null, ?string $totalType = null, ?string $noteToBuyer = null, ?array $incentives = null, ?string $reqInstrumentDetails = null, ?\StructType\ApiExternalRememberMeOptInDetailsType $externalRememberMeOptInDetails = null, ?\StructType\ApiFlowControlDetailsType $flowControlDetails = null, ?\StructType\ApiDisplayControlDetailsType $displayControlDetails = null, ?\StructType\ApiExternalPartnerTrackingDetailsType $externalPartnerTrackingDetails = null, ?array $coupledBuckets = null)
    {
        $this
            ->setOrderTotal($orderTotal)
            ->setReturnURL($returnURL)
            ->setCancelURL($cancelURL)
            ->setTrackingImageURL($trackingImageURL)
            ->setGiropaySuccessURL($giropaySuccessURL)
            ->setGiropayCancelURL($giropayCancelURL)
            ->setBanktxnPendingURL($banktxnPendingURL)
            ->setToken($token)
            ->setMaxAmount($maxAmount)
            ->setOrderDescription($orderDescription)
            ->setCustom($custom)
            ->setInvoiceID($invoiceID)
            ->setReqConfirmShipping($reqConfirmShipping)
            ->setReqBillingAddress($reqBillingAddress)
            ->setBillingAddress($billingAddress)
            ->setNoShipping($noShipping)
            ->setAddressOverride($addressOverride)
            ->setLocaleCode($localeCode)
            ->setPageStyle($pageStyle)
            ->setCpp_header_image($cpp_header_image)
            ->setCpp_header_border_color($cpp_header_border_color)
            ->setCpp_header_back_color($cpp_header_back_color)
            ->setCpp_payflow_color($cpp_payflow_color)
            ->setCpp_cart_border_color($cpp_cart_border_color)
            ->setCpp_logo_image($cpp_logo_image)
            ->setAddress($address)
            ->setPaymentAction($paymentAction)
            ->setSolutionType($solutionType)
            ->setLandingPage($landingPage)
            ->setBuyerEmail($buyerEmail)
            ->setChannelType($channelType)
            ->setBillingAgreementDetails($billingAgreementDetails)
            ->setPromoCodes($promoCodes)
            ->setPayPalCheckOutBtnType($payPalCheckOutBtnType)
            ->setProductCategory($productCategory)
            ->setShippingMethod($shippingMethod)
            ->setProfileAddressChangeDate($profileAddressChangeDate)
            ->setAllowNote($allowNote)
            ->setFundingSourceDetails($fundingSourceDetails)
            ->setBrandName($brandName)
            ->setCallbackURL($callbackURL)
            ->setEnhancedCheckoutData($enhancedCheckoutData)
            ->setOtherPaymentMethods($otherPaymentMethods)
            ->setBuyerDetails($buyerDetails)
            ->setPaymentDetails($paymentDetails)
            ->setFlatRateShippingOptions($flatRateShippingOptions)
            ->setCallbackTimeout($callbackTimeout)
            ->setCallbackVersion($callbackVersion)
            ->setCustomerServiceNumber($customerServiceNumber)
            ->setGiftMessageEnable($giftMessageEnable)
            ->setGiftReceiptEnable($giftReceiptEnable)
            ->setGiftWrapEnable($giftWrapEnable)
            ->setGiftWrapName($giftWrapName)
            ->setGiftWrapAmount($giftWrapAmount)
            ->setBuyerEmailOptInEnable($buyerEmailOptInEnable)
            ->setSurveyEnable($surveyEnable)
            ->setSurveyQuestion($surveyQuestion)
            ->setSurveyChoice($surveyChoice)
            ->setTotalType($totalType)
            ->setNoteToBuyer($noteToBuyer)
            ->setIncentives($incentives)
            ->setReqInstrumentDetails($reqInstrumentDetails)
            ->setExternalRememberMeOptInDetails($externalRememberMeOptInDetails)
            ->setFlowControlDetails($flowControlDetails)
            ->setDisplayControlDetails($displayControlDetails)
            ->setExternalPartnerTrackingDetails($externalPartnerTrackingDetails)
            ->setCoupledBuckets($coupledBuckets);
    }
    /**
     * Get OrderTotal value
     * @return \StructType\ApiBasicAmountType|null
     */
    public function getOrderTotal(): ?\StructType\ApiBasicAmountType
    {
        return $this->OrderTotal;
    }
    /**
     * Set OrderTotal value
     * @param \StructType\ApiBasicAmountType $orderTotal
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setOrderTotal(?\StructType\ApiBasicAmountType $orderTotal = null): self
    {
        $this->OrderTotal = $orderTotal;
        
        return $this;
    }
    /**
     * Get ReturnURL value
     * @return string|null
     */
    public function getReturnURL(): ?string
    {
        return $this->ReturnURL;
    }
    /**
     * Set ReturnURL value
     * @param string $returnURL
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setReturnURL(?string $returnURL = null): self
    {
        // validation for constraint: string
        if (!is_null($returnURL) && !is_string($returnURL)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($returnURL, true), gettype($returnURL)), __LINE__);
        }
        $this->ReturnURL = $returnURL;
        
        return $this;
    }
    /**
     * Get CancelURL value
     * @return string|null
     */
    public function getCancelURL(): ?string
    {
        return $this->CancelURL;
    }
    /**
     * Set CancelURL value
     * @param string $cancelURL
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setCancelURL(?string $cancelURL = null): self
    {
        // validation for constraint: string
        if (!is_null($cancelURL) && !is_string($cancelURL)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($cancelURL, true), gettype($cancelURL)), __LINE__);
        }
        $this->CancelURL = $cancelURL;
        
        return $this;
    }
    /**
     * Get TrackingImageURL value
     * @return string|null
     */
    public function getTrackingImageURL(): ?string
    {
        return $this->TrackingImageURL;
    }
    /**
     * Set TrackingImageURL value
     * @param string $trackingImageURL
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setTrackingImageURL(?string $trackingImageURL = null): self
    {
        // validation for constraint: string
        if (!is_null($trackingImageURL) && !is_string($trackingImageURL)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($trackingImageURL, true), gettype($trackingImageURL)), __LINE__);
        }
        $this->TrackingImageURL = $trackingImageURL;
        
        return $this;
    }
    /**
     * Get giropaySuccessURL value
     * @return string|null
     */
    public function getGiropaySuccessURL(): ?string
    {
        return $this->giropaySuccessURL;
    }
    /**
     * Set giropaySuccessURL value
     * @param string $giropaySuccessURL
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setGiropaySuccessURL(?string $giropaySuccessURL = null): self
    {
        // validation for constraint: string
        if (!is_null($giropaySuccessURL) && !is_string($giropaySuccessURL)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($giropaySuccessURL, true), gettype($giropaySuccessURL)), __LINE__);
        }
        $this->giropaySuccessURL = $giropaySuccessURL;
        
        return $this;
    }
    /**
     * Get giropayCancelURL value
     * @return string|null
     */
    public function getGiropayCancelURL(): ?string
    {
        return $this->giropayCancelURL;
    }
    /**
     * Set giropayCancelURL value
     * @param string $giropayCancelURL
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setGiropayCancelURL(?string $giropayCancelURL = null): self
    {
        // validation for constraint: string
        if (!is_null($giropayCancelURL) && !is_string($giropayCancelURL)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($giropayCancelURL, true), gettype($giropayCancelURL)), __LINE__);
        }
        $this->giropayCancelURL = $giropayCancelURL;
        
        return $this;
    }
    /**
     * Get BanktxnPendingURL value
     * @return string|null
     */
    public function getBanktxnPendingURL(): ?string
    {
        return $this->BanktxnPendingURL;
    }
    /**
     * Set BanktxnPendingURL value
     * @param string $banktxnPendingURL
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setBanktxnPendingURL(?string $banktxnPendingURL = null): self
    {
        // validation for constraint: string
        if (!is_null($banktxnPendingURL) && !is_string($banktxnPendingURL)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($banktxnPendingURL, true), gettype($banktxnPendingURL)), __LINE__);
        }
        $this->BanktxnPendingURL = $banktxnPendingURL;
        
        return $this;
    }
    /**
     * Get Token value
     * @return string|null
     */
    public function getToken(): ?string
    {
        return $this->Token;
    }
    /**
     * Set Token value
     * @param string $token
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setToken(?string $token = null): self
    {
        // validation for constraint: string
        if (!is_null($token) && !is_string($token)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($token, true), gettype($token)), __LINE__);
        }
        $this->Token = $token;
        
        return $this;
    }
    /**
     * Get MaxAmount value
     * @return \StructType\ApiBasicAmountType|null
     */
    public function getMaxAmount(): ?\StructType\ApiBasicAmountType
    {
        return $this->MaxAmount;
    }
    /**
     * Set MaxAmount value
     * @param \StructType\ApiBasicAmountType $maxAmount
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setMaxAmount(?\StructType\ApiBasicAmountType $maxAmount = null): self
    {
        $this->MaxAmount = $maxAmount;
        
        return $this;
    }
    /**
     * Get OrderDescription value
     * @return string|null
     */
    public function getOrderDescription(): ?string
    {
        return $this->OrderDescription;
    }
    /**
     * Set OrderDescription value
     * @param string $orderDescription
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setOrderDescription(?string $orderDescription = null): self
    {
        // validation for constraint: string
        if (!is_null($orderDescription) && !is_string($orderDescription)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($orderDescription, true), gettype($orderDescription)), __LINE__);
        }
        $this->OrderDescription = $orderDescription;
        
        return $this;
    }
    /**
     * Get Custom value
     * @return string|null
     */
    public function getCustom(): ?string
    {
        return $this->Custom;
    }
    /**
     * Set Custom value
     * @param string $custom
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setCustom(?string $custom = null): self
    {
        // validation for constraint: string
        if (!is_null($custom) && !is_string($custom)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($custom, true), gettype($custom)), __LINE__);
        }
        $this->Custom = $custom;
        
        return $this;
    }
    /**
     * Get InvoiceID value
     * @return string|null
     */
    public function getInvoiceID(): ?string
    {
        return $this->InvoiceID;
    }
    /**
     * Set InvoiceID value
     * @param string $invoiceID
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setInvoiceID(?string $invoiceID = null): self
    {
        // validation for constraint: string
        if (!is_null($invoiceID) && !is_string($invoiceID)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($invoiceID, true), gettype($invoiceID)), __LINE__);
        }
        $this->InvoiceID = $invoiceID;
        
        return $this;
    }
    /**
     * Get ReqConfirmShipping value
     * @return string|null
     */
    public function getReqConfirmShipping(): ?string
    {
        return $this->ReqConfirmShipping;
    }
    /**
     * Set ReqConfirmShipping value
     * @param string $reqConfirmShipping
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setReqConfirmShipping(?string $reqConfirmShipping = null): self
    {
        // validation for constraint: string
        if (!is_null($reqConfirmShipping) && !is_string($reqConfirmShipping)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($reqConfirmShipping, true), gettype($reqConfirmShipping)), __LINE__);
        }
        $this->ReqConfirmShipping = $reqConfirmShipping;
        
        return $this;
    }
    /**
     * Get ReqBillingAddress value
     * @return string|null
     */
    public function getReqBillingAddress(): ?string
    {
        return $this->ReqBillingAddress;
    }
    /**
     * Set ReqBillingAddress value
     * @param string $reqBillingAddress
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setReqBillingAddress(?string $reqBillingAddress = null): self
    {
        // validation for constraint: string
        if (!is_null($reqBillingAddress) && !is_string($reqBillingAddress)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($reqBillingAddress, true), gettype($reqBillingAddress)), __LINE__);
        }
        $this->ReqBillingAddress = $reqBillingAddress;
        
        return $this;
    }
    /**
     * Get BillingAddress value
     * @return \StructType\ApiAddressType|null
     */
    public function getBillingAddress(): ?\StructType\ApiAddressType
    {
        return $this->BillingAddress;
    }
    /**
     * Set BillingAddress value
     * @param \StructType\ApiAddressType $billingAddress
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setBillingAddress(?\StructType\ApiAddressType $billingAddress = null): self
    {
        $this->BillingAddress = $billingAddress;
        
        return $this;
    }
    /**
     * Get NoShipping value
     * @return string|null
     */
    public function getNoShipping(): ?string
    {
        return $this->NoShipping;
    }
    /**
     * Set NoShipping value
     * @param string $noShipping
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setNoShipping(?string $noShipping = null): self
    {
        // validation for constraint: string
        if (!is_null($noShipping) && !is_string($noShipping)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($noShipping, true), gettype($noShipping)), __LINE__);
        }
        $this->NoShipping = $noShipping;
        
        return $this;
    }
    /**
     * Get AddressOverride value
     * @return string|null
     */
    public function getAddressOverride(): ?string
    {
        return $this->AddressOverride;
    }
    /**
     * Set AddressOverride value
     * @param string $addressOverride
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setAddressOverride(?string $addressOverride = null): self
    {
        // validation for constraint: string
        if (!is_null($addressOverride) && !is_string($addressOverride)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($addressOverride, true), gettype($addressOverride)), __LINE__);
        }
        $this->AddressOverride = $addressOverride;
        
        return $this;
    }
    /**
     * Get LocaleCode value
     * @return string|null
     */
    public function getLocaleCode(): ?string
    {
        return $this->LocaleCode;
    }
    /**
     * Set LocaleCode value
     * @param string $localeCode
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setLocaleCode(?string $localeCode = null): self
    {
        // validation for constraint: string
        if (!is_null($localeCode) && !is_string($localeCode)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($localeCode, true), gettype($localeCode)), __LINE__);
        }
        $this->LocaleCode = $localeCode;
        
        return $this;
    }
    /**
     * Get PageStyle value
     * @return string|null
     */
    public function getPageStyle(): ?string
    {
        return $this->PageStyle;
    }
    /**
     * Set PageStyle value
     * @param string $pageStyle
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setPageStyle(?string $pageStyle = null): self
    {
        // validation for constraint: string
        if (!is_null($pageStyle) && !is_string($pageStyle)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($pageStyle, true), gettype($pageStyle)), __LINE__);
        }
        $this->PageStyle = $pageStyle;
        
        return $this;
    }
    /**
     * Get cpp_header_image value
     * @return string|null
     */
    public function getCpp_header_image(): ?string
    {
        return $this->{'cpp-header-image'};
    }
    /**
     * Set cpp_header_image value
     * @param string $cpp_header_image
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setCpp_header_image(?string $cpp_header_image = null): self
    {
        // validation for constraint: string
        if (!is_null($cpp_header_image) && !is_string($cpp_header_image)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($cpp_header_image, true), gettype($cpp_header_image)), __LINE__);
        }
        $this->cpp_header_image = $this->{'cpp-header-image'} = $cpp_header_image;
        
        return $this;
    }
    /**
     * Get cpp_header_border_color value
     * @return string|null
     */
    public function getCpp_header_border_color(): ?string
    {
        return $this->{'cpp-header-border-color'};
    }
    /**
     * Set cpp_header_border_color value
     * @param string $cpp_header_border_color
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setCpp_header_border_color(?string $cpp_header_border_color = null): self
    {
        // validation for constraint: string
        if (!is_null($cpp_header_border_color) && !is_string($cpp_header_border_color)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($cpp_header_border_color, true), gettype($cpp_header_border_color)), __LINE__);
        }
        $this->cpp_header_border_color = $this->{'cpp-header-border-color'} = $cpp_header_border_color;
        
        return $this;
    }
    /**
     * Get cpp_header_back_color value
     * @return string|null
     */
    public function getCpp_header_back_color(): ?string
    {
        return $this->{'cpp-header-back-color'};
    }
    /**
     * Set cpp_header_back_color value
     * @param string $cpp_header_back_color
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setCpp_header_back_color(?string $cpp_header_back_color = null): self
    {
        // validation for constraint: string
        if (!is_null($cpp_header_back_color) && !is_string($cpp_header_back_color)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($cpp_header_back_color, true), gettype($cpp_header_back_color)), __LINE__);
        }
        $this->cpp_header_back_color = $this->{'cpp-header-back-color'} = $cpp_header_back_color;
        
        return $this;
    }
    /**
     * Get cpp_payflow_color value
     * @return string|null
     */
    public function getCpp_payflow_color(): ?string
    {
        return $this->{'cpp-payflow-color'};
    }
    /**
     * Set cpp_payflow_color value
     * @param string $cpp_payflow_color
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setCpp_payflow_color(?string $cpp_payflow_color = null): self
    {
        // validation for constraint: string
        if (!is_null($cpp_payflow_color) && !is_string($cpp_payflow_color)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($cpp_payflow_color, true), gettype($cpp_payflow_color)), __LINE__);
        }
        $this->cpp_payflow_color = $this->{'cpp-payflow-color'} = $cpp_payflow_color;
        
        return $this;
    }
    /**
     * Get cpp_cart_border_color value
     * @return string|null
     */
    public function getCpp_cart_border_color(): ?string
    {
        return $this->{'cpp-cart-border-color'};
    }
    /**
     * Set cpp_cart_border_color value
     * @param string $cpp_cart_border_color
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setCpp_cart_border_color(?string $cpp_cart_border_color = null): self
    {
        // validation for constraint: string
        if (!is_null($cpp_cart_border_color) && !is_string($cpp_cart_border_color)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($cpp_cart_border_color, true), gettype($cpp_cart_border_color)), __LINE__);
        }
        $this->cpp_cart_border_color = $this->{'cpp-cart-border-color'} = $cpp_cart_border_color;
        
        return $this;
    }
    /**
     * Get cpp_logo_image value
     * @return string|null
     */
    public function getCpp_logo_image(): ?string
    {
        return $this->{'cpp-logo-image'};
    }
    /**
     * Set cpp_logo_image value
     * @param string $cpp_logo_image
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setCpp_logo_image(?string $cpp_logo_image = null): self
    {
        // validation for constraint: string
        if (!is_null($cpp_logo_image) && !is_string($cpp_logo_image)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($cpp_logo_image, true), gettype($cpp_logo_image)), __LINE__);
        }
        $this->cpp_logo_image = $this->{'cpp-logo-image'} = $cpp_logo_image;
        
        return $this;
    }
    /**
     * Get Address value
     * @return \StructType\ApiAddressType|null
     */
    public function getAddress(): ?\StructType\ApiAddressType
    {
        return $this->Address;
    }
    /**
     * Set Address value
     * @param \StructType\ApiAddressType $address
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setAddress(?\StructType\ApiAddressType $address = null): self
    {
        $this->Address = $address;
        
        return $this;
    }
    /**
     * Get PaymentAction value
     * @return string|null
     */
    public function getPaymentAction(): ?string
    {
        return $this->PaymentAction;
    }
    /**
     * Set PaymentAction value
     * @uses \EnumType\ApiPaymentActionCodeType::valueIsValid()
     * @uses \EnumType\ApiPaymentActionCodeType::getValidValues()
     * @throws InvalidArgumentException
     * @param string $paymentAction
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setPaymentAction(?string $paymentAction = null): self
    {
        // validation for constraint: enumeration
        if (!\EnumType\ApiPaymentActionCodeType::valueIsValid($paymentAction)) {
            throw new InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \EnumType\ApiPaymentActionCodeType', is_array($paymentAction) ? implode(', ', $paymentAction) : var_export($paymentAction, true), implode(', ', \EnumType\ApiPaymentActionCodeType::getValidValues())), __LINE__);
        }
        $this->PaymentAction = $paymentAction;
        
        return $this;
    }
    /**
     * Get SolutionType value
     * @return string|null
     */
    public function getSolutionType(): ?string
    {
        return $this->SolutionType;
    }
    /**
     * Set SolutionType value
     * @uses \EnumType\ApiSolutionTypeType::valueIsValid()
     * @uses \EnumType\ApiSolutionTypeType::getValidValues()
     * @throws InvalidArgumentException
     * @param string $solutionType
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setSolutionType(?string $solutionType = null): self
    {
        // validation for constraint: enumeration
        if (!\EnumType\ApiSolutionTypeType::valueIsValid($solutionType)) {
            throw new InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \EnumType\ApiSolutionTypeType', is_array($solutionType) ? implode(', ', $solutionType) : var_export($solutionType, true), implode(', ', \EnumType\ApiSolutionTypeType::getValidValues())), __LINE__);
        }
        $this->SolutionType = $solutionType;
        
        return $this;
    }
    /**
     * Get LandingPage value
     * @return string|null
     */
    public function getLandingPage(): ?string
    {
        return $this->LandingPage;
    }
    /**
     * Set LandingPage value
     * @uses \EnumType\ApiLandingPageType::valueIsValid()
     * @uses \EnumType\ApiLandingPageType::getValidValues()
     * @throws InvalidArgumentException
     * @param string $landingPage
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setLandingPage(?string $landingPage = null): self
    {
        // validation for constraint: enumeration
        if (!\EnumType\ApiLandingPageType::valueIsValid($landingPage)) {
            throw new InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \EnumType\ApiLandingPageType', is_array($landingPage) ? implode(', ', $landingPage) : var_export($landingPage, true), implode(', ', \EnumType\ApiLandingPageType::getValidValues())), __LINE__);
        }
        $this->LandingPage = $landingPage;
        
        return $this;
    }
    /**
     * Get BuyerEmail value
     * @return string|null
     */
    public function getBuyerEmail(): ?string
    {
        return $this->BuyerEmail;
    }
    /**
     * Set BuyerEmail value
     * @param string $buyerEmail
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setBuyerEmail(?string $buyerEmail = null): self
    {
        // validation for constraint: string
        if (!is_null($buyerEmail) && !is_string($buyerEmail)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($buyerEmail, true), gettype($buyerEmail)), __LINE__);
        }
        $this->BuyerEmail = $buyerEmail;
        
        return $this;
    }
    /**
     * Get ChannelType value
     * @return string|null
     */
    public function getChannelType(): ?string
    {
        return $this->ChannelType;
    }
    /**
     * Set ChannelType value
     * @uses \EnumType\ApiChannelType::valueIsValid()
     * @uses \EnumType\ApiChannelType::getValidValues()
     * @throws InvalidArgumentException
     * @param string $channelType
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setChannelType(?string $channelType = null): self
    {
        // validation for constraint: enumeration
        if (!\EnumType\ApiChannelType::valueIsValid($channelType)) {
            throw new InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \EnumType\ApiChannelType', is_array($channelType) ? implode(', ', $channelType) : var_export($channelType, true), implode(', ', \EnumType\ApiChannelType::getValidValues())), __LINE__);
        }
        $this->ChannelType = $channelType;
        
        return $this;
    }
    /**
     * Get BillingAgreementDetails value
     * @return \StructType\ApiBillingAgreementDetailsType[]
     */
    public function getBillingAgreementDetails(): ?array
    {
        return $this->BillingAgreementDetails;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setBillingAgreementDetails method
     * This method is willingly generated in order to preserve the one-line inline validation within the setBillingAgreementDetails method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateBillingAgreementDetailsForArrayConstraintFromSetBillingAgreementDetails(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $setExpressCheckoutRequestDetailsTypeBillingAgreementDetailsItem) {
            // validation for constraint: itemType
            if (!$setExpressCheckoutRequestDetailsTypeBillingAgreementDetailsItem instanceof \StructType\ApiBillingAgreementDetailsType) {
                $invalidValues[] = is_object($setExpressCheckoutRequestDetailsTypeBillingAgreementDetailsItem) ? get_class($setExpressCheckoutRequestDetailsTypeBillingAgreementDetailsItem) : sprintf('%s(%s)', gettype($setExpressCheckoutRequestDetailsTypeBillingAgreementDetailsItem), var_export($setExpressCheckoutRequestDetailsTypeBillingAgreementDetailsItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The BillingAgreementDetails property can only contain items of type \StructType\ApiBillingAgreementDetailsType, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set BillingAgreementDetails value
     * @throws InvalidArgumentException
     * @param \StructType\ApiBillingAgreementDetailsType[] $billingAgreementDetails
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setBillingAgreementDetails(?array $billingAgreementDetails = null): self
    {
        // validation for constraint: array
        if ('' !== ($billingAgreementDetailsArrayErrorMessage = self::validateBillingAgreementDetailsForArrayConstraintFromSetBillingAgreementDetails($billingAgreementDetails))) {
            throw new InvalidArgumentException($billingAgreementDetailsArrayErrorMessage, __LINE__);
        }
        $this->BillingAgreementDetails = $billingAgreementDetails;
        
        return $this;
    }
    /**
     * Add item to BillingAgreementDetails value
     * @throws InvalidArgumentException
     * @param \StructType\ApiBillingAgreementDetailsType $item
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function addToBillingAgreementDetails(\StructType\ApiBillingAgreementDetailsType $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ApiBillingAgreementDetailsType) {
            throw new InvalidArgumentException(sprintf('The BillingAgreementDetails property can only contain items of type \StructType\ApiBillingAgreementDetailsType, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->BillingAgreementDetails[] = $item;
        
        return $this;
    }
    /**
     * Get PromoCodes value
     * @return string[]
     */
    public function getPromoCodes(): ?array
    {
        return $this->PromoCodes;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setPromoCodes method
     * This method is willingly generated in order to preserve the one-line inline validation within the setPromoCodes method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validatePromoCodesForArrayConstraintFromSetPromoCodes(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $setExpressCheckoutRequestDetailsTypePromoCodesItem) {
            // validation for constraint: itemType
            if (!is_string($setExpressCheckoutRequestDetailsTypePromoCodesItem)) {
                $invalidValues[] = is_object($setExpressCheckoutRequestDetailsTypePromoCodesItem) ? get_class($setExpressCheckoutRequestDetailsTypePromoCodesItem) : sprintf('%s(%s)', gettype($setExpressCheckoutRequestDetailsTypePromoCodesItem), var_export($setExpressCheckoutRequestDetailsTypePromoCodesItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The PromoCodes property can only contain items of type string, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set PromoCodes value
     * @throws InvalidArgumentException
     * @param string[] $promoCodes
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setPromoCodes(?array $promoCodes = null): self
    {
        // validation for constraint: array
        if ('' !== ($promoCodesArrayErrorMessage = self::validatePromoCodesForArrayConstraintFromSetPromoCodes($promoCodes))) {
            throw new InvalidArgumentException($promoCodesArrayErrorMessage, __LINE__);
        }
        $this->PromoCodes = $promoCodes;
        
        return $this;
    }
    /**
     * Add item to PromoCodes value
     * @throws InvalidArgumentException
     * @param string $item
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function addToPromoCodes(string $item): self
    {
        // validation for constraint: itemType
        if (!is_string($item)) {
            throw new InvalidArgumentException(sprintf('The PromoCodes property can only contain items of type string, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->PromoCodes[] = $item;
        
        return $this;
    }
    /**
     * Get PayPalCheckOutBtnType value
     * @return string|null
     */
    public function getPayPalCheckOutBtnType(): ?string
    {
        return $this->PayPalCheckOutBtnType;
    }
    /**
     * Set PayPalCheckOutBtnType value
     * @param string $payPalCheckOutBtnType
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setPayPalCheckOutBtnType(?string $payPalCheckOutBtnType = null): self
    {
        // validation for constraint: string
        if (!is_null($payPalCheckOutBtnType) && !is_string($payPalCheckOutBtnType)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($payPalCheckOutBtnType, true), gettype($payPalCheckOutBtnType)), __LINE__);
        }
        $this->PayPalCheckOutBtnType = $payPalCheckOutBtnType;
        
        return $this;
    }
    /**
     * Get ProductCategory value
     * @return string|null
     */
    public function getProductCategory(): ?string
    {
        return $this->ProductCategory;
    }
    /**
     * Set ProductCategory value
     * @uses \EnumType\ApiProductCategoryType::valueIsValid()
     * @uses \EnumType\ApiProductCategoryType::getValidValues()
     * @throws InvalidArgumentException
     * @param string $productCategory
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setProductCategory(?string $productCategory = null): self
    {
        // validation for constraint: enumeration
        if (!\EnumType\ApiProductCategoryType::valueIsValid($productCategory)) {
            throw new InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \EnumType\ApiProductCategoryType', is_array($productCategory) ? implode(', ', $productCategory) : var_export($productCategory, true), implode(', ', \EnumType\ApiProductCategoryType::getValidValues())), __LINE__);
        }
        $this->ProductCategory = $productCategory;
        
        return $this;
    }
    /**
     * Get ShippingMethod value
     * @return string|null
     */
    public function getShippingMethod(): ?string
    {
        return $this->ShippingMethod;
    }
    /**
     * Set ShippingMethod value
     * @uses \EnumType\ApiShippingServiceCodeType::valueIsValid()
     * @uses \EnumType\ApiShippingServiceCodeType::getValidValues()
     * @throws InvalidArgumentException
     * @param string $shippingMethod
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setShippingMethod(?string $shippingMethod = null): self
    {
        // validation for constraint: enumeration
        if (!\EnumType\ApiShippingServiceCodeType::valueIsValid($shippingMethod)) {
            throw new InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \EnumType\ApiShippingServiceCodeType', is_array($shippingMethod) ? implode(', ', $shippingMethod) : var_export($shippingMethod, true), implode(', ', \EnumType\ApiShippingServiceCodeType::getValidValues())), __LINE__);
        }
        $this->ShippingMethod = $shippingMethod;
        
        return $this;
    }
    /**
     * Get ProfileAddressChangeDate value
     * @return string|null
     */
    public function getProfileAddressChangeDate(): ?string
    {
        return $this->ProfileAddressChangeDate;
    }
    /**
     * Set ProfileAddressChangeDate value
     * @param string $profileAddressChangeDate
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setProfileAddressChangeDate(?string $profileAddressChangeDate = null): self
    {
        // validation for constraint: string
        if (!is_null($profileAddressChangeDate) && !is_string($profileAddressChangeDate)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($profileAddressChangeDate, true), gettype($profileAddressChangeDate)), __LINE__);
        }
        $this->ProfileAddressChangeDate = $profileAddressChangeDate;
        
        return $this;
    }
    /**
     * Get AllowNote value
     * @return string|null
     */
    public function getAllowNote(): ?string
    {
        return $this->AllowNote;
    }
    /**
     * Set AllowNote value
     * @param string $allowNote
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setAllowNote(?string $allowNote = null): self
    {
        // validation for constraint: string
        if (!is_null($allowNote) && !is_string($allowNote)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($allowNote, true), gettype($allowNote)), __LINE__);
        }
        $this->AllowNote = $allowNote;
        
        return $this;
    }
    /**
     * Get FundingSourceDetails value
     * @return \StructType\ApiFundingSourceDetailsType|null
     */
    public function getFundingSourceDetails(): ?\StructType\ApiFundingSourceDetailsType
    {
        return $this->FundingSourceDetails;
    }
    /**
     * Set FundingSourceDetails value
     * @param \StructType\ApiFundingSourceDetailsType $fundingSourceDetails
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setFundingSourceDetails(?\StructType\ApiFundingSourceDetailsType $fundingSourceDetails = null): self
    {
        $this->FundingSourceDetails = $fundingSourceDetails;
        
        return $this;
    }
    /**
     * Get BrandName value
     * @return string|null
     */
    public function getBrandName(): ?string
    {
        return $this->BrandName;
    }
    /**
     * Set BrandName value
     * @param string $brandName
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setBrandName(?string $brandName = null): self
    {
        // validation for constraint: string
        if (!is_null($brandName) && !is_string($brandName)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($brandName, true), gettype($brandName)), __LINE__);
        }
        $this->BrandName = $brandName;
        
        return $this;
    }
    /**
     * Get CallbackURL value
     * @return string|null
     */
    public function getCallbackURL(): ?string
    {
        return $this->CallbackURL;
    }
    /**
     * Set CallbackURL value
     * @param string $callbackURL
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setCallbackURL(?string $callbackURL = null): self
    {
        // validation for constraint: string
        if (!is_null($callbackURL) && !is_string($callbackURL)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($callbackURL, true), gettype($callbackURL)), __LINE__);
        }
        $this->CallbackURL = $callbackURL;
        
        return $this;
    }
    /**
     * Get EnhancedCheckoutData value
     * @return \StructType\ApiEnhancedCheckoutDataType|null
     */
    public function getEnhancedCheckoutData(): ?\StructType\ApiEnhancedCheckoutDataType
    {
        return $this->EnhancedCheckoutData;
    }
    /**
     * Set EnhancedCheckoutData value
     * @param \StructType\ApiEnhancedCheckoutDataType $enhancedCheckoutData
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setEnhancedCheckoutData(?\StructType\ApiEnhancedCheckoutDataType $enhancedCheckoutData = null): self
    {
        $this->EnhancedCheckoutData = $enhancedCheckoutData;
        
        return $this;
    }
    /**
     * Get OtherPaymentMethods value
     * @return \StructType\ApiOtherPaymentMethodDetailsType[]
     */
    public function getOtherPaymentMethods(): ?array
    {
        return $this->OtherPaymentMethods;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setOtherPaymentMethods method
     * This method is willingly generated in order to preserve the one-line inline validation within the setOtherPaymentMethods method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateOtherPaymentMethodsForArrayConstraintFromSetOtherPaymentMethods(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $setExpressCheckoutRequestDetailsTypeOtherPaymentMethodsItem) {
            // validation for constraint: itemType
            if (!$setExpressCheckoutRequestDetailsTypeOtherPaymentMethodsItem instanceof \StructType\ApiOtherPaymentMethodDetailsType) {
                $invalidValues[] = is_object($setExpressCheckoutRequestDetailsTypeOtherPaymentMethodsItem) ? get_class($setExpressCheckoutRequestDetailsTypeOtherPaymentMethodsItem) : sprintf('%s(%s)', gettype($setExpressCheckoutRequestDetailsTypeOtherPaymentMethodsItem), var_export($setExpressCheckoutRequestDetailsTypeOtherPaymentMethodsItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The OtherPaymentMethods property can only contain items of type \StructType\ApiOtherPaymentMethodDetailsType, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set OtherPaymentMethods value
     * @throws InvalidArgumentException
     * @param \StructType\ApiOtherPaymentMethodDetailsType[] $otherPaymentMethods
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setOtherPaymentMethods(?array $otherPaymentMethods = null): self
    {
        // validation for constraint: array
        if ('' !== ($otherPaymentMethodsArrayErrorMessage = self::validateOtherPaymentMethodsForArrayConstraintFromSetOtherPaymentMethods($otherPaymentMethods))) {
            throw new InvalidArgumentException($otherPaymentMethodsArrayErrorMessage, __LINE__);
        }
        $this->OtherPaymentMethods = $otherPaymentMethods;
        
        return $this;
    }
    /**
     * Add item to OtherPaymentMethods value
     * @throws InvalidArgumentException
     * @param \StructType\ApiOtherPaymentMethodDetailsType $item
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function addToOtherPaymentMethods(\StructType\ApiOtherPaymentMethodDetailsType $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ApiOtherPaymentMethodDetailsType) {
            throw new InvalidArgumentException(sprintf('The OtherPaymentMethods property can only contain items of type \StructType\ApiOtherPaymentMethodDetailsType, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->OtherPaymentMethods[] = $item;
        
        return $this;
    }
    /**
     * Get BuyerDetails value
     * @return \StructType\ApiBuyerDetailsType|null
     */
    public function getBuyerDetails(): ?\StructType\ApiBuyerDetailsType
    {
        return $this->BuyerDetails;
    }
    /**
     * Set BuyerDetails value
     * @param \StructType\ApiBuyerDetailsType $buyerDetails
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setBuyerDetails(?\StructType\ApiBuyerDetailsType $buyerDetails = null): self
    {
        $this->BuyerDetails = $buyerDetails;
        
        return $this;
    }
    /**
     * Get PaymentDetails value
     * @return \StructType\ApiPaymentDetailsType[]
     */
    public function getPaymentDetails(): ?array
    {
        return $this->PaymentDetails;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setPaymentDetails method
     * This method is willingly generated in order to preserve the one-line inline validation within the setPaymentDetails method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validatePaymentDetailsForArrayConstraintFromSetPaymentDetails(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $setExpressCheckoutRequestDetailsTypePaymentDetailsItem) {
            // validation for constraint: itemType
            if (!$setExpressCheckoutRequestDetailsTypePaymentDetailsItem instanceof \StructType\ApiPaymentDetailsType) {
                $invalidValues[] = is_object($setExpressCheckoutRequestDetailsTypePaymentDetailsItem) ? get_class($setExpressCheckoutRequestDetailsTypePaymentDetailsItem) : sprintf('%s(%s)', gettype($setExpressCheckoutRequestDetailsTypePaymentDetailsItem), var_export($setExpressCheckoutRequestDetailsTypePaymentDetailsItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The PaymentDetails property can only contain items of type \StructType\ApiPaymentDetailsType, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set PaymentDetails value
     * @throws InvalidArgumentException
     * @param \StructType\ApiPaymentDetailsType[] $paymentDetails
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setPaymentDetails(?array $paymentDetails = null): self
    {
        // validation for constraint: array
        if ('' !== ($paymentDetailsArrayErrorMessage = self::validatePaymentDetailsForArrayConstraintFromSetPaymentDetails($paymentDetails))) {
            throw new InvalidArgumentException($paymentDetailsArrayErrorMessage, __LINE__);
        }
        // validation for constraint: maxOccurs(10)
        if (is_array($paymentDetails) && count($paymentDetails) > 10) {
            throw new InvalidArgumentException(sprintf('Invalid count of %s, the number of elements contained by the property must be less than or equal to 10', count($paymentDetails)), __LINE__);
        }
        $this->PaymentDetails = $paymentDetails;
        
        return $this;
    }
    /**
     * Add item to PaymentDetails value
     * @throws InvalidArgumentException
     * @param \StructType\ApiPaymentDetailsType $item
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function addToPaymentDetails(\StructType\ApiPaymentDetailsType $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ApiPaymentDetailsType) {
            throw new InvalidArgumentException(sprintf('The PaymentDetails property can only contain items of type \StructType\ApiPaymentDetailsType, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        // validation for constraint: maxOccurs(10)
        if (is_array($this->PaymentDetails) && count($this->PaymentDetails) >= 10) {
            throw new InvalidArgumentException(sprintf('You can\'t add anymore element to this property that already contains %s elements, the number of elements contained by the property must be less than or equal to 10', count($this->PaymentDetails)), __LINE__);
        }
        $this->PaymentDetails[] = $item;
        
        return $this;
    }
    /**
     * Get FlatRateShippingOptions value
     * @return \StructType\ApiShippingOptionType[]
     */
    public function getFlatRateShippingOptions(): ?array
    {
        return $this->FlatRateShippingOptions;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setFlatRateShippingOptions method
     * This method is willingly generated in order to preserve the one-line inline validation within the setFlatRateShippingOptions method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateFlatRateShippingOptionsForArrayConstraintFromSetFlatRateShippingOptions(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $setExpressCheckoutRequestDetailsTypeFlatRateShippingOptionsItem) {
            // validation for constraint: itemType
            if (!$setExpressCheckoutRequestDetailsTypeFlatRateShippingOptionsItem instanceof \StructType\ApiShippingOptionType) {
                $invalidValues[] = is_object($setExpressCheckoutRequestDetailsTypeFlatRateShippingOptionsItem) ? get_class($setExpressCheckoutRequestDetailsTypeFlatRateShippingOptionsItem) : sprintf('%s(%s)', gettype($setExpressCheckoutRequestDetailsTypeFlatRateShippingOptionsItem), var_export($setExpressCheckoutRequestDetailsTypeFlatRateShippingOptionsItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The FlatRateShippingOptions property can only contain items of type \StructType\ApiShippingOptionType, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set FlatRateShippingOptions value
     * @throws InvalidArgumentException
     * @param \StructType\ApiShippingOptionType[] $flatRateShippingOptions
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setFlatRateShippingOptions(?array $flatRateShippingOptions = null): self
    {
        // validation for constraint: array
        if ('' !== ($flatRateShippingOptionsArrayErrorMessage = self::validateFlatRateShippingOptionsForArrayConstraintFromSetFlatRateShippingOptions($flatRateShippingOptions))) {
            throw new InvalidArgumentException($flatRateShippingOptionsArrayErrorMessage, __LINE__);
        }
        $this->FlatRateShippingOptions = $flatRateShippingOptions;
        
        return $this;
    }
    /**
     * Add item to FlatRateShippingOptions value
     * @throws InvalidArgumentException
     * @param \StructType\ApiShippingOptionType $item
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function addToFlatRateShippingOptions(\StructType\ApiShippingOptionType $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ApiShippingOptionType) {
            throw new InvalidArgumentException(sprintf('The FlatRateShippingOptions property can only contain items of type \StructType\ApiShippingOptionType, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->FlatRateShippingOptions[] = $item;
        
        return $this;
    }
    /**
     * Get CallbackTimeout value
     * @return string|null
     */
    public function getCallbackTimeout(): ?string
    {
        return $this->CallbackTimeout;
    }
    /**
     * Set CallbackTimeout value
     * @param string $callbackTimeout
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setCallbackTimeout(?string $callbackTimeout = null): self
    {
        // validation for constraint: string
        if (!is_null($callbackTimeout) && !is_string($callbackTimeout)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($callbackTimeout, true), gettype($callbackTimeout)), __LINE__);
        }
        $this->CallbackTimeout = $callbackTimeout;
        
        return $this;
    }
    /**
     * Get CallbackVersion value
     * @return string|null
     */
    public function getCallbackVersion(): ?string
    {
        return $this->CallbackVersion;
    }
    /**
     * Set CallbackVersion value
     * @param string $callbackVersion
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setCallbackVersion(?string $callbackVersion = null): self
    {
        // validation for constraint: string
        if (!is_null($callbackVersion) && !is_string($callbackVersion)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($callbackVersion, true), gettype($callbackVersion)), __LINE__);
        }
        $this->CallbackVersion = $callbackVersion;
        
        return $this;
    }
    /**
     * Get CustomerServiceNumber value
     * @return string|null
     */
    public function getCustomerServiceNumber(): ?string
    {
        return $this->CustomerServiceNumber;
    }
    /**
     * Set CustomerServiceNumber value
     * @param string $customerServiceNumber
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setCustomerServiceNumber(?string $customerServiceNumber = null): self
    {
        // validation for constraint: string
        if (!is_null($customerServiceNumber) && !is_string($customerServiceNumber)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($customerServiceNumber, true), gettype($customerServiceNumber)), __LINE__);
        }
        $this->CustomerServiceNumber = $customerServiceNumber;
        
        return $this;
    }
    /**
     * Get GiftMessageEnable value
     * @return string|null
     */
    public function getGiftMessageEnable(): ?string
    {
        return $this->GiftMessageEnable;
    }
    /**
     * Set GiftMessageEnable value
     * @param string $giftMessageEnable
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setGiftMessageEnable(?string $giftMessageEnable = null): self
    {
        // validation for constraint: string
        if (!is_null($giftMessageEnable) && !is_string($giftMessageEnable)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($giftMessageEnable, true), gettype($giftMessageEnable)), __LINE__);
        }
        $this->GiftMessageEnable = $giftMessageEnable;
        
        return $this;
    }
    /**
     * Get GiftReceiptEnable value
     * @return string|null
     */
    public function getGiftReceiptEnable(): ?string
    {
        return $this->GiftReceiptEnable;
    }
    /**
     * Set GiftReceiptEnable value
     * @param string $giftReceiptEnable
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setGiftReceiptEnable(?string $giftReceiptEnable = null): self
    {
        // validation for constraint: string
        if (!is_null($giftReceiptEnable) && !is_string($giftReceiptEnable)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($giftReceiptEnable, true), gettype($giftReceiptEnable)), __LINE__);
        }
        $this->GiftReceiptEnable = $giftReceiptEnable;
        
        return $this;
    }
    /**
     * Get GiftWrapEnable value
     * @return string|null
     */
    public function getGiftWrapEnable(): ?string
    {
        return $this->GiftWrapEnable;
    }
    /**
     * Set GiftWrapEnable value
     * @param string $giftWrapEnable
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setGiftWrapEnable(?string $giftWrapEnable = null): self
    {
        // validation for constraint: string
        if (!is_null($giftWrapEnable) && !is_string($giftWrapEnable)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($giftWrapEnable, true), gettype($giftWrapEnable)), __LINE__);
        }
        $this->GiftWrapEnable = $giftWrapEnable;
        
        return $this;
    }
    /**
     * Get GiftWrapName value
     * @return string|null
     */
    public function getGiftWrapName(): ?string
    {
        return $this->GiftWrapName;
    }
    /**
     * Set GiftWrapName value
     * @param string $giftWrapName
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setGiftWrapName(?string $giftWrapName = null): self
    {
        // validation for constraint: string
        if (!is_null($giftWrapName) && !is_string($giftWrapName)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($giftWrapName, true), gettype($giftWrapName)), __LINE__);
        }
        $this->GiftWrapName = $giftWrapName;
        
        return $this;
    }
    /**
     * Get GiftWrapAmount value
     * @return \StructType\ApiBasicAmountType|null
     */
    public function getGiftWrapAmount(): ?\StructType\ApiBasicAmountType
    {
        return $this->GiftWrapAmount;
    }
    /**
     * Set GiftWrapAmount value
     * @param \StructType\ApiBasicAmountType $giftWrapAmount
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setGiftWrapAmount(?\StructType\ApiBasicAmountType $giftWrapAmount = null): self
    {
        $this->GiftWrapAmount = $giftWrapAmount;
        
        return $this;
    }
    /**
     * Get BuyerEmailOptInEnable value
     * @return string|null
     */
    public function getBuyerEmailOptInEnable(): ?string
    {
        return $this->BuyerEmailOptInEnable;
    }
    /**
     * Set BuyerEmailOptInEnable value
     * @param string $buyerEmailOptInEnable
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setBuyerEmailOptInEnable(?string $buyerEmailOptInEnable = null): self
    {
        // validation for constraint: string
        if (!is_null($buyerEmailOptInEnable) && !is_string($buyerEmailOptInEnable)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($buyerEmailOptInEnable, true), gettype($buyerEmailOptInEnable)), __LINE__);
        }
        $this->BuyerEmailOptInEnable = $buyerEmailOptInEnable;
        
        return $this;
    }
    /**
     * Get SurveyEnable value
     * @return string|null
     */
    public function getSurveyEnable(): ?string
    {
        return $this->SurveyEnable;
    }
    /**
     * Set SurveyEnable value
     * @param string $surveyEnable
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setSurveyEnable(?string $surveyEnable = null): self
    {
        // validation for constraint: string
        if (!is_null($surveyEnable) && !is_string($surveyEnable)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($surveyEnable, true), gettype($surveyEnable)), __LINE__);
        }
        $this->SurveyEnable = $surveyEnable;
        
        return $this;
    }
    /**
     * Get SurveyQuestion value
     * @return string|null
     */
    public function getSurveyQuestion(): ?string
    {
        return $this->SurveyQuestion;
    }
    /**
     * Set SurveyQuestion value
     * @param string $surveyQuestion
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setSurveyQuestion(?string $surveyQuestion = null): self
    {
        // validation for constraint: string
        if (!is_null($surveyQuestion) && !is_string($surveyQuestion)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($surveyQuestion, true), gettype($surveyQuestion)), __LINE__);
        }
        $this->SurveyQuestion = $surveyQuestion;
        
        return $this;
    }
    /**
     * Get SurveyChoice value
     * @return string[]
     */
    public function getSurveyChoice(): ?array
    {
        return $this->SurveyChoice;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setSurveyChoice method
     * This method is willingly generated in order to preserve the one-line inline validation within the setSurveyChoice method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateSurveyChoiceForArrayConstraintFromSetSurveyChoice(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $setExpressCheckoutRequestDetailsTypeSurveyChoiceItem) {
            // validation for constraint: itemType
            if (!is_string($setExpressCheckoutRequestDetailsTypeSurveyChoiceItem)) {
                $invalidValues[] = is_object($setExpressCheckoutRequestDetailsTypeSurveyChoiceItem) ? get_class($setExpressCheckoutRequestDetailsTypeSurveyChoiceItem) : sprintf('%s(%s)', gettype($setExpressCheckoutRequestDetailsTypeSurveyChoiceItem), var_export($setExpressCheckoutRequestDetailsTypeSurveyChoiceItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The SurveyChoice property can only contain items of type string, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set SurveyChoice value
     * @throws InvalidArgumentException
     * @param string[] $surveyChoice
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setSurveyChoice(?array $surveyChoice = null): self
    {
        // validation for constraint: array
        if ('' !== ($surveyChoiceArrayErrorMessage = self::validateSurveyChoiceForArrayConstraintFromSetSurveyChoice($surveyChoice))) {
            throw new InvalidArgumentException($surveyChoiceArrayErrorMessage, __LINE__);
        }
        $this->SurveyChoice = $surveyChoice;
        
        return $this;
    }
    /**
     * Add item to SurveyChoice value
     * @throws InvalidArgumentException
     * @param string $item
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function addToSurveyChoice(string $item): self
    {
        // validation for constraint: itemType
        if (!is_string($item)) {
            throw new InvalidArgumentException(sprintf('The SurveyChoice property can only contain items of type string, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->SurveyChoice[] = $item;
        
        return $this;
    }
    /**
     * Get TotalType value
     * @return string|null
     */
    public function getTotalType(): ?string
    {
        return $this->TotalType;
    }
    /**
     * Set TotalType value
     * @uses \EnumType\ApiTotalType::valueIsValid()
     * @uses \EnumType\ApiTotalType::getValidValues()
     * @throws InvalidArgumentException
     * @param string $totalType
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setTotalType(?string $totalType = null): self
    {
        // validation for constraint: enumeration
        if (!\EnumType\ApiTotalType::valueIsValid($totalType)) {
            throw new InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \EnumType\ApiTotalType', is_array($totalType) ? implode(', ', $totalType) : var_export($totalType, true), implode(', ', \EnumType\ApiTotalType::getValidValues())), __LINE__);
        }
        $this->TotalType = $totalType;
        
        return $this;
    }
    /**
     * Get NoteToBuyer value
     * @return string|null
     */
    public function getNoteToBuyer(): ?string
    {
        return $this->NoteToBuyer;
    }
    /**
     * Set NoteToBuyer value
     * @param string $noteToBuyer
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setNoteToBuyer(?string $noteToBuyer = null): self
    {
        // validation for constraint: string
        if (!is_null($noteToBuyer) && !is_string($noteToBuyer)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($noteToBuyer, true), gettype($noteToBuyer)), __LINE__);
        }
        $this->NoteToBuyer = $noteToBuyer;
        
        return $this;
    }
    /**
     * Get Incentives value
     * @return \StructType\ApiIncentiveInfoType[]
     */
    public function getIncentives(): ?array
    {
        return $this->Incentives;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setIncentives method
     * This method is willingly generated in order to preserve the one-line inline validation within the setIncentives method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateIncentivesForArrayConstraintFromSetIncentives(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $setExpressCheckoutRequestDetailsTypeIncentivesItem) {
            // validation for constraint: itemType
            if (!$setExpressCheckoutRequestDetailsTypeIncentivesItem instanceof \StructType\ApiIncentiveInfoType) {
                $invalidValues[] = is_object($setExpressCheckoutRequestDetailsTypeIncentivesItem) ? get_class($setExpressCheckoutRequestDetailsTypeIncentivesItem) : sprintf('%s(%s)', gettype($setExpressCheckoutRequestDetailsTypeIncentivesItem), var_export($setExpressCheckoutRequestDetailsTypeIncentivesItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The Incentives property can only contain items of type \StructType\ApiIncentiveInfoType, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set Incentives value
     * @throws InvalidArgumentException
     * @param \StructType\ApiIncentiveInfoType[] $incentives
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setIncentives(?array $incentives = null): self
    {
        // validation for constraint: array
        if ('' !== ($incentivesArrayErrorMessage = self::validateIncentivesForArrayConstraintFromSetIncentives($incentives))) {
            throw new InvalidArgumentException($incentivesArrayErrorMessage, __LINE__);
        }
        $this->Incentives = $incentives;
        
        return $this;
    }
    /**
     * Add item to Incentives value
     * @throws InvalidArgumentException
     * @param \StructType\ApiIncentiveInfoType $item
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function addToIncentives(\StructType\ApiIncentiveInfoType $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ApiIncentiveInfoType) {
            throw new InvalidArgumentException(sprintf('The Incentives property can only contain items of type \StructType\ApiIncentiveInfoType, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->Incentives[] = $item;
        
        return $this;
    }
    /**
     * Get ReqInstrumentDetails value
     * @return string|null
     */
    public function getReqInstrumentDetails(): ?string
    {
        return $this->ReqInstrumentDetails;
    }
    /**
     * Set ReqInstrumentDetails value
     * @param string $reqInstrumentDetails
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setReqInstrumentDetails(?string $reqInstrumentDetails = null): self
    {
        // validation for constraint: string
        if (!is_null($reqInstrumentDetails) && !is_string($reqInstrumentDetails)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($reqInstrumentDetails, true), gettype($reqInstrumentDetails)), __LINE__);
        }
        $this->ReqInstrumentDetails = $reqInstrumentDetails;
        
        return $this;
    }
    /**
     * Get ExternalRememberMeOptInDetails value
     * @return \StructType\ApiExternalRememberMeOptInDetailsType|null
     */
    public function getExternalRememberMeOptInDetails(): ?\StructType\ApiExternalRememberMeOptInDetailsType
    {
        return $this->ExternalRememberMeOptInDetails;
    }
    /**
     * Set ExternalRememberMeOptInDetails value
     * @param \StructType\ApiExternalRememberMeOptInDetailsType $externalRememberMeOptInDetails
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setExternalRememberMeOptInDetails(?\StructType\ApiExternalRememberMeOptInDetailsType $externalRememberMeOptInDetails = null): self
    {
        $this->ExternalRememberMeOptInDetails = $externalRememberMeOptInDetails;
        
        return $this;
    }
    /**
     * Get FlowControlDetails value
     * @return \StructType\ApiFlowControlDetailsType|null
     */
    public function getFlowControlDetails(): ?\StructType\ApiFlowControlDetailsType
    {
        return $this->FlowControlDetails;
    }
    /**
     * Set FlowControlDetails value
     * @param \StructType\ApiFlowControlDetailsType $flowControlDetails
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setFlowControlDetails(?\StructType\ApiFlowControlDetailsType $flowControlDetails = null): self
    {
        $this->FlowControlDetails = $flowControlDetails;
        
        return $this;
    }
    /**
     * Get DisplayControlDetails value
     * @return \StructType\ApiDisplayControlDetailsType|null
     */
    public function getDisplayControlDetails(): ?\StructType\ApiDisplayControlDetailsType
    {
        return $this->DisplayControlDetails;
    }
    /**
     * Set DisplayControlDetails value
     * @param \StructType\ApiDisplayControlDetailsType $displayControlDetails
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setDisplayControlDetails(?\StructType\ApiDisplayControlDetailsType $displayControlDetails = null): self
    {
        $this->DisplayControlDetails = $displayControlDetails;
        
        return $this;
    }
    /**
     * Get ExternalPartnerTrackingDetails value
     * @return \StructType\ApiExternalPartnerTrackingDetailsType|null
     */
    public function getExternalPartnerTrackingDetails(): ?\StructType\ApiExternalPartnerTrackingDetailsType
    {
        return $this->ExternalPartnerTrackingDetails;
    }
    /**
     * Set ExternalPartnerTrackingDetails value
     * @param \StructType\ApiExternalPartnerTrackingDetailsType $externalPartnerTrackingDetails
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setExternalPartnerTrackingDetails(?\StructType\ApiExternalPartnerTrackingDetailsType $externalPartnerTrackingDetails = null): self
    {
        $this->ExternalPartnerTrackingDetails = $externalPartnerTrackingDetails;
        
        return $this;
    }
    /**
     * Get CoupledBuckets value
     * @return \StructType\ApiCoupledBucketsType[]
     */
    public function getCoupledBuckets(): ?array
    {
        return $this->CoupledBuckets;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setCoupledBuckets method
     * This method is willingly generated in order to preserve the one-line inline validation within the setCoupledBuckets method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateCoupledBucketsForArrayConstraintFromSetCoupledBuckets(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $setExpressCheckoutRequestDetailsTypeCoupledBucketsItem) {
            // validation for constraint: itemType
            if (!$setExpressCheckoutRequestDetailsTypeCoupledBucketsItem instanceof \StructType\ApiCoupledBucketsType) {
                $invalidValues[] = is_object($setExpressCheckoutRequestDetailsTypeCoupledBucketsItem) ? get_class($setExpressCheckoutRequestDetailsTypeCoupledBucketsItem) : sprintf('%s(%s)', gettype($setExpressCheckoutRequestDetailsTypeCoupledBucketsItem), var_export($setExpressCheckoutRequestDetailsTypeCoupledBucketsItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The CoupledBuckets property can only contain items of type \StructType\ApiCoupledBucketsType, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set CoupledBuckets value
     * @throws InvalidArgumentException
     * @param \StructType\ApiCoupledBucketsType[] $coupledBuckets
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setCoupledBuckets(?array $coupledBuckets = null): self
    {
        // validation for constraint: array
        if ('' !== ($coupledBucketsArrayErrorMessage = self::validateCoupledBucketsForArrayConstraintFromSetCoupledBuckets($coupledBuckets))) {
            throw new InvalidArgumentException($coupledBucketsArrayErrorMessage, __LINE__);
        }
        // validation for constraint: maxOccurs(5)
        if (is_array($coupledBuckets) && count($coupledBuckets) > 5) {
            throw new InvalidArgumentException(sprintf('Invalid count of %s, the number of elements contained by the property must be less than or equal to 5', count($coupledBuckets)), __LINE__);
        }
        $this->CoupledBuckets = $coupledBuckets;
        
        return $this;
    }
    /**
     * Add item to CoupledBuckets value
     * @throws InvalidArgumentException
     * @param \StructType\ApiCoupledBucketsType $item
     * @return \StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function addToCoupledBuckets(\StructType\ApiCoupledBucketsType $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ApiCoupledBucketsType) {
            throw new InvalidArgumentException(sprintf('The CoupledBuckets property can only contain items of type \StructType\ApiCoupledBucketsType, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        // validation for constraint: maxOccurs(5)
        if (is_array($this->CoupledBuckets) && count($this->CoupledBuckets) >= 5) {
            throw new InvalidArgumentException(sprintf('You can\'t add anymore element to this property that already contains %s elements, the number of elements contained by the property must be less than or equal to 5', count($this->CoupledBuckets)), __LINE__);
        }
        $this->CoupledBuckets[] = $item;
        
        return $this;
    }
}
