<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Generator;

use JsonSerializable;
use WsdlToPhp\PackageGenerator\Container\Model\Struct as StructContainer;
use WsdlToPhp\PackageGenerator\Container\Model\Service as ServiceContainer;

class GeneratorContainers extends AbstractGeneratorAware implements JsonSerializable
{
    protected StructContainer $structs;

    protected ServiceContainer $services;

    public function __construct(Generator $generator)
    {
        parent::__construct($generator);
        $this
            ->initStructs()
            ->initServices();
    }

    protected function initStructs(): self
    {
        if (!isset($this->structs)) {
            $this->structs = new StructContainer($this->generator);
        }

        return $this;
    }

    protected function initServices(): self
    {
        if (!isset($this->services)) {
            $this->services = new ServiceContainer($this->generator);
        }

        return $this;
    }

    public function getServices(): ServiceContainer
    {
        return $this->services;
    }

    public function getStructs(): StructContainer
    {
        return $this->structs;
    }

    public function jsonSerialize(): array
    {
        return [
            'services' => $this->services,
            'structs' => $this->structs,
        ];
    }
}
