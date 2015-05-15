<?php

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Model\Method;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\Model\Schema;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\TagPart;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\AbstractTagOperationElement;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\TagOperation;

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
     */
    protected function parseWsdl(Wsdl $wsdl)
    {
        foreach ($this->getTags() as $tag) {
            $this->parseInputOutput($tag);
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
     * @param AbstractTagOperationElement $tag
     */
    public function parseInputOutput(AbstractTagOperationElement $tag)
    {
        if (!$tag->hasAttributeMessage()) {
            return null;
        }
        $operation = $tag->getParentOperation();
        if (!$operation instanceof TagOperation) {
            return null;
        }
        $method = $this->getModel($operation);
        if (!$method instanceof Method) {
            return null;
        }
        if ($this->isKnownTypeUnknown($method)) {
            $parts         = $tag->getParts();
            $multipleParts = count($parts);
            if ($multipleParts > 1) {
                $types = array();
                foreach ($parts as $part) {
                    if (($type = $this->getTypeFromPart($part)) !== '') {
                        $types[] = $type;
                    }
                }
                $this->setKnownType($method, $types);
            } elseif ($multipleParts > 0 && ($type = $this->getTypeFromPart(array_shift($parts))) !== '') {
                $this->setKnownType($method, $type);
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
    private function isKnownTypeUnknown(Method $method)
    {
        $isKnown = true;
        $knownType = $this->getKnownType($method);
        if (is_string($knownType)) {
            $isKnown = !empty($knownType) && strtolower($knownType) !== self::UNKNOWN;
        } elseif (is_array($knownType)) {
            foreach ($knownType as $knownValue) {
                $isKnown &= !empty($knownType) && strtolower($knownValue) !== self::UNKNOWN;
            }
        }
        return (bool) !$isKnown;
    }
}
