<?php

namespace WsdlToPhp\PackageGenerator\WsdlHandler\Tag;

use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl as WsdlDocument;

class TagRestriction extends Tag
{
    /**
     * @return boolean
     */
    public function isEnumeration()
    {
        return count($this->getEnumerations()) > 0;
    }
    /**
     * @return TagEnumeration[]
     */
    public function getEnumerations()
    {
        return $this->getChildrenByName(WsdlDocument::TAG_ENUMERATION);
    }
}
