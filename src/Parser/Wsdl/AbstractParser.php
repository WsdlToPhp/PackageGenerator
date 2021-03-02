<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Model\Schema;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\Parser\AbstractParser as Parser;
use WsdlToPhp\WsdlHandler\Tag\AbstractTag;

abstract class AbstractParser extends Parser
{
    /**
     * @var AbstractTag[]
     */
    protected array $tags;

    /**
     * List of Wsdl parsed for the current tag.
     */
    protected array $parsedWsdls = [];

    /**
     * List of Schema parsed for the current tag.
     */
    protected array $parsedSchemas = [];

    /**
     * The method takes care of looping among WSDLS as much time as it is needed.
     */
    final public function parse(): void
    {
        $wsdl = $this->generator->getWsdl();

        if (!$this->isWsdlParsed($wsdl)) {
            $this
                ->setWsdlAsParsed($wsdl)
                ->setTags($wsdl->getContent()->getElementsByName($this->parsingTag()))
                ->parseWsdl($wsdl)
            ;
        }

        /** @var Schema $schema */
        foreach ($wsdl->getSchemas() as $schema) {
            if ($this->isSchemaParsed($wsdl, $schema)) {
                continue;
            }

            $this->setSchemaAsParsed($wsdl, $schema);

            $this
                ->setTags($schema->getContent()->getElementsByName($this->parsingTag()))
                ->parseSchema($wsdl, $schema)
            ;
        }
    }

    public function getTags(): array
    {
        return $this->tags;
    }

    public function isWsdlParsed(Wsdl $wsdl): bool
    {
        return array_key_exists($wsdl->getName(), $this->parsedWsdls) && is_array($this->parsedWsdls[$wsdl->getName()]) && in_array($this->parsingTag(), $this->parsedWsdls[$wsdl->getName()]);
    }

    public function isSchemaParsed(Wsdl $wsdl, Schema $schema): bool
    {
        $key = $wsdl->getName().$schema->getName();

        return array_key_exists($key, $this->parsedSchemas) && is_array($this->parsedSchemas[$key]) && in_array($this->parsingTag(), $this->parsedSchemas[$key]);
    }

    abstract protected function parseWsdl(Wsdl $wsdl): void;

    abstract protected function parseSchema(Wsdl $wsdl, Schema $schema): void;

    abstract protected function parsingTag(): string;

    protected function setTags(array $tags): self
    {
        $this->tags = $tags;

        return $this;
    }

    protected function setWsdlAsParsed(Wsdl $wsdl): self
    {
        if (!array_key_exists($wsdl->getName(), $this->parsedWsdls)) {
            $this->parsedWsdls[$wsdl->getName()] = [];
        }
        $this->parsedWsdls[$wsdl->getName()][] = $this->parsingTag();

        return $this;
    }

    protected function setSchemaAsParsed(Wsdl $wsdl, Schema $schema): self
    {
        $key = $wsdl->getName().$schema->getName();
        if (!array_key_exists($key, $this->parsedSchemas)) {
            $this->parsedSchemas[$key] = [];
        }
        $this->parsedSchemas[$key][] = $this->parsingTag();

        return $this;
    }
}
