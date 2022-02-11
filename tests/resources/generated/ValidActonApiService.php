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
     * Sets the ClusterHeader SoapHeader param
     * @uses AbstractSoapClientBase::setSoapHeader()
     * @param \StructType\ApiClusterHeader $clusterHeader
     * @param string $namespace
     * @param bool $mustUnderstand
     * @param string|null $actor
     * @return \ServiceType\ApiService
     */
    public function setSoapHeaderClusterHeader(\StructType\ApiClusterHeader $clusterHeader, string $namespace = 'urn:api.actonsoftware.com', bool $mustUnderstand = false, ?string $actor = null): self
    {
        return $this->setSoapHeader($namespace, 'ClusterHeader', $clusterHeader, $mustUnderstand, $actor);
    }
    /**
     * Sets the SessionHeader SoapHeader param
     * @uses AbstractSoapClientBase::setSoapHeader()
     * @param \StructType\ApiSessionHeader $sessionHeader
     * @param string $namespace
     * @param bool $mustUnderstand
     * @param string|null $actor
     * @return \ServiceType\ApiService
     */
    public function setSoapHeaderSessionHeader(\StructType\ApiSessionHeader $sessionHeader, string $namespace = 'urn:api.actonsoftware.com', bool $mustUnderstand = false, ?string $actor = null): self
    {
        return $this->setSoapHeader($namespace, 'SessionHeader', $sessionHeader, $mustUnderstand, $actor);
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
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiLogin $parameter
     * @return \StructType\ApiLoginResponse|bool
     */
    public function login(\StructType\ApiLogin $parameter)
    {
        try {
            $this->setResult($resultLogin = $this->getSoapClient()->__soapCall('login', [
                $parameter,
            ], [], [], $this->outputHeaders));
        
            return $resultLogin;
        } catch (SoapFault $soapFault) {
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
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiSendEmail $parameter
     * @return \StructType\ApiSendEmailResponse|bool
     */
    public function sendEmail(\StructType\ApiSendEmail $parameter)
    {
        try {
            $this->setResult($resultSendEmail = $this->getSoapClient()->__soapCall('sendEmail', [
                $parameter,
            ], [], [], $this->outputHeaders));
        
            return $resultSendEmail;
        } catch (SoapFault $soapFault) {
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
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiList $parameter
     * @return \StructType\ApiListResponse|bool
     */
    public function _list(\StructType\ApiList $parameter)
    {
        try {
            $this->setResult($resultList = $this->getSoapClient()->__soapCall('list', [
                $parameter,
            ], [], [], $this->outputHeaders));
        
            return $resultList;
        } catch (SoapFault $soapFault) {
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
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiUploadList $parameter
     * @return \StructType\ApiUploadListResponse|bool
     */
    public function uploadList(\StructType\ApiUploadList $parameter)
    {
        try {
            $this->setResult($resultUploadList = $this->getSoapClient()->__soapCall('uploadList', [
                $parameter,
            ], [], [], $this->outputHeaders));
        
            return $resultUploadList;
        } catch (SoapFault $soapFault) {
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
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiGetUploadResultRequest $parameter
     * @return \StructType\ApiGetUploadResultResponse|bool
     */
    public function getUploadResult(\StructType\ApiGetUploadResultRequest $parameter)
    {
        try {
            $this->setResult($resultGetUploadResult = $this->getSoapClient()->__soapCall('getUploadResult', [
                $parameter,
            ], [], [], $this->outputHeaders));
        
            return $resultGetUploadResult;
        } catch (SoapFault $soapFault) {
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
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiDownloadList $parameter
     * @return \StructType\ApiAttachmentType|bool
     */
    public function downloadList(\StructType\ApiDownloadList $parameter)
    {
        try {
            $this->setResult($resultDownloadList = $this->getSoapClient()->__soapCall('downloadList', [
                $parameter,
            ], [], [], $this->outputHeaders));
        
            return $resultDownloadList;
        } catch (SoapFault $soapFault) {
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
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiMessageReport $parameter
     * @return \StructType\ApiMessageReportResponse|bool
     */
    public function messageReport(\StructType\ApiMessageReport $parameter)
    {
        try {
            $this->setResult($resultMessageReport = $this->getSoapClient()->__soapCall('messageReport', [
                $parameter,
            ], [], [], $this->outputHeaders));
        
            return $resultMessageReport;
        } catch (SoapFault $soapFault) {
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
     * @return void|\StructType\ApiAttachmentType|\StructType\ApiGetUploadResultResponse|\StructType\ApiListResponse|\StructType\ApiLoginResponse|\StructType\ApiMessageReportResponse|\StructType\ApiSendEmailResponse|\StructType\ApiUploadListResponse
     */
    public function getResult()
    {
        return parent::getResult();
    }
}
