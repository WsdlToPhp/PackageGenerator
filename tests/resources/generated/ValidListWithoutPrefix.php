<?php

declare(strict_types=1);

namespace ServiceType;

use SoapFault;
use WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for List ServiceType
 * @subpackage Services
 * @release 1.1.0
 */
class _List extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named listPaymentMethods
     * Meta information extracted from the WSDL
     * - documentation: List the payment methods. To be implemented in a future minor version upgrade.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ListPaymentMethodsRequest $parameters
     * @return \StructType\ListPaymentMethodsResponse|bool
     */
    public function listPaymentMethods(\StructType\ListPaymentMethodsRequest $parameters)
    {
        try {
            $this->setResult($resultListPaymentMethods = $this->getSoapClient()->__soapCall('listPaymentMethods', [
                $parameters,
            ], [], [], $this->outputHeaders));
        
            return $resultListPaymentMethods;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \StructType\ListPaymentMethodsResponse
     */
    public function getResult()
    {
        return parent::getResult();
    }
}
