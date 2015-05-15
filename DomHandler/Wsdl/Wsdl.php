<?php

namespace WsdlToPhp\PackageGenerator\DomHandler\Wsdl;

use WsdlToPhp\PackageGenerator\Model\Schema as Model;
use WsdlToPhp\PackageGenerator\Container\Model\Schema as ModelContainer;

class Wsdl extends AbstractDocument
{
    /**
     * @see \WsdlToPhp\PackageGenerator\DomHandler\AbstractDomDocumentHandler::__construct()
     * @param \DOMDocument $domDocument
     * @return Wsdl
     */
    public function __construct(\DOMDocument $domDocument)
    {
        parent::__construct($domDocument);
        $this->externalSchemas = new ModelContainer();
    }
    /**
     * @var ModelContainer
     */
    protected $externalSchemas;
    /**
     * @param Model $schema
     * @return \WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl
     */
    public function addExternalSchema(Model $schema)
    {
        $this->externalSchemas->add($schema);
        return $this;
    }
    /**
     * @param string $name
     * @return \WsdlToPhp\PackageGenerator\Model\Schema|null
     */
    public function getExternalSchema($name)
    {
        return $this->externalSchemas->getSchemaByName($name);
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\Container\Model\Schema
     */
    public function getExternalSchemas()
    {
        return $this->externalSchemas;
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\DomHandler\Wsdl\AbstractDocument::getElementByName()
     * @param bool $includeExternals force search among external schemas
     * @return null|\WsdlToPhp\PackageGenerator\DomHandler\ElementHandler
     */
    public function getElementByName($name, $includeExternals = false)
    {
        return $this->useParentMethodAndExternals(__FUNCTION__, array(
            $name,
        ), $includeExternals, true);
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\DomHandler\AbstractDomDocumentHandler::getElementByNameAndAttributes()
     * @param bool $includeExternals force search among external schemas
     * @return null|\WsdlToPhp\PackageGenerator\DomHandler\ElementHandler
     */
    public function getElementByNameAndAttributes($name, array $attributes, $includeExternals = false)
    {
        return $this->useParentMethodAndExternals(__FUNCTION__, array(
            $name,
            $attributes,
        ), $includeExternals, true);
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\DomHandler\Wsdl\AbstractDocument::getElementsByName()
     * @param bool $includeExternals force search among external schemas
     * @return array[AbstractElementHandler]
     */
    public function getElementsByName($name, $includeExternals = false)
    {
        return $this->useParentMethodAndExternals(__FUNCTION__, array(
            $name,
        ), $includeExternals);
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\DomHandler\AbstractDomDocumentHandler::getElementsByNameAndAttributes()
     * @param bool $includeExternals force search among external schemas
     * @return array[AbstractElementHandler]
     */
    public function getElementsByNameAndAttributes($name, array $attributes, $includeExternals = false)
    {
        return $this->useParentMethodAndExternals(__FUNCTION__, array(
            $name,
            $attributes,
        ), $includeExternals);
    }
    /**
     * Handler any method that exist within the parant class,
     * in addition it handles the case when we want to use the external schemas to search in
     * @param string $method
     * @param array $parameters
     * @param string $includeExternals
     * @param string $returnOne
     * @return mixed
     */
    private function useParentMethodAndExternals($method, $parameters, $includeExternals = false, $returnOne = false)
    {
        $result = call_user_func_array(array(
            $this,
            sprintf('parent::%s', $method),
        ), $parameters);
        if ($includeExternals === true && (($returnOne === true && $result === null) || $returnOne === false)) {
            $result = $this->useExternalSchemas($method, $parameters, $result, $returnOne);
        }
        return $result;
    }
    /**
     * @param string $method
     * @param array $parameters
     * @param bool $returnOne
     * @return mixed
     */
    private function useExternalSchemas($method, $parameters, $parentResult, $returnOne = false)
    {
        $result = $parentResult;
        if ($this->getExternalSchemas()->count() > 0) {
            foreach ($this->getExternalSchemas() as $externalSchema) {
                if ($externalSchema->getContent() !== null) {
                    $externalResult = call_user_func_array(array(
                        $externalSchema->getContent(),
                        $method,
                    ), $parameters);
                    if ($returnOne === true && $externalResult !== null) {
                        $result = $externalResult;
                        break;
                    } elseif (is_array($externalResult) && !empty($externalResult)) {
                        $result = array_merge($result, $externalResult);
                    }
                }
            }
        }
        return $result;
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\DomHandler\AbstractDomDocumentHandler::initRootElement()
     */
    protected function initRootElement()
    {
        $this->setCurrentTag(parent::TAG_DEFINITIONS);
        return parent::initRootElement();
    }
}
