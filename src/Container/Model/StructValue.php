<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Container\Model;

use WsdlToPhp\PackageGenerator\Model\StructValue as Model;

class StructValue extends AbstractModel
{
    protected function objectClass(): string
    {
        return Model::class;
    }

    public function getStructValueByName($name): ?Model
    {
        return $this->get($name);
    }
}
