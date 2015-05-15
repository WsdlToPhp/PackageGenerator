<?php

namespace WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag;

class TagAppinfo extends AbstractTag
{
    /**
     * @return string
     */
    public function getContent()
    {
        return $this->getNodeValue();
    }
}
