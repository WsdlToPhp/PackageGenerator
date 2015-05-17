<?php

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl as WsdlDocument;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\TagHeader as Header;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\TagOperation as Operation;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\Model\Schema;
use WsdlToPhp\PackageGenerator\Model\Method;

class TagHeader extends AbstractTagParser
{
    const META_SOAP_HEADERS           = 'SOAPHeaders';
    const META_SOAP_HEADER_NAMES      = 'SOAPHeaderNames';
    const META_SOAP_HEADER_TYPES      = 'SOAPHeaderTypes';
    const META_SOAP_HEADER_NAMESPACES = 'SOAPHeaderNamespaces';
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parseWsdl()
     */
    protected function parseWsdl(Wsdl $wsdl)
    {
        foreach ($this->getTags() as $tag) {
            $this->parseHeader($tag);
        }
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parseSchema()
     */
    protected function parseSchema(Wsdl $wsdl, Schema $schema)
    {
        $this->parseWsdl($wsdl);
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
        if ($operation instanceof Operation) {
            $serviceMethod = $this->getModel($operation);
            if ($serviceMethod instanceof Method) {
                $serviceMethod
                    ->addMeta(self::META_SOAP_HEADERS, array($header->getHeaderRequired()))
                    ->addMeta(self::META_SOAP_HEADER_NAMES, array($header->getHeaderName()))
                    ->addMeta(self::META_SOAP_HEADER_TYPES, array($header->getHeaderType()))
                    ->addMeta(self::META_SOAP_HEADER_NAMESPACES, array($header->getHeaderNamespace()));
            }
        }
    }
}
