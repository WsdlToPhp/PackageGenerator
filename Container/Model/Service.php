<?php

namespace WsdlToPhp\PackageGenerator\Container\Model;

use WsdlToPhp\PackageGenerator\Model\Service as Model;

class Service extends AbstractModel
{
    /**
     * @see \WsdlToPhp\PackageGenerator\Container\ModelContainer\Model::objectClass()
     * @return string
     */
    protected function objectClass()
    {
        return 'WsdlToPhp\\PackageGenerator\\Model\\Service';
    }
    /**
     * Adds a service
     * @param string $serviceName the service name to which add the method
     * @param string $methodName the original function name
     * @param string $methodParameter the original parameter name
     * @param string $methodReturn the original return name
     * @return Model
     */
    public function addService($serviceName, $methodName, $methodParameter, $methodReturn)
    {
        if ($this->get($serviceName) === null) {
            $this->add(new Model($serviceName));
        }
        $serviceMethod = $this->get($serviceName)->getMethod($methodName);
        /**
         * Service method does not already exist, register it
         */
        if ($serviceMethod === null) {
            $this->get($serviceName)->addMethod($methodName, $methodParameter, $methodReturn);
        } elseif ($serviceMethod->getParameterType() != $methodParameter) {
            /**
             * Service method exists with a different signature, register it too by identifying the service functions as non unique functions
             */
            $serviceMethod->setIsUnique(false);
            $this->get($serviceName)->addMethod($methodName, $methodParameter, $methodReturn, false);
        }
    }
    /**
     * @param string $name
     * @return Model|null
     */
    public function getServiceByName($name)
    {
        return $this->get($name, parent::KEY_NAME);
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\Model\AbstractModel::get()
     * @return Model|null
     */
    public function get($value, $key = parent::KEY_NAME)
    {
        return parent::get($value, $key);
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\Model\AbstractModel::getAs()
     * @return Model|null
     */
    public function getAs(array $properties)
    {
        return parent::getAs($properties);
    }
}
