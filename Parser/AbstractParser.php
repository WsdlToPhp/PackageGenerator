<?php

namespace WsdlToPhp\PackageGenerator\Parser;

use WsdlToPhp\PackageGenerator\Generator\AbstractGeneratorAware;

abstract class AbstractParser extends AbstractGeneratorAware implements ParserInterface
{
    /**
     * @return string
     */
    public function getName()
    {
        return get_called_class();
    }
}
