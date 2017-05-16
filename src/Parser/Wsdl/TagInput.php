<?php

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Model\Method;
use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl as WsdlDocument;

class TagInput extends AbstractTagInputOutputParser
{
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parsingTag()
     * @return string
     */
    protected function parsingTag()
    {
        return WsdlDocument::TAG_INPUT;
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractTagInputOutputParser::getKnownType()
     * @param Method $method
     * @return array|string
     */
    protected function getKnownType(Method $method)
    {
        return $method->getParameterType();
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractTagInputOutputParser::setKnownType()
     * @param Method $method
     * @param string|string[] $knownType
     * @return TagInput
     */
    protected function setKnownType(Method $method, $knownType)
    {
        $method->setParameterType($knownType);
        return $this;
    }
}
