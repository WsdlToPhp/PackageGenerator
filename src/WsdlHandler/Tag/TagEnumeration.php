<?php

namespace WsdlToPhp\PackageGenerator\WsdlHandler\Tag;

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
