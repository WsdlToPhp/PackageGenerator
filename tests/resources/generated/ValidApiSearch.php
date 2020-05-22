<?php

namespace Api\ServiceType;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Search ServiceType
 * @package Api
 * @subpackage Services
 * @release 1.1.0
 */
class ApiSearch extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named Search
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiSearchRequest $parameters
     * @return \Api\StructType\ApiSearchResponse|bool
     */
    public function Search(\Api\StructType\ApiSearchRequest $parameters)
    {
        try {
            $this->setResult($this->getSoapClient()->Search($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \Api\StructType\ApiSearchResponse
     */
    public function getResult()
    {
        return parent::getResult();
    }
}
