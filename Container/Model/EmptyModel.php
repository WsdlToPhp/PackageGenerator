<?php

namespace WsdlToPhp\PackageGenerator\Container\Model;

use WsdlToPhp\PackageGenerator\Model\EmptyModel as Model;

class EmptyModel extends AbstractModel
{
    /**
     * @see \WsdlToPhp\PackageGenerator\ModelContainer\AbstractModelContainer::objectClass()
     * @return string
     */
    protected function objectClass()
    {
        return 'WsdlToPhp\\PackageGenerator\\Model\\EmptyModel';
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\ModelContainer\AbstractModelContainer::get()
     * @return Model|null
     */
    public function get($value)
    {
        return parent::get($value);
    }
}
