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
$login->setSoapHeaderClusterHeader(new \Api\StructType\ApiClusterHeader());
/**
 * Sample call for login operation/method
 */
if ($login->login(new \Api\StructType\ApiLogin()) !== false) {
    print_r($login->getResult());
} else {
    print_r($login->getLastError());
}
/**
 * Samples for Send ServiceType
 */
$send = new \Api\ServiceType\ApiSend($options);
$send->setSoapHeaderSessionHeader(new \Api\StructType\ApiSessionHeader());
$send->setSoapHeaderClusterHeader(new \Api\StructType\ApiClusterHeader());
/**
 * Sample call for sendEmail operation/method
 */
if ($send->sendEmail(new \Api\StructType\ApiSendEmail()) !== false) {
    print_r($send->getResult());
} else {
    print_r($send->getLastError());
}
/**
 * Samples for List ServiceType
 */
$list = new \Api\ServiceType\ApiList($options);
$list->setSoapHeaderSessionHeader(new \Api\StructType\ApiSessionHeader());
$list->setSoapHeaderClusterHeader(new \Api\StructType\ApiClusterHeader());
/**
 * Sample call for _list operation/method
 */
if ($list->_list(new \Api\StructType\ApiList()) !== false) {
    print_r($list->getResult());
} else {
    print_r($list->getLastError());
}
/**
 * Samples for Upload ServiceType
 */
$upload = new \Api\ServiceType\ApiUpload($options);
$upload->setSoapHeaderSessionHeader(new \Api\StructType\ApiSessionHeader());
$upload->setSoapHeaderClusterHeader(new \Api\StructType\ApiClusterHeader());
/**
 * Sample call for uploadList operation/method
 */
if ($upload->uploadList(new \Api\StructType\ApiUploadList()) !== false) {
    print_r($upload->getResult());
} else {
    print_r($upload->getLastError());
}
/**
 * Samples for Get ServiceType
 */
$get = new \Api\ServiceType\ApiGet($options);
$get->setSoapHeaderSessionHeader(new \Api\StructType\ApiSessionHeader());
$get->setSoapHeaderClusterHeader(new \Api\StructType\ApiClusterHeader());
/**
 * Sample call for getUploadResult operation/method
 */
if ($get->getUploadResult(new \Api\StructType\ApiGetUploadResultRequest()) !== false) {
    print_r($get->getResult());
} else {
    print_r($get->getLastError());
}
/**
 * Samples for Download ServiceType
 */
$download = new \Api\ServiceType\ApiDownload($options);
$download->setSoapHeaderSessionHeader(new \Api\StructType\ApiSessionHeader());
$download->setSoapHeaderClusterHeader(new \Api\StructType\ApiClusterHeader());
/**
 * Sample call for downloadList operation/method
 */
if ($download->downloadList(new \Api\StructType\ApiDownloadList()) !== false) {
    print_r($download->getResult());
} else {
    print_r($download->getLastError());
}
/**
 * Samples for Message ServiceType
 */
$message = new \Api\ServiceType\ApiMessage($options);
$message->setSoapHeaderSessionHeader(new \Api\StructType\ApiSessionHeader());
$message->setSoapHeaderClusterHeader(new \Api\StructType\ApiClusterHeader());
/**
 * Sample call for messageReport operation/method
 */
if ($message->messageReport(new \Api\StructType\ApiMessageReport()) !== false) {
    print_r($message->getResult());
} else {
    print_r($message->getLastError());
}
/**
 * Samples for Delete ServiceType
 */
$delete = new \Api\ServiceType\ApiDelete($options);
$delete->setSoapHeaderSessionHeader(new \Api\StructType\ApiSessionHeader());
$delete->setSoapHeaderClusterHeader(new \Api\StructType\ApiClusterHeader());
/**
 * Sample call for deleteList operation/method
 */
if ($delete->deleteList(new \Api\StructType\ApiDeleteList()) !== false) {
    print_r($delete->getResult());
} else {
    print_r($delete->getLastError());
}
