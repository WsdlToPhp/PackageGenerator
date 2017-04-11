<?php

namespace WsdlToPhp\PackageGenerator\Model;

class Schema extends AbstractDocument
{
    /**
     * @return string
     */
    protected function contentClass()
    {
        return '\WsdlToPhp\PackageGenerator\WsdlHandler\Schema';
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl
     */
    public function getContent()
    {
        return parent::getContent();
    }
}
