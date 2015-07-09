<?php
/**
 * File for class ApiServiceAuthenticate
 * @package Api
 * @subpackage Services
 * @release 1.1.0
 */
/**
 * This class stands for Authenticate Service
 * @package Api
 * @subpackage Services
 * @release 1.1.0
 */
class ApiServiceAuthenticate extends \WsdlToPhp\PackageBase\AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named AuthenticateAccount
     * @uses ApiWsdlClass::getSoapClient()
     * @uses ApiWsdlClass::setResult()
     * @uses ApiWsdlClass::saveLastError()
     * @param AuthenticateAccount $authenticateAccount
     * @return AuthenticateAccountResponse
     */
    public function AuthenticateAccount($authenticateAccount)
    {
        try {
            return $this->setResult(self::getSoapClient()->AuthenticateAccount($authenticateAccount));
        } catch(SoapFault $soapFault) {
            return !$this->saveLastError(__METHOD__, $soapFault);
        }
    }
    /**
     * Method to call the operation originally named AuthenticateAdmin
     * @uses ApiWsdlClass::getSoapClient()
     * @uses ApiWsdlClass::setResult()
     * @uses ApiWsdlClass::saveLastError()
     * @param AuthenticateAdmin $authenticateAdmin
     * @return AuthenticateAdminResponse
     */
    public function AuthenticateAdmin($authenticateAdmin)
    {
        try {
            return $this->setResult(self::getSoapClient()->AuthenticateAdmin($authenticateAdmin));
        } catch(SoapFault $soapFault) {
            return !$this->saveLastError(__METHOD__, $soapFault);
        }
    }
    /**
     * Method to call the operation originally named AuthenticateReseller
     * @uses ApiWsdlClass::getSoapClient()
     * @uses ApiWsdlClass::setResult()
     * @uses ApiWsdlClass::saveLastError()
     * @param AuthenticateReseller $authenticateReseller
     * @return AuthenticateResellerResponse
     */
    public function AuthenticateReseller($authenticateReseller)
    {
        try {
            return $this->setResult(self::getSoapClient()->AuthenticateReseller($authenticateReseller));
        } catch(SoapFault $soapFault) {
            return !$this->saveLastError(__METHOD__, $soapFault);
        }
    }
    /**
     * Method to call the operation originally named AuthenticateCustomer
     * @uses ApiWsdlClass::getSoapClient()
     * @uses ApiWsdlClass::setResult()
     * @uses ApiWsdlClass::saveLastError()
     * @param AuthenticateCustomer $authenticateCustomer
     * @return AuthenticateCustomerResponse
     */
    public function AuthenticateCustomer($authenticateCustomer)
    {
        try {
            return $this->setResult(self::getSoapClient()->AuthenticateCustomer($authenticateCustomer));
        } catch(SoapFault $soapFault) {
            return !$this->saveLastError(__METHOD__, $soapFault);
        }
    }
    /**
     * Returns the result
     * @see ApiWsdlClass::getResult()
     * @return AuthenticateAccountResponse|AuthenticateAdminResponse|AuthenticateCustomerResponse|AuthenticateResellerResponse
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
