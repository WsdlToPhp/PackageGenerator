<?php
/**
 * This file aims to show you how to use this generated package.
 * In addition, the goal is to show which methods are available and the fist needed parameter(s)
 * You have to use an associative array such as:
 * - the key must be a constant beginning with WSDL_ from AbstractSoapClientbase class each generated ServiceType class extends this class
 * - the value must be the corresponding key value (each option matches a {@link http://www.php.net/manual/en/soapclient.soapclient.php} option)
 * $options = array(
 * AbstractSoapClientBase::WSDL_URL => '__WSDL_URL__',
 * AbstractSoapClientBase::WSDL_TRACE => true,
 * AbstractSoapClientBase::WSDL_LOGIN => 'you_secret_login',
 * AbstractSoapClientBase::WSDL_PASSWORD => 'you_secret_password',
 * );
 * etc....
 * Then instantiate the ServiceType class such as:
 * - $wsdlObject = new PackageNameWsdlClass($wsdl)
 */
require_once __DIR__ . '/vendor/autoload.php';
/**
 * Minimal options
 */
$options = array(
    AbstractSoapClientBase::WSDL_URL => '__WSDL_URL__',
);
/**
 * Samples for Search ServiceType
 */
$search = new \Api\ServiceType\ApiSearch($options);
/**
 * Sample call for Search operation/method
 */
if ($search->Search(new \Api\StructType\ApiSearchRequest()) !== false) {
    print_r($search->getResult());
} else {
    print_r($search->getLastError());
}
