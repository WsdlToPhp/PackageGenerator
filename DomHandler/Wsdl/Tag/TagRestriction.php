<?php

namespace WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag;

use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl as WsdlDocument;

class TagRestriction extends AbstractTag
{
    /**
     * @return boolean
     */
    public function isEnumeration()
    {
        return count($this->getEnumerations()) > 0;
    }
    /**
     * @return array[TagEnumeration]
     */
    public function getEnumerations()
    {
        return $this->getChildrenByName(WsdlDocument::TAG_ENUMERATION);
    }
}
