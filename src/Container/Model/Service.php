<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Container\Model;

use WsdlToPhp\PackageGenerator\Model\Method as MethodModel;
use WsdlToPhp\PackageGenerator\Model\Service as Model;

final class Service extends AbstractModel
{
    public function addService(string $serviceName, string $methodName, $methodParameter, $methodReturn): Service
    {
        if (!$this->get($serviceName) instanceof Model) {
            $this->add(new Model($this->generator, $serviceName));
        }
        $serviceMethod = $this->get($serviceName)->getMethod($methodName);

        // Service method does not already exist, register it
        if (!$serviceMethod instanceof MethodModel) {
            $this->get($serviceName)->addMethod($methodName, $methodParameter, $methodReturn);
        }
        // Service method exists with a different signature, register it too by identifying the service functions as non unique functions
        elseif ($methodParameter !== $serviceMethod->getParameterType()) {
            $serviceMethod->setUnique(false);
            $this->get($serviceName)->addMethod($methodName, $methodParameter, $methodReturn, false);
        }

        return $this;
    }

    public function getServiceByName(string $name): ?Model
    {
        return $this->get($name);
    }

    public function getMethods(): Method
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

    protected function objectClass(): string
    {
        return Model::class;
    }
}
