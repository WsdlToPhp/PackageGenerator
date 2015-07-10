<?php
/**
 * This class stands for SourceType Enum
 * Meta informations extracted from the WSDL
 * - maxOccurs: 1
 * - minOccurs: 0
 * - type: xsd:string
 * @package Api
 * @subpackage Enumerations
 * @release 1.1.0
 */
class ApiEnumSourceType
{
    /**
     * Constant for value 'Spell'
     * @return string 'Spell'
     */
    const VALUE_SPELL = 'Spell';
    /**
     * Constant for value 'Web'
     * @return string 'Web'
     */
    const VALUE_WEB = 'Web';
    /**
     * Constant for value 'Image'
     * @return string 'Image'
     */
    const VALUE_IMAGE = 'Image';
    /**
     * Constant for value 'RelatedSearch'
     * @return string 'RelatedSearch'
     */
    const VALUE_RELATEDSEARCH = 'RelatedSearch';
    /**
     * Constant for value 'Phonebook'
     * @return string 'Phonebook'
     */
    const VALUE_PHONEBOOK = 'Phonebook';
    /**
     * Constant for value 'Showtimes'
     * @return string 'Showtimes'
     */
    const VALUE_SHOWTIMES = 'Showtimes';
    /**
     * Constant for value 'Weather'
     * @return string 'Weather'
     */
    const VALUE_WEATHER = 'Weather';
    /**
     * Constant for value 'Video'
     * @return string 'Video'
     */
    const VALUE_VIDEO = 'Video';
    /**
     * Constant for value 'Ad'
     * @return string 'Ad'
     */
    const VALUE_AD = 'Ad';
    /**
     * Constant for value 'XRank'
     * @return string 'XRank'
     */
    const VALUE_XRANK = 'XRank';
    /**
     * Constant for value 'InstantAnswer'
     * @return string 'InstantAnswer'
     */
    const VALUE_INSTANTANSWER = 'InstantAnswer';
    /**
     * Constant for value 'News'
     * @return string 'News'
     */
    const VALUE_NEWS = 'News';
    /**
     * Constant for value 'QueryLocation'
     * @return string 'QueryLocation'
     */
    const VALUE_QUERYLOCATION = 'QueryLocation';
    /**
     * Constant for value 'MobileWeb'
     * @return string 'MobileWeb'
     */
    const VALUE_MOBILEWEB = 'MobileWeb';
    /**
     * Constant for value 'Translation'
     * @return string 'Translation'
     */
    const VALUE_TRANSLATION = 'Translation';
    /**
     * Return true if value is allowed
     * @uses ApiEnumSourceType::VALUE_SPELL
     * @uses ApiEnumSourceType::VALUE_WEB
     * @uses ApiEnumSourceType::VALUE_IMAGE
     * @uses ApiEnumSourceType::VALUE_RELATEDSEARCH
     * @uses ApiEnumSourceType::VALUE_PHONEBOOK
     * @uses ApiEnumSourceType::VALUE_SHOWTIMES
     * @uses ApiEnumSourceType::VALUE_WEATHER
     * @uses ApiEnumSourceType::VALUE_VIDEO
     * @uses ApiEnumSourceType::VALUE_AD
     * @uses ApiEnumSourceType::VALUE_XRANK
     * @uses ApiEnumSourceType::VALUE_INSTANTANSWER
     * @uses ApiEnumSourceType::VALUE_NEWS
     * @uses ApiEnumSourceType::VALUE_QUERYLOCATION
     * @uses ApiEnumSourceType::VALUE_MOBILEWEB
     * @uses ApiEnumSourceType::VALUE_TRANSLATION
     * @param mixed $value value
     * @return bool true|false
     */
    public static function valueIsValid($value)
    {
        return in_array($value, array(ApiEnumSourceType::VALUE_SPELL, ApiEnumSourceType::VALUE_WEB, ApiEnumSourceType::VALUE_IMAGE, ApiEnumSourceType::VALUE_RELATEDSEARCH, ApiEnumSourceType::VALUE_PHONEBOOK, ApiEnumSourceType::VALUE_SHOWTIMES, ApiEnumSourceType::VALUE_WEATHER, ApiEnumSourceType::VALUE_VIDEO, ApiEnumSourceType::VALUE_AD, ApiEnumSourceType::VALUE_XRANK, ApiEnumSourceType::VALUE_INSTANTANSWER, ApiEnumSourceType::VALUE_NEWS, ApiEnumSourceType::VALUE_QUERYLOCATION, ApiEnumSourceType::VALUE_MOBILEWEB, ApiEnumSourceType::VALUE_TRANSLATION));
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
