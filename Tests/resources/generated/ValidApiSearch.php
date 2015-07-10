<?php
use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Search Service
 * @package Api
 * @subpackage Services
 * @release 1.1.0
 */
class ApiServiceSearch extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named Search
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param ApiStructSearchRequest $apiStructSearchRequest
     * @return ApiStructSearchResponse
     */
    public function Search(ApiStructSearchRequest $apiStructSearchRequest)
    {
        try {
            return $this->setResult(self::getSoapClient()->Search($apiStructSearchRequest));
        } catch(SoapFault $soapFault) {
            return !$this->saveLastError(__METHOD__, $soapFault);
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return ApiStructSearchResponse
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
