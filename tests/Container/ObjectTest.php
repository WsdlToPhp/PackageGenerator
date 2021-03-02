<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Container;

/**
 * @internal
 * @coversDefaultClass
 */
final class ObjectTest
{
    public function getName(): string
    {
        return 'me';
    }
}
