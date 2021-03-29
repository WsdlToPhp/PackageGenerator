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
    \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_CLASSMAP => ApiClassMap::get(),
);
/**
 * Samples for Login ServiceType
 */
$login = new \ServiceType\ApiLogin($options);
$login->setSoapHeaderClusterHeader(new \StructType\ApiClusterHeader());
/**
 * Sample call for login operation/method
 */
if ($login->login(new \StructType\ApiLogin()) !== false) {
    print_r($login->getResult());
} else {
    print_r($login->getLastError());
}
/**
 * Samples for Send ServiceType
 */
$send = new \ServiceType\ApiSend($options);
$send->setSoapHeaderSessionHeader(new \StructType\ApiSessionHeader());
$send->setSoapHeaderClusterHeader(new \StructType\ApiClusterHeader());
/**
 * Sample call for sendEmail operation/method
 */
if ($send->sendEmail(new \StructType\ApiSendEmail()) !== false) {
    print_r($send->getResult());
} else {
    print_r($send->getLastError());
}
/**
 * Samples for List ServiceType
 */
$list = new \ServiceType\ApiList($options);
$list->setSoapHeaderSessionHeader(new \StructType\ApiSessionHeader());
$list->setSoapHeaderClusterHeader(new \StructType\ApiClusterHeader());
/**
 * Sample call for _list operation/method
 */
if ($list->_list(new \StructType\ApiList()) !== false) {
    print_r($list->getResult());
} else {
    print_r($list->getLastError());
}
/**
 * Samples for Upload ServiceType
 */
$upload = new \ServiceType\ApiUpload($options);
$upload->setSoapHeaderSessionHeader(new \StructType\ApiSessionHeader());
$upload->setSoapHeaderClusterHeader(new \StructType\ApiClusterHeader());
/**
 * Sample call for uploadList operation/method
 */
if ($upload->uploadList(new \StructType\ApiUploadList()) !== false) {
    print_r($upload->getResult());
} else {
    print_r($upload->getLastError());
}
/**
 * Samples for Get ServiceType
 */
$get = new \ServiceType\ApiGet($options);
$get->setSoapHeaderSessionHeader(new \StructType\ApiSessionHeader());
$get->setSoapHeaderClusterHeader(new \StructType\ApiClusterHeader());
/**
 * Sample call for getUploadResult operation/method
 */
if ($get->getUploadResult(new \StructType\ApiGetUploadResultRequest()) !== false) {
    print_r($get->getResult());
} else {
    print_r($get->getLastError());
}
/**
 * Samples for Download ServiceType
 */
$download = new \ServiceType\ApiDownload($options);
$download->setSoapHeaderSessionHeader(new \StructType\ApiSessionHeader());
$download->setSoapHeaderClusterHeader(new \StructType\ApiClusterHeader());
/**
 * Sample call for downloadList operation/method
 */
if ($download->downloadList(new \StructType\ApiDownloadList()) !== false) {
    print_r($download->getResult());
} else {
    print_r($download->getLastError());
}
/**
 * Samples for Message ServiceType
 */
$message = new \ServiceType\ApiMessage($options);
$message->setSoapHeaderSessionHeader(new \StructType\ApiSessionHeader());
$message->setSoapHeaderClusterHeader(new \StructType\ApiClusterHeader());
/**
 * Sample call for messageReport operation/method
 */
if ($message->messageReport(new \StructType\ApiMessageReport()) !== false) {
    print_r($message->getResult());
} else {
    print_r($message->getLastError());
}
/**
 * Samples for Delete ServiceType
 */
$delete = new \ServiceType\ApiDelete($options);
$delete->setSoapHeaderSessionHeader(new \StructType\ApiSessionHeader());
$delete->setSoapHeaderClusterHeader(new \StructType\ApiClusterHeader());
/**
 * Sample call for deleteList operation/method
 */
if ($delete->deleteList(new \StructType\ApiDeleteList()) !== false) {
    print_r($delete->getResult());
} else {
    print_r($delete->getLastError());
}
