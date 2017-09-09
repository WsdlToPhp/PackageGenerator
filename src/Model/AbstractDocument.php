<?php

namespace WsdlToPhp\PackageGenerator\Model;

use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl as WsdlContent;

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
     * @param string $content
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
     * @return AbstractDocument
     */
    protected function setContent($content)
    {
        $contentClass = $this->contentClass();
        $domDocument = new \DOMDocument('1.0', 'utf-8');
        try {
            $domDocument->loadXML($content, LIBXML_NOERROR);
            $this->content = new $contentClass($domDocument, $this->generator);
        } catch (\Exception $exception) {
            throw new \InvalidArgumentException(sprintf('Unable to load document at "%s"', $this->getName()), __LINE__, $exception);
        }
        return $this;
    }
    /**
     *
     * @return \WsdlToPhp\PackageGenerator\WsdlHandler\AbstractDocument
     */
    public function getContent()
    {
        return $this->content;
    }
    /**
     * {@inheritDoc}
     * @see \WsdlToPhp\PackageGenerator\Model\AbstractModel::toJsonSerialize()
     */
    protected function toJsonSerialize()
    {
        return [];
    }
}
