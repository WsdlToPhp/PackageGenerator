<?php

namespace WsdlToPhp\PackageGenerator\Model;

use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl as WsdlContent;

abstract class AbstractDocument extends AbstractModel
{
    /**
     * The content
     * @var WsdlContent
     */
    protected $content;
    /**
     * @param string $name
     * @return Wsdl
     */
    public function __construct($name, $content)
    {
        parent::__construct($name);
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
        $domDocument->loadXML($content);
        $this->content = new $contentClass($domDocument);
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
     * @see \WsdlToPhp\PackageGenerator\Model\AbstractModel::getClassBody()
     */
    public function getClassBody(&$class)
    {
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
