<?php

declare(strict_types=1);

namespace ServiceType;

use SoapFault;
use WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for all operations
 * @package Api
 * @subpackage Services
 * @release 1.1.0
 */
class ApiService extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named Search
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiSearchRequest $parameters
     * @return \StructType\ApiSearchResponse|bool
     */
    public function Search(\StructType\ApiSearchRequest $parameters)
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
     * @return \StructType\ApiSearchResponse
     */
    public function getResult()
    {
        return parent::getResult();
    }
}
