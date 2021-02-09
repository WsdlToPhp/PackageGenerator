<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\WsdlHandler\Wsdl as WsdlDocument;

final class TagInclude extends AbstractTagImportParser
{
    protected function parsingTag(): string
    {
        return WsdlDocument::TAG_INCLUDE;
    }
}
