<?php

namespace Api\ServiceType;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for all operations
 * @package Api
 * @subpackage Services
 * @release 1.1.0
 */
class ApiService extends AbstractSoapClientBase
{
    /**
     * Sets the RequesterCredentials SoapHeader param
     * @uses AbstractSoapClientBase::setSoapHeader()
     * @param \Api\StructType\ApiCustomSecurityHeaderType $requesterCredentials
     * @param string $nameSpace
     * @param bool $mustUnderstand
     * @param string $actor
     * @return bool
     */
    public function setSoapHeaderRequesterCredentials(\Api\StructType\ApiCustomSecurityHeaderType $requesterCredentials, $nameSpace = 'urn:ebay:api:PayPalAPI', $mustUnderstand = false, $actor = null)
    {
        return $this->setSoapHeader($nameSpace, 'RequesterCredentials', $requesterCredentials, $mustUnderstand, $actor);
    }
    /**
     * Method to call the operation originally named RefundTransaction
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiRefundTransactionReq $refundTransactionRequest
     * @return \Api\StructType\ApiRefundTransactionResponseType|bool
     */
    public function RefundTransaction(\Api\StructType\ApiRefundTransactionReq $refundTransactionRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->RefundTransaction($refundTransactionRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named InitiateRecoup
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiInitiateRecoupReq $initiateRecoupRequest
     * @return \Api\StructType\ApiInitiateRecoupResponseType|bool
     */
    public function InitiateRecoup(\Api\StructType\ApiInitiateRecoupReq $initiateRecoupRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->InitiateRecoup($initiateRecoupRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named CompleteRecoup
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiCompleteRecoupReq $completeRecoupRequest
     * @return \Api\StructType\ApiCompleteRecoupResponseType|bool
     */
    public function CompleteRecoup(\Api\StructType\ApiCompleteRecoupReq $completeRecoupRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->CompleteRecoup($completeRecoupRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named CancelRecoup
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiCancelRecoupReq $cancelRecoupRequest
     * @return \Api\StructType\ApiCancelRecoupResponseType|bool
     */
    public function CancelRecoup(\Api\StructType\ApiCancelRecoupReq $cancelRecoupRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->CancelRecoup($cancelRecoupRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetTransactionDetails
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiGetTransactionDetailsReq $getTransactionDetailsRequest
     * @return \Api\StructType\ApiGetTransactionDetailsResponseType|bool
     */
    public function GetTransactionDetails(\Api\StructType\ApiGetTransactionDetailsReq $getTransactionDetailsRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->GetTransactionDetails($getTransactionDetailsRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named BMCreateButton
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiBMCreateButtonReq $bMCreateButtonRequest
     * @return \Api\StructType\ApiBMCreateButtonResponseType|bool
     */
    public function BMCreateButton(\Api\StructType\ApiBMCreateButtonReq $bMCreateButtonRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->BMCreateButton($bMCreateButtonRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named BMUpdateButton
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiBMUpdateButtonReq $bMUpdateButtonRequest
     * @return \Api\StructType\ApiBMUpdateButtonResponseType|bool
     */
    public function BMUpdateButton(\Api\StructType\ApiBMUpdateButtonReq $bMUpdateButtonRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->BMUpdateButton($bMUpdateButtonRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named BMSetInventory
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiBMSetInventoryReq $bMSetInventoryRequest
     * @return \Api\StructType\ApiBMSetInventoryResponseType|bool
     */
    public function BMSetInventory(\Api\StructType\ApiBMSetInventoryReq $bMSetInventoryRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->BMSetInventory($bMSetInventoryRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named BMGetButtonDetails
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiBMGetButtonDetailsReq $bMGetButtonDetailsRequest
     * @return \Api\StructType\ApiBMGetButtonDetailsResponseType|bool
     */
    public function BMGetButtonDetails(\Api\StructType\ApiBMGetButtonDetailsReq $bMGetButtonDetailsRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->BMGetButtonDetails($bMGetButtonDetailsRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named BMGetInventory
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiBMGetInventoryReq $bMGetInventoryRequest
     * @return \Api\StructType\ApiBMGetInventoryResponseType|bool
     */
    public function BMGetInventory(\Api\StructType\ApiBMGetInventoryReq $bMGetInventoryRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->BMGetInventory($bMGetInventoryRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named BMManageButtonStatus
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiBMManageButtonStatusReq $bMManageButtonStatusRequest
     * @return \Api\StructType\ApiBMManageButtonStatusResponseType|bool
     */
    public function BMManageButtonStatus(\Api\StructType\ApiBMManageButtonStatusReq $bMManageButtonStatusRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->BMManageButtonStatus($bMManageButtonStatusRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named BMButtonSearch
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiBMButtonSearchReq $bMButtonSearchRequest
     * @return \Api\StructType\ApiBMButtonSearchResponseType|bool
     */
    public function BMButtonSearch(\Api\StructType\ApiBMButtonSearchReq $bMButtonSearchRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->BMButtonSearch($bMButtonSearchRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named BillUser
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiBillUserReq $billUserRequest
     * @return \Api\StructType\ApiBillUserResponseType|bool
     */
    public function BillUser(\Api\StructType\ApiBillUserReq $billUserRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->BillUser($billUserRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named TransactionSearch
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiTransactionSearchReq $transactionSearchRequest
     * @return \Api\StructType\ApiTransactionSearchResponseType|bool
     */
    public function TransactionSearch(\Api\StructType\ApiTransactionSearchReq $transactionSearchRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->TransactionSearch($transactionSearchRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named MassPay
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiMassPayReq $massPayRequest
     * @return \Api\StructType\ApiMassPayResponseType|bool
     */
    public function MassPay(\Api\StructType\ApiMassPayReq $massPayRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->MassPay($massPayRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named BillAgreementUpdate
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiBillAgreementUpdateReq $billAgreementUpdateRequest
     * @return \Api\StructType\ApiBAUpdateResponseType|bool
     */
    public function BillAgreementUpdate(\Api\StructType\ApiBillAgreementUpdateReq $billAgreementUpdateRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->BillAgreementUpdate($billAgreementUpdateRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named AddressVerify
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiAddressVerifyReq $addressVerifyRequest
     * @return \Api\StructType\ApiAddressVerifyResponseType|bool
     */
    public function AddressVerify(\Api\StructType\ApiAddressVerifyReq $addressVerifyRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->AddressVerify($addressVerifyRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named EnterBoarding
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiEnterBoardingReq $enterBoardingRequest
     * @return \Api\StructType\ApiEnterBoardingResponseType|bool
     */
    public function EnterBoarding(\Api\StructType\ApiEnterBoardingReq $enterBoardingRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->EnterBoarding($enterBoardingRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetBoardingDetails
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiGetBoardingDetailsReq $getBoardingDetailsRequest
     * @return \Api\StructType\ApiGetBoardingDetailsResponseType|bool
     */
    public function GetBoardingDetails(\Api\StructType\ApiGetBoardingDetailsReq $getBoardingDetailsRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->GetBoardingDetails($getBoardingDetailsRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named CreateMobilePayment
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiCreateMobilePaymentReq $createMobilePaymentRequest
     * @return \Api\StructType\ApiCreateMobilePaymentResponseType|bool
     */
    public function CreateMobilePayment(\Api\StructType\ApiCreateMobilePaymentReq $createMobilePaymentRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->CreateMobilePayment($createMobilePaymentRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetMobileStatus
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiGetMobileStatusReq $getMobileStatusRequest
     * @return \Api\StructType\ApiGetMobileStatusResponseType|bool
     */
    public function GetMobileStatus(\Api\StructType\ApiGetMobileStatusReq $getMobileStatusRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->GetMobileStatus($getMobileStatusRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named SetMobileCheckout
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiSetMobileCheckoutReq $setMobileCheckoutRequest
     * @return \Api\StructType\ApiSetMobileCheckoutResponseType|bool
     */
    public function SetMobileCheckout(\Api\StructType\ApiSetMobileCheckoutReq $setMobileCheckoutRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->SetMobileCheckout($setMobileCheckoutRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoMobileCheckoutPayment
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiDoMobileCheckoutPaymentReq $doMobileCheckoutPaymentRequest
     * @return \Api\StructType\ApiDoMobileCheckoutPaymentResponseType|bool
     */
    public function DoMobileCheckoutPayment(\Api\StructType\ApiDoMobileCheckoutPaymentReq $doMobileCheckoutPaymentRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->DoMobileCheckoutPayment($doMobileCheckoutPaymentRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetBalance
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiGetBalanceReq $getBalanceRequest
     * @return \Api\StructType\ApiGetBalanceResponseType|bool
     */
    public function GetBalance(\Api\StructType\ApiGetBalanceReq $getBalanceRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->GetBalance($getBalanceRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetPalDetails
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiGetPalDetailsReq $getPalDetailsRequest
     * @return \Api\StructType\ApiGetPalDetailsResponseType|bool
     */
    public function GetPalDetails(\Api\StructType\ApiGetPalDetailsReq $getPalDetailsRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->GetPalDetails($getPalDetailsRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoExpressCheckoutPayment
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiDoExpressCheckoutPaymentReq $doExpressCheckoutPaymentRequest
     * @return \Api\StructType\ApiDoExpressCheckoutPaymentResponseType|bool
     */
    public function DoExpressCheckoutPayment(\Api\StructType\ApiDoExpressCheckoutPaymentReq $doExpressCheckoutPaymentRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->DoExpressCheckoutPayment($doExpressCheckoutPaymentRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoUATPExpressCheckoutPayment
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiDoUATPExpressCheckoutPaymentReq $doUATPExpressCheckoutPaymentRequest
     * @return \Api\StructType\ApiDoUATPExpressCheckoutPaymentResponseType|bool
     */
    public function DoUATPExpressCheckoutPayment(\Api\StructType\ApiDoUATPExpressCheckoutPaymentReq $doUATPExpressCheckoutPaymentRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->DoUATPExpressCheckoutPayment($doUATPExpressCheckoutPaymentRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named SetAuthFlowParam
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiSetAuthFlowParamReq $setAuthFlowParamRequest
     * @return \Api\StructType\ApiSetAuthFlowParamResponseType|bool
     */
    public function SetAuthFlowParam(\Api\StructType\ApiSetAuthFlowParamReq $setAuthFlowParamRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->SetAuthFlowParam($setAuthFlowParamRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetAuthDetails
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiGetAuthDetailsReq $getAuthDetailsRequest
     * @return \Api\StructType\ApiGetAuthDetailsResponseType|bool
     */
    public function GetAuthDetails(\Api\StructType\ApiGetAuthDetailsReq $getAuthDetailsRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->GetAuthDetails($getAuthDetailsRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named SetAccessPermissions
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiSetAccessPermissionsReq $setAccessPermissionsRequest
     * @return \Api\StructType\ApiSetAccessPermissionsResponseType|bool
     */
    public function SetAccessPermissions(\Api\StructType\ApiSetAccessPermissionsReq $setAccessPermissionsRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->SetAccessPermissions($setAccessPermissionsRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named UpdateAccessPermissions
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiUpdateAccessPermissionsReq $updateAccessPermissionsRequest
     * @return \Api\StructType\ApiUpdateAccessPermissionsResponseType|bool
     */
    public function UpdateAccessPermissions(\Api\StructType\ApiUpdateAccessPermissionsReq $updateAccessPermissionsRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->UpdateAccessPermissions($updateAccessPermissionsRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetAccessPermissionDetails
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiGetAccessPermissionDetailsReq $getAccessPermissionDetailsRequest
     * @return \Api\StructType\ApiGetAccessPermissionDetailsResponseType|bool
     */
    public function GetAccessPermissionDetails(\Api\StructType\ApiGetAccessPermissionDetailsReq $getAccessPermissionDetailsRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->GetAccessPermissionDetails($getAccessPermissionDetailsRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetIncentiveEvaluation
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiGetIncentiveEvaluationReq $getIncentiveEvaluationRequest
     * @return \Api\StructType\ApiGetIncentiveEvaluationResponseType|bool
     */
    public function GetIncentiveEvaluation(\Api\StructType\ApiGetIncentiveEvaluationReq $getIncentiveEvaluationRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->GetIncentiveEvaluation($getIncentiveEvaluationRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named SetExpressCheckout
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiSetExpressCheckoutReq $setExpressCheckoutRequest
     * @return \Api\StructType\ApiSetExpressCheckoutResponseType|bool
     */
    public function SetExpressCheckout(\Api\StructType\ApiSetExpressCheckoutReq $setExpressCheckoutRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->SetExpressCheckout($setExpressCheckoutRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ExecuteCheckoutOperations
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiExecuteCheckoutOperationsReq $executeCheckoutOperationsRequest
     * @return \Api\StructType\ApiExecuteCheckoutOperationsResponseType|bool
     */
    public function ExecuteCheckoutOperations(\Api\StructType\ApiExecuteCheckoutOperationsReq $executeCheckoutOperationsRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->ExecuteCheckoutOperations($executeCheckoutOperationsRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetExpressCheckoutDetails
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiGetExpressCheckoutDetailsReq $getExpressCheckoutDetailsRequest
     * @return \Api\StructType\ApiGetExpressCheckoutDetailsResponseType|bool
     */
    public function GetExpressCheckoutDetails(\Api\StructType\ApiGetExpressCheckoutDetailsReq $getExpressCheckoutDetailsRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->GetExpressCheckoutDetails($getExpressCheckoutDetailsRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoDirectPayment
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiDoDirectPaymentReq $doDirectPaymentRequest
     * @return \Api\StructType\ApiDoDirectPaymentResponseType|bool
     */
    public function DoDirectPayment(\Api\StructType\ApiDoDirectPaymentReq $doDirectPaymentRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->DoDirectPayment($doDirectPaymentRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ManagePendingTransactionStatus
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiManagePendingTransactionStatusReq $managePendingTransactionStatusRequest
     * @return \Api\StructType\ApiManagePendingTransactionStatusResponseType|bool
     */
    public function ManagePendingTransactionStatus(\Api\StructType\ApiManagePendingTransactionStatusReq $managePendingTransactionStatusRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->ManagePendingTransactionStatus($managePendingTransactionStatusRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoCancel
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiDoCancelReq $doCancelRequest
     * @return \Api\StructType\ApiDoCancelResponseType|bool
     */
    public function DoCancel(\Api\StructType\ApiDoCancelReq $doCancelRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->DoCancel($doCancelRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoCapture
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiDoCaptureReq $doCaptureRequest
     * @return \Api\StructType\ApiDoCaptureResponseType|bool
     */
    public function DoCapture(\Api\StructType\ApiDoCaptureReq $doCaptureRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->DoCapture($doCaptureRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoReauthorization
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiDoReauthorizationReq $doReauthorizationRequest
     * @return \Api\StructType\ApiDoReauthorizationResponseType|bool
     */
    public function DoReauthorization(\Api\StructType\ApiDoReauthorizationReq $doReauthorizationRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->DoReauthorization($doReauthorizationRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoVoid
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiDoVoidReq $doVoidRequest
     * @return \Api\StructType\ApiDoVoidResponseType|bool
     */
    public function DoVoid(\Api\StructType\ApiDoVoidReq $doVoidRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->DoVoid($doVoidRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoAuthorization
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiDoAuthorizationReq $doAuthorizationRequest
     * @return \Api\StructType\ApiDoAuthorizationResponseType|bool
     */
    public function DoAuthorization(\Api\StructType\ApiDoAuthorizationReq $doAuthorizationRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->DoAuthorization($doAuthorizationRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named UpdateAuthorization
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiUpdateAuthorizationReq $updateAuthorizationRequest
     * @return \Api\StructType\ApiUpdateAuthorizationResponseType|bool
     */
    public function UpdateAuthorization(\Api\StructType\ApiUpdateAuthorizationReq $updateAuthorizationRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->UpdateAuthorization($updateAuthorizationRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoUATPAuthorization
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiDoUATPAuthorizationReq $doUATPAuthorizationRequest
     * @return \Api\StructType\ApiDoUATPAuthorizationResponseType|bool
     */
    public function DoUATPAuthorization(\Api\StructType\ApiDoUATPAuthorizationReq $doUATPAuthorizationRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->DoUATPAuthorization($doUATPAuthorizationRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named SetCustomerBillingAgreement
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiSetCustomerBillingAgreementReq $setCustomerBillingAgreementRequest
     * @return \Api\StructType\ApiSetCustomerBillingAgreementResponseType|bool
     */
    public function SetCustomerBillingAgreement(\Api\StructType\ApiSetCustomerBillingAgreementReq $setCustomerBillingAgreementRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->SetCustomerBillingAgreement($setCustomerBillingAgreementRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetBillingAgreementCustomerDetails
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiGetBillingAgreementCustomerDetailsReq $getBillingAgreementCustomerDetailsRequest
     * @return \Api\StructType\ApiGetBillingAgreementCustomerDetailsResponseType|bool
     */
    public function GetBillingAgreementCustomerDetails(\Api\StructType\ApiGetBillingAgreementCustomerDetailsReq $getBillingAgreementCustomerDetailsRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->GetBillingAgreementCustomerDetails($getBillingAgreementCustomerDetailsRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named CreateBillingAgreement
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiCreateBillingAgreementReq $createBillingAgreementRequest
     * @return \Api\StructType\ApiCreateBillingAgreementResponseType|bool
     */
    public function CreateBillingAgreement(\Api\StructType\ApiCreateBillingAgreementReq $createBillingAgreementRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->CreateBillingAgreement($createBillingAgreementRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoReferenceTransaction
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiDoReferenceTransactionReq $doReferenceTransactionRequest
     * @return \Api\StructType\ApiDoReferenceTransactionResponseType|bool
     */
    public function DoReferenceTransaction(\Api\StructType\ApiDoReferenceTransactionReq $doReferenceTransactionRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->DoReferenceTransaction($doReferenceTransactionRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named CreateRecurringPaymentsProfile
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiCreateRecurringPaymentsProfileReq $createRecurringPaymentsProfileRequest
     * @return \Api\StructType\ApiCreateRecurringPaymentsProfileResponseType|bool
     */
    public function CreateRecurringPaymentsProfile(\Api\StructType\ApiCreateRecurringPaymentsProfileReq $createRecurringPaymentsProfileRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->CreateRecurringPaymentsProfile($createRecurringPaymentsProfileRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetRecurringPaymentsProfileDetails
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiGetRecurringPaymentsProfileDetailsReq $getRecurringPaymentsProfileDetailsRequest
     * @return \Api\StructType\ApiGetRecurringPaymentsProfileDetailsResponseType|bool
     */
    public function GetRecurringPaymentsProfileDetails(\Api\StructType\ApiGetRecurringPaymentsProfileDetailsReq $getRecurringPaymentsProfileDetailsRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->GetRecurringPaymentsProfileDetails($getRecurringPaymentsProfileDetailsRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ManageRecurringPaymentsProfileStatus
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiManageRecurringPaymentsProfileStatusReq $manageRecurringPaymentsProfileStatusRequest
     * @return \Api\StructType\ApiManageRecurringPaymentsProfileStatusResponseType|bool
     */
    public function ManageRecurringPaymentsProfileStatus(\Api\StructType\ApiManageRecurringPaymentsProfileStatusReq $manageRecurringPaymentsProfileStatusRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->ManageRecurringPaymentsProfileStatus($manageRecurringPaymentsProfileStatusRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named BillOutstandingAmount
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiBillOutstandingAmountReq $billOutstandingAmountRequest
     * @return \Api\StructType\ApiBillOutstandingAmountResponseType|bool
     */
    public function BillOutstandingAmount(\Api\StructType\ApiBillOutstandingAmountReq $billOutstandingAmountRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->BillOutstandingAmount($billOutstandingAmountRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named UpdateRecurringPaymentsProfile
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiUpdateRecurringPaymentsProfileReq $updateRecurringPaymentsProfileRequest
     * @return \Api\StructType\ApiUpdateRecurringPaymentsProfileResponseType|bool
     */
    public function UpdateRecurringPaymentsProfile(\Api\StructType\ApiUpdateRecurringPaymentsProfileReq $updateRecurringPaymentsProfileRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->UpdateRecurringPaymentsProfile($updateRecurringPaymentsProfileRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoNonReferencedCredit
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiDoNonReferencedCreditReq $doNonReferencedCreditRequest
     * @return \Api\StructType\ApiDoNonReferencedCreditResponseType|bool
     */
    public function DoNonReferencedCredit(\Api\StructType\ApiDoNonReferencedCreditReq $doNonReferencedCreditRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->DoNonReferencedCredit($doNonReferencedCreditRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReverseTransaction
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiReverseTransactionReq $reverseTransactionRequest
     * @return \Api\StructType\ApiReverseTransactionResponseType|bool
     */
    public function ReverseTransaction(\Api\StructType\ApiReverseTransactionReq $reverseTransactionRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->ReverseTransaction($reverseTransactionRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ExternalRememberMeOptOut
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \Api\StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiExternalRememberMeOptOutReq $externalRememberMeOptOutRequest
     * @return \Api\StructType\ApiExternalRememberMeOptOutResponseType|bool
     */
    public function ExternalRememberMeOptOut(\Api\StructType\ApiExternalRememberMeOptOutReq $externalRememberMeOptOutRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->ExternalRememberMeOptOut($externalRememberMeOptOutRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \Api\StructType\ApiAddressVerifyResponseType|\Api\StructType\ApiBAUpdateResponseType|\Api\StructType\ApiBillOutstandingAmountResponseType|\Api\StructType\ApiBillUserResponseType|\Api\StructType\ApiBMButtonSearchResponseType|\Api\StructType\ApiBMCreateButtonResponseType|\Api\StructType\ApiBMGetButtonDetailsResponseType|\Api\StructType\ApiBMGetInventoryResponseType|\Api\StructType\ApiBMManageButtonStatusResponseType|\Api\StructType\ApiBMSetInventoryResponseType|\Api\StructType\ApiBMUpdateButtonResponseType|\Api\StructType\ApiCancelRecoupResponseType|\Api\StructType\ApiCompleteRecoupResponseType|\Api\StructType\ApiCreateBillingAgreementResponseType|\Api\StructType\ApiCreateMobilePaymentResponseType|\Api\StructType\ApiCreateRecurringPaymentsProfileResponseType|\Api\StructType\ApiDoAuthorizationResponseType|\Api\StructType\ApiDoCancelResponseType|\Api\StructType\ApiDoCaptureResponseType|\Api\StructType\ApiDoDirectPaymentResponseType|\Api\StructType\ApiDoExpressCheckoutPaymentResponseType|\Api\StructType\ApiDoMobileCheckoutPaymentResponseType|\Api\StructType\ApiDoNonReferencedCreditResponseType|\Api\StructType\ApiDoReauthorizationResponseType|\Api\StructType\ApiDoReferenceTransactionResponseType|\Api\StructType\ApiDoUATPAuthorizationResponseType|\Api\StructType\ApiDoUATPExpressCheckoutPaymentResponseType|\Api\StructType\ApiDoVoidResponseType|\Api\StructType\ApiEnterBoardingResponseType|\Api\StructType\ApiExecuteCheckoutOperationsResponseType|\Api\StructType\ApiExternalRememberMeOptOutResponseType|\Api\StructType\ApiGetAccessPermissionDetailsResponseType|\Api\StructType\ApiGetAuthDetailsResponseType|\Api\StructType\ApiGetBalanceResponseType|\Api\StructType\ApiGetBillingAgreementCustomerDetailsResponseType|\Api\StructType\ApiGetBoardingDetailsResponseType|\Api\StructType\ApiGetExpressCheckoutDetailsResponseType|\Api\StructType\ApiGetIncentiveEvaluationResponseType|\Api\StructType\ApiGetMobileStatusResponseType|\Api\StructType\ApiGetPalDetailsResponseType|\Api\StructType\ApiGetRecurringPaymentsProfileDetailsResponseType|\Api\StructType\ApiGetTransactionDetailsResponseType|\Api\StructType\ApiInitiateRecoupResponseType|\Api\StructType\ApiManagePendingTransactionStatusResponseType|\Api\StructType\ApiManageRecurringPaymentsProfileStatusResponseType|\Api\StructType\ApiMassPayResponseType|\Api\StructType\ApiRefundTransactionResponseType|\Api\StructType\ApiReverseTransactionResponseType|\Api\StructType\ApiSetAccessPermissionsResponseType|\Api\StructType\ApiSetAuthFlowParamResponseType|\Api\StructType\ApiSetCustomerBillingAgreementResponseType|\Api\StructType\ApiSetExpressCheckoutResponseType|\Api\StructType\ApiSetMobileCheckoutResponseType|\Api\StructType\ApiTransactionSearchResponseType|\Api\StructType\ApiUpdateAccessPermissionsResponseType|\Api\StructType\ApiUpdateAuthorizationResponseType|\Api\StructType\ApiUpdateRecurringPaymentsProfileResponseType
     */
    public function getResult()
    {
        return parent::getResult();
    }
}
