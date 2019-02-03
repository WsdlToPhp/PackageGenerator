<?php

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Model\Method;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagPart;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\AbstractTagOperationElement;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagOperation;

abstract class AbstractTagInputOutputParser extends AbstractTagParser
{
    const UNKNOWN = 'unknown';
    /**
     * @param Method $method
     * @return string|array
     */
    abstract protected function getKnownType(Method $method);
    /**
     * @param Method $method
     * @param string|array $knownType
     */
    abstract protected function setKnownType(Method $method, $knownType);
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parseWsdl()
     * @param Wsdl $wsdl
     */
    protected function parseWsdl(Wsdl $wsdl)
    {
        foreach ($this->getTags() as $tag) {
            if ($tag instanceof AbstractTagOperationElement) {
                $this->parseInputOutput($tag);
            }
        }
    }
    /**
     * @param AbstractTagOperationElement $tag
     */
    public function parseInputOutput(AbstractTagOperationElement $tag)
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
        if ($this->isKnownTypeUnknown($method)) {
            $parts = $tag->getParts();
            $multipleParts = count($parts);
            if (is_array($parts) && $multipleParts > 1) {
                $types = [];
                foreach ($parts as $part) {
                    if (($type = $this->getTypeFromPart($part)) !== '') {
                        $types[$part->getAttributeName()] = $type;
                    }
                }
                $this->setKnownType($method, $types);
            } elseif (is_array($parts) && $multipleParts > 0) {
                $part = array_shift($parts);
                if ($part instanceof TagPart && ($type = $this->getTypeFromPart($part)) !== '') {
                    $this->setKnownType($method, $type);
                }
            }
        }
    }
    /**
     * @param TagPart $part
     * @return string
     */
    protected function getTypeFromPart(TagPart $part)
    {
        return $part->getFinalType();
    }
    /**
     * @param Method $method
     * @return boolean
     */
    protected function isKnownTypeUnknown(Method $method)
    {
        $isKnown = true;
        $knownType = $this->getKnownType($method);
        if (is_string($knownType)) {
            $isKnown = !empty($knownType) && mb_strtolower($knownType) !== self::UNKNOWN;
        } elseif (is_array($knownType)) {
            foreach ($knownType as $knownValue) {
                $isKnown &= !empty($knownType) && mb_strtolower($knownValue) !== self::UNKNOWN;
            }
        }
        return (bool) !$isKnown;
    }
}
