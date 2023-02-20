<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Model;

use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\WsdlHandler\AbstractDocument as AbstractDocumentHandler;

abstract class AbstractDocument extends AbstractModel
{
    protected AbstractDocumentHandler $content;

    public function __construct(Generator $generator, string $name, string $content)
    {
        parent::__construct($generator, $name);
        $this->initContentFromContentString($content);
    }

    public function getContent(): AbstractDocumentHandler
    {
        return $this->content;
    }

    abstract protected function contentClass(): string;

    protected function initContentFromContentString(string $content): AbstractDocument
    {
        $contentClass = $this->contentClass();
        $domDocument = new \DOMDocument('1.0', 'utf-8');

        try {
            $domDocument->loadXML($content, LIBXML_NOERROR);
            $this->content = new $contentClass($domDocument, $this->generator);
        } catch (\Exception $exception) {
            throw new \InvalidArgumentException(sprintf('Unable to load document at "%s"', $this->getName()), __LINE__, $exception);
        }

        return $this;
    }

    protected function toJsonSerialize(): array
    {
        return [];
    }
}
