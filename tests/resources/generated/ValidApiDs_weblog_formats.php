<?php

namespace Api\EnumType;

/**
 * This class stands for ds_weblog_formats EnumType
 * @package Api
 * @subpackage Enumerations
 * @release 1.1.0
 */
class ApiDs_weblog_formats
{
    /**
     * Constant for value 'NCSA Common (Apache default)'
     * @return string 'NCSA Common (Apache default)'
     */
    const VALUE_NCSA_COMMON_APACHE_DEFAULT = 'NCSA Common (Apache default)';
    /**
     * Constant for value 'NCSA Combined (Apache)'
     * @return string 'NCSA Combined (Apache)'
     */
    const VALUE_NCSA_COMBINED_APACHE = 'NCSA Combined (Apache)';
    /**
     * Constant for value 'W3C Extended (IIS 4.0 and later)'
     * @return string 'W3C Extended (IIS 4.0 and later)'
     */
    const VALUE_W_3_C_EXTENDED_IIS_4_0_AND_LATER = 'W3C Extended (IIS 4.0 and later)';
    /**
     * Constant for value 'Microsoft IIS Log (IIS 3 and earlier)'
     * @return string 'Microsoft IIS Log (IIS 3 and earlier)'
     */
    const VALUE_MICROSOFT_IIS_LOG_IIS_3_AND_EARLIER = 'Microsoft IIS Log (IIS 3 and earlier)';
    /**
     * Return true if value is allowed
     * @uses self::getValidValues()
     * @param mixed $value value
     * @return bool true|false
     */
    public static function valueIsValid($value)
    {
        return ($value === null) || in_array($value, self::getValidValues(), true);
    }
    /**
     * Return allowed values
     * @uses self::VALUE_NCSA_COMMON_APACHE_DEFAULT
     * @uses self::VALUE_NCSA_COMBINED_APACHE
     * @uses self::VALUE_W_3_C_EXTENDED_IIS_4_0_AND_LATER
     * @uses self::VALUE_MICROSOFT_IIS_LOG_IIS_3_AND_EARLIER
     * @return string[]
     */
    public static function getValidValues()
    {
        return array(
            self::VALUE_NCSA_COMMON_APACHE_DEFAULT,
            self::VALUE_NCSA_COMBINED_APACHE,
            self::VALUE_W_3_C_EXTENDED_IIS_4_0_AND_LATER,
            self::VALUE_MICROSOFT_IIS_LOG_IIS_3_AND_EARLIER,
        );
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
