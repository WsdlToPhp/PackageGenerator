<?php

namespace WsdlToPhp\PackageGenerator\Container\PhpElement;

class Method extends AbstractPhpElement
{
    /**
     * @see \WsdlToPhp\PackageGenerator\Container\Model\Model::objectClass()
     * @return string
     */
    protected function objectClass()
    {
        return 'WsdlToPhp\PhpGenerator\Element\PhpMethod';
    }
}
