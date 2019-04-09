<?php

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PhpGenerator\Component\PhpFile;

abstract class AbstractFile implements FileInterface
{
    /**
     * @var string
     */
    const PHP_FILE_EXTENSION = 'php';
    /**
     * @var Generator
     */
    protected $generator;
    /**
     * @var PhpFile
     */
    protected $file;
    /**
     * @param Generator $generator
     * @param string $name
     */
    public function __construct(Generator $generator, $name)
    {
        $this->setFile(new PhpFile($name))->setGenerator($generator);
    }
    /**
     * @param Generator $generator
     * @return AbstractFile
     */
    public function setGenerator(Generator $generator)
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
    /**
     * @return void
     */
    public function write()
    {
        $this->writeFile();
    }
    /**
     * @return void
     */
    protected function writeFile()
    {
        file_put_contents($this->getFileName(), $this->getFile()->toString(), LOCK_EX);
    }
    /**
     * @return string
     */
    public function getFileName()
    {
        return sprintf('%s%s.%s', $this->getFileDestination(), $this->getFile()->getMainElement()->getName(), $this->getFileExtension());
    }
    /**
     * @return string
     */
    protected function getFileDestination()
    {
        return $this->getGenerator()->getOptionDestination();
    }
    /**
     * @return string
     */
    public function getFileExtension()
    {
        return self::PHP_FILE_EXTENSION;
    }
    /**
     * @param PhpFile $file
     * @return AbstractFile
     */
    protected function setFile($file)
    {
        $this->file = $file;
        return $this;
    }
    /**
     * @return PhpFile
     */
    public function getFile()
    {
        return $this->file;
    }
}
