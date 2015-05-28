<?php
/**
 * File for PackageNameWsdlClass to communicate with SOAP service
 * @package PackageName
 */
/**
 * PackageNameWsdlClass to communicate with SOAP service
 * meta_informations
 * @package PackageName
 */
class PackageNameWsdlClass implements \ArrayAccess, \Iterator, \Countable
{
    /**
     * Option key to define WSDL url
     * @var string
     */
    const WSDL_URL = 'wsdl_url';
    /**
     * Constant to define the default WSDL URI
     * @var string
     */
    const VALUE_WSDL_URL = 'wsdl_url_value';
    /**
     * Option key to define WSDL login
     * @var string
     */
    const WSDL_LOGIN = 'wsdl_login';
    /**
     * Option key to define WSDL password
     * @var string
     */
    const WSDL_PASSWORD = 'wsdl_password';
    /**
     * Option key to define WSDL trace option
     * @var string
     */
    const WSDL_TRACE = 'wsdl_trace';
    /**
     * Option key to define WSDL exceptions
     * @var string
     */
    const WSDL_EXCEPTIONS = 'wsdl_exceptions';
    /**
     * Option key to define WSDL cache_wsdl
     * @var string
     */
    const WSDL_CACHE_WSDL = 'wsdl_cache_wsdl';
    /**
     * Option key to define WSDL stream_context
     * @var string
     */
    const WSDL_STREAM_CONTEXT = 'wsdl_stream_context';
    /**
     * Option key to define WSDL soap_version
     * @var string
     */
    const WSDL_SOAP_VERSION = 'wsdl_soap_version';
    /**
     * Option key to define WSDL compression
     * @var string
     */
    const WSDL_COMPRESSION = 'wsdl_compression';
    /**
     * Option key to define WSDL encoding
     * @var string
     */
    const WSDL_ENCODING = 'wsdl_encoding';
    /**
     * Option key to define WSDL connection_timeout
     * @var string
     */
    const WSDL_CONNECTION_TIMEOUT = 'wsdl_connection_timeout';
    /**
     * Option key to define WSDL typemap
     * @var string
     */
    const WSDL_TYPEMAP = 'wsdl_typemap';
    /**
     * Option key to define WSDL user_agent
     * @var string
     */
    const WSDL_USER_AGENT = 'wsdl_user_agent';
    /**
     * Option key to define WSDL features
     * @var string
     */
    const WSDL_FEATURES = 'wsdl_features';
    /**
     * Option key to define WSDL keep_alive
     * @var string
     */
    const WSDL_KEEP_ALIVE = 'wsdl_keep_alive';
    /**
     * Option key to define WSDL proxy_host
     * @var string
     */
    const WSDL_PROXY_HOST = 'wsdl_proxy_host';
    /**
     * Option key to define WSDL proxy_port
     * @var string
     */
    const WSDL_PROXY_PORT = 'wsdl_proxy_port';
    /**
     * Option key to define WSDL proxy_login
     * @var string
     */
    const WSDL_PROXY_LOGIN = 'wsdl_proxy_login';
    /**
     * Option key to define WSDL proxy_password
     * @var string
     */
    const WSDL_PROXY_PASSWORD = 'wsdl_proxy_password';
    /**
     * Option key to define WSDL local_cert
     * @var string
     */
    const WSDL_LOCAL_CERT = 'wsdl_local_cert';
    /**
     * Option key to define WSDL passphrase
     * @var string
     */
    const WSDL_PASSPHRASE = 'wsdl_passphrase';
    /**
     * Option key to define WSDL authentication
     * @var string
     */
    const WSDL_AUTHENTICATION = 'wsdl_authentication';
    /**
     * Option key to define WSDL ssl_method
     * @var string
     */
    const WSDL_SSL_METHOD = 'wsdl_ssl_method';
    /**
     * Soapclient called to communicate with the actual SOAP Service
     * @var SoapClient
     */
    private static $soapClient;
    /**
     * Contains Soap call result
     * @var mixed
     */
    private $result;
    /**
     * Contains last errors
     * @var array
     */
    private $lastError;
    /**
     * Array that contains values when only one parameter is set when calling __construct method
     * @var array
     */
    private $internArrayToIterate;
    /**
     * Bool that tells if array is set or not
     * @var bool
     */
    private $internArrayToIterateIsArray;
    /**
     * Items index browser
     * @var int
     */
    private $internArrayToIterateOffset;
    /**
     * Constructor
     * @uses PackageNameWsdlClass::setLastError()
     * @uses PackageNameWsdlClass::initSoapClient()
     * @uses PackageNameWsdlClass::initInternArrayToIterate()
     * @uses PackageNameWsdlClass::_set()
     * @param array $arrayOfValues SoapClient options or object attribute values
     * @param bool $resetSoapClient allows to disable the SoapClient redefinition
     */
    public function __construct($arrayOfValues = array(), $resetSoapClient = true)
    {
        $this->setLastError(array());
        /**
         * Init soap Client
         * Set default values
         */
        if ($resetSoapClient) {
            $this->initSoapClient($arrayOfValues);
        }
        /**
         * Init array of values if set
         */
        $this->initInternArrayToIterate($arrayOfValues);
        /**
         * Generic set methods
         */
        if (is_array($arrayOfValues) && count($arrayOfValues)) {
            foreach ($arrayOfValues as $name=>$value) {
                $this->_set($name, $value);
            }
        }
    }
    /**
     * Generic method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @uses PackageNameWsdlClass::_set()
     * @param array $array the exported values
     * @param string $className optional (used by inherited classes in order to always call this method)
     * @return PackageNameWsdlClass|null
     */
    public static function __set_state(array $array, $className = __CLASS__)
    {
        if (class_exists($className)) {
            $object = @new $className();
            if (is_object($object) && is_subclass_of($object, 'PackageNameWsdlClass')) {
                foreach ($array as $name=>$value) {
                    $object->_set($name, $value);
                }
            }
            return $object;
        }
        return null;
    }
    /**
     * Static method getting current SoapClient
     * @return SoapClient
     */
    public static function getSoapClient()
    {
        return self::$soapClient;
    }
    /**
     * Static method setting current SoapClient
     * @param SoapClient $soapClient
     * @return SoapClient
     */
    protected static function setSoapClient(SoapClient $soapClient)
    {
        return (self::$soapClient = $soapClient);
    }
    /**
     * Method initiating SoapClient
     * @uses PackageNameClassMap::classMap()
     * @uses PackageNameWsdlClass::getDefaultWsdlOptions()
     * @uses PackageNameWsdlClass::getSoapClientClassName()
     * @uses PackageNameWsdlClass::setSoapClient()
     * @param array $options WSDL options
     * @return void
     */
    public function initSoapClient(array $options)
    {
        if (class_exists('PackageNameClassMap', true)) {
            $wsdlOptions = array();
            $wsdlOptions['classmap'] = PackageNameClassMap::classMap();
            $defaultWsdlOptions = self::getDefaultWsdlOptions();
            foreach ($defaultWsdlOptions as $optioName=>$optionValue) {
                if (array_key_exists($optioName, $options) && !empty($options[$optioName])) {
                    $wsdlOptions[str_replace('wsdl_', '', $optioName)] = $options[$optioName];
                } elseif (!empty($optionValue)) {
                    $wsdlOptions[str_replace('wsdl_', '', $optioName)] = $optionValue;
                }
            }
            if (array_key_exists(str_replace('wsdl_', '', self::WSDL_URL), $wsdlOptions)) {
                $wsdlUrl = $wsdlOptions[str_replace('wsdl_', '', self::WSDL_URL)];
                unset($wsdlOptions[str_replace('wsdl_', '', self::WSDL_URL)]);
                $soapClientClassName = self::getSoapClientClassName();
                self::setSoapClient(new $soapClientClassName($wsdlUrl, $wsdlOptions));
            }
        }
    }
    /**
     * Returns the SoapClient class name to use to create the instance of the SoapClient.
     * The SoapClient class is determined based on the package name.
     * If a class is named as {PackageName}SoapClient, then this is the class that will be used.
     * Be sure that this class inherits from the native PHP SoapClient class and this class has been loaded or can be loaded.
     * The goal is to allow the override of the SoapClient without having to modify this generated class.
     * Then the overridding SoapClient class can override for example the SoapClient::__doRequest() method if it is needed.
     * @return string
     */
    public static function getSoapClientClassName()
    {
        if (class_exists('PackageNameSoapClient') && is_subclass_of('PackageNameSoapClient', 'SoapClient')) {
            return 'PackageNameSoapClient';
        } else {
            return 'SoapClient';
        }
    }
    /**
     * Method returning all default options values
     * @uses PackageNameWsdlClass::WSDL_CACHE_WSDL
     * @uses PackageNameWsdlClass::WSDL_COMPRESSION
     * @uses PackageNameWsdlClass::WSDL_CONNECTION_TIMEOUT
     * @uses PackageNameWsdlClass::WSDL_ENCODING
     * @uses PackageNameWsdlClass::WSDL_EXCEPTIONS
     * @uses PackageNameWsdlClass::WSDL_FEATURES
     * @uses PackageNameWsdlClass::WSDL_LOGIN
     * @uses PackageNameWsdlClass::WSDL_PASSWORD
     * @uses PackageNameWsdlClass::WSDL_SOAP_VERSION
     * @uses PackageNameWsdlClass::WSDL_STREAM_CONTEXT
     * @uses PackageNameWsdlClass::WSDL_TRACE
     * @uses PackageNameWsdlClass::WSDL_TYPEMAP
     * @uses PackageNameWsdlClass::WSDL_URL
     * @uses PackageNameWsdlClass::VALUE_WSDL_URL
     * @uses PackageNameWsdlClass::WSDL_USER_AGENT
     * @uses PackageNameWsdlClass::WSDL_PROXY_HOST
     * @uses PackageNameWsdlClass::WSDL_PROXY_PORT
     * @uses PackageNameWsdlClass::WSDL_PROXY_LOGIN
     * @uses PackageNameWsdlClass::WSDL_PROXY_PASSWORD
     * @uses PackageNameWsdlClass::WSDL_LOCAL_CERT
     * @uses PackageNameWsdlClass::WSDL_PASSPHRASE
     * @uses PackageNameWsdlClass::WSDL_AUTHENTICATION
     * @uses PackageNameWsdlClass::WSDL_SSL_METHOD
     * @uses SOAP_SINGLE_ELEMENT_ARRAYS
     * @uses SOAP_USE_XSI_ARRAY_TYPE
     * @return array
     */
    public static function getDefaultWsdlOptions()
    {
        return array(
                    self::WSDL_CACHE_WSDL=>WSDL_CACHE_NONE,
                    self::WSDL_COMPRESSION=>null,
                    self::WSDL_CONNECTION_TIMEOUT=>null,
                    self::WSDL_ENCODING=>null,
                    self::WSDL_EXCEPTIONS=>true,
                    self::WSDL_FEATURES=>SOAP_SINGLE_ELEMENT_ARRAYS | SOAP_USE_XSI_ARRAY_TYPE,
                    self::WSDL_LOGIN=>null,
                    self::WSDL_PASSWORD=>null,
                    self::WSDL_SOAP_VERSION=>null,
                    self::WSDL_STREAM_CONTEXT=>null,
                    self::WSDL_TRACE=>true,
                    self::WSDL_TYPEMAP=>null,
                    self::WSDL_URL=>self::VALUE_WSDL_URL,
                    self::WSDL_USER_AGENT=>null,
                    self::WSDL_PROXY_HOST=>null,
                    self::WSDL_PROXY_PORT=>null,
                    self::WSDL_PROXY_LOGIN=>null,
                    self::WSDL_PROXY_PASSWORD=>null,
                    self::WSDL_LOCAL_CERT=>null,
                    self::WSDL_PASSPHRASE=>null,
                    self::WSDL_AUTHENTICATION=>null,
                    self::WSDL_SSL_METHOD=>null);
    }
    /**
     * Allows to set the SoapClient location to call
     * @uses PackageNameWsdlClass::getSoapClient()
     * @uses SoapClient::__setLocation()
     * @param string $location
     */
    public function setLocation($location)
    {
        return self::getSoapClient() ? self::getSoapClient()->__setLocation($location) : false;
    }
    /**
     * Returns the last request content as a DOMDocument or as a formated XML String
     * @see SoapClient::__getLastRequest()
     * @uses PackageNameWsdlClass::getSoapClient()
     * @uses PackageNameWsdlClass::getFormatedXml()
     * @uses SoapClient::__getLastRequest()
     * @param bool $asDomDocument
     * @return DOMDocument|string
     */
    public function getLastRequest($asDomDocument = false)
    {
        if (self::getSoapClient()) {
            return self::getFormatedXml(self::getSoapClient()->__getLastRequest(), $asDomDocument);
        }
        return null;
    }
    /**
     * Returns the last response content as a DOMDocument or as a formated XML String
     * @see SoapClient::__getLastResponse()
     * @uses PackageNameWsdlClass::getSoapClient()
     * @uses PackageNameWsdlClass::getFormatedXml()
     * @uses SoapClient::__getLastResponse()
     * @param bool $asDomDocument
     * @return DOMDocument|string
     */
    public function getLastResponse($asDomDocument = false)
    {
        if (self::getSoapClient()) {
            return self::getFormatedXml(self::getSoapClient()->__getLastResponse(), $asDomDocument);
        }
        return null;
    }
    /**
     * Returns the last request headers used by the SoapClient object as the original value or an array
     * @see SoapClient::__getLastRequestHeaders()
     * @uses PackageNameWsdlClass::getSoapClient()
     * @uses PackageNameWsdlClass::convertStringHeadersToArray()
     * @uses SoapClient::__getLastRequestHeaders()
     * @param bool $asArray allows to get the headers in an associative array
     * @return null|string|array
     */
    public function getLastRequestHeaders($asArray = false)
    {
        $headers = self::getSoapClient() ? self::getSoapClient()->__getLastRequestHeaders() : null;
        if (is_string($headers) && $asArray) {
            return self::convertStringHeadersToArray($headers);
        }
        return $headers;
    }
    /**
     * Returns the last response headers used by the SoapClient object as the original value or an array
     * @see SoapClient::__getLastResponseHeaders()
     * @uses PackageNameWsdlClass::getSoapClient()
     * @uses PackageNameWsdlClass::convertStringHeadersToArray()
     * @uses SoapClient::__getLastRequestHeaders()
     * @param bool $asArray allows to get the headers in an associative array
     * @return null|string|array
     */
    public function getLastResponseHeaders($asArray = false)
    {
        $headers = self::getSoapClient() ? self::getSoapClient()->__getLastResponseHeaders() : null;
        if (is_string($headers) && $asArray) {
            return self::convertStringHeadersToArray($headers);
        }
        return $headers;
    }
    /**
     * Returns a XML string content as a DOMDocument or as a formated XML string
     * @uses DOMDocument::loadXML()
     * @uses DOMDocument::saveXML()
     * @param string $string
     * @param bool $asDomDocument
     * @return DOMDocument|string|null
     */
    public static function getFormatedXml($string, $asDomDocument = false)
    {
        if (!empty($string) && class_exists('DOMDocument')) {
            $dom = new \DOMDocument('1.0', 'UTF-8');
            $dom->formatOutput = true;
            $dom->preserveWhiteSpace = false;
            $dom->resolveExternals = false;
            $dom->substituteEntities = false;
            $dom->validateOnParse = false;
            if ($dom->loadXML($string)) {
                return $asDomDocument ? $dom : $dom->saveXML();
            }
        }
        return $asDomDocument ? null : $string;
    }
    /**
     * Returns an associative array between the headers name and their respective values
     * @param string $headers
     * @return array
     */
    public static function convertStringHeadersToArray($headers)
    {
        $lines = explode("\r\n", $headers);
        $headers = array();
        foreach ($lines as $line) {
            if (strpos($line, ':')) {
                $headerParts = explode(':', $line);
                $headers[$headerParts[0]] = trim(implode(':', array_slice($headerParts, 1)));
            }
        }
        return $headers;
    }
    /**
     * Sets a SoapHeader to send
     * For more information, please read the online documentation on {@link http://www.php.net/manual/en/class.soapheader.php}
     * @uses PackageNameWsdlClass::getSoapClient()
     * @uses SoapClient::__setSoapheaders()
     * @param string $nameSpace SoapHeader namespace
     * @param string $name SoapHeader name
     * @param mixed $data SoapHeader data
     * @param bool $mustUnderstand
     * @param string $actor
     * @return bool true|false
     */
    public function setSoapHeader($nameSpace, $name, $data, $mustUnderstand = false, $actor = null)
    {
        if (self::getSoapClient()) {
            $defaultHeaders = (isset(self::getSoapClient()->__default_headers) && is_array(self::getSoapClient()->__default_headers)) ? self::getSoapClient()->__default_headers : array();
            foreach ($defaultHeaders as $index=>$soapheader) {
                if ($soapheader->name === $name) {
                    unset($defaultHeaders[$index]);
                    break;
                }
            }
            self::getSoapClient()->__setSoapheaders(null);
            if (!empty($actor)) {
                array_push($defaultHeaders, new SoapHeader($nameSpace, $name, $data, $mustUnderstand, $actor));
            } else {
                array_push($defaultHeaders, new SoapHeader($nameSpace, $name, $data, $mustUnderstand));
            }
            return self::getSoapClient()->__setSoapheaders($defaultHeaders);
        }
        return false;
    }
    /**
     * Sets the SoapClient Stream context HTTP Header name according to its value
     * If a context already exists, it tries to modify it
     * It the context does not exist, it then creates it with the header name and its value
     * @uses PackageNameWsdlClass::getSoapClient()
     * @param string $headerName
     * @param mixed $headerValue
     * @return bool true|false
     */
    public function setHttpHeader($headerName, $headerValue)
    {
        if (self::getSoapClient() && !empty($headerName))
        {
            $streamContext = (isset(self::getSoapClient()->_stream_context) && is_resource(self::getSoapClient()->_stream_context)) ? self::getSoapClient()->_stream_context : null;
            if (!is_resource($streamContext)) {
                $options = array();
                $options['http'] = array();
                $options['http']['header'] = '';
            } else {
                $options = stream_context_get_options($streamContext);
                if (is_array($options)) {
                    if (!array_key_exists('http', $options) || !is_array($options['http'])) {
                        $options['http'] = array();
                        $options['http']['header'] = '';
                    } elseif (!array_key_exists('header', $options['http'])) {
                        $options['http']['header'] = '';
                    }
                } else {
                    $options = array();
                    $options['http'] = array();
                    $options['http']['header'] = '';
                }
            }
            if (count($options) && array_key_exists('http', $options) && is_array($options['http']) && array_key_exists('header', $options['http']) && is_string($options['http']['header'])) {
                $lines = explode("\r\n", $options['http']['header']);
                /**
                 * Ensure there is only one header entry for this header name
                 */
                $newLines = array();
                foreach ($lines as $line) {
                    if (!empty($line) && strpos($line, $headerName) === false) {
                        array_push($newLines, $line);
                    }
                }
                /**
                 * Add new header entry
                 */
                array_push($newLines, "$headerName:  $headerValue");
                /**
                 * Set the context http header option
                 */
                $options['http']['header'] = implode("\r\n", $newLines);
                /**
                 * Create context if it does not exist
                 */
                if (!is_resource($streamContext)) {
                    return (self::getSoapClient()->_stream_context = stream_context_create($options)) ? true : false;
                } else {
                    /**
                     * Set the new context http header option
                     */
                    return stream_context_set_option(self::getSoapClient()->_stream_context, 'http', 'header', $options['http']['header']);
                }
            }
            return false;
        }
        return false;
    }
    /**
     * Method alias to count
     * @uses PackageNameWsdlClass::count()
     * @return int
     */
    public function length()
    {
        return $this->count();
    }
    /**
     * Method returning item length, alias to length
     * @uses PackageNameWsdlClass::getInternArrayToIterate()
     * @uses PackageNameWsdlClass::getInternArrayToIterateIsArray()
     * @return int
     */
    public function count()
    {
        return $this->getInternArrayToIterateIsArray() ? count($this->getInternArrayToIterate()) : -1;
    }
    /**
     * Method returning the current element
     * @uses PackageNameWsdlClass::offsetGet()
     * @return mixed
     */
    public function current()
    {
        return $this->offsetGet($this->internArrayToIterateOffset);
    }
    /**
     * Method moving the current position to the next element
     * @uses PackageNameWsdlClass::getInternArrayToIterateOffset()
     * @uses PackageNameWsdlClass::setInternArrayToIterateOffset()
     * @return int
     */
    public function next()
    {
        return $this->setInternArrayToIterateOffset($this->getInternArrayToIterateOffset() + 1);
    }
    /**
     * Method resetting itemOffset
     * @uses PackageNameWsdlClass::setInternArrayToIterateOffset()
     * @return int
     */
    public function rewind()
    {
        return $this->setInternArrayToIterateOffset(0);
    }
    /**
     * Method checking if current itemOffset points to an existing item
     * @uses PackageNameWsdlClass::getInternArrayToIterateOffset()
     * @uses PackageNameWsdlClass::offsetExists()
     * @return bool true|false
     */
    public function valid()
    {
        return $this->offsetExists($this->getInternArrayToIterateOffset());
    }
    /**
     * Method returning current itemOffset value, alias to getInternArrayToIterateOffset
     * @uses PackageNameWsdlClass::getInternArrayToIterateOffset()
     * @return int
     */
    public function key()
    {
        return $this->getInternArrayToIterateOffset();
    }
    /**
     * Method alias to offsetGet
     * @see PackageNameWsdlClass::offsetGet()
     * @uses PackageNameWsdlClass::offsetGet()
     * @param int $index
     * @return mixed
     */
    public function item($index)
    {
        return $this->offsetGet($index);
    }
    /**
     * Default method adding item to array
     * @uses PackageNameWsdlClass::getAttributeName()
     * @uses PackageNameWsdlClass::__toString()
     * @uses PackageNameWsdlClass::_set()
     * @uses PackageNameWsdlClass::_get()
     * @uses PackageNameWsdlClass::setInternArrayToIterate()
     * @uses PackageNameWsdlClass::setInternArrayToIterateIsArray()
     * @uses PackageNameWsdlClass::setInternArrayToIterateOffset()
     * @param mixed $item value
     * @return bool true|false
     */
    public function add($item)
    {
        if ($this->getAttributeName() !== '' && stripos($this->__toString(), 'array') !== false) {
            /**
             * init array
             */
            if (!is_array($this->_get($this->getAttributeName()))) {
                $this->_set($this->getAttributeName(), array());
            }
            /**
             * current array
             */
            $currentArray = $this->_get($this->getAttributeName());
            array_push($currentArray, $item);
            $this->_set($this->getAttributeName(), $currentArray);
            $this->setInternArrayToIterate($currentArray);
            $this->setInternArrayToIterateIsArray(true);
            $this->setInternArrayToIterateOffset(0);
            return true;
        }
        return false;
    }
    /**
     * Method to call when sending data to request for *array* type class
     * @uses PackageNameWsdlClass::getAttributeName()
     * @uses PackageNameWsdlClass::__toString()
     * @uses PackageNameWsdlClass::_get()
     * @return mixed
     */
    public function toSend()
    {
        if ($this->getAttributeName() !== '' && stripos($this->__toString(), 'array') !== false) {
            return $this->_get($this->getAttributeName());
        } else {
            return null;
        }
    }
    /**
     * Method returning the first item
     * @uses PackageNameWsdlClass::item()
     * @return mixed
     */
    public function first()
    {
        return $this->item(0);
    }
    /**
     * Method returning the last item
     * @uses PackageNameWsdlClass::item()
     * @uses PackageNameWsdlClass::length()
     * @return mixed
     */
    public function last()
    {
        return $this->item($this->length() - 1);
    }
    /**
     * Method testing index in item
     * @uses PackageNameWsdlClass::getInternArrayToIterateIsArray()
     * @uses PackageNameWsdlClass::getInternArrayToIterate()
     * @param int $offset
     * @return bool true|false
     */
    public function offsetExists($offset)
    {
        return ($this->getInternArrayToIterateIsArray() && array_key_exists($offset, $this->getInternArrayToIterate()));
    }
    /**
     * Method returning the item at "index" value
     * @uses PackageNameWsdlClass::offsetExists()
     * @param int $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->offsetExists($offset) ? $this->internArrayToIterate[$offset] : null;
    }
    /**
     * Method useless but necessarly overridden, can't set
     * @param mixed $offset
     * @param mixed $value
     * @return null
     */
    public function offsetSet($offset, $value)
    {
        return null;
    }
    /**
     * Method useless but necessarly overridden, can't unset
     * @param mixed $offset
     * @return null
     */
    public function offsetUnset($offset)
    {
        return null;
    }
    /**
     * Method returning current result from Soap call
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }
    /**
     * Method setting current result from Soap call
     * @param mixed $result
     * @return mixed
     */
    protected function setResult($result)
    {
        return ($this->result = $result);
    }
    /**
     * Method returning last errors occured during the calls
     * @return array
     */
    public function getLastError()
    {
        return $this->lastError;
    }
    /**
     * Method setting last errors occured during the calls
     * @param array $lastError
     * @return array
     */
    private function setLastError($lastError)
    {
        return ($this->lastError = $lastError);
    }
    /**
     * Method saving the last error returned by the SoapClient
     * @param string $methoName the method called when the error occurred
     * @param SoapFault $soapFault l'objet de l'erreur
     * @return bool true|false
     */
    protected function saveLastError($methoName, SoapFault $soapFault)
    {
        return ($this->lastError[$methoName] = $soapFault);
    }
    /**
     * Method getting the last error for a certain method
     * @param string $methoName method name to get error from
     * @return SoapFault|null
     */
    public function getLastErrorForMethod($methoName)
    {
        return (is_array($this->lastError) && array_key_exists($methoName, $this->lastError)) ? $this->lastError[$methoName] : null;
    }
    /**
     * Method returning intern array to iterate trough
     * @return array
     */
    public function getInternArrayToIterate()
    {
        return $this->internArrayToIterate;
    }
    /**
     * Method setting intern array to iterate trough
     * @param array $internArrayToIterate
     * @return array
     */
    public function setInternArrayToIterate($internArrayToIterate)
    {
        return ($this->internArrayToIterate = $internArrayToIterate);
    }
    /**
     * Method returnint intern array index when iterating trough
     * @return int
     */
    public function getInternArrayToIterateOffset()
    {
        return $this->internArrayToIterateOffset;
    }
    /**
     * Method initiating internArrayToIterate
     * @uses PackageNameWsdlClass::setInternArrayToIterate()
     * @uses PackageNameWsdlClass::setInternArrayToIterateOffset()
     * @uses PackageNameWsdlClass::setInternArrayToIterateIsArray()
     * @uses PackageNameWsdlClass::getAttributeName()
     * @uses PackageNameWsdlClass::initInternArrayToIterate()
     * @uses PackageNameWsdlClass::__toString()
     * @param array $array the array to iterate trough
     * @param bool $internCall indicates that methods is calling itself
     * @return void
     */
    public function initInternArrayToIterate($array = array(), $internCall = false)
    {
        if (stripos($this->__toString(), 'array') !== false) {
            if (is_array($array) && count($array)) {
                $this->setInternArrayToIterate($array);
                $this->setInternArrayToIterateOffset(0);
                $this->setInternArrayToIterateIsArray(true);
            } elseif (!$internCall && $this->getAttributeName() !== '' && property_exists($this->__toString(), $this->getAttributeName())) {
                $this->initInternArrayToIterate($this->_get($this->getAttributeName()), true);
            }
        }
    }
    /**
     * Method setting intern array offset when iterating trough
     * @param int $internArrayToIterateOffset
     * @return int
     */
    public function setInternArrayToIterateOffset($internArrayToIterateOffset)
    {
        return ($this->internArrayToIterateOffset = $internArrayToIterateOffset);
    }
    /**
     * Method returning true if intern array is an actual array
     * @return bool true|false
     */
    public function getInternArrayToIterateIsArray()
    {
        return $this->internArrayToIterateIsArray;
    }
    /**
     * Method setting if intern array is an actual array
     * @param bool $internArrayToIterateIsArray
     * @return bool true|false
     */
    public function setInternArrayToIterateIsArray($internArrayToIterateIsArray = false)
    {
        return ($this->internArrayToIterateIsArray = $internArrayToIterateIsArray);
    }
    /**
     * Generic method setting value
     * @param string $name property name to set
     * @param mixed $value property value to use
     * @return bool
     */
    public function _set($name, $value)
    {
        $setMethod = 'set' . ucfirst($name);
        if (method_exists($this, $setMethod)) {
            $this->$setMethod($value);
            return true;
        } else {
            return false;
        }
    }
    /**
     * Generic method getting value
     * @param string $name property name to get
     * @return mixed
     */
    public function _get($name)
    {
        $getMethod = 'get' . ucfirst($name);
        if (method_exists($this, $getMethod)) {
            return $this->$getMethod();
        } else {
            return false;
        }
    }
    /**
     * Method returning alone attribute name when class is *array* type
     * @return string
     */
    public function getAttributeName()
    {
        return '';
    }
    /**
     * Generic method telling if current value is valid according to the attribute setted with the current value
     * @param mixed $value the value to test
     * @return bool true|false
     */
    public static function valueIsValid($value)
    {
        return !empty($value);
    }
    /**
     * Method returning actual class name
     * @return string __CLASS__
     */
    public function __toString()
    {
        return __CLASS__;
    }
}
