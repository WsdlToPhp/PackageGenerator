<?php

namespace WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag;

class TagEnumeration extends Tag
{
    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->getValueAttributeValue(true);
    }
}
