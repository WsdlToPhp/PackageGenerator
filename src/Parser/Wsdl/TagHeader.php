<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Model\Method;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\WsdlHandler\Tag\TagHeader as Header;
use WsdlToPhp\WsdlHandler\Tag\TagInput as Input;
use WsdlToPhp\WsdlHandler\Tag\TagOperation as Operation;
use WsdlToPhp\WsdlHandler\Wsdl as WsdlDocument;

final class TagHeader extends AbstractTagParser
{
    public const META_SOAP_HEADERS = 'SOAPHeaders';
    public const META_SOAP_HEADER_NAMES = 'SOAPHeaderNames';
    public const META_SOAP_HEADER_TYPES = 'SOAPHeaderTypes';
    public const META_SOAP_HEADER_NAMESPACES = 'SOAPHeaderNamespaces';

    public function parseHeader(Header $header): void
    {
        $operation = $header->getParentOperation();
        $input = $header->getParentInput();
        if (!$operation instanceof Operation || !$input instanceof Input) {
            return;
        }

        $serviceMethod = $this->getModel($operation);
        if (!$serviceMethod instanceof Method || $this->isSoapHeaderAlreadyDefined($serviceMethod, $header->getHeaderName())) {
            return;
        }

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
            ])
        ;
    }

    protected function parseWsdl(Wsdl $wsdl): void
    {
        foreach ($this->getTags() as $tag) {
            $this->parseHeader($tag);
        }
    }

    protected function parsingTag(): string
    {
        return WsdlDocument::TAG_HEADER;
    }

    protected function isSoapHeaderAlreadyDefined(Method $method, string $soapHeaderName): bool
    {
        $methodSoapHeaders = $method->getMetaValue(self::META_SOAP_HEADER_NAMES, []);

        return in_array($soapHeaderName, $methodSoapHeaders, true);
    }
}
