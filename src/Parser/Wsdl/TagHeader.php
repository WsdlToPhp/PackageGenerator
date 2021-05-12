<?php

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl as WsdlDocument;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagHeader as Header;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagOperation as Operation;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagInput as Input;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\Model\Method;

class TagHeader extends AbstractTagParser
{
    /**
     * @var string
     */
    const META_SOAP_HEADERS = 'SOAPHeaders';
    /**
     * @var string
     */
    const META_SOAP_HEADER_NAMES = 'SOAPHeaderNames';
    /**
     * @var string
     */
    const META_SOAP_HEADER_TYPES = 'SOAPHeaderTypes';
    /**
     * @var string
     */
    const META_SOAP_HEADER_NAMESPACES = 'SOAPHeaderNamespaces';
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parseWsdl()
     * @param Wsdl $wsdl
     */
    protected function parseWsdl(Wsdl $wsdl)
    {
        foreach ($this->getTags() as $tag) {
            if ($tag instanceof Header) {
                $this->parseHeader($tag);
            }
        }
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parsingTag()
     */
    protected function parsingTag()
    {
        return WsdlDocument::TAG_HEADER;
    }
    /**
     * @param Header $header
     */
    public function parseHeader(Header $header)
    {
        $operation = $header->getParentOperation();
        $input = $header->getParentInput();
        if ($operation instanceof Operation && $input instanceof Input) {
            $serviceMethod = $this->getModel($operation);
            if ($serviceMethod instanceof Method && !$this->isSoapHeaderAlreadyDefined($serviceMethod, $header->getHeaderName())) {
                $serviceMethod
                    ->addMeta(self::META_SOAP_HEADERS, [
                        $header->getHeaderRequired(),
                    ])
                    ->addMeta(self::META_SOAP_HEADER_NAMES, [
                        $header->getHeaderName(),
                    ])
                    ->addMeta(self::META_SOAP_HEADER_TYPES, [
                        $header->getHeaderType(),
                    ])
                    ->addMeta(self::META_SOAP_HEADER_NAMESPACES, [
                        $header->getHeaderNamespace(),
                    ]);
            }
        }
    }
    /**
     * @param Method $method
     * @param string $soapHeaderName
     * @return bool
     */
    protected function isSoapHeaderAlreadyDefined(Method $method, $soapHeaderName)
    {
        $methodSoapHeaders = $method->getMetaValue(self::META_SOAP_HEADER_NAMES, []);
        return in_array($soapHeaderName, $methodSoapHeaders, true);
    }
}
