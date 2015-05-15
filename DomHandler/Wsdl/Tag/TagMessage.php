<?php

namespace WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag;

class TagMessage extends AbstractTag
{
    /**
     * @return null|\WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\TagPart
     */
    public function getPart($name)
    {
        return $this->getChildByNameAndAttributes('part', array(
            'name' => $name,
        ));
    }
}
