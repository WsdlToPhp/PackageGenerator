<?php

namespace WsdlToPhp\PackageGenerator\Model;

use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl as WsdlContent;

abstract class AbstractDocument extends AbstractModel
{
    /**
     * The content
     * @var WsdlContent
     */
    protected $content;
    /**
     * @param Generator $generator
     * @param string $name
     */
    public function __construct(Generator $generator, $name, $content)
    {
        parent::__construct($generator, $name);
        $this->setContent($content);
    }
    /**
     * @return string
     */
    abstract protected function contentClass();
    /**
     * @param string $content wsdl/schema content
     * @return Wsdl
     */
    protected function setContent($content)
    {
        $contentClass = $this->contentClass();
        $domDocument = new \DOMDocument('1.0', 'utf-8');
        try {
            $domDocument->loadXML($content, LIBXML_NOERROR);
            $this->content = new $contentClass($domDocument);
        } catch (\Exception $exception) {
            throw new \InvalidArgumentException(sprintf('Unable to load document at "%s"', $this->getName()), null, $exception);
        }
        return $this;
    }
    /**
     *
     * @return \WsdlToPhp\PackageGenerator\DomHandler\Wsdl\AbstractDocument
     */
    public function getContent()
    {
        return $this->content;
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\Model\AbstractModel::__toString()
     * @return string location
     */
    public function __toString()
    {
        return $this->getName();
    }
}
