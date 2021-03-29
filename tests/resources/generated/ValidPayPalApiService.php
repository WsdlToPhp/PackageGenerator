<?php

namespace ServiceType;

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
     * @param \StructType\ApiCustomSecurityHeaderType $requesterCredentials
     * @param string $nameSpace
     * @param bool $mustUnderstand
     * @param string $actor
     * @return bool
     */
    public function setSoapHeaderRequesterCredentials(\StructType\ApiCustomSecurityHeaderType $requesterCredentials, $nameSpace = 'urn:ebay:api:PayPalAPI', $mustUnderstand = false, $actor = null)
    {
        return $this->setSoapHeader($nameSpace, 'RequesterCredentials', $requesterCredentials, $mustUnderstand, $actor);
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
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiRefundTransactionReq $refundTransactionRequest
     * @return \StructType\ApiRefundTransactionResponseType|bool
     */
    public function RefundTransaction(\StructType\ApiRefundTransactionReq $refundTransactionRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('RefundTransaction', array(
                $refundTransactionRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiInitiateRecoupReq $initiateRecoupRequest
     * @return \StructType\ApiInitiateRecoupResponseType|bool
     */
    public function InitiateRecoup(\StructType\ApiInitiateRecoupReq $initiateRecoupRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('InitiateRecoup', array(
                $initiateRecoupRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiCompleteRecoupReq $completeRecoupRequest
     * @return \StructType\ApiCompleteRecoupResponseType|bool
     */
    public function CompleteRecoup(\StructType\ApiCompleteRecoupReq $completeRecoupRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('CompleteRecoup', array(
                $completeRecoupRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiCancelRecoupReq $cancelRecoupRequest
     * @return \StructType\ApiCancelRecoupResponseType|bool
     */
    public function CancelRecoup(\StructType\ApiCancelRecoupReq $cancelRecoupRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('CancelRecoup', array(
                $cancelRecoupRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiGetTransactionDetailsReq $getTransactionDetailsRequest
     * @return \StructType\ApiGetTransactionDetailsResponseType|bool
     */
    public function GetTransactionDetails(\StructType\ApiGetTransactionDetailsReq $getTransactionDetailsRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('GetTransactionDetails', array(
                $getTransactionDetailsRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiBMCreateButtonReq $bMCreateButtonRequest
     * @return \StructType\ApiBMCreateButtonResponseType|bool
     */
    public function BMCreateButton(\StructType\ApiBMCreateButtonReq $bMCreateButtonRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('BMCreateButton', array(
                $bMCreateButtonRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiBMUpdateButtonReq $bMUpdateButtonRequest
     * @return \StructType\ApiBMUpdateButtonResponseType|bool
     */
    public function BMUpdateButton(\StructType\ApiBMUpdateButtonReq $bMUpdateButtonRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('BMUpdateButton', array(
                $bMUpdateButtonRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiBMSetInventoryReq $bMSetInventoryRequest
     * @return \StructType\ApiBMSetInventoryResponseType|bool
     */
    public function BMSetInventory(\StructType\ApiBMSetInventoryReq $bMSetInventoryRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('BMSetInventory', array(
                $bMSetInventoryRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiBMGetButtonDetailsReq $bMGetButtonDetailsRequest
     * @return \StructType\ApiBMGetButtonDetailsResponseType|bool
     */
    public function BMGetButtonDetails(\StructType\ApiBMGetButtonDetailsReq $bMGetButtonDetailsRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('BMGetButtonDetails', array(
                $bMGetButtonDetailsRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiBMGetInventoryReq $bMGetInventoryRequest
     * @return \StructType\ApiBMGetInventoryResponseType|bool
     */
    public function BMGetInventory(\StructType\ApiBMGetInventoryReq $bMGetInventoryRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('BMGetInventory', array(
                $bMGetInventoryRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiBMManageButtonStatusReq $bMManageButtonStatusRequest
     * @return \StructType\ApiBMManageButtonStatusResponseType|bool
     */
    public function BMManageButtonStatus(\StructType\ApiBMManageButtonStatusReq $bMManageButtonStatusRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('BMManageButtonStatus', array(
                $bMManageButtonStatusRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiBMButtonSearchReq $bMButtonSearchRequest
     * @return \StructType\ApiBMButtonSearchResponseType|bool
     */
    public function BMButtonSearch(\StructType\ApiBMButtonSearchReq $bMButtonSearchRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('BMButtonSearch', array(
                $bMButtonSearchRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiBillUserReq $billUserRequest
     * @return \StructType\ApiBillUserResponseType|bool
     */
    public function BillUser(\StructType\ApiBillUserReq $billUserRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('BillUser', array(
                $billUserRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiTransactionSearchReq $transactionSearchRequest
     * @return \StructType\ApiTransactionSearchResponseType|bool
     */
    public function TransactionSearch(\StructType\ApiTransactionSearchReq $transactionSearchRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('TransactionSearch', array(
                $transactionSearchRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiMassPayReq $massPayRequest
     * @return \StructType\ApiMassPayResponseType|bool
     */
    public function MassPay(\StructType\ApiMassPayReq $massPayRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('MassPay', array(
                $massPayRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiBillAgreementUpdateReq $billAgreementUpdateRequest
     * @return \StructType\ApiBAUpdateResponseType|bool
     */
    public function BillAgreementUpdate(\StructType\ApiBillAgreementUpdateReq $billAgreementUpdateRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('BillAgreementUpdate', array(
                $billAgreementUpdateRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiAddressVerifyReq $addressVerifyRequest
     * @return \StructType\ApiAddressVerifyResponseType|bool
     */
    public function AddressVerify(\StructType\ApiAddressVerifyReq $addressVerifyRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('AddressVerify', array(
                $addressVerifyRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiEnterBoardingReq $enterBoardingRequest
     * @return \StructType\ApiEnterBoardingResponseType|bool
     */
    public function EnterBoarding(\StructType\ApiEnterBoardingReq $enterBoardingRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('EnterBoarding', array(
                $enterBoardingRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiGetBoardingDetailsReq $getBoardingDetailsRequest
     * @return \StructType\ApiGetBoardingDetailsResponseType|bool
     */
    public function GetBoardingDetails(\StructType\ApiGetBoardingDetailsReq $getBoardingDetailsRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('GetBoardingDetails', array(
                $getBoardingDetailsRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiCreateMobilePaymentReq $createMobilePaymentRequest
     * @return \StructType\ApiCreateMobilePaymentResponseType|bool
     */
    public function CreateMobilePayment(\StructType\ApiCreateMobilePaymentReq $createMobilePaymentRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('CreateMobilePayment', array(
                $createMobilePaymentRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiGetMobileStatusReq $getMobileStatusRequest
     * @return \StructType\ApiGetMobileStatusResponseType|bool
     */
    public function GetMobileStatus(\StructType\ApiGetMobileStatusReq $getMobileStatusRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('GetMobileStatus', array(
                $getMobileStatusRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiSetMobileCheckoutReq $setMobileCheckoutRequest
     * @return \StructType\ApiSetMobileCheckoutResponseType|bool
     */
    public function SetMobileCheckout(\StructType\ApiSetMobileCheckoutReq $setMobileCheckoutRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('SetMobileCheckout', array(
                $setMobileCheckoutRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiDoMobileCheckoutPaymentReq $doMobileCheckoutPaymentRequest
     * @return \StructType\ApiDoMobileCheckoutPaymentResponseType|bool
     */
    public function DoMobileCheckoutPayment(\StructType\ApiDoMobileCheckoutPaymentReq $doMobileCheckoutPaymentRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('DoMobileCheckoutPayment', array(
                $doMobileCheckoutPaymentRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiGetBalanceReq $getBalanceRequest
     * @return \StructType\ApiGetBalanceResponseType|bool
     */
    public function GetBalance(\StructType\ApiGetBalanceReq $getBalanceRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('GetBalance', array(
                $getBalanceRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiGetPalDetailsReq $getPalDetailsRequest
     * @return \StructType\ApiGetPalDetailsResponseType|bool
     */
    public function GetPalDetails(\StructType\ApiGetPalDetailsReq $getPalDetailsRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('GetPalDetails', array(
                $getPalDetailsRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiDoExpressCheckoutPaymentReq $doExpressCheckoutPaymentRequest
     * @return \StructType\ApiDoExpressCheckoutPaymentResponseType|bool
     */
    public function DoExpressCheckoutPayment(\StructType\ApiDoExpressCheckoutPaymentReq $doExpressCheckoutPaymentRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('DoExpressCheckoutPayment', array(
                $doExpressCheckoutPaymentRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiDoUATPExpressCheckoutPaymentReq $doUATPExpressCheckoutPaymentRequest
     * @return \StructType\ApiDoUATPExpressCheckoutPaymentResponseType|bool
     */
    public function DoUATPExpressCheckoutPayment(\StructType\ApiDoUATPExpressCheckoutPaymentReq $doUATPExpressCheckoutPaymentRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('DoUATPExpressCheckoutPayment', array(
                $doUATPExpressCheckoutPaymentRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiSetAuthFlowParamReq $setAuthFlowParamRequest
     * @return \StructType\ApiSetAuthFlowParamResponseType|bool
     */
    public function SetAuthFlowParam(\StructType\ApiSetAuthFlowParamReq $setAuthFlowParamRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('SetAuthFlowParam', array(
                $setAuthFlowParamRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiGetAuthDetailsReq $getAuthDetailsRequest
     * @return \StructType\ApiGetAuthDetailsResponseType|bool
     */
    public function GetAuthDetails(\StructType\ApiGetAuthDetailsReq $getAuthDetailsRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('GetAuthDetails', array(
                $getAuthDetailsRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiSetAccessPermissionsReq $setAccessPermissionsRequest
     * @return \StructType\ApiSetAccessPermissionsResponseType|bool
     */
    public function SetAccessPermissions(\StructType\ApiSetAccessPermissionsReq $setAccessPermissionsRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('SetAccessPermissions', array(
                $setAccessPermissionsRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiUpdateAccessPermissionsReq $updateAccessPermissionsRequest
     * @return \StructType\ApiUpdateAccessPermissionsResponseType|bool
     */
    public function UpdateAccessPermissions(\StructType\ApiUpdateAccessPermissionsReq $updateAccessPermissionsRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('UpdateAccessPermissions', array(
                $updateAccessPermissionsRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiGetAccessPermissionDetailsReq $getAccessPermissionDetailsRequest
     * @return \StructType\ApiGetAccessPermissionDetailsResponseType|bool
     */
    public function GetAccessPermissionDetails(\StructType\ApiGetAccessPermissionDetailsReq $getAccessPermissionDetailsRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('GetAccessPermissionDetails', array(
                $getAccessPermissionDetailsRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiGetIncentiveEvaluationReq $getIncentiveEvaluationRequest
     * @return \StructType\ApiGetIncentiveEvaluationResponseType|bool
     */
    public function GetIncentiveEvaluation(\StructType\ApiGetIncentiveEvaluationReq $getIncentiveEvaluationRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('GetIncentiveEvaluation', array(
                $getIncentiveEvaluationRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiSetExpressCheckoutReq $setExpressCheckoutRequest
     * @return \StructType\ApiSetExpressCheckoutResponseType|bool
     */
    public function SetExpressCheckout(\StructType\ApiSetExpressCheckoutReq $setExpressCheckoutRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('SetExpressCheckout', array(
                $setExpressCheckoutRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiExecuteCheckoutOperationsReq $executeCheckoutOperationsRequest
     * @return \StructType\ApiExecuteCheckoutOperationsResponseType|bool
     */
    public function ExecuteCheckoutOperations(\StructType\ApiExecuteCheckoutOperationsReq $executeCheckoutOperationsRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('ExecuteCheckoutOperations', array(
                $executeCheckoutOperationsRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiGetExpressCheckoutDetailsReq $getExpressCheckoutDetailsRequest
     * @return \StructType\ApiGetExpressCheckoutDetailsResponseType|bool
     */
    public function GetExpressCheckoutDetails(\StructType\ApiGetExpressCheckoutDetailsReq $getExpressCheckoutDetailsRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('GetExpressCheckoutDetails', array(
                $getExpressCheckoutDetailsRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiDoDirectPaymentReq $doDirectPaymentRequest
     * @return \StructType\ApiDoDirectPaymentResponseType|bool
     */
    public function DoDirectPayment(\StructType\ApiDoDirectPaymentReq $doDirectPaymentRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('DoDirectPayment', array(
                $doDirectPaymentRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiManagePendingTransactionStatusReq $managePendingTransactionStatusRequest
     * @return \StructType\ApiManagePendingTransactionStatusResponseType|bool
     */
    public function ManagePendingTransactionStatus(\StructType\ApiManagePendingTransactionStatusReq $managePendingTransactionStatusRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('ManagePendingTransactionStatus', array(
                $managePendingTransactionStatusRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiDoCancelReq $doCancelRequest
     * @return \StructType\ApiDoCancelResponseType|bool
     */
    public function DoCancel(\StructType\ApiDoCancelReq $doCancelRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('DoCancel', array(
                $doCancelRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiDoCaptureReq $doCaptureRequest
     * @return \StructType\ApiDoCaptureResponseType|bool
     */
    public function DoCapture(\StructType\ApiDoCaptureReq $doCaptureRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('DoCapture', array(
                $doCaptureRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiDoReauthorizationReq $doReauthorizationRequest
     * @return \StructType\ApiDoReauthorizationResponseType|bool
     */
    public function DoReauthorization(\StructType\ApiDoReauthorizationReq $doReauthorizationRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('DoReauthorization', array(
                $doReauthorizationRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiDoVoidReq $doVoidRequest
     * @return \StructType\ApiDoVoidResponseType|bool
     */
    public function DoVoid(\StructType\ApiDoVoidReq $doVoidRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('DoVoid', array(
                $doVoidRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiDoAuthorizationReq $doAuthorizationRequest
     * @return \StructType\ApiDoAuthorizationResponseType|bool
     */
    public function DoAuthorization(\StructType\ApiDoAuthorizationReq $doAuthorizationRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('DoAuthorization', array(
                $doAuthorizationRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiUpdateAuthorizationReq $updateAuthorizationRequest
     * @return \StructType\ApiUpdateAuthorizationResponseType|bool
     */
    public function UpdateAuthorization(\StructType\ApiUpdateAuthorizationReq $updateAuthorizationRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('UpdateAuthorization', array(
                $updateAuthorizationRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiDoUATPAuthorizationReq $doUATPAuthorizationRequest
     * @return \StructType\ApiDoUATPAuthorizationResponseType|bool
     */
    public function DoUATPAuthorization(\StructType\ApiDoUATPAuthorizationReq $doUATPAuthorizationRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('DoUATPAuthorization', array(
                $doUATPAuthorizationRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiSetCustomerBillingAgreementReq $setCustomerBillingAgreementRequest
     * @return \StructType\ApiSetCustomerBillingAgreementResponseType|bool
     */
    public function SetCustomerBillingAgreement(\StructType\ApiSetCustomerBillingAgreementReq $setCustomerBillingAgreementRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('SetCustomerBillingAgreement', array(
                $setCustomerBillingAgreementRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiGetBillingAgreementCustomerDetailsReq $getBillingAgreementCustomerDetailsRequest
     * @return \StructType\ApiGetBillingAgreementCustomerDetailsResponseType|bool
     */
    public function GetBillingAgreementCustomerDetails(\StructType\ApiGetBillingAgreementCustomerDetailsReq $getBillingAgreementCustomerDetailsRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('GetBillingAgreementCustomerDetails', array(
                $getBillingAgreementCustomerDetailsRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiCreateBillingAgreementReq $createBillingAgreementRequest
     * @return \StructType\ApiCreateBillingAgreementResponseType|bool
     */
    public function CreateBillingAgreement(\StructType\ApiCreateBillingAgreementReq $createBillingAgreementRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('CreateBillingAgreement', array(
                $createBillingAgreementRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiDoReferenceTransactionReq $doReferenceTransactionRequest
     * @return \StructType\ApiDoReferenceTransactionResponseType|bool
     */
    public function DoReferenceTransaction(\StructType\ApiDoReferenceTransactionReq $doReferenceTransactionRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('DoReferenceTransaction', array(
                $doReferenceTransactionRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiCreateRecurringPaymentsProfileReq $createRecurringPaymentsProfileRequest
     * @return \StructType\ApiCreateRecurringPaymentsProfileResponseType|bool
     */
    public function CreateRecurringPaymentsProfile(\StructType\ApiCreateRecurringPaymentsProfileReq $createRecurringPaymentsProfileRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('CreateRecurringPaymentsProfile', array(
                $createRecurringPaymentsProfileRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiGetRecurringPaymentsProfileDetailsReq $getRecurringPaymentsProfileDetailsRequest
     * @return \StructType\ApiGetRecurringPaymentsProfileDetailsResponseType|bool
     */
    public function GetRecurringPaymentsProfileDetails(\StructType\ApiGetRecurringPaymentsProfileDetailsReq $getRecurringPaymentsProfileDetailsRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('GetRecurringPaymentsProfileDetails', array(
                $getRecurringPaymentsProfileDetailsRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiManageRecurringPaymentsProfileStatusReq $manageRecurringPaymentsProfileStatusRequest
     * @return \StructType\ApiManageRecurringPaymentsProfileStatusResponseType|bool
     */
    public function ManageRecurringPaymentsProfileStatus(\StructType\ApiManageRecurringPaymentsProfileStatusReq $manageRecurringPaymentsProfileStatusRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('ManageRecurringPaymentsProfileStatus', array(
                $manageRecurringPaymentsProfileStatusRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiBillOutstandingAmountReq $billOutstandingAmountRequest
     * @return \StructType\ApiBillOutstandingAmountResponseType|bool
     */
    public function BillOutstandingAmount(\StructType\ApiBillOutstandingAmountReq $billOutstandingAmountRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('BillOutstandingAmount', array(
                $billOutstandingAmountRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiUpdateRecurringPaymentsProfileReq $updateRecurringPaymentsProfileRequest
     * @return \StructType\ApiUpdateRecurringPaymentsProfileResponseType|bool
     */
    public function UpdateRecurringPaymentsProfile(\StructType\ApiUpdateRecurringPaymentsProfileReq $updateRecurringPaymentsProfileRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('UpdateRecurringPaymentsProfile', array(
                $updateRecurringPaymentsProfileRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiDoNonReferencedCreditReq $doNonReferencedCreditRequest
     * @return \StructType\ApiDoNonReferencedCreditResponseType|bool
     */
    public function DoNonReferencedCredit(\StructType\ApiDoNonReferencedCreditReq $doNonReferencedCreditRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('DoNonReferencedCredit', array(
                $doNonReferencedCreditRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiReverseTransactionReq $reverseTransactionRequest
     * @return \StructType\ApiReverseTransactionResponseType|bool
     */
    public function ReverseTransaction(\StructType\ApiReverseTransactionReq $reverseTransactionRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('ReverseTransaction', array(
                $reverseTransactionRequest,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiCustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiExternalRememberMeOptOutReq $externalRememberMeOptOutRequest
     * @return \StructType\ApiExternalRememberMeOptOutResponseType|bool
     */
    public function ExternalRememberMeOptOut(\StructType\ApiExternalRememberMeOptOutReq $externalRememberMeOptOutRequest)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('ExternalRememberMeOptOut', array(
                $externalRememberMeOptOutRequest,
            ), array(), array(), $this->outputHeaders));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
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
