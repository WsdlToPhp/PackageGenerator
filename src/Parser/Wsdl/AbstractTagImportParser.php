<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Generator\Utils;
use WsdlToPhp\PackageGenerator\Model\Schema;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\WsdlHandler\AbstractDocument;

abstract class AbstractTagImportParser extends AbstractTagParser
{
    protected function parseWsdl(Wsdl $wsdl, Schema $schema = null): void
    {
        foreach ($this->getTags() as $tag) {
            if (empty($location = $tag->getLocationAttributeValue())) {
                continue;
            }

            $finalLocation = Utils::resolveCompletePath($this->getLocation($wsdl, $schema), $location);
            $this->generator->addSchemaToWsdl($wsdl, $finalLocation);
        }
    }

    protected function getLocation(Wsdl $wsdl, Schema $schema = null): string
    {
        return ($schema ?? $wsdl)->getName();
    }

    /**
     * The goal of this method is to ensure that each schema is parsed by both TagInclude and TagImport in case of one of the two does not find tags that matches its tag name.
     * As the GeneratorParsers loads the include/import tags parses in a certain order, it can occur that import tags might be found after the import tag parser has been launched and vice versa.
     */
    protected function parseSchema(Wsdl $wsdl, Schema $schema): void
    {
        if (0 < count($this->getTags())) {
            $this->parseWsdl($wsdl, $schema);
        } else {
            $this->getTagParser()->parse();
        }
    }

    protected function getTagParser(): ?AbstractTagImportParser
    {
        $tagName = null;

        switch ($this->parsingTag()) {
            case AbstractDocument::TAG_IMPORT:
                $tagName = AbstractDocument::TAG_INCLUDE;

                break;

            case AbstractDocument::TAG_INCLUDE:
                $tagName = AbstractDocument::TAG_IMPORT;

                break;
        }

        return $this->getGenerator()->getParsers()->getParsers()->getParserByName($tagName);
    }
}
