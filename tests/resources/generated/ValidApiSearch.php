<?php

namespace ServiceType;

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
     * @param \StructType\ApiSearchRequest $parameters
     * @return \StructType\ApiSearchResponse|bool
     */
    public function Search(\StructType\ApiSearchRequest $parameters)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('Search', array(
                $parameters,
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
     * @return \StructType\ApiSearchResponse
     */
    public function getResult()
    {
        return parent::getResult();
    }
}
