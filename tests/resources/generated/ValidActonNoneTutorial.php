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
 * Samples for Service ServiceType
 */
$service = new \Api\ServiceType\ApiService($options);
$service->setSoapHeaderClusterHeader(new \Api\StructType\ApiClusterHeader());
$service->setSoapHeaderSessionHeader(new \Api\StructType\ApiSessionHeader());
/**
 * Sample call for login operation/method
 */
if ($service->login(new \Api\StructType\ApiLogin()) !== false) {
    print_r($service->getResult());
} else {
    print_r($service->getLastError());
}
/**
 * Sample call for sendEmail operation/method
 */
if ($service->sendEmail(new \Api\StructType\ApiSendEmail()) !== false) {
    print_r($service->getResult());
} else {
    print_r($service->getLastError());
}
/**
 * Sample call for _list operation/method
 */
if ($service->_list(new \Api\StructType\ApiList()) !== false) {
    print_r($service->getResult());
} else {
    print_r($service->getLastError());
}
/**
 * Sample call for uploadList operation/method
 */
if ($service->uploadList(new \Api\StructType\ApiUploadList()) !== false) {
    print_r($service->getResult());
} else {
    print_r($service->getLastError());
}
/**
 * Sample call for getUploadResult operation/method
 */
if ($service->getUploadResult(new \Api\StructType\ApiGetUploadResultRequest()) !== false) {
    print_r($service->getResult());
} else {
    print_r($service->getLastError());
}
/**
 * Sample call for downloadList operation/method
 */
if ($service->downloadList(new \Api\StructType\ApiDownloadList()) !== false) {
    print_r($service->getResult());
} else {
    print_r($service->getLastError());
}
/**
 * Sample call for messageReport operation/method
 */
if ($service->messageReport(new \Api\StructType\ApiMessageReport()) !== false) {
    print_r($service->getResult());
} else {
    print_r($service->getLastError());
}
/**
 * Sample call for deleteList operation/method
 */
if ($service->deleteList(new \Api\StructType\ApiDeleteList()) !== false) {
    print_r($service->getResult());
} else {
    print_r($service->getLastError());
}
