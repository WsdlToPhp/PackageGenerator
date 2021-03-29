<?php

declare(strict_types=1);

namespace ServiceType;

use SoapFault;
use WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Search ServiceType
 * @package BingApi
 * @subpackage Services
 * @release 1.1.0
 */
class SearchBingApi extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named Search
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\SearchRequestBingApi $parameters
     * @return \StructType\SearchResponseBingApi|bool
     */
    public function Search(\StructType\SearchRequestBingApi $parameters)
    {
        try {
            $this->setResult($resultSearch = $this->getSoapClient()->__soapCall('Search', [
                $parameters,
            ], [], [], $this->outputHeaders));
        
            return $resultSearch;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \StructType\SearchResponseBingApi
     */
    public function getResult()
    {
        return parent::getResult();
    }
}
