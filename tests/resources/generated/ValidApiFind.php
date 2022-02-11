<?php

declare(strict_types=1);

namespace ServiceType;

use SoapFault;
use InvalidArgumentException;
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
     * @param \StructType\ApiExchangeImpersonationType $exchangeImpersonation
     * @param string $namespace
     * @param bool $mustUnderstand
     * @param string $actor
     * @return \ServiceType\ApiFind
     */
    public function setSoapHeaderExchangeImpersonation(\StructType\ApiExchangeImpersonationType $exchangeImpersonation, string $namespace = 'http://schemas.microsoft.com/exchange/services/2006/types', bool $mustUnderstand = false, ?string $actor = null): self
    {
        return $this->setSoapHeader($namespace, 'ExchangeImpersonation', $exchangeImpersonation, $mustUnderstand, $actor);
    }
    /**
     * Sets the MailboxCulture SoapHeader param
     * @uses AbstractSoapClientBase::setSoapHeader()
     * @param \StructType\ApiMailboxCultureType $mailboxCulture
     * @param string $namespace
     * @param bool $mustUnderstand
     * @param string $actor
     * @return \ServiceType\ApiFind
     */
    public function setSoapHeaderMailboxCulture(\StructType\ApiMailboxCultureType $mailboxCulture, string $namespace = 'http://schemas.microsoft.com/exchange/services/2006/types', bool $mustUnderstand = false, ?string $actor = null): self
    {
        return $this->setSoapHeader($namespace, 'MailboxCulture', $mailboxCulture, $mustUnderstand, $actor);
    }
    /**
     * Sets the RequestServerVersion SoapHeader param
     * @uses AbstractSoapClientBase::setSoapHeader()
     * @param \StructType\ApiRequestServerVersion $requestServerVersion
     * @param string $namespace
     * @param bool $mustUnderstand
     * @param string $actor
     * @return \ServiceType\ApiFind
     */
    public function setSoapHeaderRequestServerVersion(\StructType\ApiRequestServerVersion $requestServerVersion, string $namespace = 'http://schemas.microsoft.com/exchange/services/2006/types', bool $mustUnderstand = false, ?string $actor = null): self
    {
        return $this->setSoapHeader($namespace, 'RequestServerVersion', $requestServerVersion, $mustUnderstand, $actor);
    }
    /**
     * Sets the TimeZoneContext SoapHeader param
     * @uses AbstractSoapClientBase::setSoapHeader()
     * @param \StructType\ApiTimeZoneContextType $timeZoneContext
     * @param string $namespace
     * @param bool $mustUnderstand
     * @param string $actor
     * @return \ServiceType\ApiFind
     */
    public function setSoapHeaderTimeZoneContext(\StructType\ApiTimeZoneContextType $timeZoneContext, string $namespace = 'http://schemas.microsoft.com/exchange/services/2006/types', bool $mustUnderstand = false, ?string $actor = null): self
    {
        return $this->setSoapHeader($namespace, 'TimeZoneContext', $timeZoneContext, $mustUnderstand, $actor);
    }
    /**
     * Sets the ManagementRole SoapHeader param
     * @uses AbstractSoapClientBase::setSoapHeader()
     * @param \StructType\ApiManagementRoleType $managementRole
     * @param string $namespace
     * @param bool $mustUnderstand
     * @param string $actor
     * @return \ServiceType\ApiFind
     */
    public function setSoapHeaderManagementRole(\StructType\ApiManagementRoleType $managementRole, string $namespace = 'http://schemas.microsoft.com/exchange/services/2006/types', bool $mustUnderstand = false, ?string $actor = null): self
    {
        return $this->setSoapHeader($namespace, 'ManagementRole', $managementRole, $mustUnderstand, $actor);
    }
    /**
     * Sets the DateTimePrecision SoapHeader param
     * @uses \EnumType\ApiDateTimePrecisionType::valueIsValid()
     * @uses \EnumType\ApiDateTimePrecisionType::getValidValues()
     * @throws InvalidArgumentException
     * @uses AbstractSoapClientBase::setSoapHeader()
     * @param string $dateTimePrecision
     * @param string $namespace
     * @param bool $mustUnderstand
     * @param string $actor
     * @return \ServiceType\ApiFind
     */
    public function setSoapHeaderDateTimePrecision(string $dateTimePrecision, string $namespace = 'http://schemas.microsoft.com/exchange/services/2006/types', bool $mustUnderstand = false, ?string $actor = null): self
    {
        // validation for constraint: enumeration
        if (!\EnumType\ApiDateTimePrecisionType::valueIsValid($dateTimePrecision)) {
            throw new InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \EnumType\ApiDateTimePrecisionType', is_array($dateTimePrecision) ? implode(', ', $dateTimePrecision) : var_export($dateTimePrecision, true), implode(', ', \EnumType\ApiDateTimePrecisionType::getValidValues())), __LINE__);
        }
        return $this->setSoapHeader($namespace, 'DateTimePrecision', $dateTimePrecision, $mustUnderstand, $actor);
    }
    /**
     * Method to call the operation originally named FindFolder
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: ExchangeImpersonation, MailboxCulture, RequestServerVersion, TimeZoneContext, ManagementRole
     * - SOAPHeaderNamespaces: http://schemas.microsoft.com/exchange/services/2006/types, http://schemas.microsoft.com/exchange/services/2006/types, http://schemas.microsoft.com/exchange/services/2006/types, http://schemas.microsoft.com/exchange/services/2006/types, http://schemas.microsoft.com/exchange/services/2006/types
     * - SOAPHeaderTypes: \StructType\ApiExchangeImpersonationType, \StructType\ApiMailboxCultureType, \StructType\ApiRequestServerVersion, \StructType\ApiTimeZoneContextType, \StructType\ApiManagementRoleType
     * - SOAPHeaders: required, required, required, required, required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiFindFolderType $request
     * @return \StructType\ApiFindFolderResponseType|bool
     */
    public function FindFolder(\StructType\ApiFindFolderType $request)
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
     * - SOAPHeaderTypes: \StructType\ApiExchangeImpersonationType, \StructType\ApiMailboxCultureType, \StructType\ApiRequestServerVersion, \StructType\ApiTimeZoneContextType, \EnumType\ApiDateTimePrecisionType, \StructType\ApiManagementRoleType
     * - SOAPHeaders: required, required, required, required, required, required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiFindItemType $request
     * @return \StructType\ApiFindItemResponseType|bool
     */
    public function FindItem(\StructType\ApiFindItemType $request)
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
     * - SOAPHeaderTypes: \StructType\ApiRequestServerVersion
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiFindMessageTrackingReportRequestType $request
     * @return \StructType\ApiFindMessageTrackingReportResponseMessageType|bool
     */
    public function FindMessageTrackingReport(\StructType\ApiFindMessageTrackingReportRequestType $request)
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
     * - SOAPHeaderTypes: \StructType\ApiRequestServerVersion, \StructType\ApiExchangeImpersonationType
     * - SOAPHeaders: required, required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiFindConversationType $request
     * @return \StructType\ApiFindConversationResponseMessageType|bool
     */
    public function FindConversation(\StructType\ApiFindConversationType $request)
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
     * - SOAPHeaderTypes: \StructType\ApiRequestServerVersion, \StructType\ApiExchangeImpersonationType
     * - SOAPHeaders: required, required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiFindPeopleType $request
     * @return \StructType\ApiFindPeopleResponseMessageType|bool
     */
    public function FindPeople(\StructType\ApiFindPeopleType $request)
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
     * - SOAPHeaderTypes: \StructType\ApiRequestServerVersion
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiFindAvailableMeetingTimesType $request
     * @return \StructType\ApiFindAvailableMeetingTimesResponseMessageType|bool
     */
    public function FindAvailableMeetingTimes(\StructType\ApiFindAvailableMeetingTimesType $request)
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
     * - SOAPHeaderTypes: \StructType\ApiRequestServerVersion
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiFindMeetingTimeCandidatesType $request
     * @return \StructType\ApiFindMeetingTimeCandidatesResponseMessageType|bool
     */
    public function FindMeetingTimeCandidates(\StructType\ApiFindMeetingTimeCandidatesType $request)
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
     * @return \StructType\ApiFindAvailableMeetingTimesResponseMessageType|\StructType\ApiFindConversationResponseMessageType|\StructType\ApiFindFolderResponseType|\StructType\ApiFindItemResponseType|\StructType\ApiFindMeetingTimeCandidatesResponseMessageType|\StructType\ApiFindMessageTrackingReportResponseMessageType|\StructType\ApiFindPeopleResponseMessageType
     */
    public function getResult()
    {
        return parent::getResult();
    }
}
