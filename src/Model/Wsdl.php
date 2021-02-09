<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Model;

use WsdlToPhp\PackageGenerator\Container\Model\Schema as SchemaContainer;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\WsdlHandler\Wsdl as WsdlDocument;

final class Wsdl extends AbstractDocument
{
    private SchemaContainer $schemas;

    public function __construct(Generator $generator, string $name, string $content)
    {
        parent::__construct($generator, $name, $content);
        $this->schemas = new SchemaContainer($generator);
    }

    public function getContent(): WsdlDocument
    {
        return parent::getContent();
    }

    public function addSchema(Schema $schema): self
    {
        $this->getContent()->addExternalSchema($schema->getContent());

        $this->schemas->add($schema);

        return $this;
    }

    public function hasSchema(string $schemaLocation): bool
    {
        return $this->schemas->getSchemaByName($schemaLocation) instanceof Schema;
    }

    public function getSchemas(): SchemaContainer
    {
        return $this->schemas;
    }

    protected function contentClass(): string
    {
        return WsdlDocument::class;
    }
}
