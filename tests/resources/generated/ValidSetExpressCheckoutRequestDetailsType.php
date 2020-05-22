<?php

namespace Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

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
     * @var \Api\StructType\ApiBasicAmountType
     */
    public $OrderTotal;
    /**
     * The ReturnURL
     * Meta information extracted from the WSDL
     * - documentation: URL to which the customer's browser is returned after choosing to pay with PayPal. PayPal recommends that the value of ReturnURL be the final review page on which the customer confirms the order and payment. Required Character length
     * and limitations: no limit.
     * @var string
     */
    public $ReturnURL;
    /**
     * The CancelURL
     * Meta information extracted from the WSDL
     * - documentation: URL to which the customer is returned if he does not approve the use of PayPal to pay you. PayPal recommends that the value of CancelURL be the original page on which the customer chose to pay with PayPal. Required Character length
     * and limitations: no limit
     * @var string
     */
    public $CancelURL;
    /**
     * The TrackingImageURL
     * Meta information extracted from the WSDL
     * - documentation: Tracking URL for ebay. Required Character length and limitations: no limit
     * - minOccurs: 0
     * @var string
     */
    public $TrackingImageURL;
    /**
     * The giropaySuccessURL
     * Meta information extracted from the WSDL
     * - documentation: URL to which the customer's browser is returned after paying with giropay online. Optional Character length and limitations: no limit.
     * - minOccurs: 0
     * @var string
     */
    public $giropaySuccessURL;
    /**
     * The giropayCancelURL
     * Meta information extracted from the WSDL
     * - documentation: URL to which the customer's browser is returned after fail to pay with giropay online. Optional Character length and limitations: no limit.
     * - minOccurs: 0
     * @var string
     */
    public $giropayCancelURL;
    /**
     * The BanktxnPendingURL
     * Meta information extracted from the WSDL
     * - documentation: URL to which the customer's browser can be returned in the mEFT done page. Optional Character length and limitations: no limit.
     * - minOccurs: 0
     * @var string
     */
    public $BanktxnPendingURL;
    /**
     * The Token
     * Meta information extracted from the WSDL
     * - documentation: On your first invocation of SetExpressCheckoutRequest, the value of this token is returned by SetExpressCheckoutResponse. Optional Include this element and its value only if you want to modify an existing checkout session with
     * another invocation of SetExpressCheckoutRequest; for example, if you want the customer to edit his shipping address on PayPal. Character length and limitations: 20 single-byte characters
     * - base: xs:string
     * - minOccurs: 0
     * @var string
     */
    public $Token;
    /**
     * The MaxAmount
     * Meta information extracted from the WSDL
     * - documentation: The expected maximum total amount of the complete order, including shipping cost and tax charges. Optional You must set the currencyID attribute to one of the three-character currency codes for any of the supported PayPal currencies.
     * Limitations: Must not exceed $10,000 USD in any currency. No currency symbol. Decimal separator must be a period (.), and the thousands separator must be a comma (,).
     * - minOccurs: 0
     * @var \Api\StructType\ApiBasicAmountType
     */
    public $MaxAmount;
    /**
     * The OrderDescription
     * Meta information extracted from the WSDL
     * - documentation: Description of items the customer is purchasing. Optional Character length and limitations: 127 single-byte alphanumeric characters
     * - minOccurs: 0
     * @var string
     */
    public $OrderDescription;
    /**
     * The Custom
     * Meta information extracted from the WSDL
     * - documentation: A free-form field for your own use, such as a tracking number or other value you want PayPal to return on GetExpressCheckoutDetailsResponse and DoExpressCheckoutPaymentResponse. Optional Character length and limitations: 256
     * single-byte alphanumeric characters
     * - minOccurs: 0
     * @var string
     */
    public $Custom;
    /**
     * The InvoiceID
     * Meta information extracted from the WSDL
     * - documentation: Your own unique invoice or tracking number. PayPal returns this value to you on DoExpressCheckoutPaymentResponse. Optional Character length and limitations: 127 single-byte alphanumeric characters
     * - minOccurs: 0
     * @var string
     */
    public $InvoiceID;
    /**
     * The ReqConfirmShipping
     * Meta information extracted from the WSDL
     * - documentation: The value 1 indicates that you require that the customer's shipping address on file with PayPal be a confirmed address. Any value other than 1 indicates that the customer's shipping address on file with PayPal need NOT be a confirmed
     * address. Setting this element overrides the setting you have specified in the recipient's Merchant Account Profile. Optional Character length and limitations: One single-byte numeric character.
     * - minOccurs: 0
     * @var string
     */
    public $ReqConfirmShipping;
    /**
     * The ReqBillingAddress
     * Meta information extracted from the WSDL
     * - documentation: The value 1 indicates that you require that the customer's billing address on file. Setting this element overrides the setting you have specified in Admin. Optional Character length and limitations: One single-byte numeric character.
     * - minOccurs: 0
     * @var string
     */
    public $ReqBillingAddress;
    /**
     * The BillingAddress
     * Meta information extracted from the WSDL
     * - documentation: The billing address for the buyer. Optional If you include the BillingAddress element, the AddressType elements are required: Name Street1 CityName CountryCode Do not set set the CountryName element.
     * - minOccurs: 0
     * @var \Api\StructType\ApiAddressType
     */
    public $BillingAddress;
    /**
     * The NoShipping
     * Meta information extracted from the WSDL
     * - documentation: The value 1 indicates that on the PayPal pages, no shipping address fields should be displayed whatsoever. Optional Character length and limitations: Four single-byte numeric characters.
     * - minOccurs: 0
     * @var string
     */
    public $NoShipping;
    /**
     * The AddressOverride
     * Meta information extracted from the WSDL
     * - documentation: The value 1 indicates that the PayPal pages should display the shipping address set by you in the Address element on this SetExpressCheckoutRequest, not the shipping address on file with PayPal for this customer. Displaying the
     * PayPal street address on file does not allow the customer to edit that address. Optional Character length and limitations: Four single-byte numeric characters.
     * - minOccurs: 0
     * @var string
     */
    public $AddressOverride;
    /**
     * The LocaleCode
     * Meta information extracted from the WSDL
     * - documentation: Locale of pages displayed by PayPal during Express Checkout. Optional Character length and limitations: Five single-byte alphabetic characters, upper- or lowercase. Allowable values: AU or en_AU DE or de_DE FR or fr_FR GB or en_GB IT
     * or it_IT JP or ja_JP US or en_US
     * - minOccurs: 0
     * @var string
     */
    public $LocaleCode;
    /**
     * The PageStyle
     * Meta information extracted from the WSDL
     * - documentation: Sets the Custom Payment Page Style for payment pages associated with this button/link. PageStyle corresponds to the HTML variable page_style for customizing payment pages. The value is the same as the Page Style Name you chose when
     * adding or editing the page style from the Profile subtab of the My Account tab of your PayPal account. Optional Character length and limitations: 30 single-byte alphabetic characters.
     * - minOccurs: 0
     * @var string
     */
    public $PageStyle;
    /**
     * The cpp_header_image
     * Meta information extracted from the WSDL
     * - documentation: A URL for the image you want to appear at the top left of the payment page. The image has a maximum size of 750 pixels wide by 90 pixels high. PayPal recommends that you provide an image that is stored on a secure (https) server.
     * Optional Character length and limitations: 127
     * - minOccurs: 0
     * @var string
     */
    public $cpp_header_image;
    /**
     * The cpp_header_border_color
     * Meta information extracted from the WSDL
     * - documentation: Sets the border color around the header of the payment page. The border is a 2-pixel perimeter around the header space, which is 750 pixels wide by 90 pixels high. Optional Character length and limitations: Six character HTML
     * hexadecimal color code in ASCII
     * - minOccurs: 0
     * @var string
     */
    public $cpp_header_border_color;
    /**
     * The cpp_header_back_color
     * Meta information extracted from the WSDL
     * - documentation: Sets the background color for the header of the payment page. Optional Character length and limitation: Six character HTML hexadecimal color code in ASCII
     * - minOccurs: 0
     * @var string
     */
    public $cpp_header_back_color;
    /**
     * The cpp_payflow_color
     * Meta information extracted from the WSDL
     * - documentation: Sets the background color for the payment page. Optional Character length and limitation: Six character HTML hexadecimal color code in ASCII
     * - minOccurs: 0
     * @var string
     */
    public $cpp_payflow_color;
    /**
     * The cpp_cart_border_color
     * Meta information extracted from the WSDL
     * - documentation: Sets the cart gradient color for the Mini Cart on 1X flow. Optional Character length and limitation: Six character HTML hexadecimal color code in ASCII
     * - minOccurs: 0
     * @var string
     */
    public $cpp_cart_border_color;
    /**
     * The cpp_logo_image
     * Meta information extracted from the WSDL
     * - documentation: A URL for the image you want to appear above the mini-cart. The image has a maximum size of 190 pixels wide by 60 pixels high. PayPal recommends that you provide an image that is stored on a secure (https) server. Optional Character
     * length and limitations: 127
     * - minOccurs: 0
     * @var string
     */
    public $cpp_logo_image;
    /**
     * The Address
     * Meta information extracted from the WSDL
     * - documentation: Customer's shipping address. Optional If you include a shipping address and set the AddressOverride element on the request, PayPal returns this same address in GetExpressCheckoutDetailsResponse.
     * - minOccurs: 0
     * @var \Api\StructType\ApiAddressType
     */
    public $Address;
    /**
     * The PaymentAction
     * Meta information extracted from the WSDL
     * - documentation: How you want to obtain payment. Required Authorization indicates that this payment is a basic authorization subject to settlement with PayPal Authorization and Capture. Order indicates that this payment is is an order authorization
     * subject to settlement with PayPal Authorization and Capture. Sale indicates that this is a final sale for which you are requesting payment. IMPORTANT: You cannot set PaymentAction to Sale or Order on SetExpressCheckoutRequest and then change
     * PaymentAction to Authorization on the final Express Checkout API, DoExpressCheckoutPaymentRequest. Character length and limit: Up to 13 single-byte alphabetic characters
     * - minOccurs: 0
     * @var string
     */
    public $PaymentAction;
    /**
     * The SolutionType
     * Meta information extracted from the WSDL
     * - documentation: This will indicate which flow you are choosing (expresschecheckout or expresscheckout optional) Optional None Sole indicates that you are in the ExpressO flow Mark indicates that you are in the old express flow.
     * - minOccurs: 0
     * @var string
     */
    public $SolutionType;
    /**
     * The LandingPage
     * Meta information extracted from the WSDL
     * - documentation: This indicates Which page to display for ExpressO (Billing or Login) Optional None Billing indicates that you are not a paypal account holder Login indicates that you are a paypal account holder
     * - minOccurs: 0
     * @var string
     */
    public $LandingPage;
    /**
     * The BuyerEmail
     * Meta information extracted from the WSDL
     * - documentation: Email address of the buyer as entered during checkout. PayPal uses this value to pre-fill the PayPal membership sign-up portion of the PayPal login page. Optional Character length and limit: 127 single-byte alphanumeric characters
     * - base: xs:string
     * - minOccurs: 0
     * @var string
     */
    public $BuyerEmail;
    /**
     * The ChannelType
     * Meta information extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $ChannelType;
    /**
     * The BillingAgreementDetails
     * Meta information extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var \Api\StructType\ApiBillingAgreementDetailsType[]
     */
    public $BillingAgreementDetails;
    /**
     * The PromoCodes
     * Meta information extracted from the WSDL
     * - documentation: Promo Code Optional List of promo codes supplied by merchant. These promo codes enable the Merchant Services Promotion Financing feature.
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var string[]
     */
    public $PromoCodes;
    /**
     * The PayPalCheckOutBtnType
     * Meta information extracted from the WSDL
     * - documentation: Default Funding option for PayLater Checkout button.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $PayPalCheckOutBtnType;
    /**
     * The ProductCategory
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $ProductCategory;
    /**
     * The ShippingMethod
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $ShippingMethod;
    /**
     * The ProfileAddressChangeDate
     * Meta information extracted from the WSDL
     * - documentation: Date and time (in GMT in the format yyyy-MM-ddTHH:mm:ssZ) at which address was changed by the user.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $ProfileAddressChangeDate;
    /**
     * The AllowNote
     * Meta information extracted from the WSDL
     * - documentation: The value 1 indicates that the customer may enter a note to the merchant on the PayPal page during checkout. The note is returned in the GetExpressCheckoutDetails response and the DoExpressCheckoutPayment response. Optional Character
     * length and limitations: One single-byte numeric character. Allowable values: 0,1
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $AllowNote;
    /**
     * The FundingSourceDetails
     * Meta information extracted from the WSDL
     * - documentation: Funding source preferences.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Api\StructType\ApiFundingSourceDetailsType
     */
    public $FundingSourceDetails;
    /**
     * The BrandName
     * Meta information extracted from the WSDL
     * - documentation: The label that needs to be displayed on the cancel links in the PayPal hosted checkout pages. Optional Character length and limit: 127 single-byte alphanumeric characters
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $BrandName;
    /**
     * The CallbackURL
     * Meta information extracted from the WSDL
     * - documentation: URL for PayPal to use to retrieve shipping, handling, insurance, and tax details from your website. Optional Character length and limitations: 2048 characters.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $CallbackURL;
    /**
     * The EnhancedCheckoutData
     * Meta information extracted from the WSDL
     * - documentation: Enhanced data for different industry segments. Optional
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Api\StructType\ApiEnhancedCheckoutDataType
     */
    public $EnhancedCheckoutData;
    /**
     * The OtherPaymentMethods
     * Meta information extracted from the WSDL
     * - documentation: List of other payment methods the user can pay with. Optional Refer to the OtherPaymentMethodDetailsType for more details.
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var \Api\StructType\ApiOtherPaymentMethodDetailsType[]
     */
    public $OtherPaymentMethods;
    /**
     * The BuyerDetails
     * Meta information extracted from the WSDL
     * - documentation: Details about the buyer's account. Optional Refer to the BuyerDetailsType for more details.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Api\StructType\ApiBuyerDetailsType
     */
    public $BuyerDetails;
    /**
     * The PaymentDetails
     * Meta information extracted from the WSDL
     * - documentation: Information about the payment.
     * - maxOccurs: 10
     * - minOccurs: 0
     * @var \Api\StructType\ApiPaymentDetailsType[]
     */
    public $PaymentDetails;
    /**
     * The FlatRateShippingOptions
     * Meta information extracted from the WSDL
     * - documentation: List of Fall Back Shipping options provided by merchant.
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var \Api\StructType\ApiShippingOptionType[]
     */
    public $FlatRateShippingOptions;
    /**
     * The CallbackTimeout
     * Meta information extracted from the WSDL
     * - documentation: Information about the call back timeout override.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $CallbackTimeout;
    /**
     * The CallbackVersion
     * Meta information extracted from the WSDL
     * - documentation: Information about the call back version.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $CallbackVersion;
    /**
     * The CustomerServiceNumber
     * Meta information extracted from the WSDL
     * - documentation: Information about the Customer service number.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $CustomerServiceNumber;
    /**
     * The GiftMessageEnable
     * Meta information extracted from the WSDL
     * - documentation: Information about the Gift message enable.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $GiftMessageEnable;
    /**
     * The GiftReceiptEnable
     * Meta information extracted from the WSDL
     * - documentation: Information about the Gift receipt enable.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $GiftReceiptEnable;
    /**
     * The GiftWrapEnable
     * Meta information extracted from the WSDL
     * - documentation: Information about the Gift Wrap enable.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $GiftWrapEnable;
    /**
     * The GiftWrapName
     * Meta information extracted from the WSDL
     * - documentation: Information about the Gift Wrap name.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $GiftWrapName;
    /**
     * The GiftWrapAmount
     * Meta information extracted from the WSDL
     * - documentation: Information about the Gift Wrap amount.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Api\StructType\ApiBasicAmountType
     */
    public $GiftWrapAmount;
    /**
     * The BuyerEmailOptInEnable
     * Meta information extracted from the WSDL
     * - documentation: Information about the Buyer email option enable .
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $BuyerEmailOptInEnable;
    /**
     * The SurveyEnable
     * Meta information extracted from the WSDL
     * - documentation: Information about the survey enable.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $SurveyEnable;
    /**
     * The SurveyQuestion
     * Meta information extracted from the WSDL
     * - documentation: Information about the survey question.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $SurveyQuestion;
    /**
     * The SurveyChoice
     * Meta information extracted from the WSDL
     * - documentation: Information about the survey choices for survey question.
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var string[]
     */
    public $SurveyChoice;
    /**
     * The TotalType
     * Meta information extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $TotalType;
    /**
     * The NoteToBuyer
     * Meta information extracted from the WSDL
     * - documentation: Any message the seller would like to be displayed in the Mini Cart for UX.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $NoteToBuyer;
    /**
     * The Incentives
     * Meta information extracted from the WSDL
     * - documentation: Incentive Code Optional List of incentive codes supplied by ebay/merchant.
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var \Api\StructType\ApiIncentiveInfoType[]
     */
    public $Incentives;
    /**
     * The ReqInstrumentDetails
     * Meta information extracted from the WSDL
     * - documentation: Merchant specified flag which indicates whether to return Funding Instrument Details in DoEC or not. Optional
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $ReqInstrumentDetails;
    /**
     * The ExternalRememberMeOptInDetails
     * Meta information extracted from the WSDL
     * - documentation: This element contains information that allows the merchant to request to opt into external remember me on behalf of the buyer or to request login bypass using external remember me. Note the opt-in details are silently ignored if the
     * ExternalRememberMeID is present.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Api\StructType\ApiExternalRememberMeOptInDetailsType
     */
    public $ExternalRememberMeOptInDetails;
    /**
     * The FlowControlDetails
     * Meta information extracted from the WSDL
     * - documentation: An optional set of values related to flow-specific details.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Api\StructType\ApiFlowControlDetailsType
     */
    public $FlowControlDetails;
    /**
     * The DisplayControlDetails
     * Meta information extracted from the WSDL
     * - documentation: An optional set of values related to display-specific details.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Api\StructType\ApiDisplayControlDetailsType
     */
    public $DisplayControlDetails;
    /**
     * The ExternalPartnerTrackingDetails
     * Meta information extracted from the WSDL
     * - documentation: An optional set of values related to tracking for external partner.
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Api\StructType\ApiExternalPartnerTrackingDetailsType
     */
    public $ExternalPartnerTrackingDetails;
    /**
     * The CoupledBuckets
     * Meta information extracted from the WSDL
     * - documentation: Optional element that defines relationship between buckets
     * - maxOccurs: 5
     * - minOccurs: 0
     * @var \Api\StructType\ApiCoupledBucketsType[]
     */
    public $CoupledBuckets;
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
     * @param \Api\StructType\ApiBasicAmountType $orderTotal
     * @param string $returnURL
     * @param string $cancelURL
     * @param string $trackingImageURL
     * @param string $giropaySuccessURL
     * @param string $giropayCancelURL
     * @param string $banktxnPendingURL
     * @param string $token
     * @param \Api\StructType\ApiBasicAmountType $maxAmount
     * @param string $orderDescription
     * @param string $custom
     * @param string $invoiceID
     * @param string $reqConfirmShipping
     * @param string $reqBillingAddress
     * @param \Api\StructType\ApiAddressType $billingAddress
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
     * @param \Api\StructType\ApiAddressType $address
     * @param string $paymentAction
     * @param string $solutionType
     * @param string $landingPage
     * @param string $buyerEmail
     * @param string $channelType
     * @param \Api\StructType\ApiBillingAgreementDetailsType[] $billingAgreementDetails
     * @param string[] $promoCodes
     * @param string $payPalCheckOutBtnType
     * @param string $productCategory
     * @param string $shippingMethod
     * @param string $profileAddressChangeDate
     * @param string $allowNote
     * @param \Api\StructType\ApiFundingSourceDetailsType $fundingSourceDetails
     * @param string $brandName
     * @param string $callbackURL
     * @param \Api\StructType\ApiEnhancedCheckoutDataType $enhancedCheckoutData
     * @param \Api\StructType\ApiOtherPaymentMethodDetailsType[] $otherPaymentMethods
     * @param \Api\StructType\ApiBuyerDetailsType $buyerDetails
     * @param \Api\StructType\ApiPaymentDetailsType[] $paymentDetails
     * @param \Api\StructType\ApiShippingOptionType[] $flatRateShippingOptions
     * @param string $callbackTimeout
     * @param string $callbackVersion
     * @param string $customerServiceNumber
     * @param string $giftMessageEnable
     * @param string $giftReceiptEnable
     * @param string $giftWrapEnable
     * @param string $giftWrapName
     * @param \Api\StructType\ApiBasicAmountType $giftWrapAmount
     * @param string $buyerEmailOptInEnable
     * @param string $surveyEnable
     * @param string $surveyQuestion
     * @param string[] $surveyChoice
     * @param string $totalType
     * @param string $noteToBuyer
     * @param \Api\StructType\ApiIncentiveInfoType[] $incentives
     * @param string $reqInstrumentDetails
     * @param \Api\StructType\ApiExternalRememberMeOptInDetailsType $externalRememberMeOptInDetails
     * @param \Api\StructType\ApiFlowControlDetailsType $flowControlDetails
     * @param \Api\StructType\ApiDisplayControlDetailsType $displayControlDetails
     * @param \Api\StructType\ApiExternalPartnerTrackingDetailsType $externalPartnerTrackingDetails
     * @param \Api\StructType\ApiCoupledBucketsType[] $coupledBuckets
     */
    public function __construct(\Api\StructType\ApiBasicAmountType $orderTotal = null, $returnURL = null, $cancelURL = null, $trackingImageURL = null, $giropaySuccessURL = null, $giropayCancelURL = null, $banktxnPendingURL = null, $token = null, \Api\StructType\ApiBasicAmountType $maxAmount = null, $orderDescription = null, $custom = null, $invoiceID = null, $reqConfirmShipping = null, $reqBillingAddress = null, \Api\StructType\ApiAddressType $billingAddress = null, $noShipping = null, $addressOverride = null, $localeCode = null, $pageStyle = null, $cpp_header_image = null, $cpp_header_border_color = null, $cpp_header_back_color = null, $cpp_payflow_color = null, $cpp_cart_border_color = null, $cpp_logo_image = null, \Api\StructType\ApiAddressType $address = null, $paymentAction = null, $solutionType = null, $landingPage = null, $buyerEmail = null, $channelType = null, array $billingAgreementDetails = array(), array $promoCodes = array(), $payPalCheckOutBtnType = null, $productCategory = null, $shippingMethod = null, $profileAddressChangeDate = null, $allowNote = null, \Api\StructType\ApiFundingSourceDetailsType $fundingSourceDetails = null, $brandName = null, $callbackURL = null, \Api\StructType\ApiEnhancedCheckoutDataType $enhancedCheckoutData = null, array $otherPaymentMethods = array(), \Api\StructType\ApiBuyerDetailsType $buyerDetails = null, array $paymentDetails = array(), array $flatRateShippingOptions = array(), $callbackTimeout = null, $callbackVersion = null, $customerServiceNumber = null, $giftMessageEnable = null, $giftReceiptEnable = null, $giftWrapEnable = null, $giftWrapName = null, \Api\StructType\ApiBasicAmountType $giftWrapAmount = null, $buyerEmailOptInEnable = null, $surveyEnable = null, $surveyQuestion = null, array $surveyChoice = array(), $totalType = null, $noteToBuyer = null, array $incentives = array(), $reqInstrumentDetails = null, \Api\StructType\ApiExternalRememberMeOptInDetailsType $externalRememberMeOptInDetails = null, \Api\StructType\ApiFlowControlDetailsType $flowControlDetails = null, \Api\StructType\ApiDisplayControlDetailsType $displayControlDetails = null, \Api\StructType\ApiExternalPartnerTrackingDetailsType $externalPartnerTrackingDetails = null, array $coupledBuckets = array())
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
     * @return \Api\StructType\ApiBasicAmountType|null
     */
    public function getOrderTotal()
    {
        return $this->OrderTotal;
    }
    /**
     * Set OrderTotal value
     * @param \Api\StructType\ApiBasicAmountType $orderTotal
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setOrderTotal(\Api\StructType\ApiBasicAmountType $orderTotal = null)
    {
        $this->OrderTotal = $orderTotal;
        return $this;
    }
    /**
     * Get ReturnURL value
     * @return string|null
     */
    public function getReturnURL()
    {
        return $this->ReturnURL;
    }
    /**
     * Set ReturnURL value
     * @param string $returnURL
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setReturnURL($returnURL = null)
    {
        // validation for constraint: string
        if (!is_null($returnURL) && !is_string($returnURL)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($returnURL, true), gettype($returnURL)), __LINE__);
        }
        $this->ReturnURL = $returnURL;
        return $this;
    }
    /**
     * Get CancelURL value
     * @return string|null
     */
    public function getCancelURL()
    {
        return $this->CancelURL;
    }
    /**
     * Set CancelURL value
     * @param string $cancelURL
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setCancelURL($cancelURL = null)
    {
        // validation for constraint: string
        if (!is_null($cancelURL) && !is_string($cancelURL)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($cancelURL, true), gettype($cancelURL)), __LINE__);
        }
        $this->CancelURL = $cancelURL;
        return $this;
    }
    /**
     * Get TrackingImageURL value
     * @return string|null
     */
    public function getTrackingImageURL()
    {
        return $this->TrackingImageURL;
    }
    /**
     * Set TrackingImageURL value
     * @param string $trackingImageURL
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setTrackingImageURL($trackingImageURL = null)
    {
        // validation for constraint: string
        if (!is_null($trackingImageURL) && !is_string($trackingImageURL)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($trackingImageURL, true), gettype($trackingImageURL)), __LINE__);
        }
        $this->TrackingImageURL = $trackingImageURL;
        return $this;
    }
    /**
     * Get giropaySuccessURL value
     * @return string|null
     */
    public function getGiropaySuccessURL()
    {
        return $this->giropaySuccessURL;
    }
    /**
     * Set giropaySuccessURL value
     * @param string $giropaySuccessURL
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setGiropaySuccessURL($giropaySuccessURL = null)
    {
        // validation for constraint: string
        if (!is_null($giropaySuccessURL) && !is_string($giropaySuccessURL)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($giropaySuccessURL, true), gettype($giropaySuccessURL)), __LINE__);
        }
        $this->giropaySuccessURL = $giropaySuccessURL;
        return $this;
    }
    /**
     * Get giropayCancelURL value
     * @return string|null
     */
    public function getGiropayCancelURL()
    {
        return $this->giropayCancelURL;
    }
    /**
     * Set giropayCancelURL value
     * @param string $giropayCancelURL
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setGiropayCancelURL($giropayCancelURL = null)
    {
        // validation for constraint: string
        if (!is_null($giropayCancelURL) && !is_string($giropayCancelURL)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($giropayCancelURL, true), gettype($giropayCancelURL)), __LINE__);
        }
        $this->giropayCancelURL = $giropayCancelURL;
        return $this;
    }
    /**
     * Get BanktxnPendingURL value
     * @return string|null
     */
    public function getBanktxnPendingURL()
    {
        return $this->BanktxnPendingURL;
    }
    /**
     * Set BanktxnPendingURL value
     * @param string $banktxnPendingURL
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setBanktxnPendingURL($banktxnPendingURL = null)
    {
        // validation for constraint: string
        if (!is_null($banktxnPendingURL) && !is_string($banktxnPendingURL)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($banktxnPendingURL, true), gettype($banktxnPendingURL)), __LINE__);
        }
        $this->BanktxnPendingURL = $banktxnPendingURL;
        return $this;
    }
    /**
     * Get Token value
     * @return string|null
     */
    public function getToken()
    {
        return $this->Token;
    }
    /**
     * Set Token value
     * @param string $token
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setToken($token = null)
    {
        // validation for constraint: string
        if (!is_null($token) && !is_string($token)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($token, true), gettype($token)), __LINE__);
        }
        $this->Token = $token;
        return $this;
    }
    /**
     * Get MaxAmount value
     * @return \Api\StructType\ApiBasicAmountType|null
     */
    public function getMaxAmount()
    {
        return $this->MaxAmount;
    }
    /**
     * Set MaxAmount value
     * @param \Api\StructType\ApiBasicAmountType $maxAmount
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setMaxAmount(\Api\StructType\ApiBasicAmountType $maxAmount = null)
    {
        $this->MaxAmount = $maxAmount;
        return $this;
    }
    /**
     * Get OrderDescription value
     * @return string|null
     */
    public function getOrderDescription()
    {
        return $this->OrderDescription;
    }
    /**
     * Set OrderDescription value
     * @param string $orderDescription
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setOrderDescription($orderDescription = null)
    {
        // validation for constraint: string
        if (!is_null($orderDescription) && !is_string($orderDescription)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($orderDescription, true), gettype($orderDescription)), __LINE__);
        }
        $this->OrderDescription = $orderDescription;
        return $this;
    }
    /**
     * Get Custom value
     * @return string|null
     */
    public function getCustom()
    {
        return $this->Custom;
    }
    /**
     * Set Custom value
     * @param string $custom
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setCustom($custom = null)
    {
        // validation for constraint: string
        if (!is_null($custom) && !is_string($custom)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($custom, true), gettype($custom)), __LINE__);
        }
        $this->Custom = $custom;
        return $this;
    }
    /**
     * Get InvoiceID value
     * @return string|null
     */
    public function getInvoiceID()
    {
        return $this->InvoiceID;
    }
    /**
     * Set InvoiceID value
     * @param string $invoiceID
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setInvoiceID($invoiceID = null)
    {
        // validation for constraint: string
        if (!is_null($invoiceID) && !is_string($invoiceID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($invoiceID, true), gettype($invoiceID)), __LINE__);
        }
        $this->InvoiceID = $invoiceID;
        return $this;
    }
    /**
     * Get ReqConfirmShipping value
     * @return string|null
     */
    public function getReqConfirmShipping()
    {
        return $this->ReqConfirmShipping;
    }
    /**
     * Set ReqConfirmShipping value
     * @param string $reqConfirmShipping
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setReqConfirmShipping($reqConfirmShipping = null)
    {
        // validation for constraint: string
        if (!is_null($reqConfirmShipping) && !is_string($reqConfirmShipping)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($reqConfirmShipping, true), gettype($reqConfirmShipping)), __LINE__);
        }
        $this->ReqConfirmShipping = $reqConfirmShipping;
        return $this;
    }
    /**
     * Get ReqBillingAddress value
     * @return string|null
     */
    public function getReqBillingAddress()
    {
        return $this->ReqBillingAddress;
    }
    /**
     * Set ReqBillingAddress value
     * @param string $reqBillingAddress
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setReqBillingAddress($reqBillingAddress = null)
    {
        // validation for constraint: string
        if (!is_null($reqBillingAddress) && !is_string($reqBillingAddress)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($reqBillingAddress, true), gettype($reqBillingAddress)), __LINE__);
        }
        $this->ReqBillingAddress = $reqBillingAddress;
        return $this;
    }
    /**
     * Get BillingAddress value
     * @return \Api\StructType\ApiAddressType|null
     */
    public function getBillingAddress()
    {
        return $this->BillingAddress;
    }
    /**
     * Set BillingAddress value
     * @param \Api\StructType\ApiAddressType $billingAddress
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setBillingAddress(\Api\StructType\ApiAddressType $billingAddress = null)
    {
        $this->BillingAddress = $billingAddress;
        return $this;
    }
    /**
     * Get NoShipping value
     * @return string|null
     */
    public function getNoShipping()
    {
        return $this->NoShipping;
    }
    /**
     * Set NoShipping value
     * @param string $noShipping
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setNoShipping($noShipping = null)
    {
        // validation for constraint: string
        if (!is_null($noShipping) && !is_string($noShipping)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($noShipping, true), gettype($noShipping)), __LINE__);
        }
        $this->NoShipping = $noShipping;
        return $this;
    }
    /**
     * Get AddressOverride value
     * @return string|null
     */
    public function getAddressOverride()
    {
        return $this->AddressOverride;
    }
    /**
     * Set AddressOverride value
     * @param string $addressOverride
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setAddressOverride($addressOverride = null)
    {
        // validation for constraint: string
        if (!is_null($addressOverride) && !is_string($addressOverride)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($addressOverride, true), gettype($addressOverride)), __LINE__);
        }
        $this->AddressOverride = $addressOverride;
        return $this;
    }
    /**
     * Get LocaleCode value
     * @return string|null
     */
    public function getLocaleCode()
    {
        return $this->LocaleCode;
    }
    /**
     * Set LocaleCode value
     * @param string $localeCode
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setLocaleCode($localeCode = null)
    {
        // validation for constraint: string
        if (!is_null($localeCode) && !is_string($localeCode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($localeCode, true), gettype($localeCode)), __LINE__);
        }
        $this->LocaleCode = $localeCode;
        return $this;
    }
    /**
     * Get PageStyle value
     * @return string|null
     */
    public function getPageStyle()
    {
        return $this->PageStyle;
    }
    /**
     * Set PageStyle value
     * @param string $pageStyle
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setPageStyle($pageStyle = null)
    {
        // validation for constraint: string
        if (!is_null($pageStyle) && !is_string($pageStyle)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($pageStyle, true), gettype($pageStyle)), __LINE__);
        }
        $this->PageStyle = $pageStyle;
        return $this;
    }
    /**
     * Get cpp_header_image value
     * @return string|null
     */
    public function getCpp_header_image()
    {
        return $this->{'cpp-header-image'};
    }
    /**
     * Set cpp_header_image value
     * @param string $cpp_header_image
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setCpp_header_image($cpp_header_image = null)
    {
        // validation for constraint: string
        if (!is_null($cpp_header_image) && !is_string($cpp_header_image)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($cpp_header_image, true), gettype($cpp_header_image)), __LINE__);
        }
        $this->cpp_header_image = $this->{'cpp-header-image'} = $cpp_header_image;
        return $this;
    }
    /**
     * Get cpp_header_border_color value
     * @return string|null
     */
    public function getCpp_header_border_color()
    {
        return $this->{'cpp-header-border-color'};
    }
    /**
     * Set cpp_header_border_color value
     * @param string $cpp_header_border_color
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setCpp_header_border_color($cpp_header_border_color = null)
    {
        // validation for constraint: string
        if (!is_null($cpp_header_border_color) && !is_string($cpp_header_border_color)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($cpp_header_border_color, true), gettype($cpp_header_border_color)), __LINE__);
        }
        $this->cpp_header_border_color = $this->{'cpp-header-border-color'} = $cpp_header_border_color;
        return $this;
    }
    /**
     * Get cpp_header_back_color value
     * @return string|null
     */
    public function getCpp_header_back_color()
    {
        return $this->{'cpp-header-back-color'};
    }
    /**
     * Set cpp_header_back_color value
     * @param string $cpp_header_back_color
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setCpp_header_back_color($cpp_header_back_color = null)
    {
        // validation for constraint: string
        if (!is_null($cpp_header_back_color) && !is_string($cpp_header_back_color)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($cpp_header_back_color, true), gettype($cpp_header_back_color)), __LINE__);
        }
        $this->cpp_header_back_color = $this->{'cpp-header-back-color'} = $cpp_header_back_color;
        return $this;
    }
    /**
     * Get cpp_payflow_color value
     * @return string|null
     */
    public function getCpp_payflow_color()
    {
        return $this->{'cpp-payflow-color'};
    }
    /**
     * Set cpp_payflow_color value
     * @param string $cpp_payflow_color
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setCpp_payflow_color($cpp_payflow_color = null)
    {
        // validation for constraint: string
        if (!is_null($cpp_payflow_color) && !is_string($cpp_payflow_color)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($cpp_payflow_color, true), gettype($cpp_payflow_color)), __LINE__);
        }
        $this->cpp_payflow_color = $this->{'cpp-payflow-color'} = $cpp_payflow_color;
        return $this;
    }
    /**
     * Get cpp_cart_border_color value
     * @return string|null
     */
    public function getCpp_cart_border_color()
    {
        return $this->{'cpp-cart-border-color'};
    }
    /**
     * Set cpp_cart_border_color value
     * @param string $cpp_cart_border_color
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setCpp_cart_border_color($cpp_cart_border_color = null)
    {
        // validation for constraint: string
        if (!is_null($cpp_cart_border_color) && !is_string($cpp_cart_border_color)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($cpp_cart_border_color, true), gettype($cpp_cart_border_color)), __LINE__);
        }
        $this->cpp_cart_border_color = $this->{'cpp-cart-border-color'} = $cpp_cart_border_color;
        return $this;
    }
    /**
     * Get cpp_logo_image value
     * @return string|null
     */
    public function getCpp_logo_image()
    {
        return $this->{'cpp-logo-image'};
    }
    /**
     * Set cpp_logo_image value
     * @param string $cpp_logo_image
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setCpp_logo_image($cpp_logo_image = null)
    {
        // validation for constraint: string
        if (!is_null($cpp_logo_image) && !is_string($cpp_logo_image)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($cpp_logo_image, true), gettype($cpp_logo_image)), __LINE__);
        }
        $this->cpp_logo_image = $this->{'cpp-logo-image'} = $cpp_logo_image;
        return $this;
    }
    /**
     * Get Address value
     * @return \Api\StructType\ApiAddressType|null
     */
    public function getAddress()
    {
        return $this->Address;
    }
    /**
     * Set Address value
     * @param \Api\StructType\ApiAddressType $address
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setAddress(\Api\StructType\ApiAddressType $address = null)
    {
        $this->Address = $address;
        return $this;
    }
    /**
     * Get PaymentAction value
     * @return string|null
     */
    public function getPaymentAction()
    {
        return $this->PaymentAction;
    }
    /**
     * Set PaymentAction value
     * @uses \Api\EnumType\ApiPaymentActionCodeType::valueIsValid()
     * @uses \Api\EnumType\ApiPaymentActionCodeType::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $paymentAction
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setPaymentAction($paymentAction = null)
    {
        // validation for constraint: enumeration
        if (!\Api\EnumType\ApiPaymentActionCodeType::valueIsValid($paymentAction)) {
            throw new \InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \Api\EnumType\ApiPaymentActionCodeType', is_array($paymentAction) ? implode(', ', $paymentAction) : var_export($paymentAction, true), implode(', ', \Api\EnumType\ApiPaymentActionCodeType::getValidValues())), __LINE__);
        }
        $this->PaymentAction = $paymentAction;
        return $this;
    }
    /**
     * Get SolutionType value
     * @return string|null
     */
    public function getSolutionType()
    {
        return $this->SolutionType;
    }
    /**
     * Set SolutionType value
     * @uses \Api\EnumType\ApiSolutionTypeType::valueIsValid()
     * @uses \Api\EnumType\ApiSolutionTypeType::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $solutionType
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setSolutionType($solutionType = null)
    {
        // validation for constraint: enumeration
        if (!\Api\EnumType\ApiSolutionTypeType::valueIsValid($solutionType)) {
            throw new \InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \Api\EnumType\ApiSolutionTypeType', is_array($solutionType) ? implode(', ', $solutionType) : var_export($solutionType, true), implode(', ', \Api\EnumType\ApiSolutionTypeType::getValidValues())), __LINE__);
        }
        $this->SolutionType = $solutionType;
        return $this;
    }
    /**
     * Get LandingPage value
     * @return string|null
     */
    public function getLandingPage()
    {
        return $this->LandingPage;
    }
    /**
     * Set LandingPage value
     * @uses \Api\EnumType\ApiLandingPageType::valueIsValid()
     * @uses \Api\EnumType\ApiLandingPageType::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $landingPage
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setLandingPage($landingPage = null)
    {
        // validation for constraint: enumeration
        if (!\Api\EnumType\ApiLandingPageType::valueIsValid($landingPage)) {
            throw new \InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \Api\EnumType\ApiLandingPageType', is_array($landingPage) ? implode(', ', $landingPage) : var_export($landingPage, true), implode(', ', \Api\EnumType\ApiLandingPageType::getValidValues())), __LINE__);
        }
        $this->LandingPage = $landingPage;
        return $this;
    }
    /**
     * Get BuyerEmail value
     * @return string|null
     */
    public function getBuyerEmail()
    {
        return $this->BuyerEmail;
    }
    /**
     * Set BuyerEmail value
     * @param string $buyerEmail
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setBuyerEmail($buyerEmail = null)
    {
        // validation for constraint: string
        if (!is_null($buyerEmail) && !is_string($buyerEmail)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($buyerEmail, true), gettype($buyerEmail)), __LINE__);
        }
        $this->BuyerEmail = $buyerEmail;
        return $this;
    }
    /**
     * Get ChannelType value
     * @return string|null
     */
    public function getChannelType()
    {
        return $this->ChannelType;
    }
    /**
     * Set ChannelType value
     * @uses \Api\EnumType\ApiChannelType::valueIsValid()
     * @uses \Api\EnumType\ApiChannelType::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $channelType
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setChannelType($channelType = null)
    {
        // validation for constraint: enumeration
        if (!\Api\EnumType\ApiChannelType::valueIsValid($channelType)) {
            throw new \InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \Api\EnumType\ApiChannelType', is_array($channelType) ? implode(', ', $channelType) : var_export($channelType, true), implode(', ', \Api\EnumType\ApiChannelType::getValidValues())), __LINE__);
        }
        $this->ChannelType = $channelType;
        return $this;
    }
    /**
     * Get BillingAgreementDetails value
     * @return \Api\StructType\ApiBillingAgreementDetailsType[]|null
     */
    public function getBillingAgreementDetails()
    {
        return $this->BillingAgreementDetails;
    }
    /**
     * This method is responsible for validating the values passed to the setBillingAgreementDetails method
     * This method is willingly generated in order to preserve the one-line inline validation within the setBillingAgreementDetails method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateBillingAgreementDetailsForArrayConstraintsFromSetBillingAgreementDetails(array $values = array())
    {
        $message = '';
        $invalidValues = [];
        foreach ($values as $setExpressCheckoutRequestDetailsTypeBillingAgreementDetailsItem) {
            // validation for constraint: itemType
            if (!$setExpressCheckoutRequestDetailsTypeBillingAgreementDetailsItem instanceof \Api\StructType\ApiBillingAgreementDetailsType) {
                $invalidValues[] = is_object($setExpressCheckoutRequestDetailsTypeBillingAgreementDetailsItem) ? get_class($setExpressCheckoutRequestDetailsTypeBillingAgreementDetailsItem) : sprintf('%s(%s)', gettype($setExpressCheckoutRequestDetailsTypeBillingAgreementDetailsItem), var_export($setExpressCheckoutRequestDetailsTypeBillingAgreementDetailsItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The BillingAgreementDetails property can only contain items of type \Api\StructType\ApiBillingAgreementDetailsType, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        return $message;
    }
    /**
     * Set BillingAgreementDetails value
     * @throws \InvalidArgumentException
     * @param \Api\StructType\ApiBillingAgreementDetailsType[] $billingAgreementDetails
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setBillingAgreementDetails(array $billingAgreementDetails = array())
    {
        // validation for constraint: array
        if ('' !== ($billingAgreementDetailsArrayErrorMessage = self::validateBillingAgreementDetailsForArrayConstraintsFromSetBillingAgreementDetails($billingAgreementDetails))) {
            throw new \InvalidArgumentException($billingAgreementDetailsArrayErrorMessage, __LINE__);
        }
        $this->BillingAgreementDetails = $billingAgreementDetails;
        return $this;
    }
    /**
     * Add item to BillingAgreementDetails value
     * @throws \InvalidArgumentException
     * @param \Api\StructType\ApiBillingAgreementDetailsType $item
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function addToBillingAgreementDetails(\Api\StructType\ApiBillingAgreementDetailsType $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \Api\StructType\ApiBillingAgreementDetailsType) {
            throw new \InvalidArgumentException(sprintf('The BillingAgreementDetails property can only contain items of type \Api\StructType\ApiBillingAgreementDetailsType, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->BillingAgreementDetails[] = $item;
        return $this;
    }
    /**
     * Get PromoCodes value
     * @return string[]|null
     */
    public function getPromoCodes()
    {
        return $this->PromoCodes;
    }
    /**
     * This method is responsible for validating the values passed to the setPromoCodes method
     * This method is willingly generated in order to preserve the one-line inline validation within the setPromoCodes method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validatePromoCodesForArrayConstraintsFromSetPromoCodes(array $values = array())
    {
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
     * @throws \InvalidArgumentException
     * @param string[] $promoCodes
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setPromoCodes(array $promoCodes = array())
    {
        // validation for constraint: array
        if ('' !== ($promoCodesArrayErrorMessage = self::validatePromoCodesForArrayConstraintsFromSetPromoCodes($promoCodes))) {
            throw new \InvalidArgumentException($promoCodesArrayErrorMessage, __LINE__);
        }
        $this->PromoCodes = $promoCodes;
        return $this;
    }
    /**
     * Add item to PromoCodes value
     * @throws \InvalidArgumentException
     * @param string $item
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function addToPromoCodes($item)
    {
        // validation for constraint: itemType
        if (!is_string($item)) {
            throw new \InvalidArgumentException(sprintf('The PromoCodes property can only contain items of type string, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->PromoCodes[] = $item;
        return $this;
    }
    /**
     * Get PayPalCheckOutBtnType value
     * @return string|null
     */
    public function getPayPalCheckOutBtnType()
    {
        return $this->PayPalCheckOutBtnType;
    }
    /**
     * Set PayPalCheckOutBtnType value
     * @param string $payPalCheckOutBtnType
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setPayPalCheckOutBtnType($payPalCheckOutBtnType = null)
    {
        // validation for constraint: string
        if (!is_null($payPalCheckOutBtnType) && !is_string($payPalCheckOutBtnType)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($payPalCheckOutBtnType, true), gettype($payPalCheckOutBtnType)), __LINE__);
        }
        $this->PayPalCheckOutBtnType = $payPalCheckOutBtnType;
        return $this;
    }
    /**
     * Get ProductCategory value
     * @return string|null
     */
    public function getProductCategory()
    {
        return $this->ProductCategory;
    }
    /**
     * Set ProductCategory value
     * @uses \Api\EnumType\ApiProductCategoryType::valueIsValid()
     * @uses \Api\EnumType\ApiProductCategoryType::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $productCategory
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setProductCategory($productCategory = null)
    {
        // validation for constraint: enumeration
        if (!\Api\EnumType\ApiProductCategoryType::valueIsValid($productCategory)) {
            throw new \InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \Api\EnumType\ApiProductCategoryType', is_array($productCategory) ? implode(', ', $productCategory) : var_export($productCategory, true), implode(', ', \Api\EnumType\ApiProductCategoryType::getValidValues())), __LINE__);
        }
        $this->ProductCategory = $productCategory;
        return $this;
    }
    /**
     * Get ShippingMethod value
     * @return string|null
     */
    public function getShippingMethod()
    {
        return $this->ShippingMethod;
    }
    /**
     * Set ShippingMethod value
     * @uses \Api\EnumType\ApiShippingServiceCodeType::valueIsValid()
     * @uses \Api\EnumType\ApiShippingServiceCodeType::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $shippingMethod
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setShippingMethod($shippingMethod = null)
    {
        // validation for constraint: enumeration
        if (!\Api\EnumType\ApiShippingServiceCodeType::valueIsValid($shippingMethod)) {
            throw new \InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \Api\EnumType\ApiShippingServiceCodeType', is_array($shippingMethod) ? implode(', ', $shippingMethod) : var_export($shippingMethod, true), implode(', ', \Api\EnumType\ApiShippingServiceCodeType::getValidValues())), __LINE__);
        }
        $this->ShippingMethod = $shippingMethod;
        return $this;
    }
    /**
     * Get ProfileAddressChangeDate value
     * @return string|null
     */
    public function getProfileAddressChangeDate()
    {
        return $this->ProfileAddressChangeDate;
    }
    /**
     * Set ProfileAddressChangeDate value
     * @param string $profileAddressChangeDate
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setProfileAddressChangeDate($profileAddressChangeDate = null)
    {
        // validation for constraint: string
        if (!is_null($profileAddressChangeDate) && !is_string($profileAddressChangeDate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($profileAddressChangeDate, true), gettype($profileAddressChangeDate)), __LINE__);
        }
        $this->ProfileAddressChangeDate = $profileAddressChangeDate;
        return $this;
    }
    /**
     * Get AllowNote value
     * @return string|null
     */
    public function getAllowNote()
    {
        return $this->AllowNote;
    }
    /**
     * Set AllowNote value
     * @param string $allowNote
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setAllowNote($allowNote = null)
    {
        // validation for constraint: string
        if (!is_null($allowNote) && !is_string($allowNote)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($allowNote, true), gettype($allowNote)), __LINE__);
        }
        $this->AllowNote = $allowNote;
        return $this;
    }
    /**
     * Get FundingSourceDetails value
     * @return \Api\StructType\ApiFundingSourceDetailsType|null
     */
    public function getFundingSourceDetails()
    {
        return $this->FundingSourceDetails;
    }
    /**
     * Set FundingSourceDetails value
     * @param \Api\StructType\ApiFundingSourceDetailsType $fundingSourceDetails
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setFundingSourceDetails(\Api\StructType\ApiFundingSourceDetailsType $fundingSourceDetails = null)
    {
        $this->FundingSourceDetails = $fundingSourceDetails;
        return $this;
    }
    /**
     * Get BrandName value
     * @return string|null
     */
    public function getBrandName()
    {
        return $this->BrandName;
    }
    /**
     * Set BrandName value
     * @param string $brandName
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setBrandName($brandName = null)
    {
        // validation for constraint: string
        if (!is_null($brandName) && !is_string($brandName)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($brandName, true), gettype($brandName)), __LINE__);
        }
        $this->BrandName = $brandName;
        return $this;
    }
    /**
     * Get CallbackURL value
     * @return string|null
     */
    public function getCallbackURL()
    {
        return $this->CallbackURL;
    }
    /**
     * Set CallbackURL value
     * @param string $callbackURL
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setCallbackURL($callbackURL = null)
    {
        // validation for constraint: string
        if (!is_null($callbackURL) && !is_string($callbackURL)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($callbackURL, true), gettype($callbackURL)), __LINE__);
        }
        $this->CallbackURL = $callbackURL;
        return $this;
    }
    /**
     * Get EnhancedCheckoutData value
     * @return \Api\StructType\ApiEnhancedCheckoutDataType|null
     */
    public function getEnhancedCheckoutData()
    {
        return $this->EnhancedCheckoutData;
    }
    /**
     * Set EnhancedCheckoutData value
     * @param \Api\StructType\ApiEnhancedCheckoutDataType $enhancedCheckoutData
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setEnhancedCheckoutData(\Api\StructType\ApiEnhancedCheckoutDataType $enhancedCheckoutData = null)
    {
        $this->EnhancedCheckoutData = $enhancedCheckoutData;
        return $this;
    }
    /**
     * Get OtherPaymentMethods value
     * @return \Api\StructType\ApiOtherPaymentMethodDetailsType[]|null
     */
    public function getOtherPaymentMethods()
    {
        return $this->OtherPaymentMethods;
    }
    /**
     * This method is responsible for validating the values passed to the setOtherPaymentMethods method
     * This method is willingly generated in order to preserve the one-line inline validation within the setOtherPaymentMethods method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateOtherPaymentMethodsForArrayConstraintsFromSetOtherPaymentMethods(array $values = array())
    {
        $message = '';
        $invalidValues = [];
        foreach ($values as $setExpressCheckoutRequestDetailsTypeOtherPaymentMethodsItem) {
            // validation for constraint: itemType
            if (!$setExpressCheckoutRequestDetailsTypeOtherPaymentMethodsItem instanceof \Api\StructType\ApiOtherPaymentMethodDetailsType) {
                $invalidValues[] = is_object($setExpressCheckoutRequestDetailsTypeOtherPaymentMethodsItem) ? get_class($setExpressCheckoutRequestDetailsTypeOtherPaymentMethodsItem) : sprintf('%s(%s)', gettype($setExpressCheckoutRequestDetailsTypeOtherPaymentMethodsItem), var_export($setExpressCheckoutRequestDetailsTypeOtherPaymentMethodsItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The OtherPaymentMethods property can only contain items of type \Api\StructType\ApiOtherPaymentMethodDetailsType, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        return $message;
    }
    /**
     * Set OtherPaymentMethods value
     * @throws \InvalidArgumentException
     * @param \Api\StructType\ApiOtherPaymentMethodDetailsType[] $otherPaymentMethods
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setOtherPaymentMethods(array $otherPaymentMethods = array())
    {
        // validation for constraint: array
        if ('' !== ($otherPaymentMethodsArrayErrorMessage = self::validateOtherPaymentMethodsForArrayConstraintsFromSetOtherPaymentMethods($otherPaymentMethods))) {
            throw new \InvalidArgumentException($otherPaymentMethodsArrayErrorMessage, __LINE__);
        }
        $this->OtherPaymentMethods = $otherPaymentMethods;
        return $this;
    }
    /**
     * Add item to OtherPaymentMethods value
     * @throws \InvalidArgumentException
     * @param \Api\StructType\ApiOtherPaymentMethodDetailsType $item
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function addToOtherPaymentMethods(\Api\StructType\ApiOtherPaymentMethodDetailsType $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \Api\StructType\ApiOtherPaymentMethodDetailsType) {
            throw new \InvalidArgumentException(sprintf('The OtherPaymentMethods property can only contain items of type \Api\StructType\ApiOtherPaymentMethodDetailsType, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->OtherPaymentMethods[] = $item;
        return $this;
    }
    /**
     * Get BuyerDetails value
     * @return \Api\StructType\ApiBuyerDetailsType|null
     */
    public function getBuyerDetails()
    {
        return $this->BuyerDetails;
    }
    /**
     * Set BuyerDetails value
     * @param \Api\StructType\ApiBuyerDetailsType $buyerDetails
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setBuyerDetails(\Api\StructType\ApiBuyerDetailsType $buyerDetails = null)
    {
        $this->BuyerDetails = $buyerDetails;
        return $this;
    }
    /**
     * Get PaymentDetails value
     * @return \Api\StructType\ApiPaymentDetailsType[]|null
     */
    public function getPaymentDetails()
    {
        return $this->PaymentDetails;
    }
    /**
     * This method is responsible for validating the values passed to the setPaymentDetails method
     * This method is willingly generated in order to preserve the one-line inline validation within the setPaymentDetails method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validatePaymentDetailsForArrayConstraintsFromSetPaymentDetails(array $values = array())
    {
        $message = '';
        $invalidValues = [];
        foreach ($values as $setExpressCheckoutRequestDetailsTypePaymentDetailsItem) {
            // validation for constraint: itemType
            if (!$setExpressCheckoutRequestDetailsTypePaymentDetailsItem instanceof \Api\StructType\ApiPaymentDetailsType) {
                $invalidValues[] = is_object($setExpressCheckoutRequestDetailsTypePaymentDetailsItem) ? get_class($setExpressCheckoutRequestDetailsTypePaymentDetailsItem) : sprintf('%s(%s)', gettype($setExpressCheckoutRequestDetailsTypePaymentDetailsItem), var_export($setExpressCheckoutRequestDetailsTypePaymentDetailsItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The PaymentDetails property can only contain items of type \Api\StructType\ApiPaymentDetailsType, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        return $message;
    }
    /**
     * Set PaymentDetails value
     * @throws \InvalidArgumentException
     * @param \Api\StructType\ApiPaymentDetailsType[] $paymentDetails
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setPaymentDetails(array $paymentDetails = array())
    {
        // validation for constraint: array
        if ('' !== ($paymentDetailsArrayErrorMessage = self::validatePaymentDetailsForArrayConstraintsFromSetPaymentDetails($paymentDetails))) {
            throw new \InvalidArgumentException($paymentDetailsArrayErrorMessage, __LINE__);
        }
        // validation for constraint: maxOccurs(10)
        if (is_array($paymentDetails) && count($paymentDetails) > 10) {
            throw new \InvalidArgumentException(sprintf('Invalid count of %s, the number of elements contained by the property must be less than or equal to 10', count($paymentDetails)), __LINE__);
        }
        $this->PaymentDetails = $paymentDetails;
        return $this;
    }
    /**
     * Add item to PaymentDetails value
     * @throws \InvalidArgumentException
     * @param \Api\StructType\ApiPaymentDetailsType $item
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function addToPaymentDetails(\Api\StructType\ApiPaymentDetailsType $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \Api\StructType\ApiPaymentDetailsType) {
            throw new \InvalidArgumentException(sprintf('The PaymentDetails property can only contain items of type \Api\StructType\ApiPaymentDetailsType, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        // validation for constraint: maxOccurs(10)
        if (is_array($this->PaymentDetails) && count($this->PaymentDetails) >= 10) {
            throw new \InvalidArgumentException(sprintf('You can\'t add anymore element to this property that already contains %s elements, the number of elements contained by the property must be less than or equal to 10', count($this->PaymentDetails)), __LINE__);
        }
        $this->PaymentDetails[] = $item;
        return $this;
    }
    /**
     * Get FlatRateShippingOptions value
     * @return \Api\StructType\ApiShippingOptionType[]|null
     */
    public function getFlatRateShippingOptions()
    {
        return $this->FlatRateShippingOptions;
    }
    /**
     * This method is responsible for validating the values passed to the setFlatRateShippingOptions method
     * This method is willingly generated in order to preserve the one-line inline validation within the setFlatRateShippingOptions method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateFlatRateShippingOptionsForArrayConstraintsFromSetFlatRateShippingOptions(array $values = array())
    {
        $message = '';
        $invalidValues = [];
        foreach ($values as $setExpressCheckoutRequestDetailsTypeFlatRateShippingOptionsItem) {
            // validation for constraint: itemType
            if (!$setExpressCheckoutRequestDetailsTypeFlatRateShippingOptionsItem instanceof \Api\StructType\ApiShippingOptionType) {
                $invalidValues[] = is_object($setExpressCheckoutRequestDetailsTypeFlatRateShippingOptionsItem) ? get_class($setExpressCheckoutRequestDetailsTypeFlatRateShippingOptionsItem) : sprintf('%s(%s)', gettype($setExpressCheckoutRequestDetailsTypeFlatRateShippingOptionsItem), var_export($setExpressCheckoutRequestDetailsTypeFlatRateShippingOptionsItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The FlatRateShippingOptions property can only contain items of type \Api\StructType\ApiShippingOptionType, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        return $message;
    }
    /**
     * Set FlatRateShippingOptions value
     * @throws \InvalidArgumentException
     * @param \Api\StructType\ApiShippingOptionType[] $flatRateShippingOptions
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setFlatRateShippingOptions(array $flatRateShippingOptions = array())
    {
        // validation for constraint: array
        if ('' !== ($flatRateShippingOptionsArrayErrorMessage = self::validateFlatRateShippingOptionsForArrayConstraintsFromSetFlatRateShippingOptions($flatRateShippingOptions))) {
            throw new \InvalidArgumentException($flatRateShippingOptionsArrayErrorMessage, __LINE__);
        }
        $this->FlatRateShippingOptions = $flatRateShippingOptions;
        return $this;
    }
    /**
     * Add item to FlatRateShippingOptions value
     * @throws \InvalidArgumentException
     * @param \Api\StructType\ApiShippingOptionType $item
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function addToFlatRateShippingOptions(\Api\StructType\ApiShippingOptionType $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \Api\StructType\ApiShippingOptionType) {
            throw new \InvalidArgumentException(sprintf('The FlatRateShippingOptions property can only contain items of type \Api\StructType\ApiShippingOptionType, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->FlatRateShippingOptions[] = $item;
        return $this;
    }
    /**
     * Get CallbackTimeout value
     * @return string|null
     */
    public function getCallbackTimeout()
    {
        return $this->CallbackTimeout;
    }
    /**
     * Set CallbackTimeout value
     * @param string $callbackTimeout
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setCallbackTimeout($callbackTimeout = null)
    {
        // validation for constraint: string
        if (!is_null($callbackTimeout) && !is_string($callbackTimeout)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($callbackTimeout, true), gettype($callbackTimeout)), __LINE__);
        }
        $this->CallbackTimeout = $callbackTimeout;
        return $this;
    }
    /**
     * Get CallbackVersion value
     * @return string|null
     */
    public function getCallbackVersion()
    {
        return $this->CallbackVersion;
    }
    /**
     * Set CallbackVersion value
     * @param string $callbackVersion
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setCallbackVersion($callbackVersion = null)
    {
        // validation for constraint: string
        if (!is_null($callbackVersion) && !is_string($callbackVersion)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($callbackVersion, true), gettype($callbackVersion)), __LINE__);
        }
        $this->CallbackVersion = $callbackVersion;
        return $this;
    }
    /**
     * Get CustomerServiceNumber value
     * @return string|null
     */
    public function getCustomerServiceNumber()
    {
        return $this->CustomerServiceNumber;
    }
    /**
     * Set CustomerServiceNumber value
     * @param string $customerServiceNumber
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setCustomerServiceNumber($customerServiceNumber = null)
    {
        // validation for constraint: string
        if (!is_null($customerServiceNumber) && !is_string($customerServiceNumber)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($customerServiceNumber, true), gettype($customerServiceNumber)), __LINE__);
        }
        $this->CustomerServiceNumber = $customerServiceNumber;
        return $this;
    }
    /**
     * Get GiftMessageEnable value
     * @return string|null
     */
    public function getGiftMessageEnable()
    {
        return $this->GiftMessageEnable;
    }
    /**
     * Set GiftMessageEnable value
     * @param string $giftMessageEnable
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setGiftMessageEnable($giftMessageEnable = null)
    {
        // validation for constraint: string
        if (!is_null($giftMessageEnable) && !is_string($giftMessageEnable)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($giftMessageEnable, true), gettype($giftMessageEnable)), __LINE__);
        }
        $this->GiftMessageEnable = $giftMessageEnable;
        return $this;
    }
    /**
     * Get GiftReceiptEnable value
     * @return string|null
     */
    public function getGiftReceiptEnable()
    {
        return $this->GiftReceiptEnable;
    }
    /**
     * Set GiftReceiptEnable value
     * @param string $giftReceiptEnable
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setGiftReceiptEnable($giftReceiptEnable = null)
    {
        // validation for constraint: string
        if (!is_null($giftReceiptEnable) && !is_string($giftReceiptEnable)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($giftReceiptEnable, true), gettype($giftReceiptEnable)), __LINE__);
        }
        $this->GiftReceiptEnable = $giftReceiptEnable;
        return $this;
    }
    /**
     * Get GiftWrapEnable value
     * @return string|null
     */
    public function getGiftWrapEnable()
    {
        return $this->GiftWrapEnable;
    }
    /**
     * Set GiftWrapEnable value
     * @param string $giftWrapEnable
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setGiftWrapEnable($giftWrapEnable = null)
    {
        // validation for constraint: string
        if (!is_null($giftWrapEnable) && !is_string($giftWrapEnable)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($giftWrapEnable, true), gettype($giftWrapEnable)), __LINE__);
        }
        $this->GiftWrapEnable = $giftWrapEnable;
        return $this;
    }
    /**
     * Get GiftWrapName value
     * @return string|null
     */
    public function getGiftWrapName()
    {
        return $this->GiftWrapName;
    }
    /**
     * Set GiftWrapName value
     * @param string $giftWrapName
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setGiftWrapName($giftWrapName = null)
    {
        // validation for constraint: string
        if (!is_null($giftWrapName) && !is_string($giftWrapName)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($giftWrapName, true), gettype($giftWrapName)), __LINE__);
        }
        $this->GiftWrapName = $giftWrapName;
        return $this;
    }
    /**
     * Get GiftWrapAmount value
     * @return \Api\StructType\ApiBasicAmountType|null
     */
    public function getGiftWrapAmount()
    {
        return $this->GiftWrapAmount;
    }
    /**
     * Set GiftWrapAmount value
     * @param \Api\StructType\ApiBasicAmountType $giftWrapAmount
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setGiftWrapAmount(\Api\StructType\ApiBasicAmountType $giftWrapAmount = null)
    {
        $this->GiftWrapAmount = $giftWrapAmount;
        return $this;
    }
    /**
     * Get BuyerEmailOptInEnable value
     * @return string|null
     */
    public function getBuyerEmailOptInEnable()
    {
        return $this->BuyerEmailOptInEnable;
    }
    /**
     * Set BuyerEmailOptInEnable value
     * @param string $buyerEmailOptInEnable
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setBuyerEmailOptInEnable($buyerEmailOptInEnable = null)
    {
        // validation for constraint: string
        if (!is_null($buyerEmailOptInEnable) && !is_string($buyerEmailOptInEnable)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($buyerEmailOptInEnable, true), gettype($buyerEmailOptInEnable)), __LINE__);
        }
        $this->BuyerEmailOptInEnable = $buyerEmailOptInEnable;
        return $this;
    }
    /**
     * Get SurveyEnable value
     * @return string|null
     */
    public function getSurveyEnable()
    {
        return $this->SurveyEnable;
    }
    /**
     * Set SurveyEnable value
     * @param string $surveyEnable
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setSurveyEnable($surveyEnable = null)
    {
        // validation for constraint: string
        if (!is_null($surveyEnable) && !is_string($surveyEnable)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($surveyEnable, true), gettype($surveyEnable)), __LINE__);
        }
        $this->SurveyEnable = $surveyEnable;
        return $this;
    }
    /**
     * Get SurveyQuestion value
     * @return string|null
     */
    public function getSurveyQuestion()
    {
        return $this->SurveyQuestion;
    }
    /**
     * Set SurveyQuestion value
     * @param string $surveyQuestion
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setSurveyQuestion($surveyQuestion = null)
    {
        // validation for constraint: string
        if (!is_null($surveyQuestion) && !is_string($surveyQuestion)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($surveyQuestion, true), gettype($surveyQuestion)), __LINE__);
        }
        $this->SurveyQuestion = $surveyQuestion;
        return $this;
    }
    /**
     * Get SurveyChoice value
     * @return string[]|null
     */
    public function getSurveyChoice()
    {
        return $this->SurveyChoice;
    }
    /**
     * This method is responsible for validating the values passed to the setSurveyChoice method
     * This method is willingly generated in order to preserve the one-line inline validation within the setSurveyChoice method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateSurveyChoiceForArrayConstraintsFromSetSurveyChoice(array $values = array())
    {
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
     * @throws \InvalidArgumentException
     * @param string[] $surveyChoice
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setSurveyChoice(array $surveyChoice = array())
    {
        // validation for constraint: array
        if ('' !== ($surveyChoiceArrayErrorMessage = self::validateSurveyChoiceForArrayConstraintsFromSetSurveyChoice($surveyChoice))) {
            throw new \InvalidArgumentException($surveyChoiceArrayErrorMessage, __LINE__);
        }
        $this->SurveyChoice = $surveyChoice;
        return $this;
    }
    /**
     * Add item to SurveyChoice value
     * @throws \InvalidArgumentException
     * @param string $item
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function addToSurveyChoice($item)
    {
        // validation for constraint: itemType
        if (!is_string($item)) {
            throw new \InvalidArgumentException(sprintf('The SurveyChoice property can only contain items of type string, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->SurveyChoice[] = $item;
        return $this;
    }
    /**
     * Get TotalType value
     * @return string|null
     */
    public function getTotalType()
    {
        return $this->TotalType;
    }
    /**
     * Set TotalType value
     * @uses \Api\EnumType\ApiTotalType::valueIsValid()
     * @uses \Api\EnumType\ApiTotalType::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $totalType
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setTotalType($totalType = null)
    {
        // validation for constraint: enumeration
        if (!\Api\EnumType\ApiTotalType::valueIsValid($totalType)) {
            throw new \InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \Api\EnumType\ApiTotalType', is_array($totalType) ? implode(', ', $totalType) : var_export($totalType, true), implode(', ', \Api\EnumType\ApiTotalType::getValidValues())), __LINE__);
        }
        $this->TotalType = $totalType;
        return $this;
    }
    /**
     * Get NoteToBuyer value
     * @return string|null
     */
    public function getNoteToBuyer()
    {
        return $this->NoteToBuyer;
    }
    /**
     * Set NoteToBuyer value
     * @param string $noteToBuyer
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setNoteToBuyer($noteToBuyer = null)
    {
        // validation for constraint: string
        if (!is_null($noteToBuyer) && !is_string($noteToBuyer)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($noteToBuyer, true), gettype($noteToBuyer)), __LINE__);
        }
        $this->NoteToBuyer = $noteToBuyer;
        return $this;
    }
    /**
     * Get Incentives value
     * @return \Api\StructType\ApiIncentiveInfoType[]|null
     */
    public function getIncentives()
    {
        return $this->Incentives;
    }
    /**
     * This method is responsible for validating the values passed to the setIncentives method
     * This method is willingly generated in order to preserve the one-line inline validation within the setIncentives method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateIncentivesForArrayConstraintsFromSetIncentives(array $values = array())
    {
        $message = '';
        $invalidValues = [];
        foreach ($values as $setExpressCheckoutRequestDetailsTypeIncentivesItem) {
            // validation for constraint: itemType
            if (!$setExpressCheckoutRequestDetailsTypeIncentivesItem instanceof \Api\StructType\ApiIncentiveInfoType) {
                $invalidValues[] = is_object($setExpressCheckoutRequestDetailsTypeIncentivesItem) ? get_class($setExpressCheckoutRequestDetailsTypeIncentivesItem) : sprintf('%s(%s)', gettype($setExpressCheckoutRequestDetailsTypeIncentivesItem), var_export($setExpressCheckoutRequestDetailsTypeIncentivesItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The Incentives property can only contain items of type \Api\StructType\ApiIncentiveInfoType, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        return $message;
    }
    /**
     * Set Incentives value
     * @throws \InvalidArgumentException
     * @param \Api\StructType\ApiIncentiveInfoType[] $incentives
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setIncentives(array $incentives = array())
    {
        // validation for constraint: array
        if ('' !== ($incentivesArrayErrorMessage = self::validateIncentivesForArrayConstraintsFromSetIncentives($incentives))) {
            throw new \InvalidArgumentException($incentivesArrayErrorMessage, __LINE__);
        }
        $this->Incentives = $incentives;
        return $this;
    }
    /**
     * Add item to Incentives value
     * @throws \InvalidArgumentException
     * @param \Api\StructType\ApiIncentiveInfoType $item
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function addToIncentives(\Api\StructType\ApiIncentiveInfoType $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \Api\StructType\ApiIncentiveInfoType) {
            throw new \InvalidArgumentException(sprintf('The Incentives property can only contain items of type \Api\StructType\ApiIncentiveInfoType, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->Incentives[] = $item;
        return $this;
    }
    /**
     * Get ReqInstrumentDetails value
     * @return string|null
     */
    public function getReqInstrumentDetails()
    {
        return $this->ReqInstrumentDetails;
    }
    /**
     * Set ReqInstrumentDetails value
     * @param string $reqInstrumentDetails
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setReqInstrumentDetails($reqInstrumentDetails = null)
    {
        // validation for constraint: string
        if (!is_null($reqInstrumentDetails) && !is_string($reqInstrumentDetails)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($reqInstrumentDetails, true), gettype($reqInstrumentDetails)), __LINE__);
        }
        $this->ReqInstrumentDetails = $reqInstrumentDetails;
        return $this;
    }
    /**
     * Get ExternalRememberMeOptInDetails value
     * @return \Api\StructType\ApiExternalRememberMeOptInDetailsType|null
     */
    public function getExternalRememberMeOptInDetails()
    {
        return $this->ExternalRememberMeOptInDetails;
    }
    /**
     * Set ExternalRememberMeOptInDetails value
     * @param \Api\StructType\ApiExternalRememberMeOptInDetailsType $externalRememberMeOptInDetails
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setExternalRememberMeOptInDetails(\Api\StructType\ApiExternalRememberMeOptInDetailsType $externalRememberMeOptInDetails = null)
    {
        $this->ExternalRememberMeOptInDetails = $externalRememberMeOptInDetails;
        return $this;
    }
    /**
     * Get FlowControlDetails value
     * @return \Api\StructType\ApiFlowControlDetailsType|null
     */
    public function getFlowControlDetails()
    {
        return $this->FlowControlDetails;
    }
    /**
     * Set FlowControlDetails value
     * @param \Api\StructType\ApiFlowControlDetailsType $flowControlDetails
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setFlowControlDetails(\Api\StructType\ApiFlowControlDetailsType $flowControlDetails = null)
    {
        $this->FlowControlDetails = $flowControlDetails;
        return $this;
    }
    /**
     * Get DisplayControlDetails value
     * @return \Api\StructType\ApiDisplayControlDetailsType|null
     */
    public function getDisplayControlDetails()
    {
        return $this->DisplayControlDetails;
    }
    /**
     * Set DisplayControlDetails value
     * @param \Api\StructType\ApiDisplayControlDetailsType $displayControlDetails
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setDisplayControlDetails(\Api\StructType\ApiDisplayControlDetailsType $displayControlDetails = null)
    {
        $this->DisplayControlDetails = $displayControlDetails;
        return $this;
    }
    /**
     * Get ExternalPartnerTrackingDetails value
     * @return \Api\StructType\ApiExternalPartnerTrackingDetailsType|null
     */
    public function getExternalPartnerTrackingDetails()
    {
        return $this->ExternalPartnerTrackingDetails;
    }
    /**
     * Set ExternalPartnerTrackingDetails value
     * @param \Api\StructType\ApiExternalPartnerTrackingDetailsType $externalPartnerTrackingDetails
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setExternalPartnerTrackingDetails(\Api\StructType\ApiExternalPartnerTrackingDetailsType $externalPartnerTrackingDetails = null)
    {
        $this->ExternalPartnerTrackingDetails = $externalPartnerTrackingDetails;
        return $this;
    }
    /**
     * Get CoupledBuckets value
     * @return \Api\StructType\ApiCoupledBucketsType[]|null
     */
    public function getCoupledBuckets()
    {
        return $this->CoupledBuckets;
    }
    /**
     * This method is responsible for validating the values passed to the setCoupledBuckets method
     * This method is willingly generated in order to preserve the one-line inline validation within the setCoupledBuckets method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateCoupledBucketsForArrayConstraintsFromSetCoupledBuckets(array $values = array())
    {
        $message = '';
        $invalidValues = [];
        foreach ($values as $setExpressCheckoutRequestDetailsTypeCoupledBucketsItem) {
            // validation for constraint: itemType
            if (!$setExpressCheckoutRequestDetailsTypeCoupledBucketsItem instanceof \Api\StructType\ApiCoupledBucketsType) {
                $invalidValues[] = is_object($setExpressCheckoutRequestDetailsTypeCoupledBucketsItem) ? get_class($setExpressCheckoutRequestDetailsTypeCoupledBucketsItem) : sprintf('%s(%s)', gettype($setExpressCheckoutRequestDetailsTypeCoupledBucketsItem), var_export($setExpressCheckoutRequestDetailsTypeCoupledBucketsItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The CoupledBuckets property can only contain items of type \Api\StructType\ApiCoupledBucketsType, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        return $message;
    }
    /**
     * Set CoupledBuckets value
     * @throws \InvalidArgumentException
     * @param \Api\StructType\ApiCoupledBucketsType[] $coupledBuckets
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function setCoupledBuckets(array $coupledBuckets = array())
    {
        // validation for constraint: array
        if ('' !== ($coupledBucketsArrayErrorMessage = self::validateCoupledBucketsForArrayConstraintsFromSetCoupledBuckets($coupledBuckets))) {
            throw new \InvalidArgumentException($coupledBucketsArrayErrorMessage, __LINE__);
        }
        // validation for constraint: maxOccurs(5)
        if (is_array($coupledBuckets) && count($coupledBuckets) > 5) {
            throw new \InvalidArgumentException(sprintf('Invalid count of %s, the number of elements contained by the property must be less than or equal to 5', count($coupledBuckets)), __LINE__);
        }
        $this->CoupledBuckets = $coupledBuckets;
        return $this;
    }
    /**
     * Add item to CoupledBuckets value
     * @throws \InvalidArgumentException
     * @param \Api\StructType\ApiCoupledBucketsType $item
     * @return \Api\StructType\ApiSetExpressCheckoutRequestDetailsType
     */
    public function addToCoupledBuckets(\Api\StructType\ApiCoupledBucketsType $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \Api\StructType\ApiCoupledBucketsType) {
            throw new \InvalidArgumentException(sprintf('The CoupledBuckets property can only contain items of type \Api\StructType\ApiCoupledBucketsType, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        // validation for constraint: maxOccurs(5)
        if (is_array($this->CoupledBuckets) && count($this->CoupledBuckets) >= 5) {
            throw new \InvalidArgumentException(sprintf('You can\'t add anymore element to this property that already contains %s elements, the number of elements contained by the property must be less than or equal to 5', count($this->CoupledBuckets)), __LINE__);
        }
        $this->CoupledBuckets[] = $item;
        return $this;
    }
}
