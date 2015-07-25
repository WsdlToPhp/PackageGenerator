<?php

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PhpGenerator\Component\PhpFile;

abstract class AbstractFile implements FileInterface
{
    /**
     * @var Generator
     */
    protected $generator;
    /**
     * @var PhpFile
     */
    protected $file;
    /**
     * @var string
     */
    protected $destination;
    /**
     * @param Generator $generator
     * @param string $name
     * @param string $destination
     */
    public function __construct(Generator $generator, $name, $destination)
    {
        $this->setDestination($destination);
        $this->setFile(new PhpFile($name));
        $this->setGenerator($generator);
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
     * @return int|bool
     */
    public function write()
    {
        $this->beforeWrite();
        $state = $this->writeFile();
        return $state;
    }
    /**
     * @return int|bool
     */
    private function writeFile()
    {
        return file_put_contents($this->getFileName(), $this->getFile()->toString(), LOCK_EX);
    }
    /**
     * Called before actual write method is called
     */
    public function beforeWrite()
    {
    }
    /**
     * @return string
     */
    public function getFileName()
    {
        return sprintf('%s/%s.php', $this->getDestination(), $this->getFile()->getMainElement()->getName());
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
    /**
     * @throws \InvalidArgumentException
     * @param string $destination
     * @return AbstractFile
     */
    public function setDestination($destination)
    {
        $dest = $this->cleanDestination($destination);
        if (empty($dest)) {
            throw new \InvalidArgumentException(sprintf('Destination "%s" is not valid', $destination), __LINE__);
        }
        $this->destination = $dest;
        return $this;
    }
    /**
     * @param string $destination
     * @return string
     */
    protected function cleanDestination($destination)
    {
        return realpath($destination);
    }
    /**
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }
}
