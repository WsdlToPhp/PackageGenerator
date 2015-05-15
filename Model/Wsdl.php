<?php

namespace WsdlToPhp\PackageGenerator\Model;

class Wsdl extends AbstractDocument
{
    /**
     * @return string
     */
    protected function contentClass()
    {
        return '\\WsdlToPhp\\PackageGenerator\\DomHandler\\Wsdl\\Wsdl';
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl
     */
    public function getContent()
    {
        return parent::getContent();
    }
}
