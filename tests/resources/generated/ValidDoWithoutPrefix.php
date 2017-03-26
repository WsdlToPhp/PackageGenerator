<?php

namespace ServiceType;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

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
     * @param string $nameSpace
     * @param bool $mustUnderstand
     * @param string $actor
     * @return bool
     */
    public function setSoapHeaderRequesterCredentials(\StructType\CustomSecurityHeaderType $requesterCredentials, $nameSpace = 'urn:ebay:api:PayPalAPI', $mustUnderstand = false, $actor = null)
    {
        return $this->setSoapHeader($nameSpace, 'RequesterCredentials', $requesterCredentials, $mustUnderstand, $actor);
    }
    /**
     * Method to call the operation originally named DoMobileCheckoutPayment
     * Meta informations extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\CustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\DoMobileCheckoutPaymentReq $doMobileCheckoutPaymentRequest
     * @return \StructType\DoMobileCheckoutPaymentResponseType|bool
     */
    public function DoMobileCheckoutPayment(\StructType\DoMobileCheckoutPaymentReq $doMobileCheckoutPaymentRequest)
    {
        try {
            $this->setResult(self::getSoapClient()->DoMobileCheckoutPayment($doMobileCheckoutPaymentRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoExpressCheckoutPayment
     * Meta informations extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\CustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\DoExpressCheckoutPaymentReq $doExpressCheckoutPaymentRequest
     * @return \StructType\DoExpressCheckoutPaymentResponseType|bool
     */
    public function DoExpressCheckoutPayment(\StructType\DoExpressCheckoutPaymentReq $doExpressCheckoutPaymentRequest)
    {
        try {
            $this->setResult(self::getSoapClient()->DoExpressCheckoutPayment($doExpressCheckoutPaymentRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoUATPExpressCheckoutPayment
     * Meta informations extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\CustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\DoUATPExpressCheckoutPaymentReq $doUATPExpressCheckoutPaymentRequest
     * @return \StructType\DoUATPExpressCheckoutPaymentResponseType|bool
     */
    public function DoUATPExpressCheckoutPayment(\StructType\DoUATPExpressCheckoutPaymentReq $doUATPExpressCheckoutPaymentRequest)
    {
        try {
            $this->setResult(self::getSoapClient()->DoUATPExpressCheckoutPayment($doUATPExpressCheckoutPaymentRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoDirectPayment
     * Meta informations extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\CustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\DoDirectPaymentReq $doDirectPaymentRequest
     * @return \StructType\DoDirectPaymentResponseType|bool
     */
    public function DoDirectPayment(\StructType\DoDirectPaymentReq $doDirectPaymentRequest)
    {
        try {
            $this->setResult(self::getSoapClient()->DoDirectPayment($doDirectPaymentRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoCancel
     * Meta informations extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\CustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\DoCancelReq $doCancelRequest
     * @return \StructType\DoCancelResponseType|bool
     */
    public function DoCancel(\StructType\DoCancelReq $doCancelRequest)
    {
        try {
            $this->setResult(self::getSoapClient()->DoCancel($doCancelRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoCapture
     * Meta informations extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\CustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\DoCaptureReq $doCaptureRequest
     * @return \StructType\DoCaptureResponseType|bool
     */
    public function DoCapture(\StructType\DoCaptureReq $doCaptureRequest)
    {
        try {
            $this->setResult(self::getSoapClient()->DoCapture($doCaptureRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoReauthorization
     * Meta informations extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\CustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\DoReauthorizationReq $doReauthorizationRequest
     * @return \StructType\DoReauthorizationResponseType|bool
     */
    public function DoReauthorization(\StructType\DoReauthorizationReq $doReauthorizationRequest)
    {
        try {
            $this->setResult(self::getSoapClient()->DoReauthorization($doReauthorizationRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoVoid
     * Meta informations extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\CustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\DoVoidReq $doVoidRequest
     * @return \StructType\DoVoidResponseType|bool
     */
    public function DoVoid(\StructType\DoVoidReq $doVoidRequest)
    {
        try {
            $this->setResult(self::getSoapClient()->DoVoid($doVoidRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoAuthorization
     * Meta informations extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\CustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\DoAuthorizationReq $doAuthorizationRequest
     * @return \StructType\DoAuthorizationResponseType|bool
     */
    public function DoAuthorization(\StructType\DoAuthorizationReq $doAuthorizationRequest)
    {
        try {
            $this->setResult(self::getSoapClient()->DoAuthorization($doAuthorizationRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoUATPAuthorization
     * Meta informations extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\CustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\DoUATPAuthorizationReq $doUATPAuthorizationRequest
     * @return \StructType\DoUATPAuthorizationResponseType|bool
     */
    public function DoUATPAuthorization(\StructType\DoUATPAuthorizationReq $doUATPAuthorizationRequest)
    {
        try {
            $this->setResult(self::getSoapClient()->DoUATPAuthorization($doUATPAuthorizationRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoReferenceTransaction
     * Meta informations extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\CustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\DoReferenceTransactionReq $doReferenceTransactionRequest
     * @return \StructType\DoReferenceTransactionResponseType|bool
     */
    public function DoReferenceTransaction(\StructType\DoReferenceTransactionReq $doReferenceTransactionRequest)
    {
        try {
            $this->setResult(self::getSoapClient()->DoReferenceTransaction($doReferenceTransactionRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DoNonReferencedCredit
     * Meta informations extracted from the WSDL
     * - SOAPHeaderNames: RequesterCredentials
     * - SOAPHeaderNamespaces: urn:ebay:api:PayPalAPI
     * - SOAPHeaderTypes: \StructType\CustomSecurityHeaderType
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\DoNonReferencedCreditReq $doNonReferencedCreditRequest
     * @return \StructType\DoNonReferencedCreditResponseType|bool
     */
    public function DoNonReferencedCredit(\StructType\DoNonReferencedCreditReq $doNonReferencedCreditRequest)
    {
        try {
            $this->setResult(self::getSoapClient()->DoNonReferencedCredit($doNonReferencedCreditRequest));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
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
    /**
     * Method returning the class name
     * @return string __CLASS__
     */
    public function __toString()
    {
        return __CLASS__;
    }
}
