<?php
/**
 * File for class ApiServiceSearch
 * @package Api
 * @subpackage Services
 * @release 1.1.0
 */
/**
 * This class stands for Search Service
 * @package Api
 * @subpackage Services
 * @release 1.1.0
 */
class ApiServiceSearch extends \WsdlToPhp\PackageBase\AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named Search
     * @uses ApiWsdlClass::getSoapClient()
     * @uses ApiWsdlClass::setResult()
     * @uses ApiWsdlClass::saveLastError()
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
     * @see ApiWsdlClass::getResult()
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
