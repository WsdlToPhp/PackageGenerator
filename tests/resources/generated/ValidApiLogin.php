<?php

declare(strict_types=1);

namespace ServiceType;

use SoapFault;
use WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Login ServiceType
 * @package Api
 * @subpackage Services
 * @release 1.1.0
 */
class ApiLogin extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named Login
     * Meta information extracted from the WSDL
     * - documentation: Выполняет авторизацию внешней системы и открывает сеанс работы
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $login
     * @param string $password
     * @return string|bool
     */
    public function Login($login, $password)
    {
        try {
            $this->setResult($resultLogin = $this->getSoapClient()->__soapCall('Login', [
                $login,
                $password,
            ], [], [], $this->outputHeaders));
        
            return $resultLogin;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return string
     */
    public function getResult()
    {
        return parent::getResult();
    }
}
