<?php

namespace WsdlToPhp\PackageGenerator\Model;

use WsdlToPhp\PackageGenerator\Generator\Utils;
use WsdlToPhp\PackageGenerator\Container\Model\Method as MethodContainer;
use WsdlToPhp\PackageGenerator\Generator\Generator;

/**
 * Class Service stands for an available service containing the methods/operations described in the WSDL
 */
class Service extends AbstractModel
{
    /**
     * @var string
     */
    const DEFAULT_SERVICE_CLASS_NAME = 'Service';
    /**
     * Store the methods of the service
     * @var MethodContainer
     */
    private $methods;
    /**
     * Main constructor
     * @see AbstractModel::__construct()
     * @uses Service::setMethods()
     * @param Generator $generator
     * @param string $name the service name
     */
    public function __construct(Generator $generator, $name)
    {
        parent::__construct($generator, $name);
        $this->setMethods(new MethodContainer($generator));
    }
    /**
     * Returns the contextual part of the class name for the package
     * @see AbstractModel::getContextualPart()
     * @return string
     */
    public function getContextualPart()
    {
        return $this->getGenerator()->getOptionServicesFolder();
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
        $method = new Method($this->getGenerator(), $methodName, $methodParameterType, $methodReturnType, $this, $methodIsUnique);
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
        $extends = $this->getGenerator()->getOptionSoapClientClass();
        return $short ? Utils::removeNamespace($extends) : $extends;
    }
}
