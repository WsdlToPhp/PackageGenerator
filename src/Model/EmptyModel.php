<?php

namespace WsdlToPhp\PackageGenerator\Model;

class EmptyModel extends AbstractModel
{
    /**
     * {@inheritDoc}
     * @see \WsdlToPhp\PackageGenerator\Model\AbstractModel::toJsonSerialize()
     */
    protected function toJsonSerialize()
    {
        return [];
    }
}
