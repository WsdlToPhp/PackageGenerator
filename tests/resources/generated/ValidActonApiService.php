<?php

namespace Api\ServiceType;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for all operations
 * @package Api
 * @subpackage Services
 * @release 1.1.0
 */
class ApiService extends AbstractSoapClientBase
{
    /**
     * Sets the ClusterHeader SoapHeader param
     * @uses AbstractSoapClientBase::setSoapHeader()
     * @param \Api\StructType\ApiClusterHeader $clusterHeader
     * @param string $nameSpace
     * @param bool $mustUnderstand
     * @param string $actor
     * @return bool
     */
    public function setSoapHeaderClusterHeader(\Api\StructType\ApiClusterHeader $clusterHeader, $nameSpace = 'urn:api.actonsoftware.com', $mustUnderstand = false, $actor = null)
    {
        return $this->setSoapHeader($nameSpace, 'ClusterHeader', $clusterHeader, $mustUnderstand, $actor);
    }
    /**
     * Sets the SessionHeader SoapHeader param
     * @uses AbstractSoapClientBase::setSoapHeader()
     * @param \Api\StructType\ApiSessionHeader $sessionHeader
     * @param string $nameSpace
     * @param bool $mustUnderstand
     * @param string $actor
     * @return bool
     */
    public function setSoapHeaderSessionHeader(\Api\StructType\ApiSessionHeader $sessionHeader, $nameSpace = 'urn:api.actonsoftware.com', $mustUnderstand = false, $actor = null)
    {
        return $this->setSoapHeader($nameSpace, 'SessionHeader', $sessionHeader, $mustUnderstand, $actor);
    }
    /**
     * Method to call the operation originally named login
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: ClusterHeader
     * - SOAPHeaderNamespaces: urn:api.actonsoftware.com
     * - SOAPHeaderTypes: \Api\StructType\ApiClusterHeader
     * - SOAPHeaders: required
     * - documentation: Login to the service. This must be the first call to obtain the SessionID for all subsequent API calls
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiLogin $parameter
     * @return \Api\StructType\ApiLoginResponse|bool
     */
    public function login(\Api\StructType\ApiLogin $parameter)
    {
        try {
            $this->setResult($this->getSoapClient()->login($parameter));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named sendEmail
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: SessionHeader, ClusterHeader
     * - SOAPHeaderNamespaces: urn:api.actonsoftware.com, urn:api.actonsoftware.com
     * - SOAPHeaderTypes: \Api\StructType\ApiSessionHeader, \Api\StructType\ApiClusterHeader
     * - SOAPHeaders: optional, optional
     * - documentation: Schedule an email to be sent.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiSendEmail $parameter
     * @return \Api\StructType\ApiSendEmailResponse|bool
     */
    public function sendEmail(\Api\StructType\ApiSendEmail $parameter)
    {
        try {
            $this->setResult($this->getSoapClient()->sendEmail($parameter));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named list
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: SessionHeader, ClusterHeader
     * - SOAPHeaderNamespaces: urn:api.actonsoftware.com, urn:api.actonsoftware.com
     * - SOAPHeaderTypes: \Api\StructType\ApiSessionHeader, \Api\StructType\ApiClusterHeader
     * - SOAPHeaders: optional, required
     * - documentation: Obtain a listing of different types of items in the system (e.g. CONTACT_LISTS)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiList $parameter
     * @return \Api\StructType\ApiListResponse|bool
     */
    public function _list(\Api\StructType\ApiList $parameter)
    {
        try {
            $this->setResult($this->getSoapClient()->list($parameter));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named uploadList
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: SessionHeader, ClusterHeader
     * - SOAPHeaderNamespaces: urn:api.actonsoftware.com, urn:api.actonsoftware.com
     * - SOAPHeaderTypes: \Api\StructType\ApiSessionHeader, \Api\StructType\ApiClusterHeader
     * - SOAPHeaders: optional, required
     * - documentation: Upload a new contact list or merge records into an existing list.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiUploadList $parameter
     * @return \Api\StructType\ApiUploadListResponse|bool
     */
    public function uploadList(\Api\StructType\ApiUploadList $parameter)
    {
        try {
            $this->setResult($this->getSoapClient()->uploadList($parameter));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named getUploadResult
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: SessionHeader, ClusterHeader
     * - SOAPHeaderNamespaces: urn:api.actonsoftware.com, urn:api.actonsoftware.com
     * - SOAPHeaderTypes: \Api\StructType\ApiSessionHeader, \Api\StructType\ApiClusterHeader
     * - SOAPHeaders: required, required
     * - documentation: Poll for the results of an asynchronous running upload/merge request
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiGetUploadResultRequest $parameter
     * @return \Api\StructType\ApiGetUploadResultResponse|bool
     */
    public function getUploadResult(\Api\StructType\ApiGetUploadResultRequest $parameter)
    {
        try {
            $this->setResult($this->getSoapClient()->getUploadResult($parameter));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named downloadList
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: SessionHeader, ClusterHeader
     * - SOAPHeaderNamespaces: urn:api.actonsoftware.com, urn:api.actonsoftware.com
     * - SOAPHeaderTypes: \Api\StructType\ApiSessionHeader, \Api\StructType\ApiClusterHeader
     * - SOAPHeaders: optional, required
     * - documentation: Download the records of a contact list
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiDownloadList $parameter
     * @return \Api\StructType\ApiAttachmentType|bool
     */
    public function downloadList(\Api\StructType\ApiDownloadList $parameter)
    {
        try {
            $this->setResult($this->getSoapClient()->downloadList($parameter));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named messageReport
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: SessionHeader, ClusterHeader
     * - SOAPHeaderNamespaces: urn:api.actonsoftware.com, urn:api.actonsoftware.com
     * - SOAPHeaderTypes: \Api\StructType\ApiSessionHeader, \Api\StructType\ApiClusterHeader
     * - SOAPHeaders: optional, required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiMessageReport $parameter
     * @return \Api\StructType\ApiMessageReportResponse|bool
     */
    public function messageReport(\Api\StructType\ApiMessageReport $parameter)
    {
        try {
            $this->setResult($this->getSoapClient()->messageReport($parameter));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named deleteList
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: SessionHeader, ClusterHeader
     * - SOAPHeaderNamespaces: urn:api.actonsoftware.com, urn:api.actonsoftware.com
     * - SOAPHeaderTypes: \Api\StructType\ApiSessionHeader, \Api\StructType\ApiClusterHeader
     * - SOAPHeaders: optional, required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiDeleteList $parameter
     * @return void|bool
     */
    public function deleteList(\Api\StructType\ApiDeleteList $parameter)
    {
        try {
            $this->setResult($this->getSoapClient()->deleteList($parameter));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return void|\Api\StructType\ApiAttachmentType|\Api\StructType\ApiGetUploadResultResponse|\Api\StructType\ApiListResponse|\Api\StructType\ApiLoginResponse|\Api\StructType\ApiMessageReportResponse|\Api\StructType\ApiSendEmailResponse|\Api\StructType\ApiUploadListResponse
     */
    public function getResult()
    {
        return parent::getResult();
    }
}
