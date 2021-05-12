<?php

namespace WsdlToPhp\PackageGenerator\WsdlHandler\Tag;

use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl as WsdlDocument;

class TagMessage extends Tag
{
    /**
     * @return TagPart|null
     */
    public function getPart($name)
    {
        return $this->getChildByNameAndAttributes(WsdlDocument::TAG_PART, [
            'name' => $name,
        ]);
    }
}
