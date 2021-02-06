<?php

declare(strict_types=1);

namespace Api\StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for SearchRequest StructType
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
class ApiSearchRequest extends AbstractStructBase
{
    /**
     * The Query
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var string
     */
    public ?string $Query = null;
    /**
     * The AppId
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var string
     */
    public ?string $AppId = null;
    /**
     * The Sources
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var \Api\ArrayType\ApiArrayOfSourceType
     */
    public ?\Api\ArrayType\ApiArrayOfSourceType $Sources = null;
    /**
     * The parameters
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var \Api\StructType\ApiSearchRequest
     */
    public ?\Api\StructType\ApiSearchRequest $parameters = null;
    /**
     * The Version
     * Meta information extracted from the WSDL
     * - default: 2.2
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public ?string $Version = null;
    /**
     * The Market
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public ?string $Market = null;
    /**
     * The UILanguage
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public ?string $UILanguage = null;
    /**
     * The Adult
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public ?string $Adult = null;
    /**
     * The Latitude
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var float
     */
    public ?float $Latitude = null;
    /**
     * The Longitude
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var float
     */
    public ?float $Longitude = null;
    /**
     * The Radius
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var float
     */
    public ?float $Radius = null;
    /**
     * The Options
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Api\ArrayType\ApiArrayOfSearchOption
     */
    public ?\Api\ArrayType\ApiArrayOfSearchOption $Options = null;
    /**
     * The Web
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Api\StructType\ApiWebRequest
     */
    public ?\Api\StructType\ApiWebRequest $Web = null;
    /**
     * The Image
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Api\StructType\ApiImageRequest
     */
    public ?\Api\StructType\ApiImageRequest $Image = null;
    /**
     * The Phonebook
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Api\StructType\ApiPhonebookRequest
     */
    public ?\Api\StructType\ApiPhonebookRequest $Phonebook = null;
    /**
     * The Video
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Api\StructType\ApiVideoRequest
     */
    public ?\Api\StructType\ApiVideoRequest $Video = null;
    /**
     * The News
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Api\StructType\ApiNewsRequest
     */
    public ?\Api\StructType\ApiNewsRequest $News = null;
    /**
     * The MobileWeb
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Api\StructType\ApiMobileWebRequest
     */
    public ?\Api\StructType\ApiMobileWebRequest $MobileWeb = null;
    /**
     * The Translation
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Api\StructType\ApiTranslationRequest
     */
    public ?\Api\StructType\ApiTranslationRequest $Translation = null;
    /**
     * Constructor method for SearchRequest
     * @uses ApiSearchRequest::setQuery()
     * @uses ApiSearchRequest::setAppId()
     * @uses ApiSearchRequest::setSources()
     * @uses ApiSearchRequest::setParameters()
     * @uses ApiSearchRequest::setVersion()
     * @uses ApiSearchRequest::setMarket()
     * @uses ApiSearchRequest::setUILanguage()
     * @uses ApiSearchRequest::setAdult()
     * @uses ApiSearchRequest::setLatitude()
     * @uses ApiSearchRequest::setLongitude()
     * @uses ApiSearchRequest::setRadius()
     * @uses ApiSearchRequest::setOptions()
     * @uses ApiSearchRequest::setWeb()
     * @uses ApiSearchRequest::setImage()
     * @uses ApiSearchRequest::setPhonebook()
     * @uses ApiSearchRequest::setVideo()
     * @uses ApiSearchRequest::setNews()
     * @uses ApiSearchRequest::setMobileWeb()
     * @uses ApiSearchRequest::setTranslation()
     * @param string $query
     * @param string $appId
     * @param \Api\ArrayType\ApiArrayOfSourceType $sources
     * @param \Api\StructType\ApiSearchRequest $parameters
     * @param string $version
     * @param string $market
     * @param string $uILanguage
     * @param string $adult
     * @param float $latitude
     * @param float $longitude
     * @param float $radius
     * @param \Api\ArrayType\ApiArrayOfSearchOption $options
     * @param \Api\StructType\ApiWebRequest $web
     * @param \Api\StructType\ApiImageRequest $image
     * @param \Api\StructType\ApiPhonebookRequest $phonebook
     * @param \Api\StructType\ApiVideoRequest $video
     * @param \Api\StructType\ApiNewsRequest $news
     * @param \Api\StructType\ApiMobileWebRequest $mobileWeb
     * @param \Api\StructType\ApiTranslationRequest $translation
     */
    public function __construct(?string $query = null, ?string $appId = null, ?\Api\ArrayType\ApiArrayOfSourceType $sources = null, ?\Api\StructType\ApiSearchRequest $parameters = null, ?string $version = '2.2', ?string $market = null, ?string $uILanguage = null, ?string $adult = null, ?float $latitude = null, ?float $longitude = null, ?float $radius = null, ?\Api\ArrayType\ApiArrayOfSearchOption $options = null, ?\Api\StructType\ApiWebRequest $web = null, ?\Api\StructType\ApiImageRequest $image = null, ?\Api\StructType\ApiPhonebookRequest $phonebook = null, ?\Api\StructType\ApiVideoRequest $video = null, ?\Api\StructType\ApiNewsRequest $news = null, ?\Api\StructType\ApiMobileWebRequest $mobileWeb = null, ?\Api\StructType\ApiTranslationRequest $translation = null)
    {
        $this
            ->setQuery($query)
            ->setAppId($appId)
            ->setSources($sources)
            ->setParameters($parameters)
            ->setVersion($version)
            ->setMarket($market)
            ->setUILanguage($uILanguage)
            ->setAdult($adult)
            ->setLatitude($latitude)
            ->setLongitude($longitude)
            ->setRadius($radius)
            ->setOptions($options)
            ->setWeb($web)
            ->setImage($image)
            ->setPhonebook($phonebook)
            ->setVideo($video)
            ->setNews($news)
            ->setMobileWeb($mobileWeb)
            ->setTranslation($translation);
    }
    /**
     * Get Query value
     * @return string
     */
    public function getQuery(): ?string
    {
        return $this->Query;
    }
    /**
     * Set Query value
     * @param string $query
     * @return \Api\StructType\ApiSearchRequest
     */
    public function setQuery(?string $query = null): self
    {
        // validation for constraint: string
        if (!is_null($query) && !is_string($query)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($query, true), gettype($query)), __LINE__);
        }
        $this->Query = $query;
        return $this;
    }
    /**
     * Get AppId value
     * @return string
     */
    public function getAppId(): ?string
    {
        return $this->AppId;
    }
    /**
     * Set AppId value
     * @param string $appId
     * @return \Api\StructType\ApiSearchRequest
     */
    public function setAppId(?string $appId = null): self
    {
        // validation for constraint: string
        if (!is_null($appId) && !is_string($appId)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($appId, true), gettype($appId)), __LINE__);
        }
        $this->AppId = $appId;
        return $this;
    }
    /**
     * Get Sources value
     * @return \Api\ArrayType\ApiArrayOfSourceType
     */
    public function getSources(): ?\Api\ArrayType\ApiArrayOfSourceType
    {
        return $this->Sources;
    }
    /**
     * Set Sources value
     * @param \Api\ArrayType\ApiArrayOfSourceType $sources
     * @return \Api\StructType\ApiSearchRequest
     */
    public function setSources(?\Api\ArrayType\ApiArrayOfSourceType $sources = null): self
    {
        $this->Sources = $sources;
        return $this;
    }
    /**
     * Get parameters value
     * @return \Api\StructType\ApiSearchRequest
     */
    public function getParameters(): ?\Api\StructType\ApiSearchRequest
    {
        return $this->parameters;
    }
    /**
     * Set parameters value
     * @param \Api\StructType\ApiSearchRequest $parameters
     * @return \Api\StructType\ApiSearchRequest
     */
    public function setParameters(?\Api\StructType\ApiSearchRequest $parameters = null): self
    {
        $this->parameters = $parameters;
        return $this;
    }
    /**
     * Get Version value
     * @return string|null
     */
    public function getVersion(): ?string
    {
        return $this->Version;
    }
    /**
     * Set Version value
     * @param string $version
     * @return \Api\StructType\ApiSearchRequest
     */
    public function setVersion(?string $version = '2.2'): self
    {
        // validation for constraint: string
        if (!is_null($version) && !is_string($version)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($version, true), gettype($version)), __LINE__);
        }
        $this->Version = $version;
        return $this;
    }
    /**
     * Get Market value
     * @return string|null
     */
    public function getMarket(): ?string
    {
        return $this->Market;
    }
    /**
     * Set Market value
     * @param string $market
     * @return \Api\StructType\ApiSearchRequest
     */
    public function setMarket(?string $market = null): self
    {
        // validation for constraint: string
        if (!is_null($market) && !is_string($market)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($market, true), gettype($market)), __LINE__);
        }
        $this->Market = $market;
        return $this;
    }
    /**
     * Get UILanguage value
     * @return string|null
     */
    public function getUILanguage(): ?string
    {
        return $this->UILanguage;
    }
    /**
     * Set UILanguage value
     * @param string $uILanguage
     * @return \Api\StructType\ApiSearchRequest
     */
    public function setUILanguage(?string $uILanguage = null): self
    {
        // validation for constraint: string
        if (!is_null($uILanguage) && !is_string($uILanguage)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($uILanguage, true), gettype($uILanguage)), __LINE__);
        }
        $this->UILanguage = $uILanguage;
        return $this;
    }
    /**
     * Get Adult value
     * @return string|null
     */
    public function getAdult(): ?string
    {
        return $this->Adult;
    }
    /**
     * Set Adult value
     * @uses \Api\EnumType\ApiAdultOption::valueIsValid()
     * @uses \Api\EnumType\ApiAdultOption::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $adult
     * @return \Api\StructType\ApiSearchRequest
     */
    public function setAdult(?string $adult = null): self
    {
        // validation for constraint: enumeration
        if (!\Api\EnumType\ApiAdultOption::valueIsValid($adult)) {
            throw new \InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \Api\EnumType\ApiAdultOption', is_array($adult) ? implode(', ', $adult) : var_export($adult, true), implode(', ', \Api\EnumType\ApiAdultOption::getValidValues())), __LINE__);
        }
        $this->Adult = $adult;
        return $this;
    }
    /**
     * Get Latitude value
     * @return float|null
     */
    public function getLatitude(): ?float
    {
        return $this->Latitude;
    }
    /**
     * Set Latitude value
     * @param float $latitude
     * @return \Api\StructType\ApiSearchRequest
     */
    public function setLatitude(?float $latitude = null): self
    {
        // validation for constraint: float
        if (!is_null($latitude) && !(is_float($latitude) || is_numeric($latitude))) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a float value, %s given', var_export($latitude, true), gettype($latitude)), __LINE__);
        }
        $this->Latitude = $latitude;
        return $this;
    }
    /**
     * Get Longitude value
     * @return float|null
     */
    public function getLongitude(): ?float
    {
        return $this->Longitude;
    }
    /**
     * Set Longitude value
     * @param float $longitude
     * @return \Api\StructType\ApiSearchRequest
     */
    public function setLongitude(?float $longitude = null): self
    {
        // validation for constraint: float
        if (!is_null($longitude) && !(is_float($longitude) || is_numeric($longitude))) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a float value, %s given', var_export($longitude, true), gettype($longitude)), __LINE__);
        }
        $this->Longitude = $longitude;
        return $this;
    }
    /**
     * Get Radius value
     * @return float|null
     */
    public function getRadius(): ?float
    {
        return $this->Radius;
    }
    /**
     * Set Radius value
     * @param float $radius
     * @return \Api\StructType\ApiSearchRequest
     */
    public function setRadius(?float $radius = null): self
    {
        // validation for constraint: float
        if (!is_null($radius) && !(is_float($radius) || is_numeric($radius))) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a float value, %s given', var_export($radius, true), gettype($radius)), __LINE__);
        }
        $this->Radius = $radius;
        return $this;
    }
    /**
     * Get Options value
     * @return \Api\ArrayType\ApiArrayOfSearchOption|null
     */
    public function getOptions(): ?\Api\ArrayType\ApiArrayOfSearchOption
    {
        return $this->Options;
    }
    /**
     * Set Options value
     * @param \Api\ArrayType\ApiArrayOfSearchOption $options
     * @return \Api\StructType\ApiSearchRequest
     */
    public function setOptions(?\Api\ArrayType\ApiArrayOfSearchOption $options = null): self
    {
        $this->Options = $options;
        return $this;
    }
    /**
     * Get Web value
     * @return \Api\StructType\ApiWebRequest|null
     */
    public function getWeb(): ?\Api\StructType\ApiWebRequest
    {
        return $this->Web;
    }
    /**
     * Set Web value
     * @param \Api\StructType\ApiWebRequest $web
     * @return \Api\StructType\ApiSearchRequest
     */
    public function setWeb(?\Api\StructType\ApiWebRequest $web = null): self
    {
        $this->Web = $web;
        return $this;
    }
    /**
     * Get Image value
     * @return \Api\StructType\ApiImageRequest|null
     */
    public function getImage(): ?\Api\StructType\ApiImageRequest
    {
        return $this->Image;
    }
    /**
     * Set Image value
     * @param \Api\StructType\ApiImageRequest $image
     * @return \Api\StructType\ApiSearchRequest
     */
    public function setImage(?\Api\StructType\ApiImageRequest $image = null): self
    {
        $this->Image = $image;
        return $this;
    }
    /**
     * Get Phonebook value
     * @return \Api\StructType\ApiPhonebookRequest|null
     */
    public function getPhonebook(): ?\Api\StructType\ApiPhonebookRequest
    {
        return $this->Phonebook;
    }
    /**
     * Set Phonebook value
     * @param \Api\StructType\ApiPhonebookRequest $phonebook
     * @return \Api\StructType\ApiSearchRequest
     */
    public function setPhonebook(?\Api\StructType\ApiPhonebookRequest $phonebook = null): self
    {
        $this->Phonebook = $phonebook;
        return $this;
    }
    /**
     * Get Video value
     * @return \Api\StructType\ApiVideoRequest|null
     */
    public function getVideo(): ?\Api\StructType\ApiVideoRequest
    {
        return $this->Video;
    }
    /**
     * Set Video value
     * @param \Api\StructType\ApiVideoRequest $video
     * @return \Api\StructType\ApiSearchRequest
     */
    public function setVideo(?\Api\StructType\ApiVideoRequest $video = null): self
    {
        $this->Video = $video;
        return $this;
    }
    /**
     * Get News value
     * @return \Api\StructType\ApiNewsRequest|null
     */
    public function getNews(): ?\Api\StructType\ApiNewsRequest
    {
        return $this->News;
    }
    /**
     * Set News value
     * @param \Api\StructType\ApiNewsRequest $news
     * @return \Api\StructType\ApiSearchRequest
     */
    public function setNews(?\Api\StructType\ApiNewsRequest $news = null): self
    {
        $this->News = $news;
        return $this;
    }
    /**
     * Get MobileWeb value
     * @return \Api\StructType\ApiMobileWebRequest|null
     */
    public function getMobileWeb(): ?\Api\StructType\ApiMobileWebRequest
    {
        return $this->MobileWeb;
    }
    /**
     * Set MobileWeb value
     * @param \Api\StructType\ApiMobileWebRequest $mobileWeb
     * @return \Api\StructType\ApiSearchRequest
     */
    public function setMobileWeb(?\Api\StructType\ApiMobileWebRequest $mobileWeb = null): self
    {
        $this->MobileWeb = $mobileWeb;
        return $this;
    }
    /**
     * Get Translation value
     * @return \Api\StructType\ApiTranslationRequest|null
     */
    public function getTranslation(): ?\Api\StructType\ApiTranslationRequest
    {
        return $this->Translation;
    }
    /**
     * Set Translation value
     * @param \Api\StructType\ApiTranslationRequest $translation
     * @return \Api\StructType\ApiSearchRequest
     */
    public function setTranslation(?\Api\StructType\ApiTranslationRequest $translation = null): self
    {
        $this->Translation = $translation;
        return $this;
    }
}
