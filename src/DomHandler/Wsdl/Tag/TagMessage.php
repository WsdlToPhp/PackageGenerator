<?php

namespace WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag;

class TagMessage extends Tag
{
    /**
     * @return TagPart|null
     */
    public function getPart($name)
    {
        return $this->getChildByNameAndAttributes('part', array(
            'name' => $name,
        ));
    }
}
