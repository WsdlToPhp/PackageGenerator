<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Model;

use WsdlToPhp\WsdlHandler\Schema as SchemaHandler;

class Schema extends AbstractDocument
{
    protected function contentClass(): string
    {
        return SchemaHandler::class;
    }
}
