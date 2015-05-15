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
     * @return ParserInterface
     */
    public function get($value, $key = self::KEY_NAME)
    {
        return parent::get($value, $key);
    }
}
