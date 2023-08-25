<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Generator;

use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;

final class Utils
{
    /**
     * Gets upper case word among a string from the end or from the beginning part.
     */
    public static function getPart(string $optionValue, string $string): string
    {
        $string = str_replace('_', '', $string);
        $string = preg_replace('/([0-9])/', '', $string);

        if (empty($string)) {
            return '';
        }

        $elementType = '';

        switch ($optionValue) {
            case GeneratorOptions::VALUE_END:
                $parts = preg_split('/[A-Z]/', ucfirst($string));
                $partsCount = is_countable($parts) ? count($parts) : 0;
                if (!empty($parts[$partsCount - 1])) {
                    $elementType = mb_substr($string, mb_strrpos($string, implode('', array_slice($parts, -1))) - 1);
                } else {
                    for ($i = $partsCount - 1; $i >= 0; --$i) {
                        $part = trim($parts[$i]);
                        if (!empty($part)) {
                            break;
                        }
                    }
                    $elementType = mb_substr($string, (((is_countable($parts) ? count($parts) : 0) - 2 - $i) + 1) * -1);
                }

                break;

            case GeneratorOptions::VALUE_START:
                $parts = preg_split('/[A-Z]/', ucfirst($string));
                $partsCount = is_countable($parts) ? count($parts) : 0;
                if (empty($parts[0]) && !empty($parts[1])) {
                    $elementType = mb_substr($string, 0, mb_strlen($parts[1]) + 1);
                } else {
                    for ($i = 0; $i < $partsCount; ++$i) {
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
        }

        return $elementType;
    }

    public static function getContentFromUrl(string $url, ?string $basicAuthLogin = null, ?string $basicAuthPassword = null, ?string $proxyHost = null, $proxyPort = null, ?string $proxyLogin = null, ?string $proxyPassword = null, array $contextOptions = []): string
    {
        $context = null;
        $options = self::getStreamContextOptions($basicAuthLogin, $basicAuthPassword, $proxyHost, $proxyPort, $proxyLogin, $proxyPassword, $contextOptions);
        if (!empty($options)) {
            $context = stream_context_create($options);
        }

        return file_get_contents($url, false, $context);
    }

    public static function getStreamContextOptions(?string $basicAuthLogin = null, ?string $basicAuthPassword = null, ?string $proxyHost = null, $proxyPort = null, ?string $proxyLogin = null, ?string $proxyPassword = null, array $contextOptions = []): array
    {
        $applyHttpHeader = function (array $contextOptions, string $header): array {
            if (!isset($contextOptions['http']['header']) || !in_array($header, $contextOptions['http']['header'])) {
                $contextOptions['http']['header'][] = $header;
            }

            return $contextOptions;
        };

        if (!empty($basicAuthLogin) && !empty($basicAuthPassword)) {
            $authorizationHeader = sprintf('Authorization: Basic %s', base64_encode(sprintf('%s:%s', $basicAuthLogin, $basicAuthPassword)));
            $contextOptions = $applyHttpHeader($contextOptions, $authorizationHeader);
        }

        if (!empty($proxyHost)) {
            $contextOptions['http']['proxy'] = sprintf('tcp://%s%s', $proxyHost, empty($proxyPort) ? '' : sprintf(':%s', $proxyPort));
            $proxyAuthorizationHeader = sprintf('Proxy-Authorization: Basic %s', base64_encode(sprintf('%s:%s', $proxyLogin, $proxyPassword)));
            $contextOptions = $applyHttpHeader($contextOptions, $proxyAuthorizationHeader);
        }

        return $contextOptions;
    }

    public static function getValueWithinItsType($value, ?string $knownType = null)
    {
        if (is_int($value) || (!is_null($value) && in_array($knownType, [
            'int',
            'integer',
        ], true))) {
            return (int) $value;
        }
        if (is_float($value) || (!is_null($value) && in_array($knownType, [
            'float',
            'double',
            'decimal',
        ], true))) {
            return (float) $value;
        }
        if (is_bool($value) || (!is_null($value) && in_array($knownType, [
            'bool',
            'boolean',
        ], true))) {
            return 'true' === $value || true === $value || 1 === $value || '1' === $value;
        }

        return $value;
    }

    public static function resolveCompletePath(string $origin, string $destination): string
    {
        $resolvedPath = $destination;
        if (!empty($destination) && false === mb_strpos($destination, 'http://') && false === mb_strpos($destination, 'https://') && !empty($origin)) {
            if ('./' === mb_substr($destination, 0, 2)) {
                $destination = mb_substr($destination, 2);
            }
            $destinationParts = explode('/', $destination);
            $fileParts = pathinfo($origin);
            $fileBasename = (is_array($fileParts) && array_key_exists('basename', $fileParts)) ? $fileParts['basename'] : '';
            $parts = parse_url(str_replace('/'.$fileBasename, '', $origin));
            $scheme = (is_array($parts) && array_key_exists('scheme', $parts)) ? $parts['scheme'] : '';
            $host = (is_array($parts) && array_key_exists('host', $parts)) ? $parts['host'] : '';
            $path = (is_array($parts) && array_key_exists('path', $parts)) ? $parts['path'] : '';
            $path = str_replace('/'.$fileBasename, '', $path);
            $pathParts = explode('/', $path);
            $finalPath = implode('/', $pathParts);
            foreach ($destinationParts as $locationPart) {
                if ('..' === $locationPart) {
                    $finalPath = mb_substr($finalPath, 0, mb_strrpos($finalPath, '/', 0));
                } else {
                    $finalPath .= '/'.$locationPart;
                }
            }
            $port = (is_array($parts) && array_key_exists('port', $parts)) ? $parts['port'] : '';
            // Remote file
            if (!empty($scheme) && !empty($host)) {
                $resolvedPath = str_replace('urn', 'http', $scheme).'://'.$host.(!empty($port) ? ':'.$port : '').str_replace('//', '/', $finalPath);
            } elseif (empty($scheme) && empty($host) && count($pathParts)) {
                // Local file
                if (is_file($finalPath)) {
                    $resolvedPath = $finalPath;
                }
            }
        }

        return $resolvedPath;
    }

    public static function cleanComment($comment, string $glueSeparator = ',', bool $uniqueValues = true): string
    {
        if (!is_scalar($comment) && !is_array($comment)) {
            return '';
        }

        return trim(str_replace('*/', '*[:slash:]', is_scalar($comment) ? (string) $comment : implode($glueSeparator, $uniqueValues ? array_unique($comment) : $comment)));
    }

    /**
     * Clean a string to make it valid as PHP variable
     * See more about the used regular expression at {@link http://www.regular-expressions.info/unicode.html}:
     * - \p{L} for any valid letter
     * - \p{N} for any valid number
     * - /u for supporting unicode.
     *
     * @param string $string                  the string to clean
     * @param bool   $keepMultipleUnderscores optional, allows to keep the multiple consecutive underscores
     */
    public static function cleanString(string $string, bool $keepMultipleUnderscores = true): string
    {
        $cleanedString = preg_replace('/[^\p{L}\p{N}_]/u', '_', $string);
        if (!$keepMultipleUnderscores) {
            $cleanedString = preg_replace('/[_]+/', '_', $cleanedString);
        }

        return $cleanedString;
    }

    public static function removeNamespace(string $namespacedClassName): string
    {
        $elements = explode('\\', $namespacedClassName);

        return (string) array_pop($elements);
    }

    public static function createDirectory(string $directory, $permissions = 0775): bool
    {
        if (!is_dir($directory)) {
            mkdir($directory, $permissions, true);
        }

        return true;
    }

    /**
     * Save schemas to schemasFolder
     * Filename will be extracted from schemasUrl or default schema.wsdl will be used.
     */
    public static function saveSchemas(string $destinationFolder, string $schemasFolder, string $schemasUrl, string $content): string
    {
        if (is_null($schemasFolder) || empty($schemasFolder)) {
            // if null or empty schemas folder was provided
            // default schemas folder will be wsdl
            $schemasFolder = 'wsdl';
        }
        $schemasPath = rtrim($destinationFolder, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.rtrim($schemasFolder, DIRECTORY_SEPARATOR);

        // Here we must cover all possible variants
        if ((false !== mb_strpos(mb_strtolower($schemasUrl), '.wsdl')) || (false !== mb_strpos(mb_strtolower($schemasUrl), '.xsd')) || (false !== mb_strpos(mb_strtolower($schemasUrl), '.xml')) || (false === mb_strpos(mb_strtolower($schemasUrl), '?'))) {
            $filename = basename($schemasUrl).(false === mb_strpos(basename($schemasUrl), '.') ? '.xsd' : '');
        } else {
            // if $url is like http://example.com/index.php?WSDL default filename will be schema.wsdl
            $filename = 'schema.wsdl';
        }

        self::createDirectory($schemasPath);

        file_put_contents($schemasPath.DIRECTORY_SEPARATOR.$filename, $content);

        return $schemasPath.DIRECTORY_SEPARATOR.$filename;
    }
}
