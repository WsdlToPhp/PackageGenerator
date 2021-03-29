<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

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
    public $Query;
    /**
     * The AppId
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var string
     */
    public $AppId;
    /**
     * The Sources
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var \ArrayType\ApiArrayOfSourceType
     */
    public $Sources;
    /**
     * The parameters
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var \StructType\ApiSearchRequest
     */
    public $parameters;
    /**
     * The Version
     * Meta information extracted from the WSDL
     * - default: 2.2
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Version;
    /**
     * The Market
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Market;
    /**
     * The UILanguage
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $UILanguage;
    /**
     * The Adult
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Adult;
    /**
     * The Latitude
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var float
     */
    public $Latitude;
    /**
     * The Longitude
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var float
     */
    public $Longitude;
    /**
     * The Radius
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var float
     */
    public $Radius;
    /**
     * The Options
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \ArrayType\ApiArrayOfSearchOption
     */
    public $Options;
    /**
     * The Web
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \StructType\ApiWebRequest
     */
    public $Web;
    /**
     * The Image
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \StructType\ApiImageRequest
     */
    public $Image;
    /**
     * The Phonebook
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \StructType\ApiPhonebookRequest
     */
    public $Phonebook;
    /**
     * The Video
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \StructType\ApiVideoRequest
     */
    public $Video;
    /**
     * The News
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \StructType\ApiNewsRequest
     */
    public $News;
    /**
     * The MobileWeb
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \StructType\ApiMobileWebRequest
     */
    public $MobileWeb;
    /**
     * The Translation
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \StructType\ApiTranslationRequest
     */
    public $Translation;
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
     * @param \ArrayType\ApiArrayOfSourceType $sources
     * @param \StructType\ApiSearchRequest $parameters
     * @param string $version
     * @param string $market
     * @param string $uILanguage
     * @param string $adult
     * @param float $latitude
     * @param float $longitude
     * @param float $radius
     * @param \ArrayType\ApiArrayOfSearchOption $options
     * @param \StructType\ApiWebRequest $web
     * @param \StructType\ApiImageRequest $image
     * @param \StructType\ApiPhonebookRequest $phonebook
     * @param \StructType\ApiVideoRequest $video
     * @param \StructType\ApiNewsRequest $news
     * @param \StructType\ApiMobileWebRequest $mobileWeb
     * @param \StructType\ApiTranslationRequest $translation
     */
    public function __construct($query = null, $appId = null, \ArrayType\ApiArrayOfSourceType $sources = null, \StructType\ApiSearchRequest $parameters = null, $version = '2.2', $market = null, $uILanguage = null, $adult = null, $latitude = null, $longitude = null, $radius = null, \ArrayType\ApiArrayOfSearchOption $options = null, \StructType\ApiWebRequest $web = null, \StructType\ApiImageRequest $image = null, \StructType\ApiPhonebookRequest $phonebook = null, \StructType\ApiVideoRequest $video = null, \StructType\ApiNewsRequest $news = null, \StructType\ApiMobileWebRequest $mobileWeb = null, \StructType\ApiTranslationRequest $translation = null)
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
    public function getQuery()
    {
        return $this->Query;
    }
    /**
     * Set Query value
     * @param string $query
     * @return \StructType\ApiSearchRequest
     */
    public function setQuery($query = null)
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
    public function getAppId()
    {
        return $this->AppId;
    }
    /**
     * Set AppId value
     * @param string $appId
     * @return \StructType\ApiSearchRequest
     */
    public function setAppId($appId = null)
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
     * @return \ArrayType\ApiArrayOfSourceType
     */
    public function getSources()
    {
        return $this->Sources;
    }
    /**
     * Set Sources value
     * @param \ArrayType\ApiArrayOfSourceType $sources
     * @return \StructType\ApiSearchRequest
     */
    public function setSources(\ArrayType\ApiArrayOfSourceType $sources = null)
    {
        $this->Sources = $sources;
        return $this;
    }
    /**
     * Get parameters value
     * @return \StructType\ApiSearchRequest
     */
    public function getParameters()
    {
        return $this->parameters;
    }
    /**
     * Set parameters value
     * @param \StructType\ApiSearchRequest $parameters
     * @return \StructType\ApiSearchRequest
     */
    public function setParameters(\StructType\ApiSearchRequest $parameters = null)
    {
        $this->parameters = $parameters;
        return $this;
    }
    /**
     * Get Version value
     * @return string|null
     */
    public function getVersion()
    {
        return $this->Version;
    }
    /**
     * Set Version value
     * @param string $version
     * @return \StructType\ApiSearchRequest
     */
    public function setVersion($version = '2.2')
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
    public function getMarket()
    {
        return $this->Market;
    }
    /**
     * Set Market value
     * @param string $market
     * @return \StructType\ApiSearchRequest
     */
    public function setMarket($market = null)
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
    public function getUILanguage()
    {
        return $this->UILanguage;
    }
    /**
     * Set UILanguage value
     * @param string $uILanguage
     * @return \StructType\ApiSearchRequest
     */
    public function setUILanguage($uILanguage = null)
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
    public function getAdult()
    {
        return $this->Adult;
    }
    /**
     * Set Adult value
     * @uses \EnumType\ApiAdultOption::valueIsValid()
     * @uses \EnumType\ApiAdultOption::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $adult
     * @return \StructType\ApiSearchRequest
     */
    public function setAdult($adult = null)
    {
        // validation for constraint: enumeration
        if (!\EnumType\ApiAdultOption::valueIsValid($adult)) {
            throw new \InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \EnumType\ApiAdultOption', is_array($adult) ? implode(', ', $adult) : var_export($adult, true), implode(', ', \EnumType\ApiAdultOption::getValidValues())), __LINE__);
        }
        $this->Adult = $adult;
        return $this;
    }
    /**
     * Get Latitude value
     * @return float|null
     */
    public function getLatitude()
    {
        return $this->Latitude;
    }
    /**
     * Set Latitude value
     * @param float $latitude
     * @return \StructType\ApiSearchRequest
     */
    public function setLatitude($latitude = null)
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
    public function getLongitude()
    {
        return $this->Longitude;
    }
    /**
     * Set Longitude value
     * @param float $longitude
     * @return \StructType\ApiSearchRequest
     */
    public function setLongitude($longitude = null)
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
    public function getRadius()
    {
        return $this->Radius;
    }
    /**
     * Set Radius value
     * @param float $radius
     * @return \StructType\ApiSearchRequest
     */
    public function setRadius($radius = null)
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
     * @return \ArrayType\ApiArrayOfSearchOption|null
     */
    public function getOptions()
    {
        return $this->Options;
    }
    /**
     * Set Options value
     * @param \ArrayType\ApiArrayOfSearchOption $options
     * @return \StructType\ApiSearchRequest
     */
    public function setOptions(\ArrayType\ApiArrayOfSearchOption $options = null)
    {
        $this->Options = $options;
        return $this;
    }
    /**
     * Get Web value
     * @return \StructType\ApiWebRequest|null
     */
    public function getWeb()
    {
        return $this->Web;
    }
    /**
     * Set Web value
     * @param \StructType\ApiWebRequest $web
     * @return \StructType\ApiSearchRequest
     */
    public function setWeb(\StructType\ApiWebRequest $web = null)
    {
        $this->Web = $web;
        return $this;
    }
    /**
     * Get Image value
     * @return \StructType\ApiImageRequest|null
     */
    public function getImage()
    {
        return $this->Image;
    }
    /**
     * Set Image value
     * @param \StructType\ApiImageRequest $image
     * @return \StructType\ApiSearchRequest
     */
    public function setImage(\StructType\ApiImageRequest $image = null)
    {
        $this->Image = $image;
        return $this;
    }
    /**
     * Get Phonebook value
     * @return \StructType\ApiPhonebookRequest|null
     */
    public function getPhonebook()
    {
        return $this->Phonebook;
    }
    /**
     * Set Phonebook value
     * @param \StructType\ApiPhonebookRequest $phonebook
     * @return \StructType\ApiSearchRequest
     */
    public function setPhonebook(\StructType\ApiPhonebookRequest $phonebook = null)
    {
        $this->Phonebook = $phonebook;
        return $this;
    }
    /**
     * Get Video value
     * @return \StructType\ApiVideoRequest|null
     */
    public function getVideo()
    {
        return $this->Video;
    }
    /**
     * Set Video value
     * @param \StructType\ApiVideoRequest $video
     * @return \StructType\ApiSearchRequest
     */
    public function setVideo(\StructType\ApiVideoRequest $video = null)
    {
        $this->Video = $video;
        return $this;
    }
    /**
     * Get News value
     * @return \StructType\ApiNewsRequest|null
     */
    public function getNews()
    {
        return $this->News;
    }
    /**
     * Set News value
     * @param \StructType\ApiNewsRequest $news
     * @return \StructType\ApiSearchRequest
     */
    public function setNews(\StructType\ApiNewsRequest $news = null)
    {
        $this->News = $news;
        return $this;
    }
    /**
     * Get MobileWeb value
     * @return \StructType\ApiMobileWebRequest|null
     */
    public function getMobileWeb()
    {
        return $this->MobileWeb;
    }
    /**
     * Set MobileWeb value
     * @param \StructType\ApiMobileWebRequest $mobileWeb
     * @return \StructType\ApiSearchRequest
     */
    public function setMobileWeb(\StructType\ApiMobileWebRequest $mobileWeb = null)
    {
        $this->MobileWeb = $mobileWeb;
        return $this;
    }
    /**
     * Get Translation value
     * @return \StructType\ApiTranslationRequest|null
     */
    public function getTranslation()
    {
        return $this->Translation;
    }
    /**
     * Set Translation value
     * @param \StructType\ApiTranslationRequest $translation
     * @return \StructType\ApiSearchRequest
     */
    public function setTranslation(\StructType\ApiTranslationRequest $translation = null)
    {
        $this->Translation = $translation;
        return $this;
    }
}
