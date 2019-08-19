<?php

namespace WsdlToPhp\PackageGenerator\WsdlHandler;

use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\AbstractTag;
use WsdlToPhp\PackageGenerator\Model\Schema as Model;
use WsdlToPhp\PackageGenerator\Container\Model\Schema as ModelContainer;
use WsdlToPhp\PackageGenerator\Generator\Generator;

class Wsdl extends AbstractDocument
{
    /**
     * @var ModelContainer
     */
    protected $externalSchemas;
    /**
     * @see \WsdlToPhp\DomHandler\AbstractDomDocumentHandler::__construct()
     * @param \DOMDocument $domDocument
     * @param Generator $generator
     */
    public function __construct(\DOMDocument $domDocument, Generator $generator)
    {
        parent::__construct($domDocument);
        $this->externalSchemas = new ModelContainer($generator);
    }
    /**
     * @param Model $schema
     * @return \WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl
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
     * @see \WsdlToPhp\PackageGenerator\WsdlHandler\AbstractDocument::getElementByName()
     * @return AbstractTag|null
     */
    public function getElementByName($name, $includeExternals = false)
    {
        return $this->useParentMethodAndExternals(__FUNCTION__, [
            $name,
        ], $includeExternals, true);
    }
    /**
     * @see \WsdlToPhp\DomHandler\AbstractDomDocumentHandler::getElementByNameAndAttributes()
     * @return AbstractTag|null
     */
    public function getElementByNameAndAttributes($name, array $attributes, $includeExternals = false)
    {
        return $this->useParentMethodAndExternals(__FUNCTION__, [
            $name,
            $attributes,
        ], $includeExternals, true);
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\WsdlHandler\AbstractDocument::getElementsByName()
     * @return AbstractTag[]
     */
    public function getElementsByName($name, $includeExternals = false)
    {
        return $this->useParentMethodAndExternals(__FUNCTION__, [
            $name,
        ], $includeExternals);
    }
    /**
     * @param string $name
     * @param array $attributes
     * @param \DOMNode|null $node
     * @param bool $includeExternals
     * @see \WsdlToPhp\DomHandler\AbstractDomDocumentHandler::getElementsByNameAndAttributes()
     * @return AbstractTag[]
     */
    public function getElementsByNameAndAttributes($name, array $attributes, \DOMNode $node = null, $includeExternals = false)
    {
        return $this->useParentMethodAndExternals(__FUNCTION__, [
            $name,
            $attributes,
            $node,
        ], $includeExternals);
    }
    /**
     * Handler any method that exist within the parent class,
     * in addition it handles the case when we want to use the external schemas to search in
     * @param string $method
     * @param array $parameters
     * @param bool $includeExternals
     * @param bool $returnOne
     * @return mixed
     */
    protected function useParentMethodAndExternals($method, $parameters, $includeExternals = false, $returnOne = false)
    {
        $result = call_user_func_array([
            $this,
            sprintf('parent::%s', $method),
        ], $parameters);
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
    protected function useExternalSchemas($method, $parameters, $parentResult, $returnOne = false)
    {
        $result = $parentResult;
        if ($this->getExternalSchemas()->count() > 0) {
            foreach ($this->getExternalSchemas() as $externalSchema) {
                if ($externalSchema->getContent() instanceof AbstractDocument) {
                    $externalResult = call_user_func_array([
                        $externalSchema->getContent(),
                        $method,
                    ], $parameters);
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
}
