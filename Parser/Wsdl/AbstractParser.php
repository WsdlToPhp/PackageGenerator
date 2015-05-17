<?php

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\Model\Schema;
use WsdlToPhp\PackageGenerator\Parser\AbstractParser as Parser;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl as WsdlDocument;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Schema as SchemaDocument;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\AbstractTag;

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
    private $parsedWsdls;
    /**
     * List of Schema parsed for the current tag
     * @var array
     */
    private $parsedSchemas;
    /**
     *
     * @param Generator $generator
     */
    public function __construct(Generator $generator)
    {
        $this->generator     = $generator;
        $this->parsedWsdls   = array();
        $this->parsedSchemas = array();
    }
    /**
     * The method takes care of looping among WSDLS as much time as it is needed
     * @see \WsdlToPhp\PackageGenerator\Generator\ParserInterface::parse()
     */
    final public function parse()
    {
        if ($this->generator->getWsdls()->count() > 0) {
            do {
                foreach ($this->generator->getWsdls() as $wsdl) {
                    $content = $wsdl->getContent();
                    if ($content instanceof WsdlDocument) {
                        if ($this->isWsdlParsed($wsdl) === false) {
                            $this->setTags($content->getElementsByName($this->parsingTag()));
                            if (count($this->getTags()) > 0) {
                                $this->parseWsdl($wsdl);
                            }
                        }
                        foreach ($content->getExternalSchemas() as $schema) {
                            if ($this->isSchemaParsed($wsdl, $schema) === false) {
                                $schemaContent = $schema->getContent();
                                if ($schemaContent instanceof SchemaDocument) {
                                    $this->setTags($schemaContent->getElementsByName($this->parsingTag()));
                                    if (count($this->getTags()) > 0) {
                                        $this->parseSchema($wsdl, $schema);
                                    }
                                }
                                $this->setSchemaAsParsed($wsdl, $schema);
                            }
                        }
                    }
                    $this->setWsdlAsParsed($wsdl);
                }
            } while($this->shouldContinue());
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
     * When looping, must return false to stop it
     * @return bool
     */
    private function shouldContinue()
    {
        $shouldContinue = false;
        foreach ($this->generator->getWsdls() as $wsdl) {
            $shouldContinue |= $this->isWsdlParsed($wsdl) === false;
            if ($wsdl->getContent() instanceof WsdlDocument) {
                foreach ($wsdl->getContent()->getExternalSchemas() as $schema) {
                    $shouldContinue |= $this->isSchemaParsed($wsdl, $schema) === false;
                }
            }
        }
        return (bool)$shouldContinue;
    }
    /**
     * @param array $tags
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser
     */
    private function setTags(array $tags)
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
    private function setWsdlAsParsed(Wsdl $wsdl)
    {
        if (!array_key_exists($wsdl->getName(), $this->parsedWsdls)) {
            $this->parsedWsdls[$wsdl->getName()] = array();
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
        return
            array_key_exists($wsdl->getName(), $this->parsedWsdls) &&
            is_array($this->parsedWsdls[$wsdl->getName()]) &&
            in_array($this->parsingTag(), $this->parsedWsdls[$wsdl->getName()]);
    }
    /**
     * @param Wsdl $wsdl
     * @param Schema $schema
     * @return AbstractParser
     */
    private function setSchemaAsParsed(Wsdl $wsdl, Schema $schema)
    {
        $key = $wsdl->getName() . $schema->getName();
        if (!array_key_exists($key, $this->parsedSchemas)) {
            $this->parsedSchemas[$key] = array();
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
        return
            array_key_exists($key, $this->parsedSchemas) &&
            is_array($this->parsedSchemas[$key]) &&
            in_array($this->parsingTag(), $this->parsedSchemas[$key]);
    }
}
