<?php

declare(strict_types=1);

namespace ServiceType;

use SoapFault;
use WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Delete ServiceType
 * @package Api
 * @subpackage Services
 * @release 1.1.0
 */
class ApiDelete extends AbstractSoapClientBase
{
    /**
     * Sets the SessionHeader SoapHeader param
     * @uses AbstractSoapClientBase::setSoapHeader()
     * @param \StructType\ApiSessionHeader $sessionHeader
     * @param string $namespace
     * @param bool $mustUnderstand
     * @param string|null $actor
     * @return \ServiceType\ApiDelete
     */
    public function setSoapHeaderSessionHeader(\StructType\ApiSessionHeader $sessionHeader, string $namespace = 'urn:api.actonsoftware.com', bool $mustUnderstand = false, ?string $actor = null): self
    {
        return $this->setSoapHeader($namespace, 'SessionHeader', $sessionHeader, $mustUnderstand, $actor);
    }
    /**
     * Sets the ClusterHeader SoapHeader param
     * @uses AbstractSoapClientBase::setSoapHeader()
     * @param \StructType\ApiClusterHeader $clusterHeader
     * @param string $namespace
     * @param bool $mustUnderstand
     * @param string|null $actor
     * @return \ServiceType\ApiDelete
     */
    public function setSoapHeaderClusterHeader(\StructType\ApiClusterHeader $clusterHeader, string $namespace = 'urn:api.actonsoftware.com', bool $mustUnderstand = false, ?string $actor = null): self
    {
        return $this->setSoapHeader($namespace, 'ClusterHeader', $clusterHeader, $mustUnderstand, $actor);
    }
    /**
     * Method to call the operation originally named deleteList
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: SessionHeader, ClusterHeader
     * - SOAPHeaderNamespaces: urn:api.actonsoftware.com, urn:api.actonsoftware.com
     * - SOAPHeaderTypes: \StructType\ApiSessionHeader, \StructType\ApiClusterHeader
     * - SOAPHeaders: optional, required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiDeleteList $parameter
     * @return void|bool
     */
    public function deleteList(\StructType\ApiDeleteList $parameter)
    {
        try {
            $this->setResult($resultDeleteList = $this->getSoapClient()->__soapCall('deleteList', [
                $parameter,
            ], [], [], $this->outputHeaders));
        
            return $resultDeleteList;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
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
}
