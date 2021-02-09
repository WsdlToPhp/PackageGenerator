<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Container\Model;

use WsdlToPhp\PackageGenerator\Model\EmptyModel as Model;

final class EmptyModel extends AbstractModel
{
    protected function objectClass(): string
    {
        return Model::class;
    }
}
