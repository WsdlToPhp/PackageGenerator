<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Model;

use WsdlToPhp\PackageGenerator\ConfigurationReader\ServiceReservedMethod;
use WsdlToPhp\PackageGenerator\Container\Model\Method as MethodContainer;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\Generator\Utils;

/**
 * Class Service stands for an available service containing the methods/operations described in the WSDL.
 */
class Service extends AbstractModel
{
    public const DEFAULT_SERVICE_CLASS_NAME = 'Service';

    protected MethodContainer $methods;

    public function __construct(Generator $generator, string $name)
    {
        parent::__construct($generator, $name);
        $this->setMethods(new MethodContainer($generator));
    }

    public function getContextualPart(): string
    {
        return $this->getGenerator()->getOptionServicesFolder();
    }

    public function getDocSubPackages(): array
    {
        return [
            'Services',
        ];
    }

    public function getMethods(): MethodContainer
    {
        return $this->methods;
    }

    public function addMethod(string $methodName, $methodParameterType, $methodReturnType, $methodIsUnique = true): Method
    {
        $method = new Method($this->getGenerator(), $methodName, $methodParameterType, $methodReturnType, $this, $methodIsUnique);
        $this->methods->add($method);

        return $method;
    }

    public function getMethod(string $methodName): ?Method
    {
        return $this->methods->getMethodByName($methodName);
    }

    public function getExtends(bool $short = false): string
    {
        $extends = $this->getGenerator()->getOptionSoapClientClass();

        return $short ? Utils::removeNamespace($extends) : $extends;
    }

    public function getReservedMethodsInstance(?string $filename = null): ServiceReservedMethod
    {
        return ServiceReservedMethod::instance($filename);
    }

    public function setMethodsFromSerializedJson(array $methods): void
    {
        foreach ($methods as $method) {
            $this->methods->add(self::instanceFromSerializedJson($this->generator, $method)->setOwner($this));
        }
    }

    protected function setMethods(MethodContainer $methodContainer): self
    {
        $this->methods = $methodContainer;

        return $this;
    }

    protected function toJsonSerialize(): array
    {
        return [
            'methods' => $this->methods,
        ];
    }
}
