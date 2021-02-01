<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Container\Model;

use WsdlToPhp\PackageGenerator\Model\Schema as Model;

class Schema extends AbstractModel
{
    protected function objectClass(): string
    {
        return Model::class;
    }

    public function getSchemaByName(string $name): ?Model
    {
        return $this->get($name);
    }
}
