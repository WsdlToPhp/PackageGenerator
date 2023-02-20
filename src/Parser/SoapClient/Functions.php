<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Parser\SoapClient;

final class Functions extends AbstractParser
{
    public function parse(): void
    {
        $methods = $this
            ->getGenerator()
            ->getSoapClient()
            ->getSoapClient()
            ->getSoapClient()
            ->__getFunctions()
        ;

        $services = $this->getGenerator()->getServices();

        if (!is_array($methods) || 0 === count($methods)) {
            return;
        }

        foreach ($methods as $method) {
            $infos = explode(' ', $method);
            // "Regular" SOAP Style
            if (count($infos) < 3) {
                $returnType = $infos[0];
                if (false !== mb_strpos($infos[1], '()') && array_key_exists(1, $infos)) {
                    $methodName = trim(str_replace('()', '', $infos[1]));
                    $parameterType = null;
                } else {
                    [$methodName, $parameterType] = explode('(', $infos[1]);
                }
                if (!empty($returnType) && !empty($methodName)) {
                    $services->addService($this->getGenerator()->getServiceName($methodName), $methodName, $parameterType, $returnType);
                }
            } else {
                /*
                 * RPC SOAP Style
                 * Some RPC WS defines the return type as a list of values
                 * So we define the return type as an array and reset the information to use to extract method name and parameters
                 */
                if (0 === mb_stripos($infos[0], 'list(')) {
                    $infos = explode(' ', preg_replace('/(list\(.*\)\s)/i', '', $method));
                    array_unshift($infos, 'array');
                }

                /**
                 * Returns type is not defined in some case.
                 */
                $start = 0;
                $returnType = false === mb_strpos($infos[0], '(') ? $infos[0] : '';
                $firstParameterType = '';
                if (empty($returnType) && false !== mb_strpos($infos[0], '(')) {
                    $start = 1;
                    [$methodName, $firstParameterType] = explode('(', $infos[0]);
                } elseif (false !== mb_strpos($infos[1], '(')) {
                    $start = 2;
                    [$methodName, $firstParameterType] = explode('(', $infos[1]);
                }
                if (!empty($methodName)) {
                    $methodParameters = [];
                    $infosCount = count($infos);
                    for ($i = $start; $i < $infosCount; $i += 2) {
                        $info = str_replace([
                            ', ',
                            ',',
                            '(',
                            ')',
                            '$',
                        ], '', trim($infos[$i]));
                        if (!empty($info)) {
                            $methodParameters = array_merge($methodParameters, [
                                $info => $start === $i ? $firstParameterType : $infos[$i - 1],
                            ]);
                        }
                    }
                    $services->addService($this->getGenerator()->getServiceName($methodName), $methodName, $methodParameters, empty($returnType) ? 'unknown' : $returnType);
                }
            }
        }
    }
}
