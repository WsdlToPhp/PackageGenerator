<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Parser;

use WsdlToPhp\PackageGenerator\Generator\AbstractGeneratorAware;

abstract class AbstractParser extends AbstractGeneratorAware implements ParserInterface
{
    public function getName(): string
    {
        return get_called_class();
    }
}
