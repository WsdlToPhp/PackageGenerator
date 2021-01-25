<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PhpGenerator\Component\PhpFile;

abstract class AbstractFile implements FileInterface
{
    public const PHP_FILE_EXTENSION = 'php';

    protected Generator $generator;

    protected PhpFile $file;

    public function __construct(Generator $generator, string $name)
    {
        $this
            ->setFile(new PhpFile($name))
            ->setGenerator($generator)
        ;
    }

    public function setGenerator(Generator $generator): self
    {
        $this->generator = $generator;

        return $this;
    }

    public function getGenerator(): Generator
    {
        return $this->generator;
    }

    public function write(): void
    {
        $this->writeFile();
    }

    public function getFileName(): string
    {
        return sprintf('%s%s.%s', $this->getFileDestination(), $this->getFile()->getMainElement()->getName(), $this->getFileExtension());
    }

    public function getFileExtension(): string
    {
        return self::PHP_FILE_EXTENSION;
    }

    public function getFile(): PhpFile
    {
        return $this->file;
    }

    protected function writeFile(): void
    {
        file_put_contents($this->getFileName(), $this->getFile()->toString(), LOCK_EX);
    }

    protected function getFileDestination(): string
    {
        return $this->getGenerator()->getOptionDestination();
    }

    protected function setFile(PhpFile $file): self
    {
        $this->file = $file;

        return $this;
    }
}
