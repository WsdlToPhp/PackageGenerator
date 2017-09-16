<?php

namespace WsdlToPhp\PackageGenerator\WsdlHandler\Tag;

class TagMessage extends Tag
{
    /**
     * @return TagPart|null
     */
    public function getPart($name)
    {
        return $this->getChildByNameAndAttributes('part', [
            'name' => $name,
        ]);
    }
}
