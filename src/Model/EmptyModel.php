<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Model;

class EmptyModel extends AbstractModel
{
    protected function toJsonSerialize(): array
    {
        return [];
    }
}
