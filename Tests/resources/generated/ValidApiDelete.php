<?php
use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Delete Service
 * @package Api
 * @subpackage Services
 * @release 1.1.0
 */
class ApiServiceDelete extends AbstractSoapClientBase
{
    /**
     * Sets the SessionHeader SoapHeader param
     * @uses AbstractSoapClientBase::setSoapHeader()
     * @param SessionHeader $sessionHeader
     * @param string $nameSpace
     * @param bool $mustUnderstand
     * @param string $actor
     * @return bool
     */
    public function setSoapHeaderSessionHeader($sessionHeader, $nameSpace = 'urn:api.actonsoftware.com', $mustUnderstand = false, $actor = null)
    {
        return $this->setSoapHeader($nameSpace, 'SessionHeader', $sessionHeader, $mustUnderstand, $actor);
    }
    /**
     * Sets the ClusterHeader SoapHeader param
     * @uses AbstractSoapClientBase::setSoapHeader()
     * @param ClusterHeader $clusterHeader
     * @param string $nameSpace
     * @param bool $mustUnderstand
     * @param string $actor
     * @return bool
     */
    public function setSoapHeaderClusterHeader($clusterHeader, $nameSpace = 'urn:api.actonsoftware.com', $mustUnderstand = false, $actor = null)
    {
        return $this->setSoapHeader($nameSpace, 'ClusterHeader', $clusterHeader, $mustUnderstand, $actor);
    }
    /**
     * Method to call the operation originally named deleteList
     * Meta informations extracted from the WSDL
     * - SOAPHeaderNames : SessionHeader, ClusterHeader
     * - SOAPHeaderNamespaces : urn:api.actonsoftware.com, urn:api.actonsoftware.com
     * - SOAPHeaderTypes : SessionHeader, ClusterHeader
     * - SOAPHeaders : optional, required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param ApiStructDeleteList $apiStructDeleteList
     * @return void
     */
    public function deleteList(ApiStructDeleteList $apiStructDeleteList)
    {
        try {
            return $this->setResult(self::getSoapClient()->deleteList($apiStructDeleteList));
        } catch(SoapFault $soapFault) {
            return !$this->saveLastError(__METHOD__, $soapFault);
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return void
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
