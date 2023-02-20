<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

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
     * @var int|null
     */
    protected ?int $BannerID = null;
    /**
     * The CampaignID
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var int|null
     */
    protected ?int $CampaignID = null;
    /**
     * The Title
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string|null
     */
    protected ?string $Title = null;
    /**
     * The Text
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string|null
     */
    protected ?string $Text = null;
    /**
     * The Href
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string|null
     */
    protected ?string $Href = null;
    /**
     * The Domain
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string|null
     */
    protected ?string $Domain = null;
    /**
     * The ContactInfo
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var \StructType\ApiContactInfo|null
     */
    protected ?\StructType\ApiContactInfo $ContactInfo = null;
    /**
     * The Geo
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string|null
     */
    protected ?string $Geo = null;
    /**
     * The Phrases
     * Meta information extracted from the WSDL
     * - arrayType: namesp1:BannerPhraseInfo[]
     * - base: soapenc:Array
     * - nillable: true
     * - ref: soapenc:arrayType
     * @var \StructType\ApiBannerPhraseInfo[]
     */
    protected ?array $Phrases = null;
    /**
     * The MinusKeywords
     * Meta information extracted from the WSDL
     * - arrayType: xsd:string[]
     * - base: soapenc:Array
     * - nillable: true
     * - ref: soapenc:arrayType
     * @var string[]
     */
    protected ?array $MinusKeywords = null;
    /**
     * The StatusActivating
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string|null
     */
    protected ?string $StatusActivating = null;
    /**
     * The StatusArchive
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string|null
     */
    protected ?string $StatusArchive = null;
    /**
     * The StatusBannerModerate
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string|null
     */
    protected ?string $StatusBannerModerate = null;
    /**
     * The StatusPhrasesModerate
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string|null
     */
    protected ?string $StatusPhrasesModerate = null;
    /**
     * The StatusPhoneModerate
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string|null
     */
    protected ?string $StatusPhoneModerate = null;
    /**
     * The StatusShow
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string|null
     */
    protected ?string $StatusShow = null;
    /**
     * The IsActive
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string|null
     */
    protected ?string $IsActive = null;
    /**
     * The StatusSitelinksModerate
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string|null
     */
    protected ?string $StatusSitelinksModerate = null;
    /**
     * The Sitelinks
     * Meta information extracted from the WSDL
     * - arrayType: namesp1:Sitelink[]
     * - base: soapenc:Array
     * - nillable: true
     * - ref: soapenc:arrayType
     * @var \StructType\ApiSitelink[]
     */
    protected ?array $Sitelinks = null;
    /**
     * The AdWarnings
     * Meta information extracted from the WSDL
     * - arrayType: xsd:string[]
     * - base: soapenc:Array
     * - nillable: true
     * - ref: soapenc:arrayType
     * @var string[]
     */
    protected ?array $AdWarnings = null;
    /**
     * The FixedOnModeration
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string|null
     */
    protected ?string $FixedOnModeration = null;
    /**
     * The ModerateRejectionReasons
     * Meta information extracted from the WSDL
     * - arrayType: namesp1:RejectReason[]
     * - base: soapenc:Array
     * - nillable: true
     * - ref: soapenc:arrayType
     * @var \StructType\ApiRejectReason[]
     */
    protected ?array $ModerateRejectionReasons = null;
    /**
     * The Type
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string|null
     */
    protected ?string $Type = null;
    /**
     * The AdGroupID
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var int|null
     */
    protected ?int $AdGroupID = null;
    /**
     * The AdGroupName
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string|null
     */
    protected ?string $AdGroupName = null;
    /**
     * The AutoMinusWords
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string|null
     */
    protected ?string $AutoMinusWords = null;
    /**
     * The AgeLabel
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string|null
     */
    protected ?string $AgeLabel = null;
    /**
     * The AdImageHash
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string|null
     */
    protected ?string $AdImageHash = null;
    /**
     * The StatusAdImageModerate
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string|null
     */
    protected ?string $StatusAdImageModerate = null;
    /**
     * The AdGroupMobileBidAdjustment
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var int|null
     */
    protected ?int $AdGroupMobileBidAdjustment = null;
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
     * @param \StructType\ApiContactInfo $contactInfo
     * @param string $geo
     * @param \StructType\ApiBannerPhraseInfo[] $phrases
     * @param string[] $minusKeywords
     * @param string $statusActivating
     * @param string $statusArchive
     * @param string $statusBannerModerate
     * @param string $statusPhrasesModerate
     * @param string $statusPhoneModerate
     * @param string $statusShow
     * @param string $isActive
     * @param string $statusSitelinksModerate
     * @param \StructType\ApiSitelink[] $sitelinks
     * @param string[] $adWarnings
     * @param string $fixedOnModeration
     * @param \StructType\ApiRejectReason[] $moderateRejectionReasons
     * @param string $type
     * @param int $adGroupID
     * @param string $adGroupName
     * @param string $autoMinusWords
     * @param string $ageLabel
     * @param string $adImageHash
     * @param string $statusAdImageModerate
     * @param int $adGroupMobileBidAdjustment
     */
    public function __construct(?int $bannerID = null, ?int $campaignID = null, ?string $title = null, ?string $text = null, ?string $href = null, ?string $domain = null, ?\StructType\ApiContactInfo $contactInfo = null, ?string $geo = null, ?array $phrases = null, ?array $minusKeywords = null, ?string $statusActivating = null, ?string $statusArchive = null, ?string $statusBannerModerate = null, ?string $statusPhrasesModerate = null, ?string $statusPhoneModerate = null, ?string $statusShow = null, ?string $isActive = null, ?string $statusSitelinksModerate = null, ?array $sitelinks = null, ?array $adWarnings = null, ?string $fixedOnModeration = null, ?array $moderateRejectionReasons = null, ?string $type = null, ?int $adGroupID = null, ?string $adGroupName = null, ?string $autoMinusWords = null, ?string $ageLabel = null, ?string $adImageHash = null, ?string $statusAdImageModerate = null, ?int $adGroupMobileBidAdjustment = null)
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
    public function getBannerID(): ?int
    {
        return $this->BannerID;
    }
    /**
     * Set BannerID value
     * @param int $bannerID
     * @return \StructType\ApiBannerInfo
     */
    public function setBannerID(?int $bannerID = null): self
    {
        // validation for constraint: int
        if (!is_null($bannerID) && !(is_int($bannerID) || ctype_digit($bannerID))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide an integer value, %s given', var_export($bannerID, true), gettype($bannerID)), __LINE__);
        }
        $this->BannerID = $bannerID;
        
        return $this;
    }
    /**
     * Get CampaignID value
     * @return int|null
     */
    public function getCampaignID(): ?int
    {
        return $this->CampaignID;
    }
    /**
     * Set CampaignID value
     * @param int $campaignID
     * @return \StructType\ApiBannerInfo
     */
    public function setCampaignID(?int $campaignID = null): self
    {
        // validation for constraint: int
        if (!is_null($campaignID) && !(is_int($campaignID) || ctype_digit($campaignID))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide an integer value, %s given', var_export($campaignID, true), gettype($campaignID)), __LINE__);
        }
        $this->CampaignID = $campaignID;
        
        return $this;
    }
    /**
     * Get Title value
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->Title;
    }
    /**
     * Set Title value
     * @param string $title
     * @return \StructType\ApiBannerInfo
     */
    public function setTitle(?string $title = null): self
    {
        // validation for constraint: string
        if (!is_null($title) && !is_string($title)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($title, true), gettype($title)), __LINE__);
        }
        $this->Title = $title;
        
        return $this;
    }
    /**
     * Get Text value
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->Text;
    }
    /**
     * Set Text value
     * @param string $text
     * @return \StructType\ApiBannerInfo
     */
    public function setText(?string $text = null): self
    {
        // validation for constraint: string
        if (!is_null($text) && !is_string($text)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($text, true), gettype($text)), __LINE__);
        }
        $this->Text = $text;
        
        return $this;
    }
    /**
     * Get Href value
     * @return string|null
     */
    public function getHref(): ?string
    {
        return $this->Href;
    }
    /**
     * Set Href value
     * @param string $href
     * @return \StructType\ApiBannerInfo
     */
    public function setHref(?string $href = null): self
    {
        // validation for constraint: string
        if (!is_null($href) && !is_string($href)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($href, true), gettype($href)), __LINE__);
        }
        $this->Href = $href;
        
        return $this;
    }
    /**
     * Get Domain value
     * @return string|null
     */
    public function getDomain(): ?string
    {
        return $this->Domain;
    }
    /**
     * Set Domain value
     * @param string $domain
     * @return \StructType\ApiBannerInfo
     */
    public function setDomain(?string $domain = null): self
    {
        // validation for constraint: string
        if (!is_null($domain) && !is_string($domain)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($domain, true), gettype($domain)), __LINE__);
        }
        $this->Domain = $domain;
        
        return $this;
    }
    /**
     * Get ContactInfo value
     * @return \StructType\ApiContactInfo|null
     */
    public function getContactInfo(): ?\StructType\ApiContactInfo
    {
        return $this->ContactInfo;
    }
    /**
     * Set ContactInfo value
     * @param \StructType\ApiContactInfo $contactInfo
     * @return \StructType\ApiBannerInfo
     */
    public function setContactInfo(?\StructType\ApiContactInfo $contactInfo = null): self
    {
        $this->ContactInfo = $contactInfo;
        
        return $this;
    }
    /**
     * Get Geo value
     * @return string|null
     */
    public function getGeo(): ?string
    {
        return $this->Geo;
    }
    /**
     * Set Geo value
     * @param string $geo
     * @return \StructType\ApiBannerInfo
     */
    public function setGeo(?string $geo = null): self
    {
        // validation for constraint: string
        if (!is_null($geo) && !is_string($geo)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($geo, true), gettype($geo)), __LINE__);
        }
        $this->Geo = $geo;
        
        return $this;
    }
    /**
     * Get Phrases value
     * @return \StructType\ApiBannerPhraseInfo[]
     */
    public function getPhrases(): ?array
    {
        return $this->Phrases;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setPhrases method
     * This method is willingly generated in order to preserve the one-line inline validation within the setPhrases method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validatePhrasesForArrayConstraintFromSetPhrases(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $bannerInfoPhrasesItem) {
            // validation for constraint: itemType
            if (!$bannerInfoPhrasesItem instanceof \StructType\ApiBannerPhraseInfo) {
                $invalidValues[] = is_object($bannerInfoPhrasesItem) ? get_class($bannerInfoPhrasesItem) : sprintf('%s(%s)', gettype($bannerInfoPhrasesItem), var_export($bannerInfoPhrasesItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The Phrases property can only contain items of type \StructType\ApiBannerPhraseInfo, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set Phrases value
     * @throws InvalidArgumentException
     * @param \StructType\ApiBannerPhraseInfo[] $phrases
     * @return \StructType\ApiBannerInfo
     */
    public function setPhrases(?array $phrases = null): self
    {
        // validation for constraint: array
        if ('' !== ($phrasesArrayErrorMessage = self::validatePhrasesForArrayConstraintFromSetPhrases($phrases))) {
            throw new InvalidArgumentException($phrasesArrayErrorMessage, __LINE__);
        }
        $this->Phrases = $phrases;
        
        return $this;
    }
    /**
     * Add item to Phrases value
     * @throws InvalidArgumentException
     * @param \StructType\ApiBannerPhraseInfo $item
     * @return \StructType\ApiBannerInfo
     */
    public function addToPhrases(\StructType\ApiBannerPhraseInfo $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ApiBannerPhraseInfo) {
            throw new InvalidArgumentException(sprintf('The Phrases property can only contain items of type \StructType\ApiBannerPhraseInfo, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->Phrases[] = $item;
        
        return $this;
    }
    /**
     * Get MinusKeywords value
     * @return string[]
     */
    public function getMinusKeywords(): ?array
    {
        return $this->MinusKeywords;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setMinusKeywords method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMinusKeywords method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateMinusKeywordsForArrayConstraintFromSetMinusKeywords(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
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
     * @throws InvalidArgumentException
     * @param string[] $minusKeywords
     * @return \StructType\ApiBannerInfo
     */
    public function setMinusKeywords(?array $minusKeywords = null): self
    {
        // validation for constraint: array
        if ('' !== ($minusKeywordsArrayErrorMessage = self::validateMinusKeywordsForArrayConstraintFromSetMinusKeywords($minusKeywords))) {
            throw new InvalidArgumentException($minusKeywordsArrayErrorMessage, __LINE__);
        }
        $this->MinusKeywords = $minusKeywords;
        
        return $this;
    }
    /**
     * Add item to MinusKeywords value
     * @throws InvalidArgumentException
     * @param string $item
     * @return \StructType\ApiBannerInfo
     */
    public function addToMinusKeywords(string $item): self
    {
        // validation for constraint: itemType
        if (!is_string($item)) {
            throw new InvalidArgumentException(sprintf('The MinusKeywords property can only contain items of type string, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->MinusKeywords[] = $item;
        
        return $this;
    }
    /**
     * Get StatusActivating value
     * @return string|null
     */
    public function getStatusActivating(): ?string
    {
        return $this->StatusActivating;
    }
    /**
     * Set StatusActivating value
     * @param string $statusActivating
     * @return \StructType\ApiBannerInfo
     */
    public function setStatusActivating(?string $statusActivating = null): self
    {
        // validation for constraint: string
        if (!is_null($statusActivating) && !is_string($statusActivating)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($statusActivating, true), gettype($statusActivating)), __LINE__);
        }
        $this->StatusActivating = $statusActivating;
        
        return $this;
    }
    /**
     * Get StatusArchive value
     * @return string|null
     */
    public function getStatusArchive(): ?string
    {
        return $this->StatusArchive;
    }
    /**
     * Set StatusArchive value
     * @param string $statusArchive
     * @return \StructType\ApiBannerInfo
     */
    public function setStatusArchive(?string $statusArchive = null): self
    {
        // validation for constraint: string
        if (!is_null($statusArchive) && !is_string($statusArchive)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($statusArchive, true), gettype($statusArchive)), __LINE__);
        }
        $this->StatusArchive = $statusArchive;
        
        return $this;
    }
    /**
     * Get StatusBannerModerate value
     * @return string|null
     */
    public function getStatusBannerModerate(): ?string
    {
        return $this->StatusBannerModerate;
    }
    /**
     * Set StatusBannerModerate value
     * @param string $statusBannerModerate
     * @return \StructType\ApiBannerInfo
     */
    public function setStatusBannerModerate(?string $statusBannerModerate = null): self
    {
        // validation for constraint: string
        if (!is_null($statusBannerModerate) && !is_string($statusBannerModerate)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($statusBannerModerate, true), gettype($statusBannerModerate)), __LINE__);
        }
        $this->StatusBannerModerate = $statusBannerModerate;
        
        return $this;
    }
    /**
     * Get StatusPhrasesModerate value
     * @return string|null
     */
    public function getStatusPhrasesModerate(): ?string
    {
        return $this->StatusPhrasesModerate;
    }
    /**
     * Set StatusPhrasesModerate value
     * @param string $statusPhrasesModerate
     * @return \StructType\ApiBannerInfo
     */
    public function setStatusPhrasesModerate(?string $statusPhrasesModerate = null): self
    {
        // validation for constraint: string
        if (!is_null($statusPhrasesModerate) && !is_string($statusPhrasesModerate)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($statusPhrasesModerate, true), gettype($statusPhrasesModerate)), __LINE__);
        }
        $this->StatusPhrasesModerate = $statusPhrasesModerate;
        
        return $this;
    }
    /**
     * Get StatusPhoneModerate value
     * @return string|null
     */
    public function getStatusPhoneModerate(): ?string
    {
        return $this->StatusPhoneModerate;
    }
    /**
     * Set StatusPhoneModerate value
     * @param string $statusPhoneModerate
     * @return \StructType\ApiBannerInfo
     */
    public function setStatusPhoneModerate(?string $statusPhoneModerate = null): self
    {
        // validation for constraint: string
        if (!is_null($statusPhoneModerate) && !is_string($statusPhoneModerate)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($statusPhoneModerate, true), gettype($statusPhoneModerate)), __LINE__);
        }
        $this->StatusPhoneModerate = $statusPhoneModerate;
        
        return $this;
    }
    /**
     * Get StatusShow value
     * @return string|null
     */
    public function getStatusShow(): ?string
    {
        return $this->StatusShow;
    }
    /**
     * Set StatusShow value
     * @param string $statusShow
     * @return \StructType\ApiBannerInfo
     */
    public function setStatusShow(?string $statusShow = null): self
    {
        // validation for constraint: string
        if (!is_null($statusShow) && !is_string($statusShow)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($statusShow, true), gettype($statusShow)), __LINE__);
        }
        $this->StatusShow = $statusShow;
        
        return $this;
    }
    /**
     * Get IsActive value
     * @return string|null
     */
    public function getIsActive(): ?string
    {
        return $this->IsActive;
    }
    /**
     * Set IsActive value
     * @param string $isActive
     * @return \StructType\ApiBannerInfo
     */
    public function setIsActive(?string $isActive = null): self
    {
        // validation for constraint: string
        if (!is_null($isActive) && !is_string($isActive)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($isActive, true), gettype($isActive)), __LINE__);
        }
        $this->IsActive = $isActive;
        
        return $this;
    }
    /**
     * Get StatusSitelinksModerate value
     * @return string|null
     */
    public function getStatusSitelinksModerate(): ?string
    {
        return $this->StatusSitelinksModerate;
    }
    /**
     * Set StatusSitelinksModerate value
     * @param string $statusSitelinksModerate
     * @return \StructType\ApiBannerInfo
     */
    public function setStatusSitelinksModerate(?string $statusSitelinksModerate = null): self
    {
        // validation for constraint: string
        if (!is_null($statusSitelinksModerate) && !is_string($statusSitelinksModerate)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($statusSitelinksModerate, true), gettype($statusSitelinksModerate)), __LINE__);
        }
        $this->StatusSitelinksModerate = $statusSitelinksModerate;
        
        return $this;
    }
    /**
     * Get Sitelinks value
     * @return \StructType\ApiSitelink[]
     */
    public function getSitelinks(): ?array
    {
        return $this->Sitelinks;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setSitelinks method
     * This method is willingly generated in order to preserve the one-line inline validation within the setSitelinks method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateSitelinksForArrayConstraintFromSetSitelinks(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $bannerInfoSitelinksItem) {
            // validation for constraint: itemType
            if (!$bannerInfoSitelinksItem instanceof \StructType\ApiSitelink) {
                $invalidValues[] = is_object($bannerInfoSitelinksItem) ? get_class($bannerInfoSitelinksItem) : sprintf('%s(%s)', gettype($bannerInfoSitelinksItem), var_export($bannerInfoSitelinksItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The Sitelinks property can only contain items of type \StructType\ApiSitelink, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set Sitelinks value
     * @throws InvalidArgumentException
     * @param \StructType\ApiSitelink[] $sitelinks
     * @return \StructType\ApiBannerInfo
     */
    public function setSitelinks(?array $sitelinks = null): self
    {
        // validation for constraint: array
        if ('' !== ($sitelinksArrayErrorMessage = self::validateSitelinksForArrayConstraintFromSetSitelinks($sitelinks))) {
            throw new InvalidArgumentException($sitelinksArrayErrorMessage, __LINE__);
        }
        $this->Sitelinks = $sitelinks;
        
        return $this;
    }
    /**
     * Add item to Sitelinks value
     * @throws InvalidArgumentException
     * @param \StructType\ApiSitelink $item
     * @return \StructType\ApiBannerInfo
     */
    public function addToSitelinks(\StructType\ApiSitelink $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ApiSitelink) {
            throw new InvalidArgumentException(sprintf('The Sitelinks property can only contain items of type \StructType\ApiSitelink, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->Sitelinks[] = $item;
        
        return $this;
    }
    /**
     * Get AdWarnings value
     * @return string[]
     */
    public function getAdWarnings(): ?array
    {
        return $this->AdWarnings;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setAdWarnings method
     * This method is willingly generated in order to preserve the one-line inline validation within the setAdWarnings method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateAdWarningsForArrayConstraintFromSetAdWarnings(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
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
     * @throws InvalidArgumentException
     * @param string[] $adWarnings
     * @return \StructType\ApiBannerInfo
     */
    public function setAdWarnings(?array $adWarnings = null): self
    {
        // validation for constraint: array
        if ('' !== ($adWarningsArrayErrorMessage = self::validateAdWarningsForArrayConstraintFromSetAdWarnings($adWarnings))) {
            throw new InvalidArgumentException($adWarningsArrayErrorMessage, __LINE__);
        }
        $this->AdWarnings = $adWarnings;
        
        return $this;
    }
    /**
     * Add item to AdWarnings value
     * @throws InvalidArgumentException
     * @param string $item
     * @return \StructType\ApiBannerInfo
     */
    public function addToAdWarnings(string $item): self
    {
        // validation for constraint: itemType
        if (!is_string($item)) {
            throw new InvalidArgumentException(sprintf('The AdWarnings property can only contain items of type string, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->AdWarnings[] = $item;
        
        return $this;
    }
    /**
     * Get FixedOnModeration value
     * @return string|null
     */
    public function getFixedOnModeration(): ?string
    {
        return $this->FixedOnModeration;
    }
    /**
     * Set FixedOnModeration value
     * @param string $fixedOnModeration
     * @return \StructType\ApiBannerInfo
     */
    public function setFixedOnModeration(?string $fixedOnModeration = null): self
    {
        // validation for constraint: string
        if (!is_null($fixedOnModeration) && !is_string($fixedOnModeration)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($fixedOnModeration, true), gettype($fixedOnModeration)), __LINE__);
        }
        $this->FixedOnModeration = $fixedOnModeration;
        
        return $this;
    }
    /**
     * Get ModerateRejectionReasons value
     * @return \StructType\ApiRejectReason[]
     */
    public function getModerateRejectionReasons(): ?array
    {
        return $this->ModerateRejectionReasons;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setModerateRejectionReasons method
     * This method is willingly generated in order to preserve the one-line inline validation within the setModerateRejectionReasons method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateModerateRejectionReasonsForArrayConstraintFromSetModerateRejectionReasons(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $bannerInfoModerateRejectionReasonsItem) {
            // validation for constraint: itemType
            if (!$bannerInfoModerateRejectionReasonsItem instanceof \StructType\ApiRejectReason) {
                $invalidValues[] = is_object($bannerInfoModerateRejectionReasonsItem) ? get_class($bannerInfoModerateRejectionReasonsItem) : sprintf('%s(%s)', gettype($bannerInfoModerateRejectionReasonsItem), var_export($bannerInfoModerateRejectionReasonsItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The ModerateRejectionReasons property can only contain items of type \StructType\ApiRejectReason, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set ModerateRejectionReasons value
     * @throws InvalidArgumentException
     * @param \StructType\ApiRejectReason[] $moderateRejectionReasons
     * @return \StructType\ApiBannerInfo
     */
    public function setModerateRejectionReasons(?array $moderateRejectionReasons = null): self
    {
        // validation for constraint: array
        if ('' !== ($moderateRejectionReasonsArrayErrorMessage = self::validateModerateRejectionReasonsForArrayConstraintFromSetModerateRejectionReasons($moderateRejectionReasons))) {
            throw new InvalidArgumentException($moderateRejectionReasonsArrayErrorMessage, __LINE__);
        }
        $this->ModerateRejectionReasons = $moderateRejectionReasons;
        
        return $this;
    }
    /**
     * Add item to ModerateRejectionReasons value
     * @throws InvalidArgumentException
     * @param \StructType\ApiRejectReason $item
     * @return \StructType\ApiBannerInfo
     */
    public function addToModerateRejectionReasons(\StructType\ApiRejectReason $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ApiRejectReason) {
            throw new InvalidArgumentException(sprintf('The ModerateRejectionReasons property can only contain items of type \StructType\ApiRejectReason, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->ModerateRejectionReasons[] = $item;
        
        return $this;
    }
    /**
     * Get Type value
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->Type;
    }
    /**
     * Set Type value
     * @param string $type
     * @return \StructType\ApiBannerInfo
     */
    public function setType(?string $type = null): self
    {
        // validation for constraint: string
        if (!is_null($type) && !is_string($type)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($type, true), gettype($type)), __LINE__);
        }
        $this->Type = $type;
        
        return $this;
    }
    /**
     * Get AdGroupID value
     * @return int|null
     */
    public function getAdGroupID(): ?int
    {
        return $this->AdGroupID;
    }
    /**
     * Set AdGroupID value
     * @param int $adGroupID
     * @return \StructType\ApiBannerInfo
     */
    public function setAdGroupID(?int $adGroupID = null): self
    {
        // validation for constraint: int
        if (!is_null($adGroupID) && !(is_int($adGroupID) || ctype_digit($adGroupID))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide an integer value, %s given', var_export($adGroupID, true), gettype($adGroupID)), __LINE__);
        }
        $this->AdGroupID = $adGroupID;
        
        return $this;
    }
    /**
     * Get AdGroupName value
     * @return string|null
     */
    public function getAdGroupName(): ?string
    {
        return $this->AdGroupName;
    }
    /**
     * Set AdGroupName value
     * @param string $adGroupName
     * @return \StructType\ApiBannerInfo
     */
    public function setAdGroupName(?string $adGroupName = null): self
    {
        // validation for constraint: string
        if (!is_null($adGroupName) && !is_string($adGroupName)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($adGroupName, true), gettype($adGroupName)), __LINE__);
        }
        $this->AdGroupName = $adGroupName;
        
        return $this;
    }
    /**
     * Get AutoMinusWords value
     * @return string|null
     */
    public function getAutoMinusWords(): ?string
    {
        return $this->AutoMinusWords;
    }
    /**
     * Set AutoMinusWords value
     * @param string $autoMinusWords
     * @return \StructType\ApiBannerInfo
     */
    public function setAutoMinusWords(?string $autoMinusWords = null): self
    {
        // validation for constraint: string
        if (!is_null($autoMinusWords) && !is_string($autoMinusWords)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($autoMinusWords, true), gettype($autoMinusWords)), __LINE__);
        }
        $this->AutoMinusWords = $autoMinusWords;
        
        return $this;
    }
    /**
     * Get AgeLabel value
     * @return string|null
     */
    public function getAgeLabel(): ?string
    {
        return $this->AgeLabel;
    }
    /**
     * Set AgeLabel value
     * @param string $ageLabel
     * @return \StructType\ApiBannerInfo
     */
    public function setAgeLabel(?string $ageLabel = null): self
    {
        // validation for constraint: string
        if (!is_null($ageLabel) && !is_string($ageLabel)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($ageLabel, true), gettype($ageLabel)), __LINE__);
        }
        $this->AgeLabel = $ageLabel;
        
        return $this;
    }
    /**
     * Get AdImageHash value
     * @return string|null
     */
    public function getAdImageHash(): ?string
    {
        return $this->AdImageHash;
    }
    /**
     * Set AdImageHash value
     * @param string $adImageHash
     * @return \StructType\ApiBannerInfo
     */
    public function setAdImageHash(?string $adImageHash = null): self
    {
        // validation for constraint: string
        if (!is_null($adImageHash) && !is_string($adImageHash)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($adImageHash, true), gettype($adImageHash)), __LINE__);
        }
        $this->AdImageHash = $adImageHash;
        
        return $this;
    }
    /**
     * Get StatusAdImageModerate value
     * @return string|null
     */
    public function getStatusAdImageModerate(): ?string
    {
        return $this->StatusAdImageModerate;
    }
    /**
     * Set StatusAdImageModerate value
     * @param string $statusAdImageModerate
     * @return \StructType\ApiBannerInfo
     */
    public function setStatusAdImageModerate(?string $statusAdImageModerate = null): self
    {
        // validation for constraint: string
        if (!is_null($statusAdImageModerate) && !is_string($statusAdImageModerate)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($statusAdImageModerate, true), gettype($statusAdImageModerate)), __LINE__);
        }
        $this->StatusAdImageModerate = $statusAdImageModerate;
        
        return $this;
    }
    /**
     * Get AdGroupMobileBidAdjustment value
     * @return int|null
     */
    public function getAdGroupMobileBidAdjustment(): ?int
    {
        return $this->AdGroupMobileBidAdjustment;
    }
    /**
     * Set AdGroupMobileBidAdjustment value
     * @param int $adGroupMobileBidAdjustment
     * @return \StructType\ApiBannerInfo
     */
    public function setAdGroupMobileBidAdjustment(?int $adGroupMobileBidAdjustment = null): self
    {
        // validation for constraint: int
        if (!is_null($adGroupMobileBidAdjustment) && !(is_int($adGroupMobileBidAdjustment) || ctype_digit($adGroupMobileBidAdjustment))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide an integer value, %s given', var_export($adGroupMobileBidAdjustment, true), gettype($adGroupMobileBidAdjustment)), __LINE__);
        }
        $this->AdGroupMobileBidAdjustment = $adGroupMobileBidAdjustment;
        
        return $this;
    }
}
