<?php

declare(strict_types=1);

namespace Api\ServiceType;

use SoapFault;
use WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Find ServiceType
 * @package Api
 * @subpackage Services
 * @release 1.1.0
 */
class ApiFind extends AbstractSoapClientBase
{
    /**
     * Sets the ExchangeImpersonation SoapHeader param
     * @uses AbstractSoapClientBase::setSoapHeader()
     * @param \Api\StructType\ApiExchangeImpersonationType $exchangeImpersonation
     * @param string $namespace
     * @param bool $mustUnderstand
     * @param string $actor
     * @return \Api\ServiceType\ApiFind
     */
    public function setSoapHeaderExchangeImpersonation(\Api\StructType\ApiExchangeImpersonationType $exchangeImpersonation, string $namespace = 'http://schemas.microsoft.com/exchange/services/2006/types', bool $mustUnderstand = false, ?string $actor = null): self
    {
        return $this->setSoapHeader($namespace, 'ExchangeImpersonation', $exchangeImpersonation, $mustUnderstand, $actor);
    }
    /**
     * Sets the MailboxCulture SoapHeader param
     * @uses AbstractSoapClientBase::setSoapHeader()
     * @param \Api\StructType\ApiMailboxCultureType $mailboxCulture
     * @param string $namespace
     * @param bool $mustUnderstand
     * @param string $actor
     * @return \Api\ServiceType\ApiFind
     */
    public function setSoapHeaderMailboxCulture(\Api\StructType\ApiMailboxCultureType $mailboxCulture, string $namespace = 'http://schemas.microsoft.com/exchange/services/2006/types', bool $mustUnderstand = false, ?string $actor = null): self
    {
        return $this->setSoapHeader($namespace, 'MailboxCulture', $mailboxCulture, $mustUnderstand, $actor);
    }
    /**
     * Sets the RequestServerVersion SoapHeader param
     * @uses AbstractSoapClientBase::setSoapHeader()
     * @param \Api\StructType\ApiRequestServerVersion $requestServerVersion
     * @param string $namespace
     * @param bool $mustUnderstand
     * @param string $actor
     * @return \Api\ServiceType\ApiFind
     */
    public function setSoapHeaderRequestServerVersion(\Api\StructType\ApiRequestServerVersion $requestServerVersion, string $namespace = 'http://schemas.microsoft.com/exchange/services/2006/types', bool $mustUnderstand = false, ?string $actor = null): self
    {
        return $this->setSoapHeader($namespace, 'RequestServerVersion', $requestServerVersion, $mustUnderstand, $actor);
    }
    /**
     * Sets the TimeZoneContext SoapHeader param
     * @uses AbstractSoapClientBase::setSoapHeader()
     * @param \Api\StructType\ApiTimeZoneContextType $timeZoneContext
     * @param string $namespace
     * @param bool $mustUnderstand
     * @param string $actor
     * @return \Api\ServiceType\ApiFind
     */
    public function setSoapHeaderTimeZoneContext(\Api\StructType\ApiTimeZoneContextType $timeZoneContext, string $namespace = 'http://schemas.microsoft.com/exchange/services/2006/types', bool $mustUnderstand = false, ?string $actor = null): self
    {
        return $this->setSoapHeader($namespace, 'TimeZoneContext', $timeZoneContext, $mustUnderstand, $actor);
    }
    /**
     * Sets the ManagementRole SoapHeader param
     * @uses AbstractSoapClientBase::setSoapHeader()
     * @param \Api\StructType\ApiManagementRoleType $managementRole
     * @param string $namespace
     * @param bool $mustUnderstand
     * @param string $actor
     * @return \Api\ServiceType\ApiFind
     */
    public function setSoapHeaderManagementRole(\Api\StructType\ApiManagementRoleType $managementRole, string $namespace = 'http://schemas.microsoft.com/exchange/services/2006/types', bool $mustUnderstand = false, ?string $actor = null): self
    {
        return $this->setSoapHeader($namespace, 'ManagementRole', $managementRole, $mustUnderstand, $actor);
    }
    /**
     * Sets the DateTimePrecision SoapHeader param
     * @uses \Api\EnumType\ApiDateTimePrecisionType::valueIsValid()
     * @uses \Api\EnumType\ApiDateTimePrecisionType::getValidValues()
     * @throws InvalidArgumentException
     * @uses AbstractSoapClientBase::setSoapHeader()
     * @param string $dateTimePrecision
     * @param string $namespace
     * @param bool $mustUnderstand
     * @param string $actor
     * @return \Api\ServiceType\ApiFind
     */
    public function setSoapHeaderDateTimePrecision(string $dateTimePrecision, string $namespace = 'http://schemas.microsoft.com/exchange/services/2006/types', bool $mustUnderstand = false, ?string $actor = null): self
    {
        // validation for constraint: enumeration
        if (!\Api\EnumType\ApiDateTimePrecisionType::valueIsValid($dateTimePrecision)) {
            throw new InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \Api\EnumType\ApiDateTimePrecisionType', is_array($dateTimePrecision) ? implode(', ', $dateTimePrecision) : var_export($dateTimePrecision, true), implode(', ', \Api\EnumType\ApiDateTimePrecisionType::getValidValues())), __LINE__);
        }
        return $this->setSoapHeader($namespace, 'DateTimePrecision', $dateTimePrecision, $mustUnderstand, $actor);
    }
    /**
     * Method to call the operation originally named FindFolder
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: ExchangeImpersonation, MailboxCulture, RequestServerVersion, TimeZoneContext, ManagementRole
     * - SOAPHeaderNamespaces: http://schemas.microsoft.com/exchange/services/2006/types, http://schemas.microsoft.com/exchange/services/2006/types, http://schemas.microsoft.com/exchange/services/2006/types, http://schemas.microsoft.com/exchange/services/2006/types, http://schemas.microsoft.com/exchange/services/2006/types
     * - SOAPHeaderTypes: \Api\StructType\ApiExchangeImpersonationType, \Api\StructType\ApiMailboxCultureType, \Api\StructType\ApiRequestServerVersion, \Api\StructType\ApiTimeZoneContextType, \Api\StructType\ApiManagementRoleType
     * - SOAPHeaders: required, required, required, required, required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiFindFolderType $request
     * @return \Api\StructType\ApiFindFolderResponseType|bool
     */
    public function FindFolder(\Api\StructType\ApiFindFolderType $request)
    {
        try {
            $this->setResult($resultFindFolder = $this->getSoapClient()->__soapCall('FindFolder', [
                $request,
            ], [], [], $this->outputHeaders));
        
            return $resultFindFolder;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named FindItem
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: ExchangeImpersonation, MailboxCulture, RequestServerVersion, TimeZoneContext, DateTimePrecision, ManagementRole
     * - SOAPHeaderNamespaces: http://schemas.microsoft.com/exchange/services/2006/types, http://schemas.microsoft.com/exchange/services/2006/types, http://schemas.microsoft.com/exchange/services/2006/types, http://schemas.microsoft.com/exchange/services/2006/types, http://schemas.microsoft.com/exchange/services/2006/types, http://schemas.microsoft.com/exchange/services/2006/types
     * - SOAPHeaderTypes: \Api\StructType\ApiExchangeImpersonationType, \Api\StructType\ApiMailboxCultureType, \Api\StructType\ApiRequestServerVersion, \Api\StructType\ApiTimeZoneContextType, \Api\EnumType\ApiDateTimePrecisionType, \Api\StructType\ApiManagementRoleType
     * - SOAPHeaders: required, required, required, required, required, required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiFindItemType $request
     * @return \Api\StructType\ApiFindItemResponseType|bool
     */
    public function FindItem(\Api\StructType\ApiFindItemType $request)
    {
        try {
            $this->setResult($resultFindItem = $this->getSoapClient()->__soapCall('FindItem', [
                $request,
            ], [], [], $this->outputHeaders));
        
            return $resultFindItem;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named FindMessageTrackingReport
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequestServerVersion
     * - SOAPHeaderNamespaces: http://schemas.microsoft.com/exchange/services/2006/types
     * - SOAPHeaderTypes: \Api\StructType\ApiRequestServerVersion
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiFindMessageTrackingReportRequestType $request
     * @return \Api\StructType\ApiFindMessageTrackingReportResponseMessageType|bool
     */
    public function FindMessageTrackingReport(\Api\StructType\ApiFindMessageTrackingReportRequestType $request)
    {
        try {
            $this->setResult($resultFindMessageTrackingReport = $this->getSoapClient()->__soapCall('FindMessageTrackingReport', [
                $request,
            ], [], [], $this->outputHeaders));
        
            return $resultFindMessageTrackingReport;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named FindConversation
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequestServerVersion, ExchangeImpersonation
     * - SOAPHeaderNamespaces: http://schemas.microsoft.com/exchange/services/2006/types, http://schemas.microsoft.com/exchange/services/2006/types
     * - SOAPHeaderTypes: \Api\StructType\ApiRequestServerVersion, \Api\StructType\ApiExchangeImpersonationType
     * - SOAPHeaders: required, required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiFindConversationType $request
     * @return \Api\StructType\ApiFindConversationResponseMessageType|bool
     */
    public function FindConversation(\Api\StructType\ApiFindConversationType $request)
    {
        try {
            $this->setResult($resultFindConversation = $this->getSoapClient()->__soapCall('FindConversation', [
                $request,
            ], [], [], $this->outputHeaders));
        
            return $resultFindConversation;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named FindPeople
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequestServerVersion, ExchangeImpersonation
     * - SOAPHeaderNamespaces: http://schemas.microsoft.com/exchange/services/2006/types, http://schemas.microsoft.com/exchange/services/2006/types
     * - SOAPHeaderTypes: \Api\StructType\ApiRequestServerVersion, \Api\StructType\ApiExchangeImpersonationType
     * - SOAPHeaders: required, required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiFindPeopleType $request
     * @return \Api\StructType\ApiFindPeopleResponseMessageType|bool
     */
    public function FindPeople(\Api\StructType\ApiFindPeopleType $request)
    {
        try {
            $this->setResult($resultFindPeople = $this->getSoapClient()->__soapCall('FindPeople', [
                $request,
            ], [], [], $this->outputHeaders));
        
            return $resultFindPeople;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named FindAvailableMeetingTimes
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequestServerVersion
     * - SOAPHeaderNamespaces: http://schemas.microsoft.com/exchange/services/2006/types
     * - SOAPHeaderTypes: \Api\StructType\ApiRequestServerVersion
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiFindAvailableMeetingTimesType $request
     * @return \Api\StructType\ApiFindAvailableMeetingTimesResponseMessageType|bool
     */
    public function FindAvailableMeetingTimes(\Api\StructType\ApiFindAvailableMeetingTimesType $request)
    {
        try {
            $this->setResult($resultFindAvailableMeetingTimes = $this->getSoapClient()->__soapCall('FindAvailableMeetingTimes', [
                $request,
            ], [], [], $this->outputHeaders));
        
            return $resultFindAvailableMeetingTimes;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named FindMeetingTimeCandidates
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: RequestServerVersion
     * - SOAPHeaderNamespaces: http://schemas.microsoft.com/exchange/services/2006/types
     * - SOAPHeaderTypes: \Api\StructType\ApiRequestServerVersion
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiFindMeetingTimeCandidatesType $request
     * @return \Api\StructType\ApiFindMeetingTimeCandidatesResponseMessageType|bool
     */
    public function FindMeetingTimeCandidates(\Api\StructType\ApiFindMeetingTimeCandidatesType $request)
    {
        try {
            $this->setResult($resultFindMeetingTimeCandidates = $this->getSoapClient()->__soapCall('FindMeetingTimeCandidates', [
                $request,
            ], [], [], $this->outputHeaders));
        
            return $resultFindMeetingTimeCandidates;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \Api\StructType\ApiFindAvailableMeetingTimesResponseMessageType|\Api\StructType\ApiFindConversationResponseMessageType|\Api\StructType\ApiFindFolderResponseType|\Api\StructType\ApiFindItemResponseType|\Api\StructType\ApiFindMeetingTimeCandidatesResponseMessageType|\Api\StructType\ApiFindMessageTrackingReportResponseMessageType|\Api\StructType\ApiFindPeopleResponseMessageType
     */
    public function getResult()
    {
        return parent::getResult();
    }
}
