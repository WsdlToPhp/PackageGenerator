<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Generator;

abstract class AbstractGeneratorAware
{
    protected Generator $generator;

    public function __construct(Generator $generator)
    {
        $this->setGenerator($generator);
    }

    public function getGenerator(): ?Generator
    {
        return $this->generator;
    }

    protected function setGenerator(Generator $generator): self
    {
        $this->generator = $generator;

        return $this;
    }
}
