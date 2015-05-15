<?php

namespace WsdlToPhp\PackageGenerator\Model;

class Schema extends AbstractDocument
{
    /**
     * @return string
     */
    protected function contentClass()
    {
        return '\\WsdlToPhp\\PackageGenerator\\DomHandler\\Wsdl\\Schema';
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl
     */
    public function getContent()
    {
        return parent::getContent();
    }
}
