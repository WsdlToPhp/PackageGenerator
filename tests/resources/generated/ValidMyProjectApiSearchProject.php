<?php

declare(strict_types=1);

namespace My\Project\ServiceType;

use SoapFault;
use WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Search ServiceType
 * @package Api
 * @subpackage Services
 * @release 1.1.0
 */
class ApiSearchProject extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named Search
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \My\Project\StructType\ApiSearchRequestProject $parameters
     * @return \My\Project\StructType\ApiSearchResponseProject|bool
     */
    public function Search(\My\Project\StructType\ApiSearchRequestProject $parameters)
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
     * @return \My\Project\StructType\ApiSearchResponseProject
     */
    public function getResult()
    {
        return parent::getResult();
    }
}
