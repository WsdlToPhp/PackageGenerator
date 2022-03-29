<?php

declare(strict_types=1);

namespace EnumType;

use WsdlToPhp\PackageBase\AbstractStructEnumBase;

/**
 * This class stands for PhoneNumberKeyType EnumType
 * @package Api
 * @subpackage Enumerations
 * @release 1.1.0
 */
class ApiPhoneNumberKeyType extends AbstractStructEnumBase
{
    /**
     * Constant for value 'AssistantPhone'
     * @return string 'AssistantPhone'
     */
    const VALUE_ASSISTANT_PHONE = 'AssistantPhone';
    /**
     * Constant for value 'BusinessFax'
     * @return string 'BusinessFax'
     */
    const VALUE_BUSINESS_FAX = 'BusinessFax';
    /**
     * Constant for value 'BusinessPhone'
     * @return string 'BusinessPhone'
     */
    const VALUE_BUSINESS_PHONE = 'BusinessPhone';
    /**
     * Constant for value 'BusinessPhone2'
     * @return string 'BusinessPhone2'
     */
    const VALUE_BUSINESS_PHONE_2_1 = 'BusinessPhone2';
    /**
     * Constant for value 'Callback'
     * @return string 'Callback'
     */
    const VALUE_CALLBACK = 'Callback';
    /**
     * Constant for value 'CarPhone'
     * @return string 'CarPhone'
     */
    const VALUE_CAR_PHONE = 'CarPhone';
    /**
     * Constant for value 'CompanyMainPhone'
     * @return string 'CompanyMainPhone'
     */
    const VALUE_COMPANY_MAIN_PHONE = 'CompanyMainPhone';
    /**
     * Constant for value 'HomeFax'
     * @return string 'HomeFax'
     */
    const VALUE_HOME_FAX = 'HomeFax';
    /**
     * Constant for value 'HomePhone'
     * @return string 'HomePhone'
     */
    const VALUE_HOME_PHONE = 'HomePhone';
    /**
     * Constant for value 'HomePhone2'
     * @return string 'HomePhone2'
     */
    const VALUE_HOME_PHONE_2 = 'HomePhone2';
    /**
     * Constant for value 'Isdn'
     * @return string 'Isdn'
     */
    const VALUE_ISDN = 'Isdn';
    /**
     * Constant for value 'MobilePhone'
     * @return string 'MobilePhone'
     */
    const VALUE_MOBILE_PHONE = 'MobilePhone';
    /**
     * Constant for value 'OtherFax'
     * @return string 'OtherFax'
     */
    const VALUE_OTHER_FAX = 'OtherFax';
    /**
     * Constant for value 'OtherTelephone'
     * @return string 'OtherTelephone'
     */
    const VALUE_OTHER_TELEPHONE = 'OtherTelephone';
    /**
     * Constant for value 'Pager'
     * @return string 'Pager'
     */
    const VALUE_PAGER = 'Pager';
    /**
     * Constant for value 'PrimaryPhone'
     * @return string 'PrimaryPhone'
     */
    const VALUE_PRIMARY_PHONE = 'PrimaryPhone';
    /**
     * Constant for value 'RadioPhone'
     * @return string 'RadioPhone'
     */
    const VALUE_RADIO_PHONE = 'RadioPhone';
    /**
     * Constant for value 'Telex'
     * @return string 'Telex'
     */
    const VALUE_TELEX = 'Telex';
    /**
     * Constant for value 'TtyTddPhone'
     * @return string 'TtyTddPhone'
     */
    const VALUE_TTY_TDD_PHONE = 'TtyTddPhone';
    /**
     * Constant for value 'BusinessMobile'
     * @return string 'BusinessMobile'
     */
    const VALUE_BUSINESS_MOBILE = 'BusinessMobile';
    /**
     * Constant for value 'IPPhone'
     * @return string 'IPPhone'
     */
    const VALUE_IPPHONE = 'IPPhone';
    /**
     * Constant for value 'Mms'
     * @return string 'Mms'
     */
    const VALUE_MMS = 'Mms';
    /**
     * Constant for value 'Msn'
     * @return string 'Msn'
     */
    const VALUE_MSN = 'Msn';
    /**
     * Return allowed values
     * @uses self::VALUE_ASSISTANT_PHONE
     * @uses self::VALUE_BUSINESS_FAX
     * @uses self::VALUE_BUSINESS_PHONE
     * @uses self::VALUE_BUSINESS_PHONE_2_1
     * @uses self::VALUE_CALLBACK
     * @uses self::VALUE_CAR_PHONE
     * @uses self::VALUE_COMPANY_MAIN_PHONE
     * @uses self::VALUE_HOME_FAX
     * @uses self::VALUE_HOME_PHONE
     * @uses self::VALUE_HOME_PHONE_2
     * @uses self::VALUE_ISDN
     * @uses self::VALUE_MOBILE_PHONE
     * @uses self::VALUE_OTHER_FAX
     * @uses self::VALUE_OTHER_TELEPHONE
     * @uses self::VALUE_PAGER
     * @uses self::VALUE_PRIMARY_PHONE
     * @uses self::VALUE_RADIO_PHONE
     * @uses self::VALUE_TELEX
     * @uses self::VALUE_TTY_TDD_PHONE
     * @uses self::VALUE_BUSINESS_MOBILE
     * @uses self::VALUE_IPPHONE
     * @uses self::VALUE_MMS
     * @uses self::VALUE_MSN
     * @return string[]
     */
    public static function getValidValues(): array
    {
        return [
            self::VALUE_ASSISTANT_PHONE,
            self::VALUE_BUSINESS_FAX,
            self::VALUE_BUSINESS_PHONE,
            self::VALUE_BUSINESS_PHONE_2_1,
            self::VALUE_CALLBACK,
            self::VALUE_CAR_PHONE,
            self::VALUE_COMPANY_MAIN_PHONE,
            self::VALUE_HOME_FAX,
            self::VALUE_HOME_PHONE,
            self::VALUE_HOME_PHONE_2,
            self::VALUE_ISDN,
            self::VALUE_MOBILE_PHONE,
            self::VALUE_OTHER_FAX,
            self::VALUE_OTHER_TELEPHONE,
            self::VALUE_PAGER,
            self::VALUE_PRIMARY_PHONE,
            self::VALUE_RADIO_PHONE,
            self::VALUE_TELEX,
            self::VALUE_TTY_TDD_PHONE,
            self::VALUE_BUSINESS_MOBILE,
            self::VALUE_IPPHONE,
            self::VALUE_MMS,
            self::VALUE_MSN,
        ];
    }
}
