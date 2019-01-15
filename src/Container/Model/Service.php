<?php

namespace WsdlToPhp\PackageGenerator\Container\Model;

use WsdlToPhp\PackageGenerator\Model\Service as Model;
use WsdlToPhp\PackageGenerator\Model\Method as MethodModel;

class Service extends AbstractModel
{
    /**
     * @see \WsdlToPhp\PackageGenerator\Container\Model\Model::objectClass()
     * @return string
     */
    protected function objectClass()
    {
        return 'WsdlToPhp\PackageGenerator\Model\Service';
    }
    /**
     * Adds a service
     * @param string $serviceName the service name to which add the method
     * @param string $methodName the original function name
     * @param string|array $methodParameter the original parameter name
     * @param string|array $methodReturn the original return name
     * @return Service
     */
    public function addService($serviceName, $methodName, $methodParameter, $methodReturn)
    {
        if (!$this->get($serviceName) instanceof Model) {
            $this->add(new Model($this->generator, $serviceName));
        }
        $serviceMethod = $this->get($serviceName)->getMethod($methodName);
        /**
         * Service method does not already exist, register it
         */
        if (!$serviceMethod instanceof MethodModel) {
            $this->get($serviceName)->addMethod($methodName, $methodParameter, $methodReturn);
        } elseif ($serviceMethod->getParameterType() != $methodParameter) {
            /**
             * Service method exists with a different signature, register it too by identifying the service functions as non unique functions
             */
            $serviceMethod->setUnique(false);
            $this->get($serviceName)->addMethod($methodName, $methodParameter, $methodReturn, false);
        }
        return $this;
    }
    /**
     * @param string $name
     * @return Model|null
     */
    public function getServiceByName($name)
    {
        return $this->get($name);
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\Model\AbstractModel::get()
     * @param string $value
     * @return Model|null
     */
    public function get($value)
    {
        return parent::get($value);
    }
    /**
     * @return MethodModel[]
     */
    public function getMethods()
    {
        $methods = new Method($this->generator);
        /** @var Model $service */
        foreach ($this->objects as $service) {
            foreach ($service->getMethods() as $method) {
                $methods->add($method);
            }
        }
        return $methods;
    }
}
