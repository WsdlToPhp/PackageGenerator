<?php

namespace ServiceType;

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
     * @param \StructType\ApiClusterHeader $clusterHeader
     * @param string $nameSpace
     * @param bool $mustUnderstand
     * @param string $actor
     * @return bool
     */
    public function setSoapHeaderClusterHeader(\StructType\ApiClusterHeader $clusterHeader, $nameSpace = 'urn:api.actonsoftware.com', $mustUnderstand = false, $actor = null)
    {
        return $this->setSoapHeader($nameSpace, 'ClusterHeader', $clusterHeader, $mustUnderstand, $actor);
    }
    /**
     * Sets the SessionHeader SoapHeader param
     * @uses AbstractSoapClientBase::setSoapHeader()
     * @param \StructType\ApiSessionHeader $sessionHeader
     * @param string $nameSpace
     * @param bool $mustUnderstand
     * @param string $actor
     * @return bool
     */
    public function setSoapHeaderSessionHeader(\StructType\ApiSessionHeader $sessionHeader, $nameSpace = 'urn:api.actonsoftware.com', $mustUnderstand = false, $actor = null)
    {
        return $this->setSoapHeader($nameSpace, 'SessionHeader', $sessionHeader, $mustUnderstand, $actor);
    }
    /**
     * Method to call the operation originally named login
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: ClusterHeader
     * - SOAPHeaderNamespaces: urn:api.actonsoftware.com
     * - SOAPHeaderTypes: \StructType\ApiClusterHeader
     * - SOAPHeaders: required
     * - documentation: Login to the service. This must be the first call to obtain the SessionID for all subsequent API calls
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiLogin $parameter
     * @return \StructType\ApiLoginResponse|bool
     */
    public function login(\StructType\ApiLogin $parameter)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('login', array(
                $parameter,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiSessionHeader, \StructType\ApiClusterHeader
     * - SOAPHeaders: optional, optional
     * - documentation: Schedule an email to be sent.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiSendEmail $parameter
     * @return \StructType\ApiSendEmailResponse|bool
     */
    public function sendEmail(\StructType\ApiSendEmail $parameter)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('sendEmail', array(
                $parameter,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiSessionHeader, \StructType\ApiClusterHeader
     * - SOAPHeaders: optional, required
     * - documentation: Obtain a listing of different types of items in the system (e.g. CONTACT_LISTS)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiList $parameter
     * @return \StructType\ApiListResponse|bool
     */
    public function _list(\StructType\ApiList $parameter)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('list', array(
                $parameter,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiSessionHeader, \StructType\ApiClusterHeader
     * - SOAPHeaders: optional, required
     * - documentation: Upload a new contact list or merge records into an existing list.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiUploadList $parameter
     * @return \StructType\ApiUploadListResponse|bool
     */
    public function uploadList(\StructType\ApiUploadList $parameter)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('uploadList', array(
                $parameter,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiSessionHeader, \StructType\ApiClusterHeader
     * - SOAPHeaders: required, required
     * - documentation: Poll for the results of an asynchronous running upload/merge request
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiGetUploadResultRequest $parameter
     * @return \StructType\ApiGetUploadResultResponse|bool
     */
    public function getUploadResult(\StructType\ApiGetUploadResultRequest $parameter)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('getUploadResult', array(
                $parameter,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiSessionHeader, \StructType\ApiClusterHeader
     * - SOAPHeaders: optional, required
     * - documentation: Download the records of a contact list
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiDownloadList $parameter
     * @return \StructType\ApiAttachmentType|bool
     */
    public function downloadList(\StructType\ApiDownloadList $parameter)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('downloadList', array(
                $parameter,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiSessionHeader, \StructType\ApiClusterHeader
     * - SOAPHeaders: optional, required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiMessageReport $parameter
     * @return \StructType\ApiMessageReportResponse|bool
     */
    public function messageReport(\StructType\ApiMessageReport $parameter)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('messageReport', array(
                $parameter,
            ), array(), array(), $this->outputHeaders));
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
     * - SOAPHeaderTypes: \StructType\ApiSessionHeader, \StructType\ApiClusterHeader
     * - SOAPHeaders: optional, required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiDeleteList $parameter
     * @return void|bool
     */
    public function deleteList(\StructType\ApiDeleteList $parameter)
    {
        try {
            $this->setResult($this->getSoapClient()->__soapCall('deleteList', array(
                $parameter,
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
     * @return void|\StructType\ApiAttachmentType|\StructType\ApiGetUploadResultResponse|\StructType\ApiListResponse|\StructType\ApiLoginResponse|\StructType\ApiMessageReportResponse|\StructType\ApiSendEmailResponse|\StructType\ApiUploadListResponse
     */
    public function getResult()
    {
        return parent::getResult();
    }
}
