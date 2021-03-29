<?php

declare(strict_types=1);

namespace ServiceType;

use SoapFault;
use WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Do ServiceType
 * @package Api
 * @subpackage Services
 * @release 1.1.0
 */
class ApiDo extends AbstractSoapClientBase
{
    /**
     * Sets the RequesterCredentials SoapHeader param
     * @uses AbstractSoapClientBase::setSoapHeader()
     * @param \StructType\ApiCustomSecurityHeaderType $requesterCredentials
     * @param string $namespace
     * @param bool $mustUnderstand
     * @param string $actor
     * @return \ServiceType\ApiDo
     */
    public function setSoapHeaderRequesterCredentials(\StructType\ApiCustomSecurityHeaderType $requesterCredentials, string $namespace = 'urn:ebay:api:PayPalAPI', bool $mustUnderstand = false, ?string $actor = null): self
    {
        return $this->setSoapHeader($namespace, 'RequesterCredentials', $requesterCredentials, $mustUnderstand, $actor);
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
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \StructType\ApiDoAuthorizationResponseType|\StructType\ApiDoCancelResponseType|\StructType\ApiDoCaptureResponseType|\StructType\ApiDoDirectPaymentResponseType|\StructType\ApiDoExpressCheckoutPaymentResponseType|\StructType\ApiDoMobileCheckoutPaymentResponseType|\StructType\ApiDoNonReferencedCreditResponseType|\StructType\ApiDoReauthorizationResponseType|\StructType\ApiDoReferenceTransactionResponseType|\StructType\ApiDoUATPAuthorizationResponseType|\StructType\ApiDoUATPExpressCheckoutPaymentResponseType|\StructType\ApiDoVoidResponseType
     */
    public function getResult()
    {
        return parent::getResult();
    }
}
