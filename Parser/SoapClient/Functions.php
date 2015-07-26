<?php

namespace WsdlToPhp\PackageGenerator\Parser\SoapClient;

class Functions extends AbstractParser
{
    public function parse()
    {
        $methods = $this->generator->__getFunctions();
        $services = $this->generator->getServices();
        if (is_array($methods) && count($methods)) {
            foreach ($methods as $method) {
                $infos = explode(' ', $method);
                /**
                 * "Regular" SOAP Style
                 */
                if (count($infos) < 3) {
                    $returnType = $infos[0];
                    if (count($infos) < 3 && strpos($infos[1], '()') !== false && array_key_exists(1, $infos)) {
                        $methodName = trim(str_replace('()', '', $infos[1]));
                        $parameterType = null;
                    } else {
                        list($methodName, $parameterType) = explode('(', $infos[1]);
                    }
                    if (!empty($returnType) && !empty($methodName)) {
                        $services->addService($this->generator, $this->generator->getServiceName($methodName), $methodName, $parameterType, $returnType);
                    }
                } elseif (count($infos) >= 3) {
                    /**
                     * RPC SOAP Style
                     * Some RPC WS defines the return type as a list of values
                     * So we define the return type as an array and reset the informations to use to extract method name and parameters
                     */
                    if (stripos($infos[0], 'list(') === 0) {
                        $infos = explode(' ', preg_replace('/(list\(.*\)\s)/i', '', $method));
                        array_unshift($infos, 'array');
                    }
                    /**
                     * Returns type is not defined in some case
                     */
                    $start = 0;
                    $returnType = strpos($infos[0], '(') === false ? $infos[0] : '';
                    $firstParameterType = '';
                    if (empty($returnType) && strpos($infos[0], '(') !== false) {
                        $start = 1;
                        list($methodName, $firstParameterType) = explode('(', $infos[0]);
                    } elseif (strpos($infos[1], '(') !== false) {
                        $start = 2;
                        list($methodName, $firstParameterType) = explode('(', $infos[1]);
                    }
                    if (!empty($methodName)) {
                        $methodParameters = array();
                        $infosCount = count($infos);
                        for ($i = $start; $i < $infosCount; $i += 2) {
                            $info = str_replace(array(
                                ', ',
                                ',',
                                '(',
                                ')',
                                '$',
                            ), '', trim($infos[$i]));
                            if (!empty($info)) {
                                $methodParameters = array_merge($methodParameters, array(
                                    $info => $i == $start ? $firstParameterType : $infos[$i - 1],
                                ));
                            }
                        }
                        $services->addService($this->generator, $this->generator->getServiceName($methodName), $methodName, $methodParameters, empty($returnType) ? 'unknown' : $returnType);
                    }
                }
            }
        }
    }
}
