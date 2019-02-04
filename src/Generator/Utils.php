<?php

namespace WsdlToPhp\PackageGenerator\Generator;

use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;

class Utils
{
    /**
     * Gets upper case word among a string from the end or from the beginning part
     * @param string $optionValue
     * @param string $string the string from which we can extract the part
     * @return string
     */
    public static function getPart($optionValue, $string)
    {
        $elementType = '';
        $string = str_replace('_', '', $string);
        $string = preg_replace('/([0-9])/', '', $string);
        if (!empty($string)) {
            switch ($optionValue) {
                case GeneratorOptions::VALUE_END:
                    $parts = preg_split('/[A-Z]/', ucfirst($string));
                    $partsCount = count($parts);
                    if (!empty($parts[$partsCount - 1])) {
                        $elementType = mb_substr($string, mb_strrpos($string, implode('', array_slice($parts, -1))) - 1);
                    } else {
                        for ($i = $partsCount - 1; $i >= 0; $i--) {
                            $part = trim($parts[$i]);
                            if (!empty($part)) {
                                break;
                            }
                        }
                        $elementType = mb_substr($string, ((count($parts) - 2 - $i) + 1) * -1);
                    }
                    break;
                case GeneratorOptions::VALUE_START:
                    $parts = preg_split('/[A-Z]/', ucfirst($string));
                    $partsCount = count($parts);
                    if (empty($parts[0]) && !empty($parts[1])) {
                        $elementType = mb_substr($string, 0, mb_strlen($parts[1]) + 1);
                    } else {
                        for ($i = 0; $i < $partsCount; $i++) {
                            $part = trim($parts[$i]);
                            if (!empty($part)) {
                                break;
                            }
                        }
                        $elementType = mb_substr($string, 0, $i);
                    }
                    break;
                case GeneratorOptions::VALUE_NONE:
                    $elementType = $string;
                    break;
                default:
                    break;
            }
        }
        return $elementType;
    }
    /**
     * Get content from url using a proxy or not
     * @param string $url
     * @param string $basicAuthLogin
     * @param string $basicAuthPassword
     * @param string $proxyHost
     * @param string $proxyPort
     * @param string $proxyLogin
     * @param string $proxyPassword
     * @param array $contextOptions
     * @return string
     */
    public static function getContentFromUrl($url, $basicAuthLogin = null, $basicAuthPassword = null, $proxyHost = null, $proxyPort = null, $proxyLogin = null, $proxyPassword = null, array $contextOptions = [])
    {
        $context = null;
        $options = self::getStreamContextOptions($basicAuthLogin, $basicAuthPassword, $proxyHost, $proxyPort, $proxyLogin, $proxyPassword, $contextOptions);
        if (!empty($options)) {
            $context = stream_context_create($options);
        }
        return file_get_contents($url, false, $context);
    }
    /**
     * @param string $basicAuthLogin
     * @param string $basicAuthPassword
     * @param string $proxyHost
     * @param string $proxyPort
     * @param string $proxyLogin
     * @param string $proxyPassword
     * @param array $contextOptions
     * @return string[]
     */
    public static function getStreamContextOptions($basicAuthLogin = null, $basicAuthPassword = null, $proxyHost = null, $proxyPort = null, $proxyLogin = null, $proxyPassword = null, array $contextOptions = [])
    {
        $proxyOptions = $basicAuthOptions = [];
        if (!empty($basicAuthLogin) && !empty($basicAuthPassword)) {
            $basicAuthOptions = [
                'http' => [
                    'header' => [
                        sprintf('Authorization: Basic %s', base64_encode(sprintf('%s:%s', $basicAuthLogin, $basicAuthPassword))),
                    ],
                ],
            ];
        }
        if (!empty($proxyHost)) {
            $proxyOptions = [
                'http' => [
                    'proxy' => sprintf('tcp://%s%s', $proxyHost, empty($proxyPort) ? '' : sprintf(':%s', $proxyPort)),
                    'header' => [
                        sprintf('Proxy-Authorization: Basic %s', base64_encode(sprintf('%s:%s', $proxyLogin, $proxyPassword))),
                    ],
                ],
            ];
        }
        return array_merge_recursive($contextOptions, $proxyOptions, $basicAuthOptions);
    }
    /**
     * Returns the value with good type
     * @param mixed $value the value
     * @param string $knownType the value
     * @return mixed
     */
    public static function getValueWithinItsType($value, $knownType = null)
    {
        if (is_int($value) || (!is_null($value) && in_array($knownType, [
            'time',
            'positiveInteger',
            'unsignedLong',
            'unsignedInt',
            'short',
            'long',
            'int',
            'integer',
        ], true))) {
            return intval($value);
        } elseif (is_float($value) || (!is_null($value) && in_array($knownType, [
            'float',
            'double',
            'decimal',
        ], true))) {
            return floatval($value);
        } elseif (is_bool($value) || (!is_null($value) && in_array($knownType, [
            'bool',
            'boolean',
        ], true))) {
            return ($value === 'true' || $value === true || $value === 1 || $value === '1');
        }
        return $value;
    }
    /**
     * @param string $origin
     * @param string $destination
     * @return string
     */
    public static function resolveCompletePath($origin, $destination)
    {
        $resolvedPath = $destination;
        if (!empty($destination) && mb_strpos($destination, 'http://') === false && mb_strpos($destination, 'https://') === false && !empty($origin)) {
            if (mb_substr($destination, 0, 2) === './') {
                $destination = mb_substr($destination, 2);
            }
            $destinationParts = explode('/', $destination);
            $fileParts = pathinfo($origin);
            $fileBasename = (is_array($fileParts) && array_key_exists('basename', $fileParts)) ? $fileParts['basename'] : '';
            $parts = parse_url(str_replace('/' . $fileBasename, '', $origin));
            $scheme = (is_array($parts) && array_key_exists('scheme', $parts)) ? $parts['scheme'] : '';
            $host = (is_array($parts) && array_key_exists('host', $parts)) ? $parts['host'] : '';
            $path = (is_array($parts) && array_key_exists('path', $parts)) ? $parts['path'] : '';
            $path = str_replace('/' . $fileBasename, '', $path);
            $pathParts = explode('/', $path);
            $finalPath = implode('/', $pathParts);
            foreach ($destinationParts as $locationPart) {
                if ($locationPart == '..') {
                    $finalPath = mb_substr($finalPath, 0, mb_strrpos($finalPath, '/', 0));
                } else {
                    $finalPath .= '/' . $locationPart;
                }
            }
            $port = (is_array($parts) && array_key_exists('port', $parts)) ? $parts['port'] : '';
            /**
             * Remote file
             */
            if (!empty($scheme) && !empty($host)) {
                $resolvedPath = str_replace('urn', 'http', $scheme) . '://' . $host . (!empty($port) ? ':' . $port : '') . str_replace('//', '/', $finalPath);
            } elseif (empty($scheme) && empty($host) && count($pathParts)) {
                /**
                 * Local file
                 */
                if (is_file($finalPath)) {
                    $resolvedPath = $finalPath;
                }
            }
        }
        return $resolvedPath;
    }
    /**
     * Clean comment
     * @param string $comment the comment to clean
     * @param string $glueSeparator ths string to use when gathering values
     * @param bool $uniqueValues indicates if comment values must be unique or not
     * @return string
     */
    public static function cleanComment($comment, $glueSeparator = ',', $uniqueValues = true)
    {
        if (!is_scalar($comment) && !is_array($comment)) {
            return '';
        }
        return trim(str_replace('*/', '*[:slash:]', is_scalar($comment) ? $comment : implode($glueSeparator, $uniqueValues ? array_unique($comment) : $comment)));
    }
    /**
     * Clean a string to make it valid as PHP variable
     * See more about the used regular expression at {@link http://www.regular-expressions.info/unicode.html}:
     * - \p{L} for any valid letter
     * - \p{N} for any valid number
     * - /u for supporting unicode
     * @param string $string the string to clean
     * @param bool $keepMultipleUnderscores optional, allows to keep the multiple consecutive underscores
     * @return string
     */
    public static function cleanString($string, $keepMultipleUnderscores = true)
    {
        $cleanedString = preg_replace('/[^\p{L}\p{N}_]/u', '_', $string);
        if (!$keepMultipleUnderscores) {
            $cleanedString = preg_replace('/[_]+/', '_', $cleanedString);
        }
        return $cleanedString;
    }
    /**
     * @param string $namespacedClassName
     * @return string
     */
    public static function removeNamespace($namespacedClassName)
    {
        $elements = explode('\\', $namespacedClassName);
        return (string) array_pop($elements);
    }
    /**
     * @param string $directory
     * @param int $permissions
     * @return bool
     */
    public static function createDirectory($directory, $permissions = 0775)
    {
        if (!is_dir($directory)) {
            mkdir($directory, $permissions, true);
        }
        return true;
    }
    /**
     * Save schemas to schemasFolder
     * Filename will be extracted from schemasUrl or default schema.wsdl will be used
     * @param string $destinationFolder
     * @param string $schemasFolder
     * @param string $schemasUrl
     * @param string $content
     * @return string
     */
    public static function saveSchemas($destinationFolder, $schemasFolder, $schemasUrl, $content)
    {
        if (($schemasFolder === null) || empty($schemasFolder)) {
            // if null or empty schemas folder was provided
            // default schemas folder will be wsdl
            $schemasFolder = 'wsdl';
        }
        $schemasPath = rtrim($destinationFolder, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . rtrim($schemasFolder, DIRECTORY_SEPARATOR);
        // Here we must cover all possible variants
        if ((mb_strpos(mb_strtolower($schemasUrl), '.wsdl') !== false) || (mb_strpos(mb_strtolower($schemasUrl), '.xsd') !== false) || (mb_strpos(mb_strtolower($schemasUrl), '.xml') !== false)) {
            $filename = basename($schemasUrl);
        } else {
            // if $url is like http://example.com/index.php?WSDL default filename will be schema.wsdl
            $filename = 'schema.wsdl';
        }
        self::createDirectory($schemasPath);
        file_put_contents($schemasPath . DIRECTORY_SEPARATOR . $filename, $content);
        return $schemasPath . DIRECTORY_SEPARATOR . $filename;
    }
}
