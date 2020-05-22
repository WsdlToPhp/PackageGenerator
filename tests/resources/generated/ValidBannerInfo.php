<?php

namespace Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for BannerInfo StructType
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
class ApiBannerInfo extends AbstractStructBase
{
    /**
     * The BannerID
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var int
     */
    public $BannerID;
    /**
     * The CampaignID
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var int
     */
    public $CampaignID;
    /**
     * The Title
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string
     */
    public $Title;
    /**
     * The Text
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string
     */
    public $Text;
    /**
     * The Href
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string
     */
    public $Href;
    /**
     * The Domain
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string
     */
    public $Domain;
    /**
     * The ContactInfo
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var \Api\StructType\ApiContactInfo
     */
    public $ContactInfo;
    /**
     * The Geo
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string
     */
    public $Geo;
    /**
     * The Phrases
     * Meta information extracted from the WSDL
     * - arrayType: namesp1:BannerPhraseInfo[]
     * - base: soapenc:Array
     * - nillable: true
     * - ref: soapenc:arrayType
     * @var \Api\StructType\ApiBannerPhraseInfo[]
     */
    public $Phrases;
    /**
     * The MinusKeywords
     * Meta information extracted from the WSDL
     * - arrayType: xsd:string[]
     * - base: soapenc:Array
     * - nillable: true
     * - ref: soapenc:arrayType
     * @var string[]
     */
    public $MinusKeywords;
    /**
     * The StatusActivating
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string
     */
    public $StatusActivating;
    /**
     * The StatusArchive
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string
     */
    public $StatusArchive;
    /**
     * The StatusBannerModerate
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string
     */
    public $StatusBannerModerate;
    /**
     * The StatusPhrasesModerate
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string
     */
    public $StatusPhrasesModerate;
    /**
     * The StatusPhoneModerate
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string
     */
    public $StatusPhoneModerate;
    /**
     * The StatusShow
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string
     */
    public $StatusShow;
    /**
     * The IsActive
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string
     */
    public $IsActive;
    /**
     * The StatusSitelinksModerate
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string
     */
    public $StatusSitelinksModerate;
    /**
     * The Sitelinks
     * Meta information extracted from the WSDL
     * - arrayType: namesp1:Sitelink[]
     * - base: soapenc:Array
     * - nillable: true
     * - ref: soapenc:arrayType
     * @var \Api\StructType\ApiSitelink[]
     */
    public $Sitelinks;
    /**
     * The AdWarnings
     * Meta information extracted from the WSDL
     * - arrayType: xsd:string[]
     * - base: soapenc:Array
     * - nillable: true
     * - ref: soapenc:arrayType
     * @var string[]
     */
    public $AdWarnings;
    /**
     * The FixedOnModeration
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string
     */
    public $FixedOnModeration;
    /**
     * The ModerateRejectionReasons
     * Meta information extracted from the WSDL
     * - arrayType: namesp1:RejectReason[]
     * - base: soapenc:Array
     * - nillable: true
     * - ref: soapenc:arrayType
     * @var \Api\StructType\ApiRejectReason[]
     */
    public $ModerateRejectionReasons;
    /**
     * The Type
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string
     */
    public $Type;
    /**
     * The AdGroupID
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var int
     */
    public $AdGroupID;
    /**
     * The AdGroupName
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string
     */
    public $AdGroupName;
    /**
     * The AutoMinusWords
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string
     */
    public $AutoMinusWords;
    /**
     * The AgeLabel
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string
     */
    public $AgeLabel;
    /**
     * The AdImageHash
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string
     */
    public $AdImageHash;
    /**
     * The StatusAdImageModerate
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string
     */
    public $StatusAdImageModerate;
    /**
     * The AdGroupMobileBidAdjustment
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var int
     */
    public $AdGroupMobileBidAdjustment;
    /**
     * Constructor method for BannerInfo
     * @uses ApiBannerInfo::setBannerID()
     * @uses ApiBannerInfo::setCampaignID()
     * @uses ApiBannerInfo::setTitle()
     * @uses ApiBannerInfo::setText()
     * @uses ApiBannerInfo::setHref()
     * @uses ApiBannerInfo::setDomain()
     * @uses ApiBannerInfo::setContactInfo()
     * @uses ApiBannerInfo::setGeo()
     * @uses ApiBannerInfo::setPhrases()
     * @uses ApiBannerInfo::setMinusKeywords()
     * @uses ApiBannerInfo::setStatusActivating()
     * @uses ApiBannerInfo::setStatusArchive()
     * @uses ApiBannerInfo::setStatusBannerModerate()
     * @uses ApiBannerInfo::setStatusPhrasesModerate()
     * @uses ApiBannerInfo::setStatusPhoneModerate()
     * @uses ApiBannerInfo::setStatusShow()
     * @uses ApiBannerInfo::setIsActive()
     * @uses ApiBannerInfo::setStatusSitelinksModerate()
     * @uses ApiBannerInfo::setSitelinks()
     * @uses ApiBannerInfo::setAdWarnings()
     * @uses ApiBannerInfo::setFixedOnModeration()
     * @uses ApiBannerInfo::setModerateRejectionReasons()
     * @uses ApiBannerInfo::setType()
     * @uses ApiBannerInfo::setAdGroupID()
     * @uses ApiBannerInfo::setAdGroupName()
     * @uses ApiBannerInfo::setAutoMinusWords()
     * @uses ApiBannerInfo::setAgeLabel()
     * @uses ApiBannerInfo::setAdImageHash()
     * @uses ApiBannerInfo::setStatusAdImageModerate()
     * @uses ApiBannerInfo::setAdGroupMobileBidAdjustment()
     * @param int $bannerID
     * @param int $campaignID
     * @param string $title
     * @param string $text
     * @param string $href
     * @param string $domain
     * @param \Api\StructType\ApiContactInfo $contactInfo
     * @param string $geo
     * @param \Api\StructType\ApiBannerPhraseInfo[] $phrases
     * @param string[] $minusKeywords
     * @param string $statusActivating
     * @param string $statusArchive
     * @param string $statusBannerModerate
     * @param string $statusPhrasesModerate
     * @param string $statusPhoneModerate
     * @param string $statusShow
     * @param string $isActive
     * @param string $statusSitelinksModerate
     * @param \Api\StructType\ApiSitelink[] $sitelinks
     * @param string[] $adWarnings
     * @param string $fixedOnModeration
     * @param \Api\StructType\ApiRejectReason[] $moderateRejectionReasons
     * @param string $type
     * @param int $adGroupID
     * @param string $adGroupName
     * @param string $autoMinusWords
     * @param string $ageLabel
     * @param string $adImageHash
     * @param string $statusAdImageModerate
     * @param int $adGroupMobileBidAdjustment
     */
    public function __construct($bannerID = null, $campaignID = null, $title = null, $text = null, $href = null, $domain = null, \Api\StructType\ApiContactInfo $contactInfo = null, $geo = null, array $phrases = array(), array $minusKeywords = array(), $statusActivating = null, $statusArchive = null, $statusBannerModerate = null, $statusPhrasesModerate = null, $statusPhoneModerate = null, $statusShow = null, $isActive = null, $statusSitelinksModerate = null, array $sitelinks = array(), array $adWarnings = array(), $fixedOnModeration = null, array $moderateRejectionReasons = array(), $type = null, $adGroupID = null, $adGroupName = null, $autoMinusWords = null, $ageLabel = null, $adImageHash = null, $statusAdImageModerate = null, $adGroupMobileBidAdjustment = null)
    {
        $this
            ->setBannerID($bannerID)
            ->setCampaignID($campaignID)
            ->setTitle($title)
            ->setText($text)
            ->setHref($href)
            ->setDomain($domain)
            ->setContactInfo($contactInfo)
            ->setGeo($geo)
            ->setPhrases($phrases)
            ->setMinusKeywords($minusKeywords)
            ->setStatusActivating($statusActivating)
            ->setStatusArchive($statusArchive)
            ->setStatusBannerModerate($statusBannerModerate)
            ->setStatusPhrasesModerate($statusPhrasesModerate)
            ->setStatusPhoneModerate($statusPhoneModerate)
            ->setStatusShow($statusShow)
            ->setIsActive($isActive)
            ->setStatusSitelinksModerate($statusSitelinksModerate)
            ->setSitelinks($sitelinks)
            ->setAdWarnings($adWarnings)
            ->setFixedOnModeration($fixedOnModeration)
            ->setModerateRejectionReasons($moderateRejectionReasons)
            ->setType($type)
            ->setAdGroupID($adGroupID)
            ->setAdGroupName($adGroupName)
            ->setAutoMinusWords($autoMinusWords)
            ->setAgeLabel($ageLabel)
            ->setAdImageHash($adImageHash)
            ->setStatusAdImageModerate($statusAdImageModerate)
            ->setAdGroupMobileBidAdjustment($adGroupMobileBidAdjustment);
    }
    /**
     * Get BannerID value
     * @return int|null
     */
    public function getBannerID()
    {
        return $this->BannerID;
    }
    /**
     * Set BannerID value
     * @param int $bannerID
     * @return \Api\StructType\ApiBannerInfo
     */
    public function setBannerID($bannerID = null)
    {
        // validation for constraint: int
        if (!is_null($bannerID) && !(is_int($bannerID) || ctype_digit($bannerID))) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide an integer value, %s given', var_export($bannerID, true), gettype($bannerID)), __LINE__);
        }
        $this->BannerID = $bannerID;
        return $this;
    }
    /**
     * Get CampaignID value
     * @return int|null
     */
    public function getCampaignID()
    {
        return $this->CampaignID;
    }
    /**
     * Set CampaignID value
     * @param int $campaignID
     * @return \Api\StructType\ApiBannerInfo
     */
    public function setCampaignID($campaignID = null)
    {
        // validation for constraint: int
        if (!is_null($campaignID) && !(is_int($campaignID) || ctype_digit($campaignID))) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide an integer value, %s given', var_export($campaignID, true), gettype($campaignID)), __LINE__);
        }
        $this->CampaignID = $campaignID;
        return $this;
    }
    /**
     * Get Title value
     * @return string|null
     */
    public function getTitle()
    {
        return $this->Title;
    }
    /**
     * Set Title value
     * @param string $title
     * @return \Api\StructType\ApiBannerInfo
     */
    public function setTitle($title = null)
    {
        // validation for constraint: string
        if (!is_null($title) && !is_string($title)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($title, true), gettype($title)), __LINE__);
        }
        $this->Title = $title;
        return $this;
    }
    /**
     * Get Text value
     * @return string|null
     */
    public function getText()
    {
        return $this->Text;
    }
    /**
     * Set Text value
     * @param string $text
     * @return \Api\StructType\ApiBannerInfo
     */
    public function setText($text = null)
    {
        // validation for constraint: string
        if (!is_null($text) && !is_string($text)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($text, true), gettype($text)), __LINE__);
        }
        $this->Text = $text;
        return $this;
    }
    /**
     * Get Href value
     * @return string|null
     */
    public function getHref()
    {
        return $this->Href;
    }
    /**
     * Set Href value
     * @param string $href
     * @return \Api\StructType\ApiBannerInfo
     */
    public function setHref($href = null)
    {
        // validation for constraint: string
        if (!is_null($href) && !is_string($href)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($href, true), gettype($href)), __LINE__);
        }
        $this->Href = $href;
        return $this;
    }
    /**
     * Get Domain value
     * @return string|null
     */
    public function getDomain()
    {
        return $this->Domain;
    }
    /**
     * Set Domain value
     * @param string $domain
     * @return \Api\StructType\ApiBannerInfo
     */
    public function setDomain($domain = null)
    {
        // validation for constraint: string
        if (!is_null($domain) && !is_string($domain)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($domain, true), gettype($domain)), __LINE__);
        }
        $this->Domain = $domain;
        return $this;
    }
    /**
     * Get ContactInfo value
     * @return \Api\StructType\ApiContactInfo|null
     */
    public function getContactInfo()
    {
        return $this->ContactInfo;
    }
    /**
     * Set ContactInfo value
     * @param \Api\StructType\ApiContactInfo $contactInfo
     * @return \Api\StructType\ApiBannerInfo
     */
    public function setContactInfo(\Api\StructType\ApiContactInfo $contactInfo = null)
    {
        $this->ContactInfo = $contactInfo;
        return $this;
    }
    /**
     * Get Geo value
     * @return string|null
     */
    public function getGeo()
    {
        return $this->Geo;
    }
    /**
     * Set Geo value
     * @param string $geo
     * @return \Api\StructType\ApiBannerInfo
     */
    public function setGeo($geo = null)
    {
        // validation for constraint: string
        if (!is_null($geo) && !is_string($geo)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($geo, true), gettype($geo)), __LINE__);
        }
        $this->Geo = $geo;
        return $this;
    }
    /**
     * Get Phrases value
     * @return \Api\StructType\ApiBannerPhraseInfo[]|null
     */
    public function getPhrases()
    {
        return $this->Phrases;
    }
    /**
     * This method is responsible for validating the values passed to the setPhrases method
     * This method is willingly generated in order to preserve the one-line inline validation within the setPhrases method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validatePhrasesForArrayConstraintsFromSetPhrases(array $values = array())
    {
        $message = '';
        $invalidValues = [];
        foreach ($values as $bannerInfoPhrasesItem) {
            // validation for constraint: itemType
            if (!$bannerInfoPhrasesItem instanceof \Api\StructType\ApiBannerPhraseInfo) {
                $invalidValues[] = is_object($bannerInfoPhrasesItem) ? get_class($bannerInfoPhrasesItem) : sprintf('%s(%s)', gettype($bannerInfoPhrasesItem), var_export($bannerInfoPhrasesItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The Phrases property can only contain items of type \Api\StructType\ApiBannerPhraseInfo, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        return $message;
    }
    /**
     * Set Phrases value
     * @throws \InvalidArgumentException
     * @param \Api\StructType\ApiBannerPhraseInfo[] $phrases
     * @return \Api\StructType\ApiBannerInfo
     */
    public function setPhrases(array $phrases = array())
    {
        // validation for constraint: array
        if ('' !== ($phrasesArrayErrorMessage = self::validatePhrasesForArrayConstraintsFromSetPhrases($phrases))) {
            throw new \InvalidArgumentException($phrasesArrayErrorMessage, __LINE__);
        }
        $this->Phrases = $phrases;
        return $this;
    }
    /**
     * Add item to Phrases value
     * @throws \InvalidArgumentException
     * @param \Api\StructType\ApiBannerPhraseInfo $item
     * @return \Api\StructType\ApiBannerInfo
     */
    public function addToPhrases(\Api\StructType\ApiBannerPhraseInfo $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \Api\StructType\ApiBannerPhraseInfo) {
            throw new \InvalidArgumentException(sprintf('The Phrases property can only contain items of type \Api\StructType\ApiBannerPhraseInfo, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->Phrases[] = $item;
        return $this;
    }
    /**
     * Get MinusKeywords value
     * @return string[]|null
     */
    public function getMinusKeywords()
    {
        return $this->MinusKeywords;
    }
    /**
     * This method is responsible for validating the values passed to the setMinusKeywords method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMinusKeywords method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateMinusKeywordsForArrayConstraintsFromSetMinusKeywords(array $values = array())
    {
        $message = '';
        $invalidValues = [];
        foreach ($values as $bannerInfoMinusKeywordsItem) {
            // validation for constraint: itemType
            if (!is_string($bannerInfoMinusKeywordsItem)) {
                $invalidValues[] = is_object($bannerInfoMinusKeywordsItem) ? get_class($bannerInfoMinusKeywordsItem) : sprintf('%s(%s)', gettype($bannerInfoMinusKeywordsItem), var_export($bannerInfoMinusKeywordsItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The MinusKeywords property can only contain items of type string, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        return $message;
    }
    /**
     * Set MinusKeywords value
     * @throws \InvalidArgumentException
     * @param string[] $minusKeywords
     * @return \Api\StructType\ApiBannerInfo
     */
    public function setMinusKeywords(array $minusKeywords = array())
    {
        // validation for constraint: array
        if ('' !== ($minusKeywordsArrayErrorMessage = self::validateMinusKeywordsForArrayConstraintsFromSetMinusKeywords($minusKeywords))) {
            throw new \InvalidArgumentException($minusKeywordsArrayErrorMessage, __LINE__);
        }
        $this->MinusKeywords = $minusKeywords;
        return $this;
    }
    /**
     * Add item to MinusKeywords value
     * @throws \InvalidArgumentException
     * @param string $item
     * @return \Api\StructType\ApiBannerInfo
     */
    public function addToMinusKeywords($item)
    {
        // validation for constraint: itemType
        if (!is_string($item)) {
            throw new \InvalidArgumentException(sprintf('The MinusKeywords property can only contain items of type string, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->MinusKeywords[] = $item;
        return $this;
    }
    /**
     * Get StatusActivating value
     * @return string|null
     */
    public function getStatusActivating()
    {
        return $this->StatusActivating;
    }
    /**
     * Set StatusActivating value
     * @param string $statusActivating
     * @return \Api\StructType\ApiBannerInfo
     */
    public function setStatusActivating($statusActivating = null)
    {
        // validation for constraint: string
        if (!is_null($statusActivating) && !is_string($statusActivating)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($statusActivating, true), gettype($statusActivating)), __LINE__);
        }
        $this->StatusActivating = $statusActivating;
        return $this;
    }
    /**
     * Get StatusArchive value
     * @return string|null
     */
    public function getStatusArchive()
    {
        return $this->StatusArchive;
    }
    /**
     * Set StatusArchive value
     * @param string $statusArchive
     * @return \Api\StructType\ApiBannerInfo
     */
    public function setStatusArchive($statusArchive = null)
    {
        // validation for constraint: string
        if (!is_null($statusArchive) && !is_string($statusArchive)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($statusArchive, true), gettype($statusArchive)), __LINE__);
        }
        $this->StatusArchive = $statusArchive;
        return $this;
    }
    /**
     * Get StatusBannerModerate value
     * @return string|null
     */
    public function getStatusBannerModerate()
    {
        return $this->StatusBannerModerate;
    }
    /**
     * Set StatusBannerModerate value
     * @param string $statusBannerModerate
     * @return \Api\StructType\ApiBannerInfo
     */
    public function setStatusBannerModerate($statusBannerModerate = null)
    {
        // validation for constraint: string
        if (!is_null($statusBannerModerate) && !is_string($statusBannerModerate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($statusBannerModerate, true), gettype($statusBannerModerate)), __LINE__);
        }
        $this->StatusBannerModerate = $statusBannerModerate;
        return $this;
    }
    /**
     * Get StatusPhrasesModerate value
     * @return string|null
     */
    public function getStatusPhrasesModerate()
    {
        return $this->StatusPhrasesModerate;
    }
    /**
     * Set StatusPhrasesModerate value
     * @param string $statusPhrasesModerate
     * @return \Api\StructType\ApiBannerInfo
     */
    public function setStatusPhrasesModerate($statusPhrasesModerate = null)
    {
        // validation for constraint: string
        if (!is_null($statusPhrasesModerate) && !is_string($statusPhrasesModerate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($statusPhrasesModerate, true), gettype($statusPhrasesModerate)), __LINE__);
        }
        $this->StatusPhrasesModerate = $statusPhrasesModerate;
        return $this;
    }
    /**
     * Get StatusPhoneModerate value
     * @return string|null
     */
    public function getStatusPhoneModerate()
    {
        return $this->StatusPhoneModerate;
    }
    /**
     * Set StatusPhoneModerate value
     * @param string $statusPhoneModerate
     * @return \Api\StructType\ApiBannerInfo
     */
    public function setStatusPhoneModerate($statusPhoneModerate = null)
    {
        // validation for constraint: string
        if (!is_null($statusPhoneModerate) && !is_string($statusPhoneModerate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($statusPhoneModerate, true), gettype($statusPhoneModerate)), __LINE__);
        }
        $this->StatusPhoneModerate = $statusPhoneModerate;
        return $this;
    }
    /**
     * Get StatusShow value
     * @return string|null
     */
    public function getStatusShow()
    {
        return $this->StatusShow;
    }
    /**
     * Set StatusShow value
     * @param string $statusShow
     * @return \Api\StructType\ApiBannerInfo
     */
    public function setStatusShow($statusShow = null)
    {
        // validation for constraint: string
        if (!is_null($statusShow) && !is_string($statusShow)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($statusShow, true), gettype($statusShow)), __LINE__);
        }
        $this->StatusShow = $statusShow;
        return $this;
    }
    /**
     * Get IsActive value
     * @return string|null
     */
    public function getIsActive()
    {
        return $this->IsActive;
    }
    /**
     * Set IsActive value
     * @param string $isActive
     * @return \Api\StructType\ApiBannerInfo
     */
    public function setIsActive($isActive = null)
    {
        // validation for constraint: string
        if (!is_null($isActive) && !is_string($isActive)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($isActive, true), gettype($isActive)), __LINE__);
        }
        $this->IsActive = $isActive;
        return $this;
    }
    /**
     * Get StatusSitelinksModerate value
     * @return string|null
     */
    public function getStatusSitelinksModerate()
    {
        return $this->StatusSitelinksModerate;
    }
    /**
     * Set StatusSitelinksModerate value
     * @param string $statusSitelinksModerate
     * @return \Api\StructType\ApiBannerInfo
     */
    public function setStatusSitelinksModerate($statusSitelinksModerate = null)
    {
        // validation for constraint: string
        if (!is_null($statusSitelinksModerate) && !is_string($statusSitelinksModerate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($statusSitelinksModerate, true), gettype($statusSitelinksModerate)), __LINE__);
        }
        $this->StatusSitelinksModerate = $statusSitelinksModerate;
        return $this;
    }
    /**
     * Get Sitelinks value
     * @return \Api\StructType\ApiSitelink[]|null
     */
    public function getSitelinks()
    {
        return $this->Sitelinks;
    }
    /**
     * This method is responsible for validating the values passed to the setSitelinks method
     * This method is willingly generated in order to preserve the one-line inline validation within the setSitelinks method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateSitelinksForArrayConstraintsFromSetSitelinks(array $values = array())
    {
        $message = '';
        $invalidValues = [];
        foreach ($values as $bannerInfoSitelinksItem) {
            // validation for constraint: itemType
            if (!$bannerInfoSitelinksItem instanceof \Api\StructType\ApiSitelink) {
                $invalidValues[] = is_object($bannerInfoSitelinksItem) ? get_class($bannerInfoSitelinksItem) : sprintf('%s(%s)', gettype($bannerInfoSitelinksItem), var_export($bannerInfoSitelinksItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The Sitelinks property can only contain items of type \Api\StructType\ApiSitelink, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        return $message;
    }
    /**
     * Set Sitelinks value
     * @throws \InvalidArgumentException
     * @param \Api\StructType\ApiSitelink[] $sitelinks
     * @return \Api\StructType\ApiBannerInfo
     */
    public function setSitelinks(array $sitelinks = array())
    {
        // validation for constraint: array
        if ('' !== ($sitelinksArrayErrorMessage = self::validateSitelinksForArrayConstraintsFromSetSitelinks($sitelinks))) {
            throw new \InvalidArgumentException($sitelinksArrayErrorMessage, __LINE__);
        }
        $this->Sitelinks = $sitelinks;
        return $this;
    }
    /**
     * Add item to Sitelinks value
     * @throws \InvalidArgumentException
     * @param \Api\StructType\ApiSitelink $item
     * @return \Api\StructType\ApiBannerInfo
     */
    public function addToSitelinks(\Api\StructType\ApiSitelink $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \Api\StructType\ApiSitelink) {
            throw new \InvalidArgumentException(sprintf('The Sitelinks property can only contain items of type \Api\StructType\ApiSitelink, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->Sitelinks[] = $item;
        return $this;
    }
    /**
     * Get AdWarnings value
     * @return string[]|null
     */
    public function getAdWarnings()
    {
        return $this->AdWarnings;
    }
    /**
     * This method is responsible for validating the values passed to the setAdWarnings method
     * This method is willingly generated in order to preserve the one-line inline validation within the setAdWarnings method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateAdWarningsForArrayConstraintsFromSetAdWarnings(array $values = array())
    {
        $message = '';
        $invalidValues = [];
        foreach ($values as $bannerInfoAdWarningsItem) {
            // validation for constraint: itemType
            if (!is_string($bannerInfoAdWarningsItem)) {
                $invalidValues[] = is_object($bannerInfoAdWarningsItem) ? get_class($bannerInfoAdWarningsItem) : sprintf('%s(%s)', gettype($bannerInfoAdWarningsItem), var_export($bannerInfoAdWarningsItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The AdWarnings property can only contain items of type string, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        return $message;
    }
    /**
     * Set AdWarnings value
     * @throws \InvalidArgumentException
     * @param string[] $adWarnings
     * @return \Api\StructType\ApiBannerInfo
     */
    public function setAdWarnings(array $adWarnings = array())
    {
        // validation for constraint: array
        if ('' !== ($adWarningsArrayErrorMessage = self::validateAdWarningsForArrayConstraintsFromSetAdWarnings($adWarnings))) {
            throw new \InvalidArgumentException($adWarningsArrayErrorMessage, __LINE__);
        }
        $this->AdWarnings = $adWarnings;
        return $this;
    }
    /**
     * Add item to AdWarnings value
     * @throws \InvalidArgumentException
     * @param string $item
     * @return \Api\StructType\ApiBannerInfo
     */
    public function addToAdWarnings($item)
    {
        // validation for constraint: itemType
        if (!is_string($item)) {
            throw new \InvalidArgumentException(sprintf('The AdWarnings property can only contain items of type string, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->AdWarnings[] = $item;
        return $this;
    }
    /**
     * Get FixedOnModeration value
     * @return string|null
     */
    public function getFixedOnModeration()
    {
        return $this->FixedOnModeration;
    }
    /**
     * Set FixedOnModeration value
     * @param string $fixedOnModeration
     * @return \Api\StructType\ApiBannerInfo
     */
    public function setFixedOnModeration($fixedOnModeration = null)
    {
        // validation for constraint: string
        if (!is_null($fixedOnModeration) && !is_string($fixedOnModeration)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($fixedOnModeration, true), gettype($fixedOnModeration)), __LINE__);
        }
        $this->FixedOnModeration = $fixedOnModeration;
        return $this;
    }
    /**
     * Get ModerateRejectionReasons value
     * @return \Api\StructType\ApiRejectReason[]|null
     */
    public function getModerateRejectionReasons()
    {
        return $this->ModerateRejectionReasons;
    }
    /**
     * This method is responsible for validating the values passed to the setModerateRejectionReasons method
     * This method is willingly generated in order to preserve the one-line inline validation within the setModerateRejectionReasons method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateModerateRejectionReasonsForArrayConstraintsFromSetModerateRejectionReasons(array $values = array())
    {
        $message = '';
        $invalidValues = [];
        foreach ($values as $bannerInfoModerateRejectionReasonsItem) {
            // validation for constraint: itemType
            if (!$bannerInfoModerateRejectionReasonsItem instanceof \Api\StructType\ApiRejectReason) {
                $invalidValues[] = is_object($bannerInfoModerateRejectionReasonsItem) ? get_class($bannerInfoModerateRejectionReasonsItem) : sprintf('%s(%s)', gettype($bannerInfoModerateRejectionReasonsItem), var_export($bannerInfoModerateRejectionReasonsItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The ModerateRejectionReasons property can only contain items of type \Api\StructType\ApiRejectReason, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        return $message;
    }
    /**
     * Set ModerateRejectionReasons value
     * @throws \InvalidArgumentException
     * @param \Api\StructType\ApiRejectReason[] $moderateRejectionReasons
     * @return \Api\StructType\ApiBannerInfo
     */
    public function setModerateRejectionReasons(array $moderateRejectionReasons = array())
    {
        // validation for constraint: array
        if ('' !== ($moderateRejectionReasonsArrayErrorMessage = self::validateModerateRejectionReasonsForArrayConstraintsFromSetModerateRejectionReasons($moderateRejectionReasons))) {
            throw new \InvalidArgumentException($moderateRejectionReasonsArrayErrorMessage, __LINE__);
        }
        $this->ModerateRejectionReasons = $moderateRejectionReasons;
        return $this;
    }
    /**
     * Add item to ModerateRejectionReasons value
     * @throws \InvalidArgumentException
     * @param \Api\StructType\ApiRejectReason $item
     * @return \Api\StructType\ApiBannerInfo
     */
    public function addToModerateRejectionReasons(\Api\StructType\ApiRejectReason $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \Api\StructType\ApiRejectReason) {
            throw new \InvalidArgumentException(sprintf('The ModerateRejectionReasons property can only contain items of type \Api\StructType\ApiRejectReason, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->ModerateRejectionReasons[] = $item;
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
     * @return \Api\StructType\ApiBannerInfo
     */
    public function setType($type = null)
    {
        // validation for constraint: string
        if (!is_null($type) && !is_string($type)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($type, true), gettype($type)), __LINE__);
        }
        $this->Type = $type;
        return $this;
    }
    /**
     * Get AdGroupID value
     * @return int|null
     */
    public function getAdGroupID()
    {
        return $this->AdGroupID;
    }
    /**
     * Set AdGroupID value
     * @param int $adGroupID
     * @return \Api\StructType\ApiBannerInfo
     */
    public function setAdGroupID($adGroupID = null)
    {
        // validation for constraint: int
        if (!is_null($adGroupID) && !(is_int($adGroupID) || ctype_digit($adGroupID))) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide an integer value, %s given', var_export($adGroupID, true), gettype($adGroupID)), __LINE__);
        }
        $this->AdGroupID = $adGroupID;
        return $this;
    }
    /**
     * Get AdGroupName value
     * @return string|null
     */
    public function getAdGroupName()
    {
        return $this->AdGroupName;
    }
    /**
     * Set AdGroupName value
     * @param string $adGroupName
     * @return \Api\StructType\ApiBannerInfo
     */
    public function setAdGroupName($adGroupName = null)
    {
        // validation for constraint: string
        if (!is_null($adGroupName) && !is_string($adGroupName)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($adGroupName, true), gettype($adGroupName)), __LINE__);
        }
        $this->AdGroupName = $adGroupName;
        return $this;
    }
    /**
     * Get AutoMinusWords value
     * @return string|null
     */
    public function getAutoMinusWords()
    {
        return $this->AutoMinusWords;
    }
    /**
     * Set AutoMinusWords value
     * @param string $autoMinusWords
     * @return \Api\StructType\ApiBannerInfo
     */
    public function setAutoMinusWords($autoMinusWords = null)
    {
        // validation for constraint: string
        if (!is_null($autoMinusWords) && !is_string($autoMinusWords)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($autoMinusWords, true), gettype($autoMinusWords)), __LINE__);
        }
        $this->AutoMinusWords = $autoMinusWords;
        return $this;
    }
    /**
     * Get AgeLabel value
     * @return string|null
     */
    public function getAgeLabel()
    {
        return $this->AgeLabel;
    }
    /**
     * Set AgeLabel value
     * @param string $ageLabel
     * @return \Api\StructType\ApiBannerInfo
     */
    public function setAgeLabel($ageLabel = null)
    {
        // validation for constraint: string
        if (!is_null($ageLabel) && !is_string($ageLabel)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($ageLabel, true), gettype($ageLabel)), __LINE__);
        }
        $this->AgeLabel = $ageLabel;
        return $this;
    }
    /**
     * Get AdImageHash value
     * @return string|null
     */
    public function getAdImageHash()
    {
        return $this->AdImageHash;
    }
    /**
     * Set AdImageHash value
     * @param string $adImageHash
     * @return \Api\StructType\ApiBannerInfo
     */
    public function setAdImageHash($adImageHash = null)
    {
        // validation for constraint: string
        if (!is_null($adImageHash) && !is_string($adImageHash)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($adImageHash, true), gettype($adImageHash)), __LINE__);
        }
        $this->AdImageHash = $adImageHash;
        return $this;
    }
    /**
     * Get StatusAdImageModerate value
     * @return string|null
     */
    public function getStatusAdImageModerate()
    {
        return $this->StatusAdImageModerate;
    }
    /**
     * Set StatusAdImageModerate value
     * @param string $statusAdImageModerate
     * @return \Api\StructType\ApiBannerInfo
     */
    public function setStatusAdImageModerate($statusAdImageModerate = null)
    {
        // validation for constraint: string
        if (!is_null($statusAdImageModerate) && !is_string($statusAdImageModerate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($statusAdImageModerate, true), gettype($statusAdImageModerate)), __LINE__);
        }
        $this->StatusAdImageModerate = $statusAdImageModerate;
        return $this;
    }
    /**
     * Get AdGroupMobileBidAdjustment value
     * @return int|null
     */
    public function getAdGroupMobileBidAdjustment()
    {
        return $this->AdGroupMobileBidAdjustment;
    }
    /**
     * Set AdGroupMobileBidAdjustment value
     * @param int $adGroupMobileBidAdjustment
     * @return \Api\StructType\ApiBannerInfo
     */
    public function setAdGroupMobileBidAdjustment($adGroupMobileBidAdjustment = null)
    {
        // validation for constraint: int
        if (!is_null($adGroupMobileBidAdjustment) && !(is_int($adGroupMobileBidAdjustment) || ctype_digit($adGroupMobileBidAdjustment))) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide an integer value, %s given', var_export($adGroupMobileBidAdjustment, true), gettype($adGroupMobileBidAdjustment)), __LINE__);
        }
        $this->AdGroupMobileBidAdjustment = $adGroupMobileBidAdjustment;
        return $this;
    }
}
