<?php

namespace WsdlToPhp\PackageGenerator\Generator;

abstract class AbstractGeneratorAware
{
    /**
     * @var Generator
     */
    protected $generator;
    /**
     * @param Generator $generator
     */
    public function __construct(Generator $generator)
    {
        $this->setGenerator($generator);
    }
    /**
     * @param Generator $generator
     * @return AbstractGeneratorAware
     */
    protected function setGenerator(Generator $generator)
    {
        $this->generator = $generator;
        return $this;
    }
    /**
     * @return Generator
     */
    public function getGenerator()
    {
        return $this->generator;
    }
}
