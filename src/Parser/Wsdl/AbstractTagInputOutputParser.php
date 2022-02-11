<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Model\Method;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\WsdlHandler\Tag\AbstractTagOperationElement;
use WsdlToPhp\WsdlHandler\Tag\TagOperation;
use WsdlToPhp\WsdlHandler\Tag\TagPart;

abstract class AbstractTagInputOutputParser extends AbstractTagParser
{
    public const UNKNOWN = 'unknown';

    public function parseInputOutput(AbstractTagOperationElement $tag): void
    {
        if (!$tag->hasAttributeMessage()) {
            return;
        }

        $operation = $tag->getParentOperation();
        if (!$operation instanceof TagOperation) {
            return;
        }

        $method = $this->getModel($operation);
        if (!$method instanceof Method) {
            return;
        }

        if (!$this->isKnownTypeUnknown($method)) {
            return;
        }

        $parts = $tag->getParts();
        $multipleParts = count($parts);
        if (is_array($parts) && $multipleParts > 1) {
            $types = [];
            foreach ($parts as $part) {
                if (!empty($type = $this->getTypeFromPart($part))) {
                    $types[$part->getAttributeName()] = $type;
                }
            }
            $this->setKnownType($method, $types);
        } elseif (is_array($parts) && $multipleParts > 0) {
            $part = array_shift($parts);
            if ($part instanceof TagPart && !empty($type = $this->getTypeFromPart($part))) {
                $this->setKnownType($method, $type);
            }
        }
    }

    abstract protected function getKnownType(Method $method);

    abstract protected function setKnownType(Method $method, $knownType);

    protected function parseWsdl(Wsdl $wsdl): void
    {
        foreach ($this->getTags() as $tag) {
            $this->parseInputOutput($tag);
        }
    }

    protected function getTypeFromPart(TagPart $part): string
    {
        return $part->getFinalType();
    }

    protected function isKnownTypeUnknown(Method $method): bool
    {
        $isKnown = true;
        $knownType = $this->getKnownType($method);
        if (is_string($knownType)) {
            $isKnown = !empty($knownType) && self::UNKNOWN !== mb_strtolower($knownType);
        } elseif (is_array($knownType)) {
            foreach ($knownType as $knownValue) {
                $isKnown &= self::UNKNOWN !== mb_strtolower($knownValue);
            }
        }

        return (bool) !$isKnown;
    }
}
