<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Container\Model;

use WsdlToPhp\PackageGenerator\Model\StructValue as Model;

final class StructValue extends AbstractModel
{
    public function getStructValueByName($name): ?Model
    {
        return $this->get($name);
    }

    protected function objectClass(): string
    {
        return Model::class;
    }
}
