<?php

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\AbstractTag;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\Model\Schema;
use WsdlToPhp\PackageGenerator\Parser\AbstractParser as Parser;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl as WsdlDocument;
use WsdlToPhp\PackageGenerator\WsdlHandler\Schema as SchemaDocument;

abstract class AbstractParser extends Parser
{
    /**
     * @var Generator
     */
    protected $generator;
    /**
     * @var AbstractTag[]
     */
    protected $tags;
    /**
     * List of Wsdl parsed for the current tag
     * @var array
     */
    protected $parsedWsdls;
    /**
     * List of Schema parsed for the current tag
     * @var array
     */
    protected $parsedSchemas;
    /**
     *
     * @param Generator $generator
     */
    public function __construct(Generator $generator)
    {
        parent::__construct($generator);
        $this->parsedWsdls = [];
        $this->parsedSchemas = [];
    }
    /**
     * The method takes care of looping among WSDLS as much time as it is needed
     * @see \WsdlToPhp\PackageGenerator\Generator\ParserInterface::parse()
     */
    final public function parse()
    {
        $wsdl = $this->generator->getWsdl();
        if ($wsdl instanceof Wsdl) {
            $content = $wsdl->getContent();
            if ($content instanceof WsdlDocument) {
                if ($this->isWsdlParsed($wsdl) === false) {
                    $this->setWsdlAsParsed($wsdl)->setTags($content->getElementsByName($this->parsingTag()))->parseWsdl($wsdl);
                }
                foreach ($content->getExternalSchemas() as $schema) {
                    if ($this->isSchemaParsed($wsdl, $schema) === false) {
                        $this->setSchemaAsParsed($wsdl, $schema);
                        $schemaContent = $schema->getContent();
                        if ($schemaContent instanceof SchemaDocument) {
                            $this->setTags($schemaContent->getElementsByName($this->parsingTag()))->parseSchema($wsdl, $schema);
                        }
                    }
                }
            }
        }
    }
    /**
     * Actual parsing of the Wsdl
     * @param Wsdl $wsdl
     */
    abstract protected function parseWsdl(Wsdl $wsdl);
    /**
     * Actual parsing of the Schema
     * @param Wsdl $wsdl
     * @param Schema $schema
     */
    abstract protected function parseSchema(Wsdl $wsdl, Schema $schema);
    /**
     * Must return the tag that will be parsed
     * @return string
     */
    abstract protected function parsingTag();
    /**
     * @param AbstractTag[] $tags
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser
     */
    protected function setTags(array $tags)
    {
        $this->tags = $tags;
        return $this;
    }
    /**
     * @return AbstractTag[]
     */
    public function getTags()
    {
        return $this->tags;
    }
    /**
     * @param Wsdl $wsdl
     * @return AbstractParser
     */
    protected function setWsdlAsParsed(Wsdl $wsdl)
    {
        if (!array_key_exists($wsdl->getName(), $this->parsedWsdls)) {
            $this->parsedWsdls[$wsdl->getName()] = [];
        }
        $this->parsedWsdls[$wsdl->getName()][] = $this->parsingTag();
        return $this;
    }
    /**
     * @param Wsdl $wsdl
     * @return boolean
     */
    public function isWsdlParsed(Wsdl $wsdl)
    {
        return array_key_exists($wsdl->getName(), $this->parsedWsdls) && is_array($this->parsedWsdls[$wsdl->getName()]) && in_array($this->parsingTag(), $this->parsedWsdls[$wsdl->getName()]);
    }
    /**
     * @param Wsdl $wsdl
     * @param Schema $schema
     * @return AbstractParser
     */
    protected function setSchemaAsParsed(Wsdl $wsdl, Schema $schema)
    {
        $key = $wsdl->getName() . $schema->getName();
        if (!array_key_exists($key, $this->parsedSchemas)) {
            $this->parsedSchemas[$key] = [];
        }
        $this->parsedSchemas[$key][] = $this->parsingTag();
        return $this;
    }
    /**
     * @param Wsdl $wsdl
     * @param Schema $schema
     * @return boolean
     */
    public function isSchemaParsed(Wsdl $wsdl, Schema $schema)
    {
        $key = $wsdl->getName() . $schema->getName();
        return array_key_exists($key, $this->parsedSchemas) && is_array($this->parsedSchemas[$key]) && in_array($this->parsingTag(), $this->parsedSchemas[$key]);
    }
}
