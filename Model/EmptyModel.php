<?php

namespace WsdlToPhp\PackageGenerator\Model;

class EmptyModel extends AbstractModel
{
    /**
     * Return class name
     * @return string __CLASS__
     */
    public function __toString()
    {
        return 'EmptyModel';
    }
}
