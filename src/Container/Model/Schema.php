<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Container\Model;

use WsdlToPhp\PackageGenerator\Model\Schema as Model;

class Schema extends AbstractModel
{
    public function getSchemaByName(string $name): ?Model
    {
        return $this->get($name);
    }

    protected function objectClass(): string
    {
        return Model::class;
    }
}
