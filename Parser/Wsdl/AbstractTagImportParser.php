<?php

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\AbstractTagImport;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\Model\Schema;
use WsdlToPhp\PackageGenerator\Generator\Utils;

abstract class AbstractTagImportParser extends AbstractTagParser
{
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parseWsdl()
     */
    protected function parseWsdl(Wsdl $wsdl)
    {
        foreach ($this->getTags() as $tag) {
            if ($tag instanceof AbstractTagImport && $tag->getLocationAttribute() != '') {
                $finalLocation = Utils::resolveCompletePath($wsdl->getName(), $tag->getLocationAttribute());
                $this->generator->addSchemaToWsdl($wsdl, $finalLocation);
            }
        }
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parseSchema()
     */
    protected function parseSchema(Wsdl $wsdl, Schema $schema)
    {
        $this->parseWsdl($wsdl);
    }
}
