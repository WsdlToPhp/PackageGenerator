<?php

namespace Api\EnumType;

use \WsdlToPhp\PackageBase\AbstractStructEnumBase;

/**
 * This class stands for SourceType EnumType
 * @package Api
 * @subpackage Enumerations
 * @release 1.1.0
 */
class ApiSourceType extends AbstractStructEnumBase
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
    const VALUE_RELATED_SEARCH = 'RelatedSearch';
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
    const VALUE_INSTANT_ANSWER = 'InstantAnswer';
    /**
     * Constant for value 'News'
     * @return string 'News'
     */
    const VALUE_NEWS = 'News';
    /**
     * Constant for value 'QueryLocation'
     * @return string 'QueryLocation'
     */
    const VALUE_QUERY_LOCATION = 'QueryLocation';
    /**
     * Constant for value 'MobileWeb'
     * @return string 'MobileWeb'
     */
    const VALUE_MOBILE_WEB = 'MobileWeb';
    /**
     * Constant for value 'Translation'
     * @return string 'Translation'
     */
    const VALUE_TRANSLATION = 'Translation';
    /**
     * Return allowed values
     * @uses self::VALUE_SPELL
     * @uses self::VALUE_WEB
     * @uses self::VALUE_IMAGE
     * @uses self::VALUE_RELATED_SEARCH
     * @uses self::VALUE_PHONEBOOK
     * @uses self::VALUE_SHOWTIMES
     * @uses self::VALUE_WEATHER
     * @uses self::VALUE_VIDEO
     * @uses self::VALUE_AD
     * @uses self::VALUE_XRANK
     * @uses self::VALUE_INSTANT_ANSWER
     * @uses self::VALUE_NEWS
     * @uses self::VALUE_QUERY_LOCATION
     * @uses self::VALUE_MOBILE_WEB
     * @uses self::VALUE_TRANSLATION
     * @return string[]
     */
    public static function getValidValues()
    {
        return array(
            self::VALUE_SPELL,
            self::VALUE_WEB,
            self::VALUE_IMAGE,
            self::VALUE_RELATED_SEARCH,
            self::VALUE_PHONEBOOK,
            self::VALUE_SHOWTIMES,
            self::VALUE_WEATHER,
            self::VALUE_VIDEO,
            self::VALUE_AD,
            self::VALUE_XRANK,
            self::VALUE_INSTANT_ANSWER,
            self::VALUE_NEWS,
            self::VALUE_QUERY_LOCATION,
            self::VALUE_MOBILE_WEB,
            self::VALUE_TRANSLATION,
        );
    }
}
