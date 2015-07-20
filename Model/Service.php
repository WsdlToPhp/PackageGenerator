<?php

namespace WsdlToPhp\PackageGenerator\Model;

use WsdlToPhp\PackageGenerator\Container\Model\Method as MethodContainer;

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
        return 'ServiceType';
    }
    /**
     * Returns the sub package name which the model belongs to
     * Must be overridden by sub classes
     * @see AbstractModel::getDocSubPackages()
     * @return array
     */
    public function getDocSubPackages()
    {
        return array(
            'Services',
        );
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
