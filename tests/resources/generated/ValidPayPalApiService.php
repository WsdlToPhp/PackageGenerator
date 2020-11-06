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
            $this->setResult(self::getSoapClient()->__soapCall('RefundTransaction', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('InitiateRecoup', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('CompleteRecoup', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('CancelRecoup', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('GetTransactionDetails', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('BMCreateButton', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('BMUpdateButton', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('BMSetInventory', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('BMGetButtonDetails', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('BMGetInventory', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('BMManageButtonStatus', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('BMButtonSearch', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('BillUser', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('TransactionSearch', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('MassPay', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('BillAgreementUpdate', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('AddressVerify', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('EnterBoarding', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('GetBoardingDetails', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('CreateMobilePayment', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('GetMobileStatus', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('SetMobileCheckout', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('DoMobileCheckoutPayment', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('GetBalance', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('GetPalDetails', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('DoExpressCheckoutPayment', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('DoUATPExpressCheckoutPayment', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('SetAuthFlowParam', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('GetAuthDetails', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('SetAccessPermissions', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('UpdateAccessPermissions', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('GetAccessPermissionDetails', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('GetIncentiveEvaluation', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('SetExpressCheckout', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('ExecuteCheckoutOperations', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('GetExpressCheckoutDetails', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('DoDirectPayment', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('ManagePendingTransactionStatus', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('DoCancel', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('DoCapture', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('DoReauthorization', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('DoVoid', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('DoAuthorization', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('UpdateAuthorization', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('DoUATPAuthorization', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('SetCustomerBillingAgreement', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('GetBillingAgreementCustomerDetails', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('CreateBillingAgreement', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('DoReferenceTransaction', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('CreateRecurringPaymentsProfile', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('GetRecurringPaymentsProfileDetails', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('ManageRecurringPaymentsProfileStatus', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('BillOutstandingAmount', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('UpdateRecurringPaymentsProfile', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('DoNonReferencedCredit', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('ReverseTransaction', array(
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
            $this->setResult(self::getSoapClient()->__soapCall('ExternalRememberMeOptOut', array(
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
     * @return \Api\StructType\ApiAddressVerifyResponseType|\Api\StructType\ApiBAUpdateResponseType|\Api\StructType\ApiBillOutstandingAmountResponseType|\Api\StructType\ApiBillUserResponseType|\Api\StructType\ApiBMButtonSearchResponseType|\Api\StructType\ApiBMCreateButtonResponseType|\Api\StructType\ApiBMGetButtonDetailsResponseType|\Api\StructType\ApiBMGetInventoryResponseType|\Api\StructType\ApiBMManageButtonStatusResponseType|\Api\StructType\ApiBMSetInventoryResponseType|\Api\StructType\ApiBMUpdateButtonResponseType|\Api\StructType\ApiCancelRecoupResponseType|\Api\StructType\ApiCompleteRecoupResponseType|\Api\StructType\ApiCreateBillingAgreementResponseType|\Api\StructType\ApiCreateMobilePaymentResponseType|\Api\StructType\ApiCreateRecurringPaymentsProfileResponseType|\Api\StructType\ApiDoAuthorizationResponseType|\Api\StructType\ApiDoCancelResponseType|\Api\StructType\ApiDoCaptureResponseType|\Api\StructType\ApiDoDirectPaymentResponseType|\Api\StructType\ApiDoExpressCheckoutPaymentResponseType|\Api\StructType\ApiDoMobileCheckoutPaymentResponseType|\Api\StructType\ApiDoNonReferencedCreditResponseType|\Api\StructType\ApiDoReauthorizationResponseType|\Api\StructType\ApiDoReferenceTransactionResponseType|\Api\StructType\ApiDoUATPAuthorizationResponseType|\Api\StructType\ApiDoUATPExpressCheckoutPaymentResponseType|\Api\StructType\ApiDoVoidResponseType|\Api\StructType\ApiEnterBoardingResponseType|\Api\StructType\ApiExecuteCheckoutOperationsResponseType|\Api\StructType\ApiExternalRememberMeOptOutResponseType|\Api\StructType\ApiGetAccessPermissionDetailsResponseType|\Api\StructType\ApiGetAuthDetailsResponseType|\Api\StructType\ApiGetBalanceResponseType|\Api\StructType\ApiGetBillingAgreementCustomerDetailsResponseType|\Api\StructType\ApiGetBoardingDetailsResponseType|\Api\StructType\ApiGetExpressCheckoutDetailsResponseType|\Api\StructType\ApiGetIncentiveEvaluationResponseType|\Api\StructType\ApiGetMobileStatusResponseType|\Api\StructType\ApiGetPalDetailsResponseType|\Api\StructType\ApiGetRecurringPaymentsProfileDetailsResponseType|\Api\StructType\ApiGetTransactionDetailsResponseType|\Api\StructType\ApiInitiateRecoupResponseType|\Api\StructType\ApiManagePendingTransactionStatusResponseType|\Api\StructType\ApiManageRecurringPaymentsProfileStatusResponseType|\Api\StructType\ApiMassPayResponseType|\Api\StructType\ApiRefundTransactionResponseType|\Api\StructType\ApiReverseTransactionResponseType|\Api\StructType\ApiSetAccessPermissionsResponseType|\Api\StructType\ApiSetAuthFlowParamResponseType|\Api\StructType\ApiSetCustomerBillingAgreementResponseType|\Api\StructType\ApiSetExpressCheckoutResponseType|\Api\StructType\ApiSetMobileCheckoutResponseType|\Api\StructType\ApiTransactionSearchResponseType|\Api\StructType\ApiUpdateAccessPermissionsResponseType|\Api\StructType\ApiUpdateAuthorizationResponseType|\Api\StructType\ApiUpdateRecurringPaymentsProfileResponseType
     */
    public function getResult()
    {
        return parent::getResult();
    }
    /**
     * Method returning the class name
     * @return string __CLASS__
     */
    public function __toString()
    {
        return __CLASS__;
    }
}
