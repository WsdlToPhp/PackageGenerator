<?php

namespace WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag;

class TagMessage extends AbstractTag
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
