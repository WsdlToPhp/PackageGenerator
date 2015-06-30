<?php
/**
 * File for class ApiStructSearchRequest
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
/**
 * This class stands for SearchRequest Struct
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
class ApiStructSearchRequest extends ApiWsdlClass
{
    /**
     * The Query
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var string
     */
    public $Query;
    /**
     * The AppId
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var string
     */
    public $AppId;
    /**
     * The Sources
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var ApiStructArrayOfSourceType
     */
    public $Sources;
    /**
     * The parameters
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var ApiStructSearchRequest
     */
    public $parameters;
    /**
     * The Version
     * Meta informations extracted from the WSDL
     * - default: 2.2
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Version;
    /**
     * The Market
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Market;
    /**
     * The UILanguage
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $UILanguage;
    /**
     * The Adult
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var ApiEnumAdultOption
     */
    public $Adult;
    /**
     * The Latitude
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var double
     */
    public $Latitude;
    /**
     * The Longitude
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var double
     */
    public $Longitude;
    /**
     * The Radius
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var double
     */
    public $Radius;
    /**
     * The Options
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var ApiStructArrayOfSearchOption
     */
    public $Options;
    /**
     * The Web
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var ApiStructWebRequest
     */
    public $Web;
    /**
     * The Image
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var ApiStructImageRequest
     */
    public $Image;
    /**
     * The Phonebook
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var ApiStructPhonebookRequest
     */
    public $Phonebook;
    /**
     * The Video
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var ApiStructVideoRequest
     */
    public $Video;
    /**
     * The News
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var ApiStructNewsRequest
     */
    public $News;
    /**
     * The MobileWeb
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var ApiStructMobileWebRequest
     */
    public $MobileWeb;
    /**
     * The Translation
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var ApiStructTranslationRequest
     */
    public $Translation;
    /**
     * Constructor method for SearchRequest
     * @see parent::__construct()
     * @param string $query
     * @param string $appId
     * @param ApiStructArrayOfSourceType $sources
     * @param ApiStructSearchRequest $parameters
     * @param string $version
     * @param string $market
     * @param string $uILanguage
     * @param ApiEnumAdultOption $adult
     * @param double $latitude
     * @param double $longitude
     * @param double $radius
     * @param ApiStructArrayOfSearchOption $options
     * @param ApiStructWebRequest $web
     * @param ApiStructImageRequest $image
     * @param ApiStructPhonebookRequest $phonebook
     * @param ApiStructVideoRequest $video
     * @param ApiStructNewsRequest $news
     * @param ApiStructMobileWebRequest $mobileWeb
     * @param ApiStructTranslationRequest $translation
     */
    public function __construct($query, $appId, ApiStructArrayOfSourceType $sources, ApiStructSearchRequest $parameters, $version = 2.2000000000000002, $market = null, $uILanguage = null, $adult = null, $latitude = null, $longitude = null, $radius = null, ApiStructArrayOfSearchOption $options = null, ApiStructWebRequest $web = null, ApiStructImageRequest $image = null, ApiStructPhonebookRequest $phonebook = null, ApiStructVideoRequest $video = null, ApiStructNewsRequest $news = null, ApiStructMobileWebRequest $mobileWeb = null, ApiStructTranslationRequest $translation = null)
    {
        parent::__construct(array('Query'=>$query, 'AppId'=>$appId, 'Sources'=>$sources, 'parameters'=>$parameters, 'Version'=>$version, 'Market'=>$market, 'UILanguage'=>$uILanguage, 'Adult'=>$adult, 'Latitude'=>$latitude, 'Longitude'=>$longitude, 'Radius'=>$radius, 'Options'=>$options, 'Web'=>$web, 'Image'=>$image, 'Phonebook'=>$phonebook, 'Video'=>$video, 'News'=>$news, 'MobileWeb'=>$mobileWeb, 'Translation'=>$translation), false);
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
     * @return ApiStructSearchRequest
     */
    public function setQuery($query)
    {
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
     * @return ApiStructSearchRequest
     */
    public function setAppId($appId)
    {
        $this->AppId = $appId;
        return $this;
    }
    /**
     * Get Sources value
     * @return ApiStructArrayOfSourceType
     */
    public function getSources()
    {
        return $this->Sources;
    }
    /**
     * Set Sources value
     * @param ApiStructArrayOfSourceType $sources
     * @return ApiStructSearchRequest
     */
    public function setSources(ApiStructArrayOfSourceType $sources)
    {
        $this->Sources = $sources;
        return $this;
    }
    /**
     * Get parameters value
     * @return ApiStructSearchRequest
     */
    public function getParameters()
    {
        return $this->parameters;
    }
    /**
     * Set parameters value
     * @param ApiStructSearchRequest $parameters
     * @return ApiStructSearchRequest
     */
    public function setParameters(ApiStructSearchRequest $parameters)
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
     * @return ApiStructSearchRequest
     */
    public function setVersion($version)
    {
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
     * @return ApiStructSearchRequest
     */
    public function setMarket($market)
    {
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
     * @return ApiStructSearchRequest
     */
    public function setUILanguage($uILanguage)
    {
        $this->UILanguage = $uILanguage;
        return $this;
    }
    /**
     * Get Adult value
     * @return ApiEnumAdultOption|null
     */
    public function getAdult()
    {
        return $this->Adult;
    }
    /**
     * Set Adult value
     * @uses ApiEnumAdultOption::valueIsValid()
     * @param ApiEnumAdultOption $adult
     * @return ApiStructSearchRequest
     */
    public function setAdult($adult)
    {
        if(!ApiEnumAdultOption::valueIsValid($adult)) {
            return false;
        }
        $this->Adult = $adult;
        return $this;
    }
    /**
     * Get Latitude value
     * @return double|null
     */
    public function getLatitude()
    {
        return $this->Latitude;
    }
    /**
     * Set Latitude value
     * @param double $latitude
     * @return ApiStructSearchRequest
     */
    public function setLatitude($latitude)
    {
        $this->Latitude = $latitude;
        return $this;
    }
    /**
     * Get Longitude value
     * @return double|null
     */
    public function getLongitude()
    {
        return $this->Longitude;
    }
    /**
     * Set Longitude value
     * @param double $longitude
     * @return ApiStructSearchRequest
     */
    public function setLongitude($longitude)
    {
        $this->Longitude = $longitude;
        return $this;
    }
    /**
     * Get Radius value
     * @return double|null
     */
    public function getRadius()
    {
        return $this->Radius;
    }
    /**
     * Set Radius value
     * @param double $radius
     * @return ApiStructSearchRequest
     */
    public function setRadius($radius)
    {
        $this->Radius = $radius;
        return $this;
    }
    /**
     * Get Options value
     * @return ApiStructArrayOfSearchOption|null
     */
    public function getOptions()
    {
        return $this->Options;
    }
    /**
     * Set Options value
     * @param ApiStructArrayOfSearchOption $options
     * @return ApiStructSearchRequest
     */
    public function setOptions(ApiStructArrayOfSearchOption $options)
    {
        $this->Options = $options;
        return $this;
    }
    /**
     * Get Web value
     * @return ApiStructWebRequest|null
     */
    public function getWeb()
    {
        return $this->Web;
    }
    /**
     * Set Web value
     * @param ApiStructWebRequest $web
     * @return ApiStructSearchRequest
     */
    public function setWeb(ApiStructWebRequest $web)
    {
        $this->Web = $web;
        return $this;
    }
    /**
     * Get Image value
     * @return ApiStructImageRequest|null
     */
    public function getImage()
    {
        return $this->Image;
    }
    /**
     * Set Image value
     * @param ApiStructImageRequest $image
     * @return ApiStructSearchRequest
     */
    public function setImage(ApiStructImageRequest $image)
    {
        $this->Image = $image;
        return $this;
    }
    /**
     * Get Phonebook value
     * @return ApiStructPhonebookRequest|null
     */
    public function getPhonebook()
    {
        return $this->Phonebook;
    }
    /**
     * Set Phonebook value
     * @param ApiStructPhonebookRequest $phonebook
     * @return ApiStructSearchRequest
     */
    public function setPhonebook(ApiStructPhonebookRequest $phonebook)
    {
        $this->Phonebook = $phonebook;
        return $this;
    }
    /**
     * Get Video value
     * @return ApiStructVideoRequest|null
     */
    public function getVideo()
    {
        return $this->Video;
    }
    /**
     * Set Video value
     * @param ApiStructVideoRequest $video
     * @return ApiStructSearchRequest
     */
    public function setVideo(ApiStructVideoRequest $video)
    {
        $this->Video = $video;
        return $this;
    }
    /**
     * Get News value
     * @return ApiStructNewsRequest|null
     */
    public function getNews()
    {
        return $this->News;
    }
    /**
     * Set News value
     * @param ApiStructNewsRequest $news
     * @return ApiStructSearchRequest
     */
    public function setNews(ApiStructNewsRequest $news)
    {
        $this->News = $news;
        return $this;
    }
    /**
     * Get MobileWeb value
     * @return ApiStructMobileWebRequest|null
     */
    public function getMobileWeb()
    {
        return $this->MobileWeb;
    }
    /**
     * Set MobileWeb value
     * @param ApiStructMobileWebRequest $mobileWeb
     * @return ApiStructSearchRequest
     */
    public function setMobileWeb(ApiStructMobileWebRequest $mobileWeb)
    {
        $this->MobileWeb = $mobileWeb;
        return $this;
    }
    /**
     * Get Translation value
     * @return ApiStructTranslationRequest|null
     */
    public function getTranslation()
    {
        return $this->Translation;
    }
    /**
     * Set Translation value
     * @param ApiStructTranslationRequest $translation
     * @return ApiStructSearchRequest
     */
    public function setTranslation(ApiStructTranslationRequest $translation)
    {
        $this->Translation = $translation;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see ApiWsdlClass::__set_state()
     * @uses ApiWsdlClass::__set_state()
     * @param array $array the exported values
     * @return ApiStructSearchRequest
     */
    public static function __set_state(array $array)
    {
        return parent::__set_state($array);
    }
    /**
     * Method returning the class name
     * @return string __CLASS__
     */
    public function __toString()
    {
        return __CLASS__;
    }
}
