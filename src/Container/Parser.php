<?php

namespace WsdlToPhp\PackageGenerator\Container;

class Parser extends AbstractObjectContainer
{
    /**
     * @see \WsdlToPhp\PackageGenerator\Container\AbstractObjectContainer::objectClass()
     * @return string
     */
    protected function objectClass()
    {
        return '\\WsdlToPhp\\PackageGenerator\\Parser\\AbstractParser';
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\Container\AbstractObjectContainer::objectProperty()
     * @return string
     */
    protected function objectProperty()
    {
        return self::PROPERTY_NAME;
    }
}
