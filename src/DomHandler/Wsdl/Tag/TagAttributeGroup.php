<?php

namespace WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag;

class TagAttributeGroup extends AbstractTag
{
    const ATTRIBUTE_REF = 'ref';
    /**
     * {@inheritDoc}
     * @see \WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\AbstractTag::getAttributeRef()
     */
    public function getAttributeRef()
    {
        return $this->hasAttribute(self::ATTRIBUTE_REF) ? $this->getAttribute(self::ATTRIBUTE_REF)->getValue(false, true, 'string') : '';
    }
}
