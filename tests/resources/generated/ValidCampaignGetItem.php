<?php

namespace Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for CampaignGetItem StructType
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
class ApiCampaignGetItem extends ApiCampaignBase
{
    /**
     * The Id
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var int
     */
    public $Id;
    /**
     * The Name
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Name;
    /**
     * The StartDate
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $StartDate;
    /**
     * The Type
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Type;
    /**
     * The Status
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Status;
    /**
     * The State
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $State;
    /**
     * The StatusPayment
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $StatusPayment;
    /**
     * The StatusClarification
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $StatusClarification;
    /**
     * The SourceId
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * - nillable: true
     * @var int
     */
    public $SourceId;
    /**
     * The Statistics
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Api\StructType\ApiStatistics
     */
    public $Statistics;
    /**
     * The Currency
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Currency;
    /**
     * The Funds
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Api\StructType\ApiFundsParam
     */
    public $Funds;
    /**
     * The RepresentedBy
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Api\StructType\ApiCampaignAssistant
     */
    public $RepresentedBy;
    /**
     * The DailyBudget
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * - nillable: true
     * @var \Api\StructType\ApiDailyBudget
     */
    public $DailyBudget;
    /**
     * The EndDate
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $EndDate;
    /**
     * The NegativeKeywords
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * - nillable: true
     * @var \Api\ArrayType\ApiArrayOfString
     */
    public $NegativeKeywords;
    /**
     * The BlockedIps
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * - nillable: true
     * @var \Api\ArrayType\ApiArrayOfString
     */
    public $BlockedIps;
    /**
     * The ExcludedSites
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * - nillable: true
     * @var \Api\ArrayType\ApiArrayOfString
     */
    public $ExcludedSites;
    /**
     * The TextCampaign
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Api\StructType\ApiTextCampaignGetItem
     */
    public $TextCampaign;
    /**
     * The MobileAppCampaign
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Api\StructType\ApiMobileAppCampaignGetItem
     */
    public $MobileAppCampaign;
    /**
     * The DynamicTextCampaign
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Api\StructType\ApiDynamicTextCampaignGetItem
     */
    public $DynamicTextCampaign;
    /**
     * Constructor method for CampaignGetItem
     * @uses ApiCampaignGetItem::setId()
     * @uses ApiCampaignGetItem::setName()
     * @uses ApiCampaignGetItem::setStartDate()
     * @uses ApiCampaignGetItem::setType()
     * @uses ApiCampaignGetItem::setStatus()
     * @uses ApiCampaignGetItem::setState()
     * @uses ApiCampaignGetItem::setStatusPayment()
     * @uses ApiCampaignGetItem::setStatusClarification()
     * @uses ApiCampaignGetItem::setSourceId()
     * @uses ApiCampaignGetItem::setStatistics()
     * @uses ApiCampaignGetItem::setCurrency()
     * @uses ApiCampaignGetItem::setFunds()
     * @uses ApiCampaignGetItem::setRepresentedBy()
     * @uses ApiCampaignGetItem::setDailyBudget()
     * @uses ApiCampaignGetItem::setEndDate()
     * @uses ApiCampaignGetItem::setNegativeKeywords()
     * @uses ApiCampaignGetItem::setBlockedIps()
     * @uses ApiCampaignGetItem::setExcludedSites()
     * @uses ApiCampaignGetItem::setTextCampaign()
     * @uses ApiCampaignGetItem::setMobileAppCampaign()
     * @uses ApiCampaignGetItem::setDynamicTextCampaign()
     * @param int $id
     * @param string $name
     * @param string $startDate
     * @param string $type
     * @param string $status
     * @param string $state
     * @param string $statusPayment
     * @param string $statusClarification
     * @param int $sourceId
     * @param \Api\StructType\ApiStatistics $statistics
     * @param string $currency
     * @param \Api\StructType\ApiFundsParam $funds
     * @param \Api\StructType\ApiCampaignAssistant $representedBy
     * @param \Api\StructType\ApiDailyBudget $dailyBudget
     * @param string $endDate
     * @param \Api\ArrayType\ApiArrayOfString $negativeKeywords
     * @param \Api\ArrayType\ApiArrayOfString $blockedIps
     * @param \Api\ArrayType\ApiArrayOfString $excludedSites
     * @param \Api\StructType\ApiTextCampaignGetItem $textCampaign
     * @param \Api\StructType\ApiMobileAppCampaignGetItem $mobileAppCampaign
     * @param \Api\StructType\ApiDynamicTextCampaignGetItem $dynamicTextCampaign
     */
    public function __construct($id = null, $name = null, $startDate = null, $type = null, $status = null, $state = null, $statusPayment = null, $statusClarification = null, $sourceId = null, \Api\StructType\ApiStatistics $statistics = null, $currency = null, \Api\StructType\ApiFundsParam $funds = null, \Api\StructType\ApiCampaignAssistant $representedBy = null, \Api\StructType\ApiDailyBudget $dailyBudget = null, $endDate = null, \Api\ArrayType\ApiArrayOfString $negativeKeywords = null, \Api\ArrayType\ApiArrayOfString $blockedIps = null, \Api\ArrayType\ApiArrayOfString $excludedSites = null, \Api\StructType\ApiTextCampaignGetItem $textCampaign = null, \Api\StructType\ApiMobileAppCampaignGetItem $mobileAppCampaign = null, \Api\StructType\ApiDynamicTextCampaignGetItem $dynamicTextCampaign = null)
    {
        $this
            ->setId($id)
            ->setName($name)
            ->setStartDate($startDate)
            ->setType($type)
            ->setStatus($status)
            ->setState($state)
            ->setStatusPayment($statusPayment)
            ->setStatusClarification($statusClarification)
            ->setSourceId($sourceId)
            ->setStatistics($statistics)
            ->setCurrency($currency)
            ->setFunds($funds)
            ->setRepresentedBy($representedBy)
            ->setDailyBudget($dailyBudget)
            ->setEndDate($endDate)
            ->setNegativeKeywords($negativeKeywords)
            ->setBlockedIps($blockedIps)
            ->setExcludedSites($excludedSites)
            ->setTextCampaign($textCampaign)
            ->setMobileAppCampaign($mobileAppCampaign)
            ->setDynamicTextCampaign($dynamicTextCampaign);
    }
    /**
     * Get Id value
     * @return int|null
     */
    public function getId()
    {
        return $this->Id;
    }
    /**
     * Set Id value
     * @param int $id
     * @return \Api\StructType\ApiCampaignGetItem
     */
    public function setId($id = null)
    {
        $this->Id = $id;
        return $this;
    }
    /**
     * Get Name value
     * @return string|null
     */
    public function getName()
    {
        return $this->Name;
    }
    /**
     * Set Name value
     * @param string $name
     * @return \Api\StructType\ApiCampaignGetItem
     */
    public function setName($name = null)
    {
        $this->Name = $name;
        return $this;
    }
    /**
     * Get StartDate value
     * @return string|null
     */
    public function getStartDate()
    {
        return $this->StartDate;
    }
    /**
     * Set StartDate value
     * @param string $startDate
     * @return \Api\StructType\ApiCampaignGetItem
     */
    public function setStartDate($startDate = null)
    {
        $this->StartDate = $startDate;
        return $this;
    }
    /**
     * Get Type value
     * @return string|null
     */
    public function getType()
    {
        return $this->Type;
    }
    /**
     * Set Type value
     * @param string $type
     * @return \Api\StructType\ApiCampaignGetItem
     */
    public function setType($type = null)
    {
        $this->Type = $type;
        return $this;
    }
    /**
     * Get Status value
     * @return string|null
     */
    public function getStatus()
    {
        return $this->Status;
    }
    /**
     * Set Status value
     * @param string $status
     * @return \Api\StructType\ApiCampaignGetItem
     */
    public function setStatus($status = null)
    {
        $this->Status = $status;
        return $this;
    }
    /**
     * Get State value
     * @return string|null
     */
    public function getState()
    {
        return $this->State;
    }
    /**
     * Set State value
     * @param string $state
     * @return \Api\StructType\ApiCampaignGetItem
     */
    public function setState($state = null)
    {
        $this->State = $state;
        return $this;
    }
    /**
     * Get StatusPayment value
     * @return string|null
     */
    public function getStatusPayment()
    {
        return $this->StatusPayment;
    }
    /**
     * Set StatusPayment value
     * @param string $statusPayment
     * @return \Api\StructType\ApiCampaignGetItem
     */
    public function setStatusPayment($statusPayment = null)
    {
        $this->StatusPayment = $statusPayment;
        return $this;
    }
    /**
     * Get StatusClarification value
     * @return string|null
     */
    public function getStatusClarification()
    {
        return $this->StatusClarification;
    }
    /**
     * Set StatusClarification value
     * @param string $statusClarification
     * @return \Api\StructType\ApiCampaignGetItem
     */
    public function setStatusClarification($statusClarification = null)
    {
        $this->StatusClarification = $statusClarification;
        return $this;
    }
    /**
     * Get SourceId value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return int|null
     */
    public function getSourceId()
    {
        return isset($this->SourceId) ? $this->SourceId : null;
    }
    /**
     * Set SourceId value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param int $sourceId
     * @return \Api\StructType\ApiCampaignGetItem
     */
    public function setSourceId($sourceId = null)
    {
        if (is_null($sourceId) || (is_array($sourceId) && empty($sourceId))) {
            unset($this->SourceId);
        } else {
            $this->SourceId = $sourceId;
        }
        return $this;
    }
    /**
     * Get Statistics value
     * @return \Api\StructType\ApiStatistics|null
     */
    public function getStatistics()
    {
        return $this->Statistics;
    }
    /**
     * Set Statistics value
     * @param \Api\StructType\ApiStatistics $statistics
     * @return \Api\StructType\ApiCampaignGetItem
     */
    public function setStatistics(\Api\StructType\ApiStatistics $statistics = null)
    {
        $this->Statistics = $statistics;
        return $this;
    }
    /**
     * Get Currency value
     * @return string|null
     */
    public function getCurrency()
    {
        return $this->Currency;
    }
    /**
     * Set Currency value
     * @param string $currency
     * @return \Api\StructType\ApiCampaignGetItem
     */
    public function setCurrency($currency = null)
    {
        $this->Currency = $currency;
        return $this;
    }
    /**
     * Get Funds value
     * @return \Api\StructType\ApiFundsParam|null
     */
    public function getFunds()
    {
        return $this->Funds;
    }
    /**
     * Set Funds value
     * @param \Api\StructType\ApiFundsParam $funds
     * @return \Api\StructType\ApiCampaignGetItem
     */
    public function setFunds(\Api\StructType\ApiFundsParam $funds = null)
    {
        $this->Funds = $funds;
        return $this;
    }
    /**
     * Get RepresentedBy value
     * @return \Api\StructType\ApiCampaignAssistant|null
     */
    public function getRepresentedBy()
    {
        return $this->RepresentedBy;
    }
    /**
     * Set RepresentedBy value
     * @param \Api\StructType\ApiCampaignAssistant $representedBy
     * @return \Api\StructType\ApiCampaignGetItem
     */
    public function setRepresentedBy(\Api\StructType\ApiCampaignAssistant $representedBy = null)
    {
        $this->RepresentedBy = $representedBy;
        return $this;
    }
    /**
     * Get DailyBudget value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \Api\StructType\ApiDailyBudget|null
     */
    public function getDailyBudget()
    {
        return isset($this->DailyBudget) ? $this->DailyBudget : null;
    }
    /**
     * Set DailyBudget value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \Api\StructType\ApiDailyBudget $dailyBudget
     * @return \Api\StructType\ApiCampaignGetItem
     */
    public function setDailyBudget(\Api\StructType\ApiDailyBudget $dailyBudget = null)
    {
        if (is_null($dailyBudget) || (is_array($dailyBudget) && empty($dailyBudget))) {
            unset($this->DailyBudget);
        } else {
            $this->DailyBudget = $dailyBudget;
        }
        return $this;
    }
    /**
     * Get EndDate value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getEndDate()
    {
        return isset($this->EndDate) ? $this->EndDate : null;
    }
    /**
     * Set EndDate value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $endDate
     * @return \Api\StructType\ApiCampaignGetItem
     */
    public function setEndDate($endDate = null)
    {
        if (is_null($endDate) || (is_array($endDate) && empty($endDate))) {
            unset($this->EndDate);
        } else {
            $this->EndDate = $endDate;
        }
        return $this;
    }
    /**
     * Get NegativeKeywords value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \Api\ArrayType\ApiArrayOfString|null
     */
    public function getNegativeKeywords()
    {
        return isset($this->NegativeKeywords) ? $this->NegativeKeywords : null;
    }
    /**
     * Set NegativeKeywords value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \Api\ArrayType\ApiArrayOfString $negativeKeywords
     * @return \Api\StructType\ApiCampaignGetItem
     */
    public function setNegativeKeywords(\Api\ArrayType\ApiArrayOfString $negativeKeywords = null)
    {
        if (is_null($negativeKeywords) || (is_array($negativeKeywords) && empty($negativeKeywords))) {
            unset($this->NegativeKeywords);
        } else {
            $this->NegativeKeywords = $negativeKeywords;
        }
        return $this;
    }
    /**
     * Get BlockedIps value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \Api\ArrayType\ApiArrayOfString|null
     */
    public function getBlockedIps()
    {
        return isset($this->BlockedIps) ? $this->BlockedIps : null;
    }
    /**
     * Set BlockedIps value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \Api\ArrayType\ApiArrayOfString $blockedIps
     * @return \Api\StructType\ApiCampaignGetItem
     */
    public function setBlockedIps(\Api\ArrayType\ApiArrayOfString $blockedIps = null)
    {
        if (is_null($blockedIps) || (is_array($blockedIps) && empty($blockedIps))) {
            unset($this->BlockedIps);
        } else {
            $this->BlockedIps = $blockedIps;
        }
        return $this;
    }
    /**
     * Get ExcludedSites value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \Api\ArrayType\ApiArrayOfString|null
     */
    public function getExcludedSites()
    {
        return isset($this->ExcludedSites) ? $this->ExcludedSites : null;
    }
    /**
     * Set ExcludedSites value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \Api\ArrayType\ApiArrayOfString $excludedSites
     * @return \Api\StructType\ApiCampaignGetItem
     */
    public function setExcludedSites(\Api\ArrayType\ApiArrayOfString $excludedSites = null)
    {
        if (is_null($excludedSites) || (is_array($excludedSites) && empty($excludedSites))) {
            unset($this->ExcludedSites);
        } else {
            $this->ExcludedSites = $excludedSites;
        }
        return $this;
    }
    /**
     * Get TextCampaign value
     * @return \Api\StructType\ApiTextCampaignGetItem|null
     */
    public function getTextCampaign()
    {
        return $this->TextCampaign;
    }
    /**
     * Set TextCampaign value
     * @param \Api\StructType\ApiTextCampaignGetItem $textCampaign
     * @return \Api\StructType\ApiCampaignGetItem
     */
    public function setTextCampaign(\Api\StructType\ApiTextCampaignGetItem $textCampaign = null)
    {
        $this->TextCampaign = $textCampaign;
        return $this;
    }
    /**
     * Get MobileAppCampaign value
     * @return \Api\StructType\ApiMobileAppCampaignGetItem|null
     */
    public function getMobileAppCampaign()
    {
        return $this->MobileAppCampaign;
    }
    /**
     * Set MobileAppCampaign value
     * @param \Api\StructType\ApiMobileAppCampaignGetItem $mobileAppCampaign
     * @return \Api\StructType\ApiCampaignGetItem
     */
    public function setMobileAppCampaign(\Api\StructType\ApiMobileAppCampaignGetItem $mobileAppCampaign = null)
    {
        $this->MobileAppCampaign = $mobileAppCampaign;
        return $this;
    }
    /**
     * Get DynamicTextCampaign value
     * @return \Api\StructType\ApiDynamicTextCampaignGetItem|null
     */
    public function getDynamicTextCampaign()
    {
        return $this->DynamicTextCampaign;
    }
    /**
     * Set DynamicTextCampaign value
     * @param \Api\StructType\ApiDynamicTextCampaignGetItem $dynamicTextCampaign
     * @return \Api\StructType\ApiCampaignGetItem
     */
    public function setDynamicTextCampaign(\Api\StructType\ApiDynamicTextCampaignGetItem $dynamicTextCampaign = null)
    {
        $this->DynamicTextCampaign = $dynamicTextCampaign;
        return $this;
    }
}
