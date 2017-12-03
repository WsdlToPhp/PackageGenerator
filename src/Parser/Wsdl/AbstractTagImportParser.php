<?php

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl as WsdlDocument;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\AbstractTagImport;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\Model\Schema;
use WsdlToPhp\PackageGenerator\Generator\Utils;

abstract class AbstractTagImportParser extends AbstractTagParser
{
    /**
     * @param Wsdl $wsdl
     * @param Schema|null $schema
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parseWsdl()
     */
    protected function parseWsdl(Wsdl $wsdl, Schema $schema = null)
    {
        foreach ($this->getTags() as $tag) {
            if ($tag instanceof AbstractTagImport && $tag->getLocationAttribute() != '') {
                $finalLocation = Utils::resolveCompletePath($this->getLocation($wsdl, $schema), $tag->getLocationAttribute());
                $this->generator->addSchemaToWsdl($wsdl, $finalLocation);
            }
        }
    }
    /**
     * @param Wsdl $wsdl
     * @param Schema $schema
     * @return string
     */
    protected function getLocation(Wsdl $wsdl, Schema $schema = null)
    {
        $model = $wsdl;
        if ($schema instanceof Schema) {
            $model = $schema;
        }
        return $model->getName();
    }
    /**
     * The goal of this method is to ensure that each schema is parsed by both TagInclude and TagImport in case of one of the two does not find tags that matches its tag name.
     * As the GeneratorParsers loads the include/import tags parses in a certain order, it can occur that import tags might be found after the import tag parser has been launched and vice versa.
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parseSchema()
     * @param Wsdl $wsdl
     * @param Schema $schema
     */
    protected function parseSchema(Wsdl $wsdl, Schema $schema)
    {
        if (count($this->getTags())) {
            $this->parseWsdl($wsdl, $schema);
        } else {
            $this->getTagParser()->parse();
        }
    }
    /**
     * @return AbstractTagImportParser
     */
    protected function getTagParser()
    {
        $tagName = null;
        switch ($this->parsingTag()) {
            case WsdlDocument::TAG_IMPORT:
                $tagName = WsdlDocument::TAG_INCLUDE;
                break;
            case WsdlDocument::TAG_INCLUDE:
                $tagName = WsdlDocument::TAG_IMPORT;
                break;
        }
        return $this->getGenerator()->getParsers()->getParsers()->getParserByName($tagName);
    }
}
