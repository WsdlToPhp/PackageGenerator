<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Model\Method;
use WsdlToPhp\WsdlHandler\Wsdl as WsdlDocument;

final class TagOutput extends AbstractTagInputOutputParser
{
    protected function parsingTag(): string
    {
        return WsdlDocument::TAG_OUTPUT;
    }

    protected function getKnownType(Method $method)
    {
        return $method->getReturnType();
    }

    protected function setKnownType(Method $method, $knownType): self
    {
        $method->setReturnType($knownType);

        return $this;
    }
}
