<?php

namespace WsdlToPhp\PackageGenerator\DomHandler;

use WsdlToPhp\PackageGenerator\Generator\Utils;

class AbstractAttributeHandler extends AbstractNodeHandler
{
    /**
     * @var string
     */
    const DEFAULT_VALUE_TYPE = 'string';
    /**
     * @var string
     */
    const ATTRIBUTE_NAMESPACE = 'namespace';
    /**
     * @var string
     */
    const ATTRIBUTE_NAME = 'name';
    /**
     * @var string
     */
    const ATTRIBUTE_VALUE = 'value';
    /**
     * @var string
     */
    const ATTRIBUTE_TYPE = 'type';
    /**
     * @var string
     */
    const ATTRIBUTE_ABSTRACT = 'abstract';
    /**
     * @see \WsdlToPhp\PackageGenerator\DomHandler\AbstractNodeHandler::getNode()
     * @return \DOMAttr
     */
    public function getNode()
    {
        return parent::getNode();
    }
    /**
     * @return \DOMAttr
     */
    public function getAttribute()
    {
        return $this->getNode();
    }
    /**
     * Tries to get attribute type on the same node
     * in order to return the value of the attribute in its type
     * @return string|null
     */
    public function getType()
    {
        $type = null;
        if (($parent = $this->getParent()) instanceof ElementHandler && $parent->hasAttribute('type')) {
            $type = $parent->getAttribute('type')->getValue(false, false);
        }
        return $type;
    }
    /**
     * @param bool $withNamespace
     * @param bool $withinItsType
     * @param string $asType
     * @return mixed
     */
    public function getValue($withNamespace = false, $withinItsType = true, $asType = self::DEFAULT_VALUE_TYPE)
    {
        $value = $this->getAttribute()->value;
        if ($withNamespace === false && !empty($value)) {
            $value = implode('', array_slice(explode(':', $value), -1, 1));
        }
        if ($value !== null && $withinItsType === true) {
            $value = Utils::getValueWithinItsType($value, empty($asType) ? $this->getType() : $asType);
        }
        return $value;
    }
    /**
     * @return null|string
     */
    public function getValueNamespace()
    {
        $value = $this->getAttribute()->value;
        $namespace = null;
        if (strpos($value, ':') !== false) {
            $namespace = implode('', array_slice(explode(':', $value), 0, -1));
        }
        return $namespace;
    }
}
