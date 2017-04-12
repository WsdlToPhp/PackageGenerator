<?php

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Model\Method;
use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl as WsdlDocument;

class TagOutput extends AbstractTagInputOutputParser
{
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parsingTag()
     * @return string
     */
    protected function parsingTag()
    {
        return WsdlDocument::TAG_OUTPUT;
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractTagOutputOutputParser::getKnownType()
     * @param Method $method
     * @return array|string
     */
    protected function getKnownType(Method $method)
    {
        return $method->getReturnType();
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractTagOutputOutputParser::setKnownType()
     * @param Method $method
     * @param string|string[] $knownType
     * @return TagOutput
     */
    protected function setKnownType(Method $method, $knownType)
    {
        $method->setReturnType($knownType);
        return $this;
    }
}
