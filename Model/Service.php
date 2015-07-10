<?php

namespace WsdlToPhp\PackageGenerator\Model;

use WsdlToPhp\PackageGenerator\Container\Model\Method as MethodContainer;
use WsdlToPhp\PackageGenerator\Generator\Generator;

/**
 * Class Service stands for an available service containing the methods/operations described in the WSDL
 */
class Service extends AbstractModel
{
    /**
     * Store the methods of the service
     * @var MethodContainer
     */
    private $methods;
    /**
     * Main constructor
     * @see AbstractModel::__construct()
     * @uses Service::setMethods()
     * @param string $name the service name
     */
    public function __construct($name)
    {
        parent::__construct($name);
        $this->setMethods(new MethodContainer());
    }
    /**
     * Returns the contextual part of the class name for the package
     * @see AbstractModel::getContextualPart()
     * @return string
     */
    public function getContextualPart()
    {
        return 'Service';
    }
    /**
     * Returns the sub package name which the model belongs to
     * Must be overridden by sub classes
     * @see AbstractModel::getDocSubPackages()
     * @return array
     */
    public function getDocSubPackages()
    {
        return array('Services');
    }
    /**
     * Returns the comment lines for this service
     * @uses AbstractModel::getModelByName()
     * @uses AbstractModel::getPackagedName()
     * @uses AbstractModel::getMetaValue()
     * @uses AbstractModel::cleanString()
     * @uses Struct::getContextualPart()
     * @uses Service::getMethods()
     * @uses Method::getReturnType()
     * @uses Method::getComment()
     * @uses Method::getBody()
     * @uses Generator::getPackageName()
     * @param array $body
     * @return void
     */
    public function getClassBody(&$body)
    {
        if (count($this->getMethods())) {
            $returnTypes = array();
            $soapHeaders = array();
            /**
             * Gather informations
             */
            foreach ($this->getMethods() as $method) {
                /**
                 * Gather return types
                 */
                $model = self::getModelByName($method->getReturnType());
                if ($model && $model->getIsStruct()) {
                    array_push($returnTypes, $model->getPackagedName());
                    unset($model);
                } else {
                    array_push($returnTypes, $method->getReturnType());
                }
                /**
                 * Gather SoapHeader informations
                 */
                $soapHeaderNames = $method->getMetaValue('SOAPHeaderNames', array());
                $soapHeaderTypes = $method->getMetaValue('SOAPHeaderTypes', array());
                $soapHeaderNameSpaces = $method->getMetaValue('SOAPHeaderNamespaces', '');
                if (count($soapHeaderNames) && count($soapHeaderNames) == count($soapHeaderTypes)) {
                    foreach ($soapHeaderNames as $index => $soapHeaderName) {
                        $soapHeaderType = str_replace('{@link ', '', $soapHeaderTypes[$index]);
                        $soapHeaderType = str_replace('}', '', $soapHeaderType);
                        $soapHeaderKey = $soapHeaderName . '-' . $soapHeaderType;
                        if (!array_key_exists($soapHeaderKey, $soapHeaders)) {
                            $soapHeaders[$soapHeaderKey] = array('name' => $soapHeaderName, 'type' => $soapHeaderType, 'namespaces' => array($soapHeaderNameSpaces[$index]));
                        } elseif (!in_array($soapHeaderNameSpaces[$index], $soapHeaders[$soapHeaderKey]['namespaces'])) {
                            array_push($soapHeaders[$soapHeaderKey]['namespaces'], $soapHeaderNameSpaces[$index]);
                        }
                    }
                }
            }
            /**
             * Generates the SoapHeaders setter methods
             */
            if (count($soapHeaders)) {
                $whateverStruct = new Struct('whatever');
                $soapHeaderNameUniqueMethods = array();
                foreach ($soapHeaders as $soapHeader) {
                    $soapHeaderName = $soapHeader['name'];
                    $soapHeaderType = $soapHeader['type'];
                    $soapHeaderNameSpaces = $soapHeader['namespaces'];
                    $cleanedName = $this->cleanString($soapHeaderName, false);
                    $headerParamKnown = strpos($soapHeaderType, Generator::getPackageName() . $whateverStruct->getContextualPart()) === 0;
                    $methodName = ucfirst($cleanedName);
                    /**
                     * Ensure unique setter naming
                     */
                    if (!array_key_exists($methodName, $soapHeaderNameUniqueMethods)) {
                        $soapHeaderNameUniqueMethods[$methodName] = 0;
                    } else {
                        $soapHeaderNameUniqueMethods[$methodName]++;
                    }
                    $methodName .= $soapHeaderNameUniqueMethods[$methodName] ? '_' . $soapHeaderNameUniqueMethods[$methodName] : '';
                    /**
                     * setSoapHeader() method comments
                     */
                    $comments = array();
                    array_push($comments, 'Sets the ' . $soapHeaderName . ' SoapHeader param');
                    array_push($comments, '@uses ' . $this->getExtends() . '::setSoapHeader()');
                    array_push($comments, '@param ' . $soapHeaderType . ' $' . lcfirst($headerParamKnown ? $soapHeaderType : $cleanedName));
                    array_push($comments, '@param string $nameSpace ' . implode(', ', $soapHeaderNameSpaces));
                    array_push($comments, '@param bool $mustUnderstand');
                    array_push($comments, '@param string $actor');
                    array_push($comments, '@return bool true|false');
                    /**
                     * getResult() method body
                     */
                    array_push($body, array('comment' => $comments));
                    array_push($body, 'public function setSoapHeader' . $methodName . '(' . ($headerParamKnown ? $soapHeaderType . ' ' : '') . '$' . lcfirst($headerParamKnown ? $soapHeaderType : $cleanedName) . ', $nameSpace' . (count($soapHeaderNameSpaces) > 1 ? '' : ' = ' . var_export($soapHeaderNameSpaces[0], true)) . ', $mustUnderstand = false, $actor = null)');
                    array_push($body, '{');
                    array_push($body, 'return $this->setSoapHeader($nameSpace, \'' . $soapHeaderName . '\', $' . lcfirst($headerParamKnown ? $soapHeaderType : $cleanedName) . ', $mustUnderstand, $actor);');
                    array_push($body, '}');
                    unset($soapHeaderName, $soapHeaderType, $soapHeaderNameSpaces, $cleanedName, $headerParamKnown, $methodName, $comments);
                }
            }
            /**
             * Generates service methods
             */
            foreach ($this->getMethods() as $method) {
                array_push($body, array('comment' => $method->getComment()));
                $method->getBody($body);
            }
            /**
             * Generates the override getResult method if needed
             */
            if (count($returnTypes)) {
                $returnTypes = array_unique($returnTypes);
                natcasesort($returnTypes);
                /**
                 * getResult() method comments
                 */
                $comments = array();
                array_push($comments, 'Returns the result');
                array_push($comments, '@see ' . $this->getExtends() . '::getResult()');
                array_push($comments, '@return ' . implode('|', $returnTypes));
                /**
                 * getResult() method body
                 */
                array_push($body, array('comment' => $comments));
                array_push($body, 'public function getResult()');
                array_push($body, '{');
                array_push($body, 'return parent::getResult();');
                array_push($body, '}');
                unset($comments);
            }
            unset($returnTypes, $soapHeaders);
        }
    }
    /**
     * Returns the methods of the service
     * @return MethodContainer
     */
    public function getMethods()
    {
        return $this->methods;
    }
    /**
     * Sets the methods container
     * @param MethodContainer $methodContainer
     * @return Service
     */
    private function setMethods(MethodContainer $methodContainer)
    {
        $this->methods = $methodContainer;
        return $this;
    }
    /**
     * Adds a method to the service
     * @uses Method::setIsUnique()
     * @param string $methodName original method name
     * @param string|array $methodParameterType original parameter type/name
     * @param string|array $methodReturnType original return type/name
     * @param bool $methodIsUnique original isUnique value
     * @return Method
     */
    public function addMethod($methodName, $methodParameterType, $methodReturnType, $methodIsUnique = true)
    {
        $method = new Method($methodName, $methodParameterType, $methodReturnType, $this, $methodIsUnique);
        $this->methods->add($method);
        return $method;
    }
    /**
     * Returns the method by its original name
     * @uses Service::getMethods()
     * @uses AbstractModel::getName()
     * @param string $methodName the original method name
     * @return Method|null
     */
    public function getMethod($methodName)
    {
        return $this->methods->getMethodByName($methodName);
    }
    /**
     * Allows to define from which class the curent model extends
     * @param bool $short
     * @return string
     */
    public function getExtends($short = false)
    {
        return $short === true ? 'AbstractSoapClientBase' : '\\WsdlToPhp\\PackageBase\\AbstractSoapClientBase';
    }
    /**
     * Returns class name
     * @return string __CLASS__
     */
    public function __toString()
    {
        return 'Service';
    }
}
