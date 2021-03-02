<?php

declare(strict_types=1);

namespace ServiceType;

use SoapFault;
use WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Do ServiceType
 * @subpackage Services
 * @release 1.1.0
 */
class _Do extends AbstractSoapClientBase
{
    /**
     * Sets the RequesterCredentials SoapHeader param
     * @uses AbstractSoapClientBase::setSoapHeader()
     * @param \StructType\CustomSecurityHeaderType $requesterCredentials
     * @param string $namespace
     * @param bool $mustUnderstand
     * @param string $actor
     * @return \ServiceType\_Do
     */
    public function setSoapHeaderRequesterCredentials(\StructType\CustomSecurityHeaderType $requesterCredentials, string $namespace = 'urn:ebay:api:PayPalAPI', bool $mustUnderstand = false, ?string $actor = null): self
    {
        return $this->setSoapHeader($namespace, 'RequesterCredentials', $requesterCredentials, $mustUnderstand, $actor);
    }
    /**
     * Method to call the operation originally named DoMobileCheckoutPayment
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\CustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\DoMobileCheckoutPaymentReq $doMobileCheckoutPaymentRequest
     * @return \StructType\DoMobileCheckoutPaymentResponseType|bool
     */
    public function DoMobileCheckoutPayment(\StructType\DoMobileCheckoutPaymentReq $doMobileCheckoutPaymentRequest)
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
     * - SOAPHeaderTypes: \StructType\CustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\DoExpressCheckoutPaymentReq $doExpressCheckoutPaymentRequest
     * @return \StructType\DoExpressCheckoutPaymentResponseType|bool
     */
    public function DoExpressCheckoutPayment(\StructType\DoExpressCheckoutPaymentReq $doExpressCheckoutPaymentRequest)
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
     * - SOAPHeaderTypes: \StructType\CustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\DoUATPExpressCheckoutPaymentReq $doUATPExpressCheckoutPaymentRequest
     * @return \StructType\DoUATPExpressCheckoutPaymentResponseType|bool
     */
    public function DoUATPExpressCheckoutPayment(\StructType\DoUATPExpressCheckoutPaymentReq $doUATPExpressCheckoutPaymentRequest)
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
     * - SOAPHeaderTypes: \StructType\CustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\DoDirectPaymentReq $doDirectPaymentRequest
     * @return \StructType\DoDirectPaymentResponseType|bool
     */
    public function DoDirectPayment(\StructType\DoDirectPaymentReq $doDirectPaymentRequest)
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
     * - SOAPHeaderTypes: \StructType\CustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\DoCancelReq $doCancelRequest
     * @return \StructType\DoCancelResponseType|bool
     */
    public function DoCancel(\StructType\DoCancelReq $doCancelRequest)
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
     * - SOAPHeaderTypes: \StructType\CustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\DoCaptureReq $doCaptureRequest
     * @return \StructType\DoCaptureResponseType|bool
     */
    public function DoCapture(\StructType\DoCaptureReq $doCaptureRequest)
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
     * - SOAPHeaderTypes: \StructType\CustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\DoReauthorizationReq $doReauthorizationRequest
     * @return \StructType\DoReauthorizationResponseType|bool
     */
    public function DoReauthorization(\StructType\DoReauthorizationReq $doReauthorizationRequest)
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
     * - SOAPHeaderTypes: \StructType\CustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\DoVoidReq $doVoidRequest
     * @return \StructType\DoVoidResponseType|bool
     */
    public function DoVoid(\StructType\DoVoidReq $doVoidRequest)
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
     * - SOAPHeaderTypes: \StructType\CustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\DoAuthorizationReq $doAuthorizationRequest
     * @return \StructType\DoAuthorizationResponseType|bool
     */
    public function DoAuthorization(\StructType\DoAuthorizationReq $doAuthorizationRequest)
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
     * - SOAPHeaderTypes: \StructType\CustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\DoUATPAuthorizationReq $doUATPAuthorizationRequest
     * @return \StructType\DoUATPAuthorizationResponseType|bool
     */
    public function DoUATPAuthorization(\StructType\DoUATPAuthorizationReq $doUATPAuthorizationRequest)
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
     * - SOAPHeaderTypes: \StructType\CustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\DoReferenceTransactionReq $doReferenceTransactionRequest
     * @return \StructType\DoReferenceTransactionResponseType|bool
     */
    public function DoReferenceTransaction(\StructType\DoReferenceTransactionReq $doReferenceTransactionRequest)
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
     * - SOAPHeaderTypes: \StructType\CustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\DoNonReferencedCreditReq $doNonReferencedCreditRequest
     * @return \StructType\DoNonReferencedCreditResponseType|bool
     */
    public function DoNonReferencedCredit(\StructType\DoNonReferencedCreditReq $doNonReferencedCreditRequest)
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
     * @return \StructType\DoAuthorizationResponseType|\StructType\DoCancelResponseType|\StructType\DoCaptureResponseType|\StructType\DoDirectPaymentResponseType|\StructType\DoExpressCheckoutPaymentResponseType|\StructType\DoMobileCheckoutPaymentResponseType|\StructType\DoNonReferencedCreditResponseType|\StructType\DoReauthorizationResponseType|\StructType\DoReferenceTransactionResponseType|\StructType\DoUATPAuthorizationResponseType|\StructType\DoUATPExpressCheckoutPaymentResponseType|\StructType\DoVoidResponseType
     */
    public function getResult()
    {
        return parent::getResult();
    }
}
