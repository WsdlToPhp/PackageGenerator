<?php
/**
 * This file aims to show you how to use this generated package.
 * In addition, the goal is to show which methods are available and the first needed parameter(s)
 * You have to use an associative array such as:
 * - the key must be a constant beginning with WSDL_ from AbstractSoapClientBase class (each generated ServiceType class extends this class)
 * - the value must be the corresponding key value (each option matches a {@link http://www.php.net/manual/en/soapclient.soapclient.php} option)
 * $options = array(
 * \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_URL => '__WSDL_URL__',
 * \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_TRACE => true,
 * \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_LOGIN => 'you_secret_login',
 * \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_PASSWORD => 'you_secret_password',
 * );
 * etc...
 */
require_once __DIR__ . '/vendor/autoload.php';
/**
 * Minimal options
 */
$options = array(
    \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_URL => '__WSDL_URL__',
    \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_CLASSMAP => \Api\ApiClassMap::get(),
);
/**
 * Samples for Login ServiceType
 */
$login = new \Api\ServiceType\ApiLogin($options);
/**
 * Sample call for Login operation/method
 */
if ($login->Login($login, $password) !== false) {
    print_r($login->getResult());
} else {
    print_r($login->getLastError());
}
/**
 * Samples for Logout ServiceType
 */
$logout = new \Api\ServiceType\ApiLogout($options);
/**
 * Sample call for Logout operation/method
 */
if ($logout->Logout() !== false) {
    print_r($logout->getResult());
} else {
    print_r($logout->getLastError());
}
/**
 * Samples for Get ServiceType
 */
$get = new \Api\ServiceType\ApiGet($options);
/**
 * Sample call for GetRequestList operation/method
 */
if ($get->GetRequestList() !== false) {
    print_r($get->getResult());
} else {
    print_r($get->getLastError());
}
/**
 * Sample call for GetHouseInfo operation/method
 */
if ($get->GetHouseInfo(new \Api\StructType\ApiFiasAddress()) !== false) {
    print_r($get->getResult());
} else {
    print_r($get->getLastError());
}
/**
 * Sample call for GetHouseProfile operation/method
 */
if ($get->GetHouseProfile($house_id, $reporting_period_id) !== false) {
    print_r($get->getResult());
} else {
    print_r($get->getLastError());
}
/**
 * Sample call for GetHouseProfile988 operation/method
 */
if ($get->GetHouseProfile988($house_id, $reporting_period_id) !== false) {
    print_r($get->getResult());
} else {
    print_r($get->getLastError());
}
/**
 * Sample call for GetHouseProfileSF operation/method
 */
if ($get->GetHouseProfileSF($region_id, $page_number, $reporting_period_id) !== false) {
    print_r($get->getResult());
} else {
    print_r($get->getLastError());
}
/**
 * Sample call for GetHouseProfileSF988 operation/method
 */
if ($get->GetHouseProfileSF988($region_id, $page_number, $reporting_period_id) !== false) {
    print_r($get->getResult());
} else {
    print_r($get->getLastError());
}
/**
 * Sample call for GetHouseList operation/method
 */
if ($get->GetHouseList($inn) !== false) {
    print_r($get->getResult());
} else {
    print_r($get->getLastError());
}
/**
 * Sample call for GetCompanyProfile operation/method
 */
if ($get->GetCompanyProfile($inn, $reporting_period_id) !== false) {
    print_r($get->getResult());
} else {
    print_r($get->getLastError());
}
/**
 * Sample call for GetCompanyProfile988 operation/method
 */
if ($get->GetCompanyProfile988($inn, $reporting_period_id) !== false) {
    print_r($get->getResult());
} else {
    print_r($get->getLastError());
}
/**
 * Sample call for GetCompanyProfileSF operation/method
 */
if ($get->GetCompanyProfileSF($region_id, $page_number, $reporting_period_id) !== false) {
    print_r($get->getResult());
} else {
    print_r($get->getLastError());
}
/**
 * Sample call for GetCompanyProfileSF988 operation/method
 */
if ($get->GetCompanyProfileSF988($region_id, $page_number, $reporting_period_id) !== false) {
    print_r($get->getResult());
} else {
    print_r($get->getLastError());
}
/**
 * Sample call for GetReportingPeriodList operation/method
 */
if ($get->GetReportingPeriodList() !== false) {
    print_r($get->getResult());
} else {
    print_r($get->getLastError());
}
/**
 * Sample call for GetFileByID operation/method
 */
if ($get->GetFileByID($file_id) !== false) {
    print_r($get->getResult());
} else {
    print_r($get->getLastError());
}
/**
 * Samples for Set ServiceType
 */
$set = new \Api\ServiceType\ApiSet($options);
/**
 * Sample call for SetRequestForSubmit operation/method
 */
if ($set->SetRequestForSubmit($inns) !== false) {
    print_r($set->getResult());
} else {
    print_r($set->getLastError());
}
/**
 * Sample call for SetHouseProfile operation/method
 */
if ($set->SetHouseProfile($house_id, $reporting_period_id, new \Api\StructType\ApiHouseProfileData()) !== false) {
    print_r($set->getResult());
} else {
    print_r($set->getLastError());
}
/**
 * Sample call for SetHouseProfile988 operation/method
 */
if ($set->SetHouseProfile988($house_id, $reporting_period_id, new \Api\StructType\ApiHouseProfileData988()) !== false) {
    print_r($set->getResult());
} else {
    print_r($set->getLastError());
}
/**
 * Sample call for SetHouseLinkToOrganization operation/method
 */
if ($set->SetHouseLinkToOrganization($house_id, $inn, $date_start, $management_reason) !== false) {
    print_r($set->getResult());
} else {
    print_r($set->getLastError());
}
/**
 * Sample call for SetNewHouse operation/method
 */
if ($set->SetNewHouse(new \Api\StructType\ApiFiasAddress()) !== false) {
    print_r($set->getResult());
} else {
    print_r($set->getLastError());
}
/**
 * Sample call for SetUnlinkFromOrganization operation/method
 */
if ($set->SetUnlinkFromOrganization($house_id, $date_stop, $stop_reason_type, $stop_reason) !== false) {
    print_r($set->getResult());
} else {
    print_r($set->getLastError());
}
/**
 * Sample call for SetNewCompany operation/method
 */
if ($set->SetNewCompany($inn, new \Api\StructType\ApiNewCompanyProfileData()) !== false) {
    print_r($set->getResult());
} else {
    print_r($set->getLastError());
}
/**
 * Sample call for SetCompanyProfile operation/method
 */
if ($set->SetCompanyProfile($inn, $reporting_period_id, new \Api\StructType\ApiCompanyProfileData()) !== false) {
    print_r($set->getResult());
} else {
    print_r($set->getLastError());
}
/**
 * Sample call for SetCompanyProfile988 operation/method
 */
if ($set->SetCompanyProfile988($inn, $reporting_period_id, new \Api\StructType\ApiCompanyProfileData988()) !== false) {
    print_r($set->getResult());
} else {
    print_r($set->getLastError());
}
/**
 * Sample call for SetUploadFile operation/method
 */
if ($set->SetUploadFile(new \Api\StructType\ApiFileObject()) !== false) {
    print_r($set->getResult());
} else {
    print_r($set->getLastError());
}
