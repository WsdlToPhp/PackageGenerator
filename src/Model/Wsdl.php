<?php

namespace WsdlToPhp\PackageGenerator\Model;

class Wsdl extends AbstractDocument
{
    /**
     * @return string
     */
    protected function contentClass()
    {
        return '\WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl';
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl
     */
    public function getContent()
    {
        return parent::getContent();
    }
}
