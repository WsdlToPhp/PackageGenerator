<?php

declare(strict_types=1);

namespace ServiceType;

use SoapFault;
use WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Authenticate ServiceType
 * @package Api
 * @subpackage Services
 * @release 1.1.0
 */
class ApiAuthenticate extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named AuthenticateAccount
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param AuthenticateAccount $authenticateAccount
     * @return AuthenticateAccountResponse|bool
     */
    public function AuthenticateAccount($authenticateAccount)
    {
        try {
            $this->setResult($resultAuthenticateAccount = $this->getSoapClient()->__soapCall('AuthenticateAccount', [
                $authenticateAccount,
            ], [], [], $this->outputHeaders));
        
            return $resultAuthenticateAccount;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named AuthenticateAdmin
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param AuthenticateAdmin $authenticateAdmin
     * @return AuthenticateAdminResponse|bool
     */
    public function AuthenticateAdmin($authenticateAdmin)
    {
        try {
            $this->setResult($resultAuthenticateAdmin = $this->getSoapClient()->__soapCall('AuthenticateAdmin', [
                $authenticateAdmin,
            ], [], [], $this->outputHeaders));
        
            return $resultAuthenticateAdmin;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named AuthenticateReseller
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param AuthenticateReseller $authenticateReseller
     * @return AuthenticateResellerResponse|bool
     */
    public function AuthenticateReseller($authenticateReseller)
    {
        try {
            $this->setResult($resultAuthenticateReseller = $this->getSoapClient()->__soapCall('AuthenticateReseller', [
                $authenticateReseller,
            ], [], [], $this->outputHeaders));
        
            return $resultAuthenticateReseller;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named AuthenticateCustomer
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param AuthenticateCustomer $authenticateCustomer
     * @return AuthenticateCustomerResponse|bool
     */
    public function AuthenticateCustomer($authenticateCustomer)
    {
        try {
            $this->setResult($resultAuthenticateCustomer = $this->getSoapClient()->__soapCall('AuthenticateCustomer', [
                $authenticateCustomer,
            ], [], [], $this->outputHeaders));
        
            return $resultAuthenticateCustomer;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return AuthenticateAccountResponse|AuthenticateAdminResponse|AuthenticateCustomerResponse|AuthenticateResellerResponse
     */
    public function getResult()
    {
        return parent::getResult();
    }
}
