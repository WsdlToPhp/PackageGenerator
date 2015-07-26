<?php

namespace Api\EnumType;

/**
 * This class stands for SourceType EnumType
 * @package Api
 * @subpackage Enumerations
 * @release 1.1.0
 */
class ApiSourceType
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
     * @uses self::VALUE_SPELL
     * @uses self::VALUE_WEB
     * @uses self::VALUE_IMAGE
     * @uses self::VALUE_RELATEDSEARCH
     * @uses self::VALUE_PHONEBOOK
     * @uses self::VALUE_SHOWTIMES
     * @uses self::VALUE_WEATHER
     * @uses self::VALUE_VIDEO
     * @uses self::VALUE_AD
     * @uses self::VALUE_XRANK
     * @uses self::VALUE_INSTANTANSWER
     * @uses self::VALUE_NEWS
     * @uses self::VALUE_QUERYLOCATION
     * @uses self::VALUE_MOBILEWEB
     * @uses self::VALUE_TRANSLATION
     * @param mixed $value value
     * @return bool true|false
     */
    public static function valueIsValid($value)
    {
        return in_array($value, array(self::VALUE_SPELL, self::VALUE_WEB, self::VALUE_IMAGE, self::VALUE_RELATEDSEARCH, self::VALUE_PHONEBOOK, self::VALUE_SHOWTIMES, self::VALUE_WEATHER, self::VALUE_VIDEO, self::VALUE_AD, self::VALUE_XRANK, self::VALUE_INSTANTANSWER, self::VALUE_NEWS, self::VALUE_QUERYLOCATION, self::VALUE_MOBILEWEB, self::VALUE_TRANSLATION), true);
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
