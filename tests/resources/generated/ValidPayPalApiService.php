<?php

declare(strict_types=1);

namespace ServiceType;

use SoapFault;
use WsdlToPhp\PackageBase\AbstractSoapClientBase;

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
     * @param \StructType\ApiCustomSecurityHeaderType $requesterCredentials
     * @param string $namespace
     * @param bool $mustUnderstand
     * @param string|null $actor
     * @return \ServiceType\ApiService
     */
    public function setSoapHeaderRequesterCredentials(\StructType\ApiCustomSecurityHeaderType $requesterCredentials, string $namespace = 'urn:ebay:api:PayPalAPI', bool $mustUnderstand = false, ?string $actor = null): self
    {
        return $this->setSoapHeader($namespace, 'RequesterCredentials', $requesterCredentials, $mustUnderstand, $actor);
    }
    /**
     * Method to call the operation originally named RefundTransaction
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiRefundTransactionReq $refundTransactionRequest
     * @return \StructType\ApiRefundTransactionResponseType|bool
     */
    public function RefundTransaction(\StructType\ApiRefundTransactionReq $refundTransactionRequest)
    {
        try {
            $this->setResult($resultRefundTransaction = $this->getSoapClient()->__soapCall('RefundTransaction', [
                $refundTransactionRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultRefundTransaction;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named InitiateRecoup
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiInitiateRecoupReq $initiateRecoupRequest
     * @return \StructType\ApiInitiateRecoupResponseType|bool
     */
    public function InitiateRecoup(\StructType\ApiInitiateRecoupReq $initiateRecoupRequest)
    {
        try {
            $this->setResult($resultInitiateRecoup = $this->getSoapClient()->__soapCall('InitiateRecoup', [
                $initiateRecoupRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultInitiateRecoup;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named CompleteRecoup
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiCompleteRecoupReq $completeRecoupRequest
     * @return \StructType\ApiCompleteRecoupResponseType|bool
     */
    public function CompleteRecoup(\StructType\ApiCompleteRecoupReq $completeRecoupRequest)
    {
        try {
            $this->setResult($resultCompleteRecoup = $this->getSoapClient()->__soapCall('CompleteRecoup', [
                $completeRecoupRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultCompleteRecoup;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named CancelRecoup
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiCancelRecoupReq $cancelRecoupRequest
     * @return \StructType\ApiCancelRecoupResponseType|bool
     */
    public function CancelRecoup(\StructType\ApiCancelRecoupReq $cancelRecoupRequest)
    {
        try {
            $this->setResult($resultCancelRecoup = $this->getSoapClient()->__soapCall('CancelRecoup', [
                $cancelRecoupRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultCancelRecoup;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetTransactionDetails
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiGetTransactionDetailsReq $getTransactionDetailsRequest
     * @return \StructType\ApiGetTransactionDetailsResponseType|bool
     */
    public function GetTransactionDetails(\StructType\ApiGetTransactionDetailsReq $getTransactionDetailsRequest)
    {
        try {
            $this->setResult($resultGetTransactionDetails = $this->getSoapClient()->__soapCall('GetTransactionDetails', [
                $getTransactionDetailsRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultGetTransactionDetails;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named BMCreateButton
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiBMCreateButtonReq $bMCreateButtonRequest
     * @return \StructType\ApiBMCreateButtonResponseType|bool
     */
    public function BMCreateButton(\StructType\ApiBMCreateButtonReq $bMCreateButtonRequest)
    {
        try {
            $this->setResult($resultBMCreateButton = $this->getSoapClient()->__soapCall('BMCreateButton', [
                $bMCreateButtonRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultBMCreateButton;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named BMUpdateButton
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiBMUpdateButtonReq $bMUpdateButtonRequest
     * @return \StructType\ApiBMUpdateButtonResponseType|bool
     */
    public function BMUpdateButton(\StructType\ApiBMUpdateButtonReq $bMUpdateButtonRequest)
    {
        try {
            $this->setResult($resultBMUpdateButton = $this->getSoapClient()->__soapCall('BMUpdateButton', [
                $bMUpdateButtonRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultBMUpdateButton;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named BMSetInventory
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiBMSetInventoryReq $bMSetInventoryRequest
     * @return \StructType\ApiBMSetInventoryResponseType|bool
     */
    public function BMSetInventory(\StructType\ApiBMSetInventoryReq $bMSetInventoryRequest)
    {
        try {
            $this->setResult($resultBMSetInventory = $this->getSoapClient()->__soapCall('BMSetInventory', [
                $bMSetInventoryRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultBMSetInventory;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named BMGetButtonDetails
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiBMGetButtonDetailsReq $bMGetButtonDetailsRequest
     * @return \StructType\ApiBMGetButtonDetailsResponseType|bool
     */
    public function BMGetButtonDetails(\StructType\ApiBMGetButtonDetailsReq $bMGetButtonDetailsRequest)
    {
        try {
            $this->setResult($resultBMGetButtonDetails = $this->getSoapClient()->__soapCall('BMGetButtonDetails', [
                $bMGetButtonDetailsRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultBMGetButtonDetails;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named BMGetInventory
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiBMGetInventoryReq $bMGetInventoryRequest
     * @return \StructType\ApiBMGetInventoryResponseType|bool
     */
    public function BMGetInventory(\StructType\ApiBMGetInventoryReq $bMGetInventoryRequest)
    {
        try {
            $this->setResult($resultBMGetInventory = $this->getSoapClient()->__soapCall('BMGetInventory', [
                $bMGetInventoryRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultBMGetInventory;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named BMManageButtonStatus
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiBMManageButtonStatusReq $bMManageButtonStatusRequest
     * @return \StructType\ApiBMManageButtonStatusResponseType|bool
     */
    public function BMManageButtonStatus(\StructType\ApiBMManageButtonStatusReq $bMManageButtonStatusRequest)
    {
        try {
            $this->setResult($resultBMManageButtonStatus = $this->getSoapClient()->__soapCall('BMManageButtonStatus', [
                $bMManageButtonStatusRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultBMManageButtonStatus;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named BMButtonSearch
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiBMButtonSearchReq $bMButtonSearchRequest
     * @return \StructType\ApiBMButtonSearchResponseType|bool
     */
    public function BMButtonSearch(\StructType\ApiBMButtonSearchReq $bMButtonSearchRequest)
    {
        try {
            $this->setResult($resultBMButtonSearch = $this->getSoapClient()->__soapCall('BMButtonSearch', [
                $bMButtonSearchRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultBMButtonSearch;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named BillUser
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiBillUserReq $billUserRequest
     * @return \StructType\ApiBillUserResponseType|bool
     */
    public function BillUser(\StructType\ApiBillUserReq $billUserRequest)
    {
        try {
            $this->setResult($resultBillUser = $this->getSoapClient()->__soapCall('BillUser', [
                $billUserRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultBillUser;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named TransactionSearch
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiTransactionSearchReq $transactionSearchRequest
     * @return \StructType\ApiTransactionSearchResponseType|bool
     */
    public function TransactionSearch(\StructType\ApiTransactionSearchReq $transactionSearchRequest)
    {
        try {
            $this->setResult($resultTransactionSearch = $this->getSoapClient()->__soapCall('TransactionSearch', [
                $transactionSearchRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultTransactionSearch;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named MassPay
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiMassPayReq $massPayRequest
     * @return \StructType\ApiMassPayResponseType|bool
     */
    public function MassPay(\StructType\ApiMassPayReq $massPayRequest)
    {
        try {
            $this->setResult($resultMassPay = $this->getSoapClient()->__soapCall('MassPay', [
                $massPayRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultMassPay;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named BillAgreementUpdate
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiBillAgreementUpdateReq $billAgreementUpdateRequest
     * @return \StructType\ApiBAUpdateResponseType|bool
     */
    public function BillAgreementUpdate(\StructType\ApiBillAgreementUpdateReq $billAgreementUpdateRequest)
    {
        try {
            $this->setResult($resultBillAgreementUpdate = $this->getSoapClient()->__soapCall('BillAgreementUpdate', [
                $billAgreementUpdateRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultBillAgreementUpdate;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named AddressVerify
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiAddressVerifyReq $addressVerifyRequest
     * @return \StructType\ApiAddressVerifyResponseType|bool
     */
    public function AddressVerify(\StructType\ApiAddressVerifyReq $addressVerifyRequest)
    {
        try {
            $this->setResult($resultAddressVerify = $this->getSoapClient()->__soapCall('AddressVerify', [
                $addressVerifyRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultAddressVerify;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named EnterBoarding
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiEnterBoardingReq $enterBoardingRequest
     * @return \StructType\ApiEnterBoardingResponseType|bool
     */
    public function EnterBoarding(\StructType\ApiEnterBoardingReq $enterBoardingRequest)
    {
        try {
            $this->setResult($resultEnterBoarding = $this->getSoapClient()->__soapCall('EnterBoarding', [
                $enterBoardingRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultEnterBoarding;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetBoardingDetails
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiGetBoardingDetailsReq $getBoardingDetailsRequest
     * @return \StructType\ApiGetBoardingDetailsResponseType|bool
     */
    public function GetBoardingDetails(\StructType\ApiGetBoardingDetailsReq $getBoardingDetailsRequest)
    {
        try {
            $this->setResult($resultGetBoardingDetails = $this->getSoapClient()->__soapCall('GetBoardingDetails', [
                $getBoardingDetailsRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultGetBoardingDetails;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named CreateMobilePayment
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiCreateMobilePaymentReq $createMobilePaymentRequest
     * @return \StructType\ApiCreateMobilePaymentResponseType|bool
     */
    public function CreateMobilePayment(\StructType\ApiCreateMobilePaymentReq $createMobilePaymentRequest)
    {
        try {
            $this->setResult($resultCreateMobilePayment = $this->getSoapClient()->__soapCall('CreateMobilePayment', [
                $createMobilePaymentRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultCreateMobilePayment;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetMobileStatus
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiGetMobileStatusReq $getMobileStatusRequest
     * @return \StructType\ApiGetMobileStatusResponseType|bool
     */
    public function GetMobileStatus(\StructType\ApiGetMobileStatusReq $getMobileStatusRequest)
    {
        try {
            $this->setResult($resultGetMobileStatus = $this->getSoapClient()->__soapCall('GetMobileStatus', [
                $getMobileStatusRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultGetMobileStatus;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named SetMobileCheckout
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiSetMobileCheckoutReq $setMobileCheckoutRequest
     * @return \StructType\ApiSetMobileCheckoutResponseType|bool
     */
    public function SetMobileCheckout(\StructType\ApiSetMobileCheckoutReq $setMobileCheckoutRequest)
    {
        try {
            $this->setResult($resultSetMobileCheckout = $this->getSoapClient()->__soapCall('SetMobileCheckout', [
                $setMobileCheckoutRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultSetMobileCheckout;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoMobileCheckoutPayment
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiDoMobileCheckoutPaymentReq $doMobileCheckoutPaymentRequest
     * @return \StructType\ApiDoMobileCheckoutPaymentResponseType|bool
     */
    public function DoMobileCheckoutPayment(\StructType\ApiDoMobileCheckoutPaymentReq $doMobileCheckoutPaymentRequest)
    {
        try {
            $this->setResult($resultDoMobileCheckoutPayment = $this->getSoapClient()->__soapCall('DoMobileCheckoutPayment', [
                $doMobileCheckoutPaymentRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultDoMobileCheckoutPayment;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetBalance
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiGetBalanceReq $getBalanceRequest
     * @return \StructType\ApiGetBalanceResponseType|bool
     */
    public function GetBalance(\StructType\ApiGetBalanceReq $getBalanceRequest)
    {
        try {
            $this->setResult($resultGetBalance = $this->getSoapClient()->__soapCall('GetBalance', [
                $getBalanceRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultGetBalance;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetPalDetails
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiGetPalDetailsReq $getPalDetailsRequest
     * @return \StructType\ApiGetPalDetailsResponseType|bool
     */
    public function GetPalDetails(\StructType\ApiGetPalDetailsReq $getPalDetailsRequest)
    {
        try {
            $this->setResult($resultGetPalDetails = $this->getSoapClient()->__soapCall('GetPalDetails', [
                $getPalDetailsRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultGetPalDetails;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoExpressCheckoutPayment
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiDoExpressCheckoutPaymentReq $doExpressCheckoutPaymentRequest
     * @return \StructType\ApiDoExpressCheckoutPaymentResponseType|bool
     */
    public function DoExpressCheckoutPayment(\StructType\ApiDoExpressCheckoutPaymentReq $doExpressCheckoutPaymentRequest)
    {
        try {
            $this->setResult($resultDoExpressCheckoutPayment = $this->getSoapClient()->__soapCall('DoExpressCheckoutPayment', [
                $doExpressCheckoutPaymentRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultDoExpressCheckoutPayment;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoUATPExpressCheckoutPayment
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiDoUATPExpressCheckoutPaymentReq $doUATPExpressCheckoutPaymentRequest
     * @return \StructType\ApiDoUATPExpressCheckoutPaymentResponseType|bool
     */
    public function DoUATPExpressCheckoutPayment(\StructType\ApiDoUATPExpressCheckoutPaymentReq $doUATPExpressCheckoutPaymentRequest)
    {
        try {
            $this->setResult($resultDoUATPExpressCheckoutPayment = $this->getSoapClient()->__soapCall('DoUATPExpressCheckoutPayment', [
                $doUATPExpressCheckoutPaymentRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultDoUATPExpressCheckoutPayment;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named SetAuthFlowParam
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiSetAuthFlowParamReq $setAuthFlowParamRequest
     * @return \StructType\ApiSetAuthFlowParamResponseType|bool
     */
    public function SetAuthFlowParam(\StructType\ApiSetAuthFlowParamReq $setAuthFlowParamRequest)
    {
        try {
            $this->setResult($resultSetAuthFlowParam = $this->getSoapClient()->__soapCall('SetAuthFlowParam', [
                $setAuthFlowParamRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultSetAuthFlowParam;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetAuthDetails
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiGetAuthDetailsReq $getAuthDetailsRequest
     * @return \StructType\ApiGetAuthDetailsResponseType|bool
     */
    public function GetAuthDetails(\StructType\ApiGetAuthDetailsReq $getAuthDetailsRequest)
    {
        try {
            $this->setResult($resultGetAuthDetails = $this->getSoapClient()->__soapCall('GetAuthDetails', [
                $getAuthDetailsRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultGetAuthDetails;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named SetAccessPermissions
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiSetAccessPermissionsReq $setAccessPermissionsRequest
     * @return \StructType\ApiSetAccessPermissionsResponseType|bool
     */
    public function SetAccessPermissions(\StructType\ApiSetAccessPermissionsReq $setAccessPermissionsRequest)
    {
        try {
            $this->setResult($resultSetAccessPermissions = $this->getSoapClient()->__soapCall('SetAccessPermissions', [
                $setAccessPermissionsRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultSetAccessPermissions;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named UpdateAccessPermissions
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiUpdateAccessPermissionsReq $updateAccessPermissionsRequest
     * @return \StructType\ApiUpdateAccessPermissionsResponseType|bool
     */
    public function UpdateAccessPermissions(\StructType\ApiUpdateAccessPermissionsReq $updateAccessPermissionsRequest)
    {
        try {
            $this->setResult($resultUpdateAccessPermissions = $this->getSoapClient()->__soapCall('UpdateAccessPermissions', [
                $updateAccessPermissionsRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultUpdateAccessPermissions;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetAccessPermissionDetails
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiGetAccessPermissionDetailsReq $getAccessPermissionDetailsRequest
     * @return \StructType\ApiGetAccessPermissionDetailsResponseType|bool
     */
    public function GetAccessPermissionDetails(\StructType\ApiGetAccessPermissionDetailsReq $getAccessPermissionDetailsRequest)
    {
        try {
            $this->setResult($resultGetAccessPermissionDetails = $this->getSoapClient()->__soapCall('GetAccessPermissionDetails', [
                $getAccessPermissionDetailsRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultGetAccessPermissionDetails;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetIncentiveEvaluation
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiGetIncentiveEvaluationReq $getIncentiveEvaluationRequest
     * @return \StructType\ApiGetIncentiveEvaluationResponseType|bool
     */
    public function GetIncentiveEvaluation(\StructType\ApiGetIncentiveEvaluationReq $getIncentiveEvaluationRequest)
    {
        try {
            $this->setResult($resultGetIncentiveEvaluation = $this->getSoapClient()->__soapCall('GetIncentiveEvaluation', [
                $getIncentiveEvaluationRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultGetIncentiveEvaluation;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named SetExpressCheckout
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiSetExpressCheckoutReq $setExpressCheckoutRequest
     * @return \StructType\ApiSetExpressCheckoutResponseType|bool
     */
    public function SetExpressCheckout(\StructType\ApiSetExpressCheckoutReq $setExpressCheckoutRequest)
    {
        try {
            $this->setResult($resultSetExpressCheckout = $this->getSoapClient()->__soapCall('SetExpressCheckout', [
                $setExpressCheckoutRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultSetExpressCheckout;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ExecuteCheckoutOperations
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiExecuteCheckoutOperationsReq $executeCheckoutOperationsRequest
     * @return \StructType\ApiExecuteCheckoutOperationsResponseType|bool
     */
    public function ExecuteCheckoutOperations(\StructType\ApiExecuteCheckoutOperationsReq $executeCheckoutOperationsRequest)
    {
        try {
            $this->setResult($resultExecuteCheckoutOperations = $this->getSoapClient()->__soapCall('ExecuteCheckoutOperations', [
                $executeCheckoutOperationsRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultExecuteCheckoutOperations;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetExpressCheckoutDetails
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiGetExpressCheckoutDetailsReq $getExpressCheckoutDetailsRequest
     * @return \StructType\ApiGetExpressCheckoutDetailsResponseType|bool
     */
    public function GetExpressCheckoutDetails(\StructType\ApiGetExpressCheckoutDetailsReq $getExpressCheckoutDetailsRequest)
    {
        try {
            $this->setResult($resultGetExpressCheckoutDetails = $this->getSoapClient()->__soapCall('GetExpressCheckoutDetails', [
                $getExpressCheckoutDetailsRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultGetExpressCheckoutDetails;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoDirectPayment
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiDoDirectPaymentReq $doDirectPaymentRequest
     * @return \StructType\ApiDoDirectPaymentResponseType|bool
     */
    public function DoDirectPayment(\StructType\ApiDoDirectPaymentReq $doDirectPaymentRequest)
    {
        try {
            $this->setResult($resultDoDirectPayment = $this->getSoapClient()->__soapCall('DoDirectPayment', [
                $doDirectPaymentRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultDoDirectPayment;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ManagePendingTransactionStatus
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiManagePendingTransactionStatusReq $managePendingTransactionStatusRequest
     * @return \StructType\ApiManagePendingTransactionStatusResponseType|bool
     */
    public function ManagePendingTransactionStatus(\StructType\ApiManagePendingTransactionStatusReq $managePendingTransactionStatusRequest)
    {
        try {
            $this->setResult($resultManagePendingTransactionStatus = $this->getSoapClient()->__soapCall('ManagePendingTransactionStatus', [
                $managePendingTransactionStatusRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultManagePendingTransactionStatus;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoCancel
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiDoCancelReq $doCancelRequest
     * @return \StructType\ApiDoCancelResponseType|bool
     */
    public function DoCancel(\StructType\ApiDoCancelReq $doCancelRequest)
    {
        try {
            $this->setResult($resultDoCancel = $this->getSoapClient()->__soapCall('DoCancel', [
                $doCancelRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultDoCancel;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoCapture
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiDoCaptureReq $doCaptureRequest
     * @return \StructType\ApiDoCaptureResponseType|bool
     */
    public function DoCapture(\StructType\ApiDoCaptureReq $doCaptureRequest)
    {
        try {
            $this->setResult($resultDoCapture = $this->getSoapClient()->__soapCall('DoCapture', [
                $doCaptureRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultDoCapture;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoReauthorization
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiDoReauthorizationReq $doReauthorizationRequest
     * @return \StructType\ApiDoReauthorizationResponseType|bool
     */
    public function DoReauthorization(\StructType\ApiDoReauthorizationReq $doReauthorizationRequest)
    {
        try {
            $this->setResult($resultDoReauthorization = $this->getSoapClient()->__soapCall('DoReauthorization', [
                $doReauthorizationRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultDoReauthorization;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoVoid
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiDoVoidReq $doVoidRequest
     * @return \StructType\ApiDoVoidResponseType|bool
     */
    public function DoVoid(\StructType\ApiDoVoidReq $doVoidRequest)
    {
        try {
            $this->setResult($resultDoVoid = $this->getSoapClient()->__soapCall('DoVoid', [
                $doVoidRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultDoVoid;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoAuthorization
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiDoAuthorizationReq $doAuthorizationRequest
     * @return \StructType\ApiDoAuthorizationResponseType|bool
     */
    public function DoAuthorization(\StructType\ApiDoAuthorizationReq $doAuthorizationRequest)
    {
        try {
            $this->setResult($resultDoAuthorization = $this->getSoapClient()->__soapCall('DoAuthorization', [
                $doAuthorizationRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultDoAuthorization;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named UpdateAuthorization
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiUpdateAuthorizationReq $updateAuthorizationRequest
     * @return \StructType\ApiUpdateAuthorizationResponseType|bool
     */
    public function UpdateAuthorization(\StructType\ApiUpdateAuthorizationReq $updateAuthorizationRequest)
    {
        try {
            $this->setResult($resultUpdateAuthorization = $this->getSoapClient()->__soapCall('UpdateAuthorization', [
                $updateAuthorizationRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultUpdateAuthorization;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoUATPAuthorization
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiDoUATPAuthorizationReq $doUATPAuthorizationRequest
     * @return \StructType\ApiDoUATPAuthorizationResponseType|bool
     */
    public function DoUATPAuthorization(\StructType\ApiDoUATPAuthorizationReq $doUATPAuthorizationRequest)
    {
        try {
            $this->setResult($resultDoUATPAuthorization = $this->getSoapClient()->__soapCall('DoUATPAuthorization', [
                $doUATPAuthorizationRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultDoUATPAuthorization;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named SetCustomerBillingAgreement
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiSetCustomerBillingAgreementReq $setCustomerBillingAgreementRequest
     * @return \StructType\ApiSetCustomerBillingAgreementResponseType|bool
     */
    public function SetCustomerBillingAgreement(\StructType\ApiSetCustomerBillingAgreementReq $setCustomerBillingAgreementRequest)
    {
        try {
            $this->setResult($resultSetCustomerBillingAgreement = $this->getSoapClient()->__soapCall('SetCustomerBillingAgreement', [
                $setCustomerBillingAgreementRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultSetCustomerBillingAgreement;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetBillingAgreementCustomerDetails
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiGetBillingAgreementCustomerDetailsReq $getBillingAgreementCustomerDetailsRequest
     * @return \StructType\ApiGetBillingAgreementCustomerDetailsResponseType|bool
     */
    public function GetBillingAgreementCustomerDetails(\StructType\ApiGetBillingAgreementCustomerDetailsReq $getBillingAgreementCustomerDetailsRequest)
    {
        try {
            $this->setResult($resultGetBillingAgreementCustomerDetails = $this->getSoapClient()->__soapCall('GetBillingAgreementCustomerDetails', [
                $getBillingAgreementCustomerDetailsRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultGetBillingAgreementCustomerDetails;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named CreateBillingAgreement
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiCreateBillingAgreementReq $createBillingAgreementRequest
     * @return \StructType\ApiCreateBillingAgreementResponseType|bool
     */
    public function CreateBillingAgreement(\StructType\ApiCreateBillingAgreementReq $createBillingAgreementRequest)
    {
        try {
            $this->setResult($resultCreateBillingAgreement = $this->getSoapClient()->__soapCall('CreateBillingAgreement', [
                $createBillingAgreementRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultCreateBillingAgreement;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoReferenceTransaction
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiDoReferenceTransactionReq $doReferenceTransactionRequest
     * @return \StructType\ApiDoReferenceTransactionResponseType|bool
     */
    public function DoReferenceTransaction(\StructType\ApiDoReferenceTransactionReq $doReferenceTransactionRequest)
    {
        try {
            $this->setResult($resultDoReferenceTransaction = $this->getSoapClient()->__soapCall('DoReferenceTransaction', [
                $doReferenceTransactionRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultDoReferenceTransaction;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named CreateRecurringPaymentsProfile
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiCreateRecurringPaymentsProfileReq $createRecurringPaymentsProfileRequest
     * @return \StructType\ApiCreateRecurringPaymentsProfileResponseType|bool
     */
    public function CreateRecurringPaymentsProfile(\StructType\ApiCreateRecurringPaymentsProfileReq $createRecurringPaymentsProfileRequest)
    {
        try {
            $this->setResult($resultCreateRecurringPaymentsProfile = $this->getSoapClient()->__soapCall('CreateRecurringPaymentsProfile', [
                $createRecurringPaymentsProfileRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultCreateRecurringPaymentsProfile;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetRecurringPaymentsProfileDetails
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiGetRecurringPaymentsProfileDetailsReq $getRecurringPaymentsProfileDetailsRequest
     * @return \StructType\ApiGetRecurringPaymentsProfileDetailsResponseType|bool
     */
    public function GetRecurringPaymentsProfileDetails(\StructType\ApiGetRecurringPaymentsProfileDetailsReq $getRecurringPaymentsProfileDetailsRequest)
    {
        try {
            $this->setResult($resultGetRecurringPaymentsProfileDetails = $this->getSoapClient()->__soapCall('GetRecurringPaymentsProfileDetails', [
                $getRecurringPaymentsProfileDetailsRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultGetRecurringPaymentsProfileDetails;
        } catch (SoapFault $soapFault) {
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiManageRecurringPaymentsProfileStatusReq $manageRecurringPaymentsProfileStatusRequest
     * @return \StructType\ApiManageRecurringPaymentsProfileStatusResponseType|bool
     */
    public function ManageRecurringPaymentsProfileStatus(\StructType\ApiManageRecurringPaymentsProfileStatusReq $manageRecurringPaymentsProfileStatusRequest)
    {
        try {
            $this->setResult($resultManageRecurringPaymentsProfileStatus = $this->getSoapClient()->__soapCall('ManageRecurringPaymentsProfileStatus', [
                $manageRecurringPaymentsProfileStatusRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultManageRecurringPaymentsProfileStatus;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named BillOutstandingAmount
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiBillOutstandingAmountReq $billOutstandingAmountRequest
     * @return \StructType\ApiBillOutstandingAmountResponseType|bool
     */
    public function BillOutstandingAmount(\StructType\ApiBillOutstandingAmountReq $billOutstandingAmountRequest)
    {
        try {
            $this->setResult($resultBillOutstandingAmount = $this->getSoapClient()->__soapCall('BillOutstandingAmount', [
                $billOutstandingAmountRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultBillOutstandingAmount;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named UpdateRecurringPaymentsProfile
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiUpdateRecurringPaymentsProfileReq $updateRecurringPaymentsProfileRequest
     * @return \StructType\ApiUpdateRecurringPaymentsProfileResponseType|bool
     */
    public function UpdateRecurringPaymentsProfile(\StructType\ApiUpdateRecurringPaymentsProfileReq $updateRecurringPaymentsProfileRequest)
    {
        try {
            $this->setResult($resultUpdateRecurringPaymentsProfile = $this->getSoapClient()->__soapCall('UpdateRecurringPaymentsProfile', [
                $updateRecurringPaymentsProfileRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultUpdateRecurringPaymentsProfile;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoNonReferencedCredit
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiDoNonReferencedCreditReq $doNonReferencedCreditRequest
     * @return \StructType\ApiDoNonReferencedCreditResponseType|bool
     */
    public function DoNonReferencedCredit(\StructType\ApiDoNonReferencedCreditReq $doNonReferencedCreditRequest)
    {
        try {
            $this->setResult($resultDoNonReferencedCredit = $this->getSoapClient()->__soapCall('DoNonReferencedCredit', [
                $doNonReferencedCreditRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultDoNonReferencedCredit;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReverseTransaction
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiReverseTransactionReq $reverseTransactionRequest
     * @return \StructType\ApiReverseTransactionResponseType|bool
     */
    public function ReverseTransaction(\StructType\ApiReverseTransactionReq $reverseTransactionRequest)
    {
        try {
            $this->setResult($resultReverseTransaction = $this->getSoapClient()->__soapCall('ReverseTransaction', [
                $reverseTransactionRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultReverseTransaction;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ExternalRememberMeOptOut
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiExternalRememberMeOptOutReq $externalRememberMeOptOutRequest
     * @return \StructType\ApiExternalRememberMeOptOutResponseType|bool
     */
    public function ExternalRememberMeOptOut(\StructType\ApiExternalRememberMeOptOutReq $externalRememberMeOptOutRequest)
    {
        try {
            $this->setResult($resultExternalRememberMeOptOut = $this->getSoapClient()->__soapCall('ExternalRememberMeOptOut', [
                $externalRememberMeOptOutRequest,
            ], [], [], $this->outputHeaders));
        
            return $resultExternalRememberMeOptOut;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \StructType\ApiAddressVerifyResponseType|\StructType\ApiBAUpdateResponseType|\StructType\ApiBillOutstandingAmountResponseType|\StructType\ApiBillUserResponseType|\StructType\ApiBMButtonSearchResponseType|\StructType\ApiBMCreateButtonResponseType|\StructType\ApiBMGetButtonDetailsResponseType|\StructType\ApiBMGetInventoryResponseType|\StructType\ApiBMManageButtonStatusResponseType|\StructType\ApiBMSetInventoryResponseType|\StructType\ApiBMUpdateButtonResponseType|\StructType\ApiCancelRecoupResponseType|\StructType\ApiCompleteRecoupResponseType|\StructType\ApiCreateBillingAgreementResponseType|\StructType\ApiCreateMobilePaymentResponseType|\StructType\ApiCreateRecurringPaymentsProfileResponseType|\StructType\ApiDoAuthorizationResponseType|\StructType\ApiDoCancelResponseType|\StructType\ApiDoCaptureResponseType|\StructType\ApiDoDirectPaymentResponseType|\StructType\ApiDoExpressCheckoutPaymentResponseType|\StructType\ApiDoMobileCheckoutPaymentResponseType|\StructType\ApiDoNonReferencedCreditResponseType|\StructType\ApiDoReauthorizationResponseType|\StructType\ApiDoReferenceTransactionResponseType|\StructType\ApiDoUATPAuthorizationResponseType|\StructType\ApiDoUATPExpressCheckoutPaymentResponseType|\StructType\ApiDoVoidResponseType|\StructType\ApiEnterBoardingResponseType|\StructType\ApiExecuteCheckoutOperationsResponseType|\StructType\ApiExternalRememberMeOptOutResponseType|\StructType\ApiGetAccessPermissionDetailsResponseType|\StructType\ApiGetAuthDetailsResponseType|\StructType\ApiGetBalanceResponseType|\StructType\ApiGetBillingAgreementCustomerDetailsResponseType|\StructType\ApiGetBoardingDetailsResponseType|\StructType\ApiGetExpressCheckoutDetailsResponseType|\StructType\ApiGetIncentiveEvaluationResponseType|\StructType\ApiGetMobileStatusResponseType|\StructType\ApiGetPalDetailsResponseType|\StructType\ApiGetRecurringPaymentsProfileDetailsResponseType|\StructType\ApiGetTransactionDetailsResponseType|\StructType\ApiInitiateRecoupResponseType|\StructType\ApiManagePendingTransactionStatusResponseType|\StructType\ApiManageRecurringPaymentsProfileStatusResponseType|\StructType\ApiMassPayResponseType|\StructType\ApiRefundTransactionResponseType|\StructType\ApiReverseTransactionResponseType|\StructType\ApiSetAccessPermissionsResponseType|\StructType\ApiSetAuthFlowParamResponseType|\StructType\ApiSetCustomerBillingAgreementResponseType|\StructType\ApiSetExpressCheckoutResponseType|\StructType\ApiSetMobileCheckoutResponseType|\StructType\ApiTransactionSearchResponseType|\StructType\ApiUpdateAccessPermissionsResponseType|\StructType\ApiUpdateAuthorizationResponseType|\StructType\ApiUpdateRecurringPaymentsProfileResponseType
     */
    public function getResult()
    {
        return parent::getResult();
    }
}
