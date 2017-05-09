<?php

namespace WsdlToPhp\PackageGenerator\Container\PhpElement;

class Property extends AbstractPhpElement
{
    /**
     * @see \WsdlToPhp\PackageGenerator\Container\Model\Model::objectClass()
     * @return string
     */
    protected function objectClass()
    {
        return 'WsdlToPhp\PhpGenerator\Element\PhpProperty';
    }
}
