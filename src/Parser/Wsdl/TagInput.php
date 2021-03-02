<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Model\Method;
use WsdlToPhp\WsdlHandler\Wsdl as WsdlDocument;

final class TagInput extends AbstractTagInputOutputParser
{
    protected function parsingTag(): string
    {
        return WsdlDocument::TAG_INPUT;
    }

    protected function getKnownType(Method $method)
    {
        return $method->getParameterType();
    }

    protected function setKnownType(Method $method, $knownType): self
    {
        $method->setParameterType($knownType);

        return $this;
    }
}
