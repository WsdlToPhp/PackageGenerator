<?php

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl as WsdlDocument;

class TagImport extends AbstractTagImportParser
{
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parsingTag()
     * @return string
     */
    protected function parsingTag()
    {
        return WsdlDocument::TAG_IMPORT;
    }
}
